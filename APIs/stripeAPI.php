<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require dirname(__DIR__, 1) . '/vendor/autoload.php';

require 'secrets.php';

$stripe = new \Stripe\StripeClient($stripeSecretKey);

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    error_log('JSON Decode Error: ' . json_last_error_msg());
    echo json_encode(['error' => 'Invalid JSON']);
    http_response_code(400);
    exit();
}
$action = isset($input['action']) ? $input['action'] : '';

try {
    switch ($action) {
        case 'checkout':
            try {
                $items = $input['items'];
                if (!isset($items) || !is_array($items) || count($items) === 0) {
                    throw new Exception('Missing or invalid items');
                }

                foreach ($items as $item) {
                    if (!isset($item['id']) || !isset($item['amount'])) {
                        throw new Exception('Each item must have an id and amount');
                    }
                }

                $amount = calculateOrderAmount($items);

                $paymentIntent = $stripe->paymentIntents->create([
                    'amount' => $amount,
                    'currency' => 'mxn',
                    'metadata' => [
                        'selected_courses' => json_encode($input['selectedCourses']),
                    ],
                    'automatic_payment_methods' => [
                        'enabled' => true,
                    ],
                ]);

                $output = [
                    'clientSecret' => $paymentIntent->client_secret,
                ];
            
                echo json_encode($output);
            } catch (Exception $e) {
                error_log($e->getMessage());
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
            break;
        case 'create_customer':
            try {
                $customer = $stripe->customers->create([
                    'description' => 'Customer for saving cards',
                ]);
                echo json_encode(['customerId' => $customer->id]);
            } catch (Exception $e) {
                throw new Exception('Failed to create customer: ' . $e->getMessage());
            }
            break;
        
        case 'create_setup_intent':
            if (!isset($input['customerId'])) {
                throw new Exception('Missing customerId');
            }
            try {
                $setupIntent = $stripe->setupIntents->create([
                    'customer' => $input['customerId'],
                ]);
                echo json_encode(['clientSecret' => $setupIntent->client_secret]);
            } catch (Exception $e) {
                throw new Exception('Failed to create setup intent: ' . $e->getMessage());
            }
            break;
        
        case 'save_card':
            if (!isset($input['customerId']) || !isset($input['paymentMethodId'])) {
                throw new Exception('Missing customerId or paymentMethodId');
            }
            try {
                $stripe->paymentMethods->attach($input['paymentMethodId'], [
                    'customer' => $input['customerId'],
                ]);
        
                $stripe->customers->update($input['customerId'], [
                    'invoice_settings' => ['default_payment_method' => $input['paymentMethodId']],
                ]);
        
                echo json_encode(['status' => 'Card saved successfully']);
            } catch (Exception $e) {
                throw new Exception('Failed to save card: ' . $e->getMessage());
            }
            break;
        
        case 'list_cards':
            if (!isset($input['customerId'])) {
                throw new Exception('Missing customerId');
            }
            try {
                $paymentMethods = $stripe->paymentMethods->all([
                    'customer' => $input['customerId'],
                    'type' => 'card',
                ]);
                echo json_encode(['paymentMethods' => $paymentMethods->data]);
            } catch (Exception $e) {
                throw new Exception('Failed to list saved cards: ' . $e->getMessage());
            }
            break;
        
        default:
            throw new Exception('Invalid action');
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}



function calculateOrderAmount(array $items): int {
    $total = 0;
    foreach ($items as $item) {
        if (isset($item['amount'])) {
            $total += $item['amount'] * 100;
        }
    }
    return $total;
}

<?php
//\Stripe\Stripe::setApiKey($stripeSecretKey);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
require 'secrets.php';

$stripe = new \Stripe\StripeClient($stripeSecretKey);

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Invalid JSON']);
    http_response_code(400);
    exit();
}

$action = isset($input['action']) ? $input['action'] : '';

try {
    switch ($action) {
        case 'create_customer':
            createCustomer();
            break;
        
        case 'create_setup_intent':
            if (!isset($input['customerId'])) {
                throw new Exception('Missing customerId');
            }
            createSetupIntent($input['customerId']);
            break;
        
        case 'save_card':
            if (!isset($input['customerId']) || !isset($input['paymentMethodId'])) {
                throw new Exception('Missing customerId or paymentMethodId');
            }
            saveCard($input['customerId'], $input['paymentMethodId']);
            break;
        
        case 'list_cards':
            if (!isset($input['customerId'])) {
                throw new Exception('Missing customerId');
            }
            listSavedCards($input['customerId']);
            break;
        
        default:
            throw new Exception('Invalid action');
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}

function createCustomer() {
    global $stripe;
    try {
        $customer = $stripe->customers->create([
            'description' => 'Customer for saving cards',
        ]);
        echo json_encode(['customerId' => $customer->id]);
    } catch (Exception $e) {
        throw new Exception('Failed to create customer: ' . $e->getMessage());
    }
}

function createSetupIntent($customerId) {
    global $stripe;
    try {
        $setupIntent = $stripe->setupIntents->create([
            'customer' => $customerId,
        ]);
        echo json_encode(['clientSecret' => $setupIntent->client_secret]);
    } catch (Exception $e) {
        throw new Exception('Failed to create setup intent: ' . $e->getMessage());
    }
}

function saveCard($customerId, $paymentMethodId) {
    global $stripe;
    try {
        $stripe->paymentMethods->attach($paymentMethodId, [
            'customer' => $customerId,
        ]);

        $stripe->customers->update($customerId, [
            'invoice_settings' => ['default_payment_method' => $paymentMethodId],
        ]);

        echo json_encode(['status' => 'Card saved successfully']);
    } catch (Exception $e) {
        throw new Exception('Failed to save card: ' . $e->getMessage());
    }
}

function listSavedCards($customerId) {
    global $stripe;
    try {
        $paymentMethods = $stripe->paymentMethods->all([
            'customer' => $customerId,
            'type' => 'card',
        ]);
        echo json_encode(['paymentMethods' => $paymentMethods->data]);
    } catch (Exception $e) {
        throw new Exception('Failed to list saved cards: ' . $e->getMessage());
    }
}
?>

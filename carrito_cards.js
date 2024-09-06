document.addEventListener('DOMContentLoaded', () => {
    const stripe = Stripe("pk_test_51PvWxbRvdpBHBVcf001TLOPU54vHnmeZPZ9PD6XsdYxPsFR6C5pAxCu0LYwmuiWw2QTkQF4sFQhgLXaId0l8kbX500egiTdDY1");

    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    document.getElementById('save-card-button').addEventListener('click', async () => {
        const customerId = await createCustomer();
        const clientSecret = await createSetupIntent(customerId);
        const { setupIntent, error } = await stripe.confirmCardSetup(clientSecret, {
            payment_method: {
                card: cardElement,
            }
        });

        if (error) {
            console.error('Error:', error);
        } else if (setupIntent.status === 'succeeded') {
            await saveCard(customerId, setupIntent.payment_method);
            await listSavedCards(customerId);
        }
    });

    async function createCustomer() {
        const response = await fetch('/card.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'create_customer' })
        });
    
        const text = await response.text(); // Get raw response text
        console.log('Response text:', text); // Log raw response text
    
        try {
            const data = JSON.parse(text); // Attempt to parse JSON
            if (!response.ok) throw new Error(data.error);
            return data.customerId;
        } catch (error) {
            throw new Error('Error parsing JSON: ' + error.message);
        }
    }
    

    async function createSetupIntent(customerId) {
        const response = await fetch('/card.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'create_setup_intent', customerId })
        });
        const data = await response.json();
        if (!response.ok) throw new Error(data.error);
        return data.clientSecret;
    }

    async function saveCard(customerId, paymentMethodId) {
        const response = await fetch('/card.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'save_card', customerId, paymentMethodId })
        });
        const data = await response.json();
        if (!response.ok) throw new Error(data.error);
        console.log('Card saved:', data.status);
    }

    async function listSavedCards(customerId) {
        const response = await fetch('/card.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'list_cards', customerId })
        });
        const data = await response.json();
        if (!response.ok) throw new Error(data.error);

        const savedCardsList = document.getElementById('saved-cards');
        //savedCardsList.innerHTML = ''; // Clear previous list
        data.paymentMethods.forEach(card => {
            const listItem = document.createElement('li');
            listItem.textContent = `Card ending in ${card.card.last4} ${card.card.brand} ${card.card.exp_month}/${card.card.exp_year}`;
            savedCardsList.appendChild(listItem);
        });
    }
});

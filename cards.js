document.addEventListener('DOMContentLoaded', () => {
    const stripe = Stripe("pk_test_51PvWxbRvdpBHBVcf001TLOPU54vHnmeZPZ9PD6XsdYxPsFR6C5pAxCu0LYwmuiWw2QTkQF4sFQhgLXaId0l8kbX500egiTdDY1");

    const elements = stripe.elements();

// Style object for all elements
const style = {
    base: {
        iconColor: '#86BD7B',
        color: '#ffffff',
        fontFamily: 'Ideal Sans, system-ui, sans-serif',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4',
        },
        backgroundColor: '#130924',
    },
    invalid: {
        color: '#df1b41',
        iconColor: '#df1b41',
    },
};

// Create card number element
const cardNumber = elements.create('cardNumber', { style });
cardNumber.mount('#card-number-element');

// Create expiry date element
const cardExpiry = elements.create('cardExpiry', { style });
cardExpiry.mount('#card-expiry-element');

// Create CVC element
const cardCvc = elements.create('cardCvc', { style });
cardCvc.mount('#card-cvc-element');


    document.getElementById('save-card-button').addEventListener('click', async () => {
        const customerId = await createCustomer();
        const clientSecret = await createSetupIntent(customerId);
        const { setupIntent, error } = await stripe.confirmCardSetup(clientSecret, {
            payment_method: {
                card: cardNumber,
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
        const response = await fetch('/cards.php', {
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
        const response = await fetch('/cards.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'create_setup_intent', customerId })
        });
        const data = await response.json();
        if (!response.ok) throw new Error(data.error);
        return data.clientSecret;
    }

    async function saveCard(customerId, paymentMethodId) {
        const response = await fetch('/cards.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'save_card', customerId, paymentMethodId })
        });
        const data = await response.json();
        if (!response.ok) throw new Error(data.error);
        console.log('Card saved:', data.status);
    }

    async function listSavedCards(customerId) {
        const response = await fetch('/cards.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'list_cards', customerId })
        });
        const data = await response.json();
        if (!response.ok) throw new Error(data.error);

        const savedCardsList = document.getElementById('saved-cards');
        //savedCardsList.innerHTML = ''; // Clear previous list
        data.paymentMethods.forEach(card => {
            const listItem = document.createElement('div');
            listItem.classList.add('cards-container');
            listItem.classList.add('my-3');
            
            listItem.onmouseover = function() {
                listItem.style.backgroundColor = '#062872';
            };
            listItem.onmouseout = function() {
                listItem.style.backgroundColor = '#130924';
            };
            listItem.onclick = function() {
                document.getElementById('selected-card').style.display = 'flex';
                document.getElementById('card-last-num').textContent = `Tarjeta de débito con terminación ${card.card.last4}`;
            };
            
            listItem.style.display = 'flex';
            const divimg = document.createElement('div');
            divimg.classList.add('img-container');
            divimg.style.width = '30%';
            divimg.style.height = 'auto';
            divimg.style.backgroundColor = '#062872';
            divimg.style.borderRadius = '10px';
            divimg.style.padding = '10px';
            divimg.style.margin = '10px';
            const img = document.createElement('img');
            img.style.width = '100%';
            img.style.height = '40px';
            img.style.objectFit = 'contain';
            const text  = document.createElement('p');
            text.style.margin = '10px';
            text.style.width = '50%';
            text.textContent = `Tarjeta de débito con terminación ${card.card.last4}`;
            if(card.card.brand == 'visa') {
                img.src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/1200px-Visa_Inc._logo.svg.png';
            } else if (card.card.brand == 'mastercard') {
                img.src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/1200px-MasterCard_Logo.svg.png';
            } else if (card.card.brand == 'amex') {
                img.src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/American_Express_logo.svg/1200px-American_Express_logo.svg.png';
            } else {
            }
            savedCardsList.appendChild(listItem);
            listItem.appendChild(divimg);
            divimg.appendChild(img);
            listItem.appendChild(text);

        });
    }
});

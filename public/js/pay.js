// This is your test publishable API key.
const stripe = Stripe("pk_test_51PvWxbRvdpBHBVcf001TLOPU54vHnmeZPZ9PD6XsdYxPsFR6C5pAxCu0LYwmuiWw2QTkQF4sFQhgLXaId0l8kbX500egiTdDY1");

// The items the customer wants to buy
const items = [];

const selected = [];

let elements;

console.log(JSON.stringify({ action: 'checkout', items: items }));


document.addEventListener("DOMContentLoaded", function () {
    fillcart();

    document.querySelector("#payment-form").addEventListener("submit", handleSubmit);

});


function fillcart(){

    const carrito = localStorage.getItem('Carrito');

    if (carrito) {
        const carritoArray = JSON.parse(carrito);
        carritoArray.forEach((element, index) => {
            console.log(element.ID_curso);
            fetch('/getCourse', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ ID_curso: element.ID_curso })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                fillContainer(data, element.porNivel, index);  // Pass index directly here
            })
            .then(() => {
                console.log(items);
                let total = 0;
                items.forEach((item, index) => {
                    total += parseFloat(item.amount);
                });
                if(total > 10){
                    initialize();
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }
    
}

function fillContainer(data, porNivel, index) {
    container = document.querySelector("#container");

    const levelsContainer = document.createElement('div');
    levelsContainer.classList.add('levels-container', 'd-flex', 'flex-column', 'mb-4');
    levelsContainer.style.fontSize = '.8rem';

    levelsContainer.innerHTML = `
    <div class="header p-3 row ">
        <div class="col">
            <h6 style="font-size: .7rem"> ${data.categoria} </h6>
            <h3>${data.titulo}</h3>
            <p>Creado por ${data.nombres + " " + data.apellido_paterno + " " + data.apellido_materno }</p>
            <div class="star-container">
                ${getStars(data.calificacion)}
            </div>
            <p>(${data.n_comentarios} calificaciones)</p>
        </div>
    </div>
    `;

    selected.push({ index: index, ID_curso: data.ID_curso, porNivel: porNivel, ID_nivel : 1 });

    if(porNivel == true){
        items.push({ id: index, amount: data.niveles[0].precio });
        levelsContainer.innerHTML += `
        <div class="row pt-2 px-3">
            <div class="col d-flex align-items-center">
                <h5 style="font-size: .8rem">Nivel:</h5>
                <form class="ml-2 dark">
                    <select class="form-select" id="Select${index}" onchange="changePrice(${index})" style="width: 100%">
                        ${data.niveles.map(nivel => {
                            return `<option value="${nivel.ID_nivel}">${nivel.titulo}</option>`;
                        }).join('')}
                    </select>
                    ${data.niveles.map(nivel => {
                        return `<input type="hidden" id="InputPrecio${index}${nivel.ID_nivel}" value="${nivel.precio}">`;
                    }).join('')}
                </form>
            </div>
            <div class="col-auto">
                <h5 style="font-size: .8rem" id="Precio${index}">Costo: $${data.niveles[0].precio} MXN</h5>
            </div>
        </div>
        `;
    } else {
        items.push({ id: index, amount: data.precio });
        levelsContainer.innerHTML += `
        <div class="row pt-2 px-3 d-flex justify-content-end">
            <div class="col-auto ">
                <h5 style="font-size: .8rem" id="Precio${index}" >Costo: $${data.precio} MXN</h5>
            </div>
        </div>
        `;
    }

    container.appendChild(levelsContainer);
}

function changePrice(index) {
    const select = document.querySelector(`#Select${index}`);
    const selectedNivelID = select.value;
    
    const precioInput = document.querySelector(`#InputPrecio${index}${selectedNivelID}`);
    
    if (precioInput) {
        document.querySelector(`#Precio${index}`).textContent = `Costo: $${precioInput.value} MXN`;
        items[index].amount = precioInput.value;
        selected[index].ID_nivel = selectedNivelID;
    } else {
        console.error('Precio input not found for selected nivel');
    }

    console.log(items);
    let total = 0;
    items.forEach((item, index) => {
        total += parseFloat(item.amount);
    });
    if(total > 10){
        initialize();
    }
}


function getStars(rating) {
    const fullStars = Math.round(rating);
    const emptyStars = 5 - fullStars;

    let starsHTML = '';

    for (let i = 0; i < fullStars; i++) {
        starsHTML += `<img src="images/estrella.png" alt="estrella">`;
    }

    for (let i = 0; i < emptyStars; i++) {
        starsHTML += `<img src="images/estrellaMala.png" alt="estrella">`;
    }

    return starsHTML;
}

async function initialize() {
    try {
        const response = await fetch('/stripeAPI', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'checkout',
                items: items,
                selectedCourses: selected
            })
        });

        const data = await response.json();
        
        if (!response.ok || data.error) {
            console.error(data.error || 'Server returned an error');
            return;
        }

        const { clientSecret } = data;

        const appearance = {
            theme: 'stripe',
            variables: {
                colorPrimary: '#5DA84E',
                colorBackground: '#130924',
                colorText: '#ffffff',
                colorDanger: '#df1b41',
                fontFamily: 'Ideal Sans, system-ui, sans-serif',
                spacingUnit: '2px',
                borderRadius: '4px',
            }
        };

        elements = stripe.elements({ clientSecret, appearance });
        const paymentElementOptions = {
            layout: "tabs",
        };

        const paymentElement = elements.create("payment", paymentElementOptions);
        paymentElement.mount("#payment-element");
    } catch (error) {
        console.error('Error:', error);
    }
}


async function handleSubmit(e) {
    e.preventDefault();
    setLoading(true);

    const { error } = await stripe.confirmPayment({
        elements,
        confirmParams: {
        return_url: window.location.origin + "/payment-success",
        },
    });

    // This point will only be reached if there is an immediate error when
    // confirming the payment. Otherwise, your customer will be redirected to
    // your `return_url`. For some payment methods like iDEAL, your customer will
    // be redirected to an intermediate site first to authorize the payment, then
    // redirected to the `return_url`.
    if (error.type === "card_error" || error.type === "validation_error") {
        showMessage(error.message);
    } else {
        showMessage("An unexpected error occurred.");
    }

    setLoading(false);
}

// ------- UI helpers -------

function showMessage(messageText) {
    const messageContainer = document.querySelector("#payment-message");

    messageContainer.classList.remove("hidden");
    messageContainer.textContent = messageText;

    setTimeout(function () {
        messageContainer.classList.add("hidden");
        messageContainer.textContent = "";
    }, 4000);
}

// Show a spinner on payment submission
function setLoading(isLoading) {
    if (isLoading) {
        // Disable the button and show a spinner
        document.querySelector("#submit").disabled = true;
        document.querySelector("#spinner").classList.remove("hidden");
        document.querySelector("#button-text").classList.add("hidden");
    } else {
        document.querySelector("#submit").disabled = false;
        document.querySelector("#spinner").classList.add("hidden");
        document.querySelector("#button-text").classList.remove("hidden");
    }
}


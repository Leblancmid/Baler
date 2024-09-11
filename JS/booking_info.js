
// booking form
document.addEventListener("DOMContentLoaded", function () {
    // Get the radio input and checkbox container
    const checkboxContainer = document.querySelector('.checkbox-container');
    const totalPrice = localStorage.getItem('newTotalPrice');

    if (totalPrice) {
        // Convert the stored price to a number
        const total = parseFloat(totalPrice);

        // Display the total price
        document.getElementById('booking-total-amount').textContent = `₱${total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    } else {
        console.log('No total price found in local storage.');
    }

    document.querySelectorAll('.amenities-option input').forEach((input) => {
        input.addEventListener('change', () => {
            checkboxContainer.style.display = input.id === 'yesAmenities' ? 'flex' : 'none';
        });
    });

    const addButton = document.getElementById("add-id");
    const inputsContainer = document.getElementById("input-container");
    const totalInputs = document.getElementById("total-counts");

    let inputCount = 0;

    addButton.addEventListener("click", function () {
        inputCount++;
        const inputContainer = document.createElement("div");
        inputContainer.classList.add("id-container");

        const idInput = document.createElement("input");
        idInput.setAttribute("type", "text");
        idInput.classList.add("id-input");
        idInput.setAttribute("placeholder", "ID Number");
        inputContainer.appendChild(idInput);

        const selectInput = document.createElement("select");
        const options = [
            { value: "idPWD", text: "PWD" },
            { value: "idSenior", text: "Senior" }
        ];
        options.forEach(option => {
            const optionElement = document.createElement("option");
            optionElement.value = option.value;
            optionElement.textContent = option.text;
            selectInput.appendChild(optionElement);
        });
        inputContainer.appendChild(selectInput);

        const removeButton = document.createElement("button");
        removeButton.innerHTML = '<i class="fa-solid fa-xmark"></i>';
        removeButton.classList.add("id-remove");
        removeButton.addEventListener("click", function () {
            inputContainer.remove();
            inputCount--;
            totalInputs.textContent = inputCount;
        });
        inputContainer.appendChild(removeButton);

        inputsContainer.appendChild(inputContainer);
        totalInputs.textContent = inputCount;
    });

    const messageAlert = document.querySelector('.message-alert');
    const messageNote = document.querySelector('.alert-message');
    const okButton = document.querySelector('.ok-button');
    const inputField = document.querySelector('.add-pax input');

    okButton.addEventListener("click", () => {
        messageAlert.style.display = "none";
    });

    inputField.value = 0;

    inputField.addEventListener('input', function () {
        const inputValue = this.value;
        if (inputValue.startsWith('0') && inputValue.length > 1) {
            this.value = inputValue.substring(1);
        }
        const numericValue = parseInt(this.value);
        if (numericValue < 0 || numericValue > 2) {
            this.value = 0;
            messageNote.textContent = "max of additional 2 pax only";
            messageAlert.style.display = "flex";
            inputField.style.outline = "1px solid red";
        } else {
            inputField.style.outline = "none";
        }
    });
    const nextButton = document.querySelector(".next-button");

    nextButton.addEventListener("click", () => {
        document.getElementById('bookingInfoForm').submit(); // Submit the form
    });

});
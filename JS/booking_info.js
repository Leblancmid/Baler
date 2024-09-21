// booking form
document.addEventListener("DOMContentLoaded", function () {
    // Get the radio input and checkbox container
    const checkboxContainer = document.querySelector('.checkbox-container');
    const totalPriceElement = document.getElementById('booking-total-amount');
    let totalPrice = parseFloat(localStorage.getItem('newTotalPrice')) || 0; // Get stored total or initialize to 0

    // Display the initial total price
    totalPriceElement.textContent = `₱${totalPrice.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;

    // Show/hide checkbox container based on amenities option
    document.querySelectorAll('.amenities-option input').forEach((input) => {
        input.addEventListener('change', () => {
            checkboxContainer.style.display = input.id === 'yesAmenities' ? 'flex' : 'none';

            // Reset amenities when 'No' is selected
            if (input.id === 'noneAmenities') {
                checkboxContainer.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                    checkbox.checked = false;
                });
                updateTotal(); // Reset total when no amenities are selected
            }
        });
    });

    // Add event listener for each checkbox to update the total price
    document.querySelectorAll('.checkbox-container input[type="checkbox"]').forEach((checkbox) => {
        checkbox.addEventListener('change', updateTotal);
    });

    updateTotal();

    // Function to update the total price
    document.getElementById('addPax').addEventListener('input', updateTotal);

    function updateTotal() {
        console.log('updateTotal triggered'); // Check if the function is triggered

        let amenitiesTotal = 0;

        // Check which amenities are selected and update total accordingly
        if (document.getElementById('gasul').checked) {
            amenitiesTotal += 300;
        }
        if (document.getElementById('karaoke').checked) {
            amenitiesTotal += 500;
        }

        console.log('amenitiesTotal:', amenitiesTotal); // Check if the amenities are added correctly

        // Get the number of additional pax
        const addPax = parseInt(document.getElementById('addPax').value) || 0;
        let paxTotal = addPax * 350;  // 350 per additional pax
        console.log('paxTotal:', paxTotal); // Check if the pax total is calculated correctly

        // Calculate the new total
        const newTotal = totalPrice + amenitiesTotal + paxTotal;
        console.log('newTotal:', newTotal); // Check if the total is calculated correctly


        // Update the displayed total
        const totalPriceElement = document.getElementById('booking-total-amount'); // Your total display element
        totalPriceElement.textContent = `₱${newTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;

        let totalElement = document.getElementById('hidden-total-amount');
        totalElement.value = newTotal;
    }


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

    let firstName = document.getElementById('clientFirstName');
    let lastName = document.getElementById('clientLastName');
    let email = document.getElementById('clientEmail');
    let contact = document.getElementById('clientContact');
    let address = document.getElementById('clientAddress');
    const errorContainer = document.querySelector(".message-alert");
    const errorMessage = document.querySelector(".alert-message");

    nextButton.addEventListener("click", () => {
        if (!(firstName.value) || !(lastName.value) || !(email.value) || !(contact.value) || !(address.value)) {
            errorContainer.style.display = "flex";
            errorMessage.textContent = "Please complete all required fields.";
            return;
        }
        document.getElementById('bookingInfoForm').submit(); // Submit the form
    });

    nextButton.style.backgroundColor = 'var(--blue-1)';
    nextButton.style.cursor = 'pointer';
    nextButton.addEventListener('mouseover', () => {
        nextButton.style.backgroundColor = 'var(--blue-4)';
    });
    nextButton.addEventListener('mouseout', () => {
        nextButton.style.backgroundColor = 'var(--blue-1)';
    });
});

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date-wise Data Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            height: 100%;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        form {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            /* Added to space out the labels */
        }

        form label {
            display: inline-block;
            width: 30%;
            /* Adjust as needed */
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;

        }

        form input[type="date"],
        form input[type="text"],
        form input[type="number"],
        form button,
        form select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            width: 65%;
            /* Adjust as needed */
        }

        form button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #45a049;
        }

        #dataContainer {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        textarea {
            width: calc(100% - 16px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            resize: vertical;
        }

        .submit-button {
            width: 200px;
            margin: 20px auto;
            /* Auto margins horizontally center the button */
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            /* text-align: center; This aligns the text inside the button, not the button itself */
            cursor: pointer;
        }

        .button-container {
            text-align: center;
        }

        .highlight-monday {
            background-color: #B1B1DF;
            /* You can adjust the color as needed */
        }

        .package {
            margin-bottom: 5%;

        }

        .highlighted-option {
            background-color: yellow;
            /* Change the background color to highlight */
            color: black;
            /* Change the text color for better visibility */
        }
        .remove-row-button {
        background-color: red; /* Change this to your desired color */
        color: white; /* Text color */
        border: none;
        padding: 10px;
        cursor: pointer;
    }
    
    .remove-row-button:hover {
        background-color: darkred; /* Optional: Change color on hover */
    }
    </style>
</head>

<body>

    <section class="home-section" >
        <h2>Date-wise Data Generator</h2>


        <form id="dateForm" method="post" enctype="multipart/form-data">

            <div>
                <?php
                // Get the ID from the URL using CodeIgniter's URI segment
                $id_from_url = (string)$this->uri->segment(4); // Assign the value to $id_from_url and cast it to string
                ?>

            </div>


            <div class="package">
                <?php
                foreach ($addnewclient1 as $data) {
                    if ($data['id'] == $id_from_url) {
                        foreach ($package as $item) {
                            if ($data['package'] === $item['Package_name']) {
                                // Echo each quantity and name separately with borders
                                echo "<div style='border: 1px solid black; margin-bottom: 5px; padding: 5px; display: inline-block; margin-left:20px '>";
                                echo "<div style='border-bottom: 1px solid black;'>Quantity: " . $item['quantity'] . "</div>";
                                echo "<div>Name: " . $item['name'] . "</div>";
                                echo "</div>"; // Close the wrapper div
                            }
                        }
                    }
                }
                ?>

<?php
                foreach ($addnewclient1 as $data) {
                    if ($data['id'] == $id_from_url) {
                        foreach ($Clientpackage as $item) {
                            if ($data['id'] === $item['Client_id']) {
                                if($item['status'] == 1){
                                // Echo each quantity and name separately with borders
                                echo "<div style='border: 1px solid black; margin-bottom: 5px; padding: 5px; display: inline-block; margin-left:20px '>";
                                echo "<div style='border-bottom: 1px solid black;'>Quantity: " . $item['quantity'] . "</div>";
                                echo "<div>Name: " . $item['name'] . "</div>";
                                echo "</div>"; // Close the wrapper div
                            }
                        }
                        }
                    }
                }
                ?>

            </div>








            <div>
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" name="startDate" required>
                <label for="numberOfDays">Number of Days:</label>
                <input type="number" id="numberOfDays" name="numberOfDays" min="1" required>
                <label for="calenderType">Calendar type:</label>

                <!-- <select id="calender" name="calender" value="<php echo set_value('calender', $result['calendar_type']); ?>"> -->

                <input type="hidden" name="cr_Status" value="1">

                <!-- <td>Alternet Days</td> -->


                <?php
                // Check if the ID is not empty and the addnewclient1 array is not empty
                if (!empty($id_from_url) && !empty($addnewclient1)) {
                    // Loop through the addnewclient1 array to find the matching ID
                    foreach ($addnewclient1 as $userData) {
                        // Check if the ID from the URL matches the ID in the addnewclient1 array
                        if ($userData['id'] == $id_from_url) {
                            // If the IDs match, display the calendar_type value
                ?>
                            <td><?php echo $userData['calendar_type']; ?></td>
                <?php
                            // Break the loop since we found the matching ID
                            break;
                        }
                    }
                }
                ?>

            </div>
            <?php
            // Check if the ID is not empty and the addnewclient1 array is not empty
            if (!empty($id_from_url) && !empty($addnewclient1)) {
                // Loop through the addnewclient1 array to find the matching ID
                foreach ($addnewclient1 as $userData) {
                    // Check if the ID from the URL matches the ID in the addnewclient1 array
                    if ($userData['id'] == $id_from_url) {
                        // If the IDs match, display the calendar_type value
            ?>
                        <td><?php $userData['image']; ?></td>
            <?php
                        // Break the loop since we found the matching ID
                        break;
                    }
                }
            }
            ?>
<input type="hidden" id="image" name="imageLogo" value="<?php echo htmlspecialchars(isset($userData['image']) ? $userData['image'] : ''); ?>">



            <?php
            // Check if the ID is not empty and the addnewclient1 array is not empty
            if (!empty($id_from_url) && !empty($addnewclient1)) {
                // Loop through the addnewclient1 array to find the matching ID
                foreach ($addnewclient1 as $userData) {
                    // Check if the ID from the URL matches the ID in the addnewclient1 array
                    if ($userData['id'] == $id_from_url) {
                        // If the IDs match, display the calendar_type value
            ?>
                        <td><?php $userData['brand_name']; ?></td>
            <?php
                        // Break the loop since we found the matching ID
                        break;
                    }
                }
            }
            ?>
            <input type="hidden" id="brand_name" name="brand_name" value="<?php echo htmlspecialchars($userData['brand_name']); ?>">


            <input type="hidden" name="client_id" value="<?php echo $id_from_url; ?>">




            <button type="submit">Generate Calendar</button>
            <div id="dataContainer"></div>

            <!-- Separate submit button -->
            <div class="button-container">
                <button class="submit-button" onclick="submitForm()">Submit</button>
            </div>

            </div>

            <?php
$serviceNamesArray = []; // Create an empty array to store service names and quantities

// Loop through the data to collect service names and quantities from the $package array
foreach ($addnewclient1 as $data) {
    if ($data['id'] == $id_from_url) {
        foreach ($package as $item) {
            if ($data['package'] === $item['Package_name']) {
                // Add each name and quantity to the serviceNamesArray
                $serviceNamesArray[] = [
                    'name' => $item['name'],
                    'quantity' => $item['quantity'] // Assuming quantity is stored in $data array
                ];
            }
        }

        // Loop through the data to collect service names and quantities from the $Clientpackage array
        foreach ($Clientpackage as $item) {
            if ($data['id'] === $item['Client_id']) {
                if($item['status'] == 1){
                // Add each name and quantity to the serviceNamesArray
                $serviceNamesArray[] = [
                    'name' => $item['name'],
                    'quantity' => $item['quantity'] // Assuming quantity is stored in $data array
                ];
            }
        }
        }
    }
}

// Encode the PHP array to JSON format if needed
$serviceNamesJSON = json_encode($serviceNamesArray);
// print_r($serviceNamesJSON);
?>




<script>
document.getElementById("dateForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var startDate = new Date(document.getElementById("startDate").value);
    var numberOfDays = parseInt(document.getElementById("numberOfDays").value);
    generateData(startDate, numberOfDays);
});

function generateData(startDate, numberOfDays) {
    var dataContainer = document.getElementById("dataContainer");
    dataContainer.innerHTML = "";
    var currentDate = new Date(startDate);
    var table = document.createElement("table");
    var headerRow = table.insertRow();
    headerRow.innerHTML = "<th>Date</th><th>Service</th><th>Additional Information</th>";

    var daysToHighlight = "<?php echo $userData['calendar_type']; ?>"; // Placeholder for PHP

    for (var i = 0; i < numberOfDays; i++) {
        var formattedDate = formatDate(currentDate);
        var newRow = table.insertRow();
        var dateCell = newRow.insertCell(0);
        var serviceCell = newRow.insertCell(1);
        var additionalInfoCell = newRow.insertCell(2);
        dateCell.textContent = formattedDate;

        if (daysToHighlight.includes(getDayName(currentDate)) || daysToHighlight.includes(getDateName(currentDate))) {
            dateCell.classList.add("highlight-monday");
            serviceCell.classList.add("highlight-monday");
            additionalInfoCell.classList.add("highlight-monday");
        }

        var serviceNameSelect = document.createElement("select");
        serviceNameSelect.name = "serviceName[]";
        serviceNameSelect.style.width = "100%";

        var serviceNames = JSON.parse('<?= $serviceNamesJSON ?>');

        var emptyOption = document.createElement("option");
        emptyOption.text = "-- Select --";
        emptyOption.value = "";
        serviceNameSelect.appendChild(emptyOption);

        for (var j = 0; j < serviceNames.length; j++) {
            var serviceName = serviceNames[j].name;
            var quantity = serviceNames[j].quantity;

            for (var k = 1; k <= quantity; k++) {
                var option = document.createElement("option");
                option.value = serviceName + " (" + k + ")";
                option.text = serviceName + " (" + k + ")";
                serviceNameSelect.appendChild(option);
            }
        }

        serviceNameSelect.onchange = function() {
            handleOptionSelection();
        };

        serviceCell.appendChild(serviceNameSelect);

        var detailsInputName = document.createElement("input");
        detailsInputName.type = "text";
        detailsInputName.name = "Name[]";
        detailsInputName.placeholder = "Name";
        detailsInputName.style.width = "50%";
        detailsInputName.style.marginTop = "20px";
        serviceCell.appendChild(detailsInputName);

        var detailsInputDetails = document.createElement("input");
        detailsInputDetails.type = "text";
        detailsInputDetails.name = "details[]";
        detailsInputDetails.placeholder = "Details";
        detailsInputDetails.style.width = "50%";
        detailsInputDetails.style.marginTop = "20px";
        serviceCell.appendChild(detailsInputDetails);

        var additionalInfoTextarea = document.createElement("textarea");
        additionalInfoTextarea.name = "additionalInfo[]";
        additionalInfoTextarea.placeholder = "Additional Information";
        additionalInfoTextarea.rows = "3";
        additionalInfoTextarea.style.width = "100%";
        additionalInfoTextarea.style.marginTop = "20px";
        additionalInfoCell.appendChild(additionalInfoTextarea);

        var rowButton = document.createElement("button");
        rowButton.textContent = "Add Row";
        rowButton.classList.add("add-row-button");

        rowButton.addEventListener("click", function(event) {
            event.preventDefault();
            addRow(this.closest("tr"));
        });

        additionalInfoCell.appendChild(rowButton);
        currentDate.setDate(currentDate.getDate() + 1);
    }

    dataContainer.appendChild(table);
    handleOptionSelection(); // Update options after initial generation
}

function formatDate(date) {
    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var day = days[date.getDay()];
    var year = date.getFullYear();
    var month = (date.getMonth() + 1).toString().padStart(2, '0');
    var dayOfMonth = date.getDate().toString().padStart(2, '0');
    return day + ', ' + year + "-" + month + "-" + dayOfMonth;
}

function handleOptionSelection() {
    var serviceSelects = document.getElementsByName("serviceName[]");
    var selectedValues = [];

    // Gather selected values
    for (var i = 0; i < serviceSelects.length; i++) {
        if (serviceSelects[i].value !== "") {
            selectedValues.push(serviceSelects[i].value);
        }
    }

    // Disable selected options in other selects
    for (var i = 0; i < serviceSelects.length; i++) {
        var options = serviceSelects[i].options;
        for (var j = 0; j < options.length; j++) {
            if (selectedValues.includes(options[j].value)) {
                options[j].disabled = true;
            } else {
                options[j].disabled = false;
            }
        }
        // Re-disable the selected option in the current select
        if (serviceSelects[i].value !== "") {
            serviceSelects[i].querySelector(`option[value="${serviceSelects[i].value}"]`).disabled = true;
        }
    }
}

function submitForm() {
    var serviceSelects = document.getElementsByName("serviceName[]");
    var form = document.getElementById("dateForm");

    // Remove any existing hidden input fields for selected options
    var existingHiddenInputs = document.querySelectorAll("input[name='selectedOptions[]'], input[name='selectedDates[]']");
    existingHiddenInputs.forEach(function(input) {
        input.parentNode.removeChild(input);
    });

    // Iterate over each service select element
    for (var i = 0; i < serviceSelects.length; i++) {
        var selectedOption = serviceSelects[i].options[serviceSelects[i].selectedIndex];
        if (selectedOption.value !== "") {
            // Create a hidden input field for the selected option
            var hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = "selectedOptions[]";
            hiddenInput.value = selectedOption.value;

            // Add corresponding formattedDate input field
            var dateCell = serviceSelects[i].closest('tr').cells[0];
            var dateHiddenInput = document.createElement("input");
            dateHiddenInput.type = "hidden";
            dateHiddenInput.name = "selectedDates[]";
            dateHiddenInput.value = dateCell.textContent;

            // Append the hidden input fields to the form
            form.appendChild(hiddenInput);
            form.appendChild(dateHiddenInput);
        }
    }

    // Submit the form
    form.submit();
}

function addRow(row) {
    var newRow = row.cloneNode(true);
    var inputs = newRow.querySelectorAll("input, textarea, select");
    inputs.forEach(function(input) {
        if (input.tagName === "SELECT") {
            input.value = "";
            input.onchange = function() {
                handleOptionSelection();
            };
        } else {
            input.value = "";
        }
    });

    var removeRowButton = document.createElement("button");
    removeRowButton.textContent = "Remove Row";
    removeRowButton.classList.add("remove-row-button");
    removeRowButton.addEventListener("click", function(event) {
        event.preventDefault();
        removeRow(this.closest("tr"));
    });

    newRow.querySelector(".add-row-button").insertAdjacentElement('afterend', removeRowButton);
    newRow.querySelector(".add-row-button").remove();
    row.parentNode.insertBefore(newRow, row.nextSibling);

    handleOptionSelection(); // Re-run selection handling to update options
}

function removeRow(row) {
    row.parentNode.removeChild(row);
    handleOptionSelection(); // Re-run selection handling to update options
}

function getDayName(date) {
    var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    return daysOfWeek[date.getDay()];
}

function getDateName(date) {
    return date.getDate().toString();
}
</script>

        </form>
    </section>
</body>

</html>
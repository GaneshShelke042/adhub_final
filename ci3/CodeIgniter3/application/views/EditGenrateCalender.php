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
            background-color: red;
            /* Change this to your desired color */
            color: white;
            /* Text color */
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .remove-row-button:hover {
            background-color: darkred;
            /* Optional: Change color on hover */
        }

        .home-section {
            margin-top: 5% !important;
        }
    </style>
</head>

<body>

    <section class="home-section">
        <h2>Date-wise Data Generator</h2>

        <form id="dateForm" method="post" enctype="multipart/form-data">

            <div>
                <?php
                // Get the ID from the URL using CodeIgniter's URI segment
                $id_from_url = $this->uri->segment(3); // Assign the value to $id_from_url and cast it to string
                ?>
            </div>


            <div class="package">
                <?php
                foreach ($check as $data) {
                    if ($data['id'] == $id_from_url) {
                        foreach ($Clientpackage as $item) {
                            if ($data['Client_id'] === $item['Client_id']) {
                                if ($item['status'] == 1) {
                                    // Echo each quantity and name separately with borders
                                    echo "<div style='border: 1px solid black; margin-bottom: 5px; padding: 5px; display: inline-block; margin-left:20px '>";
                                    echo "<div style='border-bottom: 1px solid black;'>name: " . $item['name'] . "</div>";
                                    echo "<div>Quantity: " . $item['quantity'] . "</div>";
                                    echo "</div>"; // Close the wrapper div
                                }
                            }
                        }
                    }
                }
                ?>


                <?php
                foreach ($check as $data) {
                    if ($data['id'] == $id_from_url) {
                        foreach ($addnewclient1 as $item) {
                            if ($data['Client_id'] === $item['id']) {
                                foreach ($package as $p) {
                                    if ($p['Package_name'] == $item['package']) {


                                        // Echo each quantity and name separately with borders
                                        echo "<div style='border: 1px solid black; margin-bottom: 5px; padding: 5px; display: inline-block; margin-left:20px '>";
                                        echo "<div style='border-bottom: 1px solid black;'>Name: " . $p['name'] . "</div>";
                                        echo "<div >Quantity: " . $p['quantity'] . "</div>";
                                        echo "</div>"; // Close the wrapper div
                                    }
                                }
                            }
                        }
                    }
                }
                ?>
            </div>

            <div>
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" name="startDate" value="<?php echo !empty($correctdata) ? $correctdata['start_date'] : ''; ?>" required>

                <label for="numberOfDays">Number of Days:</label>
                <input type="number" id="numberOfDays" name="numberOfDays" min="1" value="<?php echo !empty($correctdata) ? $correctdata['number_of_days'] : ''; ?>" required>
                <label for="calenderType">Calendar type:</label>

                <!-- <select id="calender" name="calender" value="<php echo set_value('calender', $result['calendar_type']); ?>"> -->

                <input type="hidden" name="cr_Status" value="1">



                <?php
                if ($addnewclient1[0]["id"] ===  $check[0]['Client_id']) { ?>
                    <td><?php echo $addnewclient1[0]['calendar_type']; ?></td>
                <?php  }  ?>



            </div>

            <button type="submit">Edit Calendar</button>
            <div id="dataContainer"></div>

            <!-- Separate submit button -->
            <div class="button-container">
                <button class="submit-button" onclick="submitForm()">Submit</button>
            </div>
            </div>
            <?php
            $serviceNamesArray = []; // Create an empty array to store service names and quantities
            foreach ($check as $data) {
                if ($data['id'] == $id_from_url) {
                    foreach ($addnewclient1 as $item) {
                        if ($data['Client_id'] === $item['id']) {
                            foreach ($package as $p) {
                                if ($p['Package_name'] == $item['package']) {

                                    $serviceNamesArray[] = [
                                        'name' => $p['name'],
                                        'quantity' => $p['quantity'] // Assuming quantity is stored in $data array
                                    ];
                                }
                            }
                        }
                    }
                }
            }
            ?>
            <?php

            foreach ($check as $data) {
                if ($data['id'] == $id_from_url) {
                    foreach ($Clientpackage as $item) {
                        if ($data['Client_id'] === $item['Client_id']) {
                            if ($item['status'] == 1) {

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
            $oldd = json_encode($olddata);
            // echo "<pre>";
            // print_r($olddata);
            // print_r($serviceNamesJSON);
            ?>
        </form>


        <!-- 
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                function handleOptionSelection() {
                    var serviceSelects = document.getElementsByName("serviceName[]");
                    var selectedValues = [];

                    for (var i = 0; i < serviceSelects.length; i++) {
                        if (serviceSelects[i].value !== "") {
                            selectedValues.push(serviceSelects[i].value);
                        }
                    }

                    for (var i = 0; i < serviceSelects.length; i++) {
                        var options = serviceSelects[i].options;
                        for (var j = 0; j < options.length; j++) {
                            if (selectedValues.includes(options[j].value)) {
                                options[j].disabled = true;
                            } else {
                                options[j].disabled = false;

                            }
                        }
                        if (serviceSelects[i].value !== "") {
                            serviceSelects[i].querySelector(`option[value="${serviceSelects[i].value}"]`).disabled = true;
                        }
                    }
                }

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

                    var daysToHighlight = "<?php echo $addnewclient1[0]['calendar_type']; ?>";
                    var serviceNames = JSON.parse(<?= json_encode($serviceNamesJSON) ?>);
                    var olddata = JSON.parse(<?= json_encode($oldd) ?>);
                    console.log(olddata);
                    var oldDataMap = olddata.reduce((map, element) => {
                        map[element['deadline_datetime']] = element;
                        return map;
                    }, {});

                    for (var i = 0; i < numberOfDays; i++) {
                        var formattedDate = formatDate(currentDate);
                        var newRow = table.insertRow();
                        var dateCell = newRow.insertCell(0);
                        var serviceCell = newRow.insertCell(1);
                        var additionalInfoCell = newRow.insertCell(2);
                        dateCell.textContent = formattedDate;

                        let data = formattedDate.split(', ');

                        if (daysToHighlight.includes(getDayName(currentDate)) || daysToHighlight.includes(getDateName(currentDate))) {
                            dateCell.classList.add("highlight-monday");
                            serviceCell.classList.add("highlight-monday");
                            additionalInfoCell.classList.add("highlight-monday");
                        }

                        var formattedDateInput = document.createElement("input");
                        formattedDateInput.type = "hidden";
                        formattedDateInput.name = "formattedDate[]";
                        formattedDateInput.value = formattedDate;
                        serviceCell.appendChild(formattedDateInput);

                        var serviceNameSelect = document.createElement("select");
                        serviceNameSelect.name = "serviceName[]";
                        serviceNameSelect.style.width = "100%";

                        var emptyOption = document.createElement("option");
                        emptyOption.text = "-- Select --";
                        emptyOption.value = "";
                        serviceNameSelect.appendChild(emptyOption);

                        if (oldDataMap[data[1]]) {
                            var element = oldDataMap[data[1]];
                            console.log('ele')
                            console.log(element)
                            for (var j = 0; j < serviceNames.length; j++) {
                                var serviceName = serviceNames[j].name;
                                var quantity = serviceNames[j].quantity;
                                for (var k = 1; k <= quantity; k++) {
                                    var option = document.createElement("option");
                                    option.value = serviceName + " (" + k + ")";
                                    option.text = serviceName + " (" + k + ")";
                                    serviceNameSelect.appendChild(option);
                                    if (element['task_name'] == serviceName + " (" + k + ")") {
                                        option.selected = true;
                                        option.disabled = true;
                                        serviceCell.appendChild(serviceNameSelect);

                                        var detailsInputName = document.createElement("input");
                                        detailsInputName.type = "text";
                                        detailsInputName.name = "Name[]";
                                        // detailsInputName.value = element['name'];
                                        detailsInputName.placeholder = "Name";
                                        detailsInputName.style.width = "50%";
                                        detailsInputName.style.marginTop = "20px";
                                        serviceCell.appendChild(detailsInputName);

                                        var detailsInputDetails = document.createElement("input");
                                        detailsInputDetails.type = "text";
                                        detailsInputDetails.name = "details[]";
                                        // detailsInputDetails.value = element['details'];
                                        detailsInputDetails.placeholder = "Details";
                                        detailsInputDetails.style.width = "50%";
                                        detailsInputDetails.style.marginTop = "20px";
                                        serviceCell.appendChild(detailsInputDetails);

                                        var additionalInfoTextarea = document.createElement("textarea");
                                        additionalInfoTextarea.name = "additionalInfo[]";
                                        // additionalInfoTextarea.value = element['additional_info'];
                                        additionalInfoTextarea.placeholder = "Additional Information";
                                        additionalInfoTextarea.rows = "3";
                                        additionalInfoTextarea.style.width = "100%";
                                        additionalInfoTextarea.style.marginTop = "20px";
                                        additionalInfoCell.appendChild(additionalInfoTextarea);
                                    }






                                }
                            }


                        } else {
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

                        }

                        serviceNameSelect.onchange = function() {
                            handleOptionSelection();
                        };
                        // serviceCell.appendChild(serviceNameSelect);

                        // var detailsInputName = document.createElement("input");
                        // detailsInputName.type = "text";
                        // detailsInputName.name = "Name[]";
                        // detailsInputName.placeholder = "Name";
                        // detailsInputName.style.width = "50%";
                        // detailsInputName.style.marginTop = "20px";
                        // serviceCell.appendChild(detailsInputName);

                        // var detailsInputDetails = document.createElement("input");
                        // detailsInputDetails.type = "text";
                        // detailsInputDetails.name = "details[]";
                        // detailsInputDetails.placeholder = "Details";
                        // detailsInputDetails.style.width = "50%";
                        // detailsInputDetails.style.marginTop = "20px";
                        // serviceCell.appendChild(detailsInputDetails);

                        // var additionalInfoTextarea = document.createElement("textarea");
                        // additionalInfoTextarea.name = "additionalInfo[]";
                        // additionalInfoTextarea.placeholder = "Additional Information";
                        // additionalInfoTextarea.rows = "3";
                        // additionalInfoTextarea.style.width = "100%";
                        // additionalInfoTextarea.style.marginTop = "20px";
                        // additionalInfoCell.appendChild(additionalInfoTextarea);

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
                    handleOptionSelection();
                }

                function formatDate(date) {
                    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    var day = days[date.getDay()];
                    var year = date.getFullYear();
                    var month = (date.getMonth() + 1).toString().padStart(2, '0');
                    var dayOfMonth = date.getDate().toString().padStart(2, '0');
                    return day + ', ' + year + "-" + month + "-" + dayOfMonth;
                }

                function getDayName(date) {
                    var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    return daysOfWeek[date.getDay()];
                }

                function getDateName(date) {
                    var dayOfMonth = date.getDate();
                    return dayOfMonth;
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

                    var dateCell = row.cells[0];
                    var formattedDate = dateCell.textContent;
                    var formattedDateInput = document.createElement("input");
                    formattedDateInput.type = "hidden";
                    formattedDateInput.name = "formattedDate[]";
                    formattedDateInput.value = formattedDate;
                    newRow.querySelector(".add-row-button").insertAdjacentElement('beforebegin', formattedDateInput);

                    var removeRowButton = document.createElement("button");
                    removeRowButton.textContent = "Remove Row";
                    removeRowButton.classList.add("remove-row-button");
                    removeRowButton.addEventListener("click", function(event) {
                        event.preventDefault();
                        removeRow(this.closest("tr"));
                        handleOptionSelection();
                    });

                    newRow.querySelector(".add-row-button").insertAdjacentElement('afterend', removeRowButton);
                    newRow.querySelector(".add-row-button").remove();
                    row.parentNode.insertBefore(newRow, row.nextSibling);

                    handleOptionSelection();
                }

                function removeRow(row) {
                    row.parentNode.removeChild(row);
                    handleOptionSelection();
                }

                document.querySelector(".submit-button").addEventListener("click", function(event) {
                    event.preventDefault();
                    submitForm();
                });

                function submitForm() {
                    var serviceSelects = document.getElementsByName("serviceName[]");
                    var form = document.getElementById("dateForm");

                    // Remove any existing hidden input fields for selected options
                    var existingHiddenInputs = document.querySelectorAll("input[name='selectedOptions[]']");
                    existingHiddenInputs.forEach(function(input) {
                        input.parentNode.removeChild(input);
                    });

                    // Iterate over each service select element
                    for (var i = 0; i < serviceSelects.length; i++) {
                        var selectedOption = serviceSelects[i].options[serviceSelects[i].selectedIndex];

                        // Create a hidden input field for the selected option
                        var hiddenInput = document.createElement("input");
                        hiddenInput.type = "hidden";
                        hiddenInput.name = "selectedOptions[]";
                        hiddenInput.value = selectedOption.value;
                        // Append the hidden input field to the form
                        form.appendChild(hiddenInput);

                    }

                    // Submit the form
                    form.submit();
                }

             

            });
        </script> -->


        <!-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                function handleOptionSelection() {
                    var serviceSelects = document.getElementsByName("serviceName[]");
                    var selectedValues = [];

                    for (var i = 0; i < serviceSelects.length; i++) {
                        if (serviceSelects[i].value !== "") {
                            selectedValues.push(serviceSelects[i].value);
                        }
                    }

                    for (var i = 0; i < serviceSelects.length; i++) {
                        var options = serviceSelects[i].options;
                        for (var j = 0; j < options.length; j++) {
                            if (selectedValues.includes(options[j].value)) {
                                options[j].disabled = true;
                            } else {
                                options[j].disabled = false;
                            }
                        }
                        if (serviceSelects[i].value !== "") {
                            serviceSelects[i].querySelector(`option[value="${serviceSelects[i].value}"]`).disabled = false;
                        }
                    }
                }

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

                    var daysToHighlight = "<?php echo $addnewclient1[0]['calendar_type']; ?>";
                    var serviceNames = JSON.parse(<?= json_encode($serviceNamesJSON) ?>);
                    var olddata = JSON.parse(<?= json_encode($oldd) ?>);
                    console.log(olddata);
                    var oldDataMap = olddata.reduce((map, element) => {
                        if (!map[element['deadline_datetime']]) {
                            map[element['deadline_datetime']] = [];
                        }
                        map[element['deadline_datetime']].push(element);
                        return map;
                    }, {});

                    for (var i = 0; i < numberOfDays; i++) 
                    {
                        var formattedDate = formatDate(currentDate);
                        var data = formattedDate.split(', ');

                        // Create a row for each entry of the same date
                        if (oldDataMap[data[1]]) {
                            var elements = oldDataMap[data[1]];
                            for (var e = 0; e < elements.length; e++) {
                                createRow(table, formattedDate, elements[e], daysToHighlight, serviceNames);
                            }
                        } else {
                            createRow(table, formattedDate, null, daysToHighlight, serviceNames);
                        }

                        currentDate.setDate(currentDate.getDate() + 1);
                    }
                    dataContainer.appendChild(table);
                    handleOptionSelection();
                }

                function createRow(table, formattedDate, element, daysToHighlight, serviceNames) {
                    var newRow = table.insertRow();
                    var dateCell = newRow.insertCell(0);
                    var serviceCell = newRow.insertCell(1);
                    var additionalInfoCell = newRow.insertCell(2);
                    dateCell.textContent = formattedDate;

                    let data = formattedDate.split(', ');

                    if (daysToHighlight.includes(getDayName(new Date(formattedDate))) || daysToHighlight.includes(getDateName(new Date(formattedDate)))) {
                        dateCell.classList.add("highlight-monday");
                        serviceCell.classList.add("highlight-monday");
                        additionalInfoCell.classList.add("highlight-monday");
                    }

                    var formattedDateInput = document.createElement("input");
                    formattedDateInput.type = "hidden";
                    formattedDateInput.name = "formattedDate[]";
                    formattedDateInput.value = formattedDate;
                    serviceCell.appendChild(formattedDateInput);

                    var serviceNameSelect = document.createElement("select");
                    serviceNameSelect.name = "serviceName[]";
                    serviceNameSelect.style.width = "100%";

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

                    if (element) {
                        serviceNameSelect.value = element['task_name'];

                        var detailsInputName = document.createElement("input");
                        detailsInputName.type = "text";
                        detailsInputName.name = "Name[]";
                        detailsInputName.value = element['name'];
                        detailsInputName.placeholder = "Name";
                        detailsInputName.style.width = "50%";
                        detailsInputName.style.marginTop = "20px";
                        serviceCell.appendChild(detailsInputName);

                        var detailsInputDetails = document.createElement("input");
                        detailsInputDetails.type = "text";
                        detailsInputDetails.name = "details[]";
                        detailsInputDetails.value = element['details'];
                        detailsInputDetails.placeholder = "Details";
                        detailsInputDetails.style.width = "50%";
                        detailsInputDetails.style.marginTop = "20px";
                        serviceCell.appendChild(detailsInputDetails);

                        var additionalInfoTextarea = document.createElement("textarea");
                        additionalInfoTextarea.name = "additionalInfo[]";
                        additionalInfoTextarea.value = element['additional_info'];
                        additionalInfoTextarea.placeholder = "Additional Information";
                        additionalInfoTextarea.rows = "3";
                        additionalInfoTextarea.style.width = "100%";
                        additionalInfoTextarea.style.marginTop = "20px";
                        additionalInfoCell.appendChild(additionalInfoTextarea);
                    } else {
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
                    }

                    serviceNameSelect.onchange = function() {
                        handleOptionSelection();
                    };
                    serviceCell.appendChild(serviceNameSelect);

                    var rowButton = document.createElement("button");
                    rowButton.textContent = "Add Row";
                    rowButton.classList.add("add-row-button");
                    rowButton.addEventListener("click", function(event) {
                        event.preventDefault();
                        addRow(this.closest("tr"));
                    });

                    additionalInfoCell.appendChild(rowButton);
                }

                function formatDate(date) {
                    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    var day = days[date.getDay()];
                    var year = date.getFullYear();
                    var month = (date.getMonth() + 1).toString().padStart(2, '0');
                    var dayOfMonth = date.getDate().toString().padStart(2, '0');
                    return day + ', ' + year + "-" + month + "-" + dayOfMonth;
                }

                function getDayName(date) {
                    var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    return daysOfWeek[date.getDay()];
                }

                function getDateName(date) {
                    var dayOfMonth = date.getDate();
                    return dayOfMonth;
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

                    var dateCell = row.cells[0];
                    var formattedDate = dateCell.textContent;
                    var formattedDateInput = document.createElement("input");
                    formattedDateInput.type = "hidden";
                    formattedDateInput.name = "formattedDate[]";
                    formattedDateInput.value = formattedDate;
                    newRow.querySelector(".add-row-button").insertAdjacentElement('beforebegin', formattedDateInput);

                    var removeRowButton = document.createElement("button");
                    removeRowButton.textContent = "Remove Row";
                    removeRowButton.classList.add("remove-row-button");
                    removeRowButton.addEventListener("click", function(event) {
                        event.preventDefault();
                        removeRow(this.closest("tr"));
                        handleOptionSelection();
                    });

                    newRow.querySelector(".add-row-button").insertAdjacentElement('afterend', removeRowButton);
                    newRow.querySelector(".add-row-button").remove();
                    row.parentNode.insertBefore(newRow, row.nextSibling);

                    handleOptionSelection();
                }

                function removeRow(row) {
                    row.parentNode.removeChild(row);
                    handleOptionSelection();
                }

                document.querySelector(".submit-button").addEventListener("click", function(event) {
                    event.preventDefault();
                    submitForm();
                });

                function submitForm() {
                    var serviceSelects = document.getElementsByName("serviceName[]");
                    var form = document.getElementById("dateForm");

                    // Remove any existing hidden input fields for selected options
                    var existingHiddenInputs = document.querySelectorAll("input[name='selectedOptions[]']");
                    existingHiddenInputs.forEach(function(input) {
                        input.parentNode.removeChild(input);
                    });

                    // Iterate over each service select element
                    for (var i = 0; i < serviceSelects.length; i++) {
                        var selectedOption = serviceSelects[i].options[serviceSelects[i].selectedIndex];

                        // Create a hidden input field for the selected option
                        var hiddenInput = document.createElement("input");
                        hiddenInput.type = "hidden";
                        hiddenInput.name = "selectedOptions[]";
                        hiddenInput.value = selectedOption.value;
                        // Append the hidden input field to the form
                        form.appendChild(hiddenInput);
                    }

                    // Submit the form
                    form.submit();
                }
            });
        </script> -->

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                function handleOptionSelection() {
                    var serviceSelects = document.getElementsByName("serviceName[]");
                    var selectedValues = [];

                    for (var i = 0; i < serviceSelects.length; i++) {
                        if (serviceSelects[i].value !== "") {
                            selectedValues.push(serviceSelects[i].value);
                        }
                    }

                    for (var i = 0; i < serviceSelects.length; i++) {
                        var options = serviceSelects[i].options;
                        for (var j = 0; j < options.length; j++) {
                            options[j].disabled = selectedValues.includes(options[j].value);
                        }
                        if (serviceSelects[i].value !== "") {
                            serviceSelects[i].querySelector(`option[value="${serviceSelects[i].value}"]`).disabled = true;
                        }
                    }
                }

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

                    var daysToHighlight = "<?php echo $addnewclient1[0]['calendar_type']; ?>";
                    var serviceNames = JSON.parse(<?= json_encode($serviceNamesJSON) ?>);
                    var olddata = JSON.parse(<?= json_encode($oldd) ?>);
                    console.log(olddata);
                    var oldDataMap = olddata.reduce((map, element) => {
                        if (!map[element['deadline_datetime']]) {
                            map[element['deadline_datetime']] = [];
                        }
                        map[element['deadline_datetime']].push(element);
                        return map;
                    }, {});

                    for (var i = 0; i < numberOfDays; i++) {
                        var formattedDate = formatDate(currentDate);
                        var data = formattedDate.split(', ');

                        // Create a row for each entry of the same date
                        if (oldDataMap[data[1]]) {
                            var elements = oldDataMap[data[1]];
                            for (var e = 0; e < elements.length; e++) {
                                createRow(table, formattedDate, elements[e], daysToHighlight, serviceNames);
                            }
                        } else {
                            createRow(table, formattedDate, null, daysToHighlight, serviceNames);
                        }

                        currentDate.setDate(currentDate.getDate() + 1);
                    }
                    dataContainer.appendChild(table);
                    handleOptionSelection();
                }

                function createRow(table, formattedDate, element, daysToHighlight, serviceNames) {
                    var newRow = table.insertRow();
                    var dateCell = newRow.insertCell(0);
                    var serviceCell = newRow.insertCell(1);
                    var additionalInfoCell = newRow.insertCell(2);
                    dateCell.textContent = formattedDate;

                    let data = formattedDate.split(', ');

                    if (daysToHighlight.includes(getDayName(new Date(formattedDate))) || daysToHighlight.includes(getDateName(new Date(formattedDate)))) {
                        dateCell.classList.add("highlight-monday");
                        serviceCell.classList.add("highlight-monday");
                        additionalInfoCell.classList.add("highlight-monday");
                    }

                    var formattedDateInput = document.createElement("input");
                    formattedDateInput.type = "hidden";
                    formattedDateInput.name = "formattedDate[]";
                    formattedDateInput.value = formattedDate;
                    serviceCell.appendChild(formattedDateInput);

                    var serviceNameSelect = document.createElement("select");
                    serviceNameSelect.name = "serviceName[]";
                    serviceNameSelect.style.width = "100%";

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
                    serviceCell.appendChild(serviceNameSelect);

                    if (element) {
                        serviceNameSelect.value = element['task_name'];
                        serviceNameSelect.querySelector(`option[value="${element['task_name']}"]`).disabled = true;

                        var detailsInputName = document.createElement("input");
                        detailsInputName.type = "text";
                        detailsInputName.name = "Name[]";
                        detailsInputName.value = element['name'];
                        detailsInputName.placeholder = "Name";
                        detailsInputName.style.width = "50%";
                        detailsInputName.style.marginTop = "20px";
                        serviceCell.appendChild(detailsInputName);

                        var detailsInputDetails = document.createElement("input");
                        detailsInputDetails.type = "text";
                        detailsInputDetails.name = "details[]";
                        detailsInputDetails.value = element['details'];
                        detailsInputDetails.placeholder = "Details";
                        detailsInputDetails.style.width = "50%";
                        detailsInputDetails.style.marginTop = "20px";
                        serviceCell.appendChild(detailsInputDetails);

                        var additionalInfoTextarea = document.createElement("textarea");
                        additionalInfoTextarea.name = "additionalInfo[]";
                        additionalInfoTextarea.value = element['additional_info'];
                        additionalInfoTextarea.placeholder = "Additional Information";
                        additionalInfoTextarea.rows = "3";
                        additionalInfoTextarea.style.width = "100%";
                        additionalInfoTextarea.style.marginTop = "20px";
                        additionalInfoCell.appendChild(additionalInfoTextarea);
                    } else {
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
                    }

                    serviceNameSelect.onchange = function() {
                        handleOptionSelection();
                    };
                    
                    // serviceCell.appendChild(serviceNameSelect);

                    var rowButton = document.createElement("button");
                    rowButton.textContent = "Add Row";
                    rowButton.classList.add("add-row-button");
                    rowButton.addEventListener("click", function(event) {
                        event.preventDefault();
                        addRow(this.closest("tr"));
                    });

                    additionalInfoCell.appendChild(rowButton);
                }

                function formatDate(date) {
                    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    var day = days[date.getDay()];
                    var year = date.getFullYear();
                    var month = (date.getMonth() + 1).toString().padStart(2, '0');
                    var dayOfMonth = date.getDate().toString().padStart(2, '0');
                    return day + ', ' + year + "-" + month + "-" + dayOfMonth;
                }

                function getDayName(date) {
                    var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    return daysOfWeek[date.getDay()];
                }

                function getDateName(date) {
                    var dayOfMonth = date.getDate();
                    return dayOfMonth;
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

                    var dateCell = row.cells[0];
                    var formattedDate = dateCell.textContent;
                    var formattedDateInput = document.createElement("input");
                    formattedDateInput.type = "hidden";
                    formattedDateInput.name = "formattedDate[]";
                    formattedDateInput.value = formattedDate;
                    newRow.querySelector(".add-row-button").insertAdjacentElement('beforebegin', formattedDateInput);

                    var removeRowButton = document.createElement("button");
                    removeRowButton.textContent = "Remove Row";
                    removeRowButton.classList.add("remove-row-button");
                    removeRowButton.addEventListener("click", function(event) {
                        event.preventDefault();
                        removeRow(this.closest("tr"));
                        handleOptionSelection();
                    });

                    newRow.querySelector(".add-row-button").insertAdjacentElement('afterend', removeRowButton);
                    newRow.querySelector(".add-row-button").remove();
                    row.parentNode.insertBefore(newRow, row.nextSibling);

                    handleOptionSelection();
                }

                function removeRow(row) {
                    row.parentNode.removeChild(row);
                    handleOptionSelection();
                }

                document.querySelector(".submit-button").addEventListener("click", function(event) {
                    event.preventDefault();
                    submitForm();
                });

                function submitForm() {
                    var serviceSelects = document.getElementsByName("serviceName[]");
                    var form = document.getElementById("dateForm");

                    // Remove any existing hidden input fields for selected options
                    var existingHiddenInputs = document.querySelectorAll("input[name='selectedOptions[]']");
                    existingHiddenInputs.forEach(function(input) {
                        input.parentNode.removeChild(input);
                    });

                    // Iterate over each service select element
                    for (var i = 0; i < serviceSelects.length; i++) {
                        var selectedOption = serviceSelects[i].options[serviceSelects[i].selectedIndex];

                        // Create a hidden input field for the selected option
                        var hiddenInput = document.createElement("input");
                        hiddenInput.type = "hidden";
                        hiddenInput.name = "selectedOptions[]";
                        hiddenInput.value = selectedOption.value;
                        // Append the hidden input field to the form
                        form.appendChild(hiddenInput);
                    }

                    // Submit the form
                    form.submit();
                }
            });
        </script>

    </section>
</body>

</html>
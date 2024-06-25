<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table with Dynamic Entries</title>
    <style>
       

        fieldset {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: none;
            margin-bottom: 20px;
            margin-top: 60px;
        }

        form {
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            margin-right:350px;
        }

        .table-container {
            position: relative;
            width: 50%;
            margin: 0 auto; /* Center the table */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f6f4;
            color: #000000;
        }

        input[readonly] {
            background-color: #f4f4f4;
            cursor: not-allowed;
        }

        .add-button {
            position: fixed;
            top: 10px;
            right: 10px;
        }

        .delete-button {
            background-color: #ff3333;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-row-button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
<section class="home-section" style="margin-top: -50%;">
    <div class="table-container">
        <button class="add-button" onclick="addNewRow()">Add New Row</button>
        <fieldset>
        <table>
            <thead>
                <tr>
                    <th>Name</th>   
                    <th>Age</th>
                    <th>Location</th>
                    <th>Company</th>
                    <th>Actions</th>
                    <th>name</th>
                </tr>
                <td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    
                </td>

            </thead>
            <tbody id="dataTableBody"></tbody>
        </table>
    </div>
</fieldset>
</section>
    <script>
        function submitForm() {
            var name = document.getElementById('name').value;
            var age = document.getElementById('age').value;
            var location = document.getElementById('location').value;
            var company = document.getElementById('company').value;

            // Create a new row in the table and append the data
            var tableBody = document.getElementById('dataTableBody');
            var newRow = tableBody.insertRow(tableBody.rows.length);
            var cells = [
                newRow.insertCell(0),
                newRow.insertCell(1),
                newRow.insertCell(2),
                newRow.insertCell(3),
                newRow.insertCell(4)
            ];

            // Add textboxes for each field
            cells[0].innerHTML = '<input type="text" value="' + name + '" readonly>';
            cells[1].innerHTML = '<input type="text" value="' + age + '" readonly>';
            cells[2].innerHTML = '<input type="text" value="' + location + '" readonly>';
            cells[3].innerHTML = '<input type="text" value="' + company + '" readonly>';

            // // Add delete and add buttons
            // cells[4].innerHTML = '<button class="delete-button" onclick="deleteRow(this)">Delete</button>' +
            //                     '<button class="add-row-button" onclick="addNewRow()">Add</button>';

            // Clear the form fields
            document.getElementById('name').value = '';
            document.getElementById('age').value = '';
            document.getElementById('location').value = '';
            document.getElementById('company').value = '';
        }

        function addNewRow() {
            // Create a new row in the table
            var tableBody = document.getElementById('dataTableBody');
            var newRow = tableBody.insertRow(tableBody.rows.length);

            // Add empty cells for each field
            for (var i = 0; i < 4; i++) {
                var cell = newRow.insertCell(i);
                cell.innerHTML = '<input type="text" readonly>';
            }

            // // Add delete and add buttons
            // var actionCell = newRow.insertCell(4);
            // actionCell.innerHTML = '<button class="delete-button" onclick="deleteRow(this)">Delete</button>' +
            //                         '<button class="add-row-button" onclick="addNewRow()">Add</button>';
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>

</body>

</html>

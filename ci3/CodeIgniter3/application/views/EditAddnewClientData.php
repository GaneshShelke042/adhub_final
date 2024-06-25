<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .input-field {
            display: flex;
            flex-direction: column;
            width: 25%;
        }

        .input-field label {
            margin-bottom: 5px;
            /* font-weight: bold; */
        }

        .input-field input,
        .input-field select,
        .input-field textarea {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .input-field textarea {
            resize: vertical;
            min-height: 100px;
        }

        .media {
            display: flex;
            gap: 20px;
            align-items: center;
            margin-top: 10px;
        }

        .media img {
          
            height: 50px;
            cursor: pointer;
        }

        .buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .buttons button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .buttons .submit-button {
            background-color: #4caf50;
            color: #fff;
        }

        .buttons .close-button {
            background-color: #ff3333;
            color: #fff;
        }

        .container1 {
            width: 100%;
            margin-top: 20px;
        }

        fieldset {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f6f4;
        }

        .delete-button {
            background-color: #ff3333;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-button {
            margin-top: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        /* New CSS for the image box */
        .uploaded-image {

            width: 200px;
            height: 200px;
            object-fit: cover;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 10px;
            float: left;
            
        }

        .input-image label {
            font-size: 16px;
            margin-bottom: 5px;
            /* font-weight: bold; */
        }

        .input-image {
            height: 270px;
            min-width: 250px;
            display: flex;
            flex-direction: column;
            width: 20%;
            padding: 10px;
            font-size: 44px;
            border-radius: 4px;
           
            position: absolute;
            cursor: pointer; /* Makes the cursor a pointer when hovering over the div */
           
        }
        .hidden-file-input {
            display: none;
        }

        .form-section {
            display: flex;
            /* flex-wrap: wrap; */
            gap: 20px;
            align-items: flex-start;
            /* width: 20%; */
        }
        .selected {
    border: 4px solid blue; /* Example style for selected icon */
}
i{
   font-size: 60px;
}
.home-section{
            margin-top:3%;
        }
    </style>

    <title>Update Client</title>
</head>

<body>
    <section class="home-section" >
        <div class="container">
        <h2>Edit Client</h2>
            <form method="post" name="AddNewClient" enctype="multipart/form-data">


          
                <?php
                // Get the ID from the URL using CodeIgniter's URI segment
                $id = (string)$this->uri->segment(3); // Assign the value to $id_from_url and cast it to string
                // echo $id;
                ?>
                <input type="hidden" name="id" value="<?php echo $this->uri->segment(3)?> ">

                
            <div class="input-image">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" class="hidden-file-input">
                <img class="uploaded-image" id="input-field" src="<?= base_url('./Image/PackageServies/'. $result['image'])?>" alt="Uploaded Image">
            </div>

          
                <div class="input-field" style="width: 30%; margin-left: 20%;">
                    <label for="brand_name">Brand Name</label>
                    <input type="text" name="brand_name" id="brand_name" placeholder="Enter Brand Name"value="<?php echo set_value('brand_name', $result['brand_name']); ?>" required>
                </div>
                <div class="input-field" style="width: 30%;">
                    <label for="owner_name">Owner Name</label>
                    <input type="text" name="owner_name" placeholder="Enter your Name" id="ownername" value="<?php echo set_value('owner_name', $result['owner_name']); ?>" required>
                </div>
                <div class="input-field" style="width: 10%; ">
                    <label for="status">Status:</label>
                    <select id="status" name="status" value="<?php echo set_value('status', $result['status']); ?>">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>
                </div>
                <!-- <div class="fields">
                    <div class="input-field">
                        <label>Brand Name</label>
                        <input type="text" name="brand_name" placeholder="Enter your name" value="<?php echo set_value('brand_name', $result['brand_name']); ?>" required>
                    </div> -->

                    <div class="input-field" style="width: 25%; margin-left: 20%;">
                        <label for="package">Package:</label>
                        <select id="package" name="package" >
                        <?php
                            if (!empty($package)) {
                                foreach ($package as $userData) {
                                    // Output each option with the value and label from the database
                                    $selected = ($userData['Package_name'] == $result['package']) ? 'selected' : '';
                                    echo '<option value="' . $userData['Package_name'] . '" ' . $selected.'>'. $userData['Package_name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>

                    

                    

                    <div class="input-field" style="width: 25%;">
                        <label for="calender">Calender Type:</label>
                        <select id="calender" name="calender">
                            <?php
                            if (!empty($calendar)) {
                                foreach ($calendar as $userData) {
                                    if($userData['status'] == 1){
                                    // Output each option with the value and label from the database
                                    $selected = ($userData['frequency'] == $result['calendar_type']) ? 'selected' : '';
                                    echo '<option value="' . $userData['frequency'] . '" ' . $selected . '>' . $userData['frequency'] . '</option>';
                                    }
                                }
                            }
                            ?>
                        </select>

                    </div>


                    <div class="input-field" style="width: 10%;">
                        <label>Mobile Number</label>
                        <input type="number" name="mobile" placeholder="Enter mobile number" value="<?php echo set_value('mobile', $result['mobile_number']); ?>" required>
                    </div>

                    <div class="input-field" style="width: 10%;">
                        <label>Alternate Mobile Number</label>
                        <input type="number" name="Altmobile" placeholder="Enter alternate mobile number" value="<?php echo set_value('Altmobile', $result['alternate_mobile_number']); ?>" >
                    </div>

                    <div class="input-field" style="width: 30%; margin-left: 20%;">
                        <label for="address">Address:</label>
                        <textarea id="address" name="address"><?php echo set_value('address', $result['address']); ?></textarea>
                    </div>

                    <div class="input-field" style="width: 10%;">
                        <label>State Name</label>
                        <input type="text" name="state" placeholder="Enter State name" value="<?php echo set_value('state', $result['state']); ?>">
                    </div>

                    <div class="input-field" style="width: 10%;">
                        <label>District Name</label>
                        <input type="text" name="district" placeholder="Enter District name" value="<?php echo set_value('district', $result['district_name']); ?>" >
                    </div>

                    <div class="input-field" style="width: 10%;">
                        <label>Taluka Name</label>
                        <input type="text" name="taluka" placeholder="Enter Taluka name" value="<?php echo set_value('taluka', $result['taluka_name']); ?>" >
                    </div>

                    <div class="input-field" style="width: 10%;">
                        <label for="pinCode">Pin Code:</label>
                        <input type="text" name="pincode" id="pinCode" name="pinCode" value="<?php echo set_value('pincode', $result['pin_code']); ?>">
                    </div>

                    <div class="input-field" style="width: 45%; margin-left: 40px;">
                        <label>Reference by</label>
                        <input type="text" name="reference" placeholder="Enter reference name" id="reference" value="<?php echo set_value('reference', $result['reference_by']); ?>" >
                    </div>

                    <div class="input-field" style="width: 45%;">
                        <label>Sales Executive</label>
                        <input type="text" name="executive" value="<?php echo set_value('executive', $result['sales_executive']); ?>" placeholder="Enter sales executive name" id="salesExecutive" >
                    </div>
                    <div class="input-field" style="width: 45%; margin-left: 40px;">       
                        <label>Social media</label>
                        <div class="media">
                        <i class="fab fa-facebook" id="facebook" onclick="selectSocialMedia('facebook')"></i>
                        <i class="fab fa-instagram" id="instagram" onclick="selectSocialMedia('instagram')"></i>
                        <i class="fab fa-twitter" id="twitter" onclick="selectSocialMedia('twitter')"></i>
                    </div>
                </div>
                
                       
                <div class="container1">
                    <label>Brand Coordinator Person</label>
                    <button class="add-button" onclick="addNewRow()">Add New Row</button>
                    <fieldset>
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="dataTableBody"></tbody>
                        </table>
                    </fieldset>
                </div>
                
                <div class="buttons">
                
                <button class="submit-button buttons" ><a href="adhub/ci3/CodeIgniter3/index.php/User_con/index" ></a>
                    <span>Update</span>
                    <i class="uil uil-navigator"></i></button>
                    <button class="submit-button buttons"> cancel<i class="uil uil-navigator"></i>
                </button>
            </div>

                <!-- <button class="submit-button" onclick="submitForm()">
                <span>Submit</span>
                <i class="uil uil-navigator"></i>
            </button>
        </form>
    </div> -->

                <script>
                    document.querySelector('.input-image').addEventListener('click', function() {
            document.getElementById('image').click();
        });

        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.uploaded-image').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
                    function submitForm() {
                        var name = document.getElementById('name').value;
                        var age = document.getElementById('age').value;
                        var location = document.getElementById('location').value;

                        var tableBody = document.getElementById('dataTableBody');
                        var newRow = tableBody.insertRow(tableBody.rows.length);
                        var cells = [
                            newRow.insertCell(0),
                            newRow.insertCell(1),
                            newRow.insertCell(2),
                            newRow.insertCell(3),
                        ];

                        cells[0].innerHTML = '<input type="text" value="' + name + '" readonly>';
                        cells[1].innerHTML = '<input type="text" value="' + age + '" readonly>';
                        cells[2].innerHTML = '<input type="text" value="' + location + '" readonly>';

                        cells[3].innerHTML = '<button class="delete-button" onclick="deleteRow(this)">Delete</button>' +
                            '<button class="add-row-button" onclick="addNewRow()">Add</button>';

                        document.getElementById('name').value = '';
                        document.getElementById('age').value = '';
                        document.getElementById('location').value = '';
                    }

                    function addNewRow() {
                        var tableBody = document.getElementById('dataTableBody');
                        var newRow = tableBody.insertRow(tableBody.rows.length);

                        for (var i = 0; i < 3; i++) {
                            var cell = newRow.insertCell(i);
                            cell.innerHTML = '<input type="text">';
                        }

                        var actionCell = newRow.insertCell(3);
                        actionCell.innerHTML = '<button class="delete-button" onclick="deleteRow(this)">Delete</button>' +
                            '<button class="add-row-button" onclick="addNewRow()">Add</button>';
                    }

                    function deleteRow(button) {
                        var row = button.parentNode.parentNode;
                        row.parentNode.removeChild(row);
                    }

                    
                   // Add an event listener to the file input field
document.getElementById("image").addEventListener("change", function(event) {
    // Get the selected file
    var selectedFile = event.target.files[0];

    // Check if a file is selected
    if (selectedFile) {
        // Create a URL for the selected file
        var imageURL = URL.createObjectURL(selectedFile);

        // Set the created URL as the src attribute of the img tag
        document.getElementById("input-field").src = imageURL;
    }
});
function selectSocialMedia(platform) {
    // Toggle the 'selected' class on the clicked icon
    document.getElementById(platform).classList.toggle('selected');

    // Get the hidden input field
    var selectedField = document.getElementById('selected_social_media');

    // Get the current selected values and convert to an array
    var selectedValues = selectedField.value ? selectedField.value.split(',') : [];

    // Check if the platform is already selected
    var index = selectedValues.indexOf(platform);
    if (index > -1) {
        // If selected, remove it from the array
        selectedValues.splice(index, 1);
    } else {
        // If not selected, add it to the array
        selectedValues.push(platform);
    }}
                </script>

            </form>

        </div>

</body>

</html>
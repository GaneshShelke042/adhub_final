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
    <title>Add New Client</title>
</head>

<body>
<section class="home-section" >
    <div class="container">
        <h2>Add New Client</h2>
        <form method="post" name="AddNewClient" enctype="multipart/form-data">
            
        <div class="input-image">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" class="hidden-file-input">
        <img class="uploaded-image" src="<?php echo base_url('img/image-gallery.jpeg'); ?>" alt="Uploaded Image">
    </div>

                
        

            
                    <div class="input-field" style="width: 30%; margin-left: 20%;">
                        <label for="brand_name">Brand Name</label>
                        <input type="text" name="brand_name" id="brand_name" placeholder="Enter Brand Name" required>
                    </div>
                    <div class="input-field" style="width: 30%;">
                        <label for="owner_name">Owner Name</label>
                        <input type="text" name="owner_name" id="owner_name" placeholder="Enter Owner Name" required>
                    </div>
                    <div class="input-field" style="width: 10%; ">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="1">Active</option>
                    <option value="0">In-Active</option>
                </select>
            </div>
               

            <div class="input-field" style="width: 25%; margin-left: 20%;">
                <label for="package">Package:</label>
                <select id="package" name="package">
                    <option value="default" selected>Select</option>
                    <?php
                    if (!empty($result)) {
                        foreach ($result as $userData) {
                            if($userData['status'] == 1){
                            echo '<option value="' . $userData['Package_name'] . '">' . $userData['Package_name'] . '</option>';
                            }
                        }
                    }
                    ?>
                </select>
            </div>

           

            <div class="input-field" style="width: 25%;">
                <label for="calender" >Calender Type:</label>
                <select id="calender" name="calender">
                    <?php
                    if (!empty($calendar)) {
                        foreach ($calendar as $userData) {
                            if($userData['status'] == 1){
                            echo '<option value="' . $userData['frequency'] . '">' . $userData['frequency'] . '</option>';
                            }
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="input-field" style="width: 10%; ">
                <label for="mobile" >Mobile Number</label>
                <input type="number" name="mobile" id="mobile" placeholder="Enter Mobile Number" required>
            </div>

            <div class="input-field" style="width: 10%;">
                <label for="altmobile">Alt Mob Number</label>
                <input type="number" name="altmobile" id="altmobile" placeholder="Enter Alternate Mobile Number">
            </div>

            <div class="input-field" style="width: 30%; margin-left: 20%;">
                <label for="address">Address</label>
                <textarea id="address" name="address" placeholder="Enter Address" ></textarea>
            </div>

            <div class="input-field" style="width: 10%;">
                <label for="state">State</label>
                <input type="text" name="state" id="state" placeholder="Enter State">
            </div>

            <div class="input-field" style="width: 10%;" >
                <label for="district">District</label>
                <input type="text" name="district" id="district" placeholder="Enter District">
            </div>

            <div class="input-field" style="width: 10%;">
                <label for="taluka">Taluka</label>
                <input type="text" name="taluka" id="taluka" placeholder="Enter Taluka">
            </div>

            <div class="input-field" style="width: 10%;">
                <label for="pincode">Pin Code</label>
                <input type="text" name="pincode" id="pincode" placeholder="Enter Pin Code">
            </div>

            <div class="input-field" style="width: 45%; margin-left: 40px;">
                <label for="reference">Reference By</label>
                <input type="text" name="reference" id="reference" placeholder="Enter Reference By">
            </div>

            <div class="input-field" style="width: 45%;">
                <label for="executive">Sales Executive</label>
                <input type="text" name="executive" id="executive" placeholder="Enter Sales Executive">
            </div>

            <div class="input-field" style="width: 45%; margin-left: 40px;">
    <label>Social Media</label>
    <div class="media">
        <i class="fab fa-facebook" id="facebook" onclick="selectSocialMedia('facebook')"></i>
        <i class="fab fa-instagram" id="instagram" onclick="selectSocialMedia('instagram')"></i>
        <i class="fab fa-twitter" id="twitter" onclick="selectSocialMedia('twitter')"></i>
    </div>
    <!-- Hidden input field to store selected social media values -->
    <input type="hidden" id="selected_social_media" name="social_media">
</div>


            

            <div class="container1">
                <label>Brand Coordinator Person</label>
                <button type="button" class="add-button" onclick="addNewRow()">Add New Row</button>
                <fieldset>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Mobile No</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody"></tbody>
                    </table>
                </fieldset>
            </div>

            <div class="buttons">
                <button type="submit" class="submit-button" onclick="submitForm()">Submit</button>
                <button type="button" class="close-button" onclick="window.location.href='index'">Close</button>
            </div>
        </form>
    </div>

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

        function addNewRow() {
            var tableBody = document.getElementById('dataTableBody');
            var newRow = tableBody.insertRow();
            newRow.innerHTML = `<td><input type="text" placeholder="Enter Name" name="brand_person[]"></td>
                                <td><input type="text" placeholder="Enter Designation" name="brand_Desig[]" ></td>
                                <td><input type="number" placeholder="Enter Mobile number" name="brand_Mob[]"></td>
                                <td><button type="button" class="delete-button" onclick="deleteRow(this)">Delete</button></td>`;
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        function submitForm() {
            alert('Form submitted!');
        }

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
    }

    // Update the hidden input field with the new selected values
    selectedField.value = selectedValues.join(',');
}




    </script>
</section>
</body>

</html>
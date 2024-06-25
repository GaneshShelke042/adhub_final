<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <title>Div with File Upload</title>
    <style>
        .wrap {
            display: flex;
            gap: 20px;
            padding: 20px;

        }



        .category-container,
        .card-container {
            flex-grow: 1;
            /* Expand to fill available space */
            display: flex;
            flex-direction: column;
        }

        .category-container {
            justify-content: flex-start;
            /* Align category section to the left */
        }

        .card-container {
            justify-content: flex-end;
            /* Align cart section to the right */
        }

        /* Additional styles for the category and cart containers */
        .category-container .input-field {
            width: 100%;
            padding-right: 20px;
            /* Adjust spacing */
        }

        .card-container .box-container {
            padding-left: 20px;
            /* Adjust spacing */
        }




        .file-upload {
            width: 18%;
            position: relative;
            /* Add relative positioning */
            padding-left: 5px;
            padding-right: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            background-color: rgb(255, 255, 255);
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .file-upload:hover {
            background-color: #f0f0f0;
        }

        .file-upload input[type="file"] {
            display: none;
        }

        img {
            width: 100%;
            height: 60%;

            margin-left: 15%;
            /* margin-right: 8px; */
            margin-top: -40%;
        }



        .label-box {
            margin-top: 20%;
            position: absolute;
            top: 50%;
            /* Adjust as needed */
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 12px;
            color: #333;
            text-align: center;
            z-index: 1;
            /* Ensure it's above the image */
            background-color: #fff;
            /* Background color */
            padding: 5px 10px;
            /* Padding */
            border: 1px solid #ccc;
            /* Border */
            border-radius: 5px;
            /* Border radius */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Box shadow */
        }


        .text-box {
            position: absolute;
            /* bottom: 0;
    left: 0; */
            width: 100%;
            margin-left: 5%;
            margin-top: 10px;
            /* Adjust as needed */
        }

        .text-price {
            position: absolute;
            bottom: 0;
            /* left: 0; */
            width: 100%;
            margin-left: 5%;
            margin-bottom: 20%;
            /*Adjust as needed */
        }



        .card-container {
            /* width: 10%; */
            /* height: 2%; */
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            /* Add margin between card containers */
        }

        .card-header {
            /* margin-left: -10%; */
            background-color: #3498db;
            color: #fff;
            /* padding: 10px; */
            text-align: center;
            /* width: 100%; Adjust width as needed */
        }


        .box-container {
            padding: 20px;
            width: 100%;
            /* Adjust width as needed */
        }


        #category-select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            /* Add margin between label and select */
        }

        .file-count {
            font-size: 16px;
            margin-bottom: 10px;
            text-align: center;
        }

        .count-box {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .label {
            font-size: 12px;
            color: #333;
            margin-top: 5px;
        }



        .fields {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .input-field {

            float: right;
            display: flex;
            flex-direction: column;
            width: auto;
            margin: 4px 0;
        }

        .input-field input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .input-field select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: white;
            color: black;
            appearance: none;
        }

        .fields {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-sizing: border-box;
        }

        #top-right-btn {
            top: 20px;
            right: 20px;
            margin-left: 95%;
            margin-bottom: 10px;
            background-color: #3c77ff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button {
            margin-top: 10%;
            position: relative;
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            /* margin: 20px auto; */
            align-content: center;
            text-align: center;
        }

        .total-price {
            font-size: 16px;
            margin-bottom: 10px;
            text-align: center;
            /* Add any additional styling as needed */
        }

        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .wrap {
                flex-direction: column;
            }

            .file-upload {
                width: 100%;
            }

            .text-box,
            .text-price {
                position: relative;
                margin-top: 10px;
                margin-left: 0;
                width: calc(50% - 10px);
            }

            .card-container {
                width: 100%;
            }

            .box-container {
                padding: 20px;
            }

            #totalFiles,
            #totalPrice {
                margin-top: 10px;
            }

            button {
                margin: 10px auto;
            }
        }

        .card-container.cart-container {
            display: none;
        }


        .wrap {
            display: flex;
            gap: 20px;
            padding: 20px;
        }

        .fields-container {
            height: 15%;
            display: flex;
            width: 75%;
            background-color: #f0f0f0;
            /* Set background color */
            border-radius: 10px;
            /* Add rounded corners */
            gap: 20px;
            margin-bottom: 5%;
            padding-bottom: 1%;
        }



        .input-field {
            width: 50%;
            /* Each field takes 50% of the width */
        }

        /* Additional styles for the category and cart containers */
        .category-container .input-field {
            width: 100%;
        }

        .card-container .box-container {
            padding-left: 20px;
            /* Adjust spacing */
        }

        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .wrap {
                flex-direction: column;
            }

            .fields-container {
                flex-direction: column;
            }

            .input-field {
                width: 100%;
                /* Each field takes full width */
            }
        }

        .new-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .dashboard {
            width: fit-content;
            display: flex;
            height: 400px;
            margin-bottom: 5%;
        }


        .dashboard p {
            /* margin: 0;
    padding: 5px 0; */
            border-bottom: 1px solid #ccc;
            text-align: center;
        }

        .user-data {
            margin-right: 2%;
            margin-bottom: 10px;
            /* margin-left: 2%; */
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 190.1px;
            height: fit-content;

        }

        .user-data p {
            margin: 0;
            padding: 5px 0;
            border-bottom: 1px solid #eee;

        }

        .user-data p:last-child {
            border: none;   
        }

        .category-cart-container {
            width: 25%;
            float: right;
        }

        .img-Style {
            margin-top: 30%;
            margin-bottom: 3%;
            width: 80%;
        }
        .home-section{
            margin-top:2%;
        }
    </style>
</head>


<body>
    <section class="home-section">
        <form method="POST" name="Addpackage" id="form_Id" enctype="multipart/form-data">
            <div class="container">

                <div class="fields-container" style="width: 100%;">
                    <!-- Name Field -->
                    <div class="input-field" style="width: 80%; margin-left: 2%">
                        <label for="name" style="margin-left: 2%;">Name</label>
                        <input type="text" id="name" name="Package_name" placeholder="Enter your name" value="<?php echo set_value('Package_name', $result['Package_name']); ?>" required>
                    </div>
                    <!-- Status Field -->
                    <div class="input-field">
                        <label for="status" style="margin-left: 2%;">Status:</label>
                        <select id="status" name="status">
                            <option value="1" <?php echo set_select('status', '1', $result['status'] == 1); ?>>Active</option>
                            <option value="0" <?php echo set_select('status', '0', $result['status'] == 0); ?>>Inactive</option>
                        </select>
                    </div>
                </div>
                <!-- Category and Cart sections -->
                <div class="category-cart-container">
                    <!-- Category Section -->
                    <div class="category-container">
                        <div class="card-header">Category</div>
                        <div class="box-container">
                            <label for="category-select">Select Category:</label>
                            <select id="category-select" name="category">
                                <option value="All">All</option>
                                <?php if (!empty($categories)) {
                                    foreach ($categories as $category) {
                                        if ($category['status'] == 1) {
                                            echo '<option value="' . $category['Slug'] . '" ' . set_select('category', $category['Slug'], $result['category'] == $category['Slug']) . '>' . $category['Slug'] . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- Cart Section -->
                    <div id="cart">
                        <!-- Cart items will be added here dynamically -->
                    </div>
                    <div id="totalQuantity"></div>
                    <div id="totalPrice"></div>
                    <!-- Assuming the currency symbol is ₹ -->

                </div>
            </div>

            <!-- Image Upload -->
            <!-- <div class="input-field">
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image">
                <php if (!empty($result['imagepath'])) { ?>
                    <div class="img-Style">
                        <img src="<php echo base_url('Image/PackageServies/' . $result['imagepath']); ?>" alt="User Image">
                    </div>
                <php } ?>
            </div> -->

            <div class="new-button" style="display: block;">
                <div class="dashboard">
                    <?php if (!empty($result1)) {
                        foreach ($result1 as $userData) {
                            if ($userData['status'] == 1) {
                    ?>
                                <div class="user-data" id="user-data-<?php echo $userData['id']; ?>">
                                    <?php if (!empty($userData['imagepath'])) { ?>
                                        <div class="img-Style">
                                            <img src="<?php echo base_url('Image/PackageServies/' . $userData['imagepath']); ?>" alt="User Image">                               
                                        </div>
                                    <?php } ?>
                                    <input type="number" name="quantity[]" id="quantity<?php echo $userData['Package_name']; ?>" class="quantity-input" value="<?php echo set_value('quantity[' . $userData['Package_name'] . ']', $userData['quantity']); ?>">
                                    <input type="hidden" name="namevalue[]" value="<?= $userData['name'] ?>">
                                    <input type="hidden" name="idvalue[]" value="<?= $userData['id'] ?>">
                                    <p><?php echo $userData['name'] ?></p>
                                    <?php if ($userData['price'] == 0) { ?>
                                        <p class="total-value">&#8377; <?php echo $userData['totalprice'] ?></p>
                                    <?php } else { ?>
                                        <p class="total-value">&#8377; </p>
                                    <?php } ?>
                                </div>
                    <?php }
                        }
                    } ?>
                    <input type="hidden" name="quantity[]" value="<?php echo $userData['name']; ?>">
                    <input type="hidden" name="price">
                </div>
            </div>

            <!-- Buttons -->
            <button id="submit-btn" value="submit">Submit</button>
            <button id="close-btn">Close</button>

            <script>
                $(document).ready(function() {
                    $(".quantity-input").on("change", function() {
                        var userDataId = $(this).attr("id").split("-")[1];
                        var name = $("#user-data-" + userDataId + " p:first").text();
                        var unitPrice = parseFloat($("#user-data-" + userDataId + " .total-value").text().replace("₹", ""));
                        var quantity = parseInt($(this).val());

                        // Add to cart
                        addToCart(name, quantity, unitPrice);
                        updateOverallTotals();
                    });

                    function addToCart(name, quantity, unitPrice) {
                        $("#cart").append("<div>" + quantity + " - " + name + " ,(" + (unitPrice * quantity).toFixed(2) + ")</div>");
                    }

                    function updateOverallTotals() {
                        var totalQuantity = 0;
                        var totalPrice = 0;

                        $("#cart div").each(function() {
                            var itemText = $(this).text();
                            var quantity = parseInt(itemText.split(" - ")[0]);
                            var price = parseFloat(itemText.match(/\(([^)]+)\)/)[1]);

                            totalQuantity += quantity;
                            totalPrice += price;
                        });

                        $("#totalQuantity").text("Total Quantity: " + totalQuantity);
                        $("#totalPrice").text("Total Price: ₹" + totalPrice.toFixed(2));
                    }

                    $("#submit-btn").on("click", function(event) {
                        event.preventDefault();
                        var dataArray = [];
                        var totalQuantity = 0;
                        var totalPrice = 0;

                        $("#cart div").each(function() {
                            var textContent = $(this).text();
                            var dashIndex = textContent.indexOf('-');
                            var commaIndex = textContent.indexOf(',');

                            var quantity = parseInt(textContent.substring(0, dashIndex).trim());
                            var name = textContent.substring(dashIndex + 1, commaIndex).trim();
                            var price = parseFloat(textContent.substring(commaIndex + 2).trim());

                            totalQuantity += quantity;
                            totalPrice += price;

                            var data = {
                                quantity: quantity,
                                name: name,
                                price: price
                            };
                            dataArray.push(data);
                        });

                        var postDataField = $("<input>")
                            .attr("type", "hidden")
                            .attr("name", "postdata")
                            .val(JSON.stringify(dataArray));

                        $("#form_Id").append(postDataField);
                        $("#form_Id").submit();
                    });
                });
            </script>
        </form>
    </section>
</body>



</html>
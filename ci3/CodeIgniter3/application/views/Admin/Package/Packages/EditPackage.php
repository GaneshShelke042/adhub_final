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

        .file-upload {
            position: relative;
            /* Add relative positioning */
            padding: 20px;
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

        .file-upload img {
            width: 200px;
            height: 200px;
            margin-right: 8px;
            margin-bottom: 15px;
        }

        .label-box {
            position: absolute;
            bottom: 10px;
            /* Adjust bottom position */
            left: 10px;
            /* Adjust left position */
            font-size: 12px;
            color: #333;
            text-align: center;
        }

        .text-box {
            width: 193px;
            position: absolute;
            margin-top: 230px;
        }

        .card-container {
            width: 15%;
            height: 30%;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            /* Add margin between card containers */
        }

        .card-header {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .box-container {
            padding: 50px;
            /* Add padding to the box container */
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

        input[type="number"] {
            width: 80%;
            padding: 5px;
            margin-top: 98%;
            text-align: center;
            box-sizing: border-box;
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
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px auto;
            align-content: center;
        }
    </style>
</head>

<body>
    <section class="home-section" style="margin-top: -50%;">
        <button id="top-right-btn">Add</button>
        <form method="post" name="AddPackage" action="" >
            <div class="container">

                <div class="fields">

                    <div class="input-field" style="width: 70%;  padding-left: 30px;">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Enter your name"  value="<?php echo set_value('name',$result['name']); ?>" required>
                    </div>


                    <div class="input-field" style="width: 19%; padding-left: 30px;">
                        <label for="status">Status:</label>
                        <select id="status" name="status"   value="<?php echo set_value('status',$result['status']); ?>">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <section id="r1" class="section section-one active">
                    <div class="wrap">


                        <div class="file-upload">
                            <img src="css/img/img_icon.png" alt="Upload Icon">
                            <!-- <input type="file" id="file-input1"> -->

                            <input type="number" class="text-box" placeholder="">
                            <!-- <span class="label-box">Label 1</span> -->
                        </div>

                        <div class="file-upload">

                            <img src="css/img/img_icon.png" alt="Upload Icon">
                            <!-- <input type="file" id="file-input2"> -->
                            <input type="number" class="text-box" placeholder="">
                        </div>

                        <div class="file-upload">

                            <img src="css/img/img_icon.png" alt="Upload Icon">
                            <!-- <input type="file" id="file-input3"> -->
                            <input type="number" class="text-box" placeholder="">
                        </div>

                        <div class="file-upload">

                            <img src="css/img/img_icon.png" alt="Upload Icon">
                            <!-- <input type="file" id="file-input4"> -->

                            <input type="number" class="text-box" placeholder="">


                        </div>

                        <div class="card-container" style="height: 250px;">
                            <div class="card-header">
                                Category
                            </div>
                            <div class="box-container">
                                <label for="category-select">Select Category:</label>
                                <select id="category-select"  name="category" value="<?php echo set_value('category',$result['category']); ?>"  >
                                    <option value="category1">Category 1</option>
                                    <option value="category2">Category 2</option>
                                    <option value="category3">Category 3</option>
                                </select>
                            </div>
                        </div>


                    </div>
                </section>

                <div class="wrap">
                    <div class="file-upload">

                        <img src="css/img/img_icon.png" alt="Upload Icon">
                        <!-- <input type="file" id="file-input5"> -->
                        <input type="number" class="text-box" placeholder="">
                    </div>

                    <div class="file-upload">

                        <img src="css/img/img_icon.png" alt="Upload Icon">
                        <!-- <input type="file" id="file-input6"> -->
                        <input type="number" class="text-box" placeholder="">
                    </div>

                    <div class="file-upload">

                        <img src="css/img/img_icon.png" alt="Upload Icon">
                        <!-- No input file for this div -->
                        <input type="number" class="text-box" placeholder="">
                    </div>

                    <div class="file-upload">

                        <img src="css/img/img_icon.png" alt="Upload Icon">
                        <!-- <input type="file" id="file-input8"> -->
                        <input type="number" class="text-box" placeholder="">
                    </div>

                    <div class="card-container">
                        <div class="card-header">
                            Cart </div>
                        <div class="box-container">
                            <div class="file-count">
                                Social Media Design
                            </div>
                            <div class="count-box">

                                <div class="label">Total Files</div>
                                <input type="number" name="cart"  value="<?php echo set_value('cart',$result['cart']); ?>" style="margin-top: 20px;">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Buttons -->
                <button id="submit-btn" value="submit">Submit</button>
                <button id="close-btn">Close</button>
        </form>
    </section>

</body>

</html>
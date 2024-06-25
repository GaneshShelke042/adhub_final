<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">
    <link rel="stylesheet" href="https://wanming.github.io/angular-editor/stylesheets/simditor.css">
    <link rel="stylesheet" href="">
    <!-- <link rel="stylesheet" href=""> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://wanming.github.io/angular-editor/javascripts/simditor/simditor-all.js"></script>
    <script src="https://wanming.github.io/angular-editor/javascripts/directives/doc_directive.js"></script>

    <style>
        /* body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #7d96da;
        } */


        .container {
            margin-top:65%;
            /* max-width: 900px; */
            width: 100%;
            height: 100%;
            margin-right: 20px;
            border-radius: 6px;
            /* padding: 30px; */
            
            background-color: #fff;
            box-shadow: 10px 5px 10px rgba(0, 0, 0, 0.1);
        }

        .input-field {
            margin-bottom: 20px;
        }

        #image {
            display: none;
            /* Hide the file input */
        }

        .image-upload {
            position: relative;
            cursor: pointer;
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        .upload-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        form {
            margin-top: 16px;
            min-height: 500px;
            background-color: #fff;
            overflow: hidden;
        }

        .fields {

            display: flex;
            align-items: center;
            /* justify-content: space-between; */
            flex-wrap: wrap;
        }

        .input-field {
            float: right;
            display: flex;
            flex-direction: column;
            width: auto;
            margin: 4px 0;
        }

        input,
        select {
            outline: none;
            font-size: 14px;
            font-weight: 400;
            color: #333;
            border-radius: 5px;
            border: 1px solid #aaa;
            padding: 0 15px;
            height: 42px;
            margin: 8px 0;
        }

        input:is(:focus, :valid) {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
        }

        .media {
            /* padding: 25px; */
            margin: 25px 0;
            display: flex;
            /* justify-content: space-between; */
        }

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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f6f4;
            color: #000;
        }

        input[readonly] {
            background-color: #f4f4f4;
            cursor: not-allowed;
        }



        .delete-button {
            background-color: #ff3333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }


        .input-field {
            margin-bottom: 20px;
        }


        .input-field-1 {
            padding: 10px 20px 0 20px;
            height: fit-content;
        }

        .image-upload {
            position: relative;
            cursor: pointer;
            border: 2px solid #ccc;
            border-radius: 5px;
            width: 200px;
            /* Specify the width of the box */
            height: 200px;
            /* Specify the height of the box */
            overflow: hidden;
            /* Ensure the image stays within the container */
        }

        .uploaded-image {
            width: 100%;
            /* Make the image fill the box horizontally */
            height: auto;
            /* Maintain aspect ratio */
        }

        .upload-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: #888;
            cursor: pointer;
        }

        .media1 {
            margin-left: 2%;
        }

        .container1 {
            display: none;
        }

        section {
            box-shadow: 0 3px 6px rgba(0.14, 0.16, 0.18, 0.13);
        }

        a {
            cursor: pointer;
        }

        .editor {
            position: relative;


        }

        .editorAria {
            max-width: 100%;
            height: 50%;
            min-height: 400px;
            border: 1px solid #ddd;
            overflow-y: auto;
            padding: 1em;
            margin-top: -2px;
            outline: none;
        }

        .toolbar {
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
        }

        .toolbar a,
        .fore-wrapper,
        .back-wrapper {
            border: 1px solid #ddd;
            background: #FFF;
            font-family: 'Candal';
            color: #000;
            padding: 5px;
            margin: 2px 0px;
            width: 35px;
            height: 35px;
            display: inline-block;
            text-align: center;
            text-decoration: none;
        }

        .toolbar a:hover,
        .fore-wrapper:hover,
        .back-wrapper:hover {
            background: #0eacc6;
            color: #fff;
            border-color: #0eacc6;
        }

        a.palette-item {
            display: inline-block;
            height: 1.3em;
            width: 1.3em;
            margin: 0px 1px 1px;
            cursor: pointer;
        }

        a.palette-item[data-value="#FFFFFF"] {
            border: 1px solid #ddd !important;
        }

        a.palette-item:hover {
            transform: scale(1.1);
        }

        .fore-wrapper,
        .back-wrapper {
            position: relative;
            cursor: auto;
        }

        .fore-palette,
        .back-palette {
            display: none;
            cursor: auto;
        }

        .fore-wrapper:hover .fore-palette,
        .back-wrapper:hover .back-palette {
            display: block;
        }

        .fore-wrapper .fore-palette,
        .back-wrapper .back-palette {
            position: relative;
            display: inline-block;
            cursor: auto;
            display: block;
            left: 0;
            top: calc(100% + 5px);
            position: absolute;
            padding: 10px 5px;
            width: 160px;
            background: #FFF;
            box-shadow: 0 0 5px #CCC;
            display: none;
            text-align: left;
        }

        .fore-wrapper .fore-palette:after,
        .back-wrapper .back-palette:before {
            content: '';
            display: inline-block;
            position: absolute;
            top: -10px;
            left: 10px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #fff;
        }

        .fore-palette a,
        .back-palette a {
            background: #FFF;
            margin-bottom: 2px;
            border: none;
        }

        .editor img {
            max-width: 100%;
            object-fit: cover;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

    <title>Document</title>
</head>

<body>
    <section class="home-section" style="margin-top: -50%;">

        <form method="post" name="AddNewClient" action="">

            <div class="input-field-1" style="float:left">
                <label for="image">Upload Image:
                    <div class="image-upload">
                        <input type="file" id="image" name="image" accept="image/*">
                        <img class="uploaded-image" src="" id="uploaded-image" src="" alt="Uploaded Image">
                    </div>
                </label>
            </div>
            <div class="fields">

                <div class="input-field" style="width: 70%;">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Enter your name"   value="<?php echo set_value('name',$result['name']); ?>" required>
                </div>

                <!-- <div class="input-field" style="width: 30%; padding-left: 30px;">
                    <label for="package">Package:</label>
                    <select name="package">
                        <option value="Gold">Gold</option>
                        <option value="Silver">Silver</option>
                    </select>
                </div> -->

                <div class="input-field" style="width: 19%; padding-left: 30px;">
                    <label for="status">Status:</label>
                    <select id="status" name="status"   value="<?php echo set_value('status',$result['status']); ?>">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <div class="input-field" style="width: 90%;">
                    <label>Short Description </label>
                    <textarea id="description" name="description"> <?php echo set_value('description',$result['short_description']); ?></textarea>
                </div>

                <div class="input-field" style="width:40%; padding-left: 5px;">
                    <label for="category">Category</label>
                    <select id="category" name="category"  value="<?php echo set_value('category',$result['category']); ?>">
                        <option value="Category 1">Type 1</option>

                    </select>

                </div>

                <div class="input-field" style="width: 40%; padding-left: 25px;">
                    <label>Video</label>
                    <input type="text" name="vidio" placeholder=""  value="<?php echo set_value('vidio',$result['video_link']); ?>" required>
                </div>

                <div class="input-field" style="width: 10%; padding-left: 25px;">
                    <lable>hidden price</lable>
                    <label class="switch">
                        <input type="checkbox"  >
                        <span class="slider round"></span>
                    </label>
                </div>

            </div>

            <div class="fields">

                <div class="input-field" style="width: 19%; padding-left: 25px;">
                    <label>Price</label>
                    <input type="number" name="price" placeholder=""  value="<?php echo set_value('price',$result['price']); ?>" required>
                </div>

                <!-- <div class="input-field" style="width: 30%; ">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address"></textarea>
                </div> -->

                <div class="input-field" style="width: 15%; padding-left: 30px;">
                    <label>Discount</label>
                    <input type="number" name="discount" placeholder=""  value="<?php echo set_value('discount',$result['discount']); ?>" required>
                </div>

                <div class="input-field" style="width: 15%; padding-left: 30px;">
                    <label>Discount type</label>
                    <select id="discount-type" name="discount-type"   value="<?php echo set_value('discount-type',$result['discount_type']); ?>">
                        <option value="discount 1">Type 1</option>
                    </select>
                </div>

                <div class="input-field" style="width: 20%; padding-left: 30px;">
                    <label>Sub Total</label>
                    <input type="text" name="Sub-Total" placeholder=""  value="<?php echo set_value('Sub-Total',$result['sub_total']); ?>" required>
                </div>


                <div class="input-field" style="width: 30%; padding-left: 30px;">
                    <label>GST</label>
                    <input type="text" name="gst" placeholder="" id="s"  value="<?php echo set_value('gst',$result['gst']); ?>" required>
                </div>

                <div class="input-field" style="width: 20%; padding-left: 30px;">
                    <label>GST Type</label>
                    <select id="gst-type" name="gst-type"  value="<?php echo set_value('gst-type',$result['gst-type']); ?>">
                        <option value="calender 1">Type 1</option>

                    </select>
                </div>


                <div class="input-field" style="width: 30%; padding-left: 30px;">
                    <label>GST (₹)</label>
                    <input type="text" name="gst-ammount" placeholder="" id="salesExecutive"  value="<?php echo set_value('gst-ammount',$result['gst_amount']); ?>" required>
                </div>
                <div class="input-field" style="width: 20%; padding-left: 30px;">
                    <label>Amount</label>
                    <input type="text" name="amount" placeholder=""  value="<?php echo set_value('amount',$result['amount']); ?>" required>
                </div>

                <div class="input-field" style="width: 20%; padding-left: 30px;">
                    <label>Total</label>
                    <input type="text" name="total" placeholder="" id="salesExecutive"  value="<?php echo set_value('total',$result['total']); ?>" required>
                </div>
            </div>

            <div class="container">

                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12 col-lg-8">
                        <div class="editor" id="editor-1">
                            <div class="toolbar">
                                <a href="#" data-command='undo' data-toggle="tooltip" data-placement="top" title="Undo"><i class='fa fa-undo'></i></a>
                                <a href="#" data-command='redo' data-toggle="tooltip" data-placement="top" title="Redo"><i class='fa fa-redo '></i></a>
                                <a href="#" data-command='removeFormat' data-toggle="tooltip" data-placement="top" title="Clear format"><i class='fa fa-times '></i></a>
                                <div class="fore-wrapper"><i class='fa fa-font' data-toggle="tooltip" data-placement="top" title="text color" style='color:#C96;'></i>
                                    <div class="fore-palette">
                                    </div>
                                </div>
                                <div class="back-wrapper"><i class='fa fa-font' data-toggle="tooltip" data-placement="top" title="Background color" style='background:#C96;'></i>
                                    <div class="back-palette">
                                    </div>
                                </div>
                                <a href="#" data-command='bold' data-toggle="tooltip" data-placement="top" title="Bold"><i class='fa fa-bold'></i></a>
                                <a href="#" data-command='italic' data-toggle="tooltip" data-placement="top" title="Italic"><i class='fa fa-italic'></i></a>
                                <a href="#" data-command='underline' data-toggle="tooltip" data-placement="top" title="Underline"><i class='fa fa-underline'></i></a>
                                <a href="#" data-command='strikeThrough' data-toggle="tooltip" data-placement="top" title="Stike through"><i class='fa fa-strikethrough'></i></a>
                                <a href="#" data-command='justifyLeft' data-toggle="tooltip" data-placement="top" title="Left align"><i class='fa fa-align-left'></i></a>
                                <a href="#" data-command='justifyCenter'><i class='fa fa-align-center' data-toggle="tooltip" data-placement="top" title="Center align"></i></a>
                                <a href="#" data-command='justifyRight' data-toggle="tooltip" data-placement="top" title="Right align"><i class='fa fa-align-right'></i></a>
                                <a href="#" data-command='justifyFull' data-toggle="tooltip" data-placement="top" title="Justify"><i class='fa fa-align-justify'></i></a>
                                <a href="#" data-command='indent' data-toggle="tooltip" data-placement="top" title="Indent"><i class='fa fa-indent'></i></a>
                                <a href="#" data-command='outdent' data-toggle="tooltip" data-placement="top" title="Outdent"><i class='fa fa-outdent'></i></a>
                                <a href="#" data-command='insertUnorderedList' data-toggle="tooltip" data-placement="top" title="Unordered list"><i class='fa fa-list-ul'></i></a>
                                <a href="#" data-command='insertOrderedList' data-toggle="tooltip" data-placement="top" title="Ordered list"><i class='fa fa-list-ol'></i></a>
                                <a href="#" data-command='h1' data-toggle="tooltip" data-placement="top" title="H1">H1</a>
                                <a href="#" data-command='h2' data-toggle="tooltip" data-placement="top" title="H2">H2</a>
                                <a href="#" data-command='createlink' data-toggle="tooltip" data-placement="top" title="Inser link"><i class='fa fa-link'></i></a>
                                <a href="#" data-command='unlink' data-toggle="tooltip" data-placement="top" title="Unlink"><i class='fa fa-unlink'></i></a>
                                <a href="#" data-command='insertimage' data-toggle="tooltip" data-placement="top" title="Insert image"><i class='fa fa-image'></i></a>
                                <a href="#" data-command='p' data-toggle="tooltip" data-placement="top" title="Paragraph">P</a>
                                <a href="#" data-command='subscript' data-toggle="tooltip" data-placement="top" title="Subscript"><i class='fa fa-subscript'></i></a>
                                <a href="#" data-command='superscript' data-toggle="tooltip" data-placement="top" title="Superscript"><i class='fa fa-superscript'></i></a>
                            </div>
                            <div id='editor' class="editorAria" contenteditable>

                            </div>
                        </div>
                    </div>
                </div>




                <div class="fields">
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>CW(₹)</label>
                        <input type="text" name="CW" placeholder="" id="salesExecutive"  value="<?php echo set_value('CW',$result['cw']); ?>" required>
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>HCW(₹)</label>
                        <input type="text" name="HCW" placeholder="" id="salesExecutive"  value="<?php echo set_value('HCW',$result['hcw']); ?>" required>
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>GD(₹)</label>
                        <input type="text" name="GD" placeholder="" id="salesExecutive"  value="<?php echo set_value('GD',$result['gd']); ?>" required>
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>HGD(₹)</label>
                        <input type="text" name="HGD" placeholder="" id="salesExecutive"  value="<?php echo set_value('HGD',$result['hgd']); ?>" required>
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>SMM(₹)</label>
                        <input type="text" name="SMM" placeholder="" id="salesExecutive"  value="<?php echo set_value('SMM',$result['smm']); ?>" required>
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>HSMM(₹)</label>
                        <input type="text" name="HSMM" placeholder="" id="salesExecutive"  value="<?php echo set_value('HSMM',$result['hsmm']); ?>" required>
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>TI(₹)</label>
                        <input type="text" name="TI" placeholder="" id="salesExecutive"  value="<?php echo set_value('TI',$result['ti']); ?>" required>
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>HTI(₹)</label>
                        <input type="text" name="HTI" placeholder="" id="salesExecutive"  value="<?php echo set_value('HTI',$result['hti']); ?>" required>
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>Admin(₹)</label>
                        <input type="text" name="Admin" placeholder="" id="salesExecutive"  value="<?php echo set_value('Admin',$result['admin']); ?>" required>
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>SE(₹)</label>
                        <input type="text" name="SE" placeholder="" id="salesExecutive"  value="<?php echo set_value('SE',$result['se']); ?>" required>
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>HSE(₹)</label>
                        <input type="text" name="HSE" placeholder="" id="salesExecutive"  value="<?php echo set_value('HSE',$result['hse']); ?>" required>
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>TC(₹)</label>
                        <input type="text" name="TC" placeholder="" id="salesExecutive"  value="<?php echo set_value('TC',$result['tc']); ?>" required>
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>HTC(₹)</label>
                        <input type="text" name="HTC" placeholder="" id="salesExecutive"  value="<?php echo set_value('HTC',$result['htc']); ?>" required>
                    </div>


                </div>



                <!-- <button class="submit-button" onclick="submitForm()">
                <span>Submit</span>
                <i class="uil uil-navigator"></i>
            </button>
        </form>
    </div> -->


                <div style="text-align: center; margin-top: 20px;">
                    <button class="submit-button" onclick="submitForm()">
                        <span>Submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>

                    <button class="delete-button" onclick="submitForm()">
                        <span>Close</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
        </form>
        </div>


        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            });
            $(document).ready(function() {
                var colorPalette = ['000000', 'FF9966', '6699FF', '99FF66', 'CC0000', '00CC00', '0000CC', '333333', '0066FF', 'FFFFFF'],
                    forePalette = $('.fore-palette'),
                    backPalette = $('.back-palette'),
                    editor = $('.editor');

                for (var i = 0; i < colorPalette.length; i++) {
                    forePalette.append('<a href="#" data-command="foreColor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
                    backPalette.append('<a href="#" data-command="backColor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
                }
                $('.toolbar a').click(function(e) {
                    e.preventDefault();
                    var command = $(this).data('command');
                    if (command == 'h1' || command == 'h2' || command == 'p') {
                        document.execCommand('formatBlock', false, command);
                    }
                    if (command == 'foreColor' || command == 'backColor') {
                        var color = $(this).data('value');
                        document.execCommand($(this).data('command'), false, color);
                        alert(color);
                    }
                    if (command == 'removeFormat') {
                        document.execCommand('removeFormat', false, command);
                    }
                    if (command == 'createlink' || command == 'insertimage') {
                        url = prompt('Enter the link here: ', 'http:\/\/');
                        console.log(command + " " + url);
                        document.execCommand($(this).data('command'), false, url);
                        // document.execCommand($(this).data('command') && 'enableObjectResizing', false, url);
                    } else document.execCommand($(this).data('command'), false, url);
                });
                $('.editorAria img').click(function() {
                    document.execCommand('enableObjectResizing', false);
                });
                $("#getHTML").click(function() {
                    var editorId = $(this).attr('get-data');
                    var html = $("#" + editorId).find('.editorAria').html();
                    alert(html);
                });
            });
        </script>



    </section>
</body>

</html>
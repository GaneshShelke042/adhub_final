<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>Dynamic Form</title>
    <style>
        .checkbox-container {
            display: flex;
            margin-top: 10px;
            align-items: center;
        }

        .checkbox-container input[type="checkbox"] {
            margin-right: 5px;
        }

        .myForm {
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
        }

     
    </style>
</head>

<body>
   
        <form class="myForm" action="<?php echo base_url() . 'index.php/CustomTaskContro/addQuestion' ?>" method="post" onsubmit="return validateForm()">
            <div class="container mt-6" style="height: 100%;">
                <div class="row">
                    <?php
                    $form_Name = $this->uri->segment(3);
                    $client_id = $this->uri->segment(4);
                    ?>
                    <input type="hidden" name="form_Name" value="<?php echo $form_Name ?>">
                    <input type="hidden" name="client_id" value="<?php echo $client_id ?>">
                    <?php
                    $existingAnswers = isset($existingAnswers) ? explode(",", $existingAnswers['ans']) : array();
                    ?>
                    <?php
                    if (!empty($result)) {
                        $prev_description = '';
                        $answerIndex = 0;
                        foreach ($result as $userData) {
                            if ($userData['name'] == $form_Name) {
                                if ($userData['description'] != $prev_description) {
                    ?>
                                    <div class="col-md-12">
                                        <h4><?php echo $userData['description']; ?></h4>
                                    </div>
                    <?php
                                    $prev_description = $userData['description'];
                                }

                                $required = $userData['required'] == 1 ? true : false;
                                $requiredAsterisk = $required ? '<span style="color: red">*</span>' : '';


                                echo '<div class="col-md-' . $userData['cols'] . '">';
                                echo '<div class="form-group">';
                                echo '<label for="' . $userData['question'] . '">' . $userData['question'] . $requiredAsterisk . '</label>';
                                echo '<input type="hidden" name="question[]" value="' . $userData['question'] . '">';
                                $answerValue = isset($existingAnswers[$answerIndex]) ? $existingAnswers[$answerIndex] : '';

                                switch ($userData['type']) {

                                    case 'number':
                                        echo '<input type="number" class="form-control" id="' . $userData['question'] . '" name="ans[]" placeholder="' . $userData['dis'] . '" value="' . $answerValue . '" ' . ($required ? 'required' : '') . '>';
                                        break;

                                    case 'password':
                                        echo '<input type="password" class="form-control" id="' . $userData['question'] . '" name="ans[]" placeholder="' . $userData['dis'] . '" value="' . $answerValue . '" ' . ($required ? 'required' : '') . '>';
                                        break;

                                    case 'textarea':
                                        echo '<textarea class="form-control" id="' . $userData['question'] . '" name="ans[]" ' . ($required ? 'required' : '') . ' oninput="removeCommas(this)">' . $answerValue . ' </textarea>';
                                        echo '<script>
                                                function removeCommas(element) {
                                                    element.value = element.value.replace(/,/g, "");
                                                }
                                            </script>';
                                        break;


                                    case 'text':
                                        echo '<input type="text" class="form-control" id="' . $userData['question'] . '" name="ans[]" placeholder="' . $userData['dis'] . '" value="' . $answerValue . '" ' . ($required ? 'required' : '') . ' oninput="removeCommas(this)">';
                                        echo '<script>
                                                    function removeCommas(element) {
                                                        element.value = element.value.replace(/,/g, "");
                                                    }
                                                </script>';
                                        break;

                                    case 'email':
                                        echo '<input type="email" class="form-control" id="' . $userData['question'] . '" name="ans[]" placeholder="' . $userData['dis'] .  '" value="' . $answerValue . '" ' . ($required ? 'required' : '') . '>';
                                        break;
                                    case 'date':
                                        echo '<input type="date" class="form-control" id="' . $userData['question'] . '" name="ans[]" placeholder="' . $userData['dis'] .  '" value="' . $answerValue . '" ' . ($required ? 'required' : '') . '>';
                                        break;
                                    case 'time':
                                        echo '<input type="time" class="form-control" id="' . $userData['question'] . '" name="ans[]" placeholder="' . $userData['dis'] .  '" value="' . $answerValue . '" ' . ($required ? 'required' : '') . '>';
                                        break;
                                    case 'datetime-local':
                                        echo '<input type="datetime-local" class="form-control" id="' . $userData['question'] . '" name="ans[]" placeholder="' . $userData['dis'] .  '" value="' . $answerValue . '" ' . ($required ? 'required' : '') . '>';
                                        break;
                                    case 'url':
                                        echo '<input type="url" class="form-control" id="' . $userData['question'] . '" name="ans[]" placeholder="' . $userData['dis'] .  '" value="' . $answerValue . '" ' . ($required ? 'required' : '') . '>';
                                        break;
                                    case 'file':
                                        echo '<input type="file" class="form-control-file" id="' . htmlspecialchars($userData['question']) . '" name="ans[]" ' . ($required ? 'required' : '') . '>';
                                        break;

                                    case 'datalist':
                                        if (is_string($userData['options'])) {
                                            $datalistOptions = str_replace(['[', ']', '"'], '', $userData['options']);
                                            $optionsArray = explode(',', $datalistOptions);
                                            $datalist = '';
                                            foreach ($optionsArray as $option) {
                                                $datalist .= '<option value="' . htmlspecialchars($option) . '">';
                                            }
                                            echo '<input list="datalist-' . htmlspecialchars($userData['question']) . '" class="form-control" id="' . htmlspecialchars($userData['question']) . '" name="ans[]" placeholder="' . htmlspecialchars($userData['dis']) . '" value="' . htmlspecialchars($answerValue) . '" ' . ($required ? 'required' : '') . '>';
                                            echo '<datalist id="datalist-' . htmlspecialchars($userData['question']) . '">';
                                            echo $datalist;
                                            echo '</datalist>';
                                        } else {
                                            echo 'Datalist options are not provided or are not in the expected format';
                                        }
                                        break;

                                    case 'radio':
                                        if (is_string($userData['options'])) {
                                            $optionsString = str_replace(['[', ']', '"'], '', $userData['options']);
                                            $optionsArray = explode(',', $optionsString);

                                            // Assuming $answerValue contains the pre-filled value for the radio buttons
                                            foreach ($optionsArray as $option) {
                                                // Check if the current option is the pre-filled answer
                                                $isChecked = ($option === $answerValue) ? 'checked' : '';
                                                echo '<div class="checkbox-container">';
                                                echo '<input class="form-check-input" type="radio" id="' . htmlspecialchars($option) . '" name="ans[]" value="' . htmlspecialchars($option) . '" ' . $isChecked . ' required>';
                                                echo '<label class="form-check-label" for="' . htmlspecialchars($option) . '">' . htmlspecialchars($option) . '</label>';
                                                echo '</div>';
                                            }
                                        } else {
                                            echo 'Options are not provided or are not in the expected format';
                                        }
                                        break;



                                    case 'checkbox':
                                        if (is_string($userData['options'])) {
                                            $optionsString = str_replace(['[', ']', '"'], '', $userData['options']);
                                            $optionsArray = explode(',', $optionsString);
                                            $savedData = !empty($answerValue) ? explode('/', $answerValue) : []; // Check if there's any saved data
                                            foreach ($optionsArray as $option) {
                                                $isChecked = in_array($option, $savedData) ? 'checked' : '';
                                                echo '<div class="checkbox-container">';
                                                echo '<input class="form-check-input checklist" type="checkbox" id="' . $userData['question'] . '" value="' . htmlspecialchars($option) . '" ' . $isChecked . ' ' . ($required ? 'required' : '') . '>';
                                                echo '<label class="form-check-label" for="' . htmlspecialchars($option) . '">' . htmlspecialchars($option) . '</label>';
                                                echo '</div>';
                                            }
                                            echo '<input type="hidden" class="checklist-combined" name="ans[]" value="">';
                                        } else {
                                            echo 'Options are not provided or are not in the expected format';
                                        }
                                        break;

                                    case 'select':
                                        if (is_string($userData['options'])) {
                                            $optionsString = str_replace(['[', ']', '"'], '', $userData['options']);
                                            $optionsArray = explode(',', $optionsString);

                                            echo '<select class="form-control" name="ans[]" placeholder="' . htmlspecialchars($userData['dis']) . '" ' . ($required ? 'required' : '') . '>';
                                            echo '<option value="select">--select--</option>';
                                            foreach ($optionsArray as $option) {
                                                // Check if the current option is the pre-filled answer
                                                $isSelected = ($option === $answerValue) ? 'selected' : '';
                                                echo '<option value="' . htmlspecialchars($option) . '" ' . $isSelected . '>' . htmlspecialchars($option) . '</option>';
                                            }
                                            echo '</select>';
                                        } else {
                                            echo 'Select options are not provided or are not in the expected format';
                                        }
                                        break;

                                    case 'multiselect':
                                        if (is_string($userData['options'])) {
                                            $optionsString = str_replace(['[', ']', '"'], '', $userData['options']);
                                            $optionsArray = explode(',', $optionsString);
                                            echo '<select class="form-control multiselect" id="' . $userData['question'] . '" placeholder="' . $userData['dis']  . '" ' . ($required ? 'required' : '') . ' multiple>';
                                            echo '<option value="select">--select--</option>';
                                            foreach ($optionsArray as $option) {
                                                $isSelected = !empty($answerValue) && in_array($option, explode('/', $answerValue)) ? 'selected' : ''; // Check if there's any saved data
                                                echo '<option value="' . $option . '" ' . $isSelected . '>' . $option . '</option>';
                                            }
                                            echo '</select>';
                                            echo '<input type="hidden" class="multiselect-combined" name="ans[]" value="' . $answerValue . '">';
                                            echo '<h6>Note: <p>Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p></h6>';
                                        } else {
                                            echo 'Select options are not provided or are not in the expected format';
                                        }
                                        break;



                                    default:
                                        echo 'Unsupported input type';
                                        break;
                                }
                                echo '</div>';
                                echo '</div>';
                                $answerIndex++;
                            }
                        }
                    }
                    ?>
                </div>
                <div id="submit">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a   href="<= base_url() . 'index.php/UpdateClientContro/viewCalender/' . $client_id  ?>">
                    <span class="btn btn-primary">Close</span>
                </a>
                </div>
            </div>
        </form>
   

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function validateForm() {
            var inputs = document.querySelectorAll('input, textarea, select, file, datalist, radio, .checklist, .checkbox');
            var isValid = true;

            inputs.forEach(function(input) {
                if (input.hasAttribute('required') && !input.value.trim()) {
                    isValid = false;
                    input.style.border = '1px solid red';
                } else {
                    input.style.border = '';
                }
            });

            if (!isValid) {
                alert('Please fill in all required fields.');
            }

            // Combine selected checklist values into a single string
            var checklists = document.querySelectorAll('.checklist-combined');
            checklists.forEach(function(hiddenInput) {
                var container = hiddenInput.previousElementSibling.parentElement;
                var checkboxes = container.querySelectorAll('input[type="checkbox"]:checked');
                var combinedValue = Array.from(checkboxes).map(checkbox => checkbox.value).join('/');
                hiddenInput.value = combinedValue;
            });

            window.addEventListener('DOMContentLoaded', (event) => {
                var checklists = document.querySelectorAll('.checklist-combined');
                checklists.forEach(function(hiddenInput) {
                    var container = hiddenInput.previousElementSibling.parentElement;
                    var checkboxes = container.querySelectorAll('input[type="checkbox"]');
                    var savedData = hiddenInput.value.split('/');
                    checkboxes.forEach(function(checkbox) {
                        if (savedData.includes(checkbox.value)) {
                            checkbox.checked = true;
                        }
                    });
                });
            });


            // Combine selected multiselect values into a single string
            var multiselects = document.querySelectorAll('.multiselect-combined');
            multiselects.forEach(function(hiddenInput) {
                var container = hiddenInput.previousElementSibling;
                var selectedOptions = Array.from(container.selectedOptions);
                var combinedValue = selectedOptions.map(option => option.value).join('/');
                hiddenInput.value = combinedValue;
            });

            window.addEventListener('DOMContentLoaded', (event) => {
                var multiselects = document.querySelectorAll('.multiselect-combined');
                multiselects.forEach(function(hiddenInput) {
                    var container = hiddenInput.previousElementSibling;
                    var selectedOptions = Array.from(container.selectedOptions);
                    var combinedValue = selectedOptions.map(option => option.value).join('/');
                    hiddenInput.value = combinedValue;
                });
            });


            return isValid;
        }
    </script>
</body>

</html>
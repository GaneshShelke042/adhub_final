<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="newSideBar.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<style>
    .main-content {

        margin: 0;
        width: 100%;
        margin: 20px auto;
        margin-top: 50px;
        background-color: #fff;
        overflow: hidden;
    }

    .dashboard {
        margin: 20px;
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
    }

    .button {
        position: relative;
        width: 180px;
        height: 120px;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 500;
        color: #000;
        background-color: #fff;
        border: none;
        border-radius: 10px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
        margin-bottom: 10px;
        margin-right: 10px;
        display: flex;
        flex-direction: column;
        align-content: center;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .button i {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        color: #696CFF;
        /* Change the color of the icons */
    }

    .button:hover {
        background-color: #eae8e8;
        box-shadow: 0px 15px 20px rgb(243, 245, 244);
        color: #fff;
        transform: translateY(-7px);
    }

    .dashboard label {
        color: #333;
        /* Set label color */
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
        font-family: 'Arial', sans-serif;
        /* Add your preferred font family */
    }

    /* Dropdown section */
    .dropdown-container {
        margin-top: 20px;
        margin-left: 80%;
        position: relative;
        display: inline-block;
    }

    .dropdown-button {
        /* margin-left: 60px; */
        width: 200px;
        height: 40px;
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #fff;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-radius: 10px;
        /* Round the dropdown button */
    }

    .dropdown-content {
        position: absolute;
        top: 100%;
        left: 0;
        width: 200px;
        border: 1px solid #ccc;
        background-color: #fff;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        display: none;
        z-index: 1;
        border-radius: 10px;
        /* Round the dropdown content */
    }

    .dropdown-item {
        padding: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .dropdown-item:hover {
        background-color: #f0f0f0;
    }

    .dropdown-container:hover .dropdown-content {
        display: block;
    }

    .dropdown-button i {
        color: #c1cdcd;
        /* Change the color of the dropdown button icon */
    }

    .section-headding {
        font-style: oblique;
        font-size: medium;
        margin-left: 30px;
    }

    div[button] {
        background-color: pink;
    }

    .tiket {
        position: relative;
        width: 180px;
        height: 120px;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 500;
        color: #000;
        background-color: pink;
        border: none;
        border-radius: 10px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
        margin-bottom: 10px;
        margin-right: 10px;
        display: flex;
        flex-direction: column;
        align-content: center;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .tiket.bordered {
        border: 2px solid #333;
        /* Dark color border */
    }

    .popup {
        /* margin-top: 5%; */
        display: none;
        /* Initially hide the popup */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 255, 0.5);
        /*Faint blue color*/
        /* Blue semi-transparent background */
        z-index: 9999;
        /* Ensure it appears above other content */
        overflow-y: auto
    }

    .urgent-count {
        position: absolute;
        bottom: 5px;
        /* Adjust as needed */
        left: 5px;
        /* Adjust as needed */
        font-size: 12px;
        /* Adjust as needed */
        background-color: pink;
        /* Adjust as needed */
        padding: 2px 6px;
        /* Adjust as needed */
        border-radius: 50%;
        /* Make it circular */
        color: #fff;
        /* Text color */
    }

    .tiket.bordered {
        border: 2px solid #333;
        /* Dark color border */
    }
</style>

<body>

    <div class="home-section" style="margin-top: -50%;">
    <?php
    // echo $nameFromUrl = $this->uri->segment(5); ?>
        <!-- Content Writer -->
        <section class="main-content">
            <label class="section-heading">Head Team Lead Content Writer Dashboard</label>
            <div class="dropdown-container">
                <div class="dropdown-button">
                    <i class="fas fa-user user-icon"></i> All
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="dropdown-content">
                    <div class="dropdown-item">Option 1</div>
                    <div class="dropdown-item">Option 2</div>
                    <div class="dropdown-item"><a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/Logincontro/login">Log Out</a></div>
                </div>
            </div>
            <div class="dashboard">

            <?php
// Check if $myDashboardStatus is not null
if ($myDashboardStatus !== null) {
    // Split the $myDashboardStatus string into an array based on commas
    $statusParts = explode(',', $myDashboardStatus);

    // Iterate over each part of the array and check if any part matches the condition
    foreach ($statusParts as $statusPart) {
        // Trim any leading or trailing whitespace from the status part
        $statusPart = trim($statusPart);
        
        // Check if the status part matches the condition
        if ($statusPart === "Urgent") {
            ?>
            <button class="button" onclick="toggleUrgentButtons(1)">
                Urgent
                <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
                <i class="fas fa-exclamation-circle"></i>
            </button> 
            <?php
            // Break the loop if you want to display the button only once
            break;
        }
    }
}
// If $myDashboardStatus is null, do not display the buttons
?>






<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "In_Review") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleUrgentButtons(2)">
        In Review
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
    }
}
?>




<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Today") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleUrgentButtons(3)">
        Today
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
    }
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Changes") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleUrgentButtons(4)">
        Changes
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Rewrite") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleUrgentButtons(5)">
        Rewrite
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
    }
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Approved_by_Hand") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleUrgentButtons(6)">
        Approved by Hand
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
    }
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Send_To_Client") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleUrgentButtons(7)">
        Send_to_Client
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Approved_by_Client") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleUrgentButtons(8)">
        Approved by Client
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>




<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "reassigned") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleUrgentButtons(9)">
        Reassigned
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Advance") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleUrgentButtons(10)">
        Advance
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>




<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Hold") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleUrgentButtons(11)">
        Hold
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>


                <!-- Add other buttons here -->
            </div>


            <div class="new-button" style="display: block;">
                <div class="dashboard">

                    <!-- This is for custom task -->
                     <!-- This is for custom task -->
                    <?php
                    // Sort the $result array by deadline_datetime
                    usort($result, function ($a, $b) {
                        return strtotime($a['deadline_datetime']) - strtotime($b['deadline_datetime']);
                    });
                    ?> 

                    <!-- Inside your HTML -->
                    <div class="dashboard">
                        <?php if (!empty($result)) : 
                            $count=0;   ?>
                            <!-- <php foreach ($result as $row) : ?> -->
                                <?php foreach ($matchedClients as $row): ?>
                                <!-- Only display the ticket if it meets certain conditions -->
                                <?php if ($row['cr_Status'] == true) : ?>
                                    <div class="dashboard">
                                        <?php
                                        // Add a class to the button if cTaskORgCalender value is 1
                                        $borderClass = ($row['cTaskORgCalender'] == 1) ? 'tiket bordered' : 'tiket';
                                        ?>
                                        <!-- // Inside your PHP loop to generate ticket buttons -->
                                        <button class="<?php echo $borderClass; ?>" onclick="togglePopup(this , <?php echo $row['id']; ?>)" data-cr-status="<?php echo $row['cr_Status']; ?>">
                                            <?php echo $row['id'] ?>
                                            <?php echo $row['client_name'] ?>
                                            <?php echo $row['deadline_datetime'] ?>
                                           <?php $count++; ?>
                                        </button>

                                        <div class="popup" style="display:none;" id="togglePopup<?php echo $row['id'] ?>">
                                            <!-- Popup content goes here -->
                                            <?php include 'HTL_Cr_UpdateTask.php' ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>0 results</p>
                        <?php endif; ?>
                    </div>
                </div>
        </section>

    

            <!-- Content Writer -->
            <section class="main-content">
            <label class="section-heading">Head Team Lead Graphics Desinger Dashboard</label>
            <div class="dropdown-container">
                <div class="dropdown-button">
                    <i class="fas fa-user user-icon"></i> All
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="dropdown-content">
                    <div class="dropdown-item">Option 1</div>
                    <div class="dropdown-item">Option 2</div>
                    <div class="dropdown-item">Option 3</a></div>
                </div>
            </div>
            <div class="dashboard">

            <?php
// Check if $myDashboardStatus is not null
if ($myDashboardStatus !== null) {
    // Split the $myDashboardStatus string into an array based on commas
    $statusParts = explode(',', $myDashboardStatus);

    // Iterate over each part of the array and check if any part matches the condition
    foreach ($statusParts as $statusPart) {
        // Trim any leading or trailing whitespace from the status part
        $statusPart = trim($statusPart);
        
        // Check if the status part matches the condition
        if ($statusPart === "Urgent") {
            ?>
            <button class="button" onclick="toggleGraphicsButtons(1)">
                Urgent
                <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
                <i class="fas fa-exclamation-circle"></i>
            </button> 
            <?php
            // Break the loop if you want to display the button only once
            break;
        }
    }
}
// If $myDashboardStatus is null, do not display the buttons
?>






<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "In_Review") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleGraphicsButtons(2)">
        In Review
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
    }
}
?>




<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Today") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleGraphicsButtons(3)">
        Today
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
    }
}
?>





<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Changes") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleGraphicsButtons(4)">
        Changes
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Rewrite") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleGraphicsButtons(5)">
        Rewrite
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
    }
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Approved_by_Hand") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleGraphicsButtons(6)">
        Approved by Hand
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
    }
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Send_To_Client") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleGraphicsButtons(7)">
        Send_to_Client
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Approved_by_Client") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleGraphicsButtons(8)">
        Approved by Client
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>




<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "reassigned") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleGraphicsButtons(9)">
        Reassigned
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Advance") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleGraphicsButtons(10)">
        Advance
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>




<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Hold") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleGraphicsButtons(11)">
        Hold
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>
                <!-- Add other buttons here -->
            </div>


             <div class="new-button" style="display: block;">
                <div class="dashboard">

                    <!-- This is for custom task -->
                    <!-- This is for custom task -->
                    <?php
                    // Sort the $result array by deadline_datetime
                    usort($result, function ($a, $b) {
                        return strtotime($a['deadline_datetime']) - strtotime($b['deadline_datetime']);
                    });
                    ?>

                    <!-- Inside your HTML -->
                    <div class="dashboard">
                        <?php if (!empty($result)) :
                            $count = 0; ?>
                             <?php foreach ($matchedClients as $row): ?>
                                <!-- Only display the ticket if it meets certain conditions -->
                                <?php if ($row['gr_Status'] == true) : ?>
                                    <div class="dashboard">
                                        <?php
                                        // Add a class to the button if cTaskORgCalender value is 1
                                        $borderClass = ($row['cTaskORgCalender'] == 1) ? 'tiket bordered' : 'tiket';
                                        ?>
                                        <!-- // Inside your PHP loop to generate ticket buttons -->
                                        <button class="<?php echo $borderClass; ?>" onclick="togglePopup(this , <?php echo $row['id']; ?>)" data-gr-status="<?php echo $row['gr_Status']; ?>">
                                            <?php echo $row['id'] ?>
                                            <?php echo $row['client_name'] ?>
                                            <?php echo $row['deadline_datetime'] ?>
                                            <?php $count++; ?>
                                        </button>

                                        <div class="popup" style="display:none;" id="togglePopup<?php echo $row['id'] ?>">
                                            <!-- Popup content goes here -->
                                            <?php include 'HTL_Gr_UpdateTask.php' ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>0 results</p>
                        <?php endif; ?>
                    </div>
                </div>

        </section>

        <section class="main-content">
            <label class="section-heading">Head Team Lead SMM Dashboard</label>
            <div class="dropdown-container">
                <div class="dropdown-button">
                    <i class="fas fa-user user-icon"></i> All
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="dropdown-content">
                    <div class="dropdown-item">Option 1</div>
                    <div class="dropdown-item">Option 2</div>
                    <div class="dropdown-item">Option 3</div>
                </div>
            </div>
            <div class="dashboard">

            <?php
// Check if $myDashboardStatus is not null
if ($myDashboardStatus !== null) {
    // Split the $myDashboardStatus string into an array based on commas
    $statusParts = explode(',', $myDashboardStatus);

    // Iterate over each part of the array and check if any part matches the condition
    foreach ($statusParts as $statusPart) {
        // Trim any leading or trailing whitespace from the status part
        $statusPart = trim($statusPart);
        
        // Check if the status part matches the condition
        if ($statusPart === "Urgent") {
            ?>
            <button class="button" onclick="toggleSmmButtons(1)">
                Urgent
                <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
                <i class="fas fa-exclamation-circle"></i>
            </button> 
            <?php
            // Break the loop if you want to display the button only once
            break;
        }
    }
}
// If $myDashboardStatus is null, do not display the buttons
?>






<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "In_Review") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleSmmButtons(2)">
        In Review
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
    }
}
?>




<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Today") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleSmmButtons(3)">
        Today
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
    }
}
?>





<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Changes") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleSmmButtons(4)">
        Changes
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Rewrite") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleSmmButtons(5)">
        Rewrite
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
    }
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Approved_by_Hand") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleSmmButtons(6)">
        Approved by Hand
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
    }
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Send_To_Client") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleSmmButtons(7)">
        Send_to_Client
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Approved_by_Client") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleSmmButtons(8)">
        Approved by Client
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>




<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "reassigned") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleSmmButtons(9)">
        Reassigned
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>



<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Advance") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleSmmButtons(10)">
        Advance
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>




<?php
if ($myDashboardStatus !== null) {
// Split the $myDashboardStatus string into an array based on commas
$statusParts = explode(',', $myDashboardStatus);

// Iterate over each part of the array and check if any part matches the condition
foreach ($statusParts as $statusPart) {
    // Trim any leading or trailing whitespace from the status part
    $statusPart = trim($statusPart);
    
    // Check if the status part matches the condition
    if ($statusPart === "Hold") { // Change 'Urgent' to the condition you want to match
        ?>
        <button class="button" onclick="toggleSmmButtons(11)">
        Hold
            <span id="urgentCount" class="urgent-count"></span> <!-- Display count here  -->
            <i class="fas fa-exclamation-circle"></i>
        </button> 
        <?php
        // Break the loop if you want to display the button only once
        break;
    }
}
}
?>


                <!-- Add other buttons here -->
            </div>
           
            <div class="new-button" style="display: block;">
                <div class="dashboard">

                    <!-- This is for custom task -->
                    <!-- This is for custom task -->
                    <?php
                    // Sort the $result array by deadline_datetime
                    usort($result, function ($a, $b) {
                        return strtotime($a['deadline_datetime']) - strtotime($b['deadline_datetime']);
                    });
                    ?>

                    <!-- Inside your HTML -->
                    <div class="dashboard">
                        <?php if (!empty($result)) :
                            $count = 0; ?>
                             <?php foreach ($matchedClients as $row): ?>
                                <!-- Only display the ticket if it meets certain conditions -->
                                <?php if ($row['smm_Status'] == true) : ?>
                                    <div class="dashboard">
                                        <?php
                                        // Add a class to the button if cTaskORgCalender value is 1
                                        $borderClass = ($row['cTaskORgCalender'] == 1) ? 'tiket bordered' : 'tiket';
                                        ?>
                                        <!-- // Inside your PHP loop to generate ticket buttons -->
                                        <button class="<?php echo $borderClass; ?>" onclick="togglePopup(this , <?php echo $row['id']; ?>)" data-smm-status="<?php echo $row['smm_Status']; ?>">
                                            <?php echo $row['id'] ?>
                                            <?php echo $row['client_name'] ?>
                                            <?php echo $row['deadline_datetime'] ?>
                                            <?php $count++; ?>
                                        </button>

                                        <div class="popup" style="display:none;" id="togglePopup<?php echo $row['id'] ?>">
                                            <!-- Popup content goes here -->
                                            <?php include 'HTL_Smm_UpdateTask.php' ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>0 results</p>
                        <?php endif; ?>
                    </div>
                </div>

        </section>
    </div>


    








    <script>
        function togglePopup(button, ticketId) {
            // Toggle the visibility of the popup
            const popup = button.nextElementSibling;
            if (popup.style.display === 'none' || popup.style.display === '') {
                // Set ticketId as a data attribute in the popup element
                popup.setAttribute('data-ticket-id', ticketId);
                popup.style.display = 'block';

                // Update the URL with ticketId as a query parameter
                const url = new URL(window.location.href);
                url.searchParams.set('ticketId', ticketId);
                window.history.pushState({
                    path: url.href
                }, '', url.href);
            } else {
                popup.style.display = 'none';
            }

            // Print the ticket ID instead of redirecting
            console.log('Ticket ID:', ticketId);
        }

        // Updated JavaScript function to toggle visibility and filter tickets
        function toggleUrgentButtons(crStatus) {
            // Get all ticket buttons
            /// Show all buttons initially
            var allButtons = document.querySelectorAll('.dashboard button');
            allButtons.forEach(function(button) {
                button.style.display = 'flex';
            });

            // Hide tickets not associated with the clicked button
            var allTickets = document.querySelectorAll('.dashboard');
            allTickets.forEach(function(ticket) {
                var associatedTickets = ticket.querySelectorAll('button[data-cr-status="' + crStatus + '"]');
                if (associatedTickets.length === 0) {
                    ticket.style.display = 'none';
                } else {
                    ticket.style.display = 'flex';
                }
            });
        }

            
            // Updated JavaScript function to toggle visibility and filter tickets
        function toggleGraphicsButtons(grStatus) {
            // Get all ticket buttons
            /// Show all buttons initially
            var allButtons = document.querySelectorAll('.dashboard button');
            allButtons.forEach(function(button) {
                button.style.display = 'flex';
            });

            // Hide tickets not associated with the clicked button
            var allTickets = document.querySelectorAll('.dashboard');
            allTickets.forEach(function(ticket) {
                var associatedTickets = ticket.querySelectorAll('button[data-gr-status="' + grStatus + '"]');
                if (associatedTickets.length === 0) {
                    ticket.style.display = 'none';
                } else {
                    ticket.style.display = 'flex';
                }
            });
        }

           // Updated JavaScript function to toggle visibility and filter tickets
           function toggleSmmButtons(smmStatus) {
            // Get all ticket buttons
            /// Show all buttons initially
            var allButtons = document.querySelectorAll('.dashboard button');
            allButtons.forEach(function(button) {
                button.style.display = 'flex';
            });

            // Hide tickets not associated with the clicked button
            var allTickets = document.querySelectorAll('.dashboard');
            allTickets.forEach(function(ticket) {
                var associatedTickets = ticket.querySelectorAll('button[data-smm-status="' + smmStatus + '"]');
                if (associatedTickets.length === 0) {
                    ticket.style.display = 'none';
                } else {
                    ticket.style.display = 'flex';
                }
            });
        }




            // Optionally, update the display of the urgent button
            var urgentButton = document.querySelector('.dashboard button:nth-child(1)');
            if (crStatus !== undefined) {
                urgentButton.setAttribute('onclick', '');
            } else {
                urgentButton.setAttribute('onclick', 'toggleUrgentButtons(this)');
            }
        



        // Function to update the count and display it on the Urgent button
        function updateUrgentCount(count) {
            var urgentCountElement = document.getElementById('urgentCount');
            urgentCountElement.textContent = count;
        }

        // Replace `$count` with the actual count value obtained from PHP
        var urgentCount = <?php echo $count; ?>; // Assuming $count is defined in your PHP code

        // // Update the count on the Urgent button
        updateUrgentCount(urgentCount);




    </script>


</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    .container {
    border: 1px solid #000;
    padding: 20px;
    width: 300px;
}

.container h2 {
    margin-top: 0;
}
.container {
    /* margin-top: -50; */
    width: 300px; /* Adjust width as needed */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.btnS{
    margin-top: 10%;
}

</style>
<body>

<form class="myPopForm" method="post" action="<?php echo base_url('index.php/TeamLead/TL_dashboardControll/acceptTicket'); ?>">
    <div class="container">
        <h3>Content Writer</h3>
        <select id="ticketValue" name="ticketValue">
            <?php
            if (!empty($userResult)) {
                foreach ($userResult as $userData) {
                    // Output each option with the value and label from the database
                    if ($userData['role'] === 'Content_Writer') {
                        echo '<option value="' . $userData['username'] . '">' . $userData['username'] . '</option>';
                    }
                }
            }
            ?>
        </select>
        <div ><button class="btnS" onclick="submit()">submit</button></div>
    </div>
    
</form>
<script>
    function submit(){
        document.getElementById('myPopForm').submit();
    }
</script>

</body>
</html>

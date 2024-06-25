<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>setting</title>
    <style>
        button {
            background-color: #00008B;
            color: #fff;
            border: none;
            padding: 10px 20px;
            /* Adjust padding to change button size */
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }

        .border {
            width: 30%;
            background-color: dimgray;
            box-shadow: 10px;
        }

        .client,
        .Add {
            /* margin-top: 5%; */
            display: none;
            /* Initially hide the popup */
            position: fixed;
            top: 18%;
            left: 38%;
            width: 60%;
            height: 80%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            overflow: auto;
            /* Blue semi-transparent background */
         
            /* z-index: 9999; */
            /* Ensure it appears above other content */
        }
        .home-section{
            margin-top:2%;
        }
    </style>
</head>

<body>
    <section class="home-section" >

        <div class="border">
            <button onclick="togglePopup('client')">
                <i class='bx bx-group icons'></i> Client
            </button>

            <div id="client" class="client" data-toggle="client" data-target="#client">
                <!-- Content for Client popup -->
                <?php include 'Client.php'; ?>
            </div>

            <button class="add-new-button" onclick="togglePopup('Add')">
                <i class="fas fa-plus"></i> Add
            </button>

            <div id="Add" class="Add" data-toggle="Add" data-target="#Add">
                <!-- Content for Add popup -->
                <?php include 'Add.php'; ?>
            </div>
        </div>

    </section>
    <script>
        function togglePopup(id) {
            var popup = document.getElementById(id);
            var popups = document.querySelectorAll('.client, .Add');

            // Close all other popups
            popups.forEach(function (item) {
                if (item.id !== id) {
                    item.style.display = "none";
                }
            });

            // Toggle the target popup
            popup.style.display = (popup.style.display === "none" || popup.style.display === "") ? "block" : "none";
        }
    </script>
</body>

</html>

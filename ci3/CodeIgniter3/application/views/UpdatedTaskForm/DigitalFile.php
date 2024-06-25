<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- DataTables Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <style>
        .container {
            margin-top:65%;
            /* max-width: 900px; */
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        button.action-button {
            color: #1a75ff;
            background-color: #fff;
            border: none;
            padding: 8px;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }

        button.action-button:hover {
            background-color: #f4f6f4;
        }

        button.action-button i {
            margin-right: 5px;
            font-size: 18px; /* Adjust the font size here */
        }

        .add-new-button {
            background-color: #1a75ff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 6px;
            position: absolute;
            top: 10px;
            right: 10px;
            margin-right: 20px;
        }

        .additional-buttons button.action-button {
            display: inline-block;
        }

    </style>
</head>
<body>
<section class="home-section" style="margin-top: -50%;">

        <!-- Button to trigger the popup -->
        <button class="add-new-button" onclick="showPopup()">
            <i class="fas fa-plus"></i> Add New
        </button>

        <!-- Popup container -->
        <div id="popupContainer" class="container-popup" data-toggle="modal" data-target="#exampleModal">
    
        </div>

        <div class="container">
            <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>type</th>
                        <th>total files</th>
                        <th>Created On</th>
                        <th>Action</th> <!-- New column for action button -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>demo</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td colspan="2" class="additional-buttons">
                            <button class="action-button edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-button view">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </section>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Bootstrap JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>

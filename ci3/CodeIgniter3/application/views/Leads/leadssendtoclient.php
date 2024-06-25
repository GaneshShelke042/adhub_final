<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leads send to client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (!empty($datafilter) && !empty($idfromuri)) { ?>
                let data = <?php echo json_encode($datafilter); ?>;
                let form = document.createElement('form');
                form.setAttribute('method', 'POST');
                form.setAttribute('action', '<?php echo base_url() ?>index.php/receivedleads/sendleadstoclients/<?php echo $idfromuri; ?>');
                form.setAttribute('id', 'sendToClientsForm'); // Unique ID for the form

                let postdataField = document.createElement('input');
                postdataField.setAttribute('type', 'hidden');
                postdataField.setAttribute('name', 'leadssent');
                postdataField.setAttribute('value', JSON.stringify(data));

                form.appendChild(postdataField);
                document.body.appendChild(form);
                form.submit();
            <?php } else { ?>
                let form1 = document.createElement('form');
                form1.setAttribute('method', 'POST');
                form1.setAttribute('action', '<?php echo base_url() ?>index.php/Leads/Fetchdata/<?php echo $idfromuri; ?>');
                form1.setAttribute('id', 'fetchDataForm'); // Unique ID for the form

                document.body.appendChild(form1);
                form1.submit();
            <?php } ?>
        });
    </script>
</body>

</html>

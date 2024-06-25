<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .container {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-top: 70px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f4f6f4;
    }

    button {
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        margin-bottom: 6px;
    }

    .search-container {
        margin-bottom: 20px;
    }

    .search-container input[type=text] {
        width: 30%;
        padding: 10px;
        margin-top: 8px;
        font-size: 17px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .add-new-button {
        position: absolute;
        top: 10px;
        right: 10px;
        margin-right: 20px;
    }
</style>

<body>
    <section class="home-section">
        <div class="container">

            <div class="search-container">
                <input type="text" id="searchInput1" value="https://graph.facebook.com/v19.0/" readonly>
                <input type="text" id="searchInput2" value="<?php echo $result->formid ?>/leads?" readonly>
                <input type="text" id="searchInput3" value="access_token=<?= $accesstoken->Accesstoken ?>" readonly>
            </div>
            <div class="search-container">
                <button type="button" id="sendtodatabase" class="btn btn-primary">Click here </button>
            </div>
            <div class="search-container">
                <button type="button" id="demosend" class="btn btn-primary">Click here demo </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>sr</th>
                        <th>full_name</th>
                        <th>phone_number</th>
                        <th>email</th>
                        <th>street_address</th>
                        <th>Created_On</th>
                    </tr>
                </thead>
                <tbody id="data-body">

                </tbody>
            </table>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var postdata;



        document.addEventListener('DOMContentLoaded', function() {
            let basicurl = document.getElementById('searchInput1').value;
            let dyanamicformid = document.getElementById('searchInput2').value;
            let accesstoken = document.getElementById('searchInput3').value;

            let complete_url = basicurl + dyanamicformid + accesstoken;
            console.log(complete_url);

            let p = fetch(complete_url);
            p.then((response) => {
                    return response.json();
                }).then((response) => {
                    console.log(response);


                    const tableBody = document.getElementById('data-body');
                    let i = 1;
                    response.data.forEach(item => {
                        // console.log(item);
                        let row = document.createElement("tr");
                        let sr = document.createElement("td");
                        sr.innerText = i;
                        let full_name = document.createElement("td");
                        let phone_number = document.createElement("td");
                        let email = document.createElement("td");
                        let street_address = document.createElement("td");
                        let created_on = document.createElement("td");
                        created_on.innerText = item['created_time'];
                        item.field_data
                            .forEach(values => {
                                // console.log(values['name']);
                                if (values['name'] == "full_name") {
                                    full_name.innerText = values['values'][0];
                                    // console.log(full_name);
                                } else if (values['name'] == "street_address") {
                                    street_address.innerText = values['values'][0];
                                    // console.log(street_address);
                                } else if (values['name'] == "phone_number") {
                                    phone_number.innerText = values['values'][0];
                                    // console.log(phone_number);
                                } else if (values['name'] == "email") {
                                    email.innerText = values['values'][0];
                                    // console.log(email);
                                }

                                row.appendChild(sr);
                                row.appendChild(full_name);
                                row.appendChild(phone_number);
                                row.appendChild(email);
                                row.appendChild(street_address);
                                row.appendChild(created_on);
                                // console.log(row);
                                tableBody.appendChild(row);


                            });
                        console.log("\n");
                        i++;
                    });
                    postdata = response;
                    // console.log("post data",postdata)

                })
                .catch((error) => {
                    console.error('Error fetching data:', error);
                });
        });



        var sendtodatabase = document.getElementById('sendtodatabase');
        sendtodatabase.addEventListener('click', function() {
            // Assuming 'postdata' contains valid JSON
            var form = document.createElement('form');
            form.setAttribute('method', 'POST');
            form.setAttribute('action', '<?php echo base_url() ?>index.php/receivedleads/sendtodata/<?php echo $this->uri->segment(3); ?>');

            var postdataField = document.createElement('input');
            postdataField.setAttribute('type', 'hidden');
            postdataField.setAttribute('name', 'postdata');
            postdataField.setAttribute('value', JSON.stringify(postdata));

            var client_id = document.createElement('input');
            client_id.setAttribute('type', 'hidden');
            client_id.setAttribute('name', 'client_id');
            client_id.setAttribute('value', <?php echo $result->clients ?>);



            form.appendChild(postdataField);
            form.appendChild(client_id);
            document.body.appendChild(form);
            form.submit();
        });

        var demosend = document.getElementById('demosend');

        demosend.addEventListener('click', function() {
            // Assuming 'postdata' contains valid JSON
            var form = document.createElement('form');
            form.setAttribute('method', 'POST');
            form.setAttribute('action', '<?php echo base_url() ?>index.php/receivedleads/sendtodatademo/<?php echo $this->uri->segment(3); ?>');

            var postdataField = document.createElement('input');
            postdataField.setAttribute('type', 'hidden');
            postdataField.setAttribute('name', 'id');
            postdataField.setAttribute('value', "1");

            var client_id = document.createElement('input');
            client_id.setAttribute('type', 'hidden');
            client_id.setAttribute('name', 'client_id');
            client_id.setAttribute('value', "1");

            var full_name = document.createElement('input');
            full_name.setAttribute('type', 'hidden');
            full_name.setAttribute('name', 'full_name');
            full_name.setAttribute('value', "abhay");

            var street_address = document.createElement('input');
            street_address.setAttribute('type', 'hidden');
            street_address.setAttribute('name', 'street_address');
            street_address.setAttribute('value', "Upper");


            var phone_number = document.createElement('input');
            phone_number.setAttribute('type', 'hidden');
            phone_number.setAttribute('name', 'phone_number');
            phone_number.setAttribute('value', "8208483949");

            var email = document.createElement('input');
            email.setAttribute('type', 'hidden');
            email.setAttribute('name', 'email');
            email.setAttribute('value', "abhay@gmail.com");




            form.appendChild(postdataField);
            form.appendChild(client_id);
            form.appendChild(full_name);
            form.appendChild(street_address);
            form.appendChild(phone_number);
            form.appendChild(email);
            document.body.appendChild(form);
            form.submit();
        });






        <?php ?>
    </script>
</body>

</html>
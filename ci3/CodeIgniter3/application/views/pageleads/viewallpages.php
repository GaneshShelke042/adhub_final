<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- boxicons css link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>
<style>
    .container {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
         /* margin-top: 700px;  */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th {
        text-transform: capitalize;
    }

    .search-container {
        display: inline;
        width: 100%;
    }

    .search-container input {
        width: 30%;
        display: inline-flex;
    }

    .accesstoken {
        max-width: 350px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
    }

    .pageid {
        max-width: 250px;
        display: inline;
    }

    .accesstoken_copy {
        max-width: 450px;
        display: inline;
    }

    #Appid {
        width: 20%;
    }

    #Appsecret {
        width: 30%;
    }

    #version {
        width: 10%;

    }

    .bxs-user-circle {
        font-size: 75px;
    }
    home-section{
        margin-top: 2%;
    }
</style>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v19.0&appId=1879979095786359" nonce="RWqaf8ut"></script>


    <section class="home-section" >
        <!-- Button to trigger the popup -->
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="">
                        <p class="">SDK Details</p>
                    </div>
                    <div class="search-container mb-5">
                        <input type="text" class="form-control" id="Appid" value="994778372004220" readonly>
                        <input type="text" class="form-control" value="bcf31b71fad8cee33c2bb65ae339fd3e" id="Appsecret" readonly>
                        <input type="text" class="form-control" value="v19.0" id="version" readonly>

                        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                        </fb:login-button>

                    </div>
                    <div id="status">
                    </div>

                </div>
            </div>


            <div class="row">
                <?php if (!empty($logindata)) {
                    foreach ($logindata as $value) {
                ?>
                        <div class="col-md-2 mx-2">
                            <div class="card " style="width: 18rem;">
                                <div class="text-center my-2" height=350px>
                                    <i class='bx bxs-user-circle' style='color:#a0afa0'></i>
                                </div>

                                <div class="card-body text-center">
                                    <h4 class="card-title "><?= $value['resname'] ?></h4>
                                    <h6 class="card-title "><?= $value['dateoflogin'] ?></h6>
                                    <a class="btn btn-danger">Remove Account</a>
                                </div>
                            </div>
                        </div>

                <?php }
                } ?>

            </div>










            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="">
                        <p class="">Page Token</p>
                    </div>
                    <div class="search-container mb-5">
                        <input type="text" class="form-control" id="searchInput1" value="https://graph.facebook.com/v19.0/" readonly>
                        <input type="text" class="form-control" value="122115465266257030/?fields=accounts&" id="searchInput2" readonly>
                        <input type="text" class="form-control" value="access_token=<?= $accesstoken->Accesstoken ?>" id="searchInput3" readonly>
                    </div>

                </div>


            </div>



            <!-- New button added for adding new entries -->

            <div class="row">
                <div class="col-md-12">
                    <table class="table ">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>page id</th>
                                <th>Token</th>
                            </tr>
                        </thead>
                        <tbody id="data-body" class="text-center">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <!-- Bootstrap script src -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Boxicons script src -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>


    
    <script>
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
                // console.log(response);
                const tableBody = document.getElementById('data-body');



                let i = 1;
                response.accounts.data.forEach(item => {
                    let row = document.createElement("tr");
                    let access_token = document.createElement("td");
                    let name = document.createElement("td");
                    let pageid = document.createElement("td");
                    pageid.classList.add('pageidtd');
                    let srno = document.createElement("td");
                    // console.log(tableBody);
                    // console.log();
                    // access_token.innerText = item['access_token'];

                    access_token.innerHTML = `<input class="form-control accesstoken_copy" value ="${item['access_token']}" readonly> <span class="d-inline btn btn-primary" onclick="copyToClipboard('${item['access_token']}')"><i class='bx bxs-copy' undefined ></i></span> `;
                    access_token.classList.add('accesstoken');

                    name.innerText = item['name'];

                    // pageid.innerText = item['id'];
                    pageid.innerHTML = `<input class="form-control pageid" value ="${item['id']}" readonly> <span class="d-inline btn btn-primary" onclick="copyToClipboard('${item['id']}')"><i class='bx bxs-copy' undefined ></i></span> `;
                    srno.innerText = i;
                    i++;
                    row.appendChild(srno);
                    row.appendChild(name);
                    row.appendChild(pageid);
                    row.appendChild(access_token);
                    tableBody.appendChild(row);
                })

            }).catch((error) => {
                console.error('Error fetching data:', error);
            });
        });


        function copyToClipboard(text) {
            // Try to copy the text to the clipboard
            navigator.clipboard.writeText(text)
                .then(() => {
                    console.log('Text copied to clipboard:', text);
                })
                .catch(err => {
                    console.error('Unable to copy text to clipboard:', err);
                    alert('Error copying text to clipboard!');
                });
        }

        // Usage example

        copyToClipboard();
    </script>




    <script>
        function statusChangeCallback(response) { // Called with the results from FB.getLoginStatus().
            console.log('statusChangeCallback');
            console.log(response); // The current login status of the person.
            if (response.status === 'connected') { // Logged into your webpage and Facebook.
                testAPI();
            } else { // Not logged into your webpage or we are unable to tell.
                document.getElementById('status').innerHTML = 'Please log ' +
                    'into this webpage.';
            }
        }


        function checkLoginState() { // Called when a person is finished with the Login Button.
            FB.getLoginStatus(function(response) { // See the onlogin handler
                statusChangeCallback(response);
            });
        }


        window.fbAsyncInit = function() {
            FB.init({
                appId: '1879979095786359',
                cookie: true, // Enable cookies to allow the server to access the session.
                xfbml: true, // Parse social plugins on this webpage.
                version: 'v19.0' // Use this Graph API version for this call.
            });


            FB.getLoginStatus(function(response) { // Called after the JS SDK has been initialized.
                statusChangeCallback(response); // Returns the login status.
            });
        };

        function testAPI() { // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {


                var form = document.createElement('form');
                form.setAttribute('method', 'POST');
                form.setAttribute('action', 'http://localhost/adhub/ci3/CodeIgniter3/index.php/Socialmedia/loginwithfacebook/');

                var resname = document.createElement('input');
                resname.setAttribute('type', 'hidden');
                resname.setAttribute('name', 'resname');
                resname.setAttribute('value', JSON.stringify(response.name));
                var resid = document.createElement('input');
                resid.setAttribute('type', 'hidden');
                resid.setAttribute('name', 'resid');
                resid.setAttribute('value', JSON.stringify(response.id));

                form.appendChild(resname);
                form.appendChild(resid);
                document.body.appendChild(form);
                form.submit();




                console.log('Successful login for: ' + response.name);
                document.getElementById('status').innerHTML =
                    'Thanks for logging in, ' + response.name + '!';
            });
        }
    </script>





    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>


</body>

</html>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class receivedleads extends CI_Controller
{
    public $Curd_model;
    public $form_validation;
    public $Leadsmodel;
    public $Socialmedia_model;
    public $pageleadsmodel;
    public $receivedleadsmodel;
    public $db;
    public $session;
    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->model("Curd_model");
        $this->load->model("Leadsmodel");
        $this->load->model("Socialmedia_model");
        $this->load->model("pageleadsmodel");
        $this->load->model("receivedleadsmodel");
    }


    public function sendtodata()
    {
        $data = $this->input->post();
        // echo "<pre>";
        $datasent = json_decode($data['postdata'], true);
        // print_r($data);   // client id 
        // echo "<br>";
        $idfromuri = $this->uri->segment(3);
        // print_r($datasent); // data leads 

        $datafilter = array();


        foreach ($datasent["data"] as $key) {

            $created_time =  $key['created_time'];

            $id =  $key['id'];

            $street_address = null;
            $full_name = null;
            $phone_number = null;
            $email = null;


            foreach ($key['field_data'] as  $value) {
                if ($value["name"] == "street_address") {
                    $street_address = $value["values"][0];
                } else   if ($value["name"] == "full_name") {
                    $full_name = $value["values"][0];
                } else  if ($value["name"] == "phone_number") {
                    $phone_number = $value["values"][0];
                } else   if ($value["name"] == "email") {
                    $email = $value["values"][0];
                }
            }
            // echo "<pre>";

            $alldata = ['created_time' => $created_time, 'id' => $id, 'street_address' => $street_address, 'full_name' => $full_name, 'phone_number' => $phone_number, 'email' => $email, 'client_id' => $data["client_id"]];


            if ($this->receivedleadsmodel->insertreceiveddata($alldata)) {
                array_push($datafilter, $alldata);
                echo "<br>";
            }
        }

        // echo "<pre>";
        $datatobesent['datafilter'] = $datafilter;
        $datatobesent['idfromuri'] = $idfromuri;
        // print_r($datatobesent);


        $this->load->view('Leads/leadssendtoclient', $datatobesent);
    }


    // demo data send
    public function sendtodatademo()
    {
        $data = $this->input->post();
        echo "<pre>";
        $idfromuri = $this->uri->segment(3);
        echo "<br>";
        echo $idfromuri;
        echo "<br>";
        date_default_timezone_set('Asia/Kolkata');
        $data['created_time'] = date('Y-m-d H:i:s');
        // print_r($data);   // client id 
        for ($i = 0; $i <= 2; $i++) {
            $data["full_name"] =   $data["full_name"] . $i + 1;
            $data["id"] =    $i + 1;
            $this->receivedleadsmodel->insertreceiveddata($data);
            print_r($data);   // client id 
        }
        redirect(base_url() . "index.php/receivedleads/sendleadstoclients/" . $idfromuri);
    }


    public function sendleadstoclients()
    {
        $idfromuri = $this->uri->segment(3);
        echo $idfromuri;

        $data = $this->Leadsmodel->getdatabyid($idfromuri);
        echo "<br>";
        echo $data->clients; // client id 
        echo "<br>";
        echo $data->name; // campaign name 
        echo "<br>";
        echo $data->mobileno; // client number the number that received leads 

        $clientname = $this->Curd_model->viewclientnameandid($data->clients);
        echo "<br>";
        print_r($clientname);
        echo $clientname['brand_name']; // brand_name name 
        echo "<br>";


        $leadssent = $this->input->post('leadssent');

        $receiveddata = json_decode($leadssent, true);

        // print_r($receiveddata);
        foreach ($receiveddata as $key) {

            echo $key['full_name'];
            echo '<br>';
            echo $key['phone_number'];
            echo '<br>';
            echo $key['email'];
            echo '<br>';
            echo $key['street_address'];
            echo '<br>';
            echo $key['created_time'];
            echo '<br>';
            // Generate JavaScript code dynamically with PHP
            // echo "
            //     <script>
            //         function sendFacebookMessage() {
            //             // Define the API endpoint URL
            //             const apiUrl = 'https://graph.facebook.com/v18.0/311617992029116/messages';




            //             // Define the data to send in the POST request
            //             const postData = {
            //                 messaging_product: 'whatsapp',
            //                 to: '91.$data->mobileno.',
            //                 type: 'template',
            //                 template: {
            //                     name: 'leadssendtoclient',
            //                     language: {
            //                         code: 'en_US'
            //                     },
            //                     components: [
            //                         {
            //                             type: 'header',
            //                             parameters: [
            //                                 {
            //                                     type: 'text',
            //                                     text: '" .  $clientname['brand_name'] . "'
            //                                 }
            //                             ]
            //                         },
            //                         {
            //                             type: 'body',
            //                             parameters: [
            //                                 {
            //                                     type: 'text',
            //                                     text: '" . $data->name . "'
            //                                 },
            //                                 {
            //                                     type: 'text',
            //                                     text: '" . $key['full_name'] . "'
            //                                 },
            //                                 {
            //                                     type: 'text',
            //                                     text: '" . $key['phone_number']  . "'
            //                                 },
            //                                 {
            //                                     type: 'text',
            //                                     text: '" . $key['email']  . "'
            //                                 },
            //                                 {
            //                                     type: 'text',
            //                                     text: '" . $key['street_address']  . "'
            //                                 },
            //                                 {
            //                                     type: 'text',
            //                                     text: '" . $key['created_time']   . "'
            //                                 }
            //                             ]
            //                         }
            //                     ]
            //                 }
            //             };

            //             // Send the POST request using fetch API
            //             fetch(apiUrl, {
            //                 method: 'POST',
            //                 headers: {
            //                     'Authorization': `Bearer EAAGE6z9v2uoBO65ZCBuFOaYRXUx7Fq3ZBkd9aZBBBJDNL1p54f6ZCssWvQjGEGlmdcHTXlYzDvaABWbAYylH2cNOZB2otkjQC6UmfHRxl76IRmrFBn28faSMNdyjqZCwoRFWPgko68oJNqbEwyQODEG7Ek0KZBVcF02pvgXAOKta1aqes78hxHKNVWgb4vTh6semiogo7guWiWdSk4ao2QZD`,
            //                     'Content-Type': 'application/json'
            //                 },
            //                 body: JSON.stringify(postData)
            //             })
            //             .then(response => {
            //                 if (!response.ok) {
            //                     throw new Error('Network response was not ok');
            //                 }
            //                 return response.json();
            //             })
            //             .then(data => {
            //                 console.log('Success:', data);
            //             })
            //             .catch(error => {
            //                 console.error('Error:', error);
            //             });
            //         }

            //         // Call the function to send the Facebook message
            //         sendFacebookMessage();
            //     </script>
            // ";

            // Output the dynamically generated JavaScript code

        }



        $redirectUrl = base_url() . 'index.php/Leads/Fetchdata/' . $idfromuri;
        echo "Redirect URL: $redirectUrl";

        // Perform the redirect
        redirect($redirectUrl);
    }

    // public function sendleadstoclients()
    // {
    //     $idfromuri = $this->uri->segment(3);
    //     echo $idfromuri;

    //     $data = $this->Leadsmodel->getdatabyid($idfromuri);
    //     echo "<br>";
    //     echo $data->clients; // client id 
    //     echo "<br>";
    //     echo $data->name; // campaign name 
    //     echo "<br>";
    //     echo $data->mobileno; // client number the number that received leads 

    //     $clientname = $this->Curd_model->viewclientnameandid($data->clients);
    //     echo "<br>";
    //     print_r($clientname);
    //     echo $clientname['brand_name']; // brand_name name 
    //     echo "<br>";

    //     $leadssent = $this->input->post('leadssent');
    //     $receiveddata = json_decode($leadssent, true);

    //     ob_start(); // Start output buffering

    //     foreach ($receiveddata as $key) {
} ?>
<!-- <script>
                function sendFacebookMessage() {
                    const apiUrl = 'https://graph.facebook.com/v18.0/311617992029116/messages';
                    const postData = {
                        messaging_product: 'whatsapp',
                        to: '91.<?= $data->mobileno ?>',
                        type: 'template',
                        template: {
                            name: 'leadssendtoclient',
                            language: {
                                code: 'en_US'
                            },
                            components: [{
                                    type: 'header',
                                    parameters: [{
                                        type: 'text',
                                        text: '<?= $clientname['brand_name'] ?>'
                                    }]
                                },
                                {
                                    type: 'body',
                                    parameters: [{
                                            type: 'text',
                                            text: '<?= $data->name ?>'
                                        },
                                        {
                                            type: 'text',
                                            text: '<?= $key['full_name'] ?>'
                                        },
                                        {
                                            type: 'text',
                                            text: '<?= $key['phone_number'] ?>'
                                        },
                                        {
                                            type: 'text',
                                            text: '<?= $key['email'] ?>'
                                        },
                                        {
                                            type: 'text',
                                            text: '<?= $key['street_address'] ?>'
                                        },
                                        {
                                            type: 'text',
                                            text: '<?= $key['created_time'] ?>'
                                        }
                                    ]
                                }
                            ]
                        }
                    };
    
                    fetch(apiUrl, {
                            method: 'POST',
                            headers: {
                                'Authorization': 'Bearer EAAGE6z9v2uoBO1lWQ8dkc1i2UzIQMLqQ2ZCcZBZAORVBuEYOYSP8eLTAtmyO62kzyAzenbhvH5x5qywk0SPQn4D0FMVtSTlBTYxd7W9WVbV4GdcsRSAuEGiNSECfBYDRPLudLn4l8LX17g9WO2ORqRs10b4aBD8enAOxOdmiQBjIjyr3fd4NsTEjHy588c8IzTDwLOpaf1S2XeknvsZD',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(postData)
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Success:', data);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }
    
                sendFacebookMessage(); // Call the function to send the Facebook message
            </script> -->
<?php
//         }
    
//         // $javascriptCode = ob_get_clean(); // Get the buffered output and clear the buffer
    
//         // // Perform the redirect after 5 seconds
//         // $redirectUrl = base_url() . 'index.php/Leads/Fetchdata/' . $idfromuri;
//         // echo "Redirecting in 5 seconds...";
//         // echo "<script>setTimeout(function() { window.location.href = '$redirectUrl'; }, 5000);</script>";
    
//         // // Output the JavaScript code after the redirect
//         // echo $javascriptCode;
//     }
    
// }

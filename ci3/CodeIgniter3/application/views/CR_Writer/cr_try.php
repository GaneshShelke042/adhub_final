<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="newSideBar.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8"> 
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge"> 
	<meta name="viewport"
		content="width=device-width, 
				initial-scale=1.0"> 
	<title>GeeksForGeeks</title> 
	<link rel="stylesheet"
		href="style.css"> 
	<link rel="stylesheet"
		href="responsive.css"> 
</head>
<style>
   
@import url( 
"https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"); 

* { 
margin: 0; 
padding: 0; 
box-sizing: border-box; 
font-family: "Poppins", sans-serif; 
} 
:root { 
--background-color1: #fafaff; 
--background-color2: #ffffff; 
--background-color3: #ededed; 
--background-color4: #cad7fda4; 
--primary-color: #4b49ac; 
--secondary-color: #0c007d; 


} 
body { 
background-color: var(--background-color4); 
max-width: 100%; 
overflow-x: hidden; 
} 

header { 
height: 70px; 
width: 100vw; 
padding: 0 30px; 
background-color: var(--background-color1); 
position: fixed; 
z-index: 100; 
box-shadow: 1px 1px 15px rgba(161, 182, 253, 0.825); 
display: flex; 
justify-content: space-between; 
align-items: center; 
} 

.logo { 
font-size: 27px; 
font-weight: 600; 
color: rgb(47, 141, 70); 
} 

.icn { 
height: 30px; 
} 
.menuicn { 
cursor: pointer; 
} 

.searchbar, 
.message, 
.logosec { 
display: flex; 
align-items: center; 
justify-content: center; 
} 

.searchbar2 { 
display: none; 
} 

.logosec { 
gap: 60px; 
} 

.searchbar input { 
width: 250px; 
height: 42px; 
border-radius: 50px 0 0 50px; 
background-color: var(--background-color3); 
padding: 0 20px; 
font-size: 15px; 
outline: none; 
border: none; 
} 
.searchbtn { 
width: 50px; 
height: 42px; 
display: flex; 
align-items: center; 
justify-content: center; 
border-radius: 0px 50px 50px 0px; 
background-color: var(--secondary-color); 
cursor: pointer; 
} 

.message { 
gap: 40px; 
position: relative; 
cursor: pointer; 
} 
.circle { 
height: 7px; 
width: 7px; 
position: absolute; 
background-color: #fa7bb4; 
border-radius: 50%; 
left: 19px; 
top: 8px; 
} 
.dp { 
height: 40px; 
width: 40px; 
background-color: #626262; 
border-radius: 50%; 
display: flex; 
align-items: center; 
justify-content: center; 
overflow: hidden; 
} 
.main-container { 
display: flex; 
width: 100vw; 
position: relative; 
top: 70px; 
z-index: 1; 
} 
.dpicn { 
height: 42px; 
} 

.main { 
height: calc(100vh - 70px); 
width: 100%; 
overflow-y: scroll; 
overflow-x: hidden; 
padding: 40px 30px 30px 30px; 
} 

.main::-webkit-scrollbar-thumb { 
background-image: 
		linear-gradient(to bottom, rgb(0, 0, 85), rgb(0, 0, 50)); 
} 
.main::-webkit-scrollbar { 
width: 5px; 
} 
.main::-webkit-scrollbar-track { 
background-color: #9e9e9eb2; 
} 

 

.nav { 
min-height: 91vh; 
width: 250px; 
background-color: var(--background-color2); 
position: absolute; 
top: 0px; 
left: 00; 
box-shadow: 1px 1px 10px rgba(198, 189, 248, 0.825); 
display: flex; 
flex-direction: column; 
justify-content: space-between; 
overflow: hidden; 
padding: 30px 0 20px 10px; 
} 
.navcontainer { 
height: calc(100vh - 70px); 
width: 250px; 
position: relative; 
overflow-y: scroll; 
overflow-x: hidden; 
transition: all 0.5s ease-in-out; 
} 
.navcontainer::-webkit-scrollbar { 
display: none; 
} 
.navclose { 
width: 80px; 
} 
.nav-option { 
width: 250px; 
height: 60px; 
display: flex; 
align-items: center; 
padding: 0 30px 0 20px; 
gap: 20px; 
transition: all 0.1s ease-in-out; 
} 
.nav-option:hover { 
border-left: 5px solid #a2a2a2; 
background-color: #dadada; 
cursor: pointer; 
} 
.nav-img { 
height: 30px; 
} 

.nav-upper-options { 
display: flex; 
flex-direction: column; 
align-items: center; 
gap: 30px; 
} 

.option1 { 
border-left: 5px solid #010058af; 
background-color: var(--Border-color); 
color: white; 
cursor: pointer; 
} 
.option1:hover { 
border-left: 5px solid #010058af; 
background-color: var(--Border-color); 
} 
.box { 
height: 130px; 
width: 220px; 
border-radius: 20px; 
box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751); 
padding: 20px; 
display: flex; 
align-items: start; 

cursor: pointer; 
transition: transform 0.3s ease-in-out; 
} 
.box:hover { 
transform: scale(1.08); 
} 



.box img { 
height: 50px; 
} 
.box .text { 
color: white; 

} 
.topic { 
font-size: 13px; 
font-weight: 400; 
letter-spacing: 1px; 
} 

.topic-heading { 

font-size: 20px; 
font-weight: 400; 
text-align :top;
letter-spacing: 1px; 
} 

.report-container { 
min-height: 300px; 
max-width: 1200px; 
margin: 70px auto 0px auto; 
background-color: #ffffff; 
border-radius: 30px; 
box-shadow: 3px 3px 10px rgb(188, 188, 188); 
padding: 0px 20px 20px 20px; 
} 
.report-header { 
height: 80px; 
width: 100%; 
display: flex; 
align-items: center; 
justify-content: space-between; 
padding: 20px 20px 10px 20px; 
border-bottom: 2px solid rgba(0, 20, 151, 0.59); 

} 

.recent-Articles { 
font-size: 30px; 
font-weight: 600; 
color: #5500cb; 
} 

.view { 
height: 35px; 
width: 90px; 
border-radius: 8px; 
background-color: #5500cb; 
color: white; 
font-size: 15px; 
border: none; 
cursor: pointer; 
} 

.report-body { 
max-width: 1160px; 
overflow-x: auto; 
padding: 20px; 
} 
.report-topic-heading, 
.item1 { 
width: 1120px; 
display: flex; 
justify-content: space-between; 
align-items: center; 
} 
.t-op { 
font-size: 18px; 
letter-spacing: 0px; 
} 

.items { 
width: 1120px; 
margin-top: 15px; 
} 

.item1 { 
margin-top: 20px; 
} 
.t-op-nextlvl { 
font-size: 14px; 
letter-spacing: 0px; 
font-weight: 600; 
} 

.label-tag { 
width: 100px; 
text-align: center; 
background-color: rgb(0, 177, 0); 
color: white; 
border-radius: 4px; 
}
/* Responsive CSS Here */
@media screen and (max-width: 950px) { 
.nav-img { 
	height: 25px; 
} 
.nav-option { 
	gap: 30px; 
} 
 
.report-topic-heading, 
.item1, 
.items { 
	width: 800px; 
} 
} 

@media screen and (max-width: 850px) { 
.nav-img { 
	height: 30px; 
} 
.nav-option { 
	gap: 30px; 
} 
.nav-option h3 { 
	font-size: 20px; 
} 
.report-topic-heading, 
.item1, 
.items { 
	width: 700px; 
} 
.navcontainer { 
	width: 100vw; 
	position: absolute; 
	transition: all 0.6s ease-in-out; 
	top: 0; 
	left: -100vw; 
} 
.nav { 
	width: 100%; 
	position: absolute; 
} 
.navclose { 
	left: 00px; 
} 
.searchbar { 
	display: none; 
} 
.main { 
	padding: 40px 30px 30px 30px; 
} 
.searchbar2 { 
	width: 100%; 
	display: flex; 
	margin: 0 0 40px 0; 
	justify-content: center; 
} 
.searchbar2 input { 
	width: 250px; 
	height: 42px; 
	border-radius: 50px 0 0 50px; 
	background-color: var(--background-color3); 
	padding: 0 20px; 
	font-size: 15px; 
	border: 2px solid var(--secondary-color); 
} 
} 

@media screen and (max-width: 490px) { 
.message { 
	display: none; 
} 
.logosec { 
	width: 100%; 
	justify-content: space-between; 
} 
.logo { 
	font-size: 20px; 
} 
.menuicn { 
	height: 25px; 
} 
.nav-img { 
	height: 25px; 
} 
.nav-option { 
	gap: 25px; 
} 
.nav-option h3 { 
	font-size: 12px; 
} 
.nav-upper-options { 
	gap: 15px; 
} 
.recent-Articles { 
	font-size: 20px; 
} 
.report-topic-heading, 
.item1, 
.items { 
	width: 550px; 
} 
} 

@media screen and (max-width: 400px) { 
.recent-Articles { 
	font-size: 17px; 
} 
.view { 
	width: 60px; 
	font-size: 10px; 
	height: 27px; 
} 
.report-header { 
	height: 60px; 
	padding: 10px 10px 5px 10px; 
} 
.searchbtn img { 
	height: 20px; 
} 
} 

@media screen and (max-width: 320px) { 
.recent-Articles { 
	font-size: 12px; 
} 
.view { 
	width: 50px; 
	font-size: 8px; 
	height: 27px; 
} 
.report-header { 
	height: 60px; 
	padding: 10px 5px 5px 5px; 
} 
.t-op { 
	font-size: 12px; 
} 
.t-op-nextlvl { 
	font-size: 10px; 
} 
.report-topic-heading, 
.item1, 
.items { 
	width: 300px; 
} 
.report-body { 
	padding: 10px; 
} 
.label-tag { 
	width: 70px; 
} 
.searchbtn { 
	width: 40px; 
} 
.searchbar2 input { 
	width: 180px; 
} 
}


    .main-content {

        margin: 0;
        width: 100%;
        margin: 20px auto;
        margin-top: 0px;
        background-color: #efefef;
        overflow: hidden;
    }

    .dashboard {
        row-gap:20px;
        column-gap:45px;
        /* margin: 10px; */
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
    }

    .button {
        color: #fff;
       /* background-color: #fff;*/
       
    }

    .main { 
height: calc(100vh - 70px); 
width: 100%; 

overflow-y: scroll; 
overflow-x: hidden; 
padding: 40px 30px 30px 30px; 
} 
  
.box { 
height: 130px; 
width: 220px; 
border-radius: 20px; 

padding: 20px; 
display: flex; 
align-items: start; 

cursor: pointer; 
transition: transform 0.3s ease-in-out; 
} 

.box-container { 
display: flex; 
/* justify-content: space-evenly;  */
align-items: center; 
flex-wrap: wrap; 
gap: 25px; 
background-color: #ffffff;
padding: 20px; 
border-radius: 20px; 

/* margin:10px; */
} 
.box-container1 { 
display: flex; 
/* justify-content: space-evenly;  */
align-items: center; 
flex-wrap: wrap; 
gap: 25px; 
background-color: #ffffff;
padding: 20px;
} 


 
    .button2 {
  background-color: #DC0030;}/Urgent/
    .button3 {
  background-color: #F71C60; }/Change/
    .button4 {
  background-color: #FF577B;}/Redesign/
    .button5 {
  background-color: #358E30; }/Approved By Head/
    .button6 {
  background-color: #77A828; }/Send To Client/
    .button7 {
  background-color: #7FC259; }/Approved By Clients/
    .button8 {
  background-color: #3C3F98; }/In Review/
    .button9 {
  background-color: #2C72CA; }/Today/
    .button10 {
  background-color: #3198D5; }/Re Assigned/
    .button11 {
  background-color: #F48E1F; }/Advance/
    .button12 {
  background-color: #ECBE06; }/Hold/
  .button13 {
  background-color: #0D858E; }/Hold/

  
    .button i {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 20px;
        color: #ffff;
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
        margin-top: Center;
        margin-left: 50%;
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
        background: linear-gradient(to top, #0000 65%, #0D858E 35%);
        position: relative;
        width: 220px;
        height: 200px;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 2px;
        /* font-weight: 500; */
        color: #000;
        /* background-color: white; */
        border: none;
        border-radius: 30px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
        margin-bottom: 0px;
        margin-right: 0px;
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
        /Faint blue color/
        /* Blue semi-transparent background */
        z-index: 9999;
        /* Ensure it appears above other content */
        overflow-y: auto
    }

    .urgent-count {
        position: absolute;
        bottom: 5px;
        /* Adjust as needed */
        right: 5px;
        /* Adjust as needed */
        font-size: 40px;
        /* Adjust as needed */
        /* background-color: pink; */
        /* Adjust as needed */
        padding: 10px 15px;
        /* Adjust as needed */
        border-radius: 50%;
        /* Make it circular */
        color: #fff;
        /* Text color */
    }
    .text-heading { left: 5px;}

    .tiket.bordered {
        border: 2px solid #333;
        /* Dark color border */
    }
    .search-bar{
        width: 200px;
        height: 40px;
        margin-left: 80%;
        position: relative;
        display: inline-block;
    }
    
    .button-with-underline {
        position: relative;
    }

    .button-with-underline.active::after {
        content: '';
        position: absolute;
        bottom: 15px;
        left: 25px;
        width: 80%;
        height: 7px; /* Adjust thickness of the underline */
        background-color: white; 
        border-radius: 30px;
       /* Adjust color of the underline */
    }
    .button-image {
        height: 60px;
        width: 60px;
        border-radius: 35px;
        top: 5px;  
        position: absolute; /* Set image's position to absolute */
 
        left: 50%; /* Position image at the center horizontally */
        transform: translateX(-50%); /* Center image horizontally */
        max-width: 100%;
    }

</style>

<body><!--<div class="home-section" > 

<section class="main-content">
<div class="main"> 
    <div class="box-container"> 

        <P style="margine: left 60px;">CONTENT WRITER</P>
       
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

    </div><hr style="width:98%;text-align:left;margin-left:15px">-->

    <div class="home-section">
    <?php echo $nameFromUrl = $this->uri->segment(5); ?>
        <!-- Content Writer -->
        <section class="main-content">
        <div class="main"> 
            <div class="box-container"> 
                <P style="margine: left 60px;">CONTENT WRITER</P>
                <div class="dropdown-container">
        
                    <div class="dropdown-button">
        
                        <i class="fas fa-user user-icon"></i> All
                        <i class="fas fa-chevron-down"></i>
                    </div>
        
                </div>
                <div class="dropdown-content">
                    <div class="dropdown-item">Option 1</div>
                    <div class="dropdown-item">Option 2</div>
                    <div class="dropdown-item"><a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/Logincontro/login">Log Out</a></div>
                </div>
            </div><hr style="width:98%;text-align:left;margin-left:15px">
            <div class="box-container"> 
                <?php $id_from_url= $this->session->userdata('user_id'); $name_from_url= $this->session->userdata('name');// Assuming $urlId contains the URL ID value?>
                <?php// Check if $myDashboardStatus is not null 
                if ($myDashboardStatus !== null) { // Split the $myDashboardStatus string into an array based on commas
                    $statusParts = explode(',', $myDashboardStatus); // Iterate over each part of the array and check if any part matches the condition
                    foreach ($statusParts as $statusPart) { // Trim any leading or trailing whitespace from the status part
                        $statusPart = trim($statusPart); // Check if the status part matches the condition
                        if ($statusPart === "Urgent") {
                            ?>
                            <button class="button button2 button-with-underline cr box topic-heading " onclick="toggleUrgentButtons(1) ; toggleActive(this);">Urgent<span id="urgentCount" class="urgent-count">3</span> <i class="fas fa-exclamation-circle"></i></button></button> 
                            <?php// Break the loop if you want to display the button only once
                            break;
                        }
                    }
                }
                // If $myDashboardStatus is null, do not display the buttons
                ?>
                <?php
                if ($myDashboardStatus !== null) {  // Split the $myDashboardStatus string into an array based on commas
                    $statusParts = explode(',', $myDashboardStatus); // Iterate over each part of the array and check if any part matches the condition
                    foreach ($statusParts as $statusPart) { // Trim any leading or trailing whitespace from the status part
                        $statusPart = trim($statusPart); // Check if the status part matches the condition
                        if ($statusPart === "Changes") { // Change 'Urgent' to the condition you want to match
                            ?>
                            <button class="button button3 button-with-underline cr box topic-heading" onclick="toggleUrgentButtons(4); toggleActive(this);">Changes<span id="chages" class="urgent-count"></span><i class="fas fa-sync-alt fa-spin" style='font-size:24px'></i></button>
                            <?php
                            // Break the loop if you want to display the button only once
                            break;
                        }
                    }
                }
                ?>
                <?php
                if ($myDashboardStatus !== null) {  // Split the $myDashboardStatus string into an array based on commas
                $statusParts = explode(',', $myDashboardStatus); // Iterate over each part of the array and check if any part matches the condition
                    foreach ($statusParts as $statusPart) { // Trim any leading or trailing whitespace from the status part
                        $statusPart = trim($statusPart); // Check if the status part matches the condition
                        if ($statusPart === "Rewrite") { // Change 'Urgent' to the condition you want to match
                            ?>
                            <button class="button button4 button-with-underline cr box topic-heading" onclick="toggleUrgentButtons(5); toggleActive(this);">Rewrite<span id="Rewrite" class="urgent-count"></span><i class="fas fa-random" style='font-size:22px'></i></button>
                             <?php
                            // Break the loop if you want to display the button only once
                            break;
                        }
                    }
                }
                ?>
                <?php
                if ($myDashboardStatus !== null) {// Split the $myDashboardStatus string into an array based on commas
                $statusParts = explode(',', $myDashboardStatus); // Iterate over each part of the array and check if any part matches the condition
                    foreach ($statusParts as $statusPart) { // Trim any leading or trailing whitespace from the status part
                        $statusPart = trim($statusPart); // Check if the status part matches the condition
                        if ($statusPart === "reassigned") { // Change 'Urgent' to the condition you want to match
                            ?>
                             <button class="button button10 button-with-underline cr box topic-heading" onclick="toggleUrgentButtons(9); toggleActive(this);">Reassigned<span id="Reassigned" class="urgent-count"></span><i class="fas fa fa-upload"></i></button>
                             <?php
                            // Break the loop if you want to display the button only once
                            break;
                        }
                    }
                }
                ?>
                <?php
                if ($myDashboardStatus !== null) {// Split the $myDashboardStatus string into an array based on commas
                    $statusParts = explode(',', $myDashboardStatus);// Iterate over each part of the array and check if any part matches the condition
                    foreach ($statusParts as $statusPart) { // Trim any leading or trailing whitespace from the status part
                        $statusPart = trim($statusPart);// Check if the status part matches the condition
                        if ($statusPart === "Today") { // Change 'Urgent' to the condition you want to match
                            ?>
                            <button class="button button9 button-with-underline cr box topic-heading" onclick="toggleUrgentButtons(3); toggleActive(this);">Today <span id="Today" class="urgent-count">3</span><i class="far fa-calendar-alt"></i></button>
                             <?php // Break the loop if you want to display the button only once
                            break;
                        }
                    }
                }
                ?>
                
                <?php
                if ($myDashboardStatus !== null) {// Split the $myDashboardStatus string into an array based on commas
                    $statusParts = explode(',', $myDashboardStatus);// Iterate over each part of the array and check if any part matches the condition
                    foreach ($statusParts as $statusPart) { // Trim any leading or trailing whitespace from the status part
                        $statusPart = trim($statusPart); // Check if the status part matches the condition
                        if ($statusPart === "In_Review") { // Change 'Urgent' to the condition you want to match
                            ?>
                            <button class="button button8 button-with-underline cr box topic-heading" onclick="toggleUrgentButtons(2) ; toggleActive(this);"> In Review <span id="InReviewcount" class="urgent-count"></span><i class="fa fa-check-square-o"></i></button>
                            <?php // Break the loop if you want to display the button only once
                            break;
                        }
                    }
                }
                ?>
                <?php
                if ($myDashboardStatus !== null) { // Split the $myDashboardStatus string into an array based on commas
                $statusParts = explode(',', $myDashboardStatus); // Iterate over each part of the array and check if any part matches the condition
                    foreach ($statusParts as $statusPart) { // Trim any leading or trailing whitespace from the status part
                        $statusPart = trim($statusPart); // Check if the status part matches the condition
                        if ($statusPart === "Approved_by_Head") { // Change 'Urgent' to the condition you want to match
                            ?>
                            <button class="button button7 button-with-underline cr box topic-heading" onclick="toggleUrgentButtons(6); toggleActive(this);">Approved by Head<span id="Approvedbyhead" class="urgent-count"></span><i class="fas fa-user-check"></i></button>
                             <?php
                            // Break the loop if you want to display the button only once
                            break;
                        }
                    }
                }
                ?>
                <?php
                if ($myDashboardStatus !== null) { // Split the $myDashboardStatus string into an array based on commas
                $statusParts = explode(',', $myDashboardStatus); // Iterate over each part of the array and check if any part matches the condition
                    foreach ($statusParts as $statusPart) {
                        // Trim any leading or trailing whitespace from the status part
                        $statusPart = trim($statusPart);
                        
                        // Check if the status part matches the condition
                        if ($statusPart === "Send_To_Client") { // Change 'Urgent' to the condition you want to match
                            ?>
                            <button class="button button6 button-with-underline cr box topic-heading" onclick="toggleUrgentButtons(7); toggleActive(this);">Send to Client<span id="SendtoClient" class="urgent-count"></span><i class="fa fa-thumbs-o-up" style='font-size:24px'></i></button>
                             <?php
                            // Break the loop if you want to display the button only once
                            break;
                        }
                    }
                }
                ?>
                <?php
                if ($myDashboardStatus !== null) { // Split the $myDashboardStatus string into an array based on commas
                $statusParts = explode(',', $myDashboardStatus); // Iterate over each part of the array and check if any part matches the condition
                    foreach ($statusParts as $statusPart) { // Trim any leading or trailing whitespace from the status part
                        $statusPart = trim($statusPart); // Check if the status part matches the condition
                        if ($statusPart === "Approved_by_Client") { // Change 'Urgent' to the condition you want to match
                        ?>
                        <button class="button button5 button-with-underline cr box topic-heading" onclick="toggleUrgentButtons(8); toggleActive(this);">Approved by Client<span id="ApprovedbyClient" class="urgent-count"></span><i class="fas fa-check-circle"></i></button>
                        <?php 
                            // Break the loop if you want to display the button only once
                            break;
                        }
                    }
                }
                ?>
                
                <?php
                if ($myDashboardStatus !== null) {// Split the $myDashboardStatus string into an array based on commas
                $statusParts = explode(',', $myDashboardStatus); // Iterate over each part of the array and check if any part matches the condition
                    foreach ($statusParts as $statusPart) { // Trim any leading or trailing whitespace from the status part
                        $statusPart = trim($statusPart); // Check if the status part matches the condition
                        if ($statusPart === "reassigned") { // Change 'Urgent' to the condition you want to match
                            ?>
                             <button class="button button10 button-with-underline cr box topic-heading" onclick="toggleUrgentButtons(9); toggleActive(this);">Advance<span id="Reassigned" class="urgent-count"></span><i class="fas fa fa-upload"></i></button>
                             <?php
                            // Break the loop if you want to display the button only once
                            break;
                        }
                    }
                }
                ?>
                
                <?php
                if ($myDashboardStatus !== null) { // Split the $myDashboardStatus string into an array based on commas
                    $statusParts = explode(',', $myDashboardStatus); // Iterate over each part of the array and check if any part matches the condition
                    foreach ($statusParts as $statusPart) { // Trim any leading or trailing whitespace from the status part
                        $statusPart = trim($statusPart); // Check if the status part matches the condition
                        if ($statusPart === "Hold") { // Change 'Urgent' to the condition you want to match
                            ?>
                            <button class="button button12 button-with-underline cr box topic-heading" onclick="toggleUrgentButtons(11); toggleActive(this);">Hold<span id="Hold" class="urgent-count"></span><i class="fas fa-pause"></i></button>
                            <?php
                            // Break the loop if you want to display the button only once
                            break;
                        }
                    }
                }
                ?>
            </div><hr style="width:98%;text-align:left;margin-left:15px">
            <div class="box-container">
                <div class="new-button" style="display: block;">
                    <div class="dashboard"><!-- Sort the $result array by deadline_datetime -->
                        <?php
                        usort($result, function ($a, $b) {
                            return strtotime($a['deadline_datetime']) - strtotime($b['deadline_datetime']);
                        });
                        ?> 
                        <!-- Inside your HTML -->
                        <div class="dashboard">
                            <?php if (!empty($result)) : 
                                $count = 0;
                            ?>
                                <?php foreach ($matchedClients as $row) : ?>
                                    <!-- Only display the ticket if it meets certain conditions -->
                                    <?php if ($row['ticketValue'] == $id_from_url || $row['ticketValue'] == 0) : ?>
                                        <?php if ($row['cr_Status'] == true) : ?>
                                
                                            <div class="dashboard">
                                            
                                                <?php
                                                // Add a class to the button if cTaskORgCalender value is 1
                                                $borderClass = ($row['cTaskORgCalender'] == 1) ? 'tiket bordered' : 'tiket';
                                                ?>
                                                <!-- Inside your PHP loop to generate ticket buttons -->
                                                <a href="<?php echo base_url() . 'index.php/CR_Writer/Cr_dashboardControll/updateTask/' . $row['id'] ?>" class="popup-trigger">
                                                    <button class="<?php echo $borderClass; ?>"  data-cr-status="<?php echo $row['cr_Status']; ?>">
                                                    <img src="<?php echo base_url()?>Image/PackageServies/<?php echo $row['imageLogo']; ?>" class="button-image"><br>
                                                        <?php echo $row['deadline_datetime'] ?><br>
                                                        <?php echo $row['id'] ?><br>
                                                        <?php echo $row['brand_name'] ?>
                                            
                                                    </button>
                                                </a>
                                                <div class="popup" style="display:none;">
                                                    <!-- Popup content goes here -->
                                                    <a href="<?php echo base_url() . 'index.php/CR_Writer/Cr_dashboardControll/updateTask/' . $row['id'] ?>" class="btn btn-primary">
                                                        <!-- <php include 'UpdateTask1.php' ?> -->
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php else : ?>
                                <p>0 results</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 

   
    <script>
         document.addEventListener('DOMContentLoaded', function()    
        {

            console.log('Document is fully loaded.');
            // Select all elements with the attribute data-cr-status="1"

            // content
            let elementsArray = document.querySelectorAll('[data-cr-status="1"]');
            let inreview = document.querySelectorAll('[data-cr-status="2"]');
            let changes = document.querySelectorAll('[data-cr-status="4"]');
            let Rewrites = document.querySelectorAll('[data-cr-status="5"]');
            let Reassigneds = document.querySelectorAll('[data-cr-status="9"]');
            let Todays = document.querySelectorAll('[data-cr-status="3"]');
            let Approvedbyheads = document.querySelectorAll('[data-cr-status="6"]');
            let SendtoClients = document.querySelectorAll('[data-cr-status="7"]');
            let ApprovedbyClients = document.querySelectorAll('[data-cr-status="8"]');
            let Advances = document.querySelectorAll('[data-cr-status="10"]');
            let Holds = document.querySelectorAll('[data-cr-status="11"]');



            // Graphic 
            let elementsArraygr = document.querySelectorAll('[data-gr-status="1"]');
            let inreviewgr = document.querySelectorAll('[data-gr-status="2"]');
            let changesgr = document.querySelectorAll('[data-gr-status="4"]');
            let Rewritesgr = document.querySelectorAll('[data-gr-status="5"]');
            let Reassignedsgr = document.querySelectorAll('[data-gr-status="9"]');
            let Todaysgr = document.querySelectorAll('[data-gr-status="3"]');
            let Approvedbyheadsgr = document.querySelectorAll('[data-gr-status="6"]');
            let SendtoClientsgr = document.querySelectorAll('[data-gr-status="7"]');
            let ApprovedbyClientsgr = document.querySelectorAll('[data-gr-status="8"]');
            let Advancesgr = document.querySelectorAll('[data-gr-status="10"]');
            let Holdsgr = document.querySelectorAll('[data-gr-status="11"]');

            let urgent = 0;
            let review = 0;
            let change = 0;
            let Rewrite = 0;
            let Reassigned = 0;
            let Today = 0;
            let Approvedbyhead = 0;
            let SendtoClient = 0;
            let ApprovedbyClient = 0;
            let Advance = 0;
            let Hold = 0;
            let all = 0;
         

            // graphic designer variable
            let urgentgr = 0;
            let reviewgr = 0;
            let changegr = 0;
            let Rewritegr = 0;
            let Reassignedgr = 0;
            let Todaygr = 0;
            let Approvedbyheadgr = 0;
            let SendtoClientgr = 0;
            let ApprovedbyClientgr = 0;
            let Advancegr = 0;
            let Holdgr = 0;
            let allgr = 0;

            elementsArray.forEach(element => {
                urgent += 1;
            });
            inreview.forEach(element => {
                review += 1;
            });
            changes.forEach(element => {
                change += 1;
            });
            Rewrites.forEach(element => {
                Rewrite += 1;
            });
            Reassigneds.forEach(element => {
                Reassigned += 1;
            });
            Todays.forEach(element => {
                Today += 1;
            });
            Approvedbyheads.forEach(element => {
                Approvedbyhead += 1;
            });
            SendtoClients.forEach(element => {
                SendtoClient += 1;
            });
            ApprovedbyClients.forEach(element => {
                ApprovedbyClient += 1;
            });
            Advances.forEach(element => {
                Advance += 1;
            });
            Holds.forEach(element => {
                Hold += 1;
            });



            // graphics

            elementsArraygr.forEach(element => {
                urgentgr += 1;
            });
            inreviewgr.forEach(element => {
                reviewgr += 1;
            });
            changesgr.forEach(element => {
                changegr += 1;
            });
            Rewritesgr.forEach(element => {
                Rewritegr += 1;
            });
            Reassignedsgr.forEach(element => {
                Reassignedgr += 1;
            });
            Todaysgr.forEach(element => {
                Todaygr += 1;
            });
            Approvedbyheadsgr.forEach(element => {
                Approvedbyheadgr += 1;
            });
            SendtoClientsgr.forEach(element => {
                SendtoClientgr += 1;
            });
            ApprovedbyClientsgr.forEach(element => {
                ApprovedbyClientgr += 1;
            });
            Advancesgr.forEach(element => {
                Advancegr += 1;
            });
            Holdsgr.forEach(element => {
                Holdgr += 1;
            });

            updateUrgentCount(urgent)
            updateInReviewcount(review)
            updatechangecount(change)
            updateRewritecount(Rewrite)
            updateReassigncount(Reassigned)
            updateTodaycount(Today)
            updateApprovedbyheadcount(Approvedbyhead)
            updateSendtoClientcount(SendtoClient)
            updateApprovedbyClientscount(ApprovedbyClient)
            updateAdvancescount(Advance)
            updateHoldscount(Hold)
            // updateHoldscount(Hold)
            let All = document.getElementById('All');
            All.textContent =    (urgent +  review +  change+ Rewrite + Reassigned +  Today +  Approvedbyhead +  SendtoClient +  ApprovedbyClient +  Advance +  Hold )

            // Graphics 

            updateUrgentCountgr(urgentgr)
            updateInReviewcountgr(Rewritegr)
            updatechangecountgr(changegr)
            updateRewritecountgr(reviewgr)
            updateReassigncountgr(Reassignedgr)
            updateTodaycountgr(Todaygr)
            updateApprovedbyheadcountgr(Approvedbyheadgr)
            updateSendtoClientcountgr(SendtoClientgr)
            updateApprovedbyClientscountgr(ApprovedbyClientgr)
            updateAdvancescountgr(Advancegr)
            updateHoldscountgr(Holdgr)
            // // updateHoldscount(Hold)
            let Allgr = document.getElementById('Allgr');
            Allgr.textContent =    (urgentgr +  reviewgr +  changegr+ Rewritegr + Reassignedgr +  Todaygr +  Approvedbyheadgr +  SendtoClientgr +  ApprovedbyClientgr +  Advancegr +  Holdgr )
        });

        function updateUrgentCount(count) 
        {
            var urgentCountElement = document.getElementById('urgentCount');
            urgentCountElement.textContent = count;
        }
        function updateInReviewcount(count) {
            let InReviewcount = document.getElementById('InReviewcount');
            InReviewcount.textContent = count;
        }
        function updatechangecount(count) {
            let chages = document.getElementById('chages');
            chages.textContent = count;
            console.log(chages) ;
        }
        function updateRewritecount(count) {
            let Rewrite = document.getElementById('Rewrite');
            Rewrite.textContent = count;
        }
        function updateReassigncount(count) {
            let Reassigned = document.getElementById('Reassigned');
            Reassigned.textContent = count;
        }
        function updateTodaycount(count) {
            let Today = document.getElementById('Today');
            Today.textContent = count;
            console.log( Today) ;
        }
        function updateApprovedbyheadcount(count) {
            let Approvedbyhead = document.getElementById('Approvedbyhead');
            Approvedbyhead.textContent = count;
        }
        function updateSendtoClientcount(count) {
            let SendtoClient = document.getElementById('SendtoClient');
            SendtoClient.textContent = count;
        }
        function updateApprovedbyClientscount(count) {
            let ApprovedbyClients = document.getElementById('ApprovedbyClient');
            ApprovedbyClients.textContent = count;
        }
        function updateAdvancescount(count) {
            let Advance = document.getElementById('Advance');
            Advance.textContent = count;
        }
        function updateHoldscount(count) {
            let Holds = document.getElementById('Hold');
            Holds.textContent = count;
        }



// graphics

        function updateUrgentCountgr(count) 
        {
            let urgentCountElement = document.getElementById('urgentCountgr');
            urgentCountElement.textContent = count;
        }
        function updateInReviewcountgr(count) {
            let InReviewcount = document.getElementById('InReviewcountgr');
            InReviewcount.textContent = count;
        }
        function updatechangecountgr(count) {
            let chages = document.getElementById('chagesgr');
            chages.textContent = count;
        }
        function updateRewritecountgr(count) {
            let Rewrite = document.getElementById('Rewritegr');
            Rewrite.textContent = count;
        }
        function updateReassigncountgr(count) {
            let Reassigned = document.getElementById('Reassignedgr');
            Reassigned.textContent = count;
        }
        function updateTodaycountgr(count) {
            let Today = document.getElementById('Todaygr');
            Today.textContent = count;
        }
        function updateApprovedbyheadcountgr(count) {
            let Approvedbyhead = document.getElementById('Approvedbyheadgr');
            Approvedbyhead.textContent = count;
        }
        function updateSendtoClientcountgr(count) {
            let SendtoClient = document.getElementById('SendtoClientgr');
            SendtoClient.textContent = count;
        }
        function updateApprovedbyClientscountgr(count) {
            let ApprovedbyClients = document.getElementById('ApprovedbyClientgr');
            ApprovedbyClients.textContent = count;
        }
        function updateAdvancescountgr(count) {
            let Advance = document.getElementById('Advancegr');
            Advance.textContent = count;
        }
        function updateHoldscountgr(count) {
            let Holds = document.getElementById('Holdgr');
            Holds.textContent = count;
        }
        








      
function toggleActive(button) {
  var buttons = document.querySelectorAll('.button-with-underline');
  buttons.forEach(function(btn) {
    btn.classList.remove('active');
  });
  button.classList.add('active');
}

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

    // Set gradient color based on crStatus
    var color;
    switch (crStatus) {
        case 1:
            color = "#DC0030";//urgent
            break;
        case 2:
            color = "#3C3F98";//inreview...
            break;
        case 3:
            color = "#2C72CA";//today..
            break;
        case 4:
            color = "#F71C60";//change
            break;
        case 5:
            color = "#FF577B";//rewrite
            break;
        case 6:
            color = "#7FC259";//aprove by head....
            break;
        case 7:
            color = "#77A828";//send to client....
            break;
        case 8:
            color = "#358E30";//Approve by Client
            break;
        case 9:
            color = "#3198D5";//reassign
            break;
        case 10:
            color = "#F48E1F";//advance..
            break;
        case 11:
            color = "#ECBE06";//hold
            break;
        default:
            color = "#0D858E";//all
            break;
        
       
    }
    
    // Apply gradient background to elements with class .tiket
    var tikets = document.querySelectorAll('.tiket');
    tikets.forEach(function(ticket) {
        ticket.style.background = 'linear-gradient(to top, #0000 65%, ' + color + ' 35%)';
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

        // Replace $count with the actual count value obtained from PHP
        var urgentCount = <?php echo $count; ?>; // Assuming $count is defined in your PHP code

        // // Update the count on the Urgent button
        updateUrgentCount(urgentCount);




    </script>


</body>

</html>
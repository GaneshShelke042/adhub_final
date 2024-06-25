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
  /* Google Fonts Import Link */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }


  /* body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f4f4f4;
  } */
  .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 260px;
    z-index: 100;
    transition: all 0.5s ease;
  }

  .sidebar.close {
    width: 78px;
  }

  .sidebar .logo-details {
    height: 60px;
    width: 100%;
    display: flex;
    align-items: center;
  }

  .sidebar .logo-details i {
    font-size: 30px;
    color: #11101d;
    height: 50px;
    min-width: 78px;
    text-align: center;
    line-height: 50px;
  }

  .sidebar .logo-details .logo_name {
    font-size: 22px;
    color: #566A7F;
    font-weight: 600;
    transition: 0.3s ease;
    transition-delay: 0.1s;
  }

  .sidebar.close .logo-details .logo_name {
    transition-delay: 0s;
    opacity: 0;
    pointer-events: none;
  }

  .sidebar .nav-links {
    height: 100%;
    padding: 30px 0 150px 0;
    overflow: auto;
  }

  .sidebar.close .nav-links {
    overflow: visible;
  }

  .sidebar .nav-links::-webkit-scrollbar {
    display: none;
  }

  .sidebar .nav-links li {
    position: relative;
    list-style: none;
    transition: all 0.4s ease;
  }

  .sidebar .nav-links>li.active:before,
  .sidebar .nav-links>li:before {
    position: absolute;
    left: 0;
    top: 0;
    content: '';
    width: 4px;
    height: 100%;
    background: #696CFF;
    opacity: 0;
    transition: all 0.25s ease-in-out;
    border-top-right-radius: 5px;
    border-top-right-radius: 5px;
  }

  .sidebar .nav-links li.active:before,
  .sidebar .nav-links li:hover:before {
    opacity: 1;
  }

  .sidebar .nav-links li .iocn-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .sidebar.close .nav-links li .iocn-link {
    display: block
  }

  .sidebar .nav-links li i {
    height: 50px;
    min-width: 78px;
    text-align: center;
    line-height: 50px;
    color: #11101d;
    font-size: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .sidebar .nav-links li.active i,
  .sidebar .nav-links li:hover i {
    color: #696CFF;
  }

  .sidebar .nav-links li.showMenu i.arrow {
    transform: rotate(-180deg);
  }

  .sidebar.close .nav-links i.arrow {
    display: none;
  }

  .sidebar .nav-links li a {
    display: flex;
    align-items: center;
    text-decoration: none;
  }

  .sidebar .nav-links li a .link_name {
    font-size: 16px;
    font-weight: 400;
    color: #11101d;
    transition: all 0.4s ease;
  }

  .sidebar .nav-links li.active a .link_name,
  .sidebar .nav-links li:hover a .link_name {
    color: #696CFF;
  }

  .sidebar.close .nav-links li a .link_name {
    opacity: 0;
    pointer-events: none;
  }

  .sidebar .nav-links li .sub-menu {
    padding: 6px 6px 14px 80px;
    margin-top: -10px;
    background: #fff;
    display: none;
  }

  .sidebar .nav-links li.showMenu .sub-menu {
    display: block;
  }

  .sidebar .nav-links li .sub-menu a {
    color: #1d1b31;
    font-size: 15px;
    padding: 5px 0;
    white-space: nowrap;
    opacity: 0.6;
    transition: all 0.3s ease;
  }

  .sidebar .nav-links li .sub-menu a:hover {
    opacity: 1;
  }

  .sidebar.close .nav-links li .sub-menu {
    position: absolute;
    left: 100%;
    top: -10px;
    margin-top: 0;
    padding: 10px 20px;
    border-radius: 0 6px 6px 0;
    opacity: 0;
    display: block;
    pointer-events: none;
    transition: 0s;
  }

  .sidebar.close .nav-links li:hover .sub-menu {
    top: 0;
    opacity: 1;
    pointer-events: auto;
    transition: all 0.4s ease;
  }

  .sidebar .nav-links li .sub-menu .link_name {
    display: none;
  }

  .sidebar.close .nav-links li .sub-menu .link_name {
    font-size: 18px;
    opacity: 1;
    display: block;
  }

  .sidebar .nav-links li .sub-menu.blank {
    opacity: 1;
    pointer-events: auto;
    padding: 3px 20px 6px 16px;
    opacity: 0;
    pointer-events: none;
  }

  .sidebar .nav-links li:hover .sub-menu.blank {
    top: 50%;
    transform: translateY(-50%);
  }

  .sidebar .profile-details {
    position: fixed;
    bottom: 0;
    width: 260px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #1d1b31;
    padding: 12px 0;
    transition: all 0.5s ease;
  }

  .sidebar.close .profile-details {
    background: none;
  }

  .sidebar.close .profile-details {
    width: 78px;
  }

  .sidebar .profile-details .profile-content {
    display: flex;
    align-items: center;
  }

  .sidebar .profile-details img {
    height: 52px;
    width: 52px;
    object-fit: cover;
    border-radius: 16px;
    margin: 0 14px 0 12px;
    background: #1d1b31;
    transition: all 0.5s ease;
  }

  .sidebar.close .profile-details img {
    padding: 10px;
  }

  .sidebar .profile-details .profile_name,
  .sidebar .profile-details .job {
    color: #fff;
    font-size: 16px;
    font-weight: 400;
    white-space: nowrap;
  }

  .sidebar .profile-details .job {
    color: #fff;
    font-size: 14px;
    font-weight: 300;
    opacity: .5;
    white-space: nowrap;
  }

  .sidebar .profile-details i.bx {
    min-width: 50px;
  }

  .sidebar.close .profile-details i,
  .sidebar.close .profile-details .profile_name,
  .sidebar.close .profile-details .job {
    display: none;
  }

  .sidebar .profile-details .job {
    font-size: 12px;
  }

  .home-section {
    position: relative;
    background: #fff;
    height: 0vh;
    left: 260px;
    width: calc(100% - 260px);
    transition: all 0.5s ease;
  }

  .sidebar.close~.home-section {
    left: 78px;
    width: calc(100% - 78px);

  }

  .home-section .home-content {
    /* position: fixed; */
    height: 60px;
    display: flex;
    align-items: center;
  }

  .home-section .home-content .bx-menu,
  .home-section .home-content .text {
    color: #11101d;
    font-size: 35px;
  }

  .home-section .home-content .bx-menu {
    margin: 0 15px;
    cursor: pointer;
  }

  .home-section .home-content .text {
    font-size: 26px;
    font-weight: 600;
  }

  @media (max-width: 420px) {
    .sidebar.close .nav-links li .sub-menu {
      display: none;
    }
  }

  .home-section {
    /* position: fixed; */
    flex: 1;
  }

  /* footer {
    background-color: #ffffff;
    color: rgb(0, 0, 0);
    text-align: center;
    padding: 10px;
} */
  footer {
    background-color: #ffffff;
    color: rgb(0, 0, 0);
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
  }




  /* body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
} */

  /* Main Content css */

  /* body {
    display: flex;
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f4f4f4;
} */
  /*
header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
} */

  .main-content {

    margin: 0;
    width: 100%;
    margin: 20px auto;
    margin-top: 50px;
    background-color: #fff;
    overflow: hidden;
  }

  .dashboard {
    /* margin: 20px;*/
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;
  }

  .button {
    position: relative;
    width: 180px;
    height: 120px;
    font-size: 15px;
    /* font-size: 15px; */
    text-align: auto;
    text-align: left;
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



  /* header */
  .header {
    background: #291F5D;
    color: #fff;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 101;
    /* Higher z-index to be above the sidebar */
  }

  .header i {
    font-size: 35px;
    cursor: pointer;
  }

  .header .icons {
    font-size: 25px;
  }

  .header .user-icon {
    font-size: 25px;
    margin-right: 20px;
    /* Adjust margin-right as needed */
  }

  .content-container {
    display: flex;
    margin-top: 60px;
    /* Adjust margin-top to account for the fixed header */
  }

  .sidebar {
    height: calc(115vh - 60px);
    /* overflow-y: auto; */
    transition: all 0.5s ease;
    background: #cad7fda4;
  }

  .home-section {
    position: relative;
    background: #ffffff;
    /* height: 150vh; */
    left: 260px;
    width: calc(100% - 250px);
    transition: all 0.5s ease;
    margin-bottom: 20px;
    /*Add a bottom margin */
  }


  .admin-info-box .bx-menu {
    font-size: 28px;
    /* Adjust the font-size as needed */
  }

  /* Existing styles for the admin-info-box */
  .admin-info-box {
    /* background-color: #d9d8eb; */
    padding: 10px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    /* margin-top: 20px; */
    /* margin-left: 20px; */
    width: 100%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  /* ... Other existing styles ... */
  .sidebarspace {
    padding-left: 75px;
  }

  a {
    color: #ffff;
  }

  /* ... Other existing styles ... */
</style>

<body>
  <header class="header">

    <!-- <i class='bx bx-menu' id="sidebar-toggle"></i> -->
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus'></i> -->
      <span class="logo_name sidebarspace" style="font-size: 25px;">AdHub</span>
    </div>

    <i class="bx bx-menu sidebarspace" id="sidebar-toggle"></i>

    <div id="urlIdDisplay">
      <?php echo $id_from_url = $this->session->userdata('user_id');
      echo $name_from_url = $this->session->userdata('name');
      echo ("(Content Writer)"); ?>
    </div>
    <i style="font-size: 25px; margin-left: 65%; margin-right: 40px;" class="bx bx-bell icons"></i>
    <i style="font-size: 25px;" class="bx bx-user user-icon"></i>
    <div><a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/Logincontro/login">Log Out</a></div>

    <span class="text"></span>


  </header>


  <div class="sidebar ">

    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Ad Hub</span>
    </div>
    <ul class="nav-links">



      <li>
        <a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/CR_Writer/Cr_dashboardControll/viewDashboard">
          <i class='bx bx-grid-alt'></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
      </li>





      <!-- 
      <li>

        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-bar-chart-alt-2'></i>
            <span class="link_name">Report</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Report</a></li>
          <li><a href="#">HTML & CSS</a></li>
          <li><a href="#">JavaScript</a></li>
          <li><a href="#">PHP & MySQL</a></li>
        </ul>
      </li> -->


      <?php if ($myClientStatus === '1' || $myClientStatus === '2' || $myClientStatus === '3') { ?>
        <li>
          <a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/CR_Writer/Cr_ClientControll/clientView">
            <i class='bx bx-user icons'></i>
            <span class="link_name">Client</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Client</a></li>
          </ul>
        </li>
      <?php } ?>




      <?php if ($mySocial_MediaStatus === '1' || $mySocial_MediaStatus === '2' || $mySocial_MediaStatus === '3') { ?>

        <li>
          <a href="#">
            <i class='bx bx-book-alt'></i>
            <span class="link_name">SocialMedia</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">SocialMedia</a></li>
          </ul>
        </li>

      <?php } ?>

      <li>
        <a href="<?php echo base_url() ?>index.php/CR_Writer/Cr_Groupchat/groupview">
          <i class='bx bx-conversation'></i>
          <span class="link_name">Group Chat</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="<?php echo base_url() ?>index.php/CR_Writer/Cr_Groupchat/groupview">Group Chat</a></li>
        </ul>
      </li>



      <?php if ($myExamsStatus === '1' || $myExamsStatus === '2' || $myExamsStatus === '3') { ?>
        <li>
          <a href="#">
            <i class='bx bx-book-reader icons'></i>
            <span class="link_name">My_Exam</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">My_Exam</a></li>
          </ul>
        </li>
      <?php } ?>

      


      <?php if ($myVideosStatus === '1' || $myVideosStatus === '2' || $myVideosStatus === '3') { ?>
        <li>
          <a href="#">
            <i class='bx bx-video-recording icons'></i>
            <span class="link_name">My videos</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">My videos</a></li>
          </ul>
        </li>
      <?php } ?>

      <!-- <li>
        <a href="#">
          <i class='bx bx-calendar icons'></i>
          <span class="link_name">Calendar-Type</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Calendar</a></li>
        </ul>
      </li> -->


      <?php if ($myPackage_Category === '1' || $myPackage_Category === '2' || $myPackage_Category === '3' || $myPackage_GST === '1' || $myPackage_GST === '2' || $myPackage_GST === '3' || $myPackage_Service === '1' || $myPackage_Service === '2' || $myPackage_Service === '3' || $myPackage === '1' || $myPackage === '2' || $myPackage === '3') { ?>

        <li>
          <div class="iocn-link">
            <a>
              <i class='bx bx-package icons'></i>
              <span class="link_name">Package</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Package</a></li>

            <?php if ($myPackage_Category === '1' || $myPackage_Category === '2' || $myPackage_Category === '3') { ?>
              <li><a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/CR_Writer/Cr_PackageContro/viewpackage">Package
                  Category</a></li>
            <?php } ?>

            <?php if ($myPackage_GST === '1' || $myPackage_GST === '2' || $myPackage_GST === '3') { ?>
              <li><a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/CR_Writer/Cr_Package_GSTContro/viewpackage">Package
                  GST</a></li>
            <?php } ?>

            <?php if ($myPackage_Service === '1' || $myPackage_Service === '2' || $myPackage_Service === '3') { ?>
              <li><a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/CR_Writer/Cr_PackageServicesController/viewpackage">Package
                  Service</a></li>
            <?php } ?>

            <?php if ($myPackage === '1' || $myPackage === '2' || $myPackage === '3') { ?>
              <li><a href="#">Package </a></li>
            <?php } ?>

          </ul>
        </li>
      <?php } ?>



      <!-- <li>
        <a href="http://localhost/adHub/ci3/CodeIgniter3/index.php/RoleContro/viewRoles">
          <i class='bx bx-key icons'></i>
          <span class="link_name">Role</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Role</a></li>
        </ul>
      </li> -->




      <!-- <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-reader icons'></i>
            <span class="link_name">Task</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Task</a></li>
          <li><a href="#">Task List</a></li>
          <li><a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/CustomTaskContro/viewTask">Custom Task</a></li>
          <li><a href="#">Task Category</a></li>
        </ul>
      </li> -->
      <!-- <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="https://gravatar.com/avatar/f57bddebd1edf91412d5d68702530099" alt="profileImg">
                    </div>
                    <div class="name-job">
                        <div class="profile_name">Dumitru Chirutac</div>
                        <div class="job">Web Desginer</div>
                    </div>
                    <i class='bx bx-log-out'></i>
                </div>
            </li> -->
    </ul>
  </div>

  <!-- Nav Bar -->
  <section class="home-section">

    <div class="home-content">


      <span class="text"></span>

    </div>

    <!-- Add these lines below your header -->




    <footer>
      <div class="footer-content">
        <p>&copy; 2024 AdHub. All rights reserved.</p>
      </div>
    </footer>

  </section>
  <!-- Main Content -->



  <script>
    document.addEventListener("DOMContentLoaded", function() {
      let arrow = document.querySelectorAll(".arrow");
      for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
          let arrowParent = e.target.parentElement.parentElement;
          arrowParent.classList.toggle("showMenu");
        });
      }

      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".bx-menu");
      let dashboard = document.querySelector(".dashboard");

      sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
      });

      dashboard.addEventListener("click", () => {
        dashboard.classList.toggle("clicked");
      });
    });



    /* Modify the existing JavaScript for sidebar toggle */
    function toggleSidebar() {
      let sidebar = document.querySelector(".sidebar");
      sidebar.classList.toggle("close");
    }
  </script>
  <!-- 
    <script src="newSideBar.js"></script> -->


</body>

</html>
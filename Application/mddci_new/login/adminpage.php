<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="admin"){
      header('Location: login_form.php?err=2');
    }
?>
<html>
<head>
<title>Admin</title>
<style type="text/css">
/* Add a black background color to the top navigation */
.topnav {
    background-color: #333;
    overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
    background-color: #4CAF50;
    color: white;
}




</style>
</head>
<body>

 <div class="topnav" id="myTopnav">
  <a href="adminpage.php">Home</a>
  <a href="records.php">Patient Records</a>
  <a href="reservation.php">Reservations</a>
</div> 











</body>
</html>

<?php 
 require 'config.php';

 session_start();

 $username =  $_POST['username'];
 $password = $_POST['password'];
 $role = $_POST['role'];
 
 
 $q = 'SELECT * FROM users WHERE username=:username AND password=:password';

 $query = $dbh->prepare($q);

 $query->execute(array(':username' => $username, ':password' => $password));


 if($query->rowCount() == 0){
  header('Location: login_form.php?err=1');
 }else{

  $row = $query->fetch(PDO::FETCH_ASSOC);

  session_regenerate_id();
  $_SESSION['sess_user_id'] = $row['id'];
  $_SESSION['sess_username'] = $row['username'];
        $_SESSION['sess_userrole'] = $row['role'];

        echo $_SESSION['sess_userrole'];
  session_write_close();

  if( $_SESSION['sess_userrole'] == "admin"){
   header('Location: adminpage.php');
  }else{
   header('Location: userpage.php');
  }
  
  
 }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
 
 include('config.php');
 session_start();
  
 if (isset($_POST['login'])) {
  
     $username = $_POST['username'];
     $password = $_POST['password'];
  
     $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
     $query->bindParam("username", $username, PDO::PARAM_STR);
     $query->execute();
  
     $result = $query->fetch(PDO::FETCH_ASSOC);
  
     if (!$result) {
         echo '<p class="error">Username password combination is wrong!</p>';
     } else {
         if (password_verify($password, $result['PASSWORD'])) {
             $_SESSION['user_id'] = $result['ID'];
             echo '<p class="success">Congratulations, you are logged in!</p>';
         } else {
             echo '<p class="error">Username password combination is wrong!</p>';
         }
     }
 }
session_start();
 
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
} else {
    // Show users the page!
}

  
 ?>
</body>

</html>
<?php

session_start();

include("connections.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST"){
   

   $email =  $_POST['email'];
   $password = $_POST['pwd'];

   if(!empty($email) && !empty($password)){

      
      $query = "select * from users where email = '$email' limit 1 ";
      $result = mysqli_query($con, $query);

      if($result){
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            if($user_data['pwd'] === $password){

                $_SESSION['user_id'] = $user_data['user_id'];
                header("location: index.php");
                die;
            }
        }
      }
      echo "please enter valid information!!";
     
   }else{

      echo "please enter valid information!!";
   }
}


?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>login to API CRUD PHP</title>
    <style>
    
        div{
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;

        }
        form{
            width: 60vh;
            margin: auto;
        }
    </style>
</head>
<body>
      <h1>login form</h1>
      <form  class = "btnsdiv" style = "display: flex; flex-direction: column;" method = "POST">
          

        <div><label for="">email</label><input type = "text" name = "email" id = ""></div>
        <div><label for="">password</label><input type = "password" name = "pwd" id = ""></div>
        <div><input type = "hidden" name = "crud_req" value = "signup"></div>
        <div><input type = "submit" value = "login"></div>
        <a href = "signup.php">register</a>

      </form>

     <script src = "login.js" defer></script>
         

</body>
</html>
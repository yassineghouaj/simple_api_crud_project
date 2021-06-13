<?php
   
   session_start();

   include("connections.php");
   include("functions.php");


   if($_SERVER['REQUEST_METHOD'] == "POST"){
      
 
      $firstname = $_POST['fname'];
      $lastname = $_POST['lname'];
      $username = $_POST['username'];
      $email =  $_POST['email'];
      $password = $_POST['pwd'];
      $R_password  = $_POST['rpwd'];
    

      if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password)  && !empty($R_password)){

         $user_id = random_num(10);
         $query = "insert into users (user_id, first_name, last_name, user_name, email, pwd, r_pwd) values('$user_id', '$firstname', '$lastname','$username' , '$email' ,'$password', '$R_password')";
         mysqli_query($con, $query);

           header("location: login.php");
           die;
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
    <title>signup to API CRUD PHP</title>
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
      <h1>signup form</h1>
      <form class = "btnsdiv" style = "display: flex; flex-direction: column;" method = "POST" >
          
        <div><label for="">first name</label><input type = "text" name = "fname" id = ""></div>
        <div><label for="">last name</label><input type = "text" name = "lname" id = ""></div>
        <div><label for="">user name</label><input type = "text" name = "username" id = ""></div>
        <div><label for="">email</label><input type = "email" name = "email" id = ""></div>
        <div><label for="">password</label><input type = "password" name = "pwd" id = ""></div>
        <div><label for="">repeat password</label><input type = "password" name = "rpwd" id = ""></div>
        <div><input type = "hidden" name = "crud_req" value = "signup"></div>
        <div><input type = "submit" value = "signup"></div>
        <a href = "login.php">login</a>

      </form>

     <script src = "signup.js" defer></script>
         

</body>
</html>
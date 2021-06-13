<?php
session_start();

include("connections.php");
include("functions.php");


require 'users/user.php';


$users = getUsers();

include 'partials/header.php';

//signup//

  $user_data = check_login($con);


  if($_SERVER['REQUEST_METHOD'] == "POST"){
      
    $pfirstname = $_POST['pfirstname'];       
    $plastname = $_POST['plastname'];
    $birthdate = $_POST['birthdate'];
    $ways =  $_POST['onew'];
    $flyfrom = $_POST['fcountry'];
    $flyto = $_POST['tcountry'];
    $seats = $_POST['seats'];



  if(!empty($pfirstname) && !empty($plastname) && !empty($birthdate) && !empty($ways) && !empty($flyfrom) && !empty($flyto) && !empty($seats)){

      $user_id = random_num(10);
      $query = "insert into passangers (user_id,  passanger_first_name,  passanger_last_name,  passanger_birthdate,  ways,  fly_from, fly_to, seats) values('$user_id', '$pfirstname', '$plastname', '$birthdate', '$ways', '$flyfrom', '$flyto', '$seats')";
      mysqli_query($con, $query);

      header("location: res_info.php");
      die;
  }else{

     echo "please enter valid information!!";
  }
}
////////////////////////////////////user2////////////////////////////////////

if($_SERVER['REQUEST_METHOD'] == "POST"){
      
  $p2firstname = $_POST['p2firstname'];       
  $p2lastname = $_POST['p2lastname'];
  $birthdate2 = $_POST['birthdate2'];
  $ways2 =  $_POST['onew2'];
  $flyfrom2 = $_POST['fcountry2'];
  $flyto2 = $_POST['tcountry2'];
  $seats2 = $_POST['seats2'];



if(!empty($p2firstname) && !empty($p2lastname) && !empty($birthdate2) && !empty($ways2) && !empty($flyfrom2) && !empty($flyto2) && !empty($seats2)){

    $user_id = random_num(10);
    $query = "insert into passangers (user_id,  passanger_first_name,  passanger_last_name,  passanger_birthdate,  ways,  fly_from, fly_to, seats) values('$user_id', '$p2firstname', '$p2lastname', '$birthdate2', '$ways2', '$flyfrom2', '$flyto2', '$seats2')";
    mysqli_query($con, $query);

    header("location: res_info.php");
    die;
}else{

   echo "please enter valid information!!";
}
}


?>


<div class="container">
    <p>
        <a class="btn btn-success" href="create.php">Create Users</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?php if (isset($user['extension'])): ?>
                        <img style="width: 60px" src="<?php echo "users/images/${user['id']}.${user['extension']}" ?>" alt="">
                    <?php endif; ?>
                </td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td>
                    <a target="_blank" href="http://<?php echo $user['website'] ?>">
                        <?php echo $user['website'] ?>
                    </a>
                </td>
                <td>
                    <a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                    <a href="update.php?id=<?php echo $user['id'] ?>"
                       class="btn btn-sm btn-outline-secondary">Update</a>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div><br><br>
<div class = "" style = "display :flex; flex-direction: row; ">
    <form action = "signup.php">
         <button class = "signup">signup</button>
    </form>
    <form action = "login.php">
       <button class = "login">login</button>
    </form>
    <form action = "login.php">
       <button class = "login.php">logout</button>
    </form>
</div>


<script src = './script.js'></script>

<?php include 'partials/footer.php' ?>

<?php 
include("../inc/db_connect.php");

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password');
//What else to do for username and password protection

$query_password = 'SELECT emp_username, emp_password FROM employee
                    WHERE emp_username = :username';
$statement4 = $db->prepare($query_password);
$statement4->bindValue(':username', $username);
$statement4->execute();
$passwords = $statement4->fetch();
$statement4->closeCursor();

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../scripts/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../scripts/css/style.css">

    <title>Overstock Flooring</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Admin Sign In</h5>
            <form class="form-signin" action="index.php" method="post">
              <div class="form-label-group">
                <input type="text" id="username" class="form-control" name="username" placeholder="User Name" required autofocus>
                <label for="username">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<?php 
 /*  $hashed_pass = password_hash($password, PASSWORD_DEFAULT); */

  if(password_verify($password, $passwords['emp_password']) && $username == $passwords['emp_username']){
    $error_message = "";
    ?> <script>window.location.replace("../admin/index.php");</script>
  <?php  
  }elseif($username == NULL && $password == NULL){
    echo $error_message = "";
  }else{
    echo $error_message = '<p id="login_error"class="login">Username or password incorrect</p>';
  }
?>

<footer></footer>

<script src="scripts/jquery-3.4.1.js"></script>
<script src="scripts/js/bootstrap.min.js"></script>

</body>
</html>



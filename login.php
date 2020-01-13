<?php
//login.php
include('database_connection.php');
if(isset($_SESSION["type"]))
{
 header("location: index.php");
}
$message = '';

if(isset($_POST["login"]))
{
 if(empty($_POST["user_email"]) || empty($_POST["user_password"]))
 {
  $message = "<label>Both Fields are required</label>";
 }
 else
 {
  $query = "
  SELECT * FROM user_details 
  WHERE user_email = :user_email
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    'user_email' => $_POST["user_email"]
   )
  );
  $count = $statement->rowCount();
  if($count > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    if(password_verify($_POST["user_password"], $row["user_password"]))
    {
     $insert_query = "
     INSERT INTO login_details (
      user_id, last_activity) VALUES (
      :user_id, :last_activity)
     ";
     $statement = $connect->prepare($insert_query);
     $statement->execute(
      array(
       'user_id'  => $row["user_id"],
       'last_activity' => date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')))
      )
     );
     $login_id = $connect->lastInsertId();
     if(!empty($login_id))
     {
      $_SESSION["type"] = $row["user_type"];
      $_SESSION["login_id"] = $login_id;
      header("location: index.php");
     }
    }
    else
    {
     $message = "<label>Wrong Password</label>";
    }
   }
  }
  else
  {
   $message = "<label>Wrong Email Address</labe>";
  }
 }
}


?>

<!DOCTYPE html>
<html>
 <head>
  <title>How Display Users Online using PHP with Ajax JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">How Display Users Online using PHP with Ajax JQuery</h2>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">Login</div>
    <div class="panel-body">
     <form method="post">
      <span class="text-danger"><?php echo $message; ?></span>
      <div class="form-group">
       <label>User Email</label>
       <input type="text" name="user_email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Password</label>
       <input type="password" name="user_password" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="login" value="Login" class="btn btn-info" />
      </div>
     </form>
    </div>
   </div>
  </div>
 </body>
</html>


index.php


<?php
//index.php
include('database_connection.php');

if(!isset($_SESSION["type"]))
{
 header("location: login.php");
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>How Display Users Online using PHP with Ajax JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">How Display Users Online using PHP with Ajax JQuery</h2>
   <br />
   <div align="right">
    <a href="logout.php">Logout</a>
   </div>
   <br />
   <?php
   if($_SESSION["type"] =="user")
   {
    echo '<div align="center"><h2>Hi... Welcome User</h2></div>';
   }
   else
   {
   ?>
   <div class="panel panel-default">
    <div class="panel-heading">Online User Details</div>
    <div id="user_login_status" class="panel-body">

    </div>
   </div>
   <?php
   }
   ?>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
<?php
if($_SESSION["type"] == "user")
{
?>
function update_user_activity()
{
 var action = 'update_time';
 $.ajax({
  url:"action.php",
  method:"POST",
  data:{action:action},
  success:function(data)
  {

  }
 });
}
setInterval(function(){ 
 update_user_activity();
}, 3000);


<?php
}
else
{
?>
fetch_user_login_data();
setInterval(function(){
 fetch_user_login_data();
}, 3000);
function fetch_user_login_data()
{
 var action = "fetch_data";
 $.ajax({
  url:"action.php",
  method:"POST",
  data:{action:action},
  success:function(data)
  {
   $('#user_login_status').html(data);
  }
 });
}
<?php
}
?>

});
</script>

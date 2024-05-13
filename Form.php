<?php
 
  include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>"  method="post">
  <h2>Welcome to MY website</h2>
  Username : <br>
  <input type="text" name="username"><br>
  Password: <br>
  <input type="password" name="password"><br>
  <input type="Submit" name="submit" value="Registered">
  </form>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if(empty($username)){
    echo "Please Enter the username";

  }
  elseif(empty($password)){
    echo "Enter Password";
  }
  else{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (user, password)
            VALUES('$username','$hash')";
    mysqli_query($conn, $sql);
    echo"You are registered";
  }
}
 mysqli_close($conn);
?>
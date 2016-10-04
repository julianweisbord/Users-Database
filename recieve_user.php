<?php

include 'connectvarsEECS.php';


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
  die('Could not connect: ' . mysqli_error());
}

$myQuery = mysql_query("SELECT username FROM Users WHERE username='$username' ");

#if(mysql_num_rows($myQuery) >0){
  echo '<span style="color:#FF0000 ">User already exists, nigguh. Retry</span>';
  sleep(10);
  header( 'Location: http://web.engr.oregonstate.edu/~weisborj/add_user.html' );
  echo "Hello";
}

else if (!is_numeric($_POST[age])){
  echo '<span style="color:#FF0000 ">Enter a numeric value. Retry</span>';
  sleep(2);
  header( 'Location: http://web.engr.oregonstate.edu/~weisborj/add_user.html' );

}
else if(strlen($_POST[pass]) < 5){
  echo '<span style="color:#FF0000 ">Enter a longer password. Retry</span>';
  sleep(2);
  header( 'Location: http://web.engr.oregonstate.edu/~weisborj/add_user.html' );
}

else if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)=== false){
    echo '<span style="color:#FF0000 ">This ($_POST[email]) email address is considered valid.</span>';
    sleep(2);
}

else{
  $sql = "INSERT INTO Users(username, firstName, lastName, email, password, age) Values('$_POST[username]', '$_POST[first_name]', '$_POST[last_name]', '$_POST[email]', '$_POST[pass]', '$_POST[age]')";
  if (mysqli_query($conn, $sql)) {
      //echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}

#Might not work because of echo
header( 'Location: http://web.engr.oregonstate.edu/~weisborj/add_user.html' );

mysqli_close($conn);

?>

<!DOCTYPE HTML>
<html>
  <head></head>
  <body>
    <META HTTP-EQUIV="Refresh"
      CONTENT="2; URL=http://web.engr.oregonstate.edu/~weisborj/add_user.html">
  </body>
</html>

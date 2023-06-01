<?php

session_start();

  
  #using htmlspecialchars for input validation
  $name = htmlspecialchars($_POST['name']);
  $matric = htmlspecialchars($_POST['matric']);
  $caddress = htmlspecialchars($_POST['caddress']);
  $haddress = htmlspecialchars($_POST['haddress']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $hphone = htmlspecialchars($_POST['hphone']);
  
  $snameRGEX = '/^[^0-9]*$/';
  $smatricRGEX = '/^[0-9]{7,7}$/'; 
  $scaddressRGEX = '/^.{0,100}$/';
  $shaddressRGEX = '/^.{0,100}$/';
  $semailRGEX = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
  $shphoneRGEX = '/^\+?[0-9]{1,3}[-. (]*([0-9]{1,3})[-. )]*([0-9]{2,4})[-. ]*([0-9]{4})$/';
  $shphoneRGEX = '/^\+?[0-9]{1,3}[-. (]*([0-9]{1,3})[-. )]*([0-9]{2,4})[-. ]*([0-9]{4})$/';

  #encode the output
  $encodedname = htmlspecialchars($name,ENT_QUOTES, 'UTF-8');
  $encodedcaddress = htmlspecialchars($caddress,ENT_QUOTES,'UTF-8');
  $encodedhaddress = htmlspecialchars($haddress, ENT_QUOTES,'UTF-8');

  if (!preg_match($snameRGEX, $name)) {
    echo 'Invalid name format';
  } elseif (!preg_match($smatricRGEX, $matric)) {
    echo 'Matric invalid';
  } elseif (!preg_match($scaddressRGEX, $caddress)) {
    echo 'Address is too long';
  } elseif (!preg_match($shaddressRGEX, $haddress)) {
    echo 'Address is too long';
  } elseif (!preg_match($semailRGEX, $email)) {
    echo 'Invalid email format';
  } elseif (!preg_match($shphoneRGEX, $phone)) {
    echo 'Invalid phone format';
  } elseif (!preg_match($shphoneRGEX, $hphone)) {
    echo 'Invalid phone format';
  } else{
    echo "<h1>Student Details</h1>";
		echo "<p>Name: $encodedname</p>";
    echo "<p>Matric: $matric</p>";
    echo "<p>Current Address: $encodedcaddress</p>";
    echo "<p>Home Address: $encodedhaddress</p>";
		echo "<p>Email: $email</p>";
		echo "<p>Phone Number: $phone</p>";
    echo "<p>Home Phone Number: $hphone</p>";
  }

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logout.php"> Logout </a>
    <h1>Test</h1> 
</body>
</html>
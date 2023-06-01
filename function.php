<?php

//session_start();
//include("connection.php");

function check_login($conn)
{
    if(isset($_SESSION['id']))
    {
        $id = $_SESSION['id'];
        $query = "select * from users where username = 'id' limit 1";
    
        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result)> 0 )
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }

    }
    //redirect to login
    header("location:login.php");
    die;
   
}

function random_num($length){

    $text = " ";
    if ($length < 5)
    {
        $length = 5;
    }

    $len = rand(4,$length);

    for ($i=0; $i <$len ; $i++) { 
        # code...

        $text.= rand(0,9);
    }
    return $text;
}


function getUserRole($username){

    $conn = mysqli_connect('localhost','username','password','authentication');
    //to prevent sql injection
    $username = mysqli_real_escape_string($conn,$username);
    //retrieve user's role from database
    $result = mysqli_query($conn, "select role from users where username = '$username'");

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the role from the result set
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];

        // Close the database connection
        mysqli_close($conn);

        return $role;
    } 
   
}

//generate and store the shared secrets
function generateRandomToken() {
    $secretToken = bin2hex(random_bytes(32)); // 32 bytes = 256 bits
    // Store the shared secret securely (e.g., in a configuration file or database)

    return $secretToken;
  }

function validate_csrf($token){
    return $_SESSION['secretToken'];
    if(isset($_SESSION['secretToken']) && $token === $_SESSION['secretToken']){
        unset($_SESSION['secretToken']);
        return true;
    }
        return false;
} 

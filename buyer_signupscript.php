<?php
require("includes/connect.php");

  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  $email = $_POST['email'];
  $email = mysqli_real_escape_string($con, $name);

  

  $password = $_POST['password'];
  $password = mysqli_real_escape_string($con, $password);
  $password = MD5($password);
  
  $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $email);

  $contact = $_POST['contact'];
  $contact = mysqli_real_escape_string($con, $contact);


  $address = $_POST['address'];
  $address = mysqli_real_escape_string($con, $address);

  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  $regex_num = "/^[789][0-9]{9}$/";

  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($con, $query)or die($mysqli_error($con));
  $num = mysqli_num_rows($result);
  
  if ($num != 0) {
    $m = "<span class='red'>Email Already Exists</span>";
    header('location: index.php?m1=' . $m);
  } else if (!preg_match($regex_email, $email)) {
    $m = "<span class='red'>Not a valid Email Id</span>";
    header('location: index.php?m1=' . $m);
  } else if (!preg_match($regex_num, $contact)) {
    $m = "<span class='red'>Not a valid phone number</span>";
    header('location: index.php?m2=' . $m);
  } else {
    
    $query = "INSERT INTO buyerinfo(email, password, buyername, contact, address)VALUES(" . $email . "','" . $password . "','" . $name . "','" . $contact . "','" . $address . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $buyerid = mysqli_insert_id($con);
    $_SESSION['email'] = $email;
    $_SESSION['buyerid'] = $buyerid;
    $_SESSION['buyername']=$name;
    header('location: buyer_home.php');
  }
?>
<?php
include 'connection.php';

if (isset($_POST['fname'])){

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $email=$_POST['email'].'@vts.su.ac.rs';
    $password_1=$_POST['password'];
    $szakirany=$_POST['select'];
    $user_image='default.png';
    $posts='no';
    $recover='lol';
    $cover_image='cover.jpg';

    $check_email="SELECT * from users where email='$email'";
    $check_username="SELECT * from users where username='$username'";
    $run_check_email=mysqli_query($con,$check_email);
    $run_check_username=mysqli_query($con,$check_username);

    if(mysqli_num_rows($run_check_email)>0){
        echo "Az email cím már létezik..";
    }else if(mysqli_num_rows($run_check_username)>0){
        echo "'A felhasználónév  már létezik..";
    }else{
        $password = md5($password_1);
        $query = "INSERT into users (f_name,l_name,username, password, email,szakirany,user_image,posts,recovery_account,reg_date,cover_image)
VALUES ('$fname', '$lname', '$username','$password','$email','$szakirany','$user_image','$posts','$recover',now(),'$cover_image')";
        $result = mysqli_query($con,$query);
    }



/***************************************************************************************************************
     EMAIL  MEGERŐSITÉS!
/****************************************************************************************************************/





}

<?php
$email = $_GET['email'];
$code = $_GET['code'];
// kn tới sql
$conn = mysqli_connect('localhost','root','','project03');

if(!$conn){
    die("không thể kn");
}

// b2 thực hiện truy vấn

$sql= "select * from db_users where user_email='$email' and user_code='$code'";

$result = mysqli_query($conn, $result);
// b3 xử lý kq
if(mysqli_fetch_assoc($result)>0){
    $sql_2 ="update db_users set status =1 where user_email='$email'";
    $result_2= mysqli_query($conn,$result_2);
    if($result_2 >0){
        echo'Tài khoản Đã được kích hoạt';
    }
    else{
        echo'Không thế kích hoạt';
    }
}
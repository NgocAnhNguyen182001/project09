<?php
$email = 'Dotienanh2027@gmail.com';
$password_daw = 'abc';
//đây là mk trên form login

//b1 kn với sql
$conn = mysqli_connect('localhost','root','','project03');
if(!$conn){
    die("không thể kn");
}

//b2 truy vấn email
$sql = "SELECT * FROM db_users WHERE user_email = '$email'";

$result = mysqli_query($conn,$sql);

// b3 kiểm tra xử lý kết quả
if(mysqli_num_rows($result) >0)
{
    $row = mysqli_fetch_assoc($result);
    $password_hash = $row['user_pass'];
    if(password_verify($password_daw,$password_hash)){
        echo 'Đăng Nhập thành công';

        // header("location: index.php");
    }
    else{
        echo 'Mật khẩu không khớp';
    }
}

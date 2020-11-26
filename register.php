
<?php
include 'config.php';

$username = $_POST ['username'];
$password = $_POST ['password'];
$level = $_POST ['level'];

$query = "INSERT INTO user (username, password, level)
          VALUES ('$username','$password', '$level')";
$result = mysqli_query($db,$query);
$num = mysqli_affected_rows($db);
    if($num > 0){
        header("location:form-login.php");
}else{
    echo "Gagal tambah user";
}   
echo " <a href='form-login.php'>LOGIN</a>";
?>
<?
$username = '*';
$password = '*';
$database = '*';
$link = mysqli_connect('localhost',$username,$password,$database);

if (!$link) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
?>
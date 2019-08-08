<?PHP
$conn = mysqli_connect('[host]', '[user]', '[pass]', '[db name]');
if (mysqli_connect_errno()) {
    echo mysqli_connect_errno();
}

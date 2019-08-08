
<?PHP
    require('db.php');
    if (isset($_POST['submit'])) {
        if ($_POST['password'] == $_POST['confirm']) {
            if ($_COOKIE['setUser'] == false || ! isset($_COOKIE['setUser'])) {
                $stop = false;
                foreach($users as $user) {
                    if ($_POST['username'] == $user['username']) {
                        break;
                        echo 'that username has already been used!';
                        $stop = true;
                    }
                }
                if (! $stop) {
                    $user = $_POST['username'];
                    $pass = $_POST['password'];
                    $query = "INSERT INTO users(username, password, pic) VALUES('$user', '$pass', 'Images/logo.PNG')";
                    if (mysqli_query($conn, $query)) {
                        header('Location: login.php');
                    }
                    else{
                        echo mysqli_error($conn);
                    }
                }
            }
        }
        else{
            echo 'Confirmation does not match original password.';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="CSS/styles.css"/>
    </head>
    <h2 align="center">Create Account</h2>
    <table align="center">
        <td>
            <form class="section" method="POST" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
                <h3 align="center" class="h3"><b>Username</b></h3>
                <p align="center"><input name="username" type="text"></p>
                <h3 align="center" class="h3"><b>Password</b></h3>
                <p align="center"><input name="password" type="password"></p>
                <h3 align="center" class="h3"><b>Confirm Password</b></h3>
                <p align="center"><input name="confirm" type="password"></p>
                <p align="center"><input class="button" name="submit" type="submit" value="Create Account"></p>
            </form>
        </td>
    </table>
    <br>
    <h3 align="center">Already have an account? <a class="button" href="login.php">Log In</a></h3>
</html>

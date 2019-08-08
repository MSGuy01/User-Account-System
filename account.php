<?PHP
    $id = 1;
    session_start();
    if (isset($_POST['submit'])) {
        $_SESSION['username'] = false;
    }
    require('db.php');
    $query = "SELECT * FROM [table name]";
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<?PHP 
    require('db.php');
    if (isset($_POST['submit'])) {
        $_SESSION['usertwo'] = $_SESSION['username'];
        $link = $_POST['pic'];
        $query = "UPDATE users SET pic='$link' WHERE id = {$_SESSION['id']}";
        $_SESSION['pic'] = $link;
        if (mysqli_query($conn, $query)) {
            header('Location: index.php');
        }
    }
    if (isset($_POST['signOut'])) {
        $_SESSION['username'] = false;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?PHP echo $_SESSION['username']; ?>'s profile</title>
        <link type="text/css" rel="stylesheet" href="CSS/styles.css"/>
    </head>
    <?PHP if(isset($_SESSION['username']) && $_SESSION['username'] != false): ?>
    <h1 align="center">Welcome, <?PHP echo $_SESSION['username']; ?></h1>
    <br>
    <h4 align="center"><img src="<?PHP echo $_SESSION['pic']; ?>" height="200" width="200"></h4>
    <h3 align="center"><a href="index.php">See Other Users</a><form method="POST" action="<?PHP echo $_SERVER['PHP_SELF']; ?>"><input class="button" type="submit" name="signOut" value="Sign Out"></form></h3>
    <form method="POST" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
        <!--WORK ON THIS: <input name="delete" type="submit" value="This Button Doesn't Do Anything!">-->
        <h3 align="center">Change Profile Picture:</h3>
        <h4 align="center">Enter Profile Picture Link</h4>
        <h4 align="center"><input align="center" name="pic" type="text"><input align="center" name="submit" type="submit" value="Change Profile Pic"></h4>
    </form>
    <?PHP else: ?>
    <?PHP header('Location: login.php'); ?>
    <?PHP endif; ?>
</html>

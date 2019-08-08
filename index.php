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

<!DOCTYPE html>
<html>
    <head>
        <?PHP if(! isset($_SESSION['username']) || $_SESSION['username'] == false): ?>
        <title>Log In</title>
        <title>Welcome, <?PHP echo $_SESSION['username']; ?></title>
        <?PHP endif; ?>
        <link type="text/css" rel="stylesheet" href="CSS/styles.css"/>
    </head>
    <br>
    <?PHP if (! isset($_SESSION['username']) || $_SESSION['username'] == false): ?>
    <h3 align="center"><img src="Images/logo.PNG"></h3>
    <?PHP else: ?>
    <h3 align="center"><img src="<?PHP echo $_SESSION['pic']; ?>" height="200" width="200"></h3>
    <?PHP endif; ?>
    <br>
    <?PHP if(isset($_SESSION['username']) && $_SESSION['username'] != false): ?>
    <h1 align="center">Welcome, <?PHP echo $_SESSION['username']; ?>!</h1>
    <?PHP else: ?>
    <h1 align="center">Log In or Create Account</h1>
    <?PHP endif; ?>
    <?PHP if(isset($_SESSION['username']) && $_SESSION['username'] != false): ?>
    <form method="POST" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
        <input class="button" type="submit" name="submit" value="Sign Out">
        <a href="account.php">My Account</a>
    </form>
    <?PHP else: ?>
    <h3 align="center"><a class="button" href="login.php">Log In</a></h3>
    <br>
    <h3 align="center"><a class="button" href="create.php">Create An Account</a></h3>
    <br>
    <?PHP endif; ?>
    <?PHP if(isset($_SESSION['username']) && $_SESSION['username'] != false): ?>
    <h2><?PHP echo strtoupper($_SESSION['username']); ?>, DISCOVER OTHER USERS:</h2>
    <?PHP endif; ?>
    <?PHP foreach($users as $user): ?>
    <?PHP if(isset($_SESSION['username']) && $_SESSION['username'] != false && $user['username'] != $_SESSION['username']): ?>
    <img src="<?PHP echo $user['pic']; ?>" height="50" width="50">
    <?PHP endif; ?>
    <?PHP if(isset($_SESSION['username']) && $_SESSION['username'] != false && $user['username'] != $_SESSION['username']) {?><a href="user.php?user=<?PHP echo $user['username'];?>&id=<?PHP echo $id; ?>?pic=hi<?PHP //echo $user['pic']; ?>"><?PHP echo $user['username'].'<br>'; /*echo $id; echo $_SESSION['userPic2'];*/?></a><?PHP $id++; $_SESSION['a'.$id] = $user['pic']; /*echo $_SESSION[$id]*/} else if($user['username'] == $_SESSION['username']) {}?>
    <!--add sensor for id, make it increase more if the username = $user['username'], and add IMG tag-->
    <?PHP endforeach; ?>
</html>

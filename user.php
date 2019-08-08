<!DOCTYPE html>
<?PHP 
    session_start();
    require('db.php');
    if (isset($_GET['id'])) {
        $_SESSION['idlookup'] = $_GET['id'];
        $_SESSION['userlookup'] = $_GET['user'];
        header('location: user.php');
    }
    
    $query = "SELECT * FROM users";// ORDER BY Created_at DESC";
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<html>
    <head>
        <title><?PHP echo $_SESSION['userlookup']; ?>'s profile</title>
        <link rel="stylesheet" type="text/css" href="CSS/styles.css"/>
        <style>
            a{
                color: red;
                text-decoration: none;
            }
            a:hover{
                color: blue;
            }
        </style>
    </head>

<h1 align="center"><?PHP echo $_SESSION['userlookup'];?>'S ACCOUNT</h1>
<?PHP foreach($users as $user): ?>
<?PHP if($user['username'] == $_SESSION['userlookup']): ?>
<h3 align="center"><img src="<?PHP echo $user['pic']; ?>" height="200" width="200"></h3>
<br>
<?PHP endif; ?>
<?PHP endforeach; ?>
<h3 align="center"><a href="index.php">Back</a></h3>
</html>

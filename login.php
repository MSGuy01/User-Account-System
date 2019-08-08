<?PHP
    require('db.php');
    $query = "SELECT * FROM [table name]";
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
?>
<?PHP
    $i = 1;
    $submitted = false;
    require('db.php');
    if (isset($_POST['submitUser'])) {
        $submitted = true;
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $i = 1;
        foreach($users as $user) {
            if ($user['username'] == $username) {
                $right = true;
                break;
            }
            else{
                $i++;
                $right = false;
            }
        }
        
        if ($right) {
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $j = 1;
            foreach($users as $user) {
                if ($user['password'] == $password) {
                    $right2 = true;
                    break;
                }
                else{
                    $j++;
                    $right2 = false;
                }
            }
            if ($j == $i) {
                if($right2) {
                    
                    echo 'Welcome!';
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['pic'] = $user['pic'];
                    $_SESSION['id'] = $i + 1;
                    header ('Location: account.php');
                }
                else{
                    echo 'WRONG USERNAME OR PASSWORD!';
                }
            }
            else{
                echo 'WRONG USERNAME OR PASSWORD!';
            }
        }
        else{
            echo 'WRONG USERNAME OR PASSWORD!';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="CSS/styles.css"/>
    </head>
    <br>
    <?PHP if(! isset($_SESSION['username']) || $_SESSION['username'] == false): ?>
    <div id="center">
        <h2 align="center">Log In</h2>
        <table align="center">
            <td>
                <form class="section" method="POST" action="<?PHP echo $_SERVER['PHP_SELF']?>">
                    <h3 align="center" id="enterUserLabel">Username</h3>
                    <p align="center"><input align="center" name="username" type="text" id="username"></p>
                    <h3 align="center" id="enterPassLabel">Password</h3>
                    <p align="center"><input name="password" type="password" id="password"></p>
                    <p align="center"><input class="button" name="submitUser" type="submit" value="Log In" id="subUser"></p>
                </form>
            </td>
        </table>
    </div>    
    <br>
    <h3 align="center">Don't have an account? <a class="button" href="create.php">Create One</a></h3>
    <?PHP else: ?>
    <?PHP header('Location: index.php'); ?>
    <?PHP endif; ?>
    <script>
    </script>
</html>

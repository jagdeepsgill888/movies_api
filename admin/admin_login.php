<?php
require_once '../load.php';
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d H:i:s');
// $loginsucc = $_SESSION['user_login_count'];

if (isset($_SESSION['user_id'])) {
    redirect_to("index.php");
}

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if (!empty($username) && !empty($password)) {
        $result = login($username, $password, $ip, $date, $loginsucc);
        $message = $result;
    } else {
        $message = 'Please fill out the required fields.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the admin panel</title>
</head>
<body>
<?php echo !empty($message)?$message:'';?>
    <form action="admin_login.php" method="post">
    <label for="username">Username:</label>
    <input id="username"  type="text" name="username" value="">
    <label for="password">Password:</label>
    <input id="password" type="password" name="password">
    <button type="submit" name="submit">Login Now</button>
    </form>
</body>
</html>
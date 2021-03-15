<?php
 require_once '../load.php';
 confirm_logged_in(true);


 if (isset($_POST['submit'])) {
     //  $encoded = base64_encode($psww);
     //RA2: 4. encrypted password in db with  password_hash
     //  $encryptPass= password_hash($psww, PASSWORD_DEFAULT);
     
     $data = array(
         'fname'=>trim($_POST['fname']),
         'username'=>trim($_POST['username']),
         'password'=>trim($_POST['password']),
        //  'password'=>$encryptPass,
         'email'=>trim($_POST['email']),
         'user_level'=>trim($_POST['user_level']),
     );
     
     $messageA = createUser($data);

     //  mail($to, $subject, $textEmil, $headers, $emailUsername);
     //  echo "Email has been sent";
    //  $testmail = mail("dav@test.com", "Hello World", "THis is a test");
    //  var_dump($testmail);
 }

 //RA2: 3. Function for generating a passoword when registering
     // by using str_shuffle
//  function generatePassword($length=8, $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVXYZ0123456789!#$")
//  {
//      return substr(str_shuffle($chars), 0, $length);
//  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
<h2>Create User</h2>
<?php echo !empty($messageA)?$messageA:'';?>
    <form action="admin_createuser.php" method="post">
    <label for="first_name">First Name</label>
    <input id="first_name" type="text" name="fname" value=""><br><br>

    <label for="username">Username</label>
    <input id="username" type="text" name="username" value=""><br><br>

    <label for="password">Password</label>
    <input id="password" type="text" name="password" value=""><br><br>

    <label for="email">Email</label>
    <input id="email" type="email" name="email" value=""><br><br>

    <label for="user_level">User Level</label>
    <select id="user_level" name="user_level">
    <?php $user_level_map = getUserLevelMap();
      foreach ($user_level_map as $val => $label):?>
         <option value="<?php echo $val;?>"><?php echo $label;?></option>
    <?php endforeach;?>
    </select><br><br>

    <button type="submit" name="submit">Create User</button>

    </form>
</body>
</html>
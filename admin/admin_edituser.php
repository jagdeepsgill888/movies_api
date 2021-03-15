<?php
 require_once '../load.php';
 confirm_logged_in();

 $id = $_SESSION['user_id'];
 $current_user = getSingleUser($id);

 if (empty($current_user)) {
     $messageA = 'Failed to get user info';
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <?php echo !empty($messageA)?$messageA:'';?>
    <?php if (!empty($current_user)):?>
    <form action="admin_edituser.php" method="post">
        <?php while ($user_info = $current_user->fetch(PDO::FETCH_ASSOC)):?>
            <label for="first_name">First Name</label>
            <input id="first_name" type="text" name="fname" value="<?php echo $user_info['user_fname']; ?>"><br><br>

            <label for="username">Username</label>
            <input id="username" type="text" name="username" value="<?php echo $user_info['user_name']; ?>"><br><br>

            <label for="password">Password</label>
            <input id="password" type="text" name="password" value="<?php echo $user_info['user_pass']; ?>"><br><br>

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="<?php echo $user_info['user_email']; ?>"><br><br>

            <label for="user_level">User Level</label>
            <select id="user_level" name="user_level">
            <?php $user_level_map = getUserLevelMap();
            foreach ($user_level_map as $val => $label):?>
                <option value="<?php echo $val;?>" <?php echo $val===(int)$user_info['user_level']?'selected':'';?> ><?php echo $label;?></option>
            <?php endforeach;?>
            </select><br><br>

            <button type="submit" name="submit">Update User</button>
        <?php endwhile;?>
    </form>
    <?php endif;?>
</body>
</html>
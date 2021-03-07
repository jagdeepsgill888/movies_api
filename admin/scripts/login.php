<?php
function login($username, $password, $ip, $loginsucc)
{
    $pdo = Database::getInstance()->getConnection();

    ## TODO: Finish the following query to check if the username and passowrd are matching in the DB
    $get_user_query= 'SELECT * FROM tbl_user WHERE user_name = :username AND user_pass = :password';
    $user_set = $pdo->prepare($get_user_query);
    $user_set->execute(
        array(
            ':username'=>$username,
            ':password'=>$password
        )
    );

    if ($found_user = $user_set->fetch(PDO::FETCH_ASSOC)) {
        //we found user in the DB, get him in!
        $found_user_id = $found_user['user_id'];

        //Write the username , userid user_lastedate into session
        $_SESSION['user_id'] = $found_user_id;
        $_SESSION['user_name'] = $found_user['user_fname'];
        $_SESSION['user_lastdate'] = $found_user['user_date'];
        $_SESSION['user_level'] = $found_user['user_level'];
        
        // 1 value when a user logs in
        $_SESSION['loginCount'] = 1;

        
        //login tracking and write the number into session
        // add the current login with 1 login count
        
        $_SESSION['user_login_count'] = $found_user['user_login_succ'] + $_SESSION['loginCount'];
        $loginsucc = $_SESSION['user_login_count'];
        
        

        //Update the user IP by the current logged in
        $update_user_query = 'UPDATE tbl_user SET user_ip = :user_ip WHERE user_id = :user_id';
        $update_user_set = $pdo->prepare($update_user_query);
        $update_user_set->execute(
            array(
                ':user_ip'=>$ip,
                ':user_id'=>$found_user_id
            )
        );
        //update the user date in the db
        $update_user_query = 'UPDATE tbl_user SET user_date= :user_date WHERE user_id=:user_id';
        $update_user_set= $pdo->prepare($update_user_query);
        $update_user_set->execute(
            array(
                ':user_date'=>$date,
                ':user_id'=>$found_user_id
                )
        );

        //login ssuccessful tracking update user data in the db
        $update_user_query = 'UPDATE tbl_user SET user_login_succ = :user_login_succ WHERE user_id=:user_id';
        $update_user_set= $pdo->prepare($update_user_query);
        $update_user_set->execute(
            array(
                ':user_login_succ'=>$loginsucc,
                ':user_id'=>$found_user_id
                )
        );


        //Redirect user back to index.php
        redirect_to('index.php');
    } else {
        //this is where users are given 3 tries to login
        //if failed, prompt the user and stop them from logging in
        
        $_SESSION['loginCount']++;
        // echo 'Please try again.';
        $againText = "Please try again.";
        $againText .= " Remaining attemps";
        $attemps = 4 - $_SESSION['loginCount'];
        $messagelogin = $againText . ' ' . $attemps;
        echo $messagelogin;
        // if exceeds , its it will stop user from logging in
        if ($_SESSION['loginCount'] > 3) {
            echo '.  Too many failed attempts !!';
            exit;
        }
    }
}

function confirm_logged_in($admin_above_only=false)
{
    if (!isset($_SESSION['user_id'])) {
        redirect_to("admin_login.php");
    }

    if (!empty($admin_above_only) && empty($_SESSION['user_level'])) {
        redirect_to('index.php');
    }
}

function logout()
{
    session_destroy();

    redirect_to("admin_login.php");
}

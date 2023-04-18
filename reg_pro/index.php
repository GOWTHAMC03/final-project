<?php
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['login'])) {
        $email= stripslashes($_REQUEST['email']);    // removes backslashes
        $email= mysqli_real_escape_string($con, $email);
        $upswd1= stripslashes($_REQUEST['upswd1']);
        $upswd1= mysqli_real_escape_string($con, $upswd1);
        // Check user is exist in the database
        $query    = "SELECT * FROM `register` WHERE email='$email'
                     AND upswd1='$upswd1';
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $stmt['email'] = $email;
            // Redirect to user dashboard page
            header("Location: gg1.html");
            
        
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Email/password.</h3><br/>
                  <p class='link'>Click here to <a href='index.html'>Login</a> again.</p>
                  </div>";
        }
    } else {
          

?>
<?php
    }
?>
<?php
    session_start();
    $_SESSION['message'] = '';
    $mysql = mysql_connect('sql2.freemysqlhosting.net','sql2270752','rR7*zA7!', 'sql2270752');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Check if Passwords match
      if ($_POST['password']== $_POST['confirmpassword']) {
        // Post information to database
        $firstname = $mysql->real_escape_string($_POST['firstname']);
        $secondname = $mysql->real_escape_string($_POST['lastname']);
        $email = $mysql->real_escape_string($_POST['email']);
        $phone = $mysql->real_escape_string($_POST['phone']);
        $password = md5($_POST['password']);
        $confirmpass = $mysql->real_escape_string($_POST['confirmpass']);

        $_SESSION['username'] = $firstname;

        $sql = "INSERT INTO registration (firstname,lastname,email,phone,password)". "VALUES ('$firstname','$lastname','$email','$phone','$password')";

        if ($mysql->query($sql)=== true) {
          // If succesfull redirect to home ldap_control_paged_result
          $_SESSION['message'] = 'Registration succeful! Added $firstname to the database!';
          header("location:login.html");
        } else {
          $_SESSION['message'] = "User could not be added to the database!";
        }

      } else {
        // code...
        $_SESSION['message'] = "Passwords DID NOT match!";

      }
    }
?>

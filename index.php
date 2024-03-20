<?php

// Check if the system setup is complete

require 'config/database.php'; 

if (isset($_SESSION['user_id'])) 
{
    header('Location: admin/');
    exit();
}

$errorMessage = '';

if(isset($_POST['btn_login']))
{
    // Get the email and password entered by the user
    $email = $_POST['email'];
    
    $password = $_POST['password'];

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email address format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $errors[] = 'Please enter a valid email address.';
    }

    // Validate password field is not empty
    if (empty($password)) 
    {
        $errors[] = 'Please enter a password.';
    }

    // If there are no validation errors, attempt to log in
    if(empty($errors)) 
    {

        // Query the database to see if a user with that username exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // If the user exists, retrieve their password hash from the database
        if ($user) 
        {
            $passwordHash = $user['password'];

            // Use the password_verify function to check if the entered password matches the password hash
            if (password_verify($password, $passwordHash)) 
            {
                // Password is correct, log the user in
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['user_name'] = $user['name'];
                if($user['role'] == 'user')
                {
                    header('Location: bills.php');
                }
                else
                {
                    header('Location: admin/');
                }
                exit;
            } 
            else
            {
                // Password is incorrect, show an error message
                $errors[] = "Invalid password";
            }
        } 
        else 
        {
            // User not found, show an error message
            $errors[] = "email not found in database";
        }
    }
}

?>
<!DOCTYPE html>
<html data-navigation-type="default" data-navbar-horizontal-shape="default" lang="en-US" dir="ltr">


<!-- Mirrored from prium.github.io/phoenix/v1.15.0/pages/authentication/simple/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Mar 2024 10:35:09 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>Phoenix</title>

  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="https://prium.github.io/phoenix/v1.15.0/assets/img/favicons/favicon.ico">
  <link rel="manifest" href="https://prium.github.io/phoenix/v1.15.0/assets/img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
  <meta name="theme-color" content="#ffffff">
  <script src="vendors/simplebar/simplebar.min.js"></script>
  <script src="assets/js/config.js"></script>

  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link href="vendors/simplebar/simplebar.min.css" rel="stylesheet">
  <link rel="stylesheet" href="unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href="assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
  <link href="assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
  <link href="assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
  <link href="assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
  <script>
    var phoenixIsRTL = window.config.config.phoenixIsRTL;
    if (phoenixIsRTL) {
      var linkDefault = document.getElementById('style-default');
      var userLinkDefault = document.getElementById('user-style-default');
      linkDefault.setAttribute('disabled', true);
      userLinkDefault.setAttribute('disabled', true);
      document.querySelector('html').setAttribute('dir', 'rtl');
    } else {
      var linkRTL = document.getElementById('style-rtl');
      var userLinkRTL = document.getElementById('user-style-rtl');
      linkRTL.setAttribute('disabled', true);
      userLinkRTL.setAttribute('disabled', true);
    }
  </script>
</head>

<body>

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <div class="container">
      <div class="row flex-center min-vh-100 py-5">
        <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a class="d-flex flex-center text-decoration-none mb-4" href="https://prium.github.io/phoenix/v1.15.0/index.html">
            <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img src="assets/img/icons/logo.png" alt="phoenix" width="58" /></div>
          </a>
          <form method="POST" autocomplete="off">
          <div class="text-center mb-7">
            <h3 class="text-body-highlight">Connexion</h3>
            <?php
                            
                            if(isset($errors))
                            {
                                foreach ($errors as $error) 
                                {
                                    echo "<div class='alert alert-danger'>$error</div>";
                                }
                            }
                            ?>

            <p class="text-body-tertiary">Get access to your account</p>
          </div><button class="btn btn-phoenix-secondary w-100 mb-3"><span class="fab fa-google text-danger me-2 fs-9"></span>Sign in with google</button><button class="btn btn-phoenix-secondary w-100"><span class="fab fa-facebook text-primary me-2 fs-9"></span>Sign in with facebook</button>
          <div class="position-relative">
            <hr class="bg-body-secondary mt-5 mb-4" />
            <div class="divider-content-center">or use email</div>
          </div>
          <div class="mb-3 text-start"><label class="form-label" for="email">Email address</label>
            <div class="form-icon-container"><input class="form-control form-icon-input" id="email" type="text" name="username" value="<?= (isset($username)) ? $username : ''; ?>" placeholder="name@example.com" /><span class="fas fa-user text-body fs-9 form-icon"></span></div>
          </div>
          <div class="mb-3 text-start"><label class="form-label" for="password">Password</label>
            <div class="form-icon-container"><input class="form-control form-icon-input" id="password" type="password" name="password" value="<?= (isset($password)) ? $password : ''; ?>"  placeholder="Password" /><span class="fas fa-key text-body fs-9 form-icon"></span></div>
          </div>
          <div class="row flex-between-center mb-7">
            <div class="col-auto">
              <div class="form-check mb-0"><input class="form-check-input" id="basic-checkbox" type="checkbox" checked="checked" /><label class="form-check-label mb-0" for="basic-checkbox">Remember me</label></div>
            </div>
            <div class="col-auto"><a class="fs-9 fw-semibold" href="forgot-password.html">Forgot Password?</a></div>
          </div>
          <button type="submit" name="btn_submit" class="btn btn-primary w-100 mb-3">Se connecter</button>
          <div class="text-center"><a class="fs-9 fw-bold" href="sign-up.html">Create an account</a></div>
          </form>
        </div>
      </div>
    </div>

  </main><!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->


  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="vendors/popper/popper.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/anchorjs/anchor.min.js"></script>
  <script src="vendors/is/is.min.js"></script>
  <script src="vendors/fontawesome/all.min.js"></script>
  <script src="vendors/lodash/lodash.min.js"></script>
  <script src="polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
  <script src="vendors/list.js/list.min.js"></script>
  <script src="vendors/feather-icons/feather.min.js"></script>
  <script src="vendors/dayjs/dayjs.min.js"></script>
  <script src="assets/js/phoenix.js"></script>
</body>


<!-- Mirrored from prium.github.io/phoenix/v1.15.0/pages/authentication/simple/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Mar 2024 10:35:23 GMT -->

</html>
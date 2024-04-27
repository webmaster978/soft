<?php
require 'config/database.php';


if (isset($_SESSION['PROFILE']['id_utilisateur'])) {
  switch ($_SESSION['PROFILE']['designation']) {


    case 'admin':
      header('location: manager/');
      break;
    case 'reception':
      header('location: reception/');
      break;
    case 'consultation':
      header('location: consultation/');
      break;
    case 'infirmier':
      header('location: infirmier/');
      break;
    case 'labo':
      header('location: labo/');
      break;
    case 'pharmacie':
      header('location: pharmacie/');
      break;
    case 'finance':
      header('location: finances/');
      break;


    default:
      header('location: ./');
      die('aucune service');
      break;
  }
}

if (isset($_POST['btn_submit'])) {
  extract($_POST);
  $sql = "SELECT * FROM authentification  WHERE (username=:username OR email=:email) AND password=:password";
  $req = $db->prepare($sql);
  $req->execute([
    'username' => htmlspecialchars(trim($username)),
    'email' => $username,
    'password' => sha1($password)
  ]);

  if ($informations = $req->fetch()) { /*Si l'adresse et le mot de passe sont vrai*/
    $_SESSION['TMP_PROFILE'] = $informations;
    //echo $_SESSION['TMP_PROFILE']['ref_utilisateur'];

    $recup_informations = $db->prepare("SELECT * FROM fonction INNER JOIN tbl_agent ON fonction.id_fonction=tbl_agent.ref_fonction WHERE id_utilisateur=:id_utilisateur");
    $recup_informations->execute([
      'id_utilisateur' => $_SESSION['TMP_PROFILE']['ref_utilisateur']
    ]);

    while ($session = $recup_informations->fetch()) {
      $_SESSION['PROFILE'] = $session;
    }

    switch ($_SESSION['PROFILE']['designation']) {


      case 'admin':
        header('location: manager/');
        break;
      case 'reception':
        header('location: reception/');
        break;
      case 'consultation':
        header('location: consultation/');
        break;
      case 'infirmier':
        header('location: infirmier/');
        break;
      case 'labo':
        header('location: labo/');
        break;
      case 'pharmacie':
        header('location: pharmacie/');
        break;
      case 'finance':
        header('location: finances/');
        break;
    }
  } else {
    $error = '';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

    

<head>
        <meta charset="utf-8" />
        <title>Log In | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        
        <!-- Theme Config Js -->
        <script src="assets/js/hyper-config.js"></script>

        <!-- App css -->
        <link href="assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body class="authentication-bg position-relative">

        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header py-4 text-center">
                                <a href="#">
                                    <span><img src="assets/images/logo/lg.png" alt="logo"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Connexion</h4>
                                    <!-- <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p> -->
                                </div>

                                <form action="#" method="POST">

                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Adrese email</label>
                                        <input class="form-control" type="text" id="emailaddress" name="username" value="<?= (isset($username)) ? $username : ''; ?>" required="" placeholder="nom d;utilisateur">
                                    </div>

                                    <div class="mb-3">
                                        
                                        <label for="password" class="form-label">Mot de passe</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password" value="<?= (isset($password)) ? $password : ''; ?>" required="" placeholder="motde passe">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                           
                                        </div>
                                    </div>

                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-outline-dark rounded-pill" name="btn_submit" type="submit"> Se conncter </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            2023 - <script>document.write(new Date().getFullYear())</script> © Clinovie - Soft
        </footer>
        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>


</html>

<?php include 'part/_entete.php' ?>




<!DOCTYPE html>
<html lang="en">




<head>
    <meta charset="utf-8" />
    <title>Patients | <?= ucwords($set->nom_system); ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="#" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <link href="../assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Daterangepicker css -->
    <link href="../assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Touchspin css -->
    <link href="../assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Datepicker css -->
    <link href="../assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Timepicker css -->
    <link href="../assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />

    <!-- Flatpickr Timepicker css -->
    <link href="../assets/vendor/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->


    <!-- Datatables css -->
    <link href="../assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="../assets/js/hyper-config.js"></script>

    <!-- App css -->
    <link href="../assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- ========== Topbar Start ========== -->
        <?php include 'part/_navbar.php' ?>
        <!-- ========== Topbar End ========== -->


        <?php
        if (isset($_POST['btn_submit'])) {
            extract($_POST);

            $noms = htmlspecialchars($_POST['noms']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $date_naiss = htmlspecialchars($_POST['date_naiss']);
            $nom_respo = htmlspecialchars($_POST['nom_respo']);
            $contact_respo = htmlspecialchars($_POST['contact_respo']);
            $contact = htmlspecialchars($_POST['contact']);
            $categorie = htmlspecialchars($_POST['categorie']);
            $genre = htmlspecialchars($_POST['genre']);
            $avenue = htmlspecialchars($_POST['avenue']);
            $add_by = $_SESSION['PROFILE']['id_utilisateur'];



            $check_query = "SELECT * FROM patients
            WHERE noms=:noms
           ";
            $statement = $db->prepare($check_query);
            $check_data = array(
                ':noms'   =>  $noms

            );
            if ($statement->execute($check_data)) {
                if ($statement->rowCount() > 1) {
                    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                
              })
                  </script>";
                } else {
                    if ($statement->rowCount() == 0) {



                        $reque = $db->prepare("INSERT INTO patients (noms,adresse,date_naiss,nom_respo,contact_respo,contact,categorie,genre,avenue,add_by) VALUES (:noms,:adresse,:date_naiss,:nom_respo,:contact_respo,:contact,:categorie,:genre,:avenue,:add_by) ");

                        $result = $reque->execute(array(

                            'noms' => $noms,
                            'adresse' => $adresse,
                            'date_naiss' => $date_naiss,
                            'nom_respo' => $nom_respo,
                            'contact_respo' => $contact_respo,
                            'contact' => $contact,
                            'categorie' => $categorie,
                            'genre' => $genre,
                            'avenue' => $avenue,
                            'add_by' => $_SESSION['PROFILE']['id_utilisateur']

                        ));
                        if ($result) {
                            echo "<script>
                Swal.fire({
                     position: 'center',
                     icon: 'success',
                     title: 'patient enregistre avec success',
                    showConfirmButton: false,
                     timer: 1500
                   })

            </script>";
                        } else {
                            echo "err";
                        }
                    }
                }
            }
        }



        ?>

        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'part/_menu.php' ?>
        <!-- ========== Left Sidebar End ========== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">

                                <div class="page-title-right">
                                    <button type="button" class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                        <i class="uil-user-plus"></i>
                                        Nouveau patient
                                    </button>
                                </div>
                                <h4 class="page-title">Nos patients</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->




                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="header-title">Export</h4>


                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="buttons-table-preview">
                                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th class="table-column-pe-0">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                                                                
                                                            </div>
                                                        </th>
                                                        <th class="table-column-ps-0">Noms du patient</th>
                                                        <th>Stricture</th>
                                                        <th>Date de naissance</th>
                                                        <th>Age</th>
                                                        <th>Genre</th>
                                                        <th>Nom du reponsable</th>

                                                        <th>Adresse du patient</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php $requete = $db->query("SELECT * FROM patients INNER JOIN quartier ON patients.adresse=quartier.id_quartier INNER JOIN stricture ON patients.categorie = stricture.id_struct ORDER BY created_at ASC");
                                                    while ($g = $requete->fetch()) {

                                                        $categ=0;

                                                        if($g['categorie'] == '1'){
                                                            $categ = '<span class="badge badge-danger-lighten">Non Abonnee</span>';
                                                        } else {
                                                            $categ = '<span class="badge badge-success-lighten">Abonnee</span>';
                                                        }

                                                    ?>



                                                        <!-- modal triage -->

                                                        <div id="exampleModalCenter<?= $g['id_patient']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Etes vous sur de vouloir envoyer <?= $g['noms']; ?> Au triage?</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="" method="POST">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <input type="text" class="form-control" name="noms" value="<?= $g['noms']; ?>" readonly>
                                                                                    <input type="hidden" name="ref_patient" value="<?= $g['id_patient']; ?>">
                                                                                </div>
                                                                                <br>
                                                                                <br>
                                                                                <br>

                                                                                <div class="col-md-6">
                                                                                    <label for="">Date</label>
                                                                                    <input type="date" class="form-control" name="date_t" placeholder="" required>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="">Description</label>
                                                                                    <span class="span span-warning">(Optionel)</span>
                                                                                    <input type="text" class="form-control" name="description" placeholder="petite description">
                                                                                </div>
                                                                                <br>
                                                                                <br>
                                                                                <br>



                                                                            </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuller</button>
                                                                        <button type="submit" name="btn_tri" class="btn btn-primary">Envoyer</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- end modal triage -->
                                                        <tr>
                                                            <td class="table-column-pe-0">

                                                                <?= $g['id_patient']; ?>


                                                            </td>
                                                            <td class="table-column-ps-0">
                                                                <a class="d-flex align-items-center" href="#">
                                                                    <div class="avatar avatar-circle">
                                                                        <img width="50px;" src="../assets/images/prof.jpg" alt="Image Description">
                                                                    </div>
                                                                    <div class="ms-3">
                                                                        <span class="d-block h5 text-inherit mb-0"><?= strtoupper($g['noms']); ?><i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
                                                                        <span class="d-block fs-5 text-body"><?php echo $categ ?></span>
                                                                    </div>
                                                                </a>
                                                            </td>
                                                            <td style="font-size:12px;">
                                                            <?= $g['nom_struct']; ?>
                                                            </td>
                                                            <td><?= $g['date_naiss']; ?></td>
                                                            <td>
                                                                <?php
                                                                $daten = $g['date_naiss'];
                                                                $today = date("Y-m-d");
                                                                $diff = date_diff(date_create($daten), date_create($today));
                                                                echo $diff->format('%y');

                                                                ?>
                                                                An(s)
                                                            </td>
                                                            <td>
                                                                <?= $g['genre']; ?>
                                                            </td>
                                                            <td><?= $g['nom_respo']; ?>
                                                                <span class="d-block fs-5 text-body"><?= $g['contact_respo']; ?></span>

                                                            </td>
                                                            <td>Comm <?= $g['ref_commune']; ?>/<?= $g['nom_quartier']; ?></td>
                                                            <td>

                                                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter<?= $g['id_patient']; ?>">
                                                                    <i class="bi-pencil-fill me-1"></i> Triage
                                                                </button>

                                                            </td>
                                                        </tr>
                                                    <?php } ?>




                                                </tbody>
                                            </table>
                                        </div> <!-- end preview-->


                                    </div>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->


                    <div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Nouveau patient</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST" autocomplete="off">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="noms" placeholder="Nom du patients" required>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="col-md-6">
                                                <label for="">Genre</label>
                                                <select name="genre" id="" class="form-control" required>
                                                    <option>--Genre--</option>
                                                    <option value="Homme">Homme</option>
                                                    <option value="Femme">Femme</option>
                                                </select>

                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Date de naissance</label>
                                                <input type="date" class="form-control" name="date_naiss" placeholder="date de naissance" required>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="nom_respo" placeholder="nom du reponsable" required>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control" name="contact_respo" placeholder="contact du reponsable" required>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control" name="contact" placeholder="cobract du patient" required>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input">

                                                    <select class="form-control" id="select3" onchange="toggleDiv()">
                                                        <option>--categorie--</option>
                                                        <option value="show">Abonnee</option>
                                                        <option value="hide">Non abonnee</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="inputs">
                                                <div style="display:none;" class="input">
                                                    <label for="selectLabel"></label>
                                                    <select id="select1" onchange="toggleDiv()">
                                                        <option value="show"></option>
                                                        <option value="hide"></option>
                                                    </select>
                                                </div>

                                                <div style="display:none;" class="input">
                                                    <label for="selectLabel">Div-2: </label>
                                                    <select id="select2" onchange="toggleDiv()">
                                                        <option value="show">Show</option>
                                                        <option value="hide">Hide</option>
                                                    </select>
                                                </div>



                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="col-md-6">
                                                <label for="">Quartier</label>
                                                <select class="form-control" name="adresse" id="">


                                                    <?php $requart = $db->query("SELECT * FROM quartier ORDER BY nom_quartier ASC");
                                                    while ($gat = $requart->fetch()) {
                                                    ?>
                                                        <option value="<?= $gat['id_quartier']; ?>"><?= $gat['nom_quartier']; ?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                            <div class="col-md-6">

                                                <div style="display:none;" id="one" class="box">
                                                    <p>This is visible when show in div 1</p>
                                                </div>

                                                <div style="display:none;" id="two" class="box">
                                                    <p>This is visible when show in div 2</p>
                                                </div>


                                                <div id="three" class="box">
                                                    <label for="">Stricture</label>
                                                    <select class="form-control select2" data-toggle="select2" id="" name="categorie">
                                                        <option value="1">Non abonnee</option>


                                                        <?php $restr = $db->query("SELECT * FROM stricture ORDER BY nom_struct ASC");
                                                        while ($rest = $restr->fetch()) {
                                                        ?>
                                                            <option value="<?= $rest['id_struct']; ?>"><?= $rest['nom_struct']; ?></option>
                                                        <?php } ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" name="avenue" required placeholder="Avenue">

                                            </div>

                                            <br>


                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" name="btn_submit" class="btn btn-primary">Enregistrer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>






                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include '../partials/_footer.php' ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->






    <!-- Vendor js -->
    <script src="script.js"></script>
    <script src="../assets/js/vendor.min.js"></script>

    <!-- Code Highlight js -->
    <script src="../assets/vendor/highlightjs/highlight.pack.min.js"></script>
    <script src="../assets/vendor/clipboard/clipboard.min.js"></script>
    <script src="../assets/js/hyper-syntax.js"></script>

    <!--  Select2 Plugin Js -->
    <script src="../assets/vendor/select2/js/select2.min.js"></script>

    <!-- Daterangepicker Plugin js -->
    <script src="../assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="../assets/vendor/daterangepicker/daterangepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin js -->
    <script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Bootstrap Timepicker Plugin js -->
    <script src="../assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

    <!-- Input Mask Plugin js -->
    <script src="../assets/vendor/jquery-mask-plugin/jquery.mask.min.js"></script>

    <!-- Bootstrap Touchspin Plugin js -->
    <script src="../assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Bootstrap Maxlength Plugin js -->
    <script src="../assets/vendor/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

    <!-- Typehead Plugin js -->
    <script src="../assets/vendor/handlebars/handlebars.min.js"></script>
    <script src="../assets/vendor/typeahead.js/typeahead.bundle.min.js"></script>

    <!-- Flatpickr Timepicker Plugin js -->
    <script src="../assets/vendor/flatpickr/flatpickr.min.js"></script>

    <!-- Typehead Demo js -->
    <script src="../assets/js/pages/demo.typehead.js"></script>

    <!-- Timepicker Demo js -->
    <script src="../assets/js/pages/demo.timepicker.js"></script>

    <!-- App js -->


    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>

    <!-- Code Highlight js -->
    <script src="../assets/vendor/highlightjs/highlight.pack.min.js"></script>
    <script src="../assets/vendor/clipboard/clipboard.min.js"></script>
    <script src="../assets/js/hyper-syntax.js"></script>

    <!-- Datatables js -->
    <script src="../assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="../assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
    <script src="../assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="../assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>




</body>



</html>
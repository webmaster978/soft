<?php
require '../config/database.php';
if (!isset($_SESSION['PROFILE']['id_utilisateur']) || $_SESSION['PROFILE']['designation'] != 'admin') {
    header('location:../login');
} else {
    $recup_informations = $db->prepare("SELECT * FROM fonction INNER JOIN tbl_agent ON fonction.id_fonction=tbl_agent.ref_fonction WHERE id_utilisateur=:id_utilisateur");
    $recup_informations->execute([
        'id_utilisateur' => $_SESSION['PROFILE']['id_utilisateur']
    ]);
    $user_infos = $recup_informations->fetch(PDO::FETCH_OBJ);
}




?>

<?php
if (isset($_POST['btn_res'])) {
    $resultat = htmlspecialchars($_POST['resultat']);
    $id_user = htmlspecialchars($_POST['id_user']);

    $ref_lab = $_SESSION['PROFILE']['id_utilisateur'];

    $consult = $db->prepare("UPDATE user_data SET resultat=:resultat,ref_lab=:ref_lab WHERE id_user=:id_user");
    $consult->execute(array(
        'resultat' => $resultat,
        'id_user' => $id_user,
        'ref_lab' => $_SESSION['PROFILE']['id_utilisateur']
        
    ));

    if ($consult) {
        echo 'valider';
    } else {
        echo 'err';
    }
}



?>



<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Users | Front - Admin &amp; Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/css/vendor.min.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="assets/css/theme.minc619.css?v=1.0">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>



    <link rel="preload" href="assets/css/theme.min.css" data-hs-appearance="default" as="style">
    <link rel="preload" href="assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

    <style data-hs-appearance-onload-styles>
        * {
            transition: unset !important;
        }

        body {
            opacity: 0;
        }
    </style>

    <!-- ONLY DEV -->

    <style>
        body {
            opacity: 0;
        }
    </style>

    <!-- END ONLY DEV -->

    <script>
        window.hs_config = {
            "autopath": "@@autopath",
            "deleteLine": "hs-builder:delete",
            "deleteLine:build": "hs-builder:build-delete",
            "deleteLine:dist": "hs-builder:dist-delete",
            "previewMode": false,
            "startPath": "/index.html",
            "vars": {
                "themeFont": "https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap",
                "version": "?v=1.0"
            },
            "layoutBuilder": {
                "extend": {
                    "switcherSupport": true
                },
                "header": {
                    "layoutMode": "default",
                    "containerMode": "container-fluid"
                },
                "sidebarLayout": "default"
            },
            "themeAppearance": {
                "layoutSkin": "default",
                "sidebarSkin": "default",
                "styles": {
                    "colors": {
                        "primary": "#377dff",
                        "transparent": "transparent",
                        "white": "#fff",
                        "dark": "132144",
                        "gray": {
                            "100": "#f9fafc",
                            "900": "#1e2022"
                        }
                    },
                    "font": "Inter"
                }
            },
            "languageDirection": {
                "lang": "en"
            },
            "skipFilesFromBundle": {
                "dist": ["assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "assets/js/demo.js"],
                "build": ["assets/css/theme.css", "assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js", "assets/js/demo.js", "assets/css/theme-dark.html", "assets/css/docs.css", "assets/vendor/icon-set/style.html", "assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.html", "assets/js/demo.js"]
            },
            "minifyCSSFiles": ["assets/css/theme.css", "assets/css/theme-dark.css"],
            "copyDependencies": {
                "dist": {
                    "*assets/js/theme-custom.js": ""
                },
                "build": {
                    "*assets/js/theme-custom.js": "",
                    "node_modules/bootstrap-icons/font/*fonts/**": "assets/css"
                }
            },
            "buildFolder": "",
            "replacePathsToCDN": {},
            "directoryNames": {
                "src": "./src",
                "dist": "./dist",
                "build": "./build"
            },
            "fileNames": {
                "dist": {
                    "js": "theme.min.js",
                    "css": "theme.min.css"
                },
                "build": {
                    "css": "theme.min.css",
                    "js": "theme.min.js",
                    "vendorCSS": "vendor.min.css",
                    "vendorJS": "vendor.min.js"
                }
            },
            "fileTypes": "jpg|png|svg|mp4|webm|ogv|json"
        }
        window.hs_config.gulpRGBA = (p1) => {
            const options = p1.split(',')
            const hex = options[0].toString()
            const transparent = options[1].toString()

            var c;
            if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
                c = hex.substring(1).split('');
                if (c.length == 3) {
                    c = [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c = '0x' + c.join('');
                return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',' + transparent + ')';
            }
            throw new Error('Bad Hex');
        }
        window.hs_config.gulpDarken = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = -parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
        window.hs_config.gulpLighten = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
    </script>
</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

    <script src="assets/js/hs.theme-appearance.js"></script>

    <script src="assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

    <!-- ========== HEADER ========== -->


    <?php include 'partials/_header.php' ?>

    <!-- ========== END HEADER ========== -->



    <!-- ========== MAIN CONTENT ========== -->
    <!-- Navbar Vertical -->

    <?php include 'partials/_aside.php' ?>

    <?php


    $id_fiche = $_GET['id_fiche'];



    $card = $db->prepare("SELECT * FROM fiches INNER JOIN patients ON fiches.ref_patient = patients.id_patient WHERE id_fiche=:id_fiche");
    $card->execute([
        'id_fiche' => $id_fiche
    ]);
    $carte = $card->fetch(PDO::FETCH_OBJ);






    ?>

    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Page Header -->

            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <!-- Card -->
                    <div class="card card-lg mb-5">
                        <div class="card-body">
                            <div class="row justify-content-lg-between">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../assets/img/logo/lg.png" alt="Logo">

                                    </div>
                                    <div class="col-md-8">
                                        <h1 style="font-size: 50px;" class=" text-primary">CLINIQUE NOTRE VIE</h1>
                                        <h1 class="text-center text-danger">CLINOVIE</h1>
                                    </div>

                                </div>
                                <!-- End Col -->

                                <div class="">
                                    <div>
                                        <h2 class="text-center">FICHE DE LABO</h2>

                                    </div>


                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->

                            <div class="row justify-content-md-between mb-3">
                                <div class="col-md">
                                    <h4>Nom & Post Nom & Prenom: <?= ucwords($carte->noms); ?> </h4>
                                    <h4>Sexe : <?= ucwords($carte->genre); ?> </h4>
                                    <h4>Date de naissance : <?= ucwords($carte->date_naiss); ?> // Age <?php
                                                                                                        $daten = $carte->date_naiss;
                                                                                                        $today = date("Y-m-d");
                                                                                                        $diff = date_diff(date_create($daten), date_create($today));
                                                                                                        echo $diff->format('%y');

                                                                                                        ?> An(s)</h4>
                                    <h4>Categorie : <?= ucwords($carte->categorie); ?> </h4>
                                    <h4>Personne a contacter : <?= ucwords($carte->nom_respo); ?> // <?= ucwords($carte->contact_respo); ?> </h4>


                                </div>
                                <!-- End Col -->

                                <div class="col-md text-md-end">
                                    <dl class="row">
                                        <dt class="col-sm-8">Num du dossier:</dt>
                                        <dd class="col-sm-4">00<?= ucwords($carte->id_fiche); ?></dd>
                                    </dl>

                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                            <h4 class="text-center">RESULTAT LABO</h4>

                            <!-- Table -->



                            <div>

                                <table class="table table-borderless table-thead-bordered text-center">
                                    <tr>
                                    
                                        <th>Examen a faire</th>
                                        <th>Resultat</th>
                                       
                                    </tr>
                                    <tbody>
                                        <?php
                                        $name = $_GET['id_fiche'];

                                        $requete = $db->query("SELECT * FROM user_data WHERE name=$name");
                                        while ($g = $requete->fetch()) {
                                        ?>

                                            <div class="modal fade" id="exampleModal<?= $g['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Completer le resultat de <?= $g['email']; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <textarea class="form-control" name="resultat" id="" cols="30" rows="10">

                                                                </textarea>
                                                        </div>
                                                        <input type="hidden" name="id_user" value="<?= $g['id_user']; ?>">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                                            <button type="submit" name="btn_res" class="btn btn-primary">Enregistrer</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <tr>
                                               
                                                <td><?= $g['email']; ?></td>
                                                <td><?= $g['resultat']; ?></td>
                                                
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <!-- End Table -->

                                <br>
                            </div>


                            <div>



                            </div>












                            <!-- End Row -->


                        </div>

                    </div>

                    <!-- End Card -->

                    <!-- Footer -->

                    <!-- End Footer -->
                </div>
            </div>

            <!-- Footer -->

            <?php include '../part/_foot.php' ?>

            <!-- End Footer -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ONLY DEV -->

    <!-- Builder -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBuilder" aria-labelledby="offcanvasBuilderLabel">
        <div class="offcanvas-header align-items-start">
            <div>
                <h3 id="offcanvasBuilderLabel">Front Builder</h3>
                <p class="mb-0">Customize the overview page layout.</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <h4 class="mb-1">Theme Appearance Mode</h4>
            <p>Check out all <a href="documentation/layout.html">Layout Options here</a></p>

            <div class="row gx-3">
                <!-- Check -->
                <div class="col-6">
                    <div class="form-check form-check-label-highlighter text-center">
                        <input type="radio" class="form-check-input" name="layoutSkinsRadio" id="layoutSkinsRadio1" checked value="default">
                        <label class="form-check-label mb-2" for="layoutSkinsRadio1">
                            <img class="form-check-img" src="assets/img/415x310/img1.jpg" alt="Image Description">
                        </label>
                        <span class="form-check-text">Default</span>
                    </div>
                </div>
                <!-- End Check -->

                <!-- Check -->
                <div class="col-6">
                    <div class="form-check form-check-label-highlighter text-center">
                        <input type="radio" class="form-check-input" name="layoutSkinsRadio" id="layoutSkinsRadio2" value="dark">
                        <label class="form-check-label mb-2" for="layoutSkinsRadio2">
                            <img class="form-check-img" src="assets/img/415x310/img2.jpg" alt="Image Description">
                        </label>
                        <span class="form-check-text">Dark Mode</span>
                    </div>
                </div>
                <!-- End Check -->
            </div>
            <!-- End Row -->

            <hr>

            <div class="row gx-3">
                <!-- Check -->
                <div class="col-6">
                    <div class="form-check form-check-label-highlighter text-center">
                        <input type="radio" class="form-check-input" name="layout" id="navbarLayoutSkinsRadio1" checked value="default">
                        <label class="form-check-label mb-2" for="navbarLayoutSkinsRadio1">
                            <img class="form-check-img" src="assets/svg/layouts-light/sidebar-default.svg" alt="Image Description" data-hs-theme-appearance="dark">
                            <img class="form-check-img" src="assets/svg/layouts/sidebar-default.svg" alt="Image Description" data-hs-theme-appearance="default">
                        </label>
                        <span class="form-check-text">Default</span>
                    </div>
                </div>
                <!-- End Check -->

                <!-- Check -->
                <div class="col-6">
                    <div class="form-check form-check-label-highlighter text-center">
                        <input type="radio" class="form-check-input" name="layout" id="navbarLayoutSkinsRadio2" value="navbar-dark">
                        <label class="form-check-label mb-2" for="navbarLayoutSkinsRadio2">
                            <img class="form-check-img" src="assets/svg/layouts-light/sidebar-dark.svg" alt="Image Description" data-hs-theme-appearance="dark">
                            <img class="form-check-img" src="assets/svg/layouts/sidebar-dark.svg" alt="Image Description" data-hs-theme-appearance="default">
                        </label>
                        <span class="form-check-text">Dark</span>
                    </div>
                </div>
                <!-- End Check -->
            </div>
            <!-- End Row -->

            <hr>

            <h4 class="mb-1">Sidebar Nav</h4>
            <p>Check out all <a href="#">Layout Options here</a></p>


            <!-- End Row -->

            <hr>

            <!-- Form Switch -->
            <label class="row form-check form-switch mb-3" for="builderFluidSwitch">
                <span class="col-10 ms-0">
                    <span class="d-block h4 mb-1">Header Layout Options</span>
                    <span class="d-block fs-5">Toggle to container-fluid layout</span>
                </span>
                <span class="col-2 text-end">
                    <input type="checkbox" class="form-check-input" id="builderFluidSwitch">
                </span>
            </label>
            <!-- End Form Switch -->


            <!-- End Row -->
        </div>

        <!-- Footer -->

        <!-- End Footer -->
    </div>

    <!-- End Builder -->

    <!-- Builder Toggle -->

    <!-- End Builder Toggle -->

    <div class="d-none js-build-layouts">
        <div class="js-build-layout-header-default">
            <!-- Single Header -->
            <header id="header" class="navbar navbar-expand-lg navbar-bordered bg-white  ">

            </header>

            <!-- End Single Header -->
        </div>
        <div class="js-build-layout-header-double">
            <!-- Double Header -->
            <header id="header" class="navbar navbar-expand-lg navbar-bordered navbar-spacer-y-0 flex-lg-column">



            </header>
            <!-- End Double Header -->
        </div>
    </div>

    <script src="assets/js/demo.js"></script>

    <!-- END ONLY DEV -->

    <!-- ========== SECONDARY CONTENTS ========== -->
    <!-- Keyboard Shortcuts -->

    <!-- End Keyboard Shortcuts -->

    <!-- Activity -->

    <!-- End Activity -->

    <!-- Welcome Message Modal -->


    <!-- End Welcome Message Modal -->

    <!-- Edit user -->

    <!-- End Edit user -->
    <!-- ========== END SECONDARY CONTENTS ========== -->

    <!-- JS Implementing Plugins -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- JS Front -->
    <script src="assets/js/theme.min.js"></script>


    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF DATATABLES
            // =======================================================
            HSCore.components.HSDatatables.init($('#datatable'), {
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        className: 'd-none'
                    },
                    {
                        extend: 'excel',
                        className: 'd-none'
                    },
                    {
                        extend: 'csv',
                        className: 'd-none'
                    },
                    {
                        extend: 'pdf',
                        className: 'd-none'
                    },
                    {
                        extend: 'print',
                        className: 'd-none'
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child input[type="checkbox"]',
                    classMap: {
                        checkAll: '#datatableCheckAll',
                        counter: '#datatableCounter',
                        counterInfo: '#datatableCounterInfo'
                    }
                },
                language: {
                    zeroRecords: `<div class="text-center p-4">
              <img class="mb-3" src="./assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="./assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
                }
            })

            const datatable = HSCore.components.HSDatatables.getItem(0)

            $('#export-copy').click(function() {
                datatable.button('.buttons-copy').trigger()
            });

            $('#export-excel').click(function() {
                datatable.button('.buttons-excel').trigger()
            });

            $('#export-csv').click(function() {
                datatable.button('.buttons-csv').trigger()
            });

            $('#export-pdf').click(function() {
                datatable.button('.buttons-pdf').trigger()
            });

            $('#export-print').click(function() {
                datatable.button('.buttons-print').trigger()
            });

            $('.js-datatable-filter').on('change', function() {
                var $this = $(this),
                    elVal = $this.val(),
                    targetColumnIndex = $this.data('target-column-index');

                if (elVal === 'null') elVal = ''

                datatable.column(targetColumnIndex).search(elVal).draw();
            });
        });
    </script>

    <!-- JS Plugins Init. -->
    <script>
        (function() {
            window.onload = function() {


                // INITIALIZATION OF NAVBAR VERTICAL ASIDE
                // =======================================================
                new HSSideNav('.js-navbar-vertical-aside').init()


                // INITIALIZATION OF FORM SEARCH
                // =======================================================
                new HSFormSearch('.js-form-search')


                // INITIALIZATION OF BOOTSTRAP DROPDOWN
                // =======================================================
                HSBsDropdown.init()


                // INITIALIZATION OF SELECT
                // =======================================================
                HSCore.components.HSTomSelect.init('.js-select')


                // INITIALIZATION OF INPUT MASK
                // =======================================================
                HSCore.components.HSMask.init('.js-input-mask')


                // INITIALIZATION OF NAV SCROLLER
                // =======================================================
                new HsNavScroller('.js-nav-scroller')


                // INITIALIZATION OF COUNTER
                // =======================================================
                new HSCounter('.js-counter')


                // INITIALIZATION OF TOGGLE PASSWORD
                // =======================================================
                new HSTogglePassword('.js-toggle-password')


                // INITIALIZATION OF FILE ATTACHMENT
                // =======================================================
                new HSFileAttach('.js-file-attach')
            }
        })()
    </script>

    <!-- Style Switcher JS -->

    <script>
        (function() {
            // STYLE SWITCHER
            // =======================================================
            const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
            const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

            // Function to set active style in the dorpdown menu and set icon for dropdown trigger
            const setActiveStyle = function() {
                $variants.forEach($item => {
                    if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
                        $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                        return $item.classList.add('active')
                    }

                    $item.classList.remove('active')
                })
            }

            // Add a click event to all items of the dropdown to set the style
            $variants.forEach(function($item) {
                $item.addEventListener('click', function() {
                    HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
                })
            })

            // Call the setActiveStyle on load page
            setActiveStyle()

            // Add event listener on change style to call the setActiveStyle function
            window.addEventListener('on-hs-appearance-change', function() {
                setActiveStyle()
            })
        })()
    </script>

    <script>
        (function() {
            window.onload = function() {


                // INITIALIZATION OF NAVBAR VERTICAL ASIDE
                // =======================================================
                new HSSideNav('.js-navbar-vertical-aside').init()


                // INITIALIZATION OF FORM SEARCH
                // =======================================================
                new HSFormSearch('.js-form-search')


                // INITIALIZATION OF BOOTSTRAP DROPDOWN
                // =======================================================
                HSBsDropdown.init()


                // INITIALIZATION OF SELECT
                // =======================================================
                HSCore.components.HSTomSelect.init('.js-select')


                // INITIALIZATION OF ADD FIELD
                // =======================================================
                new HSAddField('.js-add-field', {
                    addedField: field => {
                        HSCore.components.HSTomSelect.init(field.querySelector('.js-select-dynamic'))
                        HSCore.components.HSMask.init(field.querySelector('.js-input-mask'))
                    }
                })


                // INITIALIZATION OF INPUT MASK
                // =======================================================
                HSCore.components.HSMask.init('.js-input-mask')
            }
        })()
    </script>

    <script>
        $(document).ready(function() {
            var id = 1;
            /*Assigning id and class for tr and td tags for separation.*/
            $("#butsend").click(function() {
                var newid = id++;
                $("#table1").append('<tr valign="top" id="' + newid + '">\n\
    <td width="100px" >' + newid + '</td>\n\
    <td width="100px" class="name' + newid + '">' + $("#name").val() + '</td>\n\
    <td width="100px" class="email' + newid + '">' + $("#email").val() + '</td>\n\
    <td width="100px"><a href="javascript:void(0);" class="remCF">Supprimer</a></td>\n\ </tr>');
            });
            $("#table1").on('click', '.remCF', function() {
                $(this).parent().parent().remove();
            });
            /*crating new click event for save button*/
            $("#butsave").click(function() {
                var lastRowId = $('#table1 tr:last').attr("id"); /*finds id of the last row inside table*/
                var name = new Array();
                var email = new Array();
                for (var i = 1; i <= lastRowId; i++) {
                    name.push($("#" + i + " .name" + i).html()); /*pushing all the names listed in the table*/
                    email.push($("#" + i + " .email" + i).html()); /*pushing all the emails listed in the table*/
                }
                var sendName = JSON.stringify(name);
                var sendEmail = JSON.stringify(email);
                $.ajax({
                    url: "save.php",
                    type: "post",
                    data: {
                        name: sendName,
                        email: sendEmail
                    },
                    success: function(data) {
                        alert(data); /* alerts the response from php.*/
                    }
                });
            });
        });
    </script>

    <!-- End Style Switcher JS -->
</body>


</html>
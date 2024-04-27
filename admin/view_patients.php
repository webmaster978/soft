<?php
include '../config/data.php';
include '../config/base.php';




if (isset($_POST['btn_tri'])) {
    extract($_POST);

    $ref_patient = htmlspecialchars($_POST['ref_patient']);
    $date_t = htmlspecialchars($_POST['date_t']);
    $description = htmlspecialchars($_POST['description']);
    $status = 5;
    $ref_tri = $_SESSION['PROFILE']['id_utilisateur'];



    $check_query = "SELECT * FROM fiches
            WHERE ref_patient=:ref_patient AND status=:status
           ";
    $statement = $db->prepare($check_query);
    $check_data = array(
        ':ref_patient'   =>  $ref_patient,
        ':status' => $status

    );
    if ($statement->execute($check_data)) {
        if ($statement->rowCount() > 1) {
            echo "
                err existe
                ";
        } else {
            if ($statement->rowCount() == 0) {



                $reque = $db->prepare("INSERT INTO fiches (ref_patient,date_t,description,status,ref_tri) VALUES (:ref_patient,:date_t,:description,:status,:ref_tri) ");

                $result = $reque->execute(array(

                    'ref_patient' => $ref_patient,
                    'date_t' => $date_t,
                    'description' => $description,
                    'status' => $status,
                    'ref_tri' => $_SESSION['PROFILE']['id_utilisateur']

                ));
                if ($result) {
                    echo "
   valider
     ";
                } else {
                    echo "err";
                }
            }
        }
    }
}







$sql = "SELECT * FROM patients ORDER BY id_patient ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($g = $result->fetch_assoc()) {
?>










        <tr>
            <td class="table-column-pe-0">

                <?= $g['id_patient']; ?>


            </td>
            <td class="table-column-ps-0">
                <a class="d-flex align-items-center" href="#">
                    <div class="avatar avatar-circle">
                        <img class="avatar-img" src="../assets/img/prof/img.jpg" alt="Image Description">
                    </div>
                    <div class="ms-3">
                        <span class="d-block h5 text-inherit mb-0"><?= $g['noms']; ?><i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
                        <span class="d-block fs-5 text-body"><?= $g['contact']; ?></span>
                    </div>
                </a>
            </td>
            <td>
                <?= $g['adresse']; ?>
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
            <td><?= $g['categorie']; ?></td>
            <td>

                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"  data-bs-target="#exampleModalCenter<?= $g['id_patient']; ?>">
                    <i class="bi-pencil-fill me-1"></i> Triage
                </button>

            </td>
        </tr>
<?php
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
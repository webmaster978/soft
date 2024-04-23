<?php
include '../config/data.php';
$sql = "SELECT * FROM patients";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($g = $result->fetch_assoc()) {
?>




<div id="exampleModalCenter<?= $g['id_patient']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Etes vous sur de vouloir envoyer <?= $g['noms']; ?> Au triage?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="patients.php" method="POST">
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

                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter<?= $g['id_patient']; ?>">
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
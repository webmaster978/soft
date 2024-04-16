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


<?php require '../admin/_view.result.php' ?>
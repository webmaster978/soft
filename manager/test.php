<?php require '../config/database.php';
if(isset($_POST['submit'])){
  $ref_fiche = htmlspecialchars($_POST['ref_fiche']);
  $ref_examen = htmlspecialchars($_POST['ref_examen']);

  $exlab = $db->prepare("INSERT INTO examen_labo (ref_fiche,ref_examen) VALUES (:ref_fiche,:ref_examen)");

  $exlab->execute(array(
    'ref_fiche' => $ref_fiche,
    'ref_examen' => $ref_examen
  ));

  if($exlab){
    echo 'validate';
  } else {
    echo 'err';
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<form action="" method="post">
  <input type="text" name="ref_fiche">
  <input type="text" name="ref_examen">
  <br>
  <input type="text" name="ref_fiche">
  <input type="text" name="ref_examen">
  <input type="submit" name="submit" value="Enregistrer">
</form>

  
</body>
</html>
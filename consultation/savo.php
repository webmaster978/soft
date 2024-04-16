<?php
$ref_fiche = json_decode($_POST["ref_fiche"]);
$ref_med = json_decode($_POST["ref_med"]);
$categorie = json_decode($_POST["categorie"]);
$dosage = json_decode($_POST["dosage"]);
$posologie = json_decode($_POST["posologie"]);
$duree = json_decode($_POST["duree"]);
$con=mysqli_connect("localhost","root","","clin");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
for ($i = 0; $i < count($ref_med); $i++) {
if(($ref_med[$i] != "")){ /*not allowing empty values and the row which has been removed.*/
$sql="INSERT INTO ordonnance (ref_fiche, ref_med, categorie, dosage, posologie, duree)
VALUES
('$ref_fiche[$i]','$ref_med[$i]','$categorie[$i]','$dosage[$i]','$posologie[$i]','$duree[$i]')";
if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
}
}
Print "Ordonnance enregistrer avec success !";
mysqli_close($con);

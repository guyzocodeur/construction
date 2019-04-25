<?php 
require "../database.php";
if (isset($_POST)) {
	$nom = verifyInput($_POST['nom']);
	$prenom = verifyInput($_POST['prenom']);
	$phone = verifyInput($_POST['phone']);
	$password = verifyInput($_POST['password']);
	$email = verifyInput($_POST['email']);
	$duree = verifyInput($_POST['duree']);
	$maison = verifyInput($_POST['maison']);

}
$db = Database::connect();
$insert = $db->prepare("INSERT INTO location(nom_location, prenom_location, phone_location, duree_location, codeSecret_location, email_location,maison_location) VALUES (?,?,?,?,?,?,?)");
$insert->execute(array($nom,$prenom,$phone,$duree,$password,$email,$maison));
Database::disconnect();
header("location:../sign.php");
function verifyInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

 ?>
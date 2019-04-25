<?php 
require "../database.php";
if (isset($_POST)) {
	$name = verifyInput($_POST['name']);
	$firstname = verifyInput($_POST['firstname']);
	$ville = verifyInput($_POST['ville']);
	$maisonVoulue = verifyInput($_POST['maisonVoulue']);
	$delai = verifyInput($_POST['delai']);
	$budget = verifyInput($_POST['budget']);
	$email = verifyInput($_POST['email']);

}
$db = Database::connect();
$insert = $db->prepare("INSERT INTO contact(nom_contact, prenom_contact, ville_contact, maisonVoulue_contact, delaiConstruction_contact, budget_contact, email_contact) VALUES (?,?,?,?,?,?,?)");
$insert->execute(array($name,$firstname,$ville,$maisonVoulue,$delai,$budget,$email));
Database::disconnect();
header("location:../index.html");
function verifyInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

 ?>
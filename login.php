<?php 
session_start();
require 'connecttodb.php';
 //$ln= mysqli_real_escape_string($conne,$_POST['ln']); for safety
 $nom= $_POST['nom'];
 $prenom= $_POST['prenom'];
 $pwd= $_POST['pwd'];
 $email= $_POST['email'];
 $login= $_POST['login'];
 $tel= $_POST['tel'];
 $dateN= $_POST['dateN'];
 $poste=$_POST['poste'];
 $date=date('Y-m-d');
  
if(!empty($nom) and !empty($prenom) and !empty($pwd) and !empty($email) and !empty($dateN) and !empty($login) ){

$sql="INSERT INTO employees( nom, prenom, login, password, email, tel, dateNaissance , dateInscription , poste) 
VALUES ('$nom','$prenom','$login','$pwd','$email','$tel','$dateN','$date','$poste')";
$req=mysqli_query($con,$sql);
if($req==true){

$_SESSION['idEmp']=mysqli_insert_id($con); 
$_SESSION['avatar']='images/125x125.gif';
$_SESSION['backImage']='images/125x125.gif';
} 

  else{
      echo"connection failed ";  
    die;}

header("Location: profileEmp.php?idP={$_SESSION['idEmp']}");
  
echo"{$_SESSION['idEmp']}";
 }
else { header("Location: userloged.php?Emp=anonym");}


?>





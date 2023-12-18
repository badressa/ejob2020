<?php

session_start();
include'connecttodb.php';
$q = $_REQUEST["q"];

if(isset($_GET['commenter'])){
    echo'hat icomenta';
                  if(!empty($_GET['comment'])){
                      echo'hat ikchm ahanou';
                      $dt=date('Y-m-d');
                      $cmt=$_GET['comment'];
                      $idE=$_SESSION['idEmp'];
                      $sql ="INSERT INTO `avis`( `avis`, `datePublication`, `idEmployee`, `idEntreprise`) VALUES ('$cmt','$dt','$idE','$q')";
                       $req =mysqli_query($con,$sql);
                       if($req!==true){
                         echo"<h1>conn failed</h1>";
                       }
                  }
              } 

              ?>
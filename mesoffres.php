<?php
session_start();
include_once "connecttodb.php"; 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/ionicons.min.css">
    <link rel="stylesheet" href="maincss/Footer-Dark.css">
    <link rel="stylesheet" href="maincss/styles.css">
    <link rel="stylesheet" href="maincss/profile.css">
    
    <link rel="stylesheet" href="maincss/mainico.css">
	  <link rel="stylesheet" href="chart/chart.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">

</head>

<body >








<?php 



include 'navr.php';


if(isset($_GET['accDem'])){
    $idDem =$_GET['accDem'];
    $sql="UPDATE `demande` SET `etat`=1 WHERE  idDemande=$idDem";
    mysqli_query($con,$sql);
   }
   if(isset($_GET['desaccDem'])){
    $idDem =$_GET['desaccDem'];
    $sql="UPDATE `demande` SET `etat`=0 WHERE  idDemande=$idDem";
    mysqli_query($con,$sql);


   }
   if(isset($_GET['supDem'])){
    $idDem =$_GET['supDem'];
    $sql="DELETE FROM `demande`  WHERE  idDemande=$idDem ";
    mysqli_query($con,$sql);
   }




echo"
    
     <div class='container'>
     
              <div class='card-header py-3'>
              <h2 class='m-auto font-weight-bold text-primary' style='text-align: center;padding:2em;'>Postule de mes offres</h2>
              </div>";
           


           

if(isset($_SESSION['idEnt'])){
              echo"
               
             
              <table class='table'>
              <thead class='thead' style='background: aliceblue;'>
                <tr>
                             
                             <th scope='col'> email</th>
                             <th scope='col'>tel</th>
                             <th scope='col'>message</th>
                             <th scope='col'>poste</th>
                             <th scope='col'>Acc..offre/Sup..offre</th>

                           </tr>
                         </thead>
                         <tbody>";
                         $sql="SELECT idDemande,email,tel, message,o.poste poste,d.etat etat,d.idEmployee ,o.idEntreprise FROM offres o INNER JOIN demande d on o.idOffre=d.idOffre INNER JOIN employees e ON d.idEmployee=e.idEmployee where idEntreprise={$_SESSION['idEnt']} LIMIT 5 ;";
                 
                            $result =mysqli_query($con,$sql);
                           $resultCheck=mysqli_num_rows($result);
                           if($resultCheck!=0){
                             while($act=mysqli_fetch_assoc($result)){
                            echo"     
                          <tr>
                           
                            
                            <td>{$act['email']}</td>
                            <th >{$act['tel']}</th>
                            <td> {$act['message']}</td>
                            <td>  {$act['poste']}</td>
                            

                            <td style='min-width: 10em;'>  

                  
                                  <a class='btn btn-danger 'class='btn btn-warning btn-block' href='mesoffres.php?supDem={$act['idDemande']}'  style='color:white;font-size:1em;float: right;width: 4em;'>
                                  <i class='fa fa-trash' aria-hidden='true'></i>
                                  </a>
                                  ";
                                  if($act['etat']==0)
                                  echo"
                                  <a class='btn btn-success ' href='mesoffres.php?accDem={$act['idDemande']}'  style='color: white;font-size:1em;float: left;width: 4em;'>
                                  <i class='fa fa-check' aria-hidden='true'></i> 
                                  </a>";
                                  else
                                  echo"
                                  <a class='btn  ' href='mesoffres.php?desaccDem={$act['idDemande']}'   style='background: rebeccapurple;font-size:1em;float: left;width: 4em;'>
                                  <i class='fa fa-window-close' style='color:white' aria-hidden='true'></i> 
                                  </a>";
                            


                           echo" </td>
                        
                            
                          </tr>
                          ";}
                           }

                     
                           
                         echo"  
                         </tbody>
                   </table>
                   <nav aria-label='Page navigation example'>
                   <ul class='pagination'>
                     <li class='page-item'><a class='page-link' href='#'>Previous</a></li>
                     <li class='page-item'><a class='page-link' href='#'>1</a></li>
                     
                     <li class='page-item'><a class='page-link' href='#'>Next</a></li>
                   </ul>
                 </nav>
                 </div>
                   
                   ";}
                 

                  ?>




<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src='chart/chart.min.js'></script>
  <script src='mainchart.js'></script>
  <script src="navslide.js"></script>
  <script src='get.js'> </script>
  <script src='myPiechart.js'></script>
</body>

</html>
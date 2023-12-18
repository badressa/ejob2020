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




                 include 'nav.php';
                 


    if (isset($_SESSION['idEmp'])){


      if(isset($_GET['supDem'])){
        $idDem =$_GET['supDem'];
        $sql="DELETE FROM `demande`  WHERE  idDemande=$idDem ";
        mysqli_query($con,$sql);
       }


    $sql="SELECT d.idDemande idDemande,message ,poste,siegeSocial,d.etat FROM demande d NATURAL JOIN offres o LEFT JOIN entreprises e on o.idEntreprise = e.idEntreprise WHERE idEmployee={$_SESSION['idEmp']}";


    

       
                  $result =mysqli_query($con,$sql);
                 $resultCheck=mysqli_num_rows($result);
                 if($resultCheck!=0){

                  echo"



<div class='container' style='min-height: 37em;'>


<h4 style='    padding: 2em;text-align: center;'> Mes demandes</h4>
    <table class='table' style='margin-top: 4em;'>
               <thead class='thead-dark'>
                 <tr>
                   
                  
                   <th scope='col'>reseauSociale</th>
                   <th scope='col'>poste</th>
                   <th scope='col'>message</th>
                   <th scope='col'>supprimer </th>

                   <th scope='col'>etat</th>

                 </tr>
               </thead>
               <tbody>";
                   while($act=mysqli_fetch_assoc($result)){
                   
                      echo"     
                      <tr>
                       
                        
                        <td> {$act['siegeSocial']}</td>
                        <th scope='row'>{$act['poste']} </th>
                        <td>{$act['message']} </td>
                     
                        
      
                        <td>  
                              <a class='btn btn-danger btn-block'class='btn btn-warning btn-block' href='mesdemandes.php?supDem={$act['idDemande']}' style='color:white;font-size:1em;'>Sup x</a>
                              </td>
                    
                        
                      </td>
                      ";
                      echo"<td>";
                      if($act['etat']==0)
                                  echo"
                                  
                                  <i class='fa fa-check' aria-hidden='true'></i> 
                                  ";
                                  else
                                  echo"
                                  
                                  <i class='fa fa-window-close' style='color:white' aria-hidden='true'></i> 
                                  ";
                      echo"</td>";            



                    
                  }
                 }

           
                 
               echo"  
               </tbody>
         </table>
         
         </div>
         
         ";


    }



 include 'footer.php';
       
    
    



?>
<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
	<script src='chart/chart.min.js'></script>
	<script src='mainchart.js'></script>
  <script src='get.js'> </script>
  <script src='myPiechart.js'></script>
</body>

</html>
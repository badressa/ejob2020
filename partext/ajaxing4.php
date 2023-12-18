<?php session_start();
include'../connecttodb.php';
$q = $_REQUEST["q"];
?>
<div class="full-background first-contai" style="">
    <div class="container" >
      <div class="jobas-body">
<h4 style="color: #333333; font-weight: bold; margin-bottom: 20px;margin-top: 10px;">les emplois   </h4>
<?php
$sql2="SELECT * FROM offres WHERE idEntreprise =$q  ORDER BY dateDebut desc ";
                
                $req2=mysqli_query($con,$sql2);
                     if (mysqli_num_rows($req2)==0) {
                       echo "<p class=vide style='   
                        border: 1px solid #f1a1a1;
    padding-left: 10px;
    height: 30px;
    width: 80%;
    background: #f7d3d9;
    color: #fb5a5a; 
    '>Il ya aucun resultat pour votre recherche !</p>";
                     }
                     else{
                           while ($off=mysqli_fetch_array($req2)) {
                           	$sqlv="SELECT * FROM ville WHERE idVille='{$off['idVille']}' ";
                           	$reqv=mysqli_query($con,$sqlv);
                           	$ville=mysqli_fetch_array($reqv);
                           	$description= strlen($off['description']) > 50 ? substr($off['description'],0,100)."..." : $off['description'];
                           
                       echo "
                    <div class='row job-item '>
                                 <h5 >{$off['poste']}  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp</h5>
                              <div class='col-sm-8 detail-con'>
                                       <a  class='text-white'>Nouveau</a>
                                       <p>
                                       {$description}
                                       </p>
                               </div>
                                <div class='col-sm-4 icon-con'>

                                   <div class='duo-icons'>
                                     <span> <i class='fas fa-map-marker-alt'></i> {$ville['nomVille']} </span>
                                     <span class='salair-span'><i class='fas fa fa-euro'></i> {$off['Salaire']} dh </span>
                                   </div>
                          
                                   <div class='postuler-con'>
                                      <a href='offre.php?idoffre={$off['idOffre']}' > <i class='fa fa-paper-plane ' ></i>postuler a cet offre</a>
                                   </div>
                               </div>
                    </div>";

                           }
                           }
                          

?>
</div></div></div>
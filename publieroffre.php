<?php
session_start();
include 'connecttodb.php';

         
         if(isset($_GET['dec'])){
          // remove all session variables
          session_unset();
     
          // destroy the session
          session_destroy();
     
         header("Location: accueil.php") ;
         
     }
     ?>

<!--html-------------->
<!--html-------------->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>acceil recruteure-publier une annonce</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/ionicons.min.css">
    <link rel="stylesheet" href="maincss/Footer-Dark.css">
    <link rel="stylesheet" href="maincss/accrecrut.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="icon" type="image/png" href="icon.png">

</head>

<body >
   <nav class="navbar navbar-expand-md  navbar-light nv-w bg-dark ">
          <a class="navbar-brand nav-item1" href="#"    >
        <img src='logoetude1.png'/>              
        </a>
        
        
        <button class="navbar-toggler nav-item2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse nav-item4" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item  navpad">
              <a class="nav-link first " href="accueilrecruteure.php">Accueil recruteure</a>
            </li>
            <li class="nav-item  active navpad ">
              <a class="nav-link " href="publieroffre.php">Publier un offre</a>
            </li>
            
            
            
          </ul>
         
        </div>
      
      <?php if(isset($_SESSION['idEmp']) || isset($_SESSION['idEnt'])){
          echo"<div class='col-md-2 iprof '>  

         
                <ul class='navbar-nav ' style='float:right'>
                
             <li class='nav-item dropdown '>
               <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown' style='.dropdown-toggle::after{
                display: none;
              }'>
                <img  src='{$_SESSION['avatar']}' style='border-radius:100%;width:2em;;height:2em;float:right;' class='media-object' >
                 
               </a>
               <div class='dropdown-menu' style=' position: absolute;
                                                  left: -137px;
                                                  top: 20px;'>
                 
";

           IF(isset($_SESSION['idEmp']))
                 echo"
                 <a class='dropdown-item' href='profileEmp.php'>profile</a>
                 <a class='dropdown-item' href='mesdemandes.php'>Mes demandes</a>
                    ";
           
           IF(isset($_SESSION['idEnt']))
                 echo"
                 <a class='dropdown-item' href='profileEntr.php'>profile</a>
                 <a class='dropdown-item' href='mesoffres.php'>Mes offres</a>
                    ";
                 echo"
                 <a class='dropdown-item' href='?dec=oui'>  Deconexion</a>
           
               </div>
             </li>
               
           </ul>

        </div>
             <style>
                @media screen and (max-width: 765px) {
                  .iprof{width: 5em;
                    order: 3;}
                    
                }

        
              </style>
             ";
        }
        else{

          echo'
          <button class="navbar-toggler nav-item2" type="button" data-toggle="collapse" data-target="#login" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-user  " aria-hidden="true"></i>
        </button>
      
        
         
        </div>

        <div class="d-md-block collapse navbar-collapse " id="login" style="order:5;
      flex-direction: row-reverse;">
       
        <ul class=" nbar-nav navbar-nav  nav-item3 " style="display: inline-flex; float: right;">
          <li class="nav-item navp ad ft-blue ft-blue topright">
            
            <a class="" href="userlogedEntr.php">se connecter</a>
          </li>
        
      </ul>


          
          
          ';
         /* echo' <i class="fas fa-sign-in-alt  " aria-hidden="true"></i>
      <div class="d-none d-md-block">
       
        <ul class=" nbar-nav navbar-nav  nav-item3 " style="display: inline-flex;">
          <li class="nav-item navpad ft-blue">
            <a onclick="getLogin(0)" class=" " href="#">se connecter</a>
          </li>
          <li class="nav-item ft-blue topright ">
           <a  onclick="getLogin(1)" class=" " href="#">s\'inscrire</a>
          </li>
      </ul>
        </div>';*/}
        ?>
 </nav>
 <?php

if(isset($_SESSION['idEnt'])){
  if(isset($_GET['ajoutO'])){
      $dateD=date('Y-m-d');
      $sql="INSERT INTO `offres`( `poste`, `description`, `dateDebut`, `dateFin`, `Salaire`, `idEntreprise`, `idVille`, `idSecteur`) 
      VALUES ('{$_GET['poste']}','{$_GET['description']}','$dateD','{$_GET['dateFin']}','{$_GET['salaire']}',{$_SESSION['idEmp']}  ,'{$_GET['ville']}','{$_GET['secteur']}')";
      mysqli_query($con,$sql);
  }

           echo"  <div class='container'>     

             
             
    <h2 style='text-align:center;color: #333333; font-weight:bold;' class='mt-5'>Ajout une offre </h2>
    <form method='get' action=''>
    <div class='row mt-4 mb-4' style=''>
      <div class='col-md-6'>
        <div class='form-group'>
          <label for='first' style='color: #366bc1;'>Poste</label>
          <input type='text' name='poste' class='form-control' placeholder='Poste' id='first'>
        </div>
      </div>
      
      <div class='col-md-6'>
        <div class='form-group'>
          <label for='second' style='color: #366bc1;'>Salaire</label>
          <input type='number' name='salaire' class='form-control' placeholder='Salaire' id='second'>
        </div>
      </div>


      
      
    </div>


    <div class='row mt-4 mb-4'  style=''>
      <div class='col-md-4'>
            <div class='form-group'>
              <label for='exampleFormControlSelect1' style='color: #366bc1;'>Ville</label>
              <select class='form-control' name='ville' id='exampleFormControlSelect1'>
              ";
               
               $sql="SELECT * FROM ville";
               $req=mysqli_query($con,$sql);
               echo"<option disabled selected value>--selectionner une ville--</option>";
               while($t=mysqli_fetch_assoc($req)){
                   echo"<option value='{$t['idVille']}'>{$t['nomVille']}</option>";
               }
               
               
                echo"
              </select>
            </div>
     </div>
     <div class='col-md-4'>
            <div class='form-group'>
              <label for='exampleFormControlSelect1' style='color: #366bc1;'>Secteur</label>
              <select class='form-control' name='secteur' id='exampleFormControlSelect1'>
               ";
               
               $sql="SELECT * FROM secteur";
               $req=mysqli_query($con,$sql);
               echo"<option disabled selected value>--selectionner un secteur--</option>";
               while($t=mysqli_fetch_assoc($req)){
                   echo"<option value='{$t['idSecteur']}'>{$t['libelle']}</option>";
               }
               
               
                echo"
              </select>
            </div>
     </div>

     <div class='col-md-4'>
        <div class='form-group'>
          <label for='last' style='color: #366bc1;'>Date de fin</label>
          <input type='date' name='dateFin' class='form-control' placeholder='' id='last'>
        </div>
      </div>
     
      
    
    </div>



    
           <div class='form-group mt-4 mb-4'  style=''>
             <label for='exampleFormControlTextarea1' style='color: #366bc1;'>Description</label>
             <textarea class='form-control' name='description' id='exampleFormControlTextarea1' rows='3'></textarea>
           </div>                                 

    
           <div class='mb-5'  style='pl-3'>
              <button name='ajoutO' type='submit' class='btn btn-primary '>ajouter une offre</button>
           </div>
  </form>

</div>";}?>




<!--footer-->


    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Créer votre cv</a></li>
                            <li><a href="#">Chercher un emploi</a></li>
                            <li><a href="#">Chercher des entreprise</a></li>
                            <li><a href="#">Savoir l'actulités d'emploi</a></li>

                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>categories des offerse</h3>
                        <ul>
            <?php
         $sql6="SELECT * FROM secteur";
        $req6=mysqli_query($con,$sql6);
                           while ($sect=mysqli_fetch_array($req6)) {
                      
                            echo"
                            <li id='inlist'><a href='recherche.php?idsecteur={$sect['idSecteur']}'>{$sect['libelle']}</a></li>
                            ";
                            
                        }


                  ?>
                         
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>JobDoor</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p> 
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                
            </div>
        </footer>
    </div>
    <div class="copyright "><p class="">jobdoor © 2020 all rights reserved</p></div>

    
    
    
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
</body>

</html>
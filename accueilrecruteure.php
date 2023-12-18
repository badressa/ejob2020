
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
    <title>acceil recruteure</title>
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
            <li class="nav-item active navpad">
              <a class="nav-link first " href="#">Accueil recruteure</a>
            </li>
            <li class="nav-item navpad ">
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
      

      <!--premierepart inscrir pur entreprise-->
<div class="container" >
<div class="  row picpluscom mt-5 mb-5">

    <div class="col-md-6 pic-container">
<?php 
if (isset($_SESSION['idEnt'])) {
  echo "
<h4 style='color: #333333;'' class='mb-3'>Embaucher plus rapidement</h4>

<p>
Gagnez du temps et des efforts dans votre parcours d'embauche.
Trouver la meilleure solution pour le poste ne doit pas être un travail à plein temps. Les outils simples et puissants de jobdoor vous permettent de rechercher, de filtrer et d'embaucher plus rapidement.
</p>

  ";
}
else{
  echo "
<h4 style='color: #333333;' class='mb-3'>Qréer votre compte</h4>
         
         <form method='post' action='profileEntr.php'>

         

           <div class='row'>
            <div class='col-md-6'>
  <div class='form-group'>
    <label for='exampleFormControlInput1'>Réseau social</label>
    <input type='text' name='reseau' class='form-control' placeholder='google'>
    
  </div>
          </div>
          
 <div class='col-md-6'>
  <div class='form-group'>
    <label for='exampleFormControlInput1'>Siege social</label>
    <input type='text' name='siege' class='form-control' placeholder='rabat'>
    
  </div>
          </div>
          </div>

           <div class='row'>
            <div class='col-md-6'>
  <div class='form-group'>
    <label for='exampleFormControlInput1'>Chiffre d'affaire</label>
    <input type='text' name='chiffre' class='form-control' placeholder='299 000 DH'>
    
  </div>
          </div>
          
 <div class='col-md-6'>
  <div class='form-group'>
    <label for='exampleFormControlInput1'>Nombre d'emploiyées</label>
    <input type='text' name='nombre' class='form-control' placeholder='300'>
    
  </div>
          </div>
          </div>
        
  <div class='row'>
            <div class='col-md-6'>
  <div class='form-group'>
    <label for='exampleFormControlInput1'>Login</label>
    <input type='text' name='login' class='form-control' placeholder='google1'>
    
  </div>
          </div>
          
 <div class='col-md-6'>
  <div class='form-group'>
    <label for='exampleFormControlInput1'>Mot de pass</label>
    <input type='text' name='mp' class='form-control' placeholder='google1234'>
    
  </div>
          </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
    <div class='form-group'>
    
    <input type='text' name='domaine' class='form-control' placeholder='Domaine d'activité'>
    
  </div>
</div>

            <div class='col-md-6'>

   <div class='form-group' style='text-align: -webkit-center;'>
    <input style='border-color: #c9515b;background-color: #154396; color: #fff; ' type='submit' name='ok' value='valider' class='form-control' >
  </div>
</div>
</div>
</form>

  ";
}
?>
       


    </div>

    <div class="col-md-6 slide-con">
     <img src="images/salle.jpg" style="width: 100%">
     </div>
 </div>
</div>
<!-- three coloms---->

  <div class="full-background pt-5" style="background-color: #f9f9f9;">
<div class="container container3" style="background-color: #f9f9f9;">
<!--div class="container  avantage" -->
<div class="row" >
          
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 justify-content-center text-center">
            <div class="unit-4 justify-content-center text-center">
              <div class="unit-4-icon "><img src="images/cvv.png" style="width: 50%;margin: auto;"></div>
              <div class="">
                <h4 class="mt-3 mb-3">Meilleurs talents</h4>
                <p>chaque mois des millions de condidats visitent Jobdoor pour trouver un emploi   </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 justify-content-center text-center">
            <div class="unit-4 justify-content-center text-center">
              <div class="unit-4-icon "><img src="images/cv1.png" style="width: 50%;margin: auto;"></div>
              <div>
                <h4 class="mt-3 mb-3">Service de qualite</h4>
                <p>Jobdoor est utilise par des million d'entreprise qui font confiance a notre service</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 justify-content-center text-center">
            <div class="unit-4 justify-content-center text-center">
              <div class="unit-4-icon "><img src="images/about.png" style="width: 50%;margin: auto;"></div>
              <div>
               <h4 class="mt-3 mb-3">Site responsive </h4>
                <p>Publiez votre annonce sur Indeed, et recevez des candidatures envoyées depuis tout appareil mobile.</p>
              </div>
            </div>
          </div>
          </div>

        </div>

</div>
<!--the end of three cilums-->
   <div class="full-background" style="background-color: white;">
<div class="container container3">
<div class="carousel-container ">

  <header class="">
    <span class="comment">Jobdoor votre porte vers les talents</span>
   
  </header>
</div>

<div class="  row picpluscom ">

    <div class="col-md-6 pic-container">
      <img src="images/connect.png" style="width: 100%">
    </div>

    <div class="col-md-6 slide-con pt-5 pb-8">
      <h5 style="font-weight: bold;">Soyer visible</h5>
      <p style="font-size: 20px; color:gray;">
        Soyez visible auprès d'un maximum de candidats dès aujourd'hui.
Publiez vos annonces pour attirer les meilleurs talents depuis tout appareil.

Créez un compte et renseignez la description de votre emploi. Examinez les candidatures reçues.</p>
    </div>
</div>

  </div>
</div>





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

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
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>actualite</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/ionicons.min.css">
    <link rel="stylesheet" href="maincss/Footer-Dark.css">
    <link rel="stylesheet" href="maincss/actual.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="icon" type="image/png" href="icon.png">

</head>

<body >
    <nav class="navbar navbar-expand-md  navbar-light nv-w ">
          <a class="navbar-brand nav-item1" href="#"    >
        <img src='logoetude.png'/>              
        </a>
        
        
        <button class="navbar-toggler nav-item2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse nav-item4" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item  navpad">
              <a class="nav-link first " href="Accueil.php">Accueil</a>
            </li>
            <li class="nav-item  navpad ">
              <a class="nav-link " href="accueil.php#of">offres d'emploi</a>
            </li>
            <li class="nav-item navpad">
              <a class="nav-link" href="about.php">à propos</a>
            </li>

            <li class="nav-item navpad"  >
                <a class="nav-link" href="accueilrecruteure.php">accueil Recruteure
              </a>
             </li>
            
            
          </ul>
        </div>
        <?php 
        if(isset($_SESSION['idEmp'])){
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
                 <a class='dropdown-item' href='profileEnt.php'>profile</a>
                 <a class='dropdown-item' href='mesoffres'>Mes offres</a>
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
          <li class="nav-item navpad ft-blue">
            <a onclick="getLogin(0)" href="#">se connecter</a>
          </li>
          <li class="nav-item ft-blue topright ">
           <a  onclick="getLogin(1)"  href="#">s\'inscrire</a>
           
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

      <!--requetedes villes-->

       
      
      


<?php

   if (isset($_GET['idactualite'])) {
     $sql="SELECT * FROM actualite where idActualite={$_GET['idactualite']} ";
   }
   $req=mysqli_query($con,$sql);
   $offre=mysqli_fetch_array($req);
echo "
    <div class='cvrbg-jb'>
        <div class='cvr-lr container-fluid ''> 
           <h1 class='cvr-h '>L'actualite d'emploi</h1>
           <h4 class='first-title ' > Jobdoor votre site qui vous connecte avac votre entourage d'emploi</h4>
                
       </div>
                           
    </div>";
?>
   
           
         




<div class="full-background first-contai" style="background-color: #f2f2f4;">
    <div class="container" >


            <div class="second-tit ">
            
            </div>

    <div class='row ' >
         <div class=" col-md-9 jobs" id="of" >

              <!---selection des  nouveaux offres----->
<?php
               echo "<div class='jobas-body '>
                	<h4 class='mb-3'>{$offre['titre']}</h4>
                  <span >Publier le : {$offre['dateDebut']} </span>&nbsp &nbsp &nbsp <span>Genre : {$offre['genre']} </span>
                  <br>
                   <img src='{$offre['image']} ' >
                 <p>{$offre['description']}</p>
                
             
              </div>
              ";

    ?>
              
         </div>


         <div class="col-md-3   right-side"   >
        <?php
         $req3=mysqli_query($con,"select * from actualite order by dateDebut desc limit 0,5");
              while($actual=mysqli_fetch_array($req3))
              {
             echo "
            <div class=' cv-content' >
             
                <div class='card-body'>
                  <img src='{$actual['image']}' >
                  <a href='actualite.php?idactualite={$actual['idActualite']}'><h6>{$actual['titre']}</h6></a>
                </div>
             
              </div>";
            }
            ?>
              
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
                        <p>Jobdoor est un site d'emploi, . jobdoor est actuellement disponible au maroc, 

Ce site est un exemple de recherche verticale, à sujet unique. jobdoor indexe les offres d'emploi publiées . Les chercheurs d'emploi  soumettent  leurs candidatures directement sur jobdoor, ils ont accès à une liste des offres  qui correspondent aux critères de leur recherche. Les candidats parcourent les listes de postes proposés et décident aux quels poser leur candidature. Pour affiner leurs recherches, les chercheurs d'emploi disposent d'un macro-langage avancé .</p> 
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                
            </div>
        </footer>
    </div>
    <div class="copyright "><p class="">jobdoor © 2020 all rights reserved</p></div>

    
     <div id='loginup'  style="top: 0;
left: 0;
position: fixed;
width: 100vw;
height: 100vh;
z-index: 1000;
background: rgba(0,40,80,0.5);
 display: none;" >
<div class="login-clean" >
  
  <form method="post" action="confirmation.php" id='connecter' style="position: relative;">
    <div style="color: red;
    font-size: 2em;
    position: absolute;
    right: 0em;
    top: 0em;
    line-height: 15px;
    cursor: default;
    padding: 5px;" onclick="delLogin()"> x</div>
      <h2 class="sr">Connecter ....</h2>
      <div class="illustration"><img src="logoetude.png" alt="" style='width: 150px;'></div>
      <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
      <?php if(isset($_SESSION['user']) &&  $_SESSION['user']==0 && isset($_GET['signup']) ) echo"email  Incorrect " ;  ?>
      <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
      <?php if( isset($_SESSION['pwduser'])  and $_SESSION['pwduser']==0 and isset($_GET['signup']) ) echo"password Incorrect {$_SESSION['pwduser']}";  ?>

      <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name='connecter'>Log In</button></div>
      <a href="#" class="forgot">Forgot your email or password?</a>
    </form>
 
 
 
 
 
 
    <form method="post" action="login.php"  id='inscrire' style="position: relative;">
        <div style="color: red;
        font-size: 2em;
        position: absolute;
        right: 0em;
        top: 0em;
        line-height: 15px;
        cursor: default;
        padding: 5px;" onclick="delLogin()"> x</div>
          <h2 class="sr">Inscrire ....</h2>
          <div class="illustration"><img src="logoetude.png" alt="" style='width: 150px;'></div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ecrevez votre email" name='email'>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ecrivez votre login" name='login'>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="ecrivez votre nom" name='nom'>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="ecrivez votre prenom" name='prenom'>
              </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="ecrivez votre password" name='pwd'>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" placeholder="ecrivez votre date naissance " name='dateN'>
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ecrivez votre Phone Number *" name='tel'>
            </div>
              <div class="form-group">
                  <input type="text" class="form-control" placeholder="ecrivez votre poste" name='poste'>
              </div>
          </div>
          
        </div>
        <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name='inscrire'>Inscrire</button></div>
    </div>
        </form>  
        
        
</div>
<style>          
.contact-clean form .btn:active,.login-clean form .btn-primary:active{
  transform:translateY(1px)}
.contact-clean{background:#f1f7fc;
padding:80px 0}

.sr{
  font-size: 1em;
}
.contact-clean .form-group:last-child{margin-bottom:5px}
.contact-clean form .form-control{background:#fff;border-radius:2px;box-shadow:1px 1px 1px rgba(0,0,0,.05);outline:0;color:inherit;padding-left:12px;height:42px}

.contact-clean form textarea.form-control{min-height:100px;max-height:260px;padding-top:10px;resize:vertical}
.contact-clean form .btn:hover{opacity:1}
.login-clean{padding:80px 0}

.login-clean form{max-width:200px;width:90%;margin:0 auto;background-color:#fff;padding:40px;border-radius:4px;color:#505e6c;box-shadow:1px 1px 5px rgba(0,0,0,.1)}
.login-clean #inscrire{ max-width: 70em;
}
.login-clean #connecter{ max-width: 20em;
}
.login-clean .illustration{text-align:center;padding:25px 20px}
.login-clean form .btn-primary{background:#055ada;border:none;border-radius:4px;padding:11px;box-shadow:none;margin-top:26px;text-shadow:none;outline:0!important}

.login-clean form .forgot{display:block;text-align:center;font-size:12px;color:#6f7a85;opacity:.7;text-decoration:none}
.login-clean form .forgot:active,.login-clean form .forgot:hover{opacity:1;text-decoration:none}


</style>

</div>



    
    
    <script>
      function getLogin(a){
    
        document.getElementById('loginup').style.display='block';
        if (a==1){
          document.getElementById('connecter').style.display='none';
        }
        if(a==0){
          document.getElementById('inscrire').style.display='none';
        }
      }
      function delLogin(){
        document.getElementById('loginup').style.display='none';
        document.getElementById('connecter').style.display='block';
        document.getElementById('inscrire').style.display='block';
      }

    </script>
    
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
</body>

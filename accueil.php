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
    <title>e-job jobdoor</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/ionicons.min.css">
    <link rel="stylesheet" href="maincss/Footer-Dark.css">
    <link rel="stylesheet" href="maincss/mainico.css?v=<?php echo time(); ?>">
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
            <li class="nav-item active navpad">
              <a class="nav-link first " href="#">Accueil</a>
            </li>
            <li class="nav-item navpad ">
              <a class="nav-link " href="#of">offres d'emploi</a>
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
        <?php if(isset($_SESSION['idEmp'])){
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
        $sql="SELECT * FROM ville";
        $req=mysqli_query($con,$sql);
        ?>
      
      



    <div class='cvrbg-jb'>
        <div class="cvr-lr container-fluid "> 
           <h1 class='cvr-h '>Emploi Maroc</h1>
           <h4 class="first-title "> Trouvez votre emploi en quelques clics</h4>
           <form action="recherche.php">
                 <div class="row search  d-flex justify-content-center input-group">  
                  
                                 <div class="col-md-auto   collemp ">
                                  <input type="text" class="form-control form t" required="true" name="emploi" placeholder="emploi">
                                 </div>
                                 <div class="col-md-auto   collrech " >
                                 <select name="ville" class=" form s " >
                    <?php
                    echo "  <option style='display:none'></option>";
                           while ($ville=mysqli_fetch_array($req)) {
                           echo"<option style='height:20px;' value='{$ville['idVille']}'>{$ville['nomVille']}</option>";
                            
                             }
           
                       ?>

                                 </select>
                               </div>
                                <div class="col-md-auto  d-flex  justify-content-center collbo " >
                               <i class="fa fa-search  form  sicon"></i><input type="submit" name="ok" class="btn  form b " value="lancer la recherche">
                             </div>
                           
                 </div>  
                 </form>          
       </div>
                           
    </div>

    <!----le blue slide----->
               <ul class="blue-bar ">
                <?php
              
                $m=0;
                  $sql1="SELECT * FROM secteur";
        $req1=mysqli_query($con,$sql1);
                           while ($sect=mysqli_fetch_array($req1)) {
                           
                           if($m==0)
                           {
                           
                            echo"
                            <li id='inlist'><a href='recherche.php?idsecteur={$sect['idSecteur']}'>{$sect['libelle']}</a></li>
                            ";
                            $m=$m+4;
                        }
                            else
                                  {
                            	echo"
                            <li ><a href='recherche.php?idsecteur={$sect['idSecteur']}'>{$sect['libelle']}</a></li>
                           ";
                            

                             }
                             
                            
           }
                       ?>
              
                 
                
               </ul>
           
         




<div class="full-background first-contai" style="background-color: #f2f2f4;">
    <div class="container" >


            <div class="second-tit ">
              <h4 class='comment'>L'actualité d'emploi</h4>
              

            </div>

    <div class='row ' >
         <div class=" col-md-8 jobs" >

              <!---selection des  nouveaux offres----->

                <div class="jobas-body" id="of">
                	<?php
               

$sql2="SELECT * FROM offres ORDER BY dateDebut desc LIMIT 0,4";
        $req2=mysqli_query($con,$sql2);

                           while ($off=mysqli_fetch_array($req2)) {
                           	$sqlv="SELECT * FROM ville WHERE idVille='{$off['idVille']}' ";
                           	$reqv=mysqli_query($con,$sqlv);
                           	$ville=mysqli_fetch_array($reqv);
                           	$description= strlen($off['description']) > 50 ? substr($off['description'],0,56)."..." : $off['description'];
                           
                       echo "
                    <div class='row job-item '>
                                 <h5 >{$off['poste']}  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp &nbsp  &nbsp</h5>
                              <div class='col-sm-8 detail-con'>
                                       <a  class='text-white'>Nouveau</a>
                                       <p>
                                       {$description}
                                       </p>
                               </div>
                                <div class='col-sm-4 icon-con'>

                                   <div class='duo-icons'>
                                     <span> <i class='fas fa-map-marker-alt'></i> {$ville['nomVille']} </span>
                                     <span class='salair-span'><i class='fas fa fa-euro'></i> {$off['Salaire']} dh</span>
                                   </div>
                          
                                   <div class='postuler-con'>
                                      <a href='offre.php?idoffre={$off['idOffre']}' > <i class='fa fa-paper-plane ' ></i>postuler a cet offre</a>
                                   </div>
                               </div>
                    </div>";

                           }
                          
?>


       
              </div>
    
              
         </div>


         <div class="col-md-4   right-side"   >
        
            <div class=" cv-content" >
               <h4 class="  first-right" style="width: 100%;
          ">Déposer votre cv</h4>
                <div class="card-body">
                  
                  <p class="cd-txt">
                    <span class="text-primary">- </span>Être visible par un grand nombre des  recruteurs <br>
                   <span class="text-primary">- </span>Connaître les entreprises qui s'intéressent à vous <br>
                  <span class="text-primary">- </span>Ça ne prend que 15 min et c'est gratuit 
              
                
                  </p>
                  <a href="cv.php" class=" creer">créer votre cv</a>
                </div>
              </div>
            <div class=" cv-content boss-part" >
               <h4 class="  first-right" style="width: 100%;
          ">Vous etes recruteur</h4>
                <div class="card-body">
                  
                  <p class="cd-txt">
                  Jobdoor  les chercheurs d'emploi et d'employeurs à se trouver chaque jour. Commencez à recruter dès maintenant sur le premier site d'emploi qui est visibre sur tout le maroc
                  </p>
                  <a href="accueilrecruteure.php" class=" ajouter">Ajouter un poste</a>
                </div>
              </div>
              
         </div>



        
    </div>


</div>
</div>



<!--the how section-->

 <div class="container container2">
  <h2 class="comment">comment sa marche</h2>
     <div class="row how-row ">
      <?php
      $reqx=mysqli_query($con,"select * from explication");
      while ($exp=mysqli_fetch_array($reqx)) {
        
      echo"
       <div class='col-md-4 '>
        <div class='how-item '>
         
        <h5>{$exp['titre']}</h5>
        <img src='images/{$exp['image']}.png ''>
        <p>{$exp['explication']}</p>

        </div>
       </div>
       ";
     }

     ?>
     

     </div>
 </div>

<!--the actualite news-->



<div class="full-background-actual" style="background-color: #f2f2f4;">
<div class="container">

  <h2 class="comment recrute">Actualité</h2>
  <div class="row">
    <?php
$req3=mysqli_query($con,"select * from actualite order by dateDebut desc limit 0,6");
$i=0;
    while($actual=mysqli_fetch_array($req3))
    {
   if ($i==3) {
     echo "</div><div class='row'>";
   }
      
     echo" <div class='col-md-4 col-actual'>
   
   <a href='actualite.php?idactualite={$actual['idActualite']}'> <div class='card card-item' >
    <img class='card-img-top' src='{$actual['image']}' alt='Card image cap'>
    <div class='card-body blue-actual'>
      <p class='card-text'><span >{$actual['genre']}</span> {$actual['titre']} </p>
    </div>
   </div></a>
   </div>";
   $i=$i+1;
    }
?>
  
    
</div>



</div>
</div>


   





   <div class="full-background" style="background-color: #f9f9f9;">
<div class="container container3">
<div class="carousel-container ">

  <header class="">
    <span class="comment">qui parle de nous</span>
    <span class="comment-subtitle">découvrez les témoignage des condidats qui ont trouvé le poste idéal sur JobDoor</span>
  </header>
</div>

<div class="  row picpluscom ">

    <div class="col-md-6 pic-container">
      <img src="images/comment.jpg" style="width: 100%">
    </div>

    <div class="col-md-6 slide-con">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  
  <div class="carousel-inner">

                                                          <!--selction des reviews----->                                  
 <?php
 $req4=mysqli_query($con,"select * from reviews limit 0,3");
 $i=0;
 $active="active";
      while ($vw=mysqli_fetch_array($req4)) {
        $commentaire= strlen($vw['commentaire']) > 210 ? substr($vw['commentaire'],0,210)."..." : $vw['commentaire'];
if ($i!==0) {
  $active="";
}

        $req5=mysqli_query($con,"select * from employees where idEmployee={$vw['idEmployee']}");
        $emp=mysqli_fetch_array($req5);
         echo"
         <div class='carousel-item  $active   text-center slide-text '>
      <h4>{$emp['nom']} {$emp['prenom']}</h4>
      <h5>{$emp['poste']}</h5>
      <p> $commentaire </p>
      
    </div>
    ";
    $i++;
      }
   
  ?>

   
  
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
</div>

  </div>
</div>




<!---selection des enreprise recrutants -->

<div class="container entreprise">
  <h2 class="comment recrute">les entreprise recrutants</h2>
     <div class="row recrute-row">
      <?php
$req8=mysqli_query($con,"select * from entreprises limit 0, 12");
$img=mysqli_fetch_all($req8) ;

$r=0;
  for ($i=0; $i < 3 ; $i++) { 
    $j=0;
    echo"
        <div class='row col-md-4 '>";
             while ( $j< 2) {
                  echo "<div class='col-6 '>";
                      for ($a=0; $a < 2 ; $a++) { 
                         echo "<a href='entreprise.php?identreprise={$img[$r]['0']}'><img src='{$img[$r]['5']}'></a>";
                         $r++;
                        }
                
                   $j++;
                  echo" </div>";
        
                           }
      echo " </div>";
        }



     
     ?>
    
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

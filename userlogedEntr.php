
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

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>acceil recruteure-connecter</title>
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


<div id='loginup'  style="top: 0;
left: 0;
display:relative;
width: 100%;
height: 100%;
z-index: 1000;
background-image: url(images/salle.jpg);
 " >
<div class="login-clean" >
  
  <form method="post" action="confirmation.php" id='connecter' style="position: relative;<?php if(isset($_GET['Emp'])) echo'display:none'; ?>;">
    
      <h2 class="sr">Connecter ....</h2>
      <div class="illustration"><img src="logoetude.png" alt="" style='width: 150px;'></div>
      <div class="form-group"><input class="form-control" type="text" name="login" placeholder="login"></div>
      <?php if(isset($_SESSION['user']) &&  $_SESSION['user']==0 && isset($_GET['signup']) ) echo"login  Incorrect " ;  ?>
      <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
      <?php if( isset($_SESSION['pwduser'])  and $_SESSION['pwduser']==0 and isset($_GET['signup']) ) echo"password Incorrect {$_SESSION['pwduser']}";  ?>

      <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name='Entconnect'>Log In</button></div>
      <a href="#" class="forgot">Forgot your email or password?</a>
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

      </div>
    </div>
    <div>
</div>

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

    
    <style>
   
   .empval{
  color: #1e4b9e;
    }
    .empinf > p{
      color: rgba(0,0,0,0.6);
    }
    
    .bg-pad{
    padding:2em;
  }
  .tgnavpad{
    display: block;
    padding: .5rem 0rem;     
}

    .empinf{
    height:100%;
  max-width: 60%;
  display: flex;
  flex-direction: column;
  flex-flow: wrap;
  justify-content: space-between;
  padding-left: 1em;
  padding-bottom: 3em;
}
.card {
  margin-bottom: 2em;
}
.nv-w{
  width:100%;
  display: inline-flex;
}
.nbar-nav{
  flex-direction: row;
}

@media screen and (max-width: 992px){
  .hd-item{
    display: none;
  }
  .nv-w{
  width:100%;
  display: inline-flex;
}
   .nav-item1{
      order:0;
    }
    .nav-item2{
      order:3;
      margin-left: 4em;
    }
    .nav-item3{
      order:2;
      margin-right: 1em;
    }
    .nav-item4{
      order:4;
    }  
    
      
}
@media screen and (max-width: 600px){
  .nav-item2{
      order:3;
      margin-left: 0em;
    }
   
    pr-4 { padding-right: 0em ;}
    .bg-pad{
      padding:0em;
     }
    p{
      padding:0em;

    }
    .cd-txt{
      text-align: center; 
      width:100%;
    }
    .empinf{
    max-width: 100%;}
    }

    
    </style>
    <script>
      function getLogin(a){
    
        document.getElementById('loginup').style.display='block';
        if (a==1){
          document.getElementById('connecter').style.display='none';
          document.getElementById('inscrire').style.display='block';
        }
        if(a==0){
          document.getElementById('inscrire').style.display='none';
          document.getElementById('connecter').style.display='block';
        }
      }
      

    </script>

   

<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src='chart/chart.min.js'></script>
  <script src='mainchart.js'></script>
  <script src="navslide.js"></script>
  <script src='get.js'> </script>
  <script src='myPiechart.js'></script>
</body>

</html>
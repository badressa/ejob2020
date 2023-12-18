<?php 
         
         if(isset($_GET['dec'])){
          // remove all session variables
          session_unset();
     
          // destroy the session
          session_destroy();
     
         header("Location: accueilrecruteure.php") ;
         
     }
     ?>

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
        
        
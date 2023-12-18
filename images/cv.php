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
    <title>creation de cv</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/ionicons.min.css">
    <link rel="stylesheet" href="maincss/Footer-Dark.css">
    <link rel="stylesheet" href="maincss/actual.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="icon" type="image/png" href="icon.png">

</head>

<body style="background-color: #f2f6f9;">
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
              <a class="nav-link" href="#">à propos</a>
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
                 <a class='dropdown-item' href='#'>profile</a> 
                 <a class='dropdown-item' href='#'>Sup compte</a>
                 <a class='dropdown-item' href='#'>Link 3</a>
                 <a class='dropdown-item' href='#'>parametre</a>
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

        <div class="d-md-block collapse navbar-collapse " id="login" style="order:5;">
       
        <ul class=" nbar-nav navbar-nav  nav-item3 " style="display: inline-flex; float: right;">
          <li class="nav-item navpad ft-blue">
            <a onclick="getLogin(0)" href="#">se connecter</a>
          </li>
          <li class="nav-item ft-blue topright ">
           <a  onclick="getLogin(1)"  href="#">s\'inscrire</a>
           
          </li>
      </ul>

   
          
          
          ';}
    echo" </nav>";
         
          if(isset($_SESSION['idEmp']))
       echo"

      
  <div class='container'>
  	<div class='row' style='margin-top:60px;'>
  		<div class='col-md-6'>
  		<form>
  			<label><h3 style='color:#224396;padding: 14px;'>Information personel</h3></label>
  <div class='form-row'>
    <div class='form-group col-md-6'>
      
      <input type='text' class='form-control' value='hamza' id='inputtext4' disabled>
    </div>
    <div class='form-group col-md-6'>
      
      <input type='text' class='form-control' value='hamidi' id='inputtext4' disabled>
    </div>
  </div>
  <div class='form-row'>
    <div class='form-group col-md-6'>
      
      <input type='text' class='form-control' id='inputtext4' value='dateN : 12-12-2001' disabled>
    </div>
    <div class='form-group col-md-6'>
      
      <input type='text' class='form-control' id='inputtext4' value='Ville: Midelt' disabled>
    </div>
  </div>";


  ?>

  			<label><h3 style='color: #224396;padding: 14px;'>Expérience</h3></label>
  <div class='form-row'>
    <div class='form-group col-md-6'>
            <input type='text' class='form-control' id='inputtext4' placeholder='experience 1'>
    </div>
    <div class='form-group col-md-6'>
      
      <input type='date' class='form-control' id='inputdate1'>
    </div>
  </div>
  <div class='form-row'>
    <div class='form-group col-md-6'>
             <input type='text' class='form-control' id='inputtext4' placeholder='experience 2'> 
    </div>
    <div class='form-group col-md-6'>
      
      <input type='date' class='form-control' id='inputdate1'>
    </div>
  </div>


  <h3  style='color: #224396;padding: 14px;'>Les formation</h3>
  <div class='form-row'>
    <div class='form-group col-md-6'>
            <input type='text' class='form-control' id='inputtext4' placeholder='formation 1'>
    </div>
    <div class='form-group col-md-6'>
              <input type='text' class='form-control' id='inputtext4' placeholder='durée '>
    </div>
           
  </div>

  <label>description</label>
  <div class='form-row'>
  	<div class='form-group col-md-12'>
  	<textarea style='width: 100%;'></textarea>
    </div>
  </div>


  <label><h3 style='color: #224396;padding: 14px;'>Langue</h3></label>
  <div class='form-row'>
    <div class='form-group col-md-6'>
      <label for='inputState'>la langue</label>
      <select id='inputState' class='form-control'>
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class='form-group col-md-6 pt-1' style='place-self: flex-end;'>
  <div class='form-group'>
    <input type='range' class='form-control-range' id='formControlRange'>
  </div>
    </div>
  </div>
    
    
  
  <button type='submit' class='btn btn-primary' style='float: right;'>valider le cv</button>
</form>
  		
  	</div>
  	
  	<div class='col-md-6'>
  		<img src='cv.png' style='width: 100%;'><br>
  		<img src='cv1.png' class='' style='width: 100%;margin-top: 150px;'>
  	</div>
  	</div>
  </div>




  <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
	<script src='chart/chart.min.js'></script>
	<script src='mainchart.js'></script>
  <script src='get.js'> </script>
  <script src='myPiechart.js'></script>
  </body>
</html>
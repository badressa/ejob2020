<?php
session_start();
include_once "connecttodb.php"; 

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile-entreprise</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/ionicons.min.css">
    <link rel="stylesheet" href="maincss/Footer-Dark.css">
    <link rel="stylesheet" href="maincss/styles.css">
    <link rel="stylesheet" href="maincss/profile.css">
    <link rel="stylesheet" href="maincss/recher.css">
    <link rel="stylesheet" href="maincss/accrecrut.css?v=<?php echo time(); ?>">
	  <link rel="stylesheet" href="chart/chart.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="icon" type="image/png" href="icon.png">

</head>

<body >


<?php  

      //inscription de entreprise

             if (isset($_POST['ok'])) {
            $sql="INSERT INTO entreprises (`reseauSocial`, `siegeSocial`, `login`, `password`, `domaineActivite`, `nombreEmployee`, `chiffreAffaire`) VALUES ('{$_POST['reseau']}','{$_POST['siege']}','{$_POST['login']}','{$_POST['mp']}','{$_POST['domaine']}',
           '{$_POST['nombre']}','{$_POST['chiffre']}')";
            mysqli_query($con,$sql);
               session_unset();
                                                           
             $_SESSION['idEnt']=mysqli_insert_id($con);
              $_SESSION['avatar']='images/avatarep.png';
                 $_SESSION['backImage']='images/backpd.png';
               
                  
             }

             //fin inscription entreprise
?>
<?php


                 include 'navrr.php';

                  if(isset($_REQUEST["q"])){ $q = $_REQUEST["q"];}
                 
                 if(isset($_GET['commenter'])){
                            } 
                 if(isset($_SESSION['idEnt']) || isset($_GET['q']) ){

                  

                    if( isset($_GET['des'])){
                  
                  if(!empty($_GET['bio']) && $_GET['bio']!='Bio  ...'  )
                  {
                    $des=$_GET['bio'];
                    $sqlP="UPDATE `enteprises` SET `description`='$des' WHERE `idEntreprise`='{$_SESSION['idEnt']}';";
                    
                  }
              
                  
                   mysqli_query($con,$sqlP);
                  
                  
                 }



if(isset($_SESSION['idEnt']) ){
$sql="SELECT * FROM `entreprises` where idEntreprise='{$_SESSION['idEnt']}'";}
if(isset($_GET['q'])) {
  $sql="SELECT * FROM `entreprises` where idEntreprise='{$_GET['q']}'";}
$req = mysqli_query($con,$sql);
$profile = mysqli_fetch_assoc($req);


    echo"
         <div class='container-fluid' style='background-color: #f6f8f7;padding-bottom: 2em;'>
   
    <div class='row' id='prfjb' >
      
        <div class='profile' >
        <div  class='profilew'>
                <div class='profile-img' >
                  <img class='pr-img' src='";
                  
                  if(isset($_SESSION['idEnt'])){
                  if((!isset($_GET['q']) && isset($_SESSION['idEnt']) ) || (isset($_GET['q']) && $_SESSION['idEnt']==$_GET['q']) ){
                   echo" {$_SESSION['backImage']} ' alt=''>
                   <a onclick='changeImg(0)' style='position:absolute;top:0;right:0;'> 
                       <i class='fas fa-3x fa-camera' aria-hidden='true' style='color:#ddd;'></i>
                   </a><img";
                  }}else {
                    if(is_null($profile['backImage'])){
                      echo"images/125x125.gif' alt=''>";

                    }
                    else{
                      echo"{$profile['backImage']}' alt=''>";
  }
                  }
                  
                  echo"
                  
                  
                </div>
               
               <div style='box-shadow: 0px 0px 8px rgba(0,0,0,0.5);
               margin-left: 2em;
               position: absolute;
               /* border: 4px #e8e8e8 solid; */
               width: 8em;
               height: 8em;
               bottom: -5em;
               border-radius: 100%;
               z-index: 10;
               background-repeat: no-repeat;' >  ";
               if(isset($_SESSION['idEnt'])){
               if((!isset($_GET['q']) && isset($_SESSION['idEnt']) ) || (isset($_GET['q']) && $_SESSION['idEnt']==$_GET['q']) ){
                echo" <img src='{$_SESSION['avatar']}' style='width: 100%;' >";
               }}else {
                 if(is_null($profile['avatar'])){
                   echo"<img src='images/avatarep.png' style='width: 100%;'>";

                 }
                 else{
                   echo"<img src='{$profile['avatar']}' style='width: 100%; height:100%;'>";

                 }
               }


              
               echo"
              
               ";
               //hna fin tbdel
               if(isset($_SESSION['idEnt'])   ){
                if( (!isset($_GET['q']) && isset($_SESSION['idEnt']) ) || (isset($_GET['q']) && $_SESSION['idEnt']==$_GET['q'])) 
                 echo" <a onclick='changeImg(1)' style='position:absolute;top:0;right:0;'> 
                      <i class='fas fa-3x fa-camera' aria-hidden='true' style='color:#ddd;'></i>
                  </a>";}
                
               echo" </div>
      </div></div>
       <div class='profiledes'>
         <h5 style='color : #333333; text-transform: capitalize;'>{$profile['reseauSocial']}  </h5>
         <p class='text-dark'>Lieu :  {$profile['siegeSocial']} </p>
         
        </div>
        <nav id='slideNav' style='
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin:auto;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;' >
          <ul class='containerNav' id='containerN' style='overflow: scroll; margin: auto; padding: 0em 1em;'>";
          $q=0;
          if( isset($_GET['q'])  ){
            $q=$_GET['q'];
          }
          if(  isset($_SESSION['idEnt']) ){
            $q=$_SESSION['idEnt'];
          }
           
              
          echo"<li class=' navItem'><a href='#' style='color:#154396; text-decoration:none;' onclick='loadDoc(0,$q)' >A propos</a></li>
              <li class=' navItem'><a  href='#' style='color:#154396; text-decoration:none;'onclick='loadDoc(1,$q)'>Salaire</a></li>
              <li class=' navItem'><a   href='#' style='color:#154396; text-decoration:none;'onclick='loadDoc(2,$q)'>Avis</a></li>
              <li class=' navItem'><a   href='#' style='color:#154396; text-decoration:none;'onclick='loadDoc(3,$q)'>Photo</a></li>
              <li class=' navItem'  ><a  href='#' style='color:#154396; text-decoration:none;'onclick='loadDoc(4,$q)'>Emplois</a></li>
              
          </ul>
              
      </nav>


      

      
      
       </div>
    
    </div>";
                

    

    


    echo"
    <div class='row' id='contenujobinf'>
       
        <div class='profile' >
            <div class='container-fluid'>
                    <div class='row p-2' style='
                     background: white;
  padding: 15px 10px 5px 10px;
  
  border-radius: 4px;
  margin-bottom: 20px;

                    '

                    >";
    
                    if(!empty($profile['description']) || !is_null($profile['description'])){
    
                      echo "<div class='col-sm-12 col-md-8 col-lg-6' style='width: 100%; padding: 1em;' >
                      <h4 style='color: #333333;'>Description </h4>
                      <p style='text-indent:40px;text-align: justify;'> <span class='' >{$profile['description']}</span></p>
                       </div>";
                    }
                    else{ if(isset($_SESSION['idEnt']) && $_SESSION['idEnt']==$_GET['q'] ) echo"<form style='width: 100%;
                                            padding: 1em;
                                            margin: 1em;' action=''>
                                  <h4 style='color: #333333;'>Bio </h4>
                                       <div class=''>   
                                  <textarea id='bio' class='form-control' style='color: #333333;
                                  border: 2px solid #224396;
                                  width: 100%;
                                  padding: 1em;

                                  ' name='bio' rows='5' class='' cols='33'>Bio  ...</textarea></div>
                                 <input type='submit' name='des' class='btn btn-primary ' value='Valider mon bio' style='float:right;'>
                             </form>
                      ";}
    
                    echo"
                    
                   <div class='col-sm-12 col-md-10 col-lg-6' style='
                    width: 100%;
                    padding: 1em;
                    '>
                    <h4 style='color: #333333;'>Info Sur l'entreprise  </h4>
                    
                    <div style='border-left: 2px solid #224396;
                    
                    border-radius:4px;
                    display: flex;
                    flex-direction: column;
                    flex-flow: wrap;
                    justify-content: start;
                    padding: 1em;' >
                    <p class='cd-txt pr-4'>
                    domaineActivite : <span class='empvalue'>{$profile['domaineActivite']}    </span>
                    </p>
                    <p class='cd-txt pr-4'>
                    nombreEmployee :  <span class='empvalue'>{$profile['nombreEmployee']}</span>
                    </p>
                    <p class='cd-txt pr-4'>
                    chiffreAffaire :  <span class='empvalue'>{$profile['chiffreAffaire']}</span>
                    </p>
                    
                    
                    
                    
                    ";
                    
    
    
                      
                        
    
                  
    
    
    
                    echo"
                  </div>
                  </div>
    
                  <style>.cd-txt{min-width:50%;}</style>
                       ";
                  
                    
                    
                    
                    
                    
                    
                    
                    echo"</div> 
                    
                    
    
                    
                    
                    
                    
    
                   
                    
                    
               
    
    
    
    
    
           
        </div>
        </div>
     
    
    
    
    </div>
    </div>";} ?>

   
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
   
    <div id='chngImg'  style="top: 0;
left: 0;
position: fixed;
width: 100vw;
height: 100vh;
z-index: 1000;
background: rgba(0,40,80,0.5);
display:none;
 " > 
 
   <div  style="max-width: 340px;
   position: relative;
    width: 90%;
    margin: 5em auto;
    background-color: #fff;
    padding: 40px;
    border-radius: 4px;
    color: #505e6c;
    box-shadow: 1px 1px 5px rgba(0,0,0,.1);">
     <form action='fileck.php' method='post' enctype='multipart/form-data' id='backImage'  >
       <div style="color: red;
                   font-size: 2em;
                   position: absolute;
                   right: 0em;
                   top: 0em;
                   line-height: 15px;
                   cursor: default;
                   padding: 5px;" onclick="del()"> x</div>
                   <h4>change la photo de coverture</h4>
                  
                <div class='custom-file'  >
                    
                       
                       
                       <input type='file'  class='custom-file-input' id='customFile' name='fileToUpload'  >
                       <label class='custom-file-label' for='customFile'>choisire une photo</label>
    
                </div>
                       <input type='hidden'   name='coverture'  >
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name='connecter'>changer la photo</button></div>
                 </form>


                 <form action='fileck.php' method='post' enctype='multipart/form-data'  id='profileImg'   >
                   <div style="color: red;
                   font-size: 2em;
                   position: absolute;
                   right: 0em;
                   top: 0em;
                   line-height: 15px;
                   cursor: default;
                   padding: 5px;" onclick="del()"> x</div>
                   <h4>change l'a photo de profile</h4>
                  
                <div class='custom-file'  >
                       
                       <input type='file'  class='custom-file-input' id='customFile' name='fileToUpload'  >
                       <label class='custom-file-label' for='customFile'>choisire une photo</label>
                       <input type='hidden'   name='profile'  >
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name='connecter'>changer la photo</button></div>
                 </form>
   </div>
</div>
<script>
  
  function changeImg(a){
    
    document.getElementById('chngImg').style.display='block';
    if (a==1){
      document.getElementById('backImage').style.display='none';
    }
    if(a==0){
      document.getElementById('profileImg').style.display='none';
    }
  }
  function del(){
    document.getElementById('chngImg').style.display='none';
    document.getElementById('backImage').style.display='block';
    document.getElementById('profileImg').style.display='block';
  }


</script>
















    <div id='loginup'  style="top: 0;
                              left: 0;
                              position: fixed;
                              width: 100vw;
                              height: 100vh;
                              z-index: 1000;
                              background: rgba(0,40,80,0.5);
                               display: none;" >
<div class="login-clean" >
  
  <form method="post" action="login.php" id='connecter' style="position: relative;">
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
      <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
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
    
    <script>
      function loadDoc(i,q) {
        event.preventDefault();
       var xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function(i) {
     
       if (this.readyState == 4 && this.status == 200) {
       document.getElementById("contenujobinf").innerHTML =  this.responseText;
     }
   };
   xhttp.open("GET", "partext/ajaxing"+i+".php?q="+q, true);
   xhttp.send();
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
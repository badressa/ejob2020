<div class="footer-dark">
<footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">poster vote cv</a></li>
                            <li><a href="#">recherche d'emploi</a></li>
                            <li><a href="#">inscrir</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>categories des offerse</h3>
                        <ul>
                            <li><a href="#">tourisme</a></li>
                            <li><a href="#">emoubilie</a></li>
                            <li><a href="#">secretaria</a></li>
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
    <div>
</div>

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
    
      
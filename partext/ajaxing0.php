<?php

session_start();
include'../connecttodb.php';
$q = $_REQUEST["q"];
$sql="SELECT * FROM `entreprises` where idEntreprise='$q'";
$req = mysqli_query($con,$sql);
$profile = mysqli_fetch_assoc($req);

echo"
<div class='row' id='contenujobinf'>
   
    <div class='profile' >
        <div class='container-fluid'>
          

           
         
                
                
                <div class='row p-2' style='      background: white;
  padding: 15px 10px 5px 10px;
  
  border-radius: 4px;
  margin-bottom: 20px;'>";

                if(!empty($profile['description']) || !is_null($profile['description'])){

                  echo "<div class='col-sm-12 col-md-8 col-lg-6' style='width: 100%; padding: 1em;' >
                  <h4 style='color: #333333;'>Description </h4>
                  <p style='margin-top:26px;text-indent:40px;text-align: justify;'> <span class='empvalue' >{$profile['description']}</span></p>
                   </div>";
                }
                else{ if(isset($_SESSION['idEnt']) && $_SESSION['idEnt']==$_GET['idP'] ) echo"<form style='width: 100%;
                                        padding: 1em;
                                        margin: 1em;' action=''>
                              <h4 style='color: #333333;'>Bio </h4>
                               <div class=''>        
                              <textarea class='form-control' id='bio' style='color: #333333;
                              border: 2px solid gray;
                              width: 100%;
                              padding: 1em;
                              ' name='bio' rows='5' cols='33'>Bio  ...</textarea></div>
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
                if(!empty($profile['ville']) && !empty($profile['adresse']) ){

                  echo "<p class='cd-txt pr-4'>
                   Ville : <span class='empvalue'>{$profile['ville']}</span></p>
                  <p class='cd-txt pr-4'>
                    Adresse : <span class='empvalue'>{$profile['adresse']}</span></p>
                  
                  
                  ";
                }
                else{ 
                  
                  if(isset($_SESSION['idEnt'])){
                  
                  if(isset($_SESSION['idEmp']) && $_SESSION['idEmp']==$_GET['idP'] ) echo"<form action=''>
                  <div class='form-group'>
                  <input class='form-control' type='text' name='ville' placeholder='Ville'>
                  </div>
                  <div class='form-group'>
                  <input class='form-control' type='text' name='adresse' placeholder='Adresse'>
                  </div>
                             
                             <input name='habitation' type='submit' class='btn btn-primary ' value='Habitation' style='float:right;'>
                         </form>
                  ";}}



                  
                    

              



                echo"
              </div>
              </div>

              <style>.cd-txt{min-width:50%;}</style>
                   ";
              
                
                
                
                
                
                
                
                echo"</div> 
                
                

                
                
                
                

               
                
                
           





       
    </div>
    </div>
 



</div>
</div>";




?>
    

<?php 
session_start();
include'../connecttodb.php';
$q = $_REQUEST["q"];



echo"
<div class='row' id='contenujobinf' style='padding: 2em; padding-top:10px;width:100%' >
   
    <div class='profile'  >
        <div class='container-fluid'>
            <div class='row'>

           
         <div class='col-sm-12 col-12 ' >
         <h4 style='color: #333333; font-weight:bold; padding-bottom:20px;'>Images </h4>

         <div style='
                
                 background: white;
  padding: 15px 10px 5px 10px;
  
  border-radius: 4px;
  margin-bottom: 20px;
                display: flex;
                flex-direction: column;
                flex-flow: wrap;
                justify-content: start;
                padding: 1em;'>";
                $sql="SELECT `idphoto`, `src`, `idemployee`, `idrecruteure` FROM `photo` ";
                $req=mysqli_query($con,$sql);
                $numImg=mysqli_num_rows($req);

                if($numImg>0){
                while($imge=mysqli_fetch_assoc($req)){
                echo"  <img  src='{$imge['src']}' style='    width: 10em;padding: 1em; box-sizing: border-box;'> ";}}
                else{
                  echo"<h3 style='    border: 1px solid #f1a1a1;
    padding-left: 10px;
    height: 30px;
    width: 80%;
    background: #f7d3d9;
    color: #fb5a5a;'> aucune image</h3>";
                }
                
           if(isset($_SESSION['idEnt'])){
             echo"
                  <form action='fileck.php' method='post' enctype='multipart/form-data' id='profileImg' style='width:9em'>
                   
                   <h6>ajouter une photo </h6>
                  
                <div class='custom-file'>
                       
                       <input type='file' class='custom-file-input' id='customFile' name='fileToUpload'>
                       <label class='custom-file-label' for='customFile'>img</label>
                       <input type='hidden' name='idE' value='$q'>
                        
                </div>
                <div class='form-group'><button class='btn btn-primary btn-block' type='submit' name='cngImgE'>changer la photo</button></div>
                 </form>";}
                 echo"
                 
                </div>
                </div>
  
          </div>
      </div>
      </div>
  
  
  </div>";

                 ?>


                  
                              
                  
            
                
                
                
                 
         
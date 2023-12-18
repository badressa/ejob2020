<?php
 
session_start();
include'../connecttodb.php';
$q = $_REQUEST["q"];




$sql="SELECT nom,prenom,poste,avatar,avis,datePublication FROM avis a left join employees e on a.idEmployee=e.idEmployee WHERE a.idEntreprise = $q";
$req=mysqli_query($con,$sql);
$nbavis=mysqli_num_rows($req);
if($nbavis==0 ){echo"<div  class='container' style='width:800%;''>
   
<div >
            <p style='border: 1px solid #f1a1a1;
    padding-left: 10px;
    height: 30px;
    width: 100px;
    background: #f7d3d9;
    color: #fb5a5a;'>Aucun avis</p>
       
</div>            
     
     
     
     
     ";
if(isset($_SESSION['idEmp'])){
            echo"

            <div class=' p-2' style='  background: white;
 
  box-shadow: 0 2px 10px 0 rgba(0,0,0,.1);
  border-radius: 4px;
  margin-bottom: 20px;'>
                           <form style='width: 100%;
                                             >
                                  <img src='{$_SESSION['avatar']}' alt='prfimg' style='width: 3em;
                                  height: 3em;
                                  border: 1px solid #224396;
                                  padding: 1px;
                                  border-radius: 100%;
                                  margin-bottom: 4px;'>
                                  <h5 style='font-weight:bold;'>Exprimer vous</h5>
                                  <input type='hidden' name='q' value='$q'>
                                           
                                  <textarea  class='form-control' id='bio' style='color: #black;
                                  border: 1px solid #333333;
                                  width: 100%;
                                  
                                  ' name='comment' rows='5' cols='33'></textarea>
                                 <input type='submit' name='commenter' class='btn  mt-3 text-white ' value='commenter' style=' background: #0367c6; text:white; text-align :center;'> 
                             </form>

                  
            </div>      

            
            
            
            
            
            
                
                </div>";}

   }
     if($nbavis>0){



echo"<div class='row' id='contenujobinf'>
   
<div class='profile' >
    <div class='container-fluid'>
        <div class='row'>

       
     <div class='col-sm-12 col-md-8 col-lg-12' >
        <div class='container-fluid'>
            <div class=''  style='    
            flex-direction: column;
            
            padding: 1.2em  1.2em;
padding-top:0px;
            '>

                <h4 style='font-weight:bold; color:#333333;'>Les avis 
                Avis sur entreprise </h4>
            </div>";

              while($avisure=mysqli_fetch_assoc($req)){
                echo"
       <div class='row p-2' style=' background: white;
  padding: 15px 10px 5px 10px;
  box-shadow: 0 2px 10px 0 rgba(0,0,0,.1);
  border-radius: 4px;
  margin-bottom: 20px;'>
            
                <div class='col-md-4 col-sm-2 col-lg-2' style='min-width: 8em;' >";

                if(!is_null($avisure['avatar'])){
                    echo"
                    <img src='{$avisure['avatar']}' style='width: 100%; border-radius:4px;
                    box-shadow: 2px 2px 7px rgba(45,45,45,0.5);'/>";}
                    else {
                        echo"
                    <img src='images/125x125.gif' style='width: 100%; height:20px;
                    box-shadow: 2px 2px 7px rgba(45,45,45,0.5);'/>";

                    }
                    echo"
                </div>
                <div class='col-md-8 col-sm-7 col-lg-8'  >
                    <h5 style='text-transform:capitalize;'>{$avisure['nom']}  {$avisure['prenom']}</h5>
                    <a href='#' style='    text-align: justify;
                    margin-top: 0;
                    margin-bottom: 1rem;
                    text-indent: 1em;'>{$avisure['poste']}</a>
                    <p>{$avisure['avis']}</p>
        
                </div>
                <ul class='proful' >
                         
                          <li style='padding: 0em 2em;
                          color: gray;'>{$avisure['datePublication']}</li>
                          
                </ul>
            </div>";}
           if(isset($_SESSION['idEmp'])){
            echo"

            <div class='container-fluid p-2' style='  background: white;
 
  box-shadow: 0 2px 10px 0 rgba(0,0,0,.1);
  border-radius: 4px;
  margin-bottom: 20px;'>
                           <form style='width: 100%;
                                             >
                                  <img src='{$_SESSION['avatar']}' alt='prfimg' style='width: 3em;
                                  height: 3em;
                                  border: 1px solid #224396;
                                  padding: 1px;
                                  border-radius: 100%;
                                  margin-bottom: 4px;'>
                                  <h5 style='font-weight:bold;'>Exprimer vous</h5>
                                  <input type='hidden' name='q' value='$q'>
                                           
                                  <textarea  class='form-control' id='bio' style='color: #black;
                                  border: 1px solid #333333;
                                  width: 100%;
                                  
                                  ' name='comment' rows='5' cols='33'></textarea>
                                 <input type='submit' name='commenter' class='btn  mt-3 text-white ' value='commenter' style=' background: #0367c6; text:white; text-align :center;'> 
                             </form>

                  
            </div>      

            
            
            
            
            
            
                
                </div>";}


              }


?>






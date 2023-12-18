<?php
session_start();
include_once "connecttodb.php"; 

         
         if(isset($_GET['dec'])){
          // remove all session variables
          session_unset();
     
          // destroy the session
          session_destroy();
     
         header("Location: accueil.php") ;}
         if(isset($_GET['modifier'])){
           $idact =$_GET['idact'];
           if(empty($_GET['dateF'])){$_GET['dateF']='0000-00-00';}
            $new_datef = date('Y-m-d', strtotime($_GET['dateF']) );
           
          
             $sql="UPDATE `actualite` SET `description`='{$_GET['des']}',`dateFin`=' $new_datef ' WHERE  idactualite=$idact";
             mysqli_query($con,$sql);

           
           
          
     
         }
         if(isset($_GET['ban'])){
          $idact =$_GET['ban'];
          $sql="UPDATE `actualite` SET `etat`=1 WHERE  idActualite=$idact";
          mysqli_query($con,$sql);
         }
         if(isset($_GET['deban'])){
          $idact =$_GET['deban'];
          $sql="UPDATE `actualite` SET `etat`=0 WHERE  idActualite=$idact";
          mysqli_query($con,$sql);
         }
         if(isset($_GET['sup'])){
          $idact =$_GET['sup'];
          $sql="DELETE FROM `actualite`  WHERE  idActualite=$idact ";
          mysqli_query($con,$sql);
         }




         if(isset($_GET['banEmp'])){
          $idEmp =$_GET['banEmp'];
          $sql="UPDATE `Employees` SET `etat`=1 WHERE  idEmployee=$idEmp";
          mysqli_query($con,$sql);
         }
         if(isset($_GET['debanEmp'])){
          $idEmp =$_GET['debanEmp'];
          $sql="UPDATE `Employees` SET `etat`=0 WHERE  idEmployee=$idEmp";
          mysqli_query($con,$sql);


         }
         if(isset($_GET['supEmp'])){
          $idEmp =$_GET['supEmp'];
          $sql="DELETE FROM `Employees`  WHERE  idEmployee=$idEmp ";
          mysqli_query($con,$sql);
         }



         if(isset($_GET['banEnt'])){
          $idEmp =$_GET['banEnt'];
          $sql="UPDATE `Entreprises` SET `etat`=1 WHERE  idEntreprise=$idEmp";
          mysqli_query($con,$sql);
         }
         if(isset($_GET['debanEnt'])){
          $idEmp =$_GET['debanEnt'];
          $sql="UPDATE `Entreprises` SET `etat`=0 WHERE  idEntreprise=$idEmp";
          mysqli_query($con,$sql);

          
         }
         if(isset($_GET['supEnt'])){
          $idEmp =$_GET['supEnt'];
          $sql="DELETE FROM `Entreprises`  WHERE  idEntreprise=$idEmp ";
          mysqli_query($con,$sql);
         }


        
         
     
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/ionicons.min.css">
    <link rel="stylesheet" href="maincss/Footer-Dark.css">
   <link rel="stylesheet" href="chart/chart.css">
   
    <link rel="stylesheet" href="fontawesome/css/all.css">

</head>

<body >
    
    <!--Navbar -->
    

<nav class=" navbar navbar-expand-lg navbar-dark secondary-color lighten-1" >

  <a class="navbar-brand" href="#"     style='margin-right:10em'>
     <img src='logo.png'/> 
  </a>
    
    
    
      <div class="input-group  col-xm-0" style='max-width:18em;'>
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" 
                     aria-describedby="basicaddon2"   style='border-radius: 2em 0em 0em 2em;border:1px gray solid'>
              <div class="input-group-append">
                <button class="btn bg-light" type="button"   style="border-top-right-radius: 2em;
                     border-bottom-right-radius: 2em;">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
    
    
   
    
  
      
      
               <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
               
                 <ul class="navbar-nav ml-auto nav-flex-icons">
                     
                   <li class="nav-item avatar dropdown">
                     <a class="nav-link " id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"    >
                         <div style="position:relative">
                      <img src="images/acount.png" class="rounded-circle z-depth-0"
                         alt="avatar image" height="35">
                         <i style="position: absolute;
                         right: 0px;
                           bottom: 0px;
                          width: 10px;
                          height: 10px;
                            border-radius: 100%;
                              background-color: #30e430;"></i>
                             </div>
                     </a>
                     <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                       aria-labelledby="navbarDropdownMenuLink-55"  style="left:-7em">
                       <a class="dropdown-item" href="#">Dashboard</a>
                       <a class="dropdown-item" href="#">Editer le Profile</a>
                       <a class="dropdown-item" href="dashboard.php?dec=oui">Deconnexion</a>
                     </div>
                   </li>
                 </ul>
                   
                   
                   
               </div>

    
    </nav>


   

    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-0"   style="background-color:#2a3f4c">
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="#" style="color:#fff">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      

      
      <li class="nav-item">
        <a class="nav-link " href="#emp"  style="color:#fff">
           
          <span>Employees</span>
        </a>
        
      </li>

      
      <li class="nav-item">
        <a class="nav-link "  href="#ent"  style="color:#fff">
          
          <span>entreprises</span>
        </a>
        <!-- Divider -->
      <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading" style='font-size: 2em;
          color: darkgray;'>
         Interface
        </div>
        
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages"                   style="color:#fff">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login pages:</h6>
            <a class="collapse-item" href="userloged.php">Login</a>
            <br>
            <a class="collapse-item" href="userloged.php">Register</a>
            
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">autres Pages:</h6>
            <a class="collapse-item" href="profileEnt.php?q=1"> profile entreprise </a>
            <br>
            <a class="collapse-item" href="profileEmp.php?idP=1">profile emploie</a>
          </div>
        </div>
      </li>


      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="#"    style="color:#fff">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="#"   style="color:#fff">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

     

    </ul>
                
                
                
                </div>
               <div class="col-md-10"   style="background-color:#eee">
                
                           
                   
                   
                   
                   
                   
                   
                   <div class="container-fluid">

          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          
          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Totals d'utilisateurs </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                      <?php
                      
                $sql="SELECT * FROM Employees;";
           
                      $result =mysqli_query($con,$sql);
                     $resultCheck=mysqli_num_rows($result);
                     echo"$resultCheck";
                      
                      
                      ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Totales d'entreprises</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                      
                      $sql="SELECT * FROM Entreprises;";
                 
                            $result =mysqli_query($con,$sql);
                           $resultCheck=mysqli_num_rows($result);
                           echo"$resultCheck";
                            
                            
                            ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Offres</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

                          <?php
                      
                $sql="SELECT * FROM offres;";
           
                      $result =mysqli_query($con,$sql);
                     $resultCheck=mysqli_num_rows($result);
                     echo"$resultCheck";
                      
                      
                      ?>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Demande d'emploie</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                      
                      $sql="SELECT * FROM demande;";
                 
                            $result =mysqli_query($con,$sql);
                           $resultCheck=mysqli_num_rows($result);
                           echo"$resultCheck";
                            
                            
                            ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Les statistiques</h6>
                
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myChart" width="723" height="320" class="chartjs-render-monitor" style="display: block; width: 723px; height: 320px;"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <?php


            $sql='SELECT libelle, count(of.idSecteur) totals FROM offres of INNER JOIN secteur sal ON of.idSecteur=sal.idSecteur GROUP BY sal.idSecteur LIMIT 3';
            $req=mysqli_query($con,$sql);
            $nbrpars=mysqli_num_rows($req);

            if ($nbrpars>2 ){

              $tandSec= mysqli_fetch_all($req);
              $TtValSec= $tandSec[0][1] + $tandSec[1][1]  + $tandSec[2][1];
              $val1=round($tandSec[0][1]*100/$TtValSec);
              $val2=round($tandSec[1][1]*100/$TtValSec);
              $val3=round($tandSec[2][1]*100/$TtValSec);
             

             echo"
              <div class='col-xl-4 col-lg-5'>
               <div class='card shadow mb-4'>
                <!-- Card Header - Dropdown -->
                <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
                  <h6 class='m-0 font-weight-bold text-primary'>Tendances des secteurs</h6>
                  
                </div>
                <!-- Card Body -->
                <div class='card-body'>
                
                  
                  <h4 class='small font-weight-bold'>{$tandSec[0][0]} <span class='float-right'>$val1</span></h4>
                  <div class='progress mb-4'>
                    <div class='progress-bar' role='progressbar' style='width: $val1%' aria-valuenow='$val1' aria-valuemin='0' aria-valuemax='100'></div>
                  </div>
                  <h4 class='small font-weight-bold'>{$tandSec[1][0]} <span class='float-right'>$val2</span></h4>
                  <div class='progress mb-4'>
                    <div class='progress-bar bg-info' role='progressbar' style='width: $val2%' aria-valuenow='$val2' aria-valuemin='0' aria-valuemax='100'></div>
                  </div>
                  <h4 class='small font-weight-bold'>{$tandSec[2][0]} <span class='float-right'>$val3</span></h4>
                  <div class='progress'>
                    <div class='progress-bar bg-success' role='progressbar' style='width: $val3%' aria-valuenow='$val3' aria-valuemin='0' aria-valuemax='100'></div>
                  </div>
                  <div class='mt-4 text-center small'>
                    <span class='mr-2'>
                      <i class='fas fa-circle text-primary' style='white-space: nowrap;'></i> {$tandSec[0][0]}
                    </span>
                    <span class='mr-2' style='white-space: nowrap;'>
                      <i class='fas fa-circle text-success'></i> Social {$tandSec[1][0]}
                    </span>
                    <span class='mr-2' style='white-space: nowrap;'>
                      <i class='fas fa-circle text-info' ></i> Referral {$tandSec[2][0]}
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>";}?>


          
        
          

          
          <div class="row">
          <div class="col-lg-12 mb-4">

              

            <!-- Approach -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Actualités</h6>
              </div>
              <div class="card-body">


              <?php
              echo"
              <table class='table'>
                         <thead class='thead-dark'>
                           <tr>
                             
                             <th scope='col'>Titre</th>
                             <th scope='col'>Description</th>
                             <th scope='col'>Img</th>
                             <th scope='col'>dateFin</th>
                             <th scope='col'>moderer</th>

                           </tr>
                         </thead>
                         <tbody>";
                         $sql="SELECT * FROM actualite;";
                 
                            $result =mysqli_query($con,$sql);
                           $resultCheck=mysqli_num_rows($result);
                           if($resultCheck!=0){
                             while($act=mysqli_fetch_assoc($result)){
                            echo"     
                          <tr>
                          <form action='' method='get'> 
                            <th scope='row'>{$act['titre']}</th>
                            <td><textarea class='form-control rounded-0' name='des' rows='5'  >{$act['description']}</textarea>  </td>
                            <td><img src='{$act['image']}' alt='img' width='70'></td>
                            <td><input type='date' name='dateF' value='{$act['dateFin']}' ></td>
                            <input type='hidden'  name='idact' value='{$act['idActualite']}'>

                            <td>   <button class='btn btn-info btn-block' name='modifier' type='submit'>Modifier</button> 
                            <br>
                                  <a class='btn btn-danger btn-block'class='btn btn-warning btn-block' href='dashboard.php?sup={$act['idActualite']}' style='color:white;font-size:1em;'>Sup x</a>
                                  <br>";
                                  if($act['etat']==0)
                                  echo"
                                  <a class='btn btn-warning btn-block' href='dashboard.php?ban={$act['idActualite']}' style='color:red;font-size:1em;'>ban <i class='fa fa-ban' aria-hidden='true'></i></a>";
                                  else
                                  echo"
                                  <a class='btn btn-info btn-block' href='dashboard.php?deban={$act['idActualite']}' style='color:white;font-size:1em;'>deban <i class='fa fa-ban' aria-hidden='true'></i></a>";
                            
                           echo" </td>
                        
                            
                          </tr>
                          </form>";}
                           }

                     
                           
                         echo"  
                         </tbody>
                   </table>";
                 

                  ?>





                       <form  action="fileck.php" method="post" id='ajac' enctype="multipart/form-data" class="text-center border border-light p-5" action="#!">
                       
                       <p class="h4 mb-4">Ajouter une actualite</p>
                       
                       <div class="row">
                                   
                                   <div class="col-md-4">
                                     <div class="form-group">
                                        <input type="text"  class="form-control mb-4" name='titre' placeholder="titre">
                                     </div>
                                   </div>
                                   <div class="col-md-4">
                                     <div class="form-group">    
                                        <div class="custom-file" style=" padding: 1em;">
                              
                                         <input type="file" class="custom-file-input" id="customFile" name="fileToUpload">
                                        <label class="custom-file-label" for="customFile">choisire une photo</label>
                                        </div>
                                     </div>
                                   </div>  
                                   <div class="col-md-4">
                                     <label for='dtF' style="float: left;"><h5>dateFin</h5></label>
                                     <div class="form-group" id='dtF' style="float: right;">
                                        <input type="date"  name='dateF' date class="form-control mb-4" placeholder="dateFin">
                                     </div>
                                   </div>    
                       </div>
                       <div class="row">
                                   <div class="col-md-12">
                                     <div class="form-group">
                                        <div class="form-group">
                                              <textarea class="form-control rounded-0" name='description' rows="3" placeholder="Message"></textarea>
                                      
                                        </div>
                                     </div>
                                   </div>
                       </div>
                           
                      
                     
                       
                       
                                         
                       
                       
                       <!-- Send button -->
                       <button class="btn btn-info btn-block" name='ajoutAct' type="submit">Send</button>
                       
                       </form>
                       <!-- Default form contact -->
            
            
               </div>
            </div>















                     <!-- Approach -->
                     <div class="card shadow mb-4" id='emp'>
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Employees</h6>
              </div>
              <div class="card-body">


              <?php
              echo"
              <table class='table'>
                         <thead class='thead-dark'>
                           <tr>
                             
                             <th scope='col'>Avatar</th>
                             <th scope='col'>login</th>
                             <th scope='col'>nom</th>
                             <th scope='col'>poste</th>
                             <th scope='col'>moderer</th>

                           </tr>
                         </thead>
                         <tbody>";
                         $sql="SELECT * FROM employees LIMIT 5 ;";
                 
                            $result =mysqli_query($con,$sql);
                           $resultCheck=mysqli_num_rows($result);
                           if($resultCheck!=0){
                             while($act=mysqli_fetch_assoc($result)){
                            echo"     
                          <tr>
                           
                            
                            <td> ";if ($act['avatar']) echo"<img src='{$act['avatar']}' alt='img' width='70'>"; echo"</td>
                            <th scope='row'>{$act['login']} </th>
                            <td>{$act['prenom']} {$act['nom']}</td>
                            <td>{$act['poste']}</td>
                            

                            <td>  
                                  <a class='btn btn-danger btn-block'class='btn btn-warning btn-block' href='dashboard.php?supEmp={$act['idEmployee']}' style='color:white;font-size:1em;'>Sup x</a>
                                  <br>";
                                  if($act['etat']==0)
                                  echo"
                                  <a class='btn btn-warning btn-block' href='dashboard.php?banEmp={$act['idEmployee']}' style='color:red;font-size:1em;'>ban <i class='fa fa-ban' aria-hidden='true'></i></a>";
                                  else
                                  echo"
                                  <a class='btn btn-info btn-block' href='dashboard.php?debanEmp={$act['idEmployee']}' style='color:white;font-size:1em;'>deban <i class='fa fa-ban' aria-hidden='true'></i></a>";
                            
                           echo" </td>
                        
                            
                          </tr>
                          ";}
                           }

                     
                           
                         echo"  
                         </tbody>
                   </table>";
                 

                  ?>





                       
            
            
               </div>
            </div>




            <!-- gggggg-->





                      <!-- Approach -->
                      <div class="card shadow mb-4" id='ent'>
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Entreprises</h6>
              </div>
              <div class="card-body">


              <?php
              echo"
              <table class='table'>
                         <thead class='thead-dark'>
                           <tr>
                             
                             <th scope='col'>Avatar</th>
                             <th scope='col'>login</th>
                             <th scope='col'>reseauSociale</th>
                             <th scope='col'>siegeSociale</th>
                             <th scope='col'>moderer</th>

                           </tr>
                         </thead>
                         <tbody>";
                         $sql="SELECT * FROM entreprises LIMIT 5 ;";
                 
                            $result =mysqli_query($con,$sql);
                           $resultCheck=mysqli_num_rows($result);
                           if($resultCheck!=0){
                             while($act=mysqli_fetch_assoc($result)){
                            echo"     
                          <tr>
                           
                            
                            <td> ";if ($act['avatar']) echo"<img src='{$act['avatar']}' alt='img' width='70'>"; echo"</td>
                            <th scope='row'>{$act['login']} </th>
                            <td>{$act['reseauSocial']} </td>
                            <td>{$act['siegeSocial']}</td>
                            

                            <td>  
                                  <a class='btn btn-danger btn-block'class='btn btn-warning btn-block' href='dashboard.php?supEnt={$act['idEntreprise']}' style='color:white;font-size:1em;'>Sup x</a>
                                  <br>";
                                  if($act['etat']==0)
                                  echo"
                                  <a class='btn btn-warning btn-block' href='dashboard.php?banEnt={$act['idEntreprise']}' style='color:red;font-size:1em;'>ban <i class='fa fa-ban' aria-hidden='true'></i></a>";
                                  else
                                  echo"
                                  <a class='btn btn-info btn-block' href='dashboard.php?debanEnt={$act['idEntreprise']}' style='color:white;font-size:1em;'>deban <i class='fa fa-ban' aria-hidden='true'></i></a>";
                            
                           echo" </td>
                        
                            
                          </tr>
                          ";}
                           }

                     
                           
                         echo"  
                         </tbody>
                   </table>";
                 

                  ?>





                       
            
            
               </div>
            </div>




            <!-- gggggg-->

             </div>

            

            
          </div>

        </div>
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                
                
                </div>
                
            </div>
        </div>
    </div>
   
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Company Name</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Company Name © 2017</p>
            </div>
        </footer>
    </div>
    <div>
</div>
    
    <style>
   
    
    
    </style>
    
    
   

  
  <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
	<script src='chart/chart.min.js'></script>
	
  <script>


var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var myObj = JSON.parse(this.responseText);
    
    
    let myChart = document.getElementById('myChart').getContext('2d');
    

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        ///cities from php using json
        labels: myObj.cities,
        datasets:[{
         // label:'Population',
          data:  myObj.statistics,
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(54, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(54, 100, 120, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 202, 255, 0.6)',
            'rgba(20, 100, 124, 0.6)',
            'rgba(25, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Statistique d\'inscription des emlpoyés selon le mois.',
          fontSize:25
        },
        
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });



  }
};
xmlhttp.open("GET", "sendforchart.php", true);
xmlhttp.send();
  </script>
  
  
</body>

</html>



<?php 
session_start();
include'../connecttodb.php';

echo"<div class='row  ' id='contenujob' style='min-width:70% ; background: white;
  padding: 15px 10px 5px 10px;
  
  border-radius: 4px;
  margin-bottom: 20px;'>
  <div class='profile' >
    <div class='container-fluid'>
     <div class='row p-3' style='color: #333333;

  
     '>

     <h3 style='font-weight:bold;'>Salaire</h3></div>
      <div class='row p-3'>";

          
          $sql="SELECT * FROM `salaire`";
          $req=mysqli_query($con,$sql);

          if(mysqli_num_rows($req)!=0){
            echo"<table class='table'>
            <thead>
              <tr>
                <th style='color: #224396;'>Poste</th>
                <th style='color: #224396;'>MinSalaire </th>
                <th style='color: #224396;'>MaxSalaire</th>
              </tr>
            </thead>
            <tbody>
            
              ";
           
            while($sal=mysqli_fetch_assoc($req)){
              echo"
              
              <tr>
                <td>{$sal['poste']}</td>
                <td>{$sal['minSalaire']}</td>
                <td>{$sal['maxSalaire']}</td>
              </tr>
              
                ";
            }
            echo" </tbody>
            </table>";
          }
          
          
          
          
    echo"      
  </div>
  </div>

 </div>
</div>";?>
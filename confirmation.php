<?php
session_start();
 include_once 'connecttodb.php'; 


 if(isset($_POST['connecter'])){


           $sql="SELECT * FROM Employees;";
           
           $result =mysqli_query($con,$sql);
            $resultCheck=mysqli_num_rows($result);
     $j=0;
 if( isset($_SESSION['pwduser']) || !isset($_GET['signup']) )     { $_SESSION['user']=0;unset($_SESSION['pwduser']);}  
if($resultCheck > 0){
    while($g =mysqli_fetch_assoc($result)){ 
        
       
  if ($g['email']==$_POST['email']   && $g['password']== $_POST['password'] ) {  $i=1;
                                                                                 
                                                                                 
                     // remove all session variables
                    session_unset();
                                                                                
                $_SESSION['idEmp']=$g['idEmployee'];
                if(is_null($g['avatar'])){
                 $_SESSION['avatar']='images/avatarpd.png';
                 }else{   $_SESSION['avatar']=$g['avatar'];}
                 if(is_null($g['backImage'])){
                    $_SESSION['backImage']='images/backpd.png';
                    }else{   $_SESSION['backImage']=$g['backImage'];}
                   break;
                  
                     }
   else {$i=0 ;
         
         if ($g['email']==$_POST['email'] ) {
             
          
            $_SESSION['user']=++$j;
             $_SESSION['pwduser']=0;
        }
    
             } 
    
                 } 
                     }
if($i==0){  header("Location: userloged.php?signup=failed") ;
        }
else {
 header("Location: profileEmp.php");
     }
    }


if(isset($_POST['Entconnect'])){ 

    
        $sql="SELECT * FROM Entreprises;";
        $result =mysqli_query($con,$sql);
         $resultCheck=mysqli_num_rows($result);
  $j=0;
if( isset($_SESSION['pwduser']) || !isset($_GET['signup']) )     { $_SESSION['user']=0;unset($_SESSION['pwduser']);}  
if($resultCheck > 0){
 while($g =mysqli_fetch_assoc($result)){ 
     
    
if ($g['login']==$_POST['login']   && $g['password']== $_POST['password'] ) {  $i=1;
                                                                              
                                                                              
                  // remove all session variables
                 session_unset();
                                                                             
             $_SESSION['idEnt']=$g['idEntreprise'];
             if(is_null($g['avatar'])){
              $_SESSION['avatar']='images/avatarep.png';
              }else{   $_SESSION['avatar']=$g['avatar'];}
              if(is_null($g['backImage'])){
                 $_SESSION['backImage']='images/backpd.png';
                 }else{   $_SESSION['backImage']=$g['backImage'];}
                break;
               
                  }
else {$i=0 ;
      
      if ($g['login']==$_POST['login'] ) {
          
       
         $_SESSION['user']=++$j;
          $_SESSION['pwduser']=0;
     }
 
          } 
 
              } 
                  }
if($i==0){  header("Location: userlogedEntr.php?signup=failed")  ;
     }
else {
header("Location: profileEntr.php");
  }



    }


    
       

?>   
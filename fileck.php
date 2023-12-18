<?php

  session_start();
    include_once "connecttodb.php";

    
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
if(isset($_POST['coverture'])){
// Check if file already exists
if (file_exists($target_file)) {
    $sql=" UPDATE `employees` SET `backImage` = '$target_file' WHERE idEmployee = {$_SESSION['idEmp']};";
         $req=mysqli_query($con,$sql);
       $_SESSION['backImage']=$target_file;
        //UPDATE `client` SET `avatar` = 'pic' WHERE `client`.`idClient` = 1;

      header("Location: profile.php");
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 6000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

  // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $sql=" UPDATE `employees` SET `backImage` = '$target_file' WHERE idEmployee = {$_SESSION['idEmp']};";
         $req=mysqli_query($con,$sql);
       $_SESSION['backImage']=$target_file;
        //UPDATE `client` SET `avatar` = 'pic' WHERE `client`.`idClient` = 1;

      header("Location: profileEmp.php");
        
        
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}}
 
if(isset($_POST['profile'])){
    // Check if file already exists
    if (file_exists($target_file)) {
        $sql=" UPDATE `employees` SET `avatar` = '$target_file' WHERE idEmployee = {$_SESSION['idEmp']};";
             $req=mysqli_query($con,$sql);
           $_SESSION['avatar']=$target_file;
            //UPDATE `client` SET `avatar` = 'pic' WHERE `client`.`idClient` = 1;
    
          header("Location: profile.php");
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
      // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $sql=" UPDATE `employees` SET `avatar` = '$target_file' WHERE idEmployee = {$_SESSION['idEmp']};";
             $req=mysqli_query($con,$sql);
           $_SESSION['avatar']=$target_file;
            //UPDATE `client` SET `avatar` = 'pic' WHERE `client`.`idClient` = 1;
    
          header("Location: profileEmp.php");
            
            
            
        } else {
            echo "Sorry, profile img !!!!!there was an error uploading your file.";
        }
    }}
    if(isset($_POST['cngImgE']) ){
        // Check if file already exists
        $q=$_POST['idE'];
        if (file_exists($target_file)) {
           
              
        
            header("Location: profileEnt.php?q=$q");
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
          // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
           
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $sql=" INSERT INTO `photo`( `src`, `idEntreprise`) VALUES ('$target_file','$q');";
                 $req=mysqli_query($con,$sql);
               
        
            header("Location: profileEnt.php?q=$q");
                
                
                
            } else {
                echo "Sorry, profile img !!!!!there was an error uploading your file.";
            }
        }}
if(isset($_POST['ajoutAct'])){
            $titre=$_POST['titre'];
            $description=$_POST['description'];
            $dateFin=$_POST['dateF'];
            $dateD=date('Y-m-d');

                
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) {
echo "File is an image - " . $check["mime"] . ".";
$uploadOk = 1;
} else {
echo "File is not an image.";
$uploadOk = 0;
}





// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
echo "Sorry, your file is too large.";
$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
   echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
   $sql="INSERT INTO `actualite`( `titre`, `description`, `dateDebut`, `dateFin`, `etat`, `image`) 
   VALUES ('$titre','$description','$dateD','$dateFin',0,'$target_file')";
    $req=mysqli_query($con,$sql);
    header("Location: dashboard.php#ajac");

 
   
   
   
} else {
   echo "Sorry, profile img !!!!!there was an error uploading your file.";
}
}}

            

         
          
         





         

?>
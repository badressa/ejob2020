<?php
$myObj = new \stdClass();
session_start();
include_once "connecttodb.php"; 

$sql="SELECT * FROM employees;";
                 
$result =mysqli_query($con,$sql);
$resultCheck=mysqli_num_rows($result);
$janvier=$fevrier=$mars=$avril=$mai=$juin=$juillet=$aout=$septembre=$octobre=$novembre=$decembre=0;



if($resultCheck!=0){
    while($t=mysqli_fetch_assoc($result)){
        $mois=$t['dateInscription'];
        
        $mois=explode('-',$mois);
        $d=date('Y');
        if($d=$mois[0]){
            switch ($mois[1]) {
                case 1:
                    $janvier++
                             ;
                    break;
                case 2:
                    $fevrier++;
                    break;
                case 3:
                    $mars++;
                    break;
                case 4:
                    $avril++;
                    break;
                case 5:
                    $mai++;
                    break;
                case 6:
                    $juin++;
                    break;      
                case 7:
                    $juillet++;
                    break; 
                case 8:
                    $aout++;
                    break;
                case 9:
                    $septembre++;
                    break; 
                case 10:
                    $octobre++;
                    break; 
                case 11:
                    $novembre;
                    break; 
                case 12:
                    $decembre;
                    break; 
                                           
            }
        }
        
        
    }
}


$myObj->cities = ["janvier","février","mars","avril","mai","juin","juillet","août","septembre" ,"octobre","novembre","décembre" ] ;
$myObj->statistics =[ 
    $janvier,$fevrier,$mars,$avril,$mai,$juin,$juillet,$aout,$septembre,$octobre,$novembre,$decembre
];

                  


$myJSON = json_encode($myObj) ;

echo $myJSON  ;
?>
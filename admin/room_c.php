<?php
$cat = $_POST['category'];
$cat_code = "";
if($cat == 4){
    $cat_code = "DR";
}
elseif($cat == 7){
    $cat_code = "PR";
}
elseif($cat == 8){
    $cat_code = "SR";
}
else{
    $cat_code = "SUPR";
}
echo $cat_code;
?>

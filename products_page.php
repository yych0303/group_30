<?php
$req = $_SERVER['QUERY_STRING'];
$npage = $_GET['npage'];
if($pre = strstr($req, '&npage=')){
    $req = str_replace($pre, "", $req);
}
if($pre = strstr($req, '&page=')){
    $req = str_replace($pre, "", $req);
}
$req.="&page=" . $npage;
header("Location:products.php?$req");
?>
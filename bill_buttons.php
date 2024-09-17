<?php
include "level/level_1.php";

/* 
-7已退貨
-5訂單退貨申請中>>-7 m5
-3訂單取消申請中>>-1 m3
-1訂單取消
0訂單未成立>>m1
1訂單已下單>>m-1 3
3訂單已發貨>>m-3 5
5訂單已送達>>m-5

*/
$s = "";
if($state < 0){
    $s = "取消申請";
}
if($state == 3 || $state == 1){
    $s = "訂單取消";
}
if($state == 5){
    $s = "訂單退貨";
}
$stnext = 9;
switch ($state) {
    case -5:
        $stnext = -7;
        break;
        case -3:
            $stnext = -1;
            break;
                case 1:
                    $stnext = 3;
                    break;
                    case 3:
                        $stnext = 5;
                        break;
                                                                    
    default:
        # code...
        break;
}
$arr_stnext = array('-7' => '批准退貨', '-1' => '批准取消', '3' => '已發貨', '5' => '已送達');
$btns = "";
if($_SESSION["level"] != 9){
    if($state == 0) $btns.="<a href = './bill_state.php?bid=$bill_id&state=$state&to=1' class='btn btn-primary px-4 me-md-2'>送出訂單</a>";
    else if($state != -7)$btns.="<a href = './bill_state.php?bid=$bill_id&state=$state&to=-$state' class='btn btn-danger btn-lg px-4 me-md-2'>$s</a>";
}
if($_SESSION["level"] == 9 && $stnext != 9){
    if($state == -3 || $state == -5)$btns.="<a href = './bill_state.php?bid=$bill_id&state=$state&to=-$state' class='btn btn-danger px-4 me-md-2'>拒絕申請</a>";
    $btns.="<a href = './bill_state.php?bid=$bill_id&state=$state&to=$stnext' class='btn btn-warning px-4 me-md-2'>$arr_stnext[$stnext]</a>";
}

?>


<?php
session_start();

if(isset($_SESSION["item"])){
    $msg = $_SESSION["item"];
}else{
    $msg="";
}
$id = $_POST["id"];

$result = explode(",",$msg);
$number = count($result);

$have = false;
for($i = 0 ;$i<$number;$i++){
    $spliteText = explode("|",$result[$i]);
    
    if($spliteText[0]==$id){
        $add = intval($spliteText[1]);
        $add +=1;
        $spliteText[1] = strval($add);
        $have = true;
        break;
    }
}

if(!$have)
{
    if($msg == "")
    {
        $msg = $id . "|1";
        
    }
    else
    {
        $msg += "," . $id . "|1";
        
    }
}
else
{
    $msg = implode(",", $result);
    // echo $msg;
    
}

$_SESSION["item"] = $msg;

?>
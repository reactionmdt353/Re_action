<?php
require("connector.php");
if($connection){
    $info=[];
    $type=[];
    $id= $_POST["id"];
    //$type = $_POST["type"];
    $url = $_FILES['imageurl']['tmp_name'];
    
    $file_name = $_FILES['imageurl']['name'];
    $path = "image/".$file_name;
    chmod("../image", 0777);
    if(move_uploaded_file($url,"../image/".$file_name))
    {
        echo "Moved";
        chmod("../image/".$file_name, 0777);
    }
    echo "$id";
    $query = "UPDATE Popular_TB SET imageurl='$path' WHERE id='$id'";
    $result = mysqli_query($connection,$query);
    if($result){
        $type["type"] = "OK";
        $info[] = $type;
    }else{
        $type["type"] = "NO";
        $type["url"]  = $url;
        $type["file_name"] = $file_name;
        $type["path"] = $path;
        $info[]= $type;
    }
    echo json_encode($type);
}else{
    $type["status"]  ="true";
    $info[] = $type;
    echo json_encode($info);
}


?>
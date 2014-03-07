<?php
include "head.php";
include "db.php";

function upload_file()
{
    global $_FILES;
    $back_up_file = $_FILES['file']['name'];
    $src_name = $_FILES['file']['name'];
    $back_up_file = "back/".$src_name;
    if(move_uploaded_file($_FILES['file']['tmp_name'],$back_up_file))
    {
        return $back_up_file;
    }
    else
    {
        return -1;
    }

}

$file_type = $_POST['file_type'];
if($file_type == "re_build_stand")
{

    $is_exist = check_file_exist($_FILES['file']['name']);
    if($is_exist){
        print "file already store";
        return;
    }else{
        print "no file exits";    
    }
    
    $file_name = upload_file();
    if($file_name == -1)
    {
        print "error of upload file";
    }
    else
    {
        print $file_name;
    }
    
    //$file_type = $_GET["file_type"];
    
    $stand_array = load_process_file($file_name,4);
        //clear system
    clear_stand();
    //build new stand
    build_stand($stand_array,$file_name);
}
else if($file_type == "in_build_stand")
{
    
}
else if($file_type == "input_file"){
    
    
}

?>

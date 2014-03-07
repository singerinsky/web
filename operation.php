<?php
include "head.php";
include "db.php";

if($_GET['operation'] == "del_all")
{    
    clear_all_data();   
}else{
    
    print "unkown operation....";
}


?>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$db_conn = mysql_connect("127.0.0.1","root","");
if($db_conn == FALSE)print "can't connect to db,check config";

//mysql_set_charset($shareDatabase,"utf8");

mysql_select_db('yima') or die('database not exist');
mysql_query('set names utf8');

function get_all_bus_stand()
{
    $sql_trade = "select distinct act_id,trade_type, business_type, business_info from s_stand";
    $rst = mysql_query($sql_trade);
    if($rst == -1)return - 1;
    $all_data = array();
    while($row = mysql_fetch_array($rst))
    {
        $all_data[$row['act_id']] = $row;
    }
    return $all_data;    
}

function get_all_file_to_data()
{    
   $sql_str = "select distinct table_name,FROM_UNIXTIME(add_time) as add_time from act_info";
   $rst = mysql_query($sql_str);
   if($rst)return $rst;
   return -1;
}

$global_file_info = get_all_file_to_data();
$global_stand = get_all_bus_stand();


function show_all()
{
    // global $db_conn;
    $query = "select * from act_info";
    $rst = mysql_query($query);
    while($row = mysql_fetch_array($rst))
    {

    } 

}

function show_limit_index($file_name)
{
    // global $db_conn;
    $query = "select * from act_info where table_name='$file_name'";
    $rst = mysql_query($query);
    //while($row = mysql_fetch_array($rst))
    //{
    return $rst;    
    //} 

}

function check_file_exist($file_name)
{
    $query = "select * from act_info where table_name='$file_name'";
    $rst = mysql_query($query);
    $count = mysql_num_rows($rst);
    if($count == 0)return FALSE;
    return TRUE;
}

function load_process_file($file_name,$line_num)
{
    $file_handle = file($file_name);
    if($file_handle == FALSE)
    {
        print "error open file";
        return -1; 
    }


    $act_all = array();
    $row_num = 0;
    foreach($file_handle as $line)
    {
        if($row_num == 0)
        {
            $row_num = 1;
            continue;
        }
        $act_array = split(',',$line);
        if(count($act_array) != $line_num)
        {
            print "row $row_num data error ,check"."<br/>";
            return -2;
        }
        if(isset($act_all[$act_array[0]]))
        {
            print "ID ??".$act_array[0];
            return -3;
        }
        $act_all[$act_array[0]] = $act_array;
        $row_num++;
    }

    //add_actinfo_into_db($act_all,$file_name);

    return $act_all;
}

function clear_stand()
{
    $sql_str = "delete from s_stand";
    mysql_query($sql_str);    
}


function build_stand($act_all,$file_name)
{
    $time = time();
    $file_name_array = split("/",$file_name);
    $file_name = $file_name_array[1];
    $str = "INSERT INTO yima.s_stand (act_id,trade_type, business_type, business_info,add_time) VALUES ";

    $tmp_str = "";
    $i = 0;
    foreach($act_all as $act_info)
    {
        $tmp_str .= "(";
        for($j=0;$j<4;$j++)
        {
            $tmp_str .= "'$act_info[$j]',"; 
        }
        $tmp_str .= "'".$time."'),";
        
        if(($i%1000 == 0 )&&($i/1000 >= 1) || ($i + 1 == count($act_all)))
        {
            $tmp_str = substr($str.$tmp_str,0,-1);
            $a = mb_convert_encoding($tmp_str, 'UTF-8', 'GBK');
            print $a;
            if(!mysql_query($a))
            {
                print mysql_error(); 
               // print $a;
                break;
            }
            $tmp_str = "";
        }
        $i++;
        
    }
}


function add_actinfo_into_db($act_all,$file_name)
{
    global $global_stand;
    
    if($global_stand == -1)
    {
        print "please build stand file first";
        return;
    }
    
    $time = time();
    $file_name_array = split("/",$file_name);
    $file_name = $file_name_array[1];
    $str = "INSERT INTO yima.act_info (act_id, act_detail_name, act_name, company_id, 
        company_name, province, entrust_count,
        verify_count, table_name,add_time, trade_type, business_type, business_info) VALUES ";


    $tmp_str = "";
    $i = 0;
    foreach($act_all as $act_info)
    {
        $tmp_str .= "(";
        for($j=0;$j < 8;$j++)
        {
            $tmp_str .= "'$act_info[$j]',"; 
        }
        //判断是否存在标准
        if(isset($global_stand[$act_info[0]]))
        {
            $tmp_str .="'".$global_stand[$act_info[0]]['']."','".$global_stand[$act_info[0]]['']."','".$global_stand[$act_info[0]]['']."',"; 
        }
        else
        {
            $tmp_str .="'未知','未知','未知',";    
        }
        
        $tmp_str .= "'".$file_name."','".$time."'),";
        
        if(($i%1000 == 0 )&&($i/1000 >= 1) || ($i + 1 == count($act_all)))
        {
            $tmp_str = substr($str.$tmp_str,0,-1);
            $a = mb_convert_encoding($tmp_str, 'UTF-8', 'GBK');
            
            if(!mysql_query($a))
            {
                print mysql_error(); 
                print $a;
                break;
            }
            $tmp_str = "";
        }
        $i++;
        
    }
}

function clear_all_data()
{
    $str = "delete from act_info";
    mysql_query($str);    
}

function get_actinfo_by_business_name($bus_name)
{

}










?>

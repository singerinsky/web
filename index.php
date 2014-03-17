<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<style type="text/css">
<!--
body,table{
 font-size:12px;
}
table{
 table-layout:fixed;
 empty-cells:show; 
 border-collapse: collapse;
 margin:0 auto;
}
td{
 height:20px;
}
h1,h2,h3{
 font-size:12px;
 margin:0;
 padding:0;
}
 
.title { background: #FFF; border: 1px solid #9DB3C5; padding: 1px; width:90%;margin:20px auto; }
 .title h1 { line-height: 31px; text-align:center;  background: #2F589C url(th_bg2.gif); background-repeat: repeat-x; background-position: 0 0; color: #FFF; }
  .title th, .title td { border: 1px solid #CAD9EA; padding: 5px; }
 
//样式一
table.tab_css_1{
 border:1px solid #cad9ea;
 color:#666;
}
table.tab_css_1 th {
 background-image: url(th_bg1.gif);
 background-repeat::repeat-x;
 height:30px;
}
table.tab_css_1 td,table.tab_css_1 th{
 border:1px solid #cad9ea;
 padding:0 1em 0;
}
table.tab_css_1 tr.tr_css{
 background-color:#f5fafe;
}
 
//样式二
table.tab_css_2{
 border:1px solid #9db3c5;
 color:#666;
}
table.tab_css_2 th {
 background-image: url(th_bg2.gif);
 background-repeat::repeat-x;
 height:30px;
 color:#fff;
}
table.tab_css_2 td{
 border:1px dotted #cad9ea;
 padding:0 2px 0;
}
table.tab_css_2 th{
 border:1px solid #a7d1fd;
 padding:0 2px 0;
}
table.tab_css_2 tr.tr_css{
 background-color:#e8f3fd;
}
 
//样式三
table.tab_css_3{
 border:1px solid #fc58a6;
 color:#720337;
}
table.tab_css_3 th {
 background-image: url(th_bg3.gif);
 background-repeat::repeat-x;
 height:30px;
 color:#35031b;
}
table.tab_css_3 td{
 border:1px dashed #feb8d9;
 padding:0 1.5em 0;
}
table.tab_css_3 th{
 border:1px solid #b9f9dc;
 padding:0 2px 0;
}
table.tab_css_3 tr.tr_css{
 background-color:#fbd8e8;
}
 
.hover{
   background-color: #53AB38;
   color: #fff;
}
 
-->
</style>
<script type="text/javascript">
 function ApplyStyle(s){
  document.getElementById("mytab").className=s.innerText;
 }
 
 $(function(){
       addHover('mytab');
 });
 
    /**
  * 在鼠标悬停时突出显示行--jQuery处理表格  
  *
  * @tab table id
  */
 function addHover(tab){
    $('#'+tab+' tr').hover(
       function(){
          $(this).find('td').addClass('hover');
       },
    function(){
       $(this).find('td').removeClass('hover');
    }
    );
 }
</script>
</head>

<body>
 <div>
  <a href="add_info.php">添加数据操作</a>
  
 </div>

<table id="mytab"  border="2" class="tab_css_1">
    <tr class="tr_css">
        <td>
            输入数据文件
        </td>
        <td>
            输入时间
        </td>
        <td>
            操作
        </td>
    </tr>
    <tr class="tr_css">
       
<?php
include "db.php";
if($global_file_info != -1){
while($row = mysql_fetch_array($global_file_info))
{
    ?>
     <td>
        <?=$row['table_name']?>    
     </td>
     <td>
        <?=$row['add_time']?>
     </td>
     <td>
        <a href="main.php?table_name=<?=$row['table_name']?>&file_time=<?=$row['add_time']?>">详细</a><br/>
    </td>

    <?
}
}
?>

</tr>
</table>
</body>
</html>

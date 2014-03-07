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
<form action="operation.php" method="get" >
    <select name="operation">
        <option value="del_all">delall</option>
        <option value="show_all">show_all</option>
    </select>
    <input type="submit" name="submit" value="Submit" />
</form>
    
<?php
include "db.php";
$file_name = "Book.1";
$rst = show_limit_index($file_name);

?>
<div>
 录入时间:<br/>
 数据来源文件:<font size="10"><?=$file_name?></font></br>
</div>
<table id="mytab"  border="1" class="tab_css_1">
    <tbody>
        <tr class="tr_css">
            <td style="WORD-WRAP: break-word" bgcolor="#fdfddf">            
            活动号
            </td>
            <td style="WORD-WRAP: break-word" bgcolor="#fdfddf">            
            活动详称
            </td>
             <td style="WORD-WRAP: break-word" bgcolor="#fdfddf">            
            活动简称
            </td>
             <td style="WORD-WRAP: break-word" bgcolor="#fdfddf">            
            业务商号
            </td>
             <td style="WORD-WRAP: break-word" bgcolor="#fdfddf">            
            业务商名称
            </td>
             <td style="WORD-WRAP: break-word" bgcolor="#fdfddf">            
            省份
            </td>
             <td style="WORD-WRAP: break-word" bgcolor="#fdfddf">            
            行业类型
            </td>
             <td style="WORD-WRAP: break-word" bgcolor="#fdfddf">            
            业务类型
            </td>
             <td style="WORD-WRAP: break-word" bgcolor="#fdfddf">            
            业务项
            </td>
             <td style="WORD-WRAP: break-word" bgcolor="#fdfddf">            
            委托笔数
            </td>
             <td style="WORD-WRAP: break-word" bgcolor="#fdfddf">            
            验证笔数
            </td>

        </tr>

<?php

$i =0;
while($row = mysql_fetch_array($rst))
{
    if($i%2 == 1){
?>
        <tr>
            <?
    }else{
            ?>
            <tr class="tr_css">
            <?
    }
    $i++
            ?>
            <td >            
            <?php print $row['act_id']; ?>
            </td>
  <td >            

            <?php print $row['act_detail_name']; ?>
            </td>
  <td >            
            <?php print $row['act_name']; ?>
            </td>
  <td >            
            <?php print $row['company_id']; ?>
            </td>
  <td >            
            <?php print $row['company_name']; ?>
            </td>
  <td >            
            <?php print $row['province']; ?>
            </td>
  <td >            
            <?php print $row['trade_type']; ?>
            </td>
  <td >            
            <?php print $row['business_type']; ?>
            </td>
  <td >            
            <?php print $row['business_info']; ?>
            </td>
  <td >            
            <?php print $row['entrust_count']; ?>
            </td>
  <td >            
            <?php print $row['verify_count']; ?>
            </td>
        </tr>
<?php
}
?>
    </tbody>
    </table>
</body>


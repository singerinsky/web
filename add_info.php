<?
include "head.php";
?>
<html>
<body>
<form action="upload.php" method="post"
enctype="multipart/form-data">
    <select name="file_type">
        <option value="re_build_stand">重新建立标准
        </option>
        <option value="in_build_stand">增量建立标准            
        </option>
        <option value="input_file"> 上传处理文件           
        </option>
    </select>
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>

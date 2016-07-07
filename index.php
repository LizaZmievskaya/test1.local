<!DOCTYPE>
<html>
<body>
<form enctype="multipart/form-data" method="post" action="?do=register">
<input name="name"  type="text" placeholder="Name"></br>
<input name="email" type="text" placeholder="Emali"></br>
<input name="submit" type="submit" value="Submit"></br>
<input name="file" type="file">
</form>
<pre>
<?php
if($_GET["do"]="register"){
var_dump($_GET);
var_dump($_POST);
var_dump($_SERVER);
echo file_get_contents("php://input");
}
?>
</pre>
</body>
</html>

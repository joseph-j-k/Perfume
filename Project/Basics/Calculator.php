<?php 
$result="";
if(isset($_POST["btn_add"]))
{
	 $num1 = $_POST['txtnum1'];
	 $num2 = $_POST['txtnum2'];
	
	 $result = $num1 + $num2;
	
}

if(isset($_POST["btn_sub"]))
{
	 $num1 = $_POST['txtnum1'];
	 $num2 = $_POST['txtnum2'];
	
	 $result = $num1 - $num2;
	
}


if(isset($_POST["btn_mul"]))
{
	 $num1 = $_POST['txtnum1'];
	 $num2 = $_POST['txtnum2'];
	
	 $result = $num1 * $num2;
	
}

if(isset($_POST["btn_div"]))
{
	 $num1 = $_POST['txtnum1'];
	 $num2 = $_POST['txtnum2'];
	
	 $result = $num1 / $num2;
	
}
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>

<form action="" method="post">
<table width="200" border="1">
  <tr>
    <td>Number 1</td>
    <td><label for="txtnum1"></label>
      <input type="text" name="txtnum1" id="txtnum1" /></td>
  </tr>
  <tr>
    <td>Number 2</td>
    <td><label for="txtnum2"></label>
      <input type="text" name="txtnum2" id="txtnum2" /></td>
  </tr>
  <tr>
    <td colspan="2">
    <input type="submit" name="btn_add" id="btn_add" value="Add" />
    <input type="submit" name="btn_sub"  id="btn_sub" value="Sub"/>
      <input type="submit" name="btn_mul"  id="btn_mul" value="Mul"/>
        <input type="submit" name="btn_div"  id="btn_div" value="Div"/>
    </td>
  </tr>
  <tr>
    <td><label>Result</label></td>
    <td><?php echo $result; ?></td>
  </tr>
</table>
</form>

</body>
</html>
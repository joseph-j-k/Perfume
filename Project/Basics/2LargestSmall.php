<?php

$largest= "";
$smallest= "";
if(isset($_POST["btn_result"])) {
	
	$number1 = $_POST["txt_num1"];
	$number2 = $_POST["txt_num2"];
	
	if($number1 >= $number2) {
		$largest = $number1;
							 }
		
	 else{
		$largest = $number2;
		}
			
			
	if($number1 <= $number2) {
		$smallest = $number1;
							 }
		
	else{
		$smallest = $number2;
		}
	
	}

 ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>


<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Number1</td>
      <td>
      <input type="text" name="txt_num1" id="txt_num1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txt_num2"></label>
      <input type="text" name="txt_num2" id="txt_num2" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input name="btn_result" type="submit" value="Result" /></td>
    </tr>
    <tr>
      <td>Largest</td>
      <td><?php echo $largest ?></td>
    </tr>
    <tr>
      <td>Smallest</td>
      <td><?php echo $smallest ?></td>
    </tr>
  </table>
</form>
</body>
</html>
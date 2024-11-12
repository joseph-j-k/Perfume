<?php 
include("Head.php");
include('../Assets/Connection/Connection.php');
if(isset($_POST["btn_submit"]))
{
	$type = $_POST["txt_name"];
	$sel = "select * from tbl_type where type_name = '".$type."'";
	$result = $conn -> query($sel);
	
	if($row = $result -> fetch_assoc())
	{
		echo "<script>
			alert(\"Alerdy Exist\");
			window.location='Type.php';
			</script>";
		
		}
		
		
		else
		{
			
			$insQry = "insert into tbl_type(type_name)values('".$type."')";
			if($conn -> query($insQry))
			{
				
				echo "<script>
					 alert(\"Inserted\");
					 window.location='Type.php';
					 </script>";
				
				}
			
			}
	
	}

?>


<?php 

if(isset($_GET["del"]))
{
	
	$del = "delete from tbl_type where type_id ='".$_GET["del"]."'";
	$conn -> query($del);
	echo "<script>
		 alert(\"Deleted\");
		 window.location='Type.php';
		 </script>";
	
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Type</title>
<style>
  .body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 60px;
  }

  form {
    width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #869897;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  th, td {
    padding: 10px;
    text-align: left;
  }

  th {
    background-color: #f0f0f0;
  }

  input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #9ABFAB;
  }

  input[type="submit"] {
    background-color: #89b36c;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
    width: 100%;
  }

  input[type="submit"]:hover {
    background-color: #a1c289;
  }

  .actions a {
    text-decoration: none;
    padding: 5px 10px;
    background-color: #2196F3;
    color: white;
    border-radius: 4px;
  }

  .actions a.delete {
    background-color: #f44336;
  }

  .actions a:hover {
    opacity: 0.8;
  }

</style>
</head>

<body>
<form id="form" name="form" method="post" action="">
  <table>
    <tr>
      <td>Type&nbsp;Name</td>
      <td><label for="txt_name"></label>
       <input type="text" name="txt_name" id="txt_name" required autocomplete="off"/>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <br /> <br /> <br />
  
  <table>
    <tr>
      <td>Slno</td>
      <td>Type</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$selQry = "select * from  tbl_type";
	$result = $conn -> query($selQry);
	while($row = $result -> fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row["type_name"]?></td>
      <td><a href="Type.php?del=<?php echo $row["type_id"];?>">Delete</a></td>
    </tr>
    <?php } ?>
    
    
  </table>
</form>
</body>
</html>

<?php include("Foot.php"); ?>
<?php include("Head.php"); ?>
<?php
include("../Assets/Connection/Connection.php");

if(isset($_POST['btn_submit'])){
	
	$district = $_POST['txt_Dname'];
	$hid = $_POST['txthidden'];
	
	if($hid != ""){
		
		$update = "update tbl_district set district_name='".$district."' where district_id = '".$hid."'";
		
	   	if($conn -> query($update)){
		   		?>
<script>
				alert("Updated");
				window.location = "District.php";
				</script>
<?php
		   }
		}
	
	else {
		
	$insqry="insert into tbl_district(district_name)values(
	'".$district."')";
	
	if($conn -> query($insqry)){
		
		?> 
<script>
		alert("Inserted");
		window.location = "District.php";
		</script>
<?php
		
		}
		
	}
	
}
?>
<?php	
if(isset($_GET["did"])){
		
		$delQry = "delete from tbl_district where district_id =
		'".$_GET["did"]."'";
		
		if($conn -> query($delQry)){
		
		?>
<script>
		alert("Deleted");
		window.location = "District.php";
		</script>
<?php
		}
		
		
	}
	
	?>
<?php   
	
	
$eid = "";
$ename = "";	
if(isset($_GET["eid"])){
	$selQuery = "select * from tbl_district where district_id = '".$_GET["eid"]."'";
	 $result = $conn -> query($selQuery);
	 if($data = $result -> fetch_assoc()){
		 $eid = $data["district_id"];
		 $ename = $data["district_name"];
	}
	
}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
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
    background-color:#9ABFAB;
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
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td>District&nbsp;Name</td>
      <td><input type="hidden" name="txthidden" value="<?php echo $eid ?>"/></td>
      <td><label for="txt_Dname"></label>
        <input type="text" name="txt_Dname" id="txt_Dname" value="<?php echo $ename?>"  required autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <br/>
  <br/>
  <table>
    <tr>
      <td>SlNo</td>
      <td>District Name</td>
      <td colspan="2" align="center">Action</td>
    </tr>
    <?php 
	 $i = 0;
	 $selQry = "select * from  tbl_district";
	 $result = $conn -> query($selQry);
	 while($data = $result -> fetch_assoc()){
	 $i++;
	?>
    <tr>
      <td><?php echo "$i"?></td>
      <td><?php echo $data["district_name"] ?></td>
      <td><a href="District.php?eid=<?php echo $data["district_id"]?>">Edit</a></td>
      <td><a href="District.php?did=<?php echo $data["district_id"]?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>

<?php include("Foot.php"); ?>
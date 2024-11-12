<?php include("Head.php"); ?>
<?php 

include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"])){
	$place = $_POST["selplace"];
	$location = $_POST["txt_locality"];
	$selQryOne = "select * from  tbl_locality where locality_name = '".$location."'";
	$resultOne = $conn -> query($selQryOne);
	
	
	if($row = $resultOne -> fetch_assoc())
	{
		
		?>
<script>
		alert('Already Exisit');
		window.location = 'Locality.php';
        </script>
<?php 
	}
	
	else
	{
	
		$insQry = "insert into tbl_locality(locality_name,place_id)values('".$location."','".$place."')";
	
		if($conn -> query($insQry))
		{
		
		?>
<script>
		alert('Inserted');
		window.location='Locality.php';
        </script>
<?php 
		}
	
	}
	
}

?>

<?php 

if(isset($_GET["dId"]))
{
	$del = "delete from tbl_locality where locality_id = '".$_GET["dId"]."'";
	$conn -> query($del);
	
?>

<script>
alert('Deleted');
window.location = "Locality.php";
</script>
	
    <?php 
	
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Locality</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        form {
            width: 500px;
            margin: 50px auto;
            padding: 50px;
            background-color: #869897;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50;
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
            background-color: #6e8f56;
            color: white;
        }

        input[type="text"], select {
            width: calc(100% - 16px); /* Adjust for padding */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: -10px;
            box-sizing: border-box;
            background-color:#9ABFAB;
        }

        input[type="submit"] {
            background-color: #89b36c;
            color: white;
            border: none;
            padding: 10px;
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
            margin-right: 5px;
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
      <td>Place</td>
      <td><label for="selplace"></label>
        <select name="selplace" id="selplace">
          <option>----Select----</option>
          <?php 
	   $selQry = "select * from tbl_place";
	   $result = $conn -> query($selQry);
	   while($row = $result -> fetch_assoc())
	   {
	   ?>
          <option value="<?php echo $row["place_id"];?>"><?php echo $row["place_name"];?></option>
          <?php } ?>
        </select></td>
    </tr>
    <tr>
      <td>Location</td>
      <td><label for="txt_locality"></label>
        <input type="text" name="txt_locality" id="txt_locality" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <br/>
  <br/>
  <table>
    <tr>
      <th>SlNo</th>
      <th>District</th>
      <th>Place</th>
      <th>Location</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
    <?php 
	$selQry = "select * from tbl_locality l inner join tbl_place p on l.place_id = p.place_id inner join tbl_district d on d.district_id = p.district_id";
	$result = $conn -> query($selQry);
	$i=0;
	while($row = $result -> fetch_assoc())
	{
		$i ++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row["district_name"];?></td>
      <td><?php echo $row["place_name"];?></td>
      <td><?php echo $row["locality_name"];?></td>
      <td><a href="Locality.php?dId=<?php echo $row["locality_id"];?>">Delete </a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>

<?php include("Foot.php"); ?>
<?php include("Head.php"); ?>
<?php

include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"])){
	
	$place = $_POST["txt_place"];
	$district = $_POST["selDistrict"];
	
	
	$insQry = "insert into tbl_place(place_name, district_id) values('".$place."', '".$district."')";
	
	if($conn -> query($insQry)){
			
		echo"<script>
		alert('Inserted');
		window.location = 'Place.php';
		</script>";
		
		}
	
	}


	if(isset($_GET["did"]))
	{
		$delQry = "delete from tbl_place where place_id = '".$_GET["did"]."'";
		if($conn -> query($delQry))
		{
	
 echo"<script>
		alert('Deleted');
		window.location = 'Place.php';
		</script>";
 
		}
	}


 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        form {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
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
            background-color: #4CAF50;
            color: white;
        }

        input[type="text"], select {
            width: calc(100% - 16px); /* Adjust for padding */
            padding: 8px;
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
<form id="form" name="form" method="post" action="">
  <table>
    <tr>
      <td>District</td>
      <td><label for="selDistrict"></label>
      <select name="selDistrict" id="selDistrict" required autocomplete="off">
          <option>----Select----</option>
          <?php 
	  $selQry ="select * from  tbl_district";
	  $result = $conn -> query($selQry);
	  while($data = $result -> fetch_assoc())
	  {	  
	  ?>
          <option value="<?php echo $data["district_id"]?>"><?php echo $data["district_name"];?></option>
        <?php } ?>
        </select>
        </td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
        <input type="text" name="txt_place" id="txt_place"  required autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <br/>
  <table>
    <tr>
      <td>slno</td>
      <td>District</td>
      <td>Place</td>
      <td>Actions</td>
    </tr>
    <?php
  $i=0;
  $selQry = "select * from tbl_place p inner join tbl_district d on d.district_id = p.district_id";
   $result = $conn -> query($selQry);
   while($data = $result -> fetch_assoc())
   {
  
  	$i++;
  
   ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["district_name"] ?></td>
      <td><?php echo $data["place_name"] ?></td>
      <td><a href="Place.php?did=<?php echo $data["place_id"]?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>

<?php include("Foot.php"); ?>
<?php include("Head.php"); ?>

<?php include("../Assets/Connection/Connection.php"); ?>
<?php 
if(isset($_GET["accept"]))
{
	
	$update = "update tbl_shop set shop_status = '1' where shop_id = '".$_GET["accept"]."'";
	if($conn -> query($update))
	{
		echo "<script>	
				alert('Verification Successful');
			    window.location='ShopVerification.php';
			  </script>";
		
		}
		
		else
		{
			
			echo "<script>
					alert('Verification Failed');
                    window.location='ShopVerification.php';
				  </script>";
			
			}
	
	
	}
	
	
	
	
	if(isset($_GET["reject"]))
{
	
	$update = "update tbl_shop set shop_status = '2' where shop_id = '".$_GET["reject"]."'";
	if($conn -> query($update))
	{
		echo "<script>	
				alert('Verification Unsuccessful');
			    window.location='ShopVerification.php';
			  </script>";
		
		}
		
		else
		{
			
			echo "<script>
					alert('Verification Failed');
                    window.location='ShopVerification.php';
				  </script>";
			
			}
	
	
	}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Verification</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }

    form {
        width: 100%;
        padding: 25px;
        background-color:#869897;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin-top: 100px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }

    th, td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    td {
        background-color: #9ABFAB;
    }

    .actions a {
        text-decoration: none;
        padding: 8px 15px;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        margin-right: 10px;
        display: inline-block;
    }

    .actions a.delete {
        background-color: #f44336;
    }

    .actions a:hover {
        opacity: 0.8;
    }

    img {
        border-radius: 5px;
    }

    input[type="submit"], .actions a {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
    }

    input[type="submit"]:hover, .actions a:hover {
        background-color: #45a049;
    }

</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td>SlNo</td>
      <td>Name</td>
      <td>Contact</td>
      <td>Email</td>
      <td>Address</td>
      <td>Photo</td>
      <td>Proof</td>
      <td>District</td>
      <td>Place</td>
      <td>Location</td>
      <td colspan="2" align="center">Action</td>
    </tr>
    <?php
	$i=0; 
	$sel = "select * from tbl_shop s inner join tbl_locality l on l.locality_id  = s.shop_location inner join tbl_place p on p.place_id = l.place_id inner join tbl_district d  on d.district_id = p.district_id where shop_status = 0";
	$result = $conn -> query($sel);
	while($row = $result -> fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row["shop_name"] ?></td>
      <td><?php echo $row["shop_contact"] ?></td>
      <td><?php echo $row["shop_email"] ?></td>
      <td><?php echo $row["shop_address"] ?></td>
      <td><img src="../Assets/Files/Shop/<?php echo $row["shop_logo"] ?>" width="50" height="50"/></td>
      <td><img src="../Assets/Files/Shop/<?php echo $row["shop_proof"] ?>" width="50" height="50"/></td>
      <td><?php echo $row["district_name"] ?></td>
      <td><?php echo $row["place_name"] ?></td>
      <td><?php echo $row["locality_name"] ?></td>
      <td>
      <a href="ShopVerification.php?accept=<?php echo $row["shop_id"] ?>">Accept</a>
      <a href="ShopVerification.php?reject=<?php echo $row["shop_id"] ?>">Reject</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>

<?php include("Foot.php"); ?>

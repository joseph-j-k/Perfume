<?php include("Head.php"); ?>

<?php include("../Assets/Connection/Connection.php"); ?>
<?php 

if(isset($_GET["reject"]))
{
	$update = "update tbl_shop set shop_status = '2' where shop_id = '".$_GET["reject"]."'";
	if($conn -> query($update))
	{
		echo "<script>	
				alert('Rejected');
			    window.location='ShopAcceptList.php';
			  </script>";
		
		}
	
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Accepted List</title>
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
<style>

        h1 {
            text-align: center;
            color: #333;
        }

        .table-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            max-width: 1200px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        img {
            border-radius: 5px;
            max-width: 100%;
            height: auto;
        }

        a {
            margin: 0 5px;
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            display: inline-block;
        }

        a[href*="accept"] {
            background-color: #28a745; /* Green for accept */
        }

        a[href*="reject"] {
            background-color: #dc3545; /* Red for reject */
        }

        a:hover {
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            th, td {
                padding: 8px;
            }

            a {
                padding: 4px 8px;
            }
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
      <td>Action</td>
    </tr>
    <?php
	$i=0; 
	$sel = "select * from tbl_shop s inner join tbl_locality l on l.locality_id = s.shop_location inner join tbl_place p on p.place_id = l.place_id inner join tbl_district d on d.district_id = p.district_id where shop_status = '1' ";
	$result = $conn -> query($sel);
	while($data = $result -> fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['shop_name'] ?></td>
      <td><?php echo $data['shop_contact'] ?></td>
      <td><?php echo $data['shop_email'] ?></td>
      <td><?php echo $data['shop_address'] ?></td>
      <td><img src="../Assets/Files/Shop/<?php echo $data['shop_logo'] ?>" width="50" height="50"/></td>
      <td><img src="../Assets/Files/Shop/<?php echo $data['shop_proof'] ?>" width="50" height="50"/></td>
      <td><?php echo $data['district_name'] ?></td>
      <td><?php echo $data['place_name'] ?></td>
      <td><?php echo $data['locality_name'] ?></td>
      <td>
      <a href="ShopAcceptList.php?reject=<?php echo $data['shop_id'] ?>">Reject</a>
      </td>
    </tr>
    <?php } ?>
  </table>

</form>
</body>
</html>

<?php include("Foot.php"); ?>
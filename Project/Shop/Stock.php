<?php  
include('../Assets/Connection/Connection.php');
include('SessionValidation.php');

$pid=$_GET['m'];

if(isset($_POST["btn_submit"]))
{
	$qty = $_POST["txt_qty"];
	
	$insqry = "insert into tbl_stock(stock_qty,stock_date,product_id)values('".$qty."',curdate(),'".$pid."')";
	if($conn -> query($insqry))
	{
		echo "<script>
			  alert(\"Inserted\");
			  window.location ='Stock.php?m=".$pid."';
			  </script>";
		
		}
							
	
	}
	
?>
<?php
if(isset($_GET["did"]))
{
	$del = "delete from tbl_stock where product_id = '".$_GET["did"]."'";
	if($conn -> query($del))
	{
		echo "<script>
			  alert(\"Deleted\");
			  window.location = 'Stock.php?m=".$_GET["did"]."';
			  </script>";
		
		}
	
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stock</title>
<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1a1a;
            margin: 0;
            padding: 20px;
            color: white;
        }
        h2 {
            color: #007BFF;
            margin-bottom: 15px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            /* box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); */
            /* background-color: #fff; */
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
            position: sticky;
            top: 0; /* Sticky header */
            z-index: 1; /* Ensure header is on top */
        }
        tr:hover {
            /* background-color: #f1f1f1; */
        }
        form {
            background-color: #1a1e1e;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }
        input[type="text"], input[type="file"], select {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .action-links a {
            color: #007BFF;
            text-decoration: none;
            margin: 0 5px;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }
        .action-links a:hover {
            background-color: #007BFF;
            color: white;
        }
        /* Responsive Design */
        @media (max-width: 768px) {
            table, form {
                width: 100%;
                margin: 0 auto;
            }
            input[type="text"], input[type="file"], select {
                width: 100%;
            }
        }
    </style>
</head>

<body>
<form id="form" name="form" method="post" action="">
  <table>
    <tr>
      <td>Quantity</td>
      <td><label for="txtqty"></label>
          <input type="text" name="txt_qty" id="txt_qty" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <br /><br />
  <table>
    <tr align="center">
      <td>SlNo</td>
      <td>Date</td>
      <td>Quantity</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
    $selQry = "select * from  tbl_stock s inner join tbl_product p on s.product_id = p.product_id where p.product_id = '".$pid."'";
	$result = $conn -> query($selQry);
	while($row = $result->fetch_assoc())
	{
	$i++;
	?>
    <tr align="center">
      <td><?php echo $i; ?></td>
      <td><?php echo $row["stock_date"];?></td>
      <td><?php echo $row["stock_qty"];?></td>
      <td><a href="Stock.php?did=<?php echo $row["product_id"];?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>
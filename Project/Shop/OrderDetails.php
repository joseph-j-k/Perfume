<?php
ob_start();
session_start();

include("../Assets/Connection/Connection.php");
$selQry="select *from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id where b.user_id='".$_SESSION["sid"]."' and b.booking_status!='0' and c.cart_status!='0'";
$res=$conn->query($selQry);
if(isset($_GET["cid"]))

	{
		$upQry="update tbl_cart set cart_status='".$_GET["sts"]."' where cart_id='".$_GET["cid"]."' ";
		if($conn->query($upQry))
		{
			
            echo"Updated";
            
		}
	}
	?>
    
            	
<?php include("Head.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Orders</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #1a1e1e;
        color: white;
        margin: 0;
        padding: 20px;
    }
    h1 {
        text-align: center;
        color: white;
    }
    #tab {
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    form{
        background-color:rgb(81, 100, 67);
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    th, td {
        padding: 12px;
        text-align: left;
    }

    
    img {
        border-radius: 5px;
    }
    a {
        color: #2980b9;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
</head>


<body>
	<br><br><br><br><br>
<h1 align="center">Order Details</h1>
<form>
  <table>
    <tr>
      <td>SlNo</td>
      <td>Name</td>
      <td>Photo</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total Amount</td>
      <td>Action</td>
    </tr>
    <?php 
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$quantity=$row["cart_qty"];
		$price=$row["product_price"];
		$totalamount=$quantity*$price;
		$i++;
		?>
        <tr>
            <td><?php echo $i;?></td> 
            <td><?php echo $row["product_name"];?></td> 
            <td><img src="../Assets/Files/Shop/<?php echo $row["product_photo"];?>" width="47" /></td>
            <td><?php echo $row["cart_qty"];?></td>
            <td><?php echo $row["product_price"];?></td>
            <td><?php echo $totalamount;?></td>
	        <td>
                <?php 
					if($row["booking_status"]==0 && $row["cart_status"]==0)
					{
						echo "payment pending....";
					}
					else if($row["booking_status"]==1 && $row["cart_status"]==1)
					{
						
						?>
                        payment completed /
                        <a href="OrderDetails.php?cid=<?php echo $row ["cart_id"];?>&sts=2">Pack product</a>
                        <?php 
					}
					else if($row["booking_status"]==1 && $row["cart_status"]==2)
					{
						?>
                        product packed /
                        <a href="OrderDetails.php?cid=<?php echo $row ["cart_id"];?>&sts=3">Ship Product</a>
                        <?php 
					}
					else if($row["booking_status"]==1 && $row["cart_status"]==3)
					{
						?>
                        product shipped /
                        <a href="OrderDetails.php?cid=<?php echo $row ["cart_id"];?>&sts=4">Product Delivered</a>
                        <?php 
					}
					else if($row["booking_status"]==1 && $row["cart_status"]==4)
					{
						?>
                       Order Completed
                        <?php 
					}
					?>
                    </td>
                    
				
       </tr>
<?php
	}
	?>
  </table>
</form>
</body>
<?php 
ob_flush();
?>
</html>

<?php include("Foot.php"); ?>
<?php
include("../Assets/Connection/Connection.php");
include("SessionValidator.php");
$selqry="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id where booking_status > 1 and cart_status>0 and  user_id ='".$_SESSION["uid"]."'";
$result=$conn->query($selqry);	
include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerie DArt::My Booking</title>
<style>
    body {
        background-color: #121212;
        color: #ffffff;
        font-family: Arial, sans-serif;
        padding: 140px;
        
    }
    #tab {
        padding: 50px;
        background-color: #869897;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        width: 1000px;
    }
    h1 {
        text-align: center;
        color: #ffffff;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 10px;
        text-align: center;
        
    }
    th {
        background-color: #333;
        color: #ffffff;
    }

    img {
        border-radius: 5px;
    }
    a {
        color: #1e90ff;
        text-decoration: none;
    }
    
</style>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr align="center">
      <td>SlNO</td>
      <td>Name</td>
      <td>Photo</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total amount</td>
      <td>Status</td>
      <td colspan="2" align="center">Action</td>
    </tr>
     <?php
	 $i=0;
	while($row=$result->fetch_assoc())
	{
		
		$qty=$row["cart_qty"];
	$price=$row["product_price"];
	$totalamt=$qty*$price;
		 $i++;
  ?>
  <tr align="center">
          <td><?php echo $i; ?></td>
          <td><?php echo $row["product_name"]; ?></td>
          <td><img src="../Assets/Files/Shop/<?php echo $row["product_photo"];?>" width="100" height="100" /></td>
          <td><?php echo $row["cart_qty"];?></td>
          <td><?php echo $row["product_price"];?></td>
          <td><?php echo $totalamt;?></td>
          <td>
           <?php
                
					if($row["booking_status"]==1 && $row["cart_status"]==0)
					{
						echo "Payment Pending....";
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==1)
					{
						?>
                        Payment Completed 
                        <?php
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==2)
					{
						?>
                        Order Completed 
                      
                        <?php
					}
				
				
				?>
          </td>
          <td><a href="ProductRating.php?pid=<?php echo $row["product_id"]; ?>">Review</a></td>
          <td><a href="Feedback.php">Feedback</a></td>

          

  </tr>
  <?php
	}
	?>
  </table>
</form>
</div>
</body>
</html>
<?php include("Foot.php"); ?>
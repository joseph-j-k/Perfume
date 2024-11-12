<?php 
include("../Assets/Connection/Connection.php");
include("SessionValidation.php");

if(isset($_POST["btn_submit"]))
{
	
	$name = $_POST["txt_name"];
	$details = $_POST["txt_details"];
	$price = $_POST["txt_price"];
	$type = $_POST["seltype"];
	$subcategory = $_POST["selsubcat"];

	
	$photo = $_FILES["photo"]["name"];
	$temp = $_FILES["photo"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/Files/Shop/'.$photo);
	
	
	$insert = "insert into tbl_product(product_name,product_details,product_photo,product_price,subCategory_id,type_id,shop_id)values('".$name."','".$details."','".$photo."','".$price."','".$subcategory."','".$type."','".$_SESSION["sid"]."')";
	
	
	if($conn -> query($insert))
	{
		echo "<script>
			  alert(\"Product Inserted\");
			  window.location = 'Product.php';
			  </script>";	
		}
		
		else
		{
			
			echo "<script>
				  alert(\"Failed\");
				  window.location = 'Product.php';
				  </script>";
			
			
			}
	
	}

?>
<?php 
if(isset($_GET["del"]))
{
	$delete = "delete from tbl_product where product_id = '".$_GET["del"]."'";
	if($conn -> query($delete))
	{
		
		echo "<script>alert(\"Delete\")</script>";
		
		}
	
	
	
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product</title>
<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1e1e;
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
            /* box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff; */
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
            /* box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); */
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
<form id="form" name="form" method="post" action="" enctype="multipart/form-data">
  <table>
    <tr>
      <td>Category</td>
      <td><select name="selcat" id="selcat" onchange="getcategory(this.value)" required autocomplete="off">
          <option>----Select----</option>
          <?php 
		   $selqry = "select * from  tbl_category";
		   $result = $conn -> query($selqry);
		   while($row = $result -> fetch_assoc())
		   {
			   ?>
               
               <option value="<?php echo $row["category_id"];?>"><?php echo $row["category_name"];?></option>
			   <?php } ?>
        </select></td>
    </tr>
    <tr>
      <td>Subcategory</td>
      <td><select name="selsubcat" id="selsubcat" required autocomplete="off">
          <option>----Select----</option>
        </select></td>
    </tr>
    <tr>
      <td>Type</td>
      <td><select name="seltype" id="seltype"required autocomplete="off">
          <option>----Select----</option>
          <?php 
		  $selqry = "select * from tbl_type";
		  $result = $conn -> query($selqry);
		  while($row = $result -> fetch_assoc())
		  {	  
		  ?>
          <option value="<?php echo $row["type_id"];?>"><?php echo $row["type_name"];?></option>
          <?php } ?>
        </select></td>
    </tr>
    <tr>
      <td>Shop</td>
      <td><select name="selshop" id="selshop" required autocomplete="off">
          <option>----Select----</option>
          <?php 
          $selqry = "select * from tbl_shop";
		  $result = $conn -> query($selqry);
		  while($row = $result -> fetch_assoc())
		  {
		  ?>
          <option value="<?php echo $row["shop_id"];?>"><?php echo $row["shop_name"];?></option>
          <?php } ?>
        </select></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
          <input type="text" name="txt_name" id="txt_name" required autocomplete="off" />
        </td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txt_details"></label>
          <input type="text" name="txt_details" id="txt_details" required autocomplete="off"/>
          </td>
    </tr>
    <tr>
      <td>Price</td>
      <td><label for="txt_price"></label>
          <input type="text" name="txt_price" id="txt_price" required autocomplete="off"/>
        </td>
    </tr>		
    <tr>
      <td>Photo</td>
      <td><input type="file" name="photo" id="photo" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </td>
    </tr>
  </table>
  </form>
  <br /><br />  <br />

  <table>
    <tr>
      <td>Slno</td>
      <td>Product&nbsp;Name</td>
      <td>Product&nbsp;Details</td>
      <td>Price</td>
      <td>Photo</td>
      <td>Sub&nbsp;Category</td>
      <td>Type</td>
      <td colspan="2" align="center">Action</td>
    </tr>
    <?php 
	$sel = "select * from tbl_product p inner join tbl_subcategory s on p.subCategory_id = s.subCategory_id inner join tbl_type t on p.type_id = t.type_id inner join tbl_shop sh on sh.shop_id = p.shop_id  where sh.shop_id = '".$_SESSION["sid"]."'";
	$result = $conn->query($sel);
	$i=0;
	while($row = $result->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row["product_name"]?></td>
      <td><?php echo $row["product_details"]?></td>
      <td><?php echo $row["product_price"]?></td>
      <td><img src="../Assets/Files/Shop/<?php echo $row["product_photo"]?>" alt="Product Photo" width="50" height="50"/></td>
      <td><?php echo $row["subCategory_name"]?></td>
      <td><?php echo $row["type_name"]?></td>
      <td><a href="Product.php?del=<?php echo $row["product_id"]?>">Delete</a></td>
      <td><a href="Stock.php?m=<?php echo $row["product_id"];?>">Add&nbsp;Stock</a></td>
    </tr>
   <?php }?>
  </table>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getcategory(did)
  {
	  $.ajax({
		  url:"../Assets/AjaxPages/Ajaxcategory.php?did="+did,
		  success: function(html){
			  $("#selsubcat").html(html);
			  }
		  
		  });
	  
	  }
  
  </script>

</body>
</html>
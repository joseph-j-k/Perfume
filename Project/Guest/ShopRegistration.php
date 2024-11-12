<?php 
include("Head.php");
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_name"];
	$contact = $_POST["txt_contact"];
	$email = $_POST["txt_email"];
	$address = $_POST["txt_address"];
	$location = $_POST["txtlocation"];
	
	$logo = $_FILES["photo1"]["name"];
	$templogo = $_FILES["photo1"]["tmp_name"];
	move_uploaded_file($templogo,'../Assets/Files/Shop/'.$logo);
	
	$proof = $_FILES["photo2"]["name"];
	$tempproof = $_FILES["photo2"]["tmp_name"];
	move_uploaded_file($tempproof,'../Assets/Files/Shop/'.$proof);
	 
	$password = $_POST["txt_password"];
	$rePassword = $_POST["txt_repassword"];
	
	if($password == $rePassword)
	{
		
		
		$insQry = "insert into  tbl_shop(shop_name,shop_contact,shop_email,shop_address,shop_password,shop_logo,shop_proof,shop_doj,shop_location)values('".$name."','".$contact."','".$email."','".$address."','".$password."','".$logo."','".$proof	."',curdate(),'".$location."')";
		
		if($result = $conn -> query($insQry))
		{
			?>
            
            <script>
			alert("Inserted");
			location.href="ShopRegistration.php";
			</script>
			
			<?php 
			}
		
		}
		
		else
		{
			?>
            <script>
			alert("Password Not Match");
			</script>
            
            <?php
			
			}
	
		
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Registration</title>
<style>
        body {
            background-color: #1a1a1a; /* Dark background */
            color: #e0e0e0; /* Light gray text */
            margin-top: 150px;
            font-family: Arial, sans-serif;
            padding: 0 20px;
        }
        table {
            background-color: #2a2a2a; /* Darker table background */
            color: #e0e0e0;
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            border: 1px solid #444;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #444;
        }
        th {
            background-color: #3a3a3a; /* Header background */
            font-weight: bold;
        }
        input[type="text"], input[type="password"], select, textarea {
            background-color: #333; /* Dark background for inputs */
            color: #e0e0e0;
            border: 1px solid #555;
            padding: 10px;
            border-radius: 4px;
            width: 800px;
            margin-bottom: 10px;
        }
        input[type="text"]:focus, input[type="password"]:focus, select:focus {
            border-color: #66afe9; /* Blue border on focus */
            outline: none;
        }
        input[type="submit"], input[type="reset"] {
            border-radius: 4px;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 10px 5px;
        }
        input[type="submit"] {
            background-color: #1E201E;
            color: white;
        }
        input[type="submit"]:hover {
            background-color: #3C3D37; 
        }
        input[type="reset"] {
            background-color: #1E201E; 
            color: white;
        }
        input[type="reset"]:hover {
            background-color: #3C3D37; 
        }
        /* Additional styling */
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #e0e0e0;
        }
        select {
          width: 800px; /* Set a fixed width for the select dropdowns */
          font-size: 14px; /* Adjust the font size */
          padding: 5px; /* Add some padding for better usability */
          background-color: #333; /* Maintain the dark background */
          color: #e0e0e0; /* Light gray text */
          border: 1px solid #555; /* Border style */
          border-radius: 4px; /* Rounded corners */
            }

            input[type="file"] {
            background-color: #333; /* Dark background */
            color: #e0e0e0; /* Light gray text */
            border: 1px solid #555; /* Border style */
            border-radius: 4px; /* Rounded corners */
            padding: 10px; /* Padding for better usability */
            width: 800px; /* Set width */
            margin-bottom: 10px; /* Space below */
        }

        .logo-label{
          content: "Please add your logo"; /* Placeholder text */
          color: #b0b0b0; /* Lighter gray for placeholder */
          font-size: 14px; /* Font size */

        }

    </style>
</head>

<body>
<form id="form" name="form" enctype="multipart/form-data" method="post" action="">
  <h3 align="center">Join us as a Seller</h3>
  <table  border="1" align="center">
    <tr>
      <td>District</td>
      <td>
      <select name="txtdis" id="txtdis" onChange="getPlace(this.value)" required autocomplete="off">
      <option value="">----Select----</option>
      <?php 
	  		$selQry = "select * from tbl_district";
			$result = $conn -> query($selQry);
			while($row = $result -> fetch_assoc())
			{
				?>
                
      <option value="<?php echo $row["district_id"];?>"><?php echo $row["district_name"];?></option>  
			  
	 <?php } ?>
      </select>
      </td>
    </tr>
    <tr>
      <td>Place</td>
      <td>
      <select name="txtplace" id="txtplace" onChange="getLocation(this.value)" required autocomplete="off">
      <option>----Select----</option>
      </select>
      </td>
    </tr>
    <td>Location</td>
      <td>
      <select name="txtlocation" id="txtlocation" required autocomplete="off">
      <option value="">----Location----</option>
      </select>
      </td>
    </tr>
    <tr>
      <td>Name</td>
      <td><label>
        <input type="text" name="txt_name" id="txt_name" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label>
        <input type="text" name="txt_contact" id="txt_contact" required autocomplete="off" pattern="[0-9]{10,10}"/>
      </label></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label>
        <input type="text" name="txt_email" id="txt_email" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
        <textarea name="txt_address" id="txt_address" cols="99" rows="5" required autocomplete="off"></textarea></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label>
        <input type="password" name="txt_password" id="txt_password" required autocomplete="off" pattern="[0-9a-zA-Z!@#$%^&*]{8,}"/>
      </label></td>
    </tr>
    <tr>
      <td>Re-Password</td>
      <td><label>
        <input type="password" name="txt_repassword" id="txt_repassword" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td>Logo</td>
      <td><label>
        <input type="file" name="photo1" id="photo1" class="logo-label" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label>
        <input type="file" name="photo2" id="photo2" class="proof-label" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
 <input type="submit" name="btn_reset" id="btn_reset" value="Cancel" /></td>
    </tr>
  </table>
</form>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
		success:function(html){
			$("#txtplace").html(html);
			}
		});
	}
</script>
<script>
function getLocation(did)
{
	$.ajax({
		
		url:"../Assets/AjaxPages/AjaxLocation.php?did="+did,
		success: function(html){
			$("#txtlocation").html(html);
			
			}
			
		});
		
	}
</script>
</body>
</html>
<?php include("Foot.php") ?>
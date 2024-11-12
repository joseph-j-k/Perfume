<?php 
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_name"];
	$contact = $_POST["txt_contact"];
	$email = $_POST["txt_email"];
	$gender = $_POST["btngen"];
	$address = $_POST["txt_address"];
	$dob = $_POST["txt_date"];
	$password = $_POST["txt_password"];
	$repassword = $_POST["txt_rePassword"];
	$photo = $_FILES["photo"]["name"];
	$temp = $_FILES["photo"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/Files/User/'.$photo);
	$place = $_POST["selplace"];
	
	
	if($password == $repassword)
	{
		$insQry = "insert into tbl_user(user_name, user_contact, user_email, user_gender, user_address, user_dob, user_password, user_photo, place_id,user_doj)values('".$name."', '".$contact."', '".$email."', '".$gender."', '".$address."', '".$dob."', '".$password."','".$photo."', '".$place."', curdate())";
		if($conn -> query($insQry))
		{
			?>
<script>
			alert("Inserted");
			location.href="UserRegistration.php";
			</script>
<?php
			
			}
		
		}
	
	}

		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Registration</title>
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
        input[type="text"], input[type="password"], input[type="date"], input[type="radio"] select, textarea {
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
<h3 align="center">Join Us  As  An Users</h3>
<form id="form" name="form" method="post" enctype="multipart/form-data" action="">
  <table width="200"  align="center"	>
    <tr>
      <td><p>District</p></td>
      <td><select name="seldistrict" id="seldistrict" onChange="getplace(this.value)" required autocomplete="off">
          <option>---Select----</option>
          <?php 
	  $selqry = "select * from tbl_district";
	  $result = $conn -> query($selqry);
	  while($row = $result -> fetch_assoc())
	  {
		?>
          <option value="<?php echo $row["district_id"]; ?>"><?php echo $row["district_name"];?></option>
          <?php } ?>
        </select></td>
    </tr>
    <tr>
      <td><p>Place</p></td>
      <td><select name="selplace" id="selplace" required autocomplete="off">
          <option>---Select---</option>
        </select></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
        <input type="text" name="txt_name" id="txt_name" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
        <input type="text" name="txt_contact" id="txt_contact" required autocomplete="off" pattern="[0-9]{10,10}"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
        <input type="text" name="txt_email" id="txt_email" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="btngen" id="btngen" value="Male" required autocomplete="off"/>
        <label>Male</label>
        <input type="radio" name="btngen" id="btngen" value="Female" required autocomplete="off"/>
        <label>Female</label></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
        <textarea name="txt_address" id="txt_address" cols="99" rows="5" required autocomplete="off"></textarea></td>
    </tr>
    <tr>
      <td>DOB</td>
      <td><label for="txt_date"></label>
        <input type="date" name="txt_date" id="txt_date" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
        <input type="text" name="txt_password" id="txt_password" required autocomplete="off" pattern="[0-9a-zA-Z!@#$%^&*]{8,}"/></td>
    </tr>
    <tr>
      <td>RePassword</td>
      <td><label for="txt_rePassword"></label>
        <input type="text" name="txt_rePassword" id="txt_rePassword" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="photo"></label>
        <input type="file" name="photo" id="photo" required autocomplete="off"/></td>
    </tr>
    
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit">
        <input type="submit" name="btn_reset" id="btn_reset" value="Reset" /></td>
    </tr>
  </table>
</form>
<script src="../Assets/JQ/jQuery.js"></script> 
<script>
	function getplace(did)
	{
		$.ajax({
			url: "../Assets/AjaxPages/AjaxPlace.php?did="+did,
			success: function(html)
			{
				$("#selplace").html(html)
				
				}	
			});
		
		}
</script>
</body>
</html>
<?php include("Foot.php") ?>
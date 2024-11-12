<?php 
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btn_login"]))
{
	$selUser = "select * from tbl_user where user_email = '".$_POST["txt_username"]."' and user_password ='".$_POST["txt_password"]."'"; 
	
	$selShop = "select * from tbl_shop where shop_email = '".$_POST["txt_username"]."' and shop_password = '".$_POST["txt_password"]."'";

  $selAdmin = "select * from tbl_admin where admin_email = '".$_POST["txt_username"]."' and admin_password ='".$_POST["txt_password"]."'"; 
	
	$result_1 = $conn -> query($selUser);
	$result_2 = $conn -> query($selShop);
  $result_3 = $conn -> query($selAdmin);
	
	if($rowUser = $result_1 -> fetch_assoc())
	{
		$_SESSION["uid"] = $rowUser["user_id"];
		header("Location:../User/HomePage.php");
		}
		
	else if($rowShop = $result_2 -> fetch_assoc())
	{
    if($rowShop['shop_status'] == 1)
		{
		$_SESSION["sid"] = $rowShop["shop_id"];
		header("Location:../Shop/HomePage.php");
    }
    else if($rowShop['shop_status'] == 2)
    { 
      echo"<script>
      alert('Reject');
        </script>";
    }
    else{
      echo"<script>
      alert('Pending');
        </script>";
    }
		}	
    else if($rowAdmin = $result_3 -> fetch_assoc())
	{
		
		$_SESSION["aid"] = $rowAdmin["admin_id"];
		header("Location:../Admin/Dashboard.php");
		}	
	
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
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
        input[type="text"], input[type="password"], select {
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
<form id="form1" name="form1" method="post" action="">
  <h3 align="center">Login, To Continue Your Journey</h3>
  <table width="200" border="1">
    <tr>
      <td>UserName</td>
      <td><label>
        <input type="text" name="txt_username" id="txt_username" placeholder="Username" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label>
        <input type="text" name="txt_password" id="txt_password" placeholder="Password" required autocomplete="off" pattern="[0-9a-zA-Z!@#$%^&*]{8,}"/>
      </label></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_login" id="btn_login" value="Login" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php include("Foot.php"); ?>
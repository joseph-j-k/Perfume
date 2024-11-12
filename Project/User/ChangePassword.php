<?php 
include("../Assets/Connection/Connection.php");
include("SessionValidator.php");

if(isset($_POST["btn_submit"]))
{
	$currentPassword = $_POST["txt_oldPass"];
	$newPassword = $_POST["txt_newPass"];
	$rePassword = $_POST["txt_rePass"];
	
	$sel ="select * from tbl_user where user_id='".$_SESSION['uid']."'";
	$result = $conn -> query($sel);
	$row = $result -> fetch_assoc();
	
	$dbpassword = $row["user_password"];
			if($dbpassword == $currentPassword)
			{
				if($newPassword == $rePassword)
				{
					$update = "update tbl_user set user_password = '".$newPassword."' where user_id = '".$_SESSION['uid']."'";
					if($conn -> query($update))
					{
						echo "<script>alert('Password Update')</script>";
						}
						else
						{
							echo "<script>alert('Password Missmatch')</script>";
							}
					
					}
				}
				else
				{
					echo "<script>alert('Incorrect Current Password')</script>";
					}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #1a1a1a;
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #tab {
        font-size: 30px;
        font-weight: bold;
        color: #fff;
        margin-bottom: 20px;
    }

    table {
        background: #1a1e1e;
        width: 450px;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.1);
        text-align: center;
        position: relative;
    }

    table img {
        width: 150px; /* Increase the image size */
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
        border: 5px solid #007BFF; /* Increase border size for emphasis */
        box-shadow: 0px 4px 15px rgba(0, 123, 255, 0.5); /* Add a shadow effect */
        transition: transform 0.3s ease-in-out; /* Add smooth scaling effect */
    }

    /* Scale effect on hover */
    table img:hover {
        transform: scale(1.1);
    }

    td {
        padding: 15px;
        font-size: 18px;
        color: #fff;
    }

    td:first-child {
        font-weight: 500;
        text-align: right;
        padding-right: 20px;
    }

    td a {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        border-radius: 25px;
        transition: 0.3s ease;
    }

    td a:hover {
        background-color: #0056b3;
        box-shadow: 0px 5px 15px rgba(0, 123, 255, 0.3);
    }

    td a:active {
        transform: scale(0.98);
    }

    table tr td[colspan="2"] {
        padding-top: 20px;
        text-align: center; /* Ensure the content spans across columns and is centered */
    }

    table td:nth-child(2) {
        font-weight: bold;
        color: #555;
    }

    form {
        display: flex;
        justify-content: center;
    }

    /* Animation for form appearance */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    form {
        animation: fadeIn 1s ease-in-out;
    }

    /* Responsive design */
    @media (max-width: 600px) {
        table {
            width: 95%;
        }

        td {
            font-size: 16px;
        }

        td a {
            font-size: 14px;
        }
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table  align="center">
    <tr>
      <td>Old Password</td>
      <td><label>
        <input type="text" name="txt_oldPass" id="txt_oldPass" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label>
        <input type="text" name="txt_newPass" id="txt_newPass" required autocomplete="off" />
      </label></td>
    </tr>
    <tr>
      <td>ReType&nbsp;Password</td>
      <td><label>
        <input type="text" name="txt_rePass" id="txt_rePass" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Change" /></td>
    </tr>
  </table>
</form>
</body>
</html>
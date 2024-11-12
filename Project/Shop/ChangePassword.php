<?php 
include("../Assets/Connection/Connection.php");
include("SessionValidation.php");


if(isset($_POST["btn_submit"]))
{
	
	$currentPassword = $_POST["txt_oldPass"];
	$newPassword = $_POST["txt_newPass"];
	$rePassword = $_POST["txt_rePass"];
	
	
	$select = "select * from tbl_shop where shop_id = '".$_SESSION["sid"]."'";
	$result = $conn -> query($select);
	$row = $result -> fetch_assoc();
	
	$dbPassword = $row["shop_password"];
	
				if($dbPassword == $currentPassword)
				{
					
					if($newPassword == $rePassword)
					{
						
						$update = "update tbl_shop set shop_password = '".$newPassword."' where shop_id  = '".$_SESSION["sid"]."'";
					
					
						if($conn -> query($update))
					
						{
						
						echo "<script>alert(\"Password Updated\")</script>";
						
						}
						
						
						
					}
					
					else
					{
						
						echo "<script>alert(\"Password Missmatch \")</script>";
						
						
					}
					
					
					
					
			}
			else
			{
				$Failed = "Incorrect Current Password";
				echo "<script>
				const message = (`$Failed`);
				alert(message);
				</script>";
				
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

    table {
        background: #1a1e1e;
        width: 450px;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.1);
        text-align: left;
        position: relative;
    }

    table tr td {
        padding: 15px;
        font-size: 18px;
        color: #fff;
    }

    table tr td input[type="password"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 10px;
        background-color: #2a2e2e;
        color: #fff;
        font-size: 16px;
    }

    table tr td input[type="submit"] {
        padding: 10px 20px;
        background-color: #007BFF;
        color: #fff;
        font-size: 16px;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    table tr td input[type="submit"]:hover {
        background-color: #0056b3;
    }

    table tr td:first-child {
        text-align: right;
        padding-right: 20px;
        font-weight: bold;
    }

    table tr td:last-child {
        text-align: left;
    }

    /* Add some animation to the form */
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

    /* Responsive adjustments */
    @media (max-width: 600px) {
        table {
            width: 90%;
        }

        td {
            font-size: 16px;
        }

        td input[type="submit"] {
            font-size: 14px;
        }
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center">
    <tr>
      <td>Old Password</td>
      <td><label>
        <input type="text" name="txt_oldPass" id="txt_oldPass" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label>
        <input type="text" name="txt_newPass" id="txt_newPass" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td>Re-type Password</td>
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
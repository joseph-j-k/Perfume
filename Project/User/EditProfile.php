<?php 
include("../Assets/Connection/Connection.php");
include("SessionValidator.php");

?>
<?php 
if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_name"];
	$contact = $_POST["txt_contact"];
	$email = $_POST["txt_email"];
	$address = $_POST["txt_address"];
	
	$update = "update tbl_user set user_name='".$name."',user_contact='".$contact."', user_email='".$email."', user_address='".$address."' where user_id='".$_SESSION['uid']."'";
	if($conn -> query($update))
	{
		echo "<script>alert('Updated')</script>";
		}
		
	else
	{
		
		echo "<script>alert('Updated')</script>";
		}	
	
	
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
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
<form id="form" name="form" method="post" action="">
<?php 
$sel = "select * from  tbl_user where user_id='".$_SESSION['uid']."'";
$result = $conn -> query($sel);
if($row = $result -> fetch_assoc())
{
?>
  <table  align="center">
    <tr>
      <td>Name</td>
      <td><label>
        <input type="text" name="txt_name" id="txt_name" value="<?php echo $row["user_name"]?>" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label>
        <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $row["user_contact"]?>" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label>
        <input type="text" name="txt_email" id="txt_email" value="<?php echo $row["user_email"]?>" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label>
        <input type="text" name="txt_address" id="txt_address" value="<?php echo $row["user_address"]?>" required autocomplete="off"/>
      </label></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Edit" /></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>
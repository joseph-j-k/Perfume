<?php 
include("../Assets/Connection/Connection.php");
include("SessionValidation.php");
?>
<?php 
if(isset($_POST["btn_submit"]))
{
	
	$name = $_POST["txt_name"];
	$contact = $_POST["txt_contact"];
	$email = $_POST["txt_email"];
	$address = $_POST["txt_address"];
	
	$update = "update tbl_shop set shop_name = '".$name."', shop_contact = '".$contact."', shop_email = '".$email."', shop_address = '".$address."' where shop_id = '".$_SESSION["sid"]."'";
	
	 if($conn -> query($update))
	 {
		 
		 echo "<script>alert(\"Updated\")</script>";
		 
	 }
		 
	 else
	{
		$Failed = "Update failed. Please try again.";
		 echo "<script>
		 const message = `{$Failed}`;
		 alert(message);
		 </script>";
			 
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

    table tr td input[type="text"],
    table tr td textarea {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #2a2e2e;
        color: #fff;
        font-size: 16px;
    }

    table tr td textarea {
        height: 80px;
        resize: none;
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
<?php 
$sel = "select * from  tbl_shop where shop_id = '".$_SESSION["sid"]."'";
$result = $conn -> query($sel);
if($row = $result -> fetch_assoc())
{
?>
  <table align="center">
    <tr align="center">
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $row["shop_name"];?>" required autocomplete="off"/></td>
    </tr>
    <tr align="center">
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $row["shop_contact"]; ?>" required autocomplete="off"/></td>
    </tr>
    <tr align="center">
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $row["shop_email"];?>" required autocomplete="off"/></td>
    </tr>
    <tr align="center">
      <td>Address</td>
      <td align="center"><label for="txt_address"></label>
        <textarea name="txt_address" id="txt_address" cols="20" rows="1" required autocomplete="off"><?php echo $row["shop_address"];?></textarea>
      </td>
    </tr>
    <tr align="center">
      <td colspan="2" align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Edit"/></td>
    </tr>
  </table>
  <?php } ?>
</form>
</body>
</html>
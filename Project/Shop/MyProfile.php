<?php 
include('../Assets/Connection/Connection.php');
include("SessionValidation.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
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
    .search {
            display: inline-block;
            background-color: #869897; /* Green background */
            color: white; /* White text */
            padding: 10px 20px; /* Padding */
            font-size: 16px; /* Font size */
            text-align: center; /* Center text */
            text-decoration: none; /* Remove underline */
            position: relative;
            border-radius: 5px 0 0 5px; /* Rounded corners on left */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Light shadow */
            transition: background-color 0.3s, transform 0.3s; /* Smooth transitions */
            margin-bottom:500px;
            margin-left:10px;
        }

        .search::after {
            content: '';
            position: absolute;
            top: 0;
            right: -20px;
            width: -155px;
            height: 0;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;
            border-left: 20px solid #869897; /* Arrow tip background color */
            transition: border-left-color 0.4s;
        }

        .search:hover {
            background-color: #869897; /* Darker green on hover */
            transform: translateY(-3px); /* Lift effect on hover */
        }

        .search:hover::after {
            border-left-color: #869897; /* Arrow tip color on hover */
        }

        .search:active {
            background-color: #869897; /* Even darker green when clicked */
            transform: translateY(0); /* Return to normal position */
        }

        .search:active::after {
            border-left-color: #869897; /* Arrow tip color on click */
        }

</style>
</head>  
<body>
<br />
<div>   
<form id="form" name="form" method="post" action="">
<?php 
$sel = "select * from tbl_shop where shop_id='".$_SESSION["sid"]."'";
$result = $conn -> query($sel);
if($row = $result -> fetch_assoc())		
{
?>
<table  align="center">
  <tr>
    <td colspan="2" align="center"><img src="../Assets/Files/Shop/<?php echo $row["shop_logo"];?>" width="50" height="50"/></td>
  </tr>
  <tr>
    <td>Name</td>	
    <td><?php echo $row["shop_name"];?></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $row["shop_contact"];?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $row["shop_email"];?></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo $row["shop_address"];?></td>
  </tr>
  <tr>
  	<td colspan="2" align="center">
  		<a href="EditProfile.php">Edit</a>
  		&nbsp;&nbsp;&nbsp;
  		<a href="ChangePassword.php">Change Password</a>
  	</td>
  </tr>
</table>
<?php } ?>
</form>
</div>
</body>
</html>
<?php
session_start();
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btnsave"]))
{
	$complaint_type=$_POST["txt_complaint_type"];
	$complaint=$_POST["txtcomplaint"];
	
			
				$insqry="insert into tbl_complaint(complaint_complainttype, complaint_content, complaint_date, user_id)values('".$complaint_type."','".$complaint."',curdate(),'".$_SESSION["uid"]."')";
				if($conn->query($insqry))
				{		
					header("Location:complaint.php");
				}
				
			
			
		
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
<style>
    body {
        background-color: #121212; /* Dark background */
        color: #ffffff; /* Light text color */
        font-family: Arial, sans-serif;
        margin-top:140px
    }
    h1 {
        color: #00bcd4; /* Accent color for headings */
        text-align: center;
        margin-bottom: 20px;
    }
    table {
        width: 80%; /* Table width */
        margin: 20px auto;
        border-collapse: collapse;
        animation: fadeIn 1s; /* Animation for table */
    }
    th, td {
        padding: 10px; /* Padding for table cells */
        text-align: center;
    }
    th {
        background-color: #1e1e1e; /* Darker header */
        color: #00bcd4; /* Accent color for header text */
    }
    
    
    input[type="text"], input[type="submit"], input[type="reset"] {
        padding: 10px;
        margin: 5px;
        border: none;
        border-radius: 5px; /* Rounded corners */
    }
    input[type="text"] {
        width: calc(100% - 22px); /* Full width for text inputs */
        background-color: #2e2e2e; /* Input background */
        color: #ffffff; /* Input text color */
    }
    input[type="submit"], input[type="reset"] {
        background-color: #00bcd4; /* Button background */
        color: #ffffff; /* Button text color */
        cursor: pointer; /* Pointer on hover */
    }
    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #0097a7; /* Darker shade on hover */
    }
    
    /* Animation for table */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table  align="center">
    <tr align="center">
      <td>Complaint Type</td>
      <td><label for="txt_complaint_type"></label>
      <input type="text" name="txt_complaint_type" id="txt_complaint_type" required autocomplete="off" /></td>
    </tr>
    <tr align="center">
      <td>Complaint Details</td>
      <td><label for="txtcomplaint"></label>
        <input type="text" name="txtcomplaint" id="txtcomplaint" required autocomplete="off"/></td>
    </tr>
    <tr align="center">
      <td colspan="2">
          <input type="submit" name="btnsave" id="btnsave" value="Save" />
          <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
     </td>
    </tr>
  </table>
  <br />
  <br />
  <br />
  <table  align="center">
    <tr align="center">
      <td>#</td>
      <td>Complaint Type</td>
      <td>Date</td>
      <td>Complaints</td>
      <td>Reply</td>
    </tr>
    <?php
$i=0;

$selqry = "select * from tbl_complaint c inner join tbl_user u on u.user_id = c.user_id  where c.user_id='".$_SESSION["uid"]."'";
$result = $conn->query($selqry);
while($row = $result->fetch_assoc())
{
	$i++;
?>
    <tr align="center">
      <td><?php echo $i;?></td>
      <td><?php echo $row["complaint_complainttype"];?></td>
      <td><?php echo $row["complaint_date"];?></td>
      <td><?php echo $row["complaint_content"];?></td>
      <td><?php echo $row["complaint_reply"];?></td>
      <?php
}

?>
  </table>
</form>
</body>
</html>

<?php include("Foot.php"); ?>
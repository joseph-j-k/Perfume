
<?php
include("SessionValidator.php");
ob_start();

	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btn_pay"]))
	{
		
				$a = "update tbl_booking set booking_status='2' where booking_id='".$_SESSION["bid"]."'";
				if($conn->query($a))
				{
					
					
					?>
                    <script>
						alert('Payment Completed');
						window.location="MyBooking.php";
					</script>
	
		<?php
				}
				else
				{
					echo "<script>alert('Failed')</script>";
				}
			
	}
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #1a1a1a; /* Dark background */
            font-family: Arial, Helvetica, sans-serif;
            color: #f5f5f5; /* Light text color */
        }
        .wrapper {
            background-color: #2a2a2a; /* Darker wrapper background */
            width: 500px;
            padding: 25px;
            margin: 25px auto 0;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);
        }
        .wrapper h2 {
            background-color: #3c3c3c; /* Dark header background */
            color: #7ed321; /* Green text color */
            font-size: 24px;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
            border: 1px dotted #444; /* Darker border */
        }
        h4 {
            padding-bottom: 5px;
            color: #7ed321; /* Green text */
        }
        .input-group {
            margin-bottom: 8px;
            width: 100%;
            position: relative;
            display: flex;
            flex-direction: row;
            padding: 5px 0;
        }
        .input-box {
            width: 100%;
            margin-right: 12px;
            position: relative; 
        }
        .input-box:last-child {
            margin-right: 0;
        }
        .name {
            padding: 14px 10px 14px 50px;
            width: 100%;
            background-color: #3c3c3c; /* Darker input background */
            border: 1px solid #555; /* Lighter border */
            outline: none;
            letter-spacing: 1px;
            transition: 0.3s;
            border-radius: 3px;
            color: #f5f5f5; /* Light text color */
        }
        .name:focus, .dob:focus {
            box-shadow: 0 0 2px 1px #7ed32180;
            border: 1px solid #7ed321; /* Green border on focus */
        }
        .input-box .icon {
            width: 48px;
            display: flex;
            justify-content: center;
            position: absolute;
            padding: 15px;
            top: 0px;
            left: 0px;
            bottom: 0px;
            color: #f5f5f5; /* Light icon color */
            background-color: #444; /* Darker icon background */
            border-radius: 2px 0 0 2px;
            transition: 0.3s;
            font-size: 20px;
            pointer-events: none;
            border: 1px solid #555; /* Lighter border */
            border-right: none;
        }
        .name:focus + .icon {
            background-color: #7ed321; /* Green on focus */
            color: #fff; /* White icon color */
        }
        .radio:checked + label {
            background-color: #7ed321; /* Green when checked */
            color: #fcfcfc; /* Light text color */
        }
        .dob {
            width: 30%;
            padding: 14px;
            text-align: center;
            background-color: #3c3c3c; /* Darker DOB background */
            transition: 0.3s;
            outline: none;
            border: 1px solid #555; /* Lighter border */
            border-radius: 3px;
            color: #f5f5f5; /* Light text color */
        }
        .radio {
            display: none;
        }
        .input-box label {
            width: 50%;
            padding: 13px;
            background-color: #3c3c3c; /* Darker label background */
            display: inline-block;
            float: left;
            text-align: center;
            border: 1px solid #555; /* Lighter border */
        }
        .input-box label:first-of-type {
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
            border-right: none;
        }
        .input-box label:last-of-type {
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }
        .radio:checked {
            background-color: #7ed321; /* Green when checked */
            color: #fff; /* Light text color */
        }
        input[type=submit] {
            width: 100%;
            background: #7ed321; /* Green background */
            color: #fff; /* White text */
            padding: 15px;
            border-radius: 4px;
            font-size: 16px;
            transition: all 0.35s ease;
            border: none;
        }
        input[type=submit]:hover {
            cursor: pointer;
            background: #5eb105; /* Darker green on hover */
        }

        /* Fade-in effect */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.5s forwards; /* Adjust duration as needed */
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
	<title>PSST - Payement Gateway</title>
</head>
<body>
	<div class="wrapper">
		<h2>Payment Gateway</h2>
		<form method="POST">
			<h4>Account</h4>
			<div class="input-group">
				<div class="input-box">
					<input class="name" type="text" name="txtname" id="txtname" placeholder="First Name" required>
                    
					<i class="fa fa-user icon" aria-hidden="true"></i>
				</div>
				<div class="input-box">
					<input class="name" type="text" name="txtnname" id="txtnname" placeholder="Second Name" required>
					<i class="fa fa-user icon" aria-hidden="true"></i>
				</div>
			</div>
			<div class="input-group">
				<div class="input-box">
					<input class="name" type="email" name="txtemail" id="txtemail" placeholder="Email Address" required>
					<i class="fa fa-envelope icon" aria-hidden="true"></i>
				</div>
			</div>	
			<div class="input-group">
				<div class="input-box">
					<h4>Date of Birth</h4>
					<input class="dob" type="text" data-mask="00" name="txtdate" id="txtdate" placeholder="DD">
					<input class="dob" type="text" data-mask="00" name="txtmonth" id="txtmonth" placeholder="MM">
					<input class="dob" type="text" data-mask="0000" name="txtyear" id="txtyear" placeholder="YYYY">
				</div>
				<div class="input-box">
					<h4>Gender</h4>
					<input type="radio" name="rdbgender" id="male" checked  class="radio">
					<label for="male">Male</label>
					<input type="radio" name="rdbgender" id="female" class="radio">
					<label for="female">Female</label>
				</div>
			</div>
			<div class="input-group">
				<div class="input-box">
					<h4>Payment Details</h4>
					<input type="radio" name="rdbpay" id="cc" checked class="radio">
					<label for="cc">
						<span><i class="fa fa-cc-visa" aria-hidden="true"></i>Credit Card</span>
					</label>
					<input type="radio" name="rdbpay" id="dc" class="radio">
					<label for="dc">
						<span><i class="fa fa-cc-visa" aria-hidden="true"></i>Debit Card</span>
					</label>
				</div>
			</div>
			<div class="input-group">
				<div class="input-box">
					<input class="name" type="tel" id="txtcardno" name="txtcardno" required data-mask="0000 0000 0000 0000" placeholder="Card Number">
					<i class="fa fa-credit-card icon" aria-hidden="true"></i>
				</div>
			</div>
			<div class="input-group">
				<div class="input-box">
					<input class="name" type="text" name="txtcvc" id="txtcvc" data-mask="000" placeholder="CVV" required>
					<i class="fa fa-user icon" aria-hidden="true"></i>
				</div>
				<div class="input-box">
					<input class="name" type="text" name="txtdate" id="txtdate" data-mask="00 / 00" placeholder="EXP DATE" required>
					<i class="fa fa-calendar icon" aria-hidden="true"></i>
				</div>
			</div>
			
			<div class="input-group">
				<div class="input-box">
					<input type="submit" name="btn_pay" value="PAY NOW">
				</div>
			</div>
		</form>
	</div>
	<script>
        // Wait for the page to fully load
        window.addEventListener('load', function() {
            // Add the fade-in class to the wrapper
            document.querySelector('.wrapper').classList.add('fade-in');
        });
    </script>
    
</body>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'></script>
</html>
<?php
ob_end_flush();	
?>

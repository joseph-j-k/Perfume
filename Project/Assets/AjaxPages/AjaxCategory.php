<?php include("../Connection/Connection.php");?>

<option value="">---Select---</option>

<?php

$sel="select * from tbl_subcategory where category_id='".$_GET["did"]."'";
$result=$conn->query($sel);
		while($row=$result->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["subCategory_id"];?>"><?php echo $row["subCategory_name"];?></option>
            <?php
		}
	



?>

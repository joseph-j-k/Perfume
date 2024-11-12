<?php include("../Connection/Connection.php");?>


<option value="">----Location----</option>


<?php 

$sel = "select * from tbl_locality where place_id = '".$_GET["did"]."'";

$result = $conn -> query($sel);
			while($row = $result -> fetch_assoc())
			{
				?>
                
                <option value="<?php echo $row["locality_id"];?>"><?php echo $row["locality_name"];?></option>
				
			
            <?php } ?>

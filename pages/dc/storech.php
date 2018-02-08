
<?php
//EDITED BY PFM-ITD NIX
include('../db.php');
$datenow=date('F-d-Y');
?>
<?php
if(isset($_POST['sttrip']))
{
?>
		
<div class="row table-responsive col-md-12">
		<table class="table" >
			      			<tr>
								<th class="text-center">Store</th>
								<th class="text-center">No. of Document Bags</th>
								<!--<th class="text-center">Action</th>-->
			      			</tr>
							<?php 
							$storename=$_POST['sttrip'];
							$storetrip=$_POST['lbltrpno'];
							$check = mysqli_query($link,"SELECT * FROM dcstoretrip WHERE trip_store='$storename' And trip_ticket_no='$storetrip' And trip_date='$datenow'");
							$recieved = mysqli_num_rows($check);

							if($recieved==0){
						    mysqli_query($link,"INSERT INTO dcstoretrip (trip_store,trip_ticket_no,trip_date) Values('$storename','$storetrip','$datenow')");
							
							$query = mysqli_query($link,"SELECT * FROM dcstoretrip WHERE trip_ticket_no='$storetrip'");
							while($row = mysqli_fetch_array($query)){
							?>
							
							<tr class="tblRows">
				      				<td >
										<input type="text" name="stcode[]" class="form-control" id="stcode" value="<?php echo $row['trip_store'];?>" readOnly />
										
				      				</td>
									<td><!--<div class="input-group input-group-xs col-xs-4">--><input type="text" size="10" class="form-control" name="nbox[]" maxlength="3" id="nbox" Placeholder="" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" required /><!--</div>-->
									</td>
				      					<input type="Hidden" name="strid[]" id="strid" value="<?php echo $row['trip_ticket_no'];?>" readOnly />
										<input type="Hidden" name="sid[]" id="sid" value="<?php echo $row['trip_id'];?>" readOnly />
									<td class="text-center">
										<input class="rem" type="button" class="form-control" name="<?php echo $row['trip_id'];?>" id="rem" value="Remove">
				      					
				      				</td>
							</tr>		
							<?php }
							}else{
									?>
									<script>
									alert("Store is in the list!"); 
									</script>
									<?php 
									$query = mysqli_query($link,"SELECT * FROM dcstoretrip WHERE trip_ticket_no='$storetrip'");
									while($row = mysqli_fetch_array($query)){
									?>
							<tr class="tblRows">
				      				<td >
										<input type="text" name="stcode[]" class="form-control col-xs-1" id="stcode" value="<?php echo $row['trip_store'];?>" readOnly />
										
				      				</td>
									<td><input type="text" size="10" class="form-control" maxlength="3" name="nbox[]" id="nbox" Placeholder="" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" required />
									</td>
				      					<input type="Hidden" name="strid[]" id="strid" value="<?php echo $row['trip_ticket_no'];?>" readOnly />
										<input type="Hidden" name="sid[]" id="sid" value="<?php echo $row['trip_id'];?>" readOnly />
									<td class="text-center">
										<input class="rem" type="button" class="form-control" name="<?php echo $row['trip_id'];?>" id="rem" value="Remove">
				      					
				      				</td>
							</tr>	
							<?php
									}
							} 
							?>
							
		</table>
</div>
<?php
}
if(isset($_POST['nameo'])){
	$del=$_POST['nameo'];
	$tripno=$_POST['strid'];
	mysqli_query($link,"DELETE FROM dcstoretrip WHERE trip_id='$del'");
	$query = mysqli_query($link,"SELECT * FROM dcstoretrip WHERE trip_ticket_no='$tripno'");
?>
<table class="table " >
							<tr>
								<th class="text-center">Store</th>
								<th class="text-center">No. of Document Bags</th>
								<!--<th class="text-center">Action</th>-->
			      			</tr>
<?php
							while($row = mysqli_fetch_array($query)){
							?>
							
							<tr class="tblRows">
				      				<td >
										<input type="text" name="stcode[]" class="form-control" id="stcode" value="<?php echo $row['trip_store'];?>" readOnly />
										
				      				</td>
									<td><input type="number" size="5" class="form-control" maxlength="3" name="nbox[]" id="nbox" Placeholder="" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" required />
									</td>
				      					<input type="Hidden" name="strid[]" id="strid" value="<?php echo $row['trip_ticket_no'];?>" readOnly />
										<input type="Hidden" name="sid[]" id="sid" value="<?php echo $row['trip_id'];?>" readOnly />
									<td class="text-center">
										<input class="rem" type="button" class="form-control" name="<?php echo $row['trip_id'];?>" id="rem" value="Remove">
				      					
				      				</td>
							</tr>	
							<?php }
							}
?>				
</table>			
</div>
<script type='text/javascript' src="../js/plugc.js" ></script>
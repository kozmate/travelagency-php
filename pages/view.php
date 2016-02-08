<div class="tabl">
	<div class="panel panel-default holiday_box">
		<div class="panel-body">
			<h2>Nyaralások</h2>
			<form name="holidayform" action="index.php">
				<input type="hidden" name="page" value="holiday">
				
				<table align="center" width="90%">
					<tr>
						<td>
							&nbsp;
						</td>
						<td>
							<strong>ID</strong>
						</td>
						<td>
							<strong>Úticél</strong>
						</td>
						<td>
							<strong>Indulás</strong>
						</td>
						<td>
							<strong>Érkezés</strong>
						</td>
						<td>
							<strong>Férőhely</strong>
						</td>
					</tr>
					
					<? $res = get_data($conn,"holiday"); foreach($res as $arr) : ?>
					<tr>
						<td>
							<input type="radio" name="holiday" value="<?=$arr['holiday_id']?>">
						</td>
						<? foreach($arr as $key => $val) echo "<td>".$val."</td>"; ?>
					</tr>
					<? endforeach; ?>
				</table>
				
				<p class="p_buttons">
					<input type="submit" class="btn btn-success" name="new" value="Új">
					<input type="submit" class="btn btn-primary" name="modify" value="Módosít">
					<input type="submit" class="btn btn-danger" name="delete" value="Töröl">
				</p>
			</form>
		</div>
	</div>
	<div class="panel panel-default customer_box">
		<div class="panel-body">
			<h2>Ügyfelek</h2>
			<form name="customerform" action="index.php">
				<input type="hidden" name="page" value="customer">
				
				<table align="center" width="90%">
					<tr>
						<td>
							&nbsp;
						</td>
						<td>
							<strong>ID</strong>
						</td>
						<td>
							<strong>Név</strong>
						</td>
						<td>
							<strong>Email</strong>
						</td>
						<td>
							<strong>Telefon</strong>
						</td>
					</tr>
					
					<? $res = get_data($conn,"customer"); foreach($res as $arr) : ?>
					<tr>
						<td>
							<input type="radio" name="customer" value="<?=$arr['customer_id']?>">
						</td>
						<? foreach($arr as $key => $val) echo "<td>".$val."</td>"; ?>
					</tr>
					<? endforeach; ?>
				</table>

				<p class="p_buttons">
					<input type="submit" class="btn btn-success" name="new" value="Új">
					<input type="submit" class="btn btn-primary" name="modify" value="Módosít">
					<input type="submit" class="btn btn-danger" name="delete" value="Töröl">
				</p>
			</form>
		</div>
	</div>
</div>
<input type="button" class="btn btn-warning" onClick="javascript:getSelectedValue();" value="Hozzáad">
<div class="panel panel-default connection_box">
	<div class="panel-body">
		<h2>Kapcsolatok</h2>
		<form name="connectionform" action="index.php">
			<input type="hidden" name="page" value="connection">
			
			<table align="center" width="90%">
				<tr>
						<td>
							&nbsp;
						</td>
						<td>
							<strong>ID</strong>
						</td>
						<td>
							<strong>Név</strong>
						</td>
						<td>
							<strong>Email</strong>
						</td>
						<td>
							<strong>Telefon</strong>
						</td>
						<td>
							<strong>Úticél</strong>
						</td>
						<td>
							<strong>Indulás</strong>
						</td>
						<td>
							<strong>Érkezés</strong>
						</td>
					</tr>
			
				<? $res = get_connection($conn); foreach($res as $arr) : ?>
				<tr>
					<td>
						<input type="radio" name="connection" value="<?=$arr['connection_id']?>">
					</td>
					<? foreach($arr as $key => $val) echo "<td>".$val."</td>"; ?>
				</tr>
				<? endforeach; ?>
			</table>
			
			<p class="p_buttons">
				<input type="submit" class="btn btn-danger" name="delete" value="Töröl">
			</p>
		</form>
	</div>
</div>
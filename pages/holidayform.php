<?php

	if(isset($_GET['holiday']))
	{
		$hol_cond = array("holiday_id" => $_GET['holiday']);
		$res = getData($conn,"holiday","*",$hol_cond);
	}

?>
		<h1><?=$keres['szoveg']?></h1>
		<form action="index.php">
			<input type="hidden" name="page" value="holiday">
			<?=($_GET['holiday']) ? '<input type="hidden" name="holiday" value="'.$_GET['holiday'].'">' : ''?>
			<table align="center">
				<tr>
					<td>
						<label for="destination">Úticél: </label>
					</td>
					<td>
						<input type="text" name="destination" value="<?= ($res['destination']) ? $res['destination'] : '' ?>" required>
					</td>
				</tr>
				<tr>
					<td>
						<label for="start_date">Indulás: </label>
					</td>
					<td>
						<input type="date" name="start_date" value="<?= ($res['start_date']) ? $res['start_date'] : '' ?>" required>
					</td>
				</tr>
				<tr>
					<td>
						<label for="start_date">Érkezés: </label>
					</td>
					<td>
						<input type="date" name="end_date" value="<?= ($res['end_date']) ? $res['end_date'] : '' ?>" required>
					</td>
				</tr>
				<tr>
					<td>
						<label for="start_date">Férőhelyek: </label>
					</td>
					<td>
						<input type="number" min="1" max="100" name="seats" value="<?= ($res['seats']) ? $res['seats'] : '' ?>" required>
					</td>
				</tr>
			</table>
			<input type="submit" class="btn btn-primary" name="holidaysubmit">
		</form>
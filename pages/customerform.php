<?php

	if(isset($_GET['customer'])) {
		$cus_cond = array("customer_id" => $_GET['customer']);
		$res = getData($conn,"customer","*",$cus_cond);
	}

?>
		<h1><?=$keres['szoveg']?></h1>
		<form action="index.php">
			<input type="hidden" name="page" value="customer">
			<?=($_GET['customer']) ? '<input type="hidden" name="customer" value="'.$_GET['customer'].'">' : ''?>
			<table align="center">
				<tr>
					<td>
						<label for="name">Név: </label>
					</td>
					<td>
						<input type="text" name="name" value="<?= ($res['name']) ? $res['name'] : '' ?>" required>
					</td>
				</tr>
				<tr>
					<td>
						<label for="email">Email: </label>
					</td>
					<td>
						<input type="email" name="email" value="<?= ($res['email']) ? $res['email'] : '' ?>" required>
					</td>
				</tr>
				<tr>
					<td>
						<label for="phone">Telefon: </label>
					</td>
					<td>
						<input type="text" name="phone" value="<?= ($res['phone']) ? $res['phone'] : '' ?>" required>
					</td>
				</tr>
			</table>
			<input type="submit" class="btn btn-primary" name="customersubmit">
		</form>
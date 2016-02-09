<div class="panel panel-default">
	<div class="panel-body">
		<?php

			if(isset($_GET['new'])) {
				//Hozzáadás
				$error = "";
				
				if(isset($_GET['holiday']) && is_numeric($_GET['holiday'])) $holiday = $_GET['holiday']; else $error.="\nHiányzó vagy érvénytelen nyaralás.";
				if(isset($_GET['customer']) && is_numeric($_GET['customer'])) $customer = $_GET['customer']; else $error.="\nHiányzó vagy érvénytelen.";
				
				if($error!="") echo $error;
				else {
					//Ellenőrzés
					$cond = array("holiday_id" => $holiday, "customer_id" => $customer);
					$res = getData($conn,"connection","connection_id",$cond);
					if(!empty($res)) echo "Ez az ügyfél már szerepel a listán. connection_id: ".$res['connection_id'];
					else {
						$con_array = array("holiday_id" => $holiday, "customer_id" => $customer);
						if(insert($conn,"connection",$con_array)) echo "A hozzáadás megtörtént.";
							else echo "Hiba a hozzáadásnál!";
					}
				}
			} elseif(isset($_GET['delete']) && isset($_GET['connection'])) {
				//Törlés
				$id = $_GET['connection'];
				$con_array = array("connection_id" => $id);
				if(delete($conn,"connection",$con_array)) echo "A törlés megtörtént.";
				else echo "Hiba a törlésnél!";
			} else header("Location: index.php");

		?>
	</div>
</div>
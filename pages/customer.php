<div class="panel panel-default">
	<div class="panel-body">
		<?php

			if(isset($_GET['new'])) {
				unset($_GET['customer']);
				include('pages/customerform.php');
			}
			elseif(isset($_GET['modify']) && isset($_GET['customer'])) {
				include('pages/customerform.php');
			}
			elseif(isset($_GET['delete']) && isset($_GET['customer'])) {
				//Törlés
				$id = $_GET['customer'];
				$cus_array = array("customer_id" => $id);
				if(delete($conn,"customer",$cus_array)) echo "A törlés megtörtént.";
				else echo "Hiba a törlésnél!";
			}
			elseif(isset($_GET['customersubmit'])) {
				if(isset($_GET['customer'])) {
					//Módosítás
					$hiba = "";
					
					$id = $_GET['customer'];
					if(isset($_GET['name'])) $name = $_GET['name']; else $hiba.="\nHiányzó név.";
					if(isset($_GET['email'])) $email = $_GET['email']; else $hiba.="\nÉrvénytelen email cím.";
					if(isset($_GET['phone'])) $phone = $_GET['phone']; else $hiba.="\nÉrvénytelen telefonszám.";
					
					if($hiba!="") echo $hiba;
					else {
						$cus_array = array("name" => $name, "email" => $email, "phone" => $phone);
						$cond_array = array("customer_id" => $id);
						if(modify($conn,"customer",$cus_array,$cond_array)) echo "A módosítás megtörtént.";
						else echo "Hiba a módosításnál!";
					}
					
				} else {
					//Új ügyfél
					$hiba = "";
					
					if(isset($_GET['name'])) $name = $_GET['name']; else $hiba.="\nHiányzó név.";
					if(isset($_GET['email'])) $email = $_GET['email']; else $hiba.="\nÉrvénytelen email cím.";
					if(isset($_GET['phone'])) $phone = $_GET['phone']; else $hiba.="\nÉrvénytelen telefonszám.";
					
					if($hiba!="") echo $hiba;
					else {
						$cus_array = array("name" => $name, "email" => $email, "phone" => $phone);
						if(insert($conn,"customer",$cus_array)) echo "A hozzáadás megtörtént.";
							else echo "Hiba a hozzáadásnál!";
					}
				}
			} else header("Location: index.php");

		?>
	</div>
</div>
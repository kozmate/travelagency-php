<div class="panel panel-default">
	<div class="panel-body">
		<?php

			if(isset($_GET['new'])) {
				unset($_GET['holiday']);
				include('pages/holidayform.php');
			}
			
			elseif(isset($_GET['modify']) && isset($_GET['holiday'])) {
				include('pages/holidayform.php');
			}
			
			elseif(isset($_GET['delete']) && isset($_GET['holiday'])) {
				//Törlés
				$id = $_GET['holiday'];
				$hol_array = array("holiday_id" => $id);
				if(delete($conn,"holiday",$hol_array)) echo "A törlés megtörtént.";
				else echo "Hiba a törlésnél!";
			}
			
			elseif(isset($_GET['holidaysubmit'])) {
				if(isset($_GET['holiday'])) {
					//Módosítás
					$hiba = "";
					
					$id = $_GET['holiday'];
					if(isset($_GET['destination'])) $destination = $_GET['destination']; else $hiba.="\nHiányzó úticél.";
					if(isset($_GET['start_date']) && validateDate($_GET['start_date'])) $start_date = $_GET['start_date']; else $hiba.="\nÉrvénytelen indulási dátum.";
					if(isset($_GET['end_date']) && validateDate($_GET['end_date'])) $end_date = $_GET['end_date']; else $hiba.="\nÉrvénytelen érkezési dátum.";
					if(isset($_GET['seats']) && is_numeric($_GET['seats'])) $seats = $_GET['seats']; else $hiba.="\nÉrvénytelen férőhely.";
					
					if($hiba!="") echo $hiba;
					else {
						$hol_array = array("destination" => $destination, "start_date" => $start_date, "end_date" => $end_date, "seats" => $seats);
						$cond_array = array("holiday_id" => $id);
						if(modify($conn,"holiday",$hol_array,$cond_array)) echo "A módosítás megtörtént.";
						else echo "Hiba a módosításnál!";
					}
					
				} else {
					//Új nyaralás
					$hiba = "";
					
					if(isset($_GET['destination'])) $destination = $_GET['destination']; else $hiba.="\nHiányzó úticél.";
					if(isset($_GET['start_date']) && validateDate($_GET['start_date'])) $start_date = $_GET['start_date']; else $hiba.="\nÉrvénytelen indulási dátum.";
					if(isset($_GET['end_date']) && validateDate($_GET['end_date'])) $end_date = $_GET['end_date']; else $hiba.="\nÉrvénytelen érkezési dátum.";
					if(isset($_GET['seats']) && is_numeric($_GET['seats'])) $seats = $_GET['seats']; else $hiba.="\nÉrvénytelen férőhely.";
					
					if($hiba!="") echo $hiba;
					else {
						$hol_array = array("destination" => $destination, "start_date" => $start_date, "end_date" => $end_date, "seats" => $seats);
						if(insert($conn,"holiday",$hol_array)) echo "A hozzáadás megtörtént.";
						else echo "Hiba a hozzáadásnál!";
					}
				}
			} else header("Location: index.php");

		?>
	</div>
</div>
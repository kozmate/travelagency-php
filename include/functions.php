<?php

	function pdoConn()	{
		$dsn = 'mysql:dbname=travel;host=217.112.131.46';
		$user = '';
		$password = '';

		try {
			$conn = new PDO($dsn, $user, $password);
			$conn->query('SET NAMES utf8 COLLATE utf8_general_ci');
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
		
		return $conn;
	}
	
	function insert($conn,$tbl,$array) {
		if(isset($conn) && isset($tbl) && is_array($array)) {
			$sql = "INSERT INTO `$tbl` ";
			$cols = "(";
			$vals = "(";
			$i = 0;
			$c = count($array);
			foreach($array as $key => $value) {
				$cols .= "`$key`";
				$vals .= "'$value'";
				if(++$i == $c) {
					$cols .= ")";
					$vals .= ")";
				} else {
					$cols .= ",";
					$vals .= ",";
				}
			}
			
			$sql .= $cols." VALUES ".$vals;
			
			if ($conn->query($sql) == true) return true;
			else echo $conn->error;
		}
	}
	
	function modify($conn,$tbl,$array,$cond) {
		if(isset($conn) && isset($tbl) && is_array($array)) {
			$sql = "UPDATE `$tbl` SET ";
			$i = 0;
			$c = count($array);
			foreach($array as $key => $value) {
				$sql .= "`$key`='$value'";
				if(++$i == $c) $sql .= ""; else $sql .= ", ";
			}
			$i = 0;
			$c = count($cond);
			if($c > 0) {
				$sql .= " WHERE ";
				foreach($cond as $key => $value) {
					$sql .= "`$key`='$value'";
					if(++$i == $c) $sql .= ""; else $sql .= " AND ";
				}
			}
			
			if ($conn->query($sql) == true) return true;
			else echo $conn->error;
		}
	}
	
	function delete($conn,$tbl,$array) {
		if(isset($conn) && isset($tbl) && is_array($array)) {
			$sql = "DELETE FROM `$tbl` WHERE ";
			$i = 0;
			$c = count($array);
			foreach($array as $key => $val) {
				$sql .= "`$key`='$val'";
				if(++$i == $c) $sql .= ""; else $sql .= " AND ";
			}
			
			if ($conn->query($sql) == true) return true;
			else echo $conn->error;
		} else return false;
	}
	
	function getData($conn,$tbl,$array="*",$cond=null) {
			$sql = "SELECT ";
			if(is_array($array)) {
				$i = 0;
				$c = count($array);
				foreach($array as $val) {
					$sql .= $val;
					if(++$i == $c) $sql .= ""; else $sql .= ", ";
				}
			} else $sql .= $array;
			
			$sql .= " FROM `$tbl`";
			
			if(is_array($cond)) {
				$i = 0;
				$c = count($cond);
				if($c > 0) {
					$sql .= " WHERE ";
					foreach($cond as $key => $value) {
						$sql .= "`$key`='$value'";
						if(++$i == $c) $sql .= ""; 
						else $sql .= " AND ";
					}
				}
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
			} else {
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		
		return $result;
	}

	function getConnection($conn,$id=null) {
		if($id===null) {
			$sql = "SELECT connection_id, name, email, phone, destination, start_date, end_date FROM `connection` c
					JOIN customer u ON (c.customer_id=u.customer_id)
					JOIN holiday h ON (c.holiday_id=h.holiday_id)";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$sql = "SELECT connection_id, name, email, phone, destination, start_date, end_date FROM `connection` c
					JOIN customer u ON (c.customer_id=u.customer_id)
					JOIN holiday h ON (c.holiday_id=h.holiday_id) WHERE `connection_id` = '$id'";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
		}
		
		return $result;
	}
	
	function validateDate($date, $format = 'Y-m-d') {
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}
	
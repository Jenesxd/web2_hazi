<?php
const HOST = 'localhost';
const DATABASE = 'web2_hazi';
const USER = 'root';
const PASSWORD = '';
switch ($_POST['op']) {
	case 'megyek':
		$eredmeny = array("lista" => array());
		try {
			$dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD,
						   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
			$stmt = $dbh->query("select id, nev from megye");
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$eredmeny["lista"][] = array("id" => $row['id'], "nev" => $row['nev']);
			}
		} catch (PDOException $e) {
		}
		echo json_encode($eredmeny);
		break;

	case 'varos':
		$eredmeny = array("lista" => array());
		try {
			$dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD,
						   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
			$stmt = $dbh->prepare("select id, nev from varos1 where megyeid = :id");
			$stmt->execute(array(":id" => $_POST["id"]));
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$eredmeny["lista"][] = array("id" => $row['id'], "nev" => $row['nev']);
			}
		} catch (PDOException $e) {
		}
		echo json_encode($eredmeny);
		break;

	case 'lelekszam':
		$eredmeny = array("lista" => array());
		try {
			$dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD,
						   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
			
			$stmt = $dbh->prepare("select varosid, ev from lelekszam_csv where varosid = :id");
			$stmt->execute(array(":id" => $_POST["id"]));
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$eredmeny["lista"][] = array("id" => $row['varosid'], "ev" => $row['ev']);
			}
		} catch (PDOException $e) {
		}
		echo json_encode($eredmeny);
		break;

	case 'info':
		$eredmeny = array("ev" => "", "no" => "", "osszesen" => "");
		try {
			$dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD,
						   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
			$stmt = $dbh->prepare("select ev, no, osszesen from lelekszam_csv where varosid = :id");
			$stmt->execute(array(":id" => $_POST["id"]));
			if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$eredmeny = array(
					"ev" => $row['ev'],
					 "no" => $row['no'],
					 "osszesen" => $row['osszesen']
					
					);
			}
		} catch (PDOException $e) {
		}
		echo json_encode($eredmeny);
		break;
}

?>

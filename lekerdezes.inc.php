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
			$stmt = $dbh->query("select `id`, `nev` from `megye`");
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

	case 'lelekszam_csv':
		$eredmeny = array("lista" => array());
		try {
			$dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD,
						   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
			$stmt = $dbh->prepare("select ev, osszesen from lelekszam_csv where varosid = :id");
			$stmt->execute(array(":id" => $_POST["id"]));
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$eredmeny["lista"][] = array("id" => $row['id'], "nev" => $row['nev']);
			}
		} catch (PDOException $e) {
		}
		echo json_encode($eredmeny);
		break;
	case 'info':
		$eredmeny = array("ev" => "", "osszesen" => "");
		try {
			$dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD,
						   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
			$stmt = $dbh->prepare("select ev, osszesen, from lelekszam_csv where varosid = :id");
			$stmt->execute(array(":id" => $_POST["id"]));
			if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$eredmeny = array(
					"ev" => $row['ev'],
					"osszesen" => $row['osszen']);
			}
		} catch (PDOException $e) {
		}
		echo json_encode($eredmeny);
		break;
}


/*
switch($_POST['op']) {
  case 'megyek':
    $eredmeny = array("lista" => array());
    try {
      $dbh = new PDO('mysql:host=localhost;dbname=web2_hazi', 'root', '',
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
      $stmt = $dbh->query("select megyeid, nev from megye");
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $eredmeny["lista"][] = array("id" => $row['megyeid'], "nev" => $row['nev']);
      }
    }
    catch(PDOException $e) {
    }
    echo json_encode($eredmeny);
    break;

  case 'varos':
    $eredmeny = array("lista" => array());
    try {
      $dbh = new PDO('mysql:host=localhost;dbname=web2_hazi', 'root', '',
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
      $stmt = $dbh->prepare("select varosid, nev from varos1 where megyeid = :id");
      $stmt->execute(Array(":id" => $_POST["id"]));
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $eredmeny["lista"][] = array("id" => $row['varosid'], "nev" => $row['nev']);
      }
    }
    catch(PDOException $e) {
    }
    echo json_encode($eredmeny);
    break;
  case 'lelekszam':
    $eredmeny = array("lista" => array());
    try {
      $dbh = new PDO('mysql:host=localhost;dbname=web2_hazi', 'root', '',
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
      $stmt = $dbh->prepare("select varosid, ev, osszesen from lelekszam_csv where varosid = :id");
      $stmt->execute(Array(":id" => $_POST["id"]));
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $eredmeny["lista"][] = array("ev" => $row['ev'], "osszesen" => $row['osszesen']);
      }
    }
    catch(PDOException $e) {
    }
    echo json_encode($eredmeny);
    break;
  case 'info':
    $eredmeny = array("megyenev" => "", "varosnev" => "", "ev" => "", "osszesen" => "");
    try {
      $dbh = new PDO('mysql:host=localhost;dbname=web2_házi', 'root', '',
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
      $stmt = $dbh->prepare("select ev, osszesen from lelekszam_csv where varosid = :id");
      $stmt->execute(Array(":id" => $_POST["id"]));
      if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $eredmeny = array("nev" => $row['megyenev'],
            "ev" => $row['ev'],
            "osszesen" => $row['osszesen']);
      }
    }
    catch(PDOException $e) {
    }
    echo json_encode($eredmeny);
    break;
}
*/
/*
const HOST = 'localhost';
const DATABASE = 'web2_hazi';
const USER = 'root';
const PASSWORD = '';
switch ($_POST['op']) {
  case 'megye':
      $eredmeny = array("lista" => array());
      try {
          $dbh = new PDO('mysql:host=localhost;dbname=web2_hazi', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
          $stmt = $dbh->query("select megyeid, nev from megye");
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $eredmeny["lista"][] = array("id" => $row['megyeid'], "nev" => $row['nev']);
          }
      } catch (PDOException $e) {
      }
      echo json_encode($eredmeny);
      break;
  case 'varos':
      $eredmeny = array("lista" => array());
      try {
          $dbh = new PDO('mysql:host=localhost;dbname=web2_hazi', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
          $stmt = $dbh->prepare("select varosid, nev from varos1 where megyeid = :id");
          $stmt->execute(Array(":id" => $_POST["id"]));
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $eredmeny["lista"][] = array("id" => $row['varosid'], "nev" => $row['nev']);
          }
      } catch (PDOException $e) {
      }
      echo json_encode($eredmeny);
      break;
  case 'intezmeny':
      $eredmeny = array("lista" => array());
      try {
          $dbh = new PDO('mysql:host=localhost;dbname=web2_hazi', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
          $stmt = $dbh->prepare("select varosid, ev, osszesen from lelekszam_csv where varosid = :id");
          $stmt->execute(Array(":id" => $_POST["id"]));
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $eredmeny["lista"][] = array("ev" => $row['ev'], "osszesen" => $row['osszesen']);
          }
      } catch (PDOException $e) {
      }
      echo json_encode($eredmeny);
      break;
  case 'info':
      $eredmeny = array("megyenev" => "", "varosnev" => "", "ev" => "", "osszesen" => "");
      try {
          $dbh = new PDO('mysql:host=localhost;dbname=web2_hazi', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

          // Megye lekérdezése
          $stmtMegye = $dbh->prepare("select nev from megye where megyeid = :id");
          $stmtMegye->execute(Array(":id" => $_POST["id"]));
          if ($rowMegye = $stmtMegye->fetch(PDO::FETCH_ASSOC)) {
              $eredmeny["megyenev"] = $rowMegye['nev'];
          }

          // Város lekérdezése
          $stmtVaros = $dbh->prepare("select nev from varos1 where varosid = :id");
          $stmtVaros->execute(Array(":id" => $_POST["id"]));
          if ($rowVaros = $stmtVaros->fetch(PDO::FETCH_ASSOC)) {
              $eredmeny["varosnev"] = $rowVaros['nev'];
          }

          // Lelekszám lekérdezése
          $stmtLelekszam = $dbh->prepare("select ev, osszesen from lelekszam_csv where varosid = :id");
          $stmtLelekszam->execute(Array(":id" => $_POST["id"]));
          if ($rowLelekszam = $stmtLelekszam->fetch(PDO::FETCH_ASSOC)) {
              $eredmeny["ev"] = $rowLelekszam['ev'];
              $eredmeny["osszesen"] = $rowLelekszam['osszesen'];
          }

      } catch (PDOException $e) {
      }
      echo json_encode($eredmeny);
      break;
}*/





  
?>

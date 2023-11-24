<?php

class LelekSzamModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM lelekszam_csv");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM lelekszam_csv WHERE varosid = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($ev, $no, $osszesen) {
        $stmt = $this->pdo->prepare("INSERT INTO lelekszam_csv (ev, no, osszesen) VALUES (:ev, :no, :osszesen)");
        $stmt->bindParam(':ev', $ev);
        $stmt->bindParam(':no', $no);
        $stmt->bindParam(':osszesen', $osszesen);
        return $stmt->execute();
    }

    public function update($varosid, $ev, $no, $osszesen) {
        $stmt = $this->pdo->prepare("UPDATE lelekszam_csv SET ev = :ev, no = :no, osszesen = :osszesen WHERE varosid = :varosid");
        $stmt->bindParam(':varosid', $varosid);
        $stmt->bindParam(':ev', $ev);
        $stmt->bindParam(':no', $no);
        $stmt->bindParam(':osszesen', $osszesen);
        return $stmt->execute();
    }

    public function delete($varosid) {
        $stmt = $this->pdo->prepare("DELETE FROM lelekszam_csv WHERE varosid = :varosid");
        $stmt->bindParam(':varosid', $varosid);
        return $stmt->execute();
    }
}
?>
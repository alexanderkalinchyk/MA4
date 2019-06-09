<?php

require_once( __DIR__ . '/DAO.php');

class ClipDAO extends DAO {

  public function selectClipsByGenre($genre){
    $sql = "SELECT * FROM `ma4_clips` WHERE `genre` = :genre";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':genre', $genre);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}
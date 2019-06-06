<?php

require_once( __DIR__ . '/DAO.php');

class GenreDAO extends DAO {

  public function selectAudioByGenre($genre){
    $sql = "SELECT * FROM `ma4_audio` WHERE `genre` = :genre";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':genre', $genre);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}

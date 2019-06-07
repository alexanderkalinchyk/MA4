<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/GenreDAO.php';

class PagesController extends Controller {

    private $genreDAO;
    //private $voorstellingDAO;

    function __construct() {
     $this->genreDAO = new GenreDAO();
     //$this->voorstellingDAO = new VoorstellingDAO();
    }
    public function index(){
        $this->set('title', 'Home');
        $this->set('currentPage', 'home');
    }
    public function genres(){
      $this->set('title', 'Genres');
      $this->set('currentPage', 'genres');
  }
    public function emotie(){
      $this->set('title', 'Emotie');
      $this->set('currentPage', 'emotie');

      if (!empty($_GET['genre'])) {
          print($_GET['genre']);
          $audio = $this->genreDAO->selectAudioByGenre($_GET['genre']);
          $this->set('audio', $audio);
          $this->set('genre', $_GET['genre']);
      }
  }
    public function clips(){
      $this->set('title', 'Clips');
      $this->set('currentPage', 'clips');

      if (!empty($_GET['genre']) && !empty($_GET['song'])) {
        $this->set('genre', $_GET['genre']);
      }
  }
}

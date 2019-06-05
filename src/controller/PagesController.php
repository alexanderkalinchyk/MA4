<?php

require_once __DIR__ . '/Controller.php';

class PagesController extends Controller {

    //private $tourDAO;
    //private $voorstellingDAO;

    function __construct() {
     //   $this->tourDAO = new TourDAO();
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
}
<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/VoorstellingDAO.php';

class VoorstellingenController extends Controller {

    //private $tourDAO;
    private $voorstellingDAO;

    function __construct() {
     //   $this->tourDAO = new TourDAO();
     $this->voorstellingDAO = new VoorstellingDAO();
    }
    public function voorstellingen(){

        if (!empty($_GET['action']) && $_GET['action'] == 'filter') {

          if(isset($_GET['type'][0])){ $type1 = $_GET['type'][0]; }
          else{$type1 = '';}
          if(isset($_GET['type'][1])){ $type2 = $_GET['type'][1]; }
          else{$type2 = '';}
          if(isset($_GET['type'][2])){ $type3 = $_GET['type'][2]; }
          else{$type3 = '';}

          $shows = $this->voorstellingDAO->search($_GET['search'], $_GET['day'], $type1, $type2, $type3, $_GET['sort']);

          $search = $_GET['search'];
          if($_GET['day'] == 'Vrijdag'){$checkedVrijdag = true;}
          if($_GET['day'] == 'Zaterdag'){$checkedZaterdag = true;}
          if($_GET['day'] == 'Zondag'){$checkedZondag = true;}
          if($_GET['day'] == ''){$checkedAll = true;}

          if($type1 == 'Voorstelling'){$checkedtype1 = true;}
          if($type1 == 'Straatact'){$checkedtype2 = true;}
          if($type1 == 'Familie Voorstelling'){$checkedtype3 = true;}
          if($type2 == 'Straatact'){$checkedtype2 = true;}
          if($type2 == 'Familie Voorstelling'){$checkedtype3 = true;}
          if($type3 == 'Familie Voorstelling'){$checkedtype3 = true;}

          if($_GET['sort'] == 'DESC'){$selectedDESC = true;}
          if($_GET['sort'] == 'ASC'){$selectedASC = true;}

        }
        else{
          $shows = $this->voorstellingDAO->selectAllShows();
          $search = '';
          $checkedVrijdag = true;

          $checkedtype1 = true;
          $checkedtype2 = true;
          $checkedtype3 = true;

          $selectedDESC = true;
        }

        if(isset($selectedASC)){$this->set('selectedASC', 'selected');}
        if(isset($selectedDESC)){$this->set('selectedDESC', 'selected');}

        if(isset($checkedtype1)){$this->set('checkedtype1', 'checked');}
        if(isset($checkedtype2)){$this->set('checkedtype2', 'checked');}
        if(isset($checkedtype3)){$this->set('checkedtype3', 'checked');}

        if(isset($checkedVrijdag)){$this->set('checkedVrijdag', 'checked');}
        if(isset($checkedZaterdag)){$this->set('checkedZaterdag', 'checked');}
        if(isset($checkedZondag)){$this->set('checkedZondag', 'checked');}
        if(isset($checkedAll)){$this->set('checkedAll', 'checked');}

        $this->set('search', $search);
        $this->set('shows', $shows);
        $this->set('title', 'Voorstellingen');
        $this->set('currentPage', 'voorstellingen');

        if (strtolower($_SERVER['HTTP_ACCEPT']) == 'application/json') {

          header('Content-Type: application/json');
          echo json_encode($shows);
          exit();
        }

    }
    public function details(){
         $this->set('currentPage', 'details');

         if (!empty($_GET['id'])) {
          $detail = $this->voorstellingDAO->selectDetailsById($_GET['id']);
          $this->set('detail', $detail);

          $others = $this->voorstellingDAO->selectOthers();
          $this->set('others', $others);

          $this->set('title', strtoupper ($detail['name']));
         }
     }
}
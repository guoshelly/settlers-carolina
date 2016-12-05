<?php

class Card {
  public static function connect() {
    return new mysqli("classroom.cs.unc.edu",
          "mhb",
          "password",
          "mhbdb");
  }
  private $PlayerID;
  private $Ram;
  private $Ramen;
  private $Brick;
  private $Basketball;
  private $Book;
  private $Knight;
  private $OldWell;
  private $ThePit;
  private $DavisLibrary;
  Private $Sitterson;
  private $BellTower;
  private $Roads;
  private $Volunteer;
  private $Monopoly;

  public static function update($PlayerID, $CardName){
    $conn= Card::connect();

  //check if Player has been inserted.
  $SQL= "Select $CardName from Cards where PlayerID = $PlayerID";
  $result = mysqli_query($mysqli, $SQL);
  $CardValue = $result;

    if($result->num_rows==0){
      $SQL = "Insert into Cards (PlayerID, $CardName) Values ($PlayerID, " . $result+1 . " )";
      $result = mysqli_query($mysqli, $SQL);
    }
    else{
      $SQL = "Update Cards set $CardName = $CardValue where PlayerID = $PlayerID";
      $result = mysqli_query($mysqli, $SQL);
    }
  }

  public static function findByID($PlayerID){
    $mysqli = Card::connect();
    $SQL = "Select * from Cards where PlayerID = $PlayerID";
    $result = $myqli_query($SQL);
    if($result){
      if($result->num_rows==0){
        //no matches
        return null;
      }
      else{
        $card_info = $result->fetch_array();

        return new Card(card_info['PlayerID'],
                        card_info['Ram'],
                        card_info['Ramen'],
                        card_info['Brick'],
                        card_info['BasketBall'],
                        card_info['Book'],
                        card_info['Knight'],
                        card_info['OldWell'],
                        card_info['ThePit'],
                        card_info['DavisLibrary'],
                        card_info['Sitterson'],
                        card_info['BellTower'],
                        card_info['Roads'],
                        card_info['Volunteer'],
                        card_info['Monopoly']);
      }
    }
    return null;

  }

  public static function create($PlayerID, $Ram, $Ramen, $Brick, $Basketball,
   $Book, $Knight, $OldWell, $ThePit, $DavisLibrary, $Sitterson,
    $BellTower, $Roads, $Volunteer, $Monopoly) {
      $conn = Card::connect();

      if ($conn->connect_error) {
          die("Connection unsuccessful");
      } else {
          echo "Connection successful";
      }

      $res = $conn->query(
      "INSERT INTO Cards VALUES('$PlayerID', '$Ram', '$Ramen',
      '$Brick', '$Basketball', '$Book', '$Knight', '$OldWell', '$ThePit',
      '$DavisLibrary', '$Sitterson', '$BellTower', '$Roads', '$Volunteer', '$Monopoly')
      ");

      if ($res) {
          return new Card($PlayerID, $Ram, $Ramen, $Brick, $Basketball,
           $Book, $Knight, $OldWell, $ThePit, $DavisLibrary, $Sitterson,
            $BellTower, $Roads, $Volunteer, $Monopoly);
      } else {
          echo "<br />Insertion error! <br />";
          echo $conn->connect_error;
      }
  }

   function __construct( $PlayerID, $Ram, $Ramen, $Brick, $Basketball,
    $Book, $Knight, $OldWell, $ThePit, $DavisLibrary, $Sitterson,
     $BellTower, $Roads, $Volunteer, $Monopoly ){
    $this-> PlayerID = $PlayerID;
    $this-> Ram = $Ram;
    $this-> Ramen = $Ramen;
    $this-> Brick = $Brick;
    $this-> Basketball = $Basketball;
    $this-> Book = $Book;
    $this-> Knight = $Knight;
    $this-> OldWell = $OldWell;
    $this-> ThePit = $ThePit;
    $this-> DavisLibrary = $DavisLibrary;
    $this-> Sitterson = $Sitterson;
    $this-> BellTower = $BellTower;
    $this-> Roads = $Roads;
    $this-> Volunteer = $Volunteer;
    $this-> Monopoly = $Monopoly;

  }

  function getPlayerID() {
      return $this->PlayerID;
  }

  function getRam() {
      return $this->Ram;
  }

  function getRamen() {
      return $this->Ramen;
  }

  function getBrick() {
      return $this->Brick;
  }

  function getBasketball() {
      return $this->Basketball;
  }

  function getBook() {
      return $this->Book;
  }

  function getKnight() {
      return $this->Knight;
  }

  function getOldWell() {
      return $this->OldWell;
  }


  function getThePit() {
      return $this->ThePit;
  }

  function getDavisLibrary() {
      return $this->DavisLibrary;
  }

  function getSitterson() {
      return $this->Sitterson;
  }

  function getBellTower() {
      return $this->BellTower;
  }

  function getRoads() {
      return $this->Roads;
  }

  function getVolunteer() {
      return $this->Volunteer;
  }

  function getMonopoly() {
      return $this->Monopoly;
  }

}
class College {

  private $CollegeID;
  private $PlayerID;
  private $Available;
  private $University;

  public static function connect() {
    return new mysqli("classroom.cs.unc.edu",
          "mhb",
          "password",
          "mhbdb");
  }

public static function findByID($CollegeID){
  $mysqli= College::connect();
  $SQL= "Select * from Colleges where CollegeID = $CollegeID ";

  $result= mysqli_query($mysqli, $SQL);

  if($result){
    if($result->num_rows==0){
      return null;
    }
    else{
      $College_info = $result->fetch_array();
      return new College($College_info['CollegeID'],
                         $College_info['PlayerID'],
                         $College_info['Available'],
                         $College_info['University'] );
    }
  }
return null;
}

public static function getAllIDs() {
$SQL = "Select CollegeID from Colleges where 1";
  $result= mysqli_query($mysqli, $SQL);

}
public static function getJSON(){
$json_obj = array('CollegeID' => $this->CollegeID,
                   'PlayerID' => $this->PlayerID,
                   'Available' => $this->Available,
                   'University' => $this->University );
return json_encode($json_obj);
}

 private function update() {
   $mysqli= College::connect();

   $SQL = "Update Colleges set
   CollegeID = $mysqli->real_escape_string($this->CollegeID),
   PlayerID = $mysqli->real_escape_string($this->PlayerID),
   Available = $mysqli->real_escape_string($this->Available),
   Available = $mysqli->real_escape_string($this->University)";
  $result= mysqli_query($mysqli, $SQL);
  return $result;
 }
private function __construct($CollegeID, $PlayerID, $Available, $University){
$this->CollegeID = $CollegeID;
$this->PlayerID = $PlayerID;
$this->Available = $Available;
$this->University = $University;
}

function getCollegeID() {
    return $this->CollegeID;
}

function getPlayerID(){
    return $this->PlayerID;
}

function getAvailable(){
    return $this->Available;
}

function getUniversity(){
  return $this->University;
}

function setCollegeID(){
  $this->CollegeID = $CollegeID;
  return $this->update();
}

function setPlayerID(){
  $this->PlayerID = $PlayerID;
  return $this->update();
}

function setAvailable(){
  $this->Available = $Available;
  return $this->update();
}

function setUniversity(){
  $this->University = $University;
  return $this->update();
}
}

class Tile {
  private $ID;
  private $Robber;

  public static function findByID($ID){

  }
  public static function getAllIDs() {

  }
  public static function getJSON(){

  }
   private function update() {

   }
  private function __construct(){

  }

}
class Road{
  private $RoadID;
  private $PlayerID;
  private $Available;

    public static function connect() {
      return new mysqli("classroom.cs.unc.edu",
            "mhb",
            "password",
            "mhbdb");
    }

  public static function findByID($RoadID){
    $mysqli= Road::connect();
    $SQL= "Select * from Roads where RoadID = $RoadID ";
    $result= mysqli_query($mysqli, $SQL);

    if($result){
      if($result->num_rows==0){
        return null;
      }
      else{
        $Road_info = $result->fetch_array();
        return new Road($Road_info['RoadID'],
                           $Road_info['PlayerID'],
                           $Road_info['Available'] );
      }
    }
  return null;
  }

  public static function getAllIDs() {
  $SQL = "Select RoadID from Roads where 1";
    $result= mysqli_query($mysqli, $SQL);

  }
  public static function getJSON(){
  $json_obj = array('RoadID' => $this->RoadID,
                     'PlayerID' => $this->PlayerID,
                     'Available' => $this->Available );
  return json_encode($json_obj);

  }
   private function update() {
     $mysqli= Road::connect();

     $SQL = "Update Roads set
     RoadID = $mysqli->real_escape_string($this->RoadID),
     PlayerID = $mysqli->real_escape_string($this->PlayerID),
     Available = $mysqli->real_escape_string($this->Available)";
    $result= mysqli_query($mysqli, $SQL);
    return $result;
   }
  private function __construct($RoadID, $PlayerID, $Available, $University){
  $this->RoadID = $RoadID;
  $this->PlayerID = $PlayerID;
  $this->Available = $Available;
  }

  function getRoadID() {
      return $this->RoadID;
  }

  function getPlayerID(){
      return $this->PlayerID;
  }

  function getAvailable(){
      return $this->Available;
  }

  function setRoadID(){
    $this->RoadID = $RoadID;
    return $this->update();
  }

  function setPlayerID(){
    $this->PlayerID = $PlayerID;
    return $this->update();
  }

  function setAvailable(){
    $this->Available = $Available;
    return $this->update();
  }

}

class Player {
  private $PlayerID;
  private $Username;
  private $RoadsCount;
  private $SoldiersCount;
  private $Points;

  public static function connect() {
    return new mysqli("classroom.cs.unc.edu",
          "mhb",
          "password",
          "mhbdb");
  }

public static function findByID($PlayerID){
  $mysqli= Player::connect();
  $SQL= "Select * from Players where PlayerID = $PlayerID ";
  $result= mysqli_query($mysqli, $SQL);

  if($result){
    if($result->num_rows==0){
      return null;
    }
    else{
      $Player_info = $result->fetch_array();
      return new Player($Player_info['PlayerID'],
                         $Player_info['Username'],
                         $Player_info['RoadsCount'],
                         $Player_info['SoldierCount'],
                         $Player_info['Points']);
    }
  }
return null;
}

public static function getAllIDs() {
$SQL = "Select PlayerID from Players where 1";
  $result= mysqli_query($mysqli, $SQL);

}
public static function getJSON(){
$json_obj = array('PlayerID' => $this->PlayerID,
                  'Username' => $this->Username,
                  'RoadsCount' => $this->RoadsCount,
                  'SoldiersCount' => $this->SoldiersCount,
                  'Points' => $this->Points );
return json_encode($json_obj);

}
 private function update() {
   $mysqli= Player::connect();

   $SQL = "Update Players set
   PlayerID = $mysqli->real_escape_string($this->PlayerID),
   Username = '$mysqli->real_escape_string($this->Username)',
   RoadsCount = $mysqli->real_escape_string($this->RoadsCount),
   SoldiersCount = $mysqli->real_escape_string($this->SoldiersCount),
   Points= $mysqli->real_escape_string($this->Points)";
  $result= mysqli_query($mysqli, $SQL);

  return $result;
 }

private function __construct($RoadID, $PlayerID, $Available, $University){
$this->PlayerID= $PlayerID;
$this->Username= $Username;
$this->RoadsCount= $RoadsCount;
$this->SoldiersCount= $SoldiersCount;
$this->Points= $Points;
}

function getPlayerID(){
    return $this->PlayerID;
}

function getUsername(){
    return $this->Username;
}

function getRoadsCount(){
    return $this->RoadsCount;
}

function getSoldiersCount(){
    return $this->SoldiersCount;
}

function getPoints(){
  return $this->Points;
}

function setPlayerID(){
  $this->PlayerID = $PlayerID;
  return $this->update();
}

function setUsername(){
  $this->Username = $Username;
  return $this->update();
}

function setRoadsCount(){
  $this->RoadsCount = $RoadsCount;
  return $this->update();
}

function setSoldiersCount(){
  $this->SoldiersCount = $SoldiersCount;
  return $this->update();
}

function setPoints(){
  $this->Points = $Points;
  return $this->update();
}

}

 ?>

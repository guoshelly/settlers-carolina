<?php
require("SettlersOfCarolina-orm.php");
//NUMBER ONE: Get Multiple People in One Game

//we need function to update/get cards
//to get/update roads
//To get/update colleges
//To find/set robber
//Get and update Player Information.

$conn = new mysqli("classroom.cs.unc.edu", "mhb", "password", "mhbdb");

//Get/SettlersofCarolina/Cards/PlayerID and POST/SettlersofCarolina/Cards/PlayerID
$path_components = explode('/', $_SERVER['PATH_INFO']);

  if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if($path_components[1]=="Cards"){
      if($path_components[2]=="PlayerID"){
        $PlayerID= intval($path_components[2]);
        $requested_hand = Card::findByID($PlayerID);
        if ($requested_hand == null) {
          // not found.
          header("HTTP/1.0 404 Not Found");
          print("Player id: " . $Player_id . " not found.");
          exit();
        }
        header("Content-type: application/json");
        print($requested_hand->getJSON());
        exit();
      }
      else{
        // no ID, try returning all IDs.
        //TODO implement .getAllIDs
        header("Content-type: application/json");
        print(json_encode(Card::getAllIDs()));
        exit();
      }
    }
  else if($path_components[1]=="Players"){
    if($path_components[2]=="PlayerID"){
      $PlayerID= intval($path_components[2]);
      $Player_Info = Player::findByID($PlayerID);
      if ($Player_Info == null) {
        // not found.
        header("HTTP/1.0 404 Not Found");
        print("Player id: " . $Player_id . " not found.");
        exit();
      }
      header("Content-type: application/json");
      print($Player_Info->getJSON());
      exit();
    }
    else{
      // no ID, try returning all IDs.
      //TODO implement .getAllIDs
      header("Content-type: application/json");
      print(json_encode(Player::getAllIDs()));
      exit();
    }
  }
  else if($path_components[1]=="Roads"){
    if($path_components[2]=="RoadID"){
      $RoadID= intval($path_components[2]);
      $Road_Info = Road::findByID($RoadID);
      if ($Road_Info == null) {
        // not found.
        header("HTTP/1.0 404 Not Found");
        print("Road id: " . $Road_id . " not found.");
        exit();
      }
      header("Content-type: application/json");
      print($Road_Info->getJSON());
      exit();
    }
    else{
      // no ID, try returning all IDs.
      //TODO implement .getAllIDs
      header("Content-type: application/json");
      print(json_encode(Road::getAllIDs()));
      exit();
  }
  else if($path_components[1]=="Tiles"){
    if($path_components[2]=="ID"){
      $TileID= intval($path_components[2]);
      $Tile_Info = Tile::findByID($TileID);
      if ($Tile_Info == null) {
        // not found.
        header("HTTP/1.0 404 Not Found");
        print("Tile id: " . $Tile_info . " not found.");
        exit();
      }
      header("Content-type: application/json");
      print($Tile_Info->getJSON());
      exit();
    }
    else{
      // no ID, try returning all IDs.
      //TODO implement .getAllIDs
      header("Content-type: application/json");
      print(json_encode(Tile::getAllIDs()));
      exit();
    }
  }
  else if($path_components[1]=="Colleges"){
    if($path_components[2]=="CollegeID"){
      $CollegeID= intval($path_components[2]);
      $College_Info = College::findByID($CollegeID);
      if ($College_Info == null) {
        // not found.
        header("HTTP/1.0 404 Not Found");
        print("College id: " . $College_id . " not found.");
        exit();
      }
      header("Content-type: application/json");
      print($College_Info->getJSON());
      exit();
    }
    else{
      // no ID, try returning all IDs.
      //TODO implement .getAllIDs
      header("Content-type: application/json");
      print(json_encode(College::getAllIDs()));
      exit();
  }
}
  if ($_SERVER['REQUEST_METHOD'] == "PUT") {
    if($path_components[1]=="Cards"){
      if($path_components[2]=="PlayerID"){

      }
      else{

      }
    }
    else if($path_components[1]=="Players"){
      if($path_components[2]=="PlayerID"){

      }
      else{

      }
    }
    else if($path_components[1]=="Roads"){
      if($path_components[2]=="RoadID"){

      }
      else{

      }
    }
    else if($path_components[1]=="Tiles"){
      if($path_components[2]=="ID"){

      }
      else{

      }
    }
    else if($path_components[1]=="Colleges"){
      if($path_components[2]=="CollegeID"){

      }
      else{

      }
    }
  }

// Delete previous table values
$conn->query("DELETE FROM Cards");

// Test data
$card1 = Card::create("PlayerID", "Ram", "Ramen", "Brick", "Basketball", "Book",
"Knight", "OldWell", "ThePit", "DavisLibrary", "Sitterson", "BellTower", "Roads",
"Volunteer", "Monopoly");

echo "<br /> " . $card1->getPlayerID();
echo "<br />" . $card1->getRam();
echo "<br /> " . $card1->getRamen();
echo "<br /> " . $card1->getBrick();
echo "<br /> " . $card1->getBasketball();
echo "<br /> " . $card1->getBook();
echo "<br /> " . $card1->getKnight();
echo "<br /> " . $card1->getOldWell();
echo "<br /> " . $card1->getThePit();
echo "<br /> " . $card1->getDavisLibrary();
echo "<br /> " . $card1->getSitterson();
echo "<br /> " . $card1->getBellTower();
echo "<br /> " . $card1->getRoads();
echo "<br /> " . $card1->getVolunteer();
echo "<br /> " . $card1->getMonopoly();

 ?>

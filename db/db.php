<?php
include 'config.php';
// init session
session_start();

function getItems() {
  $conn = connectDB();
  $sql = "SELECT * FROM games";
  $result = mysqli_query($conn, $sql);
  return $result;
}

function getFirstItem() {
  $conn = connectDB();
  $sql = "SELECT * FROM games LIMIT 1";
  $result = mysqli_query($conn, $sql);
  return mysqli_fetch_assoc($result);
}

function total() {
  $conn = connectDB();
  $sql = "SELECT COUNT(*) as count FROM games";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['count'];
}

// FAVOURITES
function totalFavourites() {
  if(isset($_SESSION['favourites'])) {
    return count($_SESSION['favourites']);
  } else {
    return 0;
  }
}
function getFavourites() {
  $conn = connectDB();
  $ids = implode(",", $_SESSION['bookmarks']); // 2,3,4
  $sql = "SELECT * FROM articles WHERE id IN ($ids)";
  $result = mysqli_query($conn, $sql);
  return $result;
}
function addFavourite($id) {
  if(!isset($_SESSION['favourites'])) {
    $_SESSION['favourites'] = [];
  }
  if(!in_array($id, $_SESSION['favourites'])) {
    $_SESSION['favourites'][] = $id;
  }
}
function removeFavourite($id) {
  if(isset($_SESSION['favourites'])) {
    $index = array_search($id, $_SESSION['favourites']);
    if($index !== false) {
      unset($_SESSION['favourites'][$index]);
    }
  }
}
function isFavourite($id) {
  if(isset($_SESSION['favourites'])) {
    return in_array($id, $_SESSION['favourites']);
  } else {
    return false;
  }
}




<?php
  include 'db.php';

  $id = 0;

  if (isset($_POST['save'])) {

    $name       = $_POST['name'];
    $location   = $_POST['location'];

    $sql = "INSERT INTO people (user_name, user_location) VALUES('$name', '$location')";

    $query = new Database;
    $query->connect()->query($sql) or die($mysqli->error);

    header('Location: index.php?create=success');

  }

  if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $sql = "DELETE FROM people WHERE user_id=$id";

    $query = new Database;
    $query->connect()->query($sql) or die($mysqli->error);

    header('Location: index.php?delete=success');

  }

  if (isset($_GET['edit'])) {

    $id = $_GET['edit'];

    $sql = "SELECT * FROM people WHERE user_id='$id'";

    $query = new Database;
    $result = $query->connect()->query($sql) or die($mysqli->error);

    $row = $result->fetch_assoc();

    $name       = $row['user_name'];
    $location   = $row['user_location'];
    $id         = $row['user_id'];

   header('Location: index.php?name=' . $name . '&location=' . $location. '&edit=1' . '&id=' . $id);

  }

  if (isset($_POST['update'])) {
    $name       = $_POST['name'];
    $location   = $_POST['location'];
    $id         = $_POST['hidden-id'];

    $sql = "UPDATE people SET user_name='$name', user_location='$location' WHERE user_id='$id'";

    $query = new Database;
    $query->connect()->query($sql);

    header('Location: index.php?update=success');
  }

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="bg-dark">

    <?php
      require 'db.php';

      $sql = 'SELECT * FROM people';

      $query = new Database;
      $result = $query->connect()->query($sql) or die($mysqli->error);
    ?>

    <div class="container mt-5 px-5 py-5 bg-white">
      <?php
        if (isset($_GET['create'])) {
          if ($_GET['create'] == 'success') {
      ?>
      <div class="alert alert-success">
        Person has been successfully added!
      </div>
      <?php
          }
        }
      ?>
      <?php
        if (isset($_GET['delete'])) {
          if ($_GET['delete'] == 'success') {
      ?>
      <div class="alert alert-danger">
        Person has been successfully removed!
      </div>
      <?php
          }
        }
      ?>
      <?php
        if (isset($_GET['update'])) {
          if ($_GET['update'] == 'success') {
      ?>
      <div class="alert alert-warning">
        Person has been successfully updated!
      </div>
      <?php
          }
        }
      ?>
      <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Location</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <?php
            while ($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $row['user_name']?></td>
              <td><?php echo $row['user_location']?></td>
              <td>
                <a href="process.php?edit=<?php echo $row['user_id'];?>" class="btn btn-primary">Edit</a>
                <a href="process.php?delete=<?php echo $row['user_id'];?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php
            }
          ?>
        </table>
      </div>
      <hr class="my-5">
      <?php
        if (isset($_GET['name']) && isset($_GET['location']) && isset($_GET['id'])) {
          $name       = $_GET['name'];
          $location   = $_GET['location'];
          $id         = $_GET['id'];
        }

        else {
          $name       = '';
          $location   = '';
          $id   = '';
        }
      ?>
      <form class="form-grorp" action="process.php" method="POST">
        <input style="display: none;" type="text" name="hidden-id" value="<?php echo $id ?>">
        <label>Enter Name:</label>
        <input class="form-control" type="text" name="name" value="<?php echo $name ?>" placeholder="Enter Name">
        <label class="mt-3">Enter Location:</label>
        <input class="form-control" type="text" name="location" value="<?php echo $location ?>" placeholder="Enter your location">
        <div class="text-center">
          <?php
            if(isset($_GET['edit'])) {
              if ($_GET['edit'] == 1) {
          ?>
          <button class="mt-3 btn btn-dark btn-block" type="submit" name="update">Edit</button>
          <?php
              }
            }

            else {
          ?>
          <button class="mt-3 btn btn-dark btn-block" type="submit" name="save">Submit</button>
          <?php
            }
          ?>
        </div>
      </form>
    </div>
  </body>
</html>

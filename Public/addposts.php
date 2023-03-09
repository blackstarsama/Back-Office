<?php
require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <title>Post Add</title>
</head>

<body>
  <div class="container my-5">
    <h2>New Post</h2>
    <br>
    <br>

    <?php
    if (!empty($errorMessage)) {
      echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>$errorMessage</strong>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
        </div>
        ";
    }
    ?>

    <form action="post">
      <div class="mb-3">
        <label class="col sm-3 col-form-label">Title</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="title" value="<?php echo $title ?>">
        </div>
      </div>
      <div class="mb-3">
        <label class="col sm-3 col-form-label">Content</label>
        <div class="col-sm-6">
          <textarea class="form-control" name="content" value="<?php echo $content ?>"></textarea>
        </div>
      </div>
      <div class="mb-3">
        <label class="col sm-3 col-form-label">Author</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="author" value="<?php echo $author ?>">
        </div>
      </div>

      <?php
      if (!empty($successMessage)) {
        echo "
      <div class='row mb-3'>
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>$successMessage</strong>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
        </div>
      </div>
        ";
      }
      ?>

      <div class="row mb-3">
        <div class=" col-sm-3 d-grid">
          <button type="submit" class="btn btn-primary">Add Post</button>
        </div>
        <div class=" col-sm-3 d-grid">
          <a class="btn btn-outline-primary" href="./index.php" role="button">Cancel</a>
        </div>
      </div>
    </form>
  </div>
  <?php

  $title = "";
  $content = "";
  $author = "";

  $successMessage = "";
  $errorMessage = "";


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $date = date('y-m-d');

    do {
      # code...
      if (empty($title) || empty($content) || empty($author)) {
        # code...
        $errorMessage = "All the fields are required";
        break;
      }

      $req = "INSERT INTO `liste` (title, content, author, dateadd) VALUES ('$title', '$content', '$author', '$dateadd')";
      $sql = $bdd->prepare($req);
      $sql->execute();

      if (!($sql->execute())) {
        $errorMessage = "Invalid query";
        break;
      }

      $title = "";
      $content = "";
      $author = "";



      $successMessage = "Post added correctly";

      header("location: ./index.php");
      exit;
    } while (false);
  }

  require_once('close.php');
  ?>

</body>

</html>
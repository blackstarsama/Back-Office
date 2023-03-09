<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>All posts</title>
</head>
<body>
  <?php
  $req="SELECT * FROM posts";
  $sql=$bdd->prepare($req);
  $sql->execute();
  $dnn = $sql->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <div class="container my-5">
    <h2>List of Posts</h2>
    <br>
    <br>
    <a class="btn btn-primary" href="./addposts.php" role="button">New Post</a>
    <br>
    <br>
    <div class="table-responsive">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Author</th>
            <th>Create Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
      
          <?php
                  foreach($dnn as $post){
                      ?>
            <tr>
              <td><?= $post['id'] ?></td>
              <td><?= $post['title'] ?></td>
              <td ><?php echo $post['content']; ?></td>
              <td>Post&eacute; par : <?php echo "<b>".$post['author']."</b>"; ?></td>
              <td>Date : <?php echo $post['dateadd']; ?></td>
              <td>
                <a href="./deletepost.php?id=$post[id]" class="btn btn-danger btn-sm">Delete</a>
                <br>
                <a href="./editpost.php?id=$post[id]" class="btn btn-primary btn-sm">Edit</a>
              </td>
          </td>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
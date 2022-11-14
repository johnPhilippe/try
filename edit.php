<?php


session_start();


require 'config.php';


if (isset($_GET['id'])) {
   $book = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}


if(isset($_POST['submit'])){


   $collection->updateOne(
       ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
       ['$set' => ['name' => $_POST['name'], 'cuisine' => $_POST['cuisine'], 'town' => $_POST['town'], 'rating' => $_POST['rating'],]]
   );


   $_SESSION['success'] = "Book updated successfully";
   header("Location: index.php");
}


?>


<!DOCTYPE html>
<html>
<head>
   <title>PHP & MongoDB - CRUD Operation Tutorials - ItSolutionStuff.com</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>


<div class="container">
   <h1>Edit Book</h1>
   <a href="index.php" class="btn btn-primary">Back</a>


   <form method="POST">
      <div class="form-group">
         <strong>Name:</strong>
         <input type="text" name="name" value="<?php echo $book->name; ?>" required="" class="form-control" placeholder="Name">
      </div>
      <div class="form-group">
         <strong>Cuisine:</strong>
         <textarea class="form-control" name="cuisine" placeholder="cuisine" placeholder="cuisine"><?php echo $book->cuisine; ?></textarea>
      </div>
      <div class="form-group">
         <strong>Town:</strong>
         <textarea class="form-control" name="town" placeholder="town" placeholder="town"><?php echo $book->town; ?></textarea>
      </div>
      <div class="form-group">
         <strong>Rating:</strong>
         <textarea class="form-control" name="rating" placeholder="rating" placeholder="rating"><?php echo $book->rating; ?></textarea>
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
   </form>
</div>


</body>
</html>
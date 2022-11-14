<?php


session_start();


if(isset($_POST['submit'])){


   require 'config.php';


   $insertOneResult = $collection->insertOne([
       'name' => $_POST['name'],
       'cuisine' => $_POST['cuisine'],
       'town' => $_POST['town'],
       'rating' => $_POST['rating'],
   ]);


   $_SESSION['success'] = "Book created successfully";
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
   <h1>Add Restaurant</h1>
   <a href="index.php" class="btn btn-primary">Back</a>


   <form method="POST">
      <div class="form-group">
         <strong>Name:</strong>
         <input type="text" name="name" required="" class="form-control" placeholder="Name">
      </div>
      <div class="form-group">
         <strong>Cuisine:</strong>
         <textarea class="form-control" name="cuisine" placeholder="cuisine" placeholder="cuisine"></textarea>
      </div>
      <div class="form-group">
         <strong>Town:</strong>
         <textarea class="form-control" name="town" placeholder="town" placeholder="town"></textarea>
      </div>
      <div class="form-group">
         <strong>Rating:</strong>
         <textarea class="form-control" name="rating" placeholder="rating" placeholder="rating"></textarea>
      </div>
      
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
   </form>
</div>


</body>
</html>
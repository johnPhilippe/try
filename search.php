<?php
   
      session_start();

      if(isset($_POST['search'])) {
      $searchq = $_POST['search'];
    
      }
   
   
?>
<!DOCTYPE html>
<html>
<head>
   <title>PHP & MongoDB - CRUD Operation Tutorials - ItSolutionStuff.com</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
   <style>
      <?php include "style.css" 
      
      ?>
   </style>
</head>
<body>



<header class="header">
    <a href="#home" class="logo">
        <img src="logo.png" alt="">
    </a>

    <nav class="nav">
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#product">Products</a></li>
        <li><a href="#review">Reviews</a></li>
      </ul>
    </nav>


    <div class="menu">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
    
</header>

<section class="home" id="home">

   <div class="container">

   
   <a href="create.php" class="btn btn-success">Add Restaurant</a><br><br>
   <form action="search.php" method="post">
      <input type="text" name="search" placeholder="Search Keyword">
      <input type="submit" name="Search" value="Search" id=""><br><br>
   </form>

   <?php


      if(isset($_SESSION['success'])){
         echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
      }


   ?>


      <table class="table table-borderd">
         <tr>
            <th>Name</th>
            <th>Cuisine</th>
            <th>Town</th>
            <th>Rating</th>
         </tr>
         <?php


            require 'config.php';

            $books = $collection->aggregate([['$match' => ['name' => ['$regex' => "$searchq"]]]]);
            

            foreach($books as $book) { 
               echo "<tr>";
               echo "<td>".$book->name."</td>";
               echo "<td>".$book->cuisine."</td>";
               echo "<td>".$book->town."</td>";
               echo "<td>".$book->rating."</td>";
               echo "<td>";
               echo "<a href='edit.php?id=".$book->_id."' class='btn btn-primary'>Edit</a>";
               echo "<a href='delete.php?id=".$book->_id."' class='btn btn-danger'>Delete</a>";
               echo "</td>";
               echo "</tr>";
            };


         ?>
      </table>
   </div>

</section>




</body>
</html>
<?php
require 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<body>
  
<section class="main">
    <br>
    <img class="logo" src="logo.png">
    <h1>
        <?php 
            echo "UBC Design League Database";
        ?>
    </h1> 
    <form action="query.php" method="POST">
        <input type="text" name="search"><button type="submit"><img src="search.png"></button></input>
    </form>
    <section class = "list">
        <h3>Links</h3>
        

    <?php
        $q = $_GET['q']; # query
        $sql = "SELECT * FROM ".$datatable." WHERE `Primary Category`=\"".$q ."\" OR `Secondary Category`= \"".$q ."\" ORDER BY `Title` ASC";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<ul>";
            while($r = mysqli_fetch_assoc($result)) {
                echo "<li><a href=".$r["Link"].">".$r["Title"]."</a></li>";
            }
            echo "</ul>";
        }
        else{
            echo "Sorry query is empty.";
        }
    ?> 
    <br>
    <hr>
    <br>
    <a class="wtlink" href="index.php?">Back</a>
</section>

</body>
</html>
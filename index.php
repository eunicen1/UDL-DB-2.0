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
        <h3>Categories</h3>
        
    <?php 
    $sql = "SELECT * FROM ".$datatable;
    $result = $conn->query($sql);
    echo '<ul>';
    $unique_cat = array();
    if (mysqli_num_rows($result) > 0) {
        while($q = mysqli_fetch_assoc($result)) {
          array_push($unique_cat, $q['Primary Category']);
          array_push($unique_cat, $q['Secondary Category']);
        }
        $unique_cat = array_unique($unique_cat);
        sort($unique_cat);
        echo "<ul>";
        foreach ($unique_cat as $q) {
            echo "<li><a href=\"catlist.php?q=".$q."\">".$q."</a></li>";
        }
        echo "</ul>";
    } else {
        echo "Sorry DB is empty.";
    }
    echo '</ul>';
    mysqli_close($conn);
    ?>
    </section>

</body>
</html>



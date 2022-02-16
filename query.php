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
        $s = $_POST['search'];
        $sql = "SELECT * FROM " . $datatable;
        $result = $conn->query($sql);
        $similarities = []; 
        $links = [];

        if (mysqli_num_rows($result) > 0) {
            while($q = mysqli_fetch_assoc($result)) {
              $primcat = $q['Primary Category'];
              $seccat = $q['Secondary Category'];
              $title = $q['Title'];
              $link = $q['Link'];
              similar_text($s, $primcat, $percat1);
              similar_text($s, $seccat, $percat2);
              similar_text($s, $title, $pertitle);
              $score = round($percat1*$percat2*$pertitle, 4);
              $similarities[$title] = $score;
              $links[$title] = $link;
            }
            // print_r($similarities);
            reset($similarities);
            # sort key value pairings according to order
            arsort($similarities);
            $similarities=array_slice($similarities, 0, 10); # only comparing for letter similarity rather than actual meaning i.e.: ship vs. boat!!
            echo "<ul class=\"noflex\">"; 
            foreach ($similarities as $key => $value) {
                echo "<li><a href=\"".$links[$key]."\">". $key ."</a></li>";
            }
            echo "</ul>";
            
        } else {
            echo "Sorry DB is empty.";
        }
    
    ?> 
    <br>
    <hr>
    <br>
    <a class="wtlink" href="index.php?">Back</a>
</section>

</body>
</html>
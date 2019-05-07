<?php
if (isset($_POST['name'])) { 
  $name = $_POST['name'];
  $email = $_POST['email'];
  $major = $_POST['major'];
  $continents = $_POST['continents'];
  $comments = $_POST['comments'];
}

?>

<div id="container">
  <p>Your name is <?php echo $name ?></p>
  <p>Your email is <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
  <p>Your major is <?php echo $major ?></p>
  <p>You have been to the following continents:</p>
  <?php
    $continentDict = array('na' => 'North America', 'sa' => 'South America', 'eur' => 'Europe', 'as' => 'Asia', 'aus' => 'Australia', 'afr' => 'Africa', 'ant' => 'Antartica');
    foreach ($continents as $abbreviation) {
      echo "<p>Key: $abbreviation, value: $continentDict[$abbreviation]</p>";
    }
  ?><br>
  <p>Your comments are <?php echo $comments ?></p>
</div>
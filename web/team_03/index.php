<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Team 03</title>
</head>

<body>
  <form action="action.php" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required><br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required><br><br>
    <label for="major">Major</label><br>
    <?php
      $majors = array("Computer Science", "Web Design and Development", "Computer Information Technology", "Computer Engineering", "English", "Art", "Music");
      foreach ($majors as $k => $item) {
        echo "<input type=\"radio\" name=\"major\" id=\"major$k\" value=\"$item\"> $item<br>";
      }
      echo '<br>';
    ?>
    <!-- <input type="radio" name="major" id="computer-science" value="Computer Science"> Computer Science <br>
    <input type="radio" name="major" id="web-design-development" value="Web Design and Development"> Web Design and Development <br>
    <input type="radio" name="major" id="computer-information-technology" value="Computer Information Technology"> Computer Information Technology <br>
    <input type="radio" name="major" id="computer-engineering" value="Computer Engineering">Computer Engineering <br><br> -->
    <input type="checkbox" name="continents[]" id="north-america" value="na"> North America <br>
    <input type="checkbox" name="continents[]" id="south-america" value="sa"> South America <br>
    <input type="checkbox" name="continents[]" id="europe" value="eur"> Europe <br>
    <input type="checkbox" name="continents[]" id="asia" value="as"> Asia <br>
    <input type="checkbox" name="continents[]" id="australia" value="aus"> Australia <br>
    <input type="checkbox" name="continents[]" id="africa" value="afr"> Africa <br>
    <input type="checkbox" name="continents[]" id="antartica" value="ant"> Antartica <br><br>
    <label for="comments">Comments</label><br>
    <textarea name="comments" id="comments" cols="60" rows="10" required></textarea><br>
    <button type="submit">Submit</button>
  </form>
</body>

</html>
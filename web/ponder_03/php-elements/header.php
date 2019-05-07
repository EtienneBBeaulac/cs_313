<?php
function getCartCount() {
  if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    return count($cart);
  }
}
?>

<link rel="stylesheet" href="style.css">
<?php date_default_timezone_set("America/Boise"); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="browse.php">Electronics Co.</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link <?php echo ($page == "browse" ? "active" : "") ?>" href="./browse.php">Browse <span class="sr-only">Browse</span></a>
      <a class="nav-item nav-link <?php echo ($page == "cart" ? "active" : "") ?>" href="./cart.php">Cart <span class="badge badge-light"><?php echo getCartCount() ?></span></a>
    </div>
  </div>
  <a class="navbar-text" href="php-scripts/end-session.php"><?php echo date("D, M d Y"); ?></a>
</nav>
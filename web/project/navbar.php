<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
$isLoggedIn = true;
if (!isset($_SESSION['login'])) {
  $isLoggedIn = false;
}
?>
<nav class="navbar navbar-expand-sm bg-new navbar-dark sticky-top">
  <a class="navbar-brand" href="login.php">Bookmarkz</a>
  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button> -->
  <ul class="navbar-nav collapse navbar-collapse" id="collapsibleNavbar">
    <!-- <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li> -->
  </ul>
  <form class="form-inline my-2 my-lg-0 <?php echo $isLoggedIn ? '' : 'd-none' ?>" action="logout.php">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
  </form>
</nav>
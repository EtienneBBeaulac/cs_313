<form action="php-scripts/put-in-cart.php" method="post" class="card">
  <img src="<?php echo $imgSrc ?>" alt="<?php echo $imgAlt ?>" class="card-img-top">
  <input type="hidden" name="form[imgSrc]" id="img" value="<?php echo $imgSrc ?>">
  <div class="card-body">
    <p><?php echo $itemDesc ?></p>
    <p class="text-center">$500.00</p>
    <input type="hidden" name="form[itemDesc]" id="itemDesc" value="<?php echo $itemDesc ?>">
    <?php include "add-to-cart.php" ?>
  </div>
</form>
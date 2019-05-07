<form class="list-group-item" action="php-scripts/remove-from-cart.php" method="post">
  <div class="row">
    <input type="hidden" name="index" value="<?php echo $itemId ?>">
    <div class="col-sm-9 row">
      <div class="col-sm-2"><img src="<?php echo $imgSrc ?>" alt="cartItem" class="cart-img"></div>
      <div class="col-sm-10 align-self-center"><?php echo $itemDesc ?></div>
    </div>
    <button type="submit" class="col-sm-1 align-self-center btn btn-danger"><i class="fas fa-trash"></i></button>
    <div class="col-sm-1 align-self-center text-center"> 
      <input type="number" class="cart-item-count form-control" value="<?php echo $itemCount ?>">
    </div>
    <div class="col-sm-1 align-self-center text-center">$<?php echo number_format((float)$itemCount * 500, 2, '.', ''); ?></div>
  </div>
</form>
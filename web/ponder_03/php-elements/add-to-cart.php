<div class="row">
  <button type="submit" class="btn btn-success col">Add to cart</button>
  <div class="input-group col">
    <div class="input-group-prepend">
      <button class="btn btn-outline-secondary" type="button" onclick="changeCount(1, '<?php echo 'number-items-' . $itemId ?>')">+</button>
      <button class="btn btn-outline-secondary" type="button" onclick="changeCount(-1, '<?php echo 'number-items-' . $itemId ?>')">-</button>
    </div>
    <input type="number" name="form[itemCount]" class="form-control" placeholder="" value="1" id="number-items-<?php echo $itemId ?>">
  </div>
</div>
<div class="list-group-item add-bookmark" onclick="showAddBookmarkForm()">
  <div class="row justify-content-center">
    <div class="font-weight-bold"><i class="fas fa-plus"></i></div>
  </div>
</div>
<form class="list-group-item d-none" id="add-bookmark-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <input class="input-group" name="insert[bm_name]" type="text" class="my-0" value="" required>
    </div>
    <div class="col-md-8">
      <input type="text" name="insert[bm_url]" value="" required>
    </div>
    <button type="submit">Add</button>
  </div>
</form>
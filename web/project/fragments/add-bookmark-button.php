<div class="list-group-item add-bookmark-green" id="add-bookmark" onclick="showAddBookmarkForm()">
  <div class="row justify-content-center">
    <div class="font-weight-bold" id="add-button-div"><i class="fas fa-plus"></i></div>
  </div>
</div>
<div class="list-group-item d-none" id="add-bookmark-form">
  <form class="row" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="col-md-11 my-auto">
      <div class="row">
        <div class="col-md-4">
          <input class="my-0 form-control" name="insert[bm_name]" type="text" class="my-0" value="" placeholder="Bookmark name"required>
        </div>
        <div class="col-md-8">
          <input class="form-control" type="text" name="insert[bm_url]" value="" placeholder="Bookmark URL" required>
        </div>
      </div>
    </div>
    <button class="btn btn-success" type="submit">Add</button>
  </form>
</div>
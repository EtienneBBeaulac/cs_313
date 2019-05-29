<div class="row pr-3 pl-3 justify-content-between">
    <div class="col-auto mr-auto">
        <form class="input-group mb-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
          <input type="text" name="search" class="form-control" placeholder="Search...">
          <div class="input-group-append">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </div>
        </form>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-light"><i class="fas fa-edit"></i> Edit</button>
    </div>
</div>
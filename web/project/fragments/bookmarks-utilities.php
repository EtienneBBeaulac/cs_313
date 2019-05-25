<div class="row pr-3 pl-3">
    <div class="col-md-4">
        <form class="input-group mb-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
          <input type="text" name="search" class="form-control" placeholder="Search...">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
          </div>
        </form>
    </div>
    <div class="col-md-2">
        <button class="btn btn-outline-success"><i class="fas fa-plus"></i> Add</button>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <form class="input-group mb-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
          <input type="text" name="search" class="form-control" placeholder="Search...">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
          </div>
        </form>
    </div>
</div>
<div class="list-group-item" id="no_edit_<?php echo $bm['id']; ?>">
  <div class="row">
    <div class="col-md-11 my-auto">
      <a id="no_edit_bm_link_<?php echo $bm['id'] ?>" href="<?php echo $bm['bookmark_url']; ?>" target="_blank">
        <div class="row">
          <div class="col-md-4">
            <h6 class="my-0" id="no_edit_bm_name_<?php echo $bm['id'] ?>"><?php echo $bm['bookmark_name']; ?></h6>
          </div>
          <div class="col-md-8">
            <span id="no_edit_bm_url_<?php echo $bm['id'] ?>"><?php echo $bm['bookmark_url']; ?></span>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-1 btn btn-light" onclick="startEdit('<?php echo $bm['id']; ?>')"><i class="fas fa-edit"></i> Edit</div>
  </div>
</div>
<div class="list-group-item d-none" id="yes_edit_<?php echo $bm['id']; ?>">
  <form class="row" id="bm_form_<?php echo $bm['id']; ?>" onsubmit="return false;">
    <div class="col-md-10 my-auto">
      <div class="row">
        <div class="col-md-4">
          <input class="my-0 form-control" id="yes_edit_bm_name_<?php echo $bm['id'] ?>" name="bm_name" value="<?php echo $bm['bookmark_name']; ?>" type="text" required>
        </div>
        <div class="col-md-8">
          <input class="form-control" id="yes_edit_bm_url_<?php echo $bm['id'] ?>" name="bm_url" value="<?php echo $bm['bookmark_url']; ?>" type="text" required>
        </div>
      </div>
    </div>
    <input type="hidden" name="bm_id" value="<?php echo $bm['id'] ?>">
    <div class="btn-group col-md-2" role="group">
      <button class="btn btn-success" onclick="finishEdit('<?php echo $bm['id']; ?>')">Save</button>
      <div class="btn btn-danger" onclick="deleteBm('<?php echo $bm['id']; ?>')"><i class="fas fa-trash"></i></div>
    </div>
  </form>
</div>
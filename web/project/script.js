function showAddBookmarkForm() {
  $("#add-bookmark-form").toggleClass("d-none");
  console.log('in function');
  if (!$("#add-bookmark-form").hasClass("d-none")) {
    $("#add-button-div").html("<i class='fas fa-minus'></i>");
    console.log('has d-none');
  } else {
    $("#add-button-div").html("<i class='fas fa-plus'></i>");
    console.log('not has d-none');
  }
  $("#add-bookmark").toggleClass("add-bookmark-green");
  $("#add-bookmark").toggleClass("add-bookmark-red");
}

function startEdit(id) {
  $("#no_edit_" + id).toggleClass("d-none");
  $("#yes_edit_" + id).toggleClass("d-none");
}

function finishEdit(id) {
  $.post(
    "ajax-scripts/update-bookmark.php",
    $("#bm_form_" + id).serialize(),
    function(response) {
      let parsed = jQuery.parseJSON(response);
      if (parsed["status"] == "success") {
        let data = parsed["data"];
        $("#no_edit_bm_link_" + id).attr("href", data["bookmark_url"]);
        $("#no_edit_bm_name_" + id).html(data["bookmark_name"]);
        $("#no_edit_bm_url_" + id).html(data["bookmark_url"]);
        $("#yes_edit_bm_name_" + id).val(data["bookmark_name"]);
        $("#yes_edit_bm_url_" + id).val(data["bookmark_url"]);
        $("#no_edit_" + id).toggleClass("d-none");
        $("#yes_edit_" + id).toggleClass("d-none");
      } else {
        console.log("failed");
      }
    }
  );
}

function deleteBm(id) {
  $.post(
    "ajax-scripts/delete-bookmark.php",
    $("#bm_form_" + id).serialize(),
    function(response) {
      let parsed = jQuery.parseJSON(response);
      if (parsed["status"] == "success") {
        $('#no_edit_' + id).remove();
        $('#yes_edit_' + id).remove();
      } else {
        console.log("failed");
      }
    }
  );
}

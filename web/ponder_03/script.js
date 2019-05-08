function changeCount(increase, elemId) {
  var itemCountInput = document.getElementById(elemId);
  if (increase == -1 && itemCountInput.value == 1) {
    return;
  }
  itemCountInput.value = parseInt(itemCountInput.value) + increase;
}

$('.itemCount').bind('input', function () {
  if (this.value < 0) {
    this.value = 0;
  }
  let button = $('#button' + this.id);
  let itemState = $('#cartItemState' + this.id)[0];
  let originalCount = $('#cartItemOgCount' + this.id)[0];

  if (this.value != originalCount.value && this.value != 0) {
    itemState.value = 'save';
    button.removeClass('btn-danger');
    button.addClass('btn-success');
    button.html('<i class="fas fa-save"></i>');
  } else {
    itemState.value = 'delete';
    button.removeClass('btn-success');
    button.addClass('btn-danger');
    button.html('<i class="fas fa-trash"></i>');
  }
})


$("#sameBilling").change(function () {
  if (this.checked) {
    $("#shippingContainer").addClass("d-none");
    $("#shipping-firstName").prop('required', false);
    $("#shipping-lastName").prop('required', false);
    $("#shipping-email").prop('required', false);
    $("#shipping-address1").prop('required', false);
    $("#shipping-address2").prop('required', false);
    $("#shipping-city").prop('required', false);
    $("#shipping-state").prop('required', false);
    $("#shipping-zip").prop('required', false);
    $("#shipping-country").prop('required', false);
  } else {
    $("#shippingContainer").removeClass("d-none");
    $("#shipping-firstName").prop('required', true);
    $("#shipping-lastName").prop('required', true);
    $("#shipping-email").prop('required', true);
    $("#shipping-address1").prop('required', true);
    $("#shipping-address2").prop('required', true);
    $("#shipping-city").prop('required', true);
    $("#shipping-state").prop('required', true);
    $("#shipping-zip").prop('required', true);
    $("#shipping-country").prop('required', true);
  }
});
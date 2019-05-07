function changeCount(increase, elemId) {
  var itemCountInput = document.getElementById(elemId);
  if (increase == -1 && itemCountInput.value == 1) {
    return;
  }
  itemCountInput.value = parseInt(itemCountInput.value) + increase;
}


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
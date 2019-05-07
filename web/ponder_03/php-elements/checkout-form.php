<div class="row">
  <div class="col-md-6 mb-3">
    <label for="firstName">First name</label>
    <input class="form-control" type="text" name="<?php echo $addressType; ?>[firstName]" id="<?php echo $addressType; ?>-firstName" placeholder value required>
    <div class="invalid-feedback">Valid first name is required</div>
  </div>
  <div class="col-md-6 mb-3">
    <label for="lastName">Last name</label>
    <input class="form-control" type="text" name="<?php echo $addressType; ?>[lastName]" id="<?php echo $addressType; ?>-lastName" placeholder value required>
    <div class="invalid-feedback">Valid last name is required</div>
  </div>
</div>
<div class="mb-3">
  <label for="email">Email</label>
  <input class="form-control" type="email" name="<?php echo $addressType; ?>[email]" id="<?php echo $addressType; ?>-email" placeholder value required>
  <div class="invalid-feedback">Valid email is required</div>
</div>
<div class="mb-3">
  <label for="address1">Address</label>
  <input class="form-control" type="text" name="<?php echo $addressType; ?>[address1]" id="<?php echo $addressType; ?>-address1" placeholder value required>
  <div class="invalid-feedback">Valid address is required</div>
</div>
<div class="row">
  <div class="col-md-8 mb-3">
    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
    <input class="form-control" type="text" name="<?php echo $addressType; ?>[address2]" id="<?php echo $addressType; ?>-address2" placeholder value>
  </div>
  <div class="col-md-4 mb-3">
    <label for="city">City</label>
    <input class="form-control" type="text" name="<?php echo $addressType; ?>[city]" id="<?php echo $addressType; ?>-city" placeholder value required>
    <div class="invalid-feedback">Valid city is required</div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 mb-3">
    <label for="state">State</label>
    <input class="form-control" type="text" name="<?php echo $addressType; ?>[state]" id="<?php echo $addressType; ?>-state" placeholder value required>
    <div class="invalid-feedback">Valid state is required</div>
  </div>
  <div class="col-md-4 mb-3">
    <label for="zip">Zip</label>
    <input class="form-control" type="text" name="<?php echo $addressType; ?>[zip]" id="<?php echo $addressType; ?>-zip" placeholder value required>
    <div class="invalid-feedback">Valid zip code is required</div>
  </div>
  <div class="col-md-4 mb-3">
    <label for="country">Country</label>
    <input class="form-control" type="text" name="<?php echo $addressType; ?>[country]" id="<?php echo $addressType; ?>-country" placeholder value required>
    <div class="invalid-feedback">Valid country is required</div>
  </div>
</div>
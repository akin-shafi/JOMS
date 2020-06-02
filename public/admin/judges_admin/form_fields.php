<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if (!isset($judges)) {
  redirect_to(url_for('admin/judges_admin/index.php'));
}
?>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="control-label" for="first_name">First Name</label>
      <input class="form-control" value="<?php echo $judges->first_name; ?>" type="text" name="judges[first_name]" id="first_name">
    </div>
    <div class="form-group">
      <label class="control-label" for="last_name">Last Name</label>
      <input class="form-control" value="<?php echo $judges->last_name; ?>" type="text" name="judges[last_name]" id="last_name">
    </div>
    <div class="form-group">
      <label class="control-label" for="phone">Phone Number</label>
      <input class="form-control" value="<?php echo $judges->phone; ?>" type="number" name="judges[phone]" id="phone">
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="control-label" for="email">Email</label>
      <input class="form-control" value="<?php echo $judges->email; ?>" type="email" name="judges[email]" id="email">
    </div>
    <div class="form-group">
      <label class="control-label" for="court_division">Court Division</label>
      <select class="form-control" name="judges[court_division]" id="court_division" onclick="findCourtByDivision()">
        <option value="">choose</option>
        <?php foreach (CourtCase::COURT_DIVISION as $key => $value) { ?>
          <option value="<?php echo $key ?>" <?php echo $key == $judges->court_division ? 'selected' : ''; ?>><?php echo $value ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group fil">
      <label class="control-label" for="court_type">Court Type</label>
      <select class="form-control" name="judges[court_type]">
        <option value="">choose</option>
      </select>
    </div>
  </div>


  <?php if ($edit == false) { ?>
    <div class="form-group">
      <label class="control-label" for="password">Password</label>
      <input class="form-control" value="<?php echo $judges->password; ?>" type="password" name="judges[password]" id="password">
    </div>

    <div class="form-group">
      <label class="control-label" for="confirm_password">Confirm Password</label>
      <input class="form-control" value="<?php echo $judges->confirm_password; ?>" type="password" name="judges[confirm_password]" id="confirm_password">
    </div>
  <?php } ?>

</div>
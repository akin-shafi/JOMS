<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if (!isset($managements)) {
  redirect_to(url_for('/high-court/mgt/index.php'));
}
?>
<div class="row">
  


    <input type="hidden" name="mgt[created_by]" value="<?php echo $loggedInAdmin->id; ?>">
    <div class="form-group col-md-6">
      <label class="control-label" for="first_name">First Name</label>
      <input class="form-control" value="<?php echo $managements->first_name; ?>" type="text" name="mgt[first_name]" id="first_name">
    </div>
    <div class="form-group col-md-6">
      <label class="control-label" for="last_name">Last Name</label>
      <input class="form-control" value="<?php echo $managements->last_name; ?>" type="text" name="mgt[last_name]" id="last_name">
    </div>

    <div class="form-group col-md-6">
      <label class="control-label" for="email">Email</label>
      <input class="form-control" value="<?php echo $managements->email; ?>" type="text" name="mgt[email]" id="email">
    </div>
    <div class="form-group col-md-6">
      <label class="control-label" for="phone">Phone Number</label>
      <input class="form-control" value="<?php echo $managements->phone; ?>" type="number" name="mgt[phone]" id="phone">
    </div>

    <div class="form-group col-md-6">
      <label class="control-label" for="level">Admin Level</label>
      <select class="form-control" name="mgt[level]" id="level">
        <option value="">choose</option>
        <?php foreach (Admin::ADMIN_LEVEL as $key => $value) { ?>
          <option value="<?php echo $key ?>" <?php echo $key == $managements->level ? 'selected' : ''; ?>><?php echo $value ?></option>
        <?php } ?>
      </select>
    </div>

    
    


    <div class="form-group col-md-6">
      <label class="control-label" for="court_division">Court Division</label>
      <select class="form-control" name="mgt[court_division]" id="court_division" onclick="findCourtByDivision()">
        <option value="">choose</option>
        <?php foreach (CourtCase::COURT_DIVISION as $key => $value) { ?>
          <option value="<?php echo $key ?>" <?php echo $key == $managements->court_division ? 'selected' : ''; ?>><?php echo $value ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label class="control-label" for="court_type">Court Type</label>
      <select class="form-control" name="mgt[court_type]" readonly>
        <option value="1" selected>High Court</option>
      </select>
    </div>


   <div class="form-group col-md-6">
      <label class="control-label" for="password">Password</label>
      <input class="form-control" value="<?php echo $managements->password; ?>" type="password" name="mgt[password]" id="password">
    </div>

    <div class="form-group col-md-6">
      <label class="control-label" for="confirm_password">Confirm Password</label>
      <input class="form-control" value="<?php echo $managements->confirm_password; ?>" type="password" name="mgt[confirm_password]" id="confirm_password">
    </div>
</div>



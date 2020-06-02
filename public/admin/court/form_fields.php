<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($court_type)) {
  redirect_to(url_for('admin/court/index.php'));
}
?>

<fieldset>
  <div class="form-group">
    <label class="control-label" for="court_name">Court Name</label>
    <input class="form-control" value="<?php echo $court_type->court_name; ?>" type="text" name="court_type[court_name]" id="court_name">
  </div>

  <div class="form-group">
    <label class="control-label" for="court_division">Court Division</label>
    <select class="form-control" name="court_type[court_division]" id="court_division" onclick="findJudgeByDivision()">
      <option value="">choose</option>
      <?php foreach (CourtCase::COURT_DIVISION as $key => $value) { ?>
        <option value="<?php echo $key ?>" <?php echo $key == $court_type->court_division ? 'selected' : ''; ?>><?php echo $value ?></option>
      <?php } ?>
    </select>
  </div>

  <!-- <div class="form-group fil">
    <label class="control-label" for="judge_id">Judge In Charge</label>
    <select class="form-control" name="court_type[judge_id]" id="judge_id">
      <option value="">choose</option>
    </select>
  </div> -->

</fieldset>

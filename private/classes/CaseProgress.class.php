<?php
class CaseProgress extends DatabaseObject {
 
  static protected $table_name = "case_progress";
  static protected $db_columns = ['id', 'case_id', 'case_status', 'judge_summary', 'hearing_date','adjourned_date', 'updated_on', 'updated_by', 'deleted'];

  public $id;
  public $case_id;
  public $case_status;
  public $judge_summary;
  public $hearing_date;
  public $adjourned_date;
  public $updated_on;
  public $updated_by;
  
  public $deleted;
  public $counts;

  const ADMIN_LEVEL = [
    1 => 'Head Admin',
    2 => 'Assistant Admin'
  ];

  public function __construct($args=[]) {
    $this->case_id = $args['case_id'] ?? '';
    $this->case_status = $args['case_status'] ?? '';
    $this->judge_summary = $args['judge_summary'] ?? '';
    $this->hearing_date = $args['hearing_date'] ?? '';
    $this->adjourned_date = $args['adjourned_date'] ?? '';
    $this->updated_on = $args['updated_on'] ?? date('Y-m-d H:i:s');
    $this->updated_by = $args['updated_by'] ?? '';
    $this->deleted = $args['deleted'] ?? 0;
    
  }

  protected function validate() {
    $this->errors = [];

    // if(is_blank($this->first_name)) {
    //   $this->errors[] = "First name cannot be blank.";
    // } elseif (!has_length($this->first_name, array('min' => 2, 'max' => 255))) {
    //   $this->errors[] = "First name must be between 2 and 255 characters.";
    // }

    return $this->errors;
  }

  static public function find_by_caseId($case_id)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND case_id='" . self::$database->escape_string($case_id) . "'";

    // echo $sql;
    return static::find_by_sql($sql);
  }

  

  
}

?>

<?php
class StationCase extends DatabaseObject {
 
  static protected $table_name = "station_case";
  static protected $db_columns = ['id','case_id','case_name','case_type','officer_incharge','complainant','accused','statement_of_claim','station_id','status','created_on','updated','deleted'];


  public $id;
  public $case_id;
  public $case_name;
  public $case_type;
  public $officer_incharge;
  public $complainant;
  public $accused;
  public $statement_of_claim;
  public $station_id;
  public $status;
  public $created_on;
  public $updated;
  public $deleted;

  public $counts;




  public function __construct($args=[]) {
    $this->case_id = $args['case_id'] ?? '';
    $this->case_name = $args['case_name'] ?? '';
    $this->case_type = $args['case_type'] ?? '';
    $this->officer_incharge = $args['officer_incharge'] ?? '';

    $this->complainant = $args['complainant'] ?? '';
    $this->accused = $args['accused'] ?? '';
    $this->statement_of_claim = $args['statement_of_claim'] ?? '';
    $this->station_id = $args['station_id'] ?? '';
    $this->status = $args['status'] ?? '';
    $this->created_on = $args['created_on'] ?? date('Y-m-d H:i:s');
    
    $this->updated_on = $args['updated_on'] ?? '';
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

  const POLICE_CASE = [
    1 => 'Arrest',
    2 => 'Written Statement Obtained',
    3 => 'Investigating',
    4 => 'Evidence Gathered',
  ];

  const OFFENCE_TYPE = [
    1 => 'Simple Offence',
    2 => 'Misdemeanor',
    3 => 'Capital Offence',
  ];

  

  static public function find_by_station_id($station_id)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND station_id='" . self::$database->escape_string($station_id) . "'";

    // echo $sql;
    return static::find_by_sql($sql);
    // $obj_array = static::find_by_sql($sql);
    // if (!empty($obj_array)) {
    //   return array_shift($obj_array);
    // } else {
    //   return false;
    // }
  }

  

  
}

?>

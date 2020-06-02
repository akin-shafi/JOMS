<?php
class Case extends DatabaseObject {
 
  static protected $table_name = "cases";
  static protected $db_columns = ['id', 'case_name', 'subnitted_on', 'type_of_matter', 'case_description', 'assigned_by', 'case_number', 'assigned_to', 'date_assigned', 'court_type', 'division', 'court_room', 'uploads', 'assigned', 'created_at', 'deleted'];

  public $id;
  public $case_name;
  public $subnitted_on;
  public $type_of_matter;
  public $case_description;
  public $assigned_by;
  public $case_number;
  public $assigned_to;
  public $date_assigned;
  public $court_type;
  public $division;
  public $court_room;
  public $uploads;
  public $assigned;
  public $created_at;
  public $deleted;
  public $counts;

  const ADMIN_LEVEL = [
    1 => 'Head Admin',
    2 => 'Assistant Admin'
  ];

  public function __construct($args=[]) {
    $this->case_name = $args['case_name'] ?? '';
    $this->subnitted_on = $args['subnitted_on'] ?? date('Y-m-d H:i:s');
    $this->type_of_matter = $args['type_of_matter'] ?? '';
    $this->case_description = $args['case_description'] ?? '';
    $this->assigned_by = $args['assigned_by'] ?? '';
    $this->case_number = $args['case_number'] ?? '';
    $this->assigned_to = $args['assigned_to'] ?? '';
    $this->date_assigned = $args['date_assigned'] ?? date('Y-m-d H:i:s');
    $this->court_type = $args['court_type'] ?? '';
    $this->division = $args['division'] ?? '';
    $this->court_room = $args['court_room'] ?? '';
    $this->uploads = $args['uploads'] ?? '';
    $this->assigned = $args['assigned'] ?? 0;
    $this->created_at = $args['created_at'] ?? date('Y-m-d H:i:s');
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

  static public function find_by_assigned()
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND assigned = 1 ";
    return static::find_by_sql($sql);
  }

  static public function find_by_unassigned()
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND assigned = 0";
    return static::find_by_sql($sql);
  }

  static public function recent_cases()
  {
    $getdate = date('Y-m-d');
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND created_at LIKE '%$getdate%' ";
    return static::find_by_sql($sql);
  }

  
}

?>

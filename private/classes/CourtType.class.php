<?php

class CourtType extends DatabaseObject {

  static protected $table_name = "court_type";
  static protected $db_columns = ['id', 'court_id', 'court_division', 'court_name', 'created_on', 'deleted'];
 
  public $id;
  public $court_id;
  public $court_division;
  public $court_name;
  public $created_on;
  public $deleted;

  public function __construct($args=[]) {

    $this->court_id = $args['court_id'] ?? '';
    $this->court_division = $args['court_division'] ?? '';
    $this->court_name = $args['court_name'] ?? '';
    $this->created_on = $args['created_on'] ?? date("Y-m-d h:i:sa");
    $this->deleted = $args['deleted'] ?? '';


  }

  protected function validate() {
    $this->errors = [];


    return $this->errors;
  }
  
  static public function find_all_by_court($court_id) {

    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND court_id='" . self::$database->escape_string($court_id) . "'";
    return static::find_by_sql($sql);
  }

  static public function find_all_by_division($division_id, $options=[]) {
    $court_id = $options['court_id'] ?? false;
    
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND court_division='" . self::$database->escape_string($division_id) . "'";
    if ($court_id) {
      $sql .= " AND court_id='" . self::$database->escape_string($court_id) . "'";
    }
    // echo $sql;
    return static::find_by_sql($sql);
  }

}

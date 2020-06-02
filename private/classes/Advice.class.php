<?php
class Advice extends DatabaseObject {
 
  static protected $table_name = "dpp_advice";
  static protected $db_columns = ['id', 'case_id', 'case_name','case_description','document', 'client_id', 'advice', 'reply', 'mail_read',  'request_on','updated_on', 'deleted'];

  public $id;
  public $case_id;
  public $case_name;
  public $case_description;
  public $document;

  public $client_id;
  public $advice;
  public $reply;
  public $mail_read;
 
  public $request_on;
  public $updated_on;
  
  public $deleted;
  public $counts;


  public function __construct($args=[]) {
    $this->case_id = $args['case_id'] ?? '';
    $this->case_name = $args['case_name'] ?? '';
    $this->case_description = $args['case_description'] ?? '';
    $this->document = $args['document'] ?? '';
    $this->client_id = $args['client_id'] ?? '';
    $this->advice = $args['advice'] ?? '';
    $this->reply = $args['reply'] ?? '';
    $this->mail_read = $args['mail_read'] ?? 0;

    $this->request_on = $args['request_on'] ?? date('Y-m-d H:i:s');
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
  static public function find_advice($options=[])
    {
      $reply = $options['reply'] ?? false;
      $client_id = $options['client_id'] ?? false;

      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
      
      if (isset($reply)) {
        $sql .= " AND reply='" . self::$database->escape_string($reply) . "'";
      }
      if (isset($client_id)) {
        $sql .= " AND client_id='" . self::$database->escape_string($client_id) . "'";
      }
      // echo $sql;
      $result = static::find_by_sql($sql);
      return $result;
    }

  static public function find_by_caseId($case_id)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND case_id='" . self::$database->escape_string($case_id) . "'";

    // echo $sql;
    // return static::find_by_sql($sql);
     $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
        return array_shift($obj_array);
      } else {
        return false;
        // return static::find_by_sql($sql);
      }
  }

    

  } // END OF CLASS

?>

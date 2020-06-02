<?php
class Mail extends DatabaseObject {
 
  static protected $table_name = "mails";
  static protected $db_columns = ['id','customer_id','admin_id','subject', 'message','date', 'deleted'];

  public $id;
  public $customer_id;
  public $admin_id;
  public $subject;
  public $message;
  public $date;
  public $deleted;

  public function __construct($args=[]) {
    $this->customer_id = $args['customer_id'] ?? '';
    $this->admin_id = $args['admin_id'] ?? '';
    $this->subject = $args['subject'] ?? '';
    $this->message = $args['message'] ?? '';
    $this->date = $args['date'] ?? date('Y-m-d H:i:s');
    $this->deleted = $args['deleted'] ?? '';
  }


  protected function validate() {
    $this->errors = [];

    if(is_blank($this->customer_id)) {
      $this->errors[] = "Brand name cannot be blank.";
    } elseif (!has_length($this->customer_id, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "Brand name must be between 2 and 255 characters.";
    }

    if(is_blank($this->message)) {
      $this->errors[] = "Message cannot be blank.";
    } elseif (!has_length($this->message, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "Message must be between 2 and 255 characters.";
    }

    return $this->errors;
  }
 
  static public function find_by_customer($customer) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE customer_id='" . self::$database->escape_string($customer) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return $obj_array;
    } else {
      return false;
    }
  }

  
}

?>

<?php

class WorkOrder extends DatabaseObject {

  static protected $table_name = "work_order";
  static protected $db_columns = ['id', 'customer_id', 'technician_id', 'product', 'model', 'complaint', 'request_date', 'start_at', 'end_at', 'material_request', 'start_date', 'end_date', 'next_date', 'comment', 'status', 'assigned', 'created_by', 'deleted'];
 
  public $id;
  public $customer_id;
  public $technician_id;
  public $product;
  public $model;
  public $complaint;
  public $request_date;
  public $start_at;
  public $end_at;
  public $material_request;
  public $start_date;
  public $end_date;
  public $next_date;
  public $comment;
  public $status;
  public $assigned;
  public $created_by;
  public $deleted;


  const STATUS_LEVEL = [1=>'stute'];
  

  // const DISPATCH_TYPE = ['rider'=>'Motorbike Rider', 'luxirous'=>'Luxirious Bus Driver', 'hummer'=>'Hummer Bus Driver', 'shuttle'=>'Shuttle Driver', 'private'=>'Private Car Driver', 'truck'=>'Truck Driver'];

  public function __construct($args=[]) {
    $this->customer_id = $args['customer_id'] ?? '';
    $this->technician_id = $args['technician_id'] ?? '';
    $this->model = $args['model'] ?? '';
    $this->complaint = $args['complaint'] ?? '';
    $this->product = $args['product'] ?? '';
    $this->request_date = $args['request_date'] ?? date('Y-m-d H:i:s');
    $this->start_at = $args['start_at'] ?? '';
    $this->start_at = $args['end_at'] ?? '';
    $this->material_request = $args['material_request'] ?? '';
    $this->start_date = $args['start_date'] ?? date('Y-m-d');
    $this->end_date = $args['end_date'] ?? date('Y-m-d');
    $this->next_date = $args['next_date'] ?? date('Y-m-d');
    $this->comment = $args['comment'] ?? '';
    $this->status = $args['status'] ?? '';
    $this->assigned = $args['assigned'] ?? 0;
    $this->created_by = $args['created_by'] ?? '';
  }

  public function full_name() {
    return $this->customer_id . " " . $this->technician_id;
  }

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->complaint)) {
      $this->errors[] = "Complaint cannot be blank.";
    }


    return $this->errors;
  }

  // static public function find_by_technician($technician) {
  //   $sql = "SELECT * FROM " . static::$table_name . " ";
  //   $sql .= "WHERE technician_id='" . self::$database->escape_string($technician) . "'";
  //   $obj_array = static::find_by_sql($sql);
    
  // }

  static public function find_by_technician($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE technician_id='" . self::$database->escape_string($id) . "'";
    $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    // echo $sql;
    return static::find_by_sql($sql);
  }

    static public function find_by_technician_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE technician_id='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_by_status($status) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE status='" . self::$database->escape_string($status) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return $obj_array;
    } else {
      return false;
    }
  }

  static public function find_by_customer($customer) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE customer_id='" . self::$database->escape_string($customer) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_by_product($product) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE product='" . self::$database->escape_string($product) . "'";
    
    $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') "; //newly added for removing deleted
    
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

}

?>

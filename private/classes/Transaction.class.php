<?php
class Transaction extends DatabaseObject
{

  static protected $table_name = "transactions";
  static protected $db_columns = ['id', 'case_id', 'trans_no', 'payment_purpose', 'payment_mode', 'subscriber_id', 'receipt_no', 'approval', 'doc_name', 'doc_type', 'approve_by', 'approve_date', 'sealed', 'created_by', 'created_at', 'deleted'];

  public $id;
  public $case_id;
  public $trans_no;
  public $payment_purpose;
  public $payment_mode;
  public $subscriber_id;
  public $receipt_no;
  public $approval;
  public $doc_name;
  public $doc_type;
  public $approve_by;
  public $approve_date;
  public $sealed;
  public $created_by;
  public $created_at;
  public $deleted;

  public $counts;

  const DOC_TYPE = [
    1 => 'Affidavit',
    2 => 'Litigation Document'
  ];

  const MOP = [
    1 => 'Bank',
    2 => 'POS'
  ];


  public function __construct($args = [])
  {
    $this->case_id = $args['case_id'] ?? '';
    $this->trans_no = $args['trans_no'] ?? '';
    $this->payment_purpose = $args['payment_purpose'] ?? '';
    $this->payment_mode = $args['payment_mode'] ?? '';
    $this->subscriber_id = $args['subscriber_id'] ?? '';
    $this->receipt_no = $args['receipt_no'] ?? '';
    $this->approval = $args['approval'] ?? 0;
    $this->doc_name = $args['$doc_name;'] ?? '';
    $this->doc_type = $args['$doc_type;'] ?? '';
    $this->approve_by = $args['$approve_by;'] ?? '';
    $this->approve_date = $args['$approve_date;'] ?? NULL;
    $this->sealed = $args['sealed'] ?? 0;
    $this->created_by = $args['created_by'] ?? '';
    $this->created_at = $args['created_at'] ?? date('Y-m-d H:i:s');
    $this->deleted = $args['deleted'] ?? '';
  }


  protected function validate()
  {
    $this->errors = [];

    // if (is_blank($this->brand_name)) {
    //   $this->errors[] = "Brand name cannot be blank.";
    // } elseif (!has_length($this->brand_name, array('min' => 2, 'max' => 255))) {
    //   $this->errors[] = "Brand name must be between 2 and 255 characters.";
    // }

    // if(is_blank($this->status)) {
    //   $this->errors[] = "Status cannot be blank.";
    // } elseif (!has_length($this->status, array('min' => 2, 'max' => 255))) {
    //   $this->errors[] = "Status must be between 2 and 255 characters.";
    // }

    return $this->errors;
  }

  static public function find_by_case_id($id)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE case_id='" . self::$database->escape_string($id) . "'";
    $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_by_trans_id($id, $trans_no)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE case_id='" . self::$database->escape_string($id) . "'";
    $sql .= " AND trans_no='" . self::$database->escape_string($trans_no) . "'";
    $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_by_approved()
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND approval = 1 ";
    return static::find_by_sql($sql);
  }

  static public function find_by_unapproved()
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND approval = 0";
    return static::find_by_sql($sql);
  }

  static public function recent_transaction()
  {
    $getdate = date('Y-m-d');
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND created_at LIKE '%$getdate%' ";
    $sql .= " AND approval=0 ";
    return static::find_by_sql($sql);
  }

  static public function find_by_sealed()
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND sealed = 1 ";
    return static::find_by_sql($sql);
  }

  // static public function find_by_unsealed()
  // {
  //   $sql = "SELECT * FROM " . static::$table_name . " ";
  //   $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
  //   $sql .= " AND sealed = 0";
  //   return static::find_by_sql($sql);
  // }

  static public function recent_approved()
  {
    $getdate = date('Y-m-d');
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND created_at LIKE '%$getdate%' AND approval = 1 ";
    return static::find_by_sql($sql);
  }
}

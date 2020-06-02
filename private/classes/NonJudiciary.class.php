<?php
class NonJudiciary extends DatabaseObject
{

  static protected $table_name = "non_judicial_officers";
  static protected $db_columns = ['id', 'first_name', 'last_name', 'email', 'phone', 'hashed_password', 'administrative_level', 'oracle_no', 'department', 'court_id', 'court_division', 'created_by', 'created_at', 'deleted'];

  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $phone;
  public $hashed_password;
  public $administrative_level;
  public $oracle_no;
  public $department;
  public $court_id;
  public $court_division;
  public $created_by;
  public $created_at;
  public $deleted;

  public $password;
  public $confirm_password;
  protected $password_required = true;
  public $court_type;
  // public $level;

  const ADMIN_LEVEL = [
    1 => 'Super User',
    2 => 'Chief Judge',
    3 => 'Admin Judge',
    4 => 'Judge',
    5 => 'Register',
    6 => 'Cashier',
    7 => 'Bailiff & Sheriff',
    8 => 'Clerk',
    9 => 'Others'
  ];

  const DEPARTMENT = [
    1 => 'IT Unit',
    2 => 'E-Probate',
    3 => 'Others'
  ];


  public function __construct($args = [])
  {
    $this->first_name = $args['first_name'] ?? '';
    $this->last_name = $args['last_name'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
    $this->phone = $args['phone'] ?? '';
    $this->hashed_password = $args['hashed_password'] ?? '';
    $this->administrative_level = $args['administrative_level'] ?? '';
    $this->oracle_no = $args['oracle_no'] ?? '';
    $this->department = $args['department'] ?? '';
    $this->court_id = $args['court_id'] ?? '';
    $this->court_division = $args['court_division'] ?? '';
    $this->created_by = $args['created_by'] ?? '';
    $this->created_at = $args['created_at'] ?? date("Y-m-d h:i:sa");
    $this->deleted = $args['deleted'] ?? '';
  }

  public function full_name()
  {
    return $this->first_name . " " . $this->last_name;
  }

  protected function set_hashed_password()
  {
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  public function verify_password($password)
  {
    return password_verify($password, $this->hashed_password);
  }

  protected function create()
  {
    $this->set_hashed_password();
    return parent::create();
  }

  protected function update()
  {
    if ($this->password != '') {
      $this->set_hashed_password();
      // validate password
    } else {
      // password not being updated, skip hashing and validation
      $this->password_required = false;
    }
    return parent::update();
  }

  protected function validate()
  {
    $this->errors = [];

    if (is_blank($this->first_name)) {
      $this->errors[] = "First name cannot be blank.";
    } elseif (!has_length($this->first_name, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "First name must be between 2 and 255 characters.";
    }

    if (is_blank($this->last_name)) {
      $this->errors[] = "Last name cannot be blank.";
    } elseif (!has_length($this->last_name, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "Last name must be between 2 and 255 characters.";
    }

    if (is_blank($this->email)) {
      $this->errors[] = "Email cannot be blank.";
    } elseif (!has_length($this->email, array('max' => 255))) {
      $this->errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($this->email)) {
      $this->errors[] = "Email must be a valid format.";
    }
    // elseif (!has_unique_email($this->email, $this->id ?? 0)) {
    //   $this->errors[] = "Email provided already exist. Please login instead.";
    // }

    if (is_blank($this->phone)) {
      $this->errors[] = "Phone Number cannot be blank.";
    } elseif (!has_length($this->phone, array('min' => 11, 'max' => 11))) {
      $this->errors[] = "Phone Number must be 11 Numbers.";
    }

    if ($this->password_required) {
      if (is_blank($this->password)) {
        $this->errors[] = "Password cannot be blank.";
      } elseif (!has_length($this->password, array('min' => 8))) {
        $this->errors[] = "Password must contain 8 or more characters";
      } elseif (!preg_match('/[A-Z]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 symbol";
      }

      if (is_blank($this->confirm_password)) {
        $this->errors[] = "Confirm password cannot be blank.";
      } elseif ($this->password !== $this->confirm_password) {
        $this->errors[] = "Password and confirm password must match.";
      }
    }

    return $this->errors;
  }

  static public function find_all_judge($court_id)
  {

    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE level=3 ";
    $sql .= " AND court_id='" . self::$database->escape_string($court_id) . "'";

    $sql .= "ORDER BY id DESC ";
    return static::find_by_sql($sql);
  }

  static public function find_by_email($email, $options = [])
  {
    $level = $options['level'] ?? false;
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE email='" . self::$database->escape_string($email) . "'";
    if ($level) {
      $sql .= " AND level='" . self::$database->escape_string($level) . "'";
    }
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_court_type($court_type, $options = [])
  {
    $level = $options['level'] ?? false;

    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND court_type='" . self::$database->escape_string($court_type) . "'";
    if ($level) {
      $sql .= " AND level='" . self::$database->escape_string($level) . "'";
    }
    // echo $sql;
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_by_division($created_by, $court_division)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND created_by='" . self::$database->escape_string($created_by) . "'";
    $sql .= " AND court_division='" . self::$database->escape_string($court_division) . "'";
    return static::find_by_sql($sql);
  }
}

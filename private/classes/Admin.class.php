<?php
class Admin extends DatabaseObject
{

  static protected $table_name = "admin";
  static protected $db_columns = ['id', 'first_name', 'last_name', 'hashed_password', 'email', 'phone', 'court_id', 'court_division', 'court_type', 'level', 'division', 'rank',  'address', 'created_by', 'created_on', 'deleted'];

  public $id;
  public $first_name;
  public $last_name;
  protected $hashed_password;
  public $password;
  public $confirm_password;
  protected $password_required = true;
  public $email;
  public $phone;
  public $court_id;
  public $court_division;
  public $court_type;
  public $level;
  public $division;
  public $rank;
  public $address;
  public $created_by;
  public $created_on;
  public $deleted;

  const ADMIN_LEVEL = [
    1 => 'Chief Judge',
    2 => 'Admin Judge',
    3 => 'Judge',
    4 => 'Register',
    5 => 'Cashier',
    6 => 'Assist Cashier',
    7 => 'Bailiff & Sheriff',
    8 => 'Clerk',
    9 => 'Clients',
    10 => 'Super User',
    11 => 'DPP',
    12 => 'NPF',
    13 => 'NPS',
  ];
  const RANK = [
      1 => 'Director',
      2 => 'Barrister',
    ];

  public function __construct($args = [])
  {
    $this->first_name = $args['first_name'] ?? '';
    $this->last_name = $args['last_name'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->phone = $args['phone'] ?? '';
    $this->court_id = $args['court_id'] ?? '';
    $this->court_division = $args['court_division'] ?? '';
    $this->court_type = $args['court_type'] ?? '';
    $this->level = $args['level'] ?? '';
    $this->division = $args['division'] ?? '';
    $this->rank = $args['rank'] ?? '';
    $this->address = $args['address'] ?? '';
    $this->created_by = $args['created_by'] ?? '';
    $this->created_on = $args['created_on'] ?? date("Y-m-d h:i:sa");
    $this->deleted = $args['deleted'] ?? '';
  }

  public function full_name()
  {
    return $this->first_name . " " . $this->last_name;
  }
  public function division()
  {
    return $this->division;
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
      $this->errors[] = "Phone Number must be max of 11 digit.";
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

  static public function find_all_judge()
  {

    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE level IN(2,3) ";
    $sql .= " AND court_division='" . self::$database->escape_string(1) . "'";
    // $sql .= " AND court_id='" . self::$database->escape_string($court_id) . "'";

    $sql .= "ORDER BY id DESC ";
    return static::find_by_sql($sql);
  }

  static public function find_all_judges()
  {

    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE level=3 ";

    $sql .= "ORDER BY id DESC ";
    return static::find_by_sql($sql);
  }

  static public function find_created_by($created_by)
  {

    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND created_by='" . self::$database->escape_string($created_by) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_all_by_court($court_id, $options = [])
  {
    $level = $options['level'] ?? false;

    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND court_id='" . self::$database->escape_string($court_id) . "'";
    if ($level) {
      $sql .= " AND level='" . self::$database->escape_string($level) . "'";
    }
    return static::find_by_sql($sql);
  }

  static public function find_by_username($username, $options = [])
  {
    $level = $options['level'] ?? false;

    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
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

  static public function find_by_admin_level($options = []){
    $level = $options['level'] ?? false;

    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";

    if (isset($level)) {
      $sql .= " AND level='" . self::$database->escape_string($level) . "'";
    }
    return static::find_by_sql($sql);
    
  }

  static public function find_all_by_division($division_id, $options = [])
  {
    $level = $options['level'] ?? false;
    $court_id = $options['court_id'] ?? false;

    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= " AND court_division='" . self::$database->escape_string($division_id) . "'";
    if ($level) {
      $sql .= " AND level='" . self::$database->escape_string($level) . "'";
    }
    if ($court_id) {
      $sql .= " AND court_id='" . self::$database->escape_string($court_id) . "'";
    }
    // echo $sql;
    return static::find_by_sql($sql);
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

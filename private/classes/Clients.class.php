<?php

class Clients extends DatabaseObject
{

  static protected $table_name = "clients";
  static protected $db_columns = ['id', 'clientcat', 'firm_name', 'first_name', 'last_name', 'email', 'hashed_password', 'phone', 'call_no', 'cac_reg_no', 'tin_number', 'address', 'created_on', 'deleted'];

  public $id;
  public $clientcat;
  public $firm_name;
  public $first_name;
  public $last_name;
  public $email;
  public $hashed_password;
  public $password;
  public $confirm_password;
  protected $password_required = true;
  public $phone;
  public $call_no;
  public $cac_reg_no;
  public $tin_number;
  public $address;
  public $created_on;
  public $deleted;

  public function __construct($args = [])
  {

    $this->clientcat = $args['clientcat'] ?? '';
    $this->firm_name = $args['firm_name'] ?? '';
    $this->first_name = $args['first_name'] ?? '';
    $this->last_name = $args['last_name'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
    $this->phone = $args['phone'] ?? '';
    $this->call_no = $args['call_no'] ?? '';
    $this->cac_reg_no = $args['cac_reg_no'] ?? '';
    $this->tin_number = $args['tin_number'] ?? '';
    $this->address = $args['address'] ?? '';
    $this->created_on = $args['created_on'] ?? date("Y-m-d h:i:sa");
    $this->deleted = $args['deleted'] ?? '';
  }

  public function full_name()
  {
    return $this->first_name . " " . $this->last_name . " " . $this->firm_name;
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

    if (is_blank($this->firm_name) && $this->clientcat == 2) {
      $this->errors[] = "Firm name cannot be blank.";
    } elseif (!has_length($this->firm_name, array('min' => 2, 'max' => 255)) && $this->clientcat == 2) {
      $this->errors[] = "Firm name must be between 2 and 255 characters.";
    }

    if (is_blank($this->first_name) && $this->clientcat == 1) {
      $this->errors[] = "First name cannot be blank.";
    } elseif (!has_length($this->first_name, array('min' => 2, 'max' => 255)) && $this->clientcat == 1) {
      $this->errors[] = "First name must be between 2 and 255 characters.";
    }

    if (is_blank($this->last_name) && $this->clientcat == 1) {
      $this->errors[] = "Last name cannot be blank.";
    } elseif (!has_length($this->last_name, array('min' => 2, 'max' => 255)) && $this->clientcat == 1) {
      $this->errors[] = "Last name must be between 2 and 255 characters.";
    }

    if (is_blank($this->email)) {
      $this->errors[] = "Email cannot be blank.";
    } elseif (!has_length($this->email, array('max' => 255))) {
      $this->errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($this->email)) {
      $this->errors[] = "Email must be a valid format.";
    } elseif (!has_unique_client_email($this->email, $this->id ?? 0)) {
      $this->errors[] = "Email provided already exist. Please login instead.";
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

    if (is_blank($this->phone)) {
      $this->errors[] = "Phone Number cannot be blank.";
    } elseif (!has_length($this->phone, array('min' => 11, 'max' => 11))) {
      $this->errors[] = "Phone Number must be 11 Numbers.";
    }

    if (is_blank($this->call_no)) {
      $this->errors[] = "Call Number cannot be blank.";
    } elseif (!has_length($this->call_no, array('min' => 2, 'max' => 5))) {
      $this->errors[] = "Call Number must be 5 numbers.";
    } elseif (!has_unique_callno($this->email, $this->id ?? 0)) {
      $this->errors[] = "Call Number provided already exist. Please login instead.";
    }

    // if (is_blank($this->cac_reg_no) && $this->clientcat == 2) {
    //   $this->errors[] = "CAC Reg No cannot be blank.";
    // } elseif (!has_unique_cacNo($this->cac_reg_no, $this->id ?? 0)) {
    //   $this->errors[] = "CAC Reg No provided already exist. Please login instead.";
    // }
    // elseif (!has_length($this->cac_reg_no, array('min' => 6, 'max' => 6)) && $this->clientcat == 2) {
    //   $this->errors[] = "CAC Reg No must be 6 Numbers.";
    // }

    // if (is_blank($this->tin_number) && $this->clientcat == 2) {
    //   $this->errors[] = "TIN Number cannot be blank.";
    // } elseif (!has_length($this->tin_number, array('min' => 9, 'max' => 13)) && $this->clientcat == 2) {
    //   $this->errors[] = "TIN Number must be between 9 and 12 numbers.";
    // }

    if (is_blank($this->address)) {
      $this->errors[] = "Kindly add a address.";
    }

    return $this->errors;
  }

  static public function find_by_email($email)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE email='" . self::$database->escape_string($email) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_by_call_number($call_no)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE call_no='" . self::$database->escape_string($call_no) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_by_cacNo($cacNo)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE cac_reg_no='" . self::$database->escape_string($cacNo) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }
}

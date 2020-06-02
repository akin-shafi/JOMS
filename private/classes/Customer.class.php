<?php

class Customer extends DatabaseObject {

  static protected $table_name = "customers";
  static protected $db_columns = ['id', 'first_name', 'last_name', 'username', 'email', 'phone', 'hashed_password', 'address', 'state', 'city', 'zip', 'user_type', 'engine_id', 'product_id', 'product_cat', 'profile_img', 'created_by', 'created_at', 'deleted'];
 
  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $phone;
  public $username;
  protected $hashed_password;
  public $password;
  public $confirm_password;
  public $address;
  public $state;
  public $city;
  public $zip;
  public $user_type;
  public $engine_id;
  public $product_id;
  public $product_cat;
  public $profile_img;
  public $created_by;
  public $created_at;
  public $deleted;
  protected $password_required = true;


  public function __construct($args=[]) {
    $this->first_name = $args['first_name'] ?? '';
    $this->last_name = $args['last_name'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->phone = $args['phone'] ?? '';
    $this->username = $args['username'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
    $this->address = $args['address'] ?? '';
    $this->state = $args['state'] ?? '';
    $this->city = $args['city'] ?? '';
    $this->zip = $args['zip'] ?? '';
    $this->user_type = $args['user_type'] ?? 3;
    $this->engine_id = $args['engine_id'] ?? '';
    $this->product_id = $args['product_id'] ?? '';
    $this->product_cat = $args['product_cat'] ?? '';
    $this->profile_img = $args['profile_img'] ?? '';
    $this->created_by = $args['created_by'] ?? '';
    $this->created_at = $args['created_at'] ?? date('Y-m-d H:i:s');
  }

  public function full_name() {
    return $this->first_name . " " . $this->last_name;
  }

  protected function set_hashed_password() {
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  public function verify_password($password) {
    return password_verify($password, $this->hashed_password);
  }

  protected function create() {
    $this->set_hashed_password();
    return parent::create();
  }

  protected function update() {
    if($this->password != '') {
      $this->set_hashed_password();
      // validate password
    } else {
      // password not being updated, skip hashing and validation
      $this->password_required = false;
    }
    return parent::update();
  }

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->first_name)) {
      $this->errors[] = "First name cannot be blank.";
    } elseif (!has_length($this->first_name, array('min' => 3, 'max' => 255))) {
      $this->errors[] = "First name must be between 3 and 255 characters.";
    }

    if(is_blank($this->last_name)) {
      $this->errors[] = "Last name cannot be blank.";
    } elseif (!has_length($this->last_name, array('min' => 3, 'max' => 255))) {
      $this->errors[] = "Last name must be between 3 and 255 characters.";
    }

    if(is_blank($this->state)) {
      $this->errors[] = "Kindly select State";
    }

    if(is_blank($this->email)) {
      $this->errors[] = "Email cannot be blank.";
    } elseif (!has_length($this->email, array('max' => 255))) {
      $this->errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($this->email)) {
      $this->errors[] = "Email must be a valid format.";
    } elseif (!has_unique_email_customer($this->email, $this->email ?? 0)) {
      $this->errors[] = "Email not allowed. Try another.";
    }

    // if(is_blank($this->username)) {
    //   $this->errors[] = "Username cannot be blank.";
    // } elseif (!has_length($this->username, array('min' => 3, 'max' => 255))) {
    //   $this->errors[] = "Username must be between 3 and 255 characters.";
    // } elseif (!has_unique_username($this->username, $this->id ?? 0)) {
    //   $this->errors[] = "Username not allowed. Try another.";
    // }

    // if($this->password_required) {

    //   if(is_blank($this->password)) {
    //     $this->errors[] = "Password cannot be blank.";
    //   } elseif (!has_length($this->password, array('min' => 8))) {
    //     $this->errors[] = "Password must contain 8 or more characters";
    //   } elseif (!preg_match('/[A-Z]/', $this->password)) {
    //     $this->errors[] = "Password must contain at least 1 uppercase letter";
    //   } elseif (!preg_match('/[a-z]/', $this->password)) {
    //     $this->errors[] = "Password must contain at least 1 lowercase letter";
    //   } elseif (!preg_match('/[0-9]/', $this->password)) {
    //     $this->errors[] = "Password must contain at least 1 number";
    //   } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
    //     $this->errors[] = "Password must contain at least 1 symbol";
    //   }

    //   if(is_blank($this->confirm_password)) {
    //     $this->errors[] = "Confirm password cannot be blank.";
    //   } elseif ($this->password !== $this->confirm_password) {
    //     $this->errors[] = "Password and confirm password must match.";
    //   }

    //   /* -------- Validation for phone, address and city not done yet ------- */
    // }

    return $this->errors;
  }

  static public function find_by_email($email) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE email='" . self::$database->escape_string($email) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_by_username($username) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
    
    $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') "; //newly added for removing deleted
    
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_rider_by_name($name) {

    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE ( `first_name` LIKE '%". self::$database->escape_string($name) ."%' ";
    $sql .= "OR `last_name` LIKE '%". self::$database->escape_string($name) ."%' ";
    $sql .= "OR `username` LIKE '%". self::$database->escape_string($name) ."%' ) ";
    
    $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') "; //newly added for removing deleted

    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }

  }

  static public function find_all_drivers_and_state_riders($state='',$options=[]){

    $direction = $options['direction'] ?? false;

    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE category != 'rider' ";
    // $sql .= "UNION ";

    if($direction == 'Inbound'){

      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE state IN('" . $state . "') ";
      $sql .= "AND category = 'rider' ";
    
    }

    $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') "; //newly added for removing deleted
    
    $sql .= "ORDER BY id DESC ";
     
    $obj_array = static::find_by_sql($sql);
    return $obj_array;
  }
  
  static public function find_by_state($state) {
     $sql = "SELECT * FROM " . static::$table_name . " ";
     $sql .= "WHERE state IN('" . $state . "') ";
     
     $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') "; //newly added for removing deleted
     
     $sql .= "ORDER BY id DESC ";
     
     $obj_array = static::find_by_sql($sql);
    //  if(!empty($obj_array)) {
       return $obj_array;
    //  } else {
    //   return false;
    //  }
   }

}

?>

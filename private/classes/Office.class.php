<?php
class Office extends DatabaseObject
{

  static protected $table_name = "admin";
  static protected $db_columns = ['id', 'hashed_password', 'email', 'phone', 'level', 'division', 'address', 'created_by', 'created_on', 'deleted'];

  public $id;

  protected $hashed_password;
  public $password;
  public $confirm_password;
  protected $password_required = true;
  public $email;
  public $phone;
 
  public $level;
  public $division;
  public $address;
  public $created_by;
  public $created_on;
  public $deleted;

  public function __construct($args = [])
  {
  
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->phone = $args['phone'] ?? '';
   
    $this->level = $args['level'] ?? '';
    $this->division = $args['division'] ?? '';
    $this->address = $args['address'] ?? '';

    $this->created_by = $args['created_by'] ?? '';
    $this->created_on = $args['created_on'] ?? date("Y-m-d h:i:sa");
    $this->deleted = $args['deleted'] ?? '';
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

    if (is_blank($this->division)) {
      $this->errors[] = "Division cannot be blank.";
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

    // if (is_blank($this->phone)) {
    //   $this->errors[] = "Phone Number cannot be blank.";
    // } elseif (!has_length($this->phone, array('min' => 11, 'max' => 11))) {
    //   $this->errors[] = "Phone Number must be 11 Numbers.";
    // }

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

 
  
}

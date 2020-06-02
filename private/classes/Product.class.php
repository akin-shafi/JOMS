<?php
class Product extends DatabaseObject {
 
  static protected $table_name = "products";
  static protected $db_columns = ['id', 'product_name', 'date_created', 'p_status', 'deleted'];

  public $id;
  public $product_name;
  public $date_created;
  public $p_status;
  public $deleted;

  public $category_name;
  public $brand_name;


  public function __construct($args=[]) {
    $this->product_name = $args['product_name'] ?? '';
    $this->date_created = $args['date_created'] ?? '';
    $this->p_status = $args['p_status'] ?? '';
    $this->deleted = $args['deleted'] ?? '';
  }

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->cid)) {
      $this->errors[] = "Category cannot be blank.";
    } 

    if(is_blank($this->bid)) {
      $this->errors[] = "Brand cannot be blank.";
    } 

    if(is_blank($this->product_name)) {
      $this->errors[] = "Product name cannot be blank.";
    } 
     
    if(is_blank($this->product_price)) {
      $this->errors[] = "Product price cannot be blank.";
    }

    if(is_blank($this->product_stock)) {
      $this->errors[] = "Product quantity cannot be blank.";
    }

    return $this->errors;
  }
 
  static public function find_by_username($username) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  


  
}

?>

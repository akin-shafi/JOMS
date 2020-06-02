<?php
class ProductCategory extends DatabaseObject {
 
  static protected $table_name = "product_categories";
  static protected $db_columns = ['id', 'product_id', 'category_name', 'date_created', 'p_status', 'deleted'];

  public $id;
  public $product_id;
  public $date_created;
  public $p_status;
  public $deleted;

  public $category_name;


  public function __construct($args=[]) {
    $this->product_id = $args['product_id'] ?? '';
    $this->category_name = $args['category_name'] ?? '';
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
 
  static public function find_by_category($cat) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE product_id='" . self::$database->escape_string($cat) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return $obj_array;
    } else {
      return false;
    }
  }

  


  
}

?>

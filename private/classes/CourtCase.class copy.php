 <?php

  class CourtCase extends DatabaseObject
  {

    static protected $table_name = "non_judicial_officers";
    static protected $db_columns = ['id', 'court_id', 'client_id',  'status', 'approval', 'court_type', 'court_division', 'court_matter', 'judge_incharge_id', 'court_case_name', 'description', 'document', 'created_on', 'assigned_to_judge_on', 'end', 'assigned_by', 'color', 'deleted'];

    public $id;
    public $court_id;
    public $client_id;
    public $status;
    public $approval;
    public $court_type;
    public $court_division;
    public $court_matter;
    public $judge_incharge_id;
    public $court_case_name;
    public $description;
    public $document;
    public $created_on;
    public $assigned_to_judge_on;
    public $end;
    public $assigned_by;
    public $color;
    public $deleted;

    private $tem_path;
    protected $upload_dir = "upload";
    public $errors = array();



    protected $upload_errors = array(
      UPLOAD_ERR_OK         => "No errors.",
      UPLOAD_ERR_INI_SIZE   => "Larger than upload_max_filesize.",
      UPLOAD_ERR_FORM_SIZE  => "Larger than form MAX_FILE_SIZE.",
      UPLOAD_ERR_PARTIAL    => "Partial upload.",
      UPLOAD_ERR_NO_FILE    => "No file.",
      UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
      UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
      UPLOAD_ERR_EXTENSION  => "File upload stopped by extension."
    );

    public function attach_file($file)
    {
      // print_r($file);
      // echo '<br>';
      // print_r($file['type']);
      // Perform error checking on the form parameters
      if (!$file || empty($file) || !is_array($file)) {
        // error: nothing uploaded or wrong argument usage
        $this->errors[] = "No file was uploaded.";
        return false;
      } elseif ($file['type'] !== "application/pdf") {
        $this->errors[] = "Sorry, only PDF files are Allowed.";
        return false;
      } elseif ($file['error'] != 0) {
        // error: report what PHP says went wrong
        $this->errors[] = $this->upload_errors[$file['error']];
        return false;
      } else {
        // Set object attributes to the form parameters.
        $this->temp_path = $file['tmp_name'];
        $this->document  = basename($file['name']);

        // Don't worry about saving anything to the database yet.
        return true;
      }
    }


    const COURT_TYPE = [1 => 'High Court', 2 => 'Magistrate Court'];
    const COURT_DIVISION = [1 => 'Lagos Island', 2 => 'Badagry', 3 => 'Ikeja'];
    const MATTER = [1 => 'Civil', 2 => 'Criminal'];

    public function __construct($args = [])
    {

      $this->court_id = $args['court_id'] ?? '';
      $this->client_id = $args['client_id'] ?? '';
      $this->status = $args['status'] ?? 0;
      $this->approval = $args['approval'] ?? 0;
      $this->court_type = $args['court_type'] ?? '';
      $this->court_division = $args['court_division'] ?? '';
      $this->court_matter = $args['court_matter'] ?? '';
      $this->judge_incharge_id = $args['judge_incharge_id'] ?? '';
      $this->court_case_name = $args['court_case_name'] ?? '';
      $this->description = $args['description'] ?? '';
      $this->document = $args['document'] ?? '';
      $this->created_on = $args['created_on'] ?? date("Y-m-d h:i:sa");
      $this->assigned_to_judge_on = $args['assigned_to_judge_on'] ?? '';
      $this->end = $args['end'] ?? '';
      $this->assigned_by = $args['assigned_by'] ?? '';
      $this->color = $args['color'] ?? '';
      $this->deleted = $args['deleted'] ?? '';
    }

    protected function validate()
    {
      $this->errors = [];

      return $this->errors;
    }

    public function full_name()
    {
      return $this->first_name . " " . $this->last_name . " " . $this->firm_name;
    }

    static public function find_by_client_id($client_id)
    {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE client_id='" . self::$database->escape_string($client_id) . "'";
      $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') ";
      $sql .= " ORDER BY id DESC ";
      // echo $sql;
      return static::find_by_sql($sql);
    }

    static public function find_case_by_court($court_id)
    {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE court_id='" . self::$database->escape_string($court_id) . "'";
      $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') ";
      // echo $sql;
      return static::find_by_sql($sql);
    }

    static public function find_case_by_judge($id)
    {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE judge_incharge_id='" . self::$database->escape_string($id) . "'";
      $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') ";
      // echo $sql;
      return static::find_by_sql($sql);
    }

    static public function find_by_judge($id)
    {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE judge_incharge_id='" . self::$database->escape_string($id) . "'";
      $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') ";
      $obj_array = static::find_by_sql($sql);
      if (!empty($obj_array)) {
        return array_shift($obj_array);
      } else {
        return false;
      }
    }


    public function savef()
    {
      // print_r($this);
      // A new record won't have an id yet.
      if (isset($this->id)) {
        // Really just to update the caption
        $this->update();
      } else {
        // Make sure there are no errors

        // Can't save if there are pre-existing errors
        if (!empty($this->errors)) {
          return false;
        }

        // Make sure the caption is not too long for the DB
        // if(strlen($this->caption) > 255) {
        // 	$this->errors[] = "The caption can only be 255 characters long.";
        // 	return false;
        // }

        // Can't save without document and temp location
        if (empty($this->document) || empty($this->temp_path)) {

          $this->errors[] = "The file location was not available.";
          return false;
        }
        // Determine the target_path
        $target_path = $this->upload_dir . '/' . $this->document;

        // Make sure a file doesn't already exist in the target location
        if (file_exists($target_path)) {
          $this->errors[] = "This file {$this->document} already exists.";
          return false;
        }

        // Attempt to move the file 
        if (move_uploaded_file($this->temp_path, $target_path)) {
          // Success

          // $this->create();
          // Save a corresponding entry to the database
          if ($this->create()) {
            // We are done with temp_path, the file isn't there anymore
            unset($this->temp_path);
            return true;
          }
        } else {
          // File was not moved.
          $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
          return false;
        }
      }
    }

    static public function recent_cases()
    {
      $getdate = date('Y-m-d');
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
      $sql .= " AND created_on LIKE '%$getdate%' ";
      $sql .= " AND judge_incharge_id= 0 ";
      $sql .= " AND approval= 1 ";
      $sql .= " ORDER BY id dESC ";
      return static::find_by_sql($sql);
    }

    static public function find_by_assigned()
    {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
      $sql .= " AND status = 1 ";
      $sql .= " AND approval= 1 ";
      return static::find_by_sql($sql);
    }

    static public function find_by_unassigned()
    {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= " WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
      $sql .= " AND (status IS NULL OR status = 0 OR status = '')";
      return static::find_by_sql($sql);
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
  }

  ?>
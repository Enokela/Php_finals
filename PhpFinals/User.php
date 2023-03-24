class User {
  private $conn;
  
  public function __construct($conn) {
    $this->conn = $conn;
  }
  
  public function getUserById($id) {
    $sql = "SELECT * FROM User WHERE id='$id'";
    $result = $this->conn->query($sql);
    
    if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();
      return $user;
    } else {
      return null;
    }
  }
  
  public function getUserByUsername($username) {
    $sql = "SELECT * FROM User WHERE username='$username'";
    $result = $this->conn->query($sql);
    
    if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();
      return $user;
    } else {
      return null;
    }
  }
  
  public function addUser($username, $password, $type) {
    $sql = "INSERT INTO User (username, password, type) VALUES ('$username', '$password', '$type')";
    $result = $this->conn->query($sql);
    return $result;
  }
}
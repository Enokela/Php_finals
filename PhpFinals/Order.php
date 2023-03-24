class Order {
  private $conn;
  
  public function __construct($conn) {
    $this->conn = $conn;
  }
  
  public function getOrdersByUser($user_id) {
    $sql = "SELECT * FROM Order WHERE user_id='$user_id'";
    $result = $this->conn->query($sql);
    
    if ($result->num_rows > 0) {
      $orders = array();
      while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
      }
      return $orders;
    } else {
      return null;
    }
  }
  
  public function addOrder($user_id, $date, $status) {
    $sql = "INSERT INTO Order (user_id, date, status) VALUES ('$user_id', '$date', '$status')";
    $result = $this->conn->query($sql);
    return $result;
  }
  
  public function updateOrderStatus($id, $status) {
    $sql = "UPDATE Order SET status='$status' WHERE id='$id'";
    $result = $this->conn->query($sql);
    return $result;
  }
}
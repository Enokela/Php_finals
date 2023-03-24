class Product {
  private $conn;
  
  public function __construct($conn) {
    $this->conn = $conn;
  }
  
  public function getProducts() {
    $sql = "SELECT * FROM Product";
    $result = $this->conn->query($sql);
    
    if ($result->num_rows > 0) {
      $products = array();
      while ($row = $result->fetch_assoc()) {
        $products[] = $row;
      }
      return $products;
    } else {
      return null;
    }
  }
  
  public function addProduct($name, $price, $category_id) {
    $sql = "INSERT INTO Product (name, price, category_id) VALUES ('$name', '$price', '$category_id')";
    $result = $this->conn->query($sql);
    return $result;
  }
  
  public function editProduct($id, $name, $price, $category_id) {
    $sql = "UPDATE Product SET name='$name', price='$price', category_id='$category_id' WHERE id='$id'";
    $result = $this->conn->query($sql);
    return $result;
  }
}
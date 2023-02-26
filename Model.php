<?php
class Model
{
    private $server = 'localhost';
    private $username = 'root';
    private $password;
    private $database = 'orphic';
    private $conn;
    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);
        } catch (Exception $ex) {
            echo 'connection failed' . $ex->getMessage();
        }
    }

    public function fetchData($table_name)
    {
        $data = null;
        $query = "SELECT * FROM $table_name";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function insertForm()
    {
        if (isset($_POST['contactSubmit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            if (empty($name) || empty($email) || empty($message)) {
                echo "<script>alert('All fields are required');</script>";
                return;
            }
            $query = "INSERT INTO contactForm(contactName, contactEmail, contactMessage) VALUES ('$name','$email', '$message')";
            if ($sql = $this->conn->query($query)) {
                echo "<script>alert('Contact form submited successfully');</script>";
            } else {
                echo "<script>alert('Contact submition failed');</script>";
            }
        }
    }

    public function insertUser()
    {
        if (isset($_POST['registerSubmit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (empty($name) || empty($email) || empty($password)) {
                echo "<script>alert('All fields are required');</script>";
                return;
            }
            $query = "INSERT INTO users(name, email, password, role) VALUES ('$name','$email', '$password', 'simple')";
            if ($sql = $this->conn->query($query)) {
                echo "<script>alert('Registered successfully');</script>";
            } else {
                echo "<script>alert('Register failed');</script>";
            }
        }
    }
    public function createProduct()
    {
        if (isset($_POST['productSubmit'])) {
            $image = $_FILES['image']['name'];
            $price = $_POST['price'];
            $modifikuarNga = $_SESSION['name'];

            $imageDir = '../images/' . $image;
            if (empty($price)) {
                echo "<script>alert('All fields are required');</script>";
                return;
            }
            $query = "INSERT INTO products(image, price, modifikuarNga) VALUES ('$imageDir','$price', '$modifikuarNga')";
            if ($sql = $this->conn->query($query)) {
                echo "<script>alert('Product submited successfully');</script>";
                header("Location: ../pages/dashboard.php");
            } else {
                echo "<script>alert('Product submit failed');</script>";
            }
        }
    }

    public function deleteProduct($id)
    {

        $query = "DELETE FROM products where id = $id";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function editProduct($id)
    {
        $data = null;
        $query = "SELECT * FROM products WHERE id = $id";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data = $row;
            }
        }
        return $data;
    }

    public function updateProduct($data)
    {
        $query = "UPDATE products SET image='$data[image]', price='$data[price]', modifikuarNga='$data[modifikuarNga]' WHERE id='$data[id]'";

        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}

$model = new Model();
$products = $model->fetchData('products');
$contactForm = $model->fetchData('contactForm');

class MySQLUserRepository implements UserRepositoryInterface {
    private $connection;

    public function __construct($host, $db, $user, $pass) {
        $this->connection = new mysqli($host, $user, $pass, $db);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function createUser($name, $email) {
        $stmt = $this->connection->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        $stmt->close();
    }

    public function getUser($id) {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateUser($id, $name, $email) {
        $stmt = $this->connection->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $email, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteUser($id) {
        $stmt = $this->connection->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

interface UserRepositoryInterface {
    public function createUser($name, $email);
    public function getUser($id);
    public function updateUser($id, $name, $email);
    public function deleteUser($id);
}

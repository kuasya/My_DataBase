public interface UserRepository {
  void create(User user);
  List<User> findAll();
  Optional<User> findById(int id);
  boolean update(User user);
  boolean delete(int id);
}

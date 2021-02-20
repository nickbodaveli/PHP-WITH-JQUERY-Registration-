<?php 
namespace Project;
use Project\Database;
class Register extends Database
{
  public$database = NULL;

  public function __construct()
  {
    $this->database = new Database();
  }

  public function getCountry($table, $id, $country)
  {
    $statement = $this->database->query("SELECT $id, $country FROM $table");
    $statement = $this->database->resultSet();
    return $statement;
  }

  public function getCity($sql)
  {
    $statement = $this->database->query($sql);
    $statement = $this->database->resultSet();
    return $statement;
  }

  public function createBaseProducts($post)
  {
    $fields = 
    [
      'name' => isset($post["name"]) ? $post["name"] : NULL,
      'surname' => isset($post["surname"]) ? $post["surname"] : NULL,
      'birthdate' => isset($post["birthdate"]) ? $post["birthdate"] : NULL,
      'sex' => isset($post["sex"]) ? $post["sex"] : NULL,
      'address' => isset($post["address"]) ? $post["address"] : NULL,
      'phone' => isset($post["phone"]) ? $post["phone"] : NULL,
      'country' => isset($post["country"]) ? $post["country"] : NULL,
      'city' => isset($post["city"]) ? $post["city"] : NULL,
      'birthdate' => isset($post["birthdate"]) ? $post["birthdate"] : NULL,
      'id_number' => isset($post["id_number"]) ? $post["id_number"] : NULL,
      'email' => isset($post["email"]) ? $post["email"] : NULL,
      'password' => isset($post["password"]) ? $post["password"] : NULL,
    ];

    $post_Name = array_keys($fields);
    $post_Value = array_values($fields);
    $getPosts = implode(",", $post_Name);
    $getValues = implode("','", $post_Value);
    $values = "'" . $getValues . "'";
    $this->sql = "INSERT INTO register ($getPosts) VALUES ($values)";
    $this->database->query($this->sql);
    $this->database->execute();
  }
}

?>
<?php
include "db.php";

$brand = $_POST['brand'];
$model = $_POST['model'];
$fuel = $_POST['fuel'];
$price = $_POST['price'];

$image_name = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
$ext = pathinfo($image_name, PATHINFO_EXTENSION);
$new_name = time() . rand(1000, 9999) . "." . $ext;
$upload_path = "uploads/" . $new_name;

if (move_uploaded_file($image_tmp, $upload_path)) {
  $query = "INSERT INTO cars (brand, model, fuel, price, image) VALUES ('$brand', '$model', '$fuel', '$price', '$new_name')";
  if (mysqli_query($conn, $query)) {
    echo "Car uploaded successfully!";
  } else {
    echo "Database error!";
  }
} else {
  echo "Image upload failed!";
}
?>

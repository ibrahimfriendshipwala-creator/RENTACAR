<?php include "db.php"; ?>
<?php
$car_id = $_GET['car_id'] ?? 0;
$car = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cars WHERE id = $car_id"));
if (!$car) {
  echo "<script>alert('Car not found'); window.location.href='index.php';</script>";
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Car - <?= $car['brand'] . " " . $car['model']; ?></title>
  <style>
    body {
      margin: 0;
      font-family: Arial;
      background: #f9f9f9;
    }
    header {
      background: #1e1e1e;
      color: white;
      padding: 20px;
      text-align: center;
    }
    .container {
      width: 90%;
      max-width: 600px;
      margin: 30px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input, select, button {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border-radius: 8px;
      border: 1px solid #ccc;
    }
    button {
      background: #28a745;
      color: white;
      border: none;
      cursor: pointer;
    }
    .car-info {
      text-align: center;
    }
    .car-info img {
      width: 100%;
      max-width: 400px;
      border-radius: 10px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

<header>
  <h1>Book Your Car</h1>
</header>

<div class="container">
  <div class="car-info">
    <img src="uploads/<?= $car['image'] ?>" alt="Car Image">
    <h2><?= $car['brand'] . " " . $car['model'] ?></h2>
    <p><strong>Price per day:</strong> Rs. <?= $car['price'] ?></p>
  </div>

  <form id="bookingForm">
    <input type="hidden" name="car_id" value="<?= $car['id'] ?>">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="tel" name="phone" placeholder="Phone Number" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="date" name="start_date" required>
    <input type="date" name="end_date" required>
    <button type="submit">Confirm Booking</button>
  </form>
</div>

<script>
document.getElementById('bookingForm').onsubmit = function(e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch('confirm.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    window.location.href = 'confirm.php?status=success';
  })
  .catch(() => {
    alert('Something went wrong. Try again.');
  });
};
</script>

</body>
</html>

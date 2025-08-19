<?php include "db.php"; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $car_id = $_POST['car_id'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];

  $insert = mysqli_query($conn, "INSERT INTO bookings (car_id, name, phone, email, start_date, end_date)
    VALUES ('$car_id', '$name', '$phone', '$email', '$start_date', '$end_date')");
    
  exit("done");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Booking Confirmation</title>
  <style>
    body {
      margin: 0;
      font-family: Arial;
      background: #e0ffe0;
    }
    .confirmation-box {
      background: white;
      padding: 40px;
      max-width: 600px;
      margin: 50px auto;
      text-align: center;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h1 {
      color: #28a745;
    }
    button {
      margin-top: 30px;
      padding: 12px 25px;
      border: none;
      background: #2a84ff;
      color: white;
      border-radius: 8px;
      cursor: pointer;
    }
  </style>
</head>
<body>

<?php if ($_GET['status'] == 'success'): ?>
  <div class="confirmation-box">
    <h1>✅ Booking Confirmed!</h1>
    <p>Your car rental has been booked successfully.</p>
    <p>We'll contact you shortly with details.</p>
    <button onclick="goHome()">Go to Homepage</button>
  </div>
<?php else: ?>
  <div class="confirmation-box">
    <h1>❌ Booking Failed</h1>
    <p>Something went wrong. Please try again later.</p>
    <button onclick="goHome()">Try Again</button>
  </div>
<?php endif; ?>

<script>
function goHome() {
  window.location.href = 'index.php';
}
</script>

</body>
</html>

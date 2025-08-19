<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Rent A Car - Home</title>
  <style>
    body {
      margin: 0; font-family: Arial;
      background: #f5f5f5;
    }
    header {
      background: #1e1e1e;
      color: #fff; padding: 20px;
      text-align: center;
    }
    .search-bar {
      background: white;
      padding: 30px;
      margin: 30px auto;
      width: 90%;
      max-width: 800px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 10px;
    }
    .search-bar input, .search-bar button {
      padding: 12px;
      margin: 8px;
      border: 1px solid #ccc;
      border-radius: 8px;
      width: 28%;
    }
    .search-bar button {
      background: #2a84ff;
      color: white;
      border: none;
      cursor: pointer;
    }
    .cars-section {
      padding: 20px;
    }
    .car-card {
      background: white;
      border-radius: 10px;
      padding: 15px;
      margin: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      display: inline-block;
      width: 280px;
      vertical-align: top;
    }
    .car-card img {
      width: 100%;
      border-radius: 10px;
    }
    .filters {
      width: 90%;
      margin: auto;
      margin-bottom: 30px;
      padding: 20px;
      background: #fff;
      border-radius: 10px;
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: center;
    }
    .filters select {
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
    }
  </style>
</head>
<body>

<header>
  <h1>🚗 Rent A Car</h1>
  <p>All performance is legendary</p>
</header>

<div class="search-bar">
  <input type="text" id="location" placeholder="Enter Pickup Location">
  <input type="date" id="start_date">
  <input type="date" id="end_date">
  <button onclick="searchCars()">Search</button>
</div>

<div class="filters">
  <select id="carType">
    <option value="">Car Type</option>
    <option>SUV</option>
    <option>Hatchback</option>
    <option>Sedan</option>
  </select>
  <select id="priceRange">
    <option value="">Price Range</option>
    <option>Below 5000</option>
    <option>5000 - 10000</option>
    <option>Above 15000</option>
  </select>
  <select id="fuel">
    <option value="">Fuel Type</option>
    <option>Petrol</option>
    <option>Diesel</option>
    <option>Hybrid</option>
    <option>electric</option>
  </select>
  <select id="brand">
    <option value="">Brand</option>
    <option>Suzuki</option>
    <option>Honda</option>
    <option>Toyota</option><option>BMW</option>
  </select>
</div>

<div class="cars-section">
  <h2 style="text-align:center;">🔥 Featured Cars</h2>
  <?php
    $q = mysqli_query($conn, "SELECT * FROM cars LIMIT 6");
    while($row = mysqli_fetch_assoc($q)) {
      echo "<div class='car-card'>
        <img src='uploads/{$row['image']}' alt='Car Image'>
        <h3>{$row['brand']} {$row['model']}</h3>
        <p>Price/Day: Rs. {$row['price']}</p>
        <p>Fuel: {$row['fuel']}</p>
        <button onclick=\"goToBook({$row['id']})\">Book Now</button>
      </div>";
    }
  ?>
</div>

<script>
function searchCars() {
  const loc = document.getElementById('location').value;
  const start = document.getElementById('start_date').value;
  const end = document.getElementById('end_date').value;
  window.location.href = `search.php?location=${loc}&start=${start}&end=${end}`;
}
function goToBook(id) {
  window.location.href = `book.php?car_id=${id}`;
}
</script>

</body>
</html>

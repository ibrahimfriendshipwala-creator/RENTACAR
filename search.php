<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Results - Rent A Car</title>
  <style>
    body {
      margin: 0;
      font-family: Arial;
      background: #f9f9f9;
    }
    header {
      background: #1e1e1e;
      color: white;
      text-align: center;
      padding: 20px;
    }
    .container {
      width: 90%;
      margin: 30px auto;
    }
    .sort-section {
      text-align: right;
      margin-bottom: 20px;
    }
    select {
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
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
    .car-card button {
      padding: 10px 15px;
      background: #2a84ff;
      color: white;
      border: none;
      border-radius: 5px;
      margin-top: 10px;
      cursor: pointer;
    }
  </style>
</head>
<body>

<header>
  <h1>Search Results</h1>
</header>

<div class="container">
  <div class="sort-section">
    <label>Sort By:</label>
    <select onchange="sortResults(this.value)">
      <option value="">Select</option>
      <option value="low">Price Low to High</option>
      <option value="high">Price High to Low</option>
    </select>
  </div>

  <div id="carList">
    <?php
      $location = $_GET['location'] ?? '';
      $start = $_GET['start'] ?? '';
      $end = $_GET['end'] ?? '';

      $query = "SELECT * FROM cars";
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='car-card'>
          <img src='uploads/{$row['image']}' alt='Car Image'>
          <h3>{$row['brand']} {$row['model']}</h3>
          <p>Fuel: {$row['fuel']}</p>
          <p>Price/Day: Rs. {$row['price']}</p>
          <button onclick='bookNow({$row['id']})'>Book Now</button>
        </div>";
      }
    ?>
  </div>
</div>

<script>
function sortResults(option) {
  const cards = Array.from(document.querySelectorAll('.car-card'));
  const sorted = cards.sort((a, b) => {
    const priceA = parseInt(a.querySelector('p:nth-of-type(2)').innerText.replace(/\D/g, ''));
    const priceB = parseInt(b.querySelector('p:nth-of-type(2)').innerText.replace(/\D/g, ''));
    return option === "low" ? priceA - priceB : priceB - priceA;
  });
  const container = document.getElementById('carList');
  container.innerHTML = '';
  sorted.forEach(card => container.appendChild(card));
}

function bookNow(id) {
  window.location.href = `book.php?car_id=${id}`;
}
</script>

</body>
</html>

<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Upload - Rent A Car</title>
  <style>
    body {
      font-family: Arial;
      background: #f0f0f0;
      margin: 0;
    }
    header {
      background: #222;
      color: white;
      padding: 20px;
      text-align: center;
    }
    .form-container {
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
  </style>
</head>
<body>

<header>
  <h1>🚗 Admin - Upload Car</h1>
</header>

<div class="form-container">
  <form id="carForm" enctype="multipart/form-data">
    <input type="text" name="brand" placeholder="Car Brand (e.g., Honda)" required>
    <input type="text" name="model" placeholder="Car Model (e.g., Civic)" required>
    <input type="text" name="fuel" placeholder="Fuel Type (e.g., Petrol)" required>
    <input type="number" name="price" placeholder="Price Per Day (e.g., 5500)" required>
    <input type="file" name="image" accept="image/*" required>
    <button type="submit">Upload Car</button>
  </form>
</div>

<script>
document.getElementById('carForm').onsubmit = function(e) {
  e.preventDefault();
  const formData = new FormData(this);

  fetch('upload_action.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    alert(data);
    wi

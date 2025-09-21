<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>AgriConnect Hub – Admin Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root{
    --bg:#e9ffe9;
    --btn:#2c4f2c;
    --muted:#666;
    --accent:#6b39a8;
    --sidebar:#2c4f2c;
    --light:#f5fff5;
  }
  *{box-sizing:border-box}
  body{
    margin:0; font-family:Poppins, sans-serif; color:#222; background:#fff;
  }
 
  /* Navbar */
  .nav{
    display:flex; justify-content:space-between; align-items:center;
    padding:16px 32px; border-bottom:1px solid #eee;
  }
  .nav .brand{font-weight:700; font-size:22px}
  .nav .menu{font-weight:600; font-size:18px; color:#333}
 
  /* Layout */
  .container{
    display:grid;
    grid-template-columns:220px 1fr;
    min-height:calc(100vh - 65px);
  }
 
  /* Sidebar */
  .sidebar{
    background:var(--sidebar);
    color:#fff;
    padding:24px 16px;
    display:flex;
    flex-direction:column;
    gap:16px;
  }
  .sidebar h3{margin:0 0 10px; font-size:18px;}
  .sidebar button{
    width:100%; padding:12px; border:none; border-radius:8px;
    background:#345f34; color:#fff; font-weight:500;
    text-align:left; cursor:pointer; transition:0.2s;
  }
  .sidebar button:hover{
    background:#46a346;
  }
 
  /* Main */
  .main{
    background:var(--bg);
    padding:24px;
    display:flex;
    flex-direction:column;
  }
 
  .operations{
    margin-bottom:20px;
  }
  .operations button{
    margin-right:10px;
    padding:10px 20px;
    background:var(--btn);
    border:none;
    color:#fff;
    cursor:pointer;
    border-radius:6px;
    font-weight:500;
  }
  .operations button:hover{
    background:#3d6f3d;
  }
 
  .data{
    flex:1;
    border:2px dashed #7f8c8d;
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#7f8c8d;
    font-size:18px;
    background:var(--light);
  }
 
  footer{
    text-align:center;
    padding:10px;
    background:#bdc3c7;
    margin-top:20px;
    border-radius:6px;
  }
 
  @media(max-width:900px){
    .container{
      grid-template-columns:1fr;
    }
    .sidebar{
      flex-direction:row;
      justify-content:space-around;
    }
    .sidebar button{text-align:center}
  }
</style>
</head>
<body>
 
  <!-- Top navbar -->
  <div class="nav">
    <div class="brand">🌱 AgriConnect</div>
    <div class="menu">Welcome to Admin</div>
  </div>
 
  <!-- Layout -->
  <div class="container">
 
    <!-- Sidebar -->
    <aside class="sidebar">
      <h3>Menu</h3>
      <button onclick="showData('consumer')">Consumers</button>
      <button onclick="showData('farmer')">Farmers</button>
      <button onclick="showData('product')">Products</button>
    </aside>
 
    <!-- Main -->
    <main class="main">
      <div class="operations">
        <button>Add</button>
        <button>Delete</button>
        <button>Update</button>
      </div>
 
      <div class="data" id="dataArea">
        --- Data Table Placeholder ---
      </div>
 
      <footer>
        &copy; 2025 AgriConnect Hub
      </footer>
    </main>
 
  </div>
 
  <script>
    // Simple placeholder switch
    function showData(type) {
      let dataArea = document.getElementById('dataArea');
      if(type === 'consumer') {
          dataArea.innerHTML = "Consumer Data will be shown here.";
      } else if(type === 'farmer') {
          dataArea.innerHTML = "Farmer Data will be shown here.";
      } else if(type === 'product') {
          dataArea.innerHTML = "Product Data will be shown here.";
      }
    }
  </script>
 
</body>
</html>
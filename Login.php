<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Wadinmore Wedding Organizer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body{
  font-family:'Poppins', sans-serif;
  padding-top:70px;
  min-height:100vh;
  background:
    linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)),
    url("https://images.unsplash.com/photo-1511285560929-80b456fea0bc");
  background-size:cover;
  background-position:center;
  background-attachment:fixed;
}

:root{
  --rose:#b76e79;
  --rose-dark:#9c4f5c;
  --gold:#d4af37;
}

.card{
  border:none;
  border-radius:28px;
  background:rgba(255,255,255,.93);
  box-shadow:0 25px 60px rgba(0,0,0,.35);
  padding:10px;
  animation:fadeUp .8s ease;
}

@keyframes fadeUp{
  from{opacity:0; transform:translateY(40px);}
  to{opacity:1; transform:translateY(0);}
}

.btn-primary{
  background:linear-gradient(135deg,var(--rose),var(--gold));
  border:none;
  border-radius:30px;
  padding:12px;
  font-weight:600;
}
</style>
</head>

<body>

<?php include 'navbar.php'; ?>

<div class="login-wrapper d-flex align-items-center justify-content-center" style="min-height:80vh">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-5">

<div class="card">
<div class="card-body">

<h2 class="text-center mb-3">Login User</h2>
<p class="text-center mb-4">Masuk untuk melakukan booking paket Wadinmore</p>

<!-- 🔔 ALERT ERROR -->
<?php if (isset($_SESSION['error'])): ?>
  <div class="alert alert-danger text-center alert-dismissible fade show">
    <?= $_SESSION['error']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
<?php unset($_SESSION['error']); endif; ?>

<form action="proses_login.php" method="post">

  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" name="username" class="form-control" required autocomplete="username">
  </div>

  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" name="password" class="form-control" required autocomplete="current-password">
  </div>

  <div class="d-grid">
    <button type="submit" class="btn btn-primary">Login</button>
  </div>

  <p class="text-center mt-3">
    Belum punya akun? <a href="register.php">Daftar di sini</a>
  </p>

</form>

</div>
</div>

</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

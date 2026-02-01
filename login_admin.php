<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin - Wadinmore Wedding Organizer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Google Font Wedding -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<style>

/* ================= GLOBAL ================= */
body{
  font-family:'Poppins', sans-serif;
  padding-top:70px;
  min-height:100vh;
  background:
    linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)),
    url("https://images.unsplash.com/photo-1505238680356-667803448bb6");
  background-size:cover;
  background-position:center;
  background-attachment:fixed;
}

:root{
  --rose:#b76e79;
  --rose-dark:#9c4f5c;
  --gold:#d4af37;
}

/* ================= SPARKLE ================= */
body::after{
  content:"";
  position:fixed;
  inset:0;
  pointer-events:none;
  background-image:
    radial-gradient(2px 2px at 20% 30%, #fff, transparent),
    radial-gradient(2px 2px at 70% 50%, #fff, transparent),
    radial-gradient(2px 2px at 40% 80%, #fff, transparent);
  opacity:.25;
  animation:sparkle 7s linear infinite alternate;
}

@keyframes sparkle{
  from{transform:translateY(0);}
  to{transform:translateY(-30px);}
}

/* ================= CARD ================= */
.card{
  border:none;
  border-radius:28px;
  background:rgba(255,255,255,.93);
  backdrop-filter:blur(10px);
  box-shadow:0 25px 60px rgba(0,0,0,.35);
  padding:10px;
  animation:fadeUp .8s ease;
}

.card:hover{
  transform:translateY(-6px);
  box-shadow:0 35px 70px rgba(0,0,0,.4);
}

h2{
  font-family:'Playfair Display', serif;
  color:var(--rose-dark);
  font-weight:700;
}

.form-control{
  border-radius:14px;
  padding:12px 14px;
}

.form-control:focus{
  border-color:var(--rose);
  box-shadow:0 0 0 3px rgba(183,110,121,.2);
}

.input-group-text{
  background:var(--rose);
  color:white;
  border:none;
}

.btn-primary{
  background:linear-gradient(135deg,var(--rose),var(--gold));
  border:none;
  border-radius:30px;
  padding:12px;
  font-weight:600;
  box-shadow:0 10px 25px rgba(183,110,121,.35);
}

.login-wrapper{
  min-height:80vh;
  display:flex;
  align-items:center;
  justify-content:center;
}

@keyframes fadeUp{
  from{opacity:0;transform:translateY(40px);}
  to{opacity:1;transform:translateY(0);}
}
</style>
</head>

<body>

<?php include 'navbar.php'; ?>

<div class="login-wrapper">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-5">

<div class="card shadow-sm">
<div class="card-body">

<h2 class="text-center mb-3">Login Admin</h2>
<p class="text-center mb-4">
  Masuk sebagai administrator sistem Wadinmore
</p>

<!-- 🔔 NOTIFIKASI ERROR -->
<?php if (isset($_SESSION['error'])): ?>
  <div class="alert alert-danger text-center alert-dismissible fade show">
    <?= $_SESSION['error']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
<?php unset($_SESSION['error']); endif; ?>

<form action="proses_login_admin.php" method="post">

  <div class="mb-3">
    <label class="form-label">Nama Admin</label>
    <div class="input-group">
      <span class="input-group-text">
        <i class="bi bi-person-fill"></i>
      </span>
      <input type="text" name="nama_admin" class="form-control" required>
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Password</label>
    <div class="input-group">
      <span class="input-group-text">
        <i class="bi bi-lock-fill"></i>
      </span>
      <input type="password" id="password" name="password" class="form-control" required>
      <span class="input-group-text" id="togglePass" style="cursor:pointer;">
        <i class="bi bi-eye-fill"></i>
      </span>
    </div>
  </div>

  <div class="d-grid">
    <button class="btn btn-primary">Login Admin</button>
  </div>

</form>

</div>
</div>

</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const toggle = document.getElementById('togglePass');
const pass = document.getElementById('password');

toggle.onclick = () => {
  if(pass.type === "password"){
    pass.type = "text";
    toggle.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
  } else {
    pass.type = "password";
    toggle.innerHTML = '<i class="bi bi-eye-fill"></i>';
  }
};
</script>

</body>
</html>

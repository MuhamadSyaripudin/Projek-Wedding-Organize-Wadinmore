<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Wadinmore Wedding Organizer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font Wedding -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<style>

/* ================= GLOBAL ================= */
body{
  font-family:'Poppins', sans-serif;
  padding-top:70px;
  min-height:100vh;

  /* background wedding premium */
  background:
    linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)),
    url("https://images.unsplash.com/photo-1511285560929-80b456fea0bc");

  background-size:cover;
  background-position:center;
  background-attachment:fixed;
}

/* ===== Wedding Palette ===== */
:root{
  --rose:#b76e79;
  --rose-dark:#9c4f5c;
  --gold:#d4af37;
  --soft:#f8f0f2;
}

/* ================= LOGIN CARD ================= */
.card{
  border:none;
  border-radius:28px;

  /* glass effect */
  background:rgba(255,255,255,.93);
  backdrop-filter:blur(10px);

  box-shadow:0 25px 60px rgba(0,0,0,.35);
  padding:10px;

  transition:.3s;
}

.card:hover{
  transform:translateY(-6px);
  box-shadow:0 35px 70px rgba(0,0,0,.4);
}

/* ================= TITLE ================= */
h2{
  font-family:'Playfair Display', serif;
  color:var(--rose-dark);
  font-weight:700;
  letter-spacing:1px;
}

.card p{
  color:#666;
}

/* ================= INPUT ================= */
.form-control{
  border-radius:14px;
  padding:12px 14px;
  border:1px solid #eee;
  transition:.3s;
}

.form-control:focus{
  border-color:var(--rose);
  box-shadow:0 0 0 3px rgba(183,110,121,.2);
}

/* ================= BUTTON WEDDING ================= */
.btn-primary{
  background:linear-gradient(135deg,var(--rose),var(--gold));
  border:none;
  border-radius:30px;
  padding:12px;
  font-weight:600;
  letter-spacing:.5px;

  box-shadow:0 10px 25px rgba(183,110,121,.35);
  transition:.3s;
}

.btn-primary:hover{
  transform:translateY(-2px);
  box-shadow:0 18px 40px rgba(183,110,121,.5);
}

/* ================= LINK ================= */
a{
  color:var(--rose);
  font-weight:500;
  text-decoration:none;
}

a:hover{
  color:var(--rose-dark);
}

/* ================= CENTER WRAPPER ================= */
.login-wrapper{
  min-height:80vh;
  display:flex;
  align-items:center;
  justify-content:center;
}

/* ================= ANIMATION ================= */
.card{
  animation:fadeUp .8s ease;
}

@keyframes fadeUp{
  from{
    opacity:0;
    transform:translateY(40px);
  }
  to{
    opacity:1;
    transform:translateY(0);
  }
}

</style>
</head>


<body>

<?php include 'navbar.php'; ?>


<!-- ================= WRAPPER TAMBAHAN (hanya styling, tidak ubah alur) ================= -->
<div class="login-wrapper">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">

      <div class="card shadow-sm">
        <div class="card-body">

          <h2 class="text-center mb-3">Login User</h2>
          <p class="text-center mb-4">
            Masuk untuk melakukan booking paket Wadinmore
          </p>

          <!-- ===== FORM TIDAK DIUBAH ===== -->
          <form action="proses_login.php" method="post">

            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>

            <p class="text-center mt-3">
              Belum punya akun? <a href="register.php">Daftar di sini</a>
            </p>

          </form>
          <!-- ===== END FORM ===== -->

        </div>
      </div>

    </div>
  </div>
</div>

</div>


<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

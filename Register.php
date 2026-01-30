<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register - Wadinmore Wedding Organizer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icon -->
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
    linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)),
    url("https://images.unsplash.com/photo-1519741497674-611481863552");

  background-size:cover;
  background-position:center;
  background-attachment:fixed;
}

/* ===== Wedding Palette ===== */
:root{
  --rose:#b76e79;
  --rose-dark:#9c4f5c;
  --gold:#d4af37;
}

/* ================= WRAPPER ================= */
.register-wrapper{
  min-height:85vh;
  display:flex;
  align-items:center;
  justify-content:center;
}

/* ================= CARD ================= */
.card{
  border:none;
  border-radius:28px;

  background:rgba(255,255,255,.93);
  backdrop-filter:blur(12px);

  box-shadow:0 25px 60px rgba(0,0,0,.35);

  animation:fadeUp .8s ease;
  transition:.3s;
}

.card:hover{
  transform:translateY(-6px);
}

/* ================= TITLE ================= */
h2{
  font-family:'Playfair Display', serif;
  color:var(--rose-dark);
  font-weight:700;
}

/* ================= INPUT ================= */
.input-group-text{
  background:#fff;
  border-radius:14px 0 0 14px;
  border:1px solid #eee;
}

.form-control{
  border-radius:0 14px 14px 0;
  padding:12px;
  border:1px solid #eee;
}

.form-control:focus{
  border-color:var(--rose);
  box-shadow:0 0 0 3px rgba(183,110,121,.2);
}

/* ================= BUTTON ================= */
.btn-primary{
  background:linear-gradient(135deg,var(--rose),var(--gold));
  border:none;
  border-radius:30px;
  padding:12px;
  font-weight:600;

  box-shadow:0 10px 25px rgba(183,110,121,.35);
  transition:.3s;
}

.btn-primary:hover{
  transform:translateY(-2px);
}

/* ================= LINK ================= */
a{
  color:var(--rose);
  text-decoration:none;
}

a:hover{
  color:var(--rose-dark);
}

/* ================= ANIMATION ================= */
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


<div class="register-wrapper">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">

      <div class="card shadow-sm">
        <div class="card-body p-4">

          <h2 class="text-center mb-3">Daftar Akun User</h2>
          <p class="text-center mb-4">Buat akun untuk booking paket Wadinmore</p>


          <!-- ===== FORM (ALUR TIDAK DIUBAH) ===== -->
          <form action="proses_register.php" method="post">

            <!-- Nama -->
            <div class="mb-3 input-group">
              <span class="input-group-text">
                <i class="bi bi-person"></i>
              </span>
              <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
            </div>

            <!-- HP -->
            <div class="mb-3 input-group">
              <span class="input-group-text">
                <i class="bi bi-whatsapp"></i>
              </span>
              <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP / WhatsApp" required>
            </div>

            <!-- Username -->
            <div class="mb-3 input-group">
              <span class="input-group-text">
                <i class="bi bi-person-badge"></i>
              </span>
              <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>

            <!-- Password + Eye -->
            <div class="mb-3 input-group">
              <span class="input-group-text">
                <i class="bi bi-lock"></i>
              </span>
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

              <span class="input-group-text" style="cursor:pointer" onclick="togglePassword()">
                <i id="eyeIcon" class="bi bi-eye"></i>
              </span>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Daftar</button>
            </div>

            <p class="text-center mt-3">
              Sudah punya akun? <a href="Login.php">Login di sini</a>
            </p>

          </form>
          <!-- ===== END FORM ===== -->

        </div>
      </div>

    </div>
  </div>
</div>

</div>


<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Eye Password Script -->
<script>
function togglePassword(){
  const pass = document.getElementById("password");
  const eye  = document.getElementById("eyeIcon");

  if(pass.type === "password"){
    pass.type = "text";
    eye.classList.replace("bi-eye","bi-eye-slash");
  }else{
    pass.type = "password";
    eye.classList.replace("bi-eye-slash","bi-eye");
  }
}
</script>

</body>
</html>

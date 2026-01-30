<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Wadinmore Wedding Organizer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { padding-top: 70px; } /* untuk navbar fixed */
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="text-center mb-4">Login User</h2>
          <p class="text-center mb-4">Masuk untuk melakukan booking paket Wadinmore</p>

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

        </div>
      </div>
    </div>
  </div>
</div>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

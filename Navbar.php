<?php
session_start();
?>
<!DOCTYPE html>
<html>


<!-- ===== GOOGLE FONT (Wedding Elegant) ===== -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<!-- ===== NAVBAR STYLE ===== -->
<style>

body {
  font-family: 'Poppins', sans-serif;
}

/* Navbar glass + smooth */
.navbar {
  backdrop-filter: blur(8px);
  background: rgba(255,255,255,0.95) !important;
  transition: all 0.3s ease;
  padding-top: 12px;
  padding-bottom: 12px;
}

/* Brand wedding font */
.navbar-brand {
  font-family: 'Playfair Display', serif;
  font-size: 26px;
  letter-spacing: 1px;
  color: #b76e79 !important; /* rose gold */
}

/* Nav link style */
.nav-link {
  font-weight: 500;
  color: #333 !important;
  position: relative;
  margin-left: 10px;
  transition: 0.3s;
}

/* Underline hover animation */
.nav-link::after {
  content: "";
  position: absolute;
  width: 0;
  height: 2px;
  bottom: -2px;
  left: 0;
  background: #b76e79;
  transition: 0.3s;
}

.nav-link:hover::after {
  width: 100%;
}

/* Paket button */
.btn-outline-primary {
  border-radius: 25px;
  padding: 6px 18px;
  border-color: #b76e79;
  color: #b76e79;
}

.btn-outline-primary:hover {
  background: #b76e79;
  color: white;
}

/* User badge */
.user-badge {
  background: #f8f0f2;
  padding: 6px 14px;
  border-radius: 20px;
  font-size: 14px;
  margin-left: 15px;
}

/* Logout button */
.btn-logout {
  border-radius: 20px;
  padding: 5px 14px;
}

/* Mobile spacing */
@media (max-width: 991px){
  .user-badge,
  .btn-logout{
    margin-top: 10px;
  }
}

</style>



<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg shadow-sm fixed-top">
  <div class="container">

    <!-- BRAND -->
    <a class="navbar-brand fw-bold" href="#home">Wadinmore</a>

    <!-- TOGGLER -->
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- MENU -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">

        <!-- TETAP SAMA (tidak diubah) -->
        <li class="nav-item">
          <a class="nav-link active" href="#">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#gallery">Gallery</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#testimoni">Testimoni</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="Booking.php">Booking</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="#">logout</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-primary ms-lg-3" href="Paket.php">
            Paket
          </a>
        </li>


        <!-- ===== TAMBAHAN USER LOGIN (tidak ganggu alur lama) ===== -->
        <?php if(isset($_SESSION['username'])): ?>

          <li class="nav-item user-badge">
            👤 <?= $_SESSION['username']; ?>
          </li>

          <li class="nav-item">
            <a class="btn btn-danger btn-sm btn-logout ms-2" href="logout.php">
              Logout
            </a>
          </li>

        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
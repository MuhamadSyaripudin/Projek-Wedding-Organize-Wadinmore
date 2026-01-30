<!DOCTYPE html>
<html>

<!-- ===== GOOGLE FONT (Wedding Elegant) ===== -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<!-- ===== BOOTSTRAP ICON ===== -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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
  color: #b76e79 !important;
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

/* ===== Logout icon (NEW elegant style) ===== */
.logout-icon {
  font-size: 20px;
  color: #b76e79 !important;
  margin-left: 10px;
  transition: 0.3s;
}

.logout-icon:hover {
  transform: scale(1.25);
  color: #9c4f5c !important;
}

/* Mobile spacing */
@media (max-width: 991px){
  .user-badge,
  .logout-icon{
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
          <a class="btn btn-outline-primary ms-lg-3" href="Paket.php">
            Paket
          </a>
        </li>


        <!-- ===== LOGIN USER (TETAP SAMA LOGIC NYA) ===== -->
        <?php if(isset($_SESSION['username'])): ?>

          <li class="nav-item user-badge">
            👤 <?= $_SESSION['username']; ?>
          </li>

          <!-- Logout icon only -->
          <li class="nav-item">
            <a href="logout.php" class="nav-link logout-icon" title="Logout">
              <i class="bi bi-box-arrow-right"></i>
            </a>
          </li>

        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
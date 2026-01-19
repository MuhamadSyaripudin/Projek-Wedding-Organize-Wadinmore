<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Wadinmore Wedding Organizer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >

  <style>
    .hero {
      background: linear-gradient(
          rgba(0, 0, 0, 0.5),
          rgba(0, 0, 0, 0.5)
        ),
        url("https://images.unsplash.com/photo-1523438885200-e635ba2c371e");
      background-size: cover;
      background-position: center;
      height: 90vh;
      color: white;
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Wadinmore</a>

    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        <li class="nav-item">
          <a class="btn btn-outline-primary ms-lg-3" href="Paket.php">
            Paket
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- HERO SECTION -->
<section class="hero d-flex align-items-center text-center">
  <div class="container">
    <h1 class="display-4 fw-bold">Wujudkan Pernikahan Impianmu</h1>
    <p class="lead my-4">
      Wadinmore Wedding Organizer siap mendampingi hari bahagia Anda
    </p>
    <a href="Paket.php" class="btn btn-primary btn-lg">
      Lihat Paket
    </a>
  </div>
</section>

<!-- ABOUT -->
<section id="about" class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h2 class="fw-bold mb-3">Tentang Wadinmore</h2>
        <p>
          Wadinmore adalah sebuah Wedding Organizer (WO) yang bergerak dalam penyedia jasa pernikahan profesional
          yang berfokus pada detail, kreativitas, dan kepuasan klien.
          Wadinmore hadir untuk membantu pasangan calon pengantin dalam merencanakan, mengatur dan menjalankan seluruh rangkaian acara pernikahan agar berjalan lancar
          dengan konsep yang elegan dan berkesan.
        </p>
      </div>
      <div class="col-md-6">
        <img
          src="https://images.unsplash.com/photo-1519741497674-611481863552"
          class="img-fluid rounded"
          alt="Wedding"
        >
      </div>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section id="services" class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Layanan Kami</h2>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Dekorasi</h5>
            <p class="card-text">
              Menata dan menciptakan suasana pernikahan sesuai tema agar tampil elegan dan berkesan.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Catering</h5>
            <p class="card-text">
              Menyediakan hidangan berkualitas yang disesuaikan dengan kebutuhan dan selera tamu undangan.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Photografer</h5>
            <p class="card-text">
              Mengabadikan momen penting pernikahan secara profesional sebagai kenangan berharga.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">MUA & Attire</h5>
            <p class="card-text">
              Menyiapkan riasan dan busana pengantin agar tampil percaya diri dan sempurna di hari istimewa.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Upacara Adat</h5>
            <p class="card-text">
              Membantu pelaksanaan prosesi pernikahan sesuai adat dan tradisi yang dipilih.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Venue</h5>
            <p class="card-text">
              Menyediakan dan mengoordinasikan lokasi pernikahan yang sesuai dengan konsep acara.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Placeholder FE sementara untuk Testimoni
$status_booking = "Pending"; // Pending / Completed
$testimoni_list = [
  ['nama_user' => 'Nadia & Rafi', 'pesan' => 'Wadinmore membuat hari pernikahan kami sempurna! Semua berjalan lancar dan dekorasi fantastis.'],
  ['nama_user' => 'Andi & Sinta', 'pesan' => 'Pelayanan profesional dan ramah. Catering enak, photografer handal.'],
  ['nama_user' => 'Lina & Budi', 'pesan' => 'Super puas dengan konsep yang sesuai keinginan. Highly recommended!']
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Wadinmore Wedding Organizer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .hero {
      background: linear-gradient(rgba(0, 0, 0, 0.5),
          rgba(0, 0, 0, 0.5)),
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
  <?php include 'navbar.php'; ?>

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
            Wadinmore adalah sebuah Wedding Organizer (WO) yang bergerak dalam penyedia jasa pernikahan
            profesional
            yang berfokus pada detail, kreativitas, dan kepuasan klien.
            Wadinmore hadir untuk membantu pasangan calon pengantin dalam merencanakan, mengatur dan
            menjalankan seluruh rangkaian acara pernikahan agar berjalan lancar
            dengan konsep yang elegan dan berkesan.
          </p>
        </div>
        <div class="col-md-6">
          <img src="https://images.unsplash.com/photo-1519741497674-611481863552" class="img-fluid rounded"
            alt="Wedding">
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
                Menyediakan hidangan berkualitas yang disesuaikan dengan kebutuhan dan selera tamu
                undangan.
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
                Menyiapkan riasan dan busana pengantin agar tampil percaya diri dan sempurna di hari
                istimewa.
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

  <!-- GALLERY SLIDER -->
  <section id="gallery" class="bg-light py-5">
    <div class="container">
      <h2 class="fw-bold text-center mb-4">Gallery</h2>

      <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

          <!-- SLIDE 1 -->
          <div class="carousel-item active">
            <div class="row g-4 justify-content-center">
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="gallery-item">
                  <img src="galeri2/WO1.jpg" class="img-fluid" alt="Gal1">
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="gallery-item">
                  <img src="galeri2/WO2.jpg" class="img-fluid" alt="Gal2">
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="gallery-item">
                  <img src="galeri2/WO3.jpg" class="img-fluid" alt="Gal3">
                </div>
              </div>
            </div>
          </div>

          <!-- SLIDE 2 -->
          <div class="carousel-item">
            <div class="row g-4 justify-content-center">
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="gallery-item">
                  <img src="galeri2/WO4.png" class="img-fluid" alt="Gal4">
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="gallery-item">
                  <img src="galeri2/MUA1.jpg" class="img-fluid" alt="Gal5">
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="gallery-item">
                  <img src="galeri2/WO5.png" class="img-fluid" alt="Gal6">
                </div>
              </div>
            </div>
          </div>

          <!-- SLIDE 3 -->
          <div class="carousel-item">
            <div class="row g-4 justify-content-center">
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="gallery-item">
                  <img src="galeri2/PW1.jpg" class="img-fluid" alt="Gal7">
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="gallery-item">
                  <img src="galeri2/PRE2.jpg" class="img-fluid" alt="Gal8">
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="gallery-item">
                  <img src="galeri2/MUA2.jpg" class="img-fluid" alt="Gal9">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- NAVIGATION -->
        <button class="carousel-control-prev custom-arrow" type="button" data-bs-target="#galleryCarousel"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next custom-arrow" type="button" data-bs-target="#galleryCarousel"
          data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
  </section>

  <!-- TESTIMONI -->
  <section id="testimoni" class="bg-white py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-5">Apa Kata Klien Kami</h2>
      <div class="row g-4">
        <?php foreach ($testimoni_list as $t): ?>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body">
                <p class="card-text"><?php echo $t['pesan']; ?></p>
                <h6 class="fw-bold mb-0">– <?php echo $t['nama_user']; ?></h6>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Form Input Testimoni (hanya user Completed) -->
  <?php if ($status_booking === "Completed"): ?>
    <div class="mt-5">
      <h4 class="fw-bold mb-3">Tinggalkan Testimoni Anda, <?php echo $nama_user; ?></h4>
      <form action="proses_testimoni.php" method="post">
        <div class="mb-3">
          <label class="form-label">Pesan</label>
          <textarea name="pesan" class="form-control" rows="3" required></textarea>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-success">Kirim Testimoni</button>
        </div>
      </form>
    </div>
  <?php else: ?>
    <p class="text-center mt-4 text-muted">
      Testimoni dapat diberikan setelah acara selesai.
    </p>
  <?php endif; ?>

  <!-- CONTACT -->
  <section id="contact" class="py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-4">Contact</h2>
      <p>Email: wadinmore@gmail.com</p>
      <p>Telp: 08xxxxxxxxxx</p>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
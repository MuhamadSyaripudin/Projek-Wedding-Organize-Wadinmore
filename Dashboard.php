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

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- Google Font Wedding -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<style>

/* ================= GLOBAL ================= */
body{
  font-family:'Poppins',sans-serif;
  scroll-behavior:smooth;
}

/* ===== Wedding Color Palette ===== */
:root{
  --rose:#b76e79;
  --gold:#d4af37;
  --soft:#f8f0f2;
  --cream:#fffaf7;
}

/* ================= SECTION TITLE (MEWAH) ================= */
.section-title{
  font-family:'Playfair Display',serif;
  font-weight:700;
  font-size:42px;
  color:var(--rose);
  letter-spacing:1px;
  position:relative;
  display:inline-block;
  margin-bottom:55px;
  text-shadow:0 2px 8px rgba(183,110,121,.15);
}

.section-title::after{
  content:"";
  display:block;
  width:85px;
  height:3px;
  background:linear-gradient(90deg,var(--rose),var(--gold));
  margin:12px auto 0;
  border-radius:10px;
}

/* ================= HERO ================= */
/* ================= HERO PREMIUM WEDDING ================= */
.hero {
  background:
    linear-gradient(rgba(0,0,0,.45), rgba(0,0,0,.45)),
    url("https://images.unsplash.com/photo-1523438885200-e635ba2c371e");

  background-size:cover;
  background-position:center;
  background-attachment:fixed; /* parallax */

  height:95vh;

  color:white;
  position:relative;
}

.hero h1{
  font-family:'Playfair Display', serif;
  font-size:56px;
  letter-spacing:1.5px;
  text-shadow:0 6px 25px rgba(0,0,0,.55);
}

.hero p{
  font-size:20px;
  font-weight:300;
  text-shadow:0 3px 15px rgba(0,0,0,.45);
}

/* ================= HERO BUTTON WEDDING ================= */
.hero .btn-primary{
  background:linear-gradient(135deg,var(--rose),var(--gold));
  border:none;
  border-radius:35px;
  padding:12px 38px;
  font-weight:600;
  letter-spacing:.5px;
  font-size:17px;
  box-shadow:0 8px 25px rgba(183,110,121,.4);
  transition:.3s;
}

.hero .btn-primary:hover{
  transform:translateY(-3px);
  box-shadow:0 15px 35px rgba(183,110,121,.6);
}


/* ================= GRADIENT SECTION BACKGROUNDS ================= */
#about{
  background:linear-gradient(to bottom,#fff,var(--cream));
}

#services{
  background:linear-gradient(to bottom,var(--cream),var(--soft));
}

#gallery{
  background:linear-gradient(to bottom,var(--soft),#fff);
}

#testimoni{
  background:linear-gradient(to bottom,#fff,var(--cream));
}

/* ================= SERVICES CARD ================= */
#services .card{
  border:none;
  border-radius:20px;
  transition:.35s;
  padding:15px;
}

#services .card:hover{
  transform:translateY(-10px);
  box-shadow:0 20px 45px rgba(183,110,121,.25);
}

#services .card-title{
  color:var(--rose);
  font-weight:600;
}

.service-icon{
  width:65px;
  height:65px;
  border-radius:50%;
  background:var(--soft);
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:28px;
  margin:0 auto 15px;
  color:var(--rose);
}

/* ================= GALLERY ================= */
#gallery img{
  border-radius:18px;
  transition:.4s;
  cursor:pointer;
}

#gallery img:hover{
  transform:scale(1.07);
  box-shadow:0 20px 45px rgba(0,0,0,.25);
}

/* ================= TESTIMONI ================= */
#testimoni .card{
  border:none;
  border-radius:20px;
  padding:25px;
  position:relative;
  transition:.35s;
}

#testimoni .card:hover{
  transform:translateY(-8px);
  box-shadow:0 20px 40px rgba(183,110,121,.25);
}

#testimoni .card::before{
  content:"“";
  position:absolute;
  top:-25px;
  left:20px;
  font-size:90px;
  color:rgba(183,110,121,.15);
  font-family:serif;
}

#testimoni h6{
  color:var(--rose);
  margin-top:15px;
}

/* ================= SCROLL FADE ANIMATION ================= */
.fade-section{
  opacity:0;
  transform:translateY(40px);
  transition:all .8s ease;
}

.fade-section.show{
  opacity:1;
  transform:translateY(0);
}

</style>
</head>

<body>

<?php include 'navbar.php'; ?>

<!-- HERO -->
<section class="hero d-flex align-items-center text-center">
  <div class="container">
    <h1 class="display-4 fw-bold">Wujudkan Pernikahan Impianmu</h1>
    <p class="lead my-4">Wadinmore Wedding Organizer siap mendampingi hari bahagia Anda</p>
    <a href="Paket.php" class="btn btn-primary btn-lg">Lihat Paket</a>
  </div>
</section>


<!-- ABOUT -->
<section id="about" class="py-5 fade-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h2 class="section-title">Tentang Wadinmore</h2>
        <p>
          Wadinmore adalah sebuah Wedding Organizer (WO) yang bergerak dalam penyedia jasa pernikahan profesional
          yang berfokus pada detail, kreativitas, dan kepuasan klien.
          Wadinmore hadir untuk membantu pasangan calon pengantin dalam merencanakan, mengatur dan menjalankan seluruh rangkaian acara pernikahan agar berjalan lancar
          dengan konsep yang elegan dan berkesan.
        </p>
      </div>
      <div class="col-md-6">
        <img src="https://images.unsplash.com/photo-1519741497674-611481863552"
             class="img-fluid rounded" alt="Wedding">
      </div>
    </div>
  </section>

<!-- SERVICES -->
<section id="services" class="py-5 text-center fade-section">
  <div class="container">
    <h2 class="section-title">Layanan Kami</h2>

    <div class="row g-4">

      <?php
      $services = [
        ["bi-flower1","Dekorasi","Menata suasana pernikahan sesuai tema agar elegan dan berkesan."],
        ["bi-cup-straw","Catering","Hidangan berkualitas sesuai kebutuhan tamu undangan."],
        ["bi-camera","Photografer","Mengabadikan momen penting secara profesional."],
        ["bi-stars","MUA & Attire","Riasan dan busana pengantin yang sempurna."],
        ["bi-heart","Upacara Adat","Pelaksanaan prosesi sesuai adat dan tradisi."],
        ["bi-building","Venue","Lokasi pernikahan sesuai konsep acara."]
      ];

      foreach($services as $s):
      ?>
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <div class="service-icon">
              <i class="bi <?= $s[0] ?>"></i>
            </div>
            <h5 class="card-title"><?= $s[1] ?></h5>
            <p><?= $s[2] ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
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
<section id="testimoni" class="py-5 text-center fade-section">
  <div class="container">
    <h2 class="section-title">Apa Kata Klien Kami</h2>

    <div class="row g-4">
      <?php foreach($testimoni_list as $t): ?>
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <p><?= $t['pesan']; ?></p>
            <h6>– <?= $t['nama_user']; ?></h6>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- CONTACT -->
<section id="contact" class="py-5 text-center">
  <h2 class="section-title">Contact</h2>
  <p>Email: wadinmore@gmail.com</p>
  <p>Telp: 08xxxxxxxxxx</p>
</section>


<!-- Scroll Fade Script -->
<script>
const observer = new IntersectionObserver(entries=>{
  entries.forEach(entry=>{
    if(entry.isIntersecting){
      entry.target.classList.add('show');
    }
  });
});

document.querySelectorAll('.fade-section').forEach(el=>{
  observer.observe(el);
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
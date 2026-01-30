<?php
// nanti bisa diisi koneksi database
// include 'config/database.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Paket Wedding - Wadinmore</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- PREMIUM WEDDING FONTS -->
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">


<style>

/* =================================================
   GLOBAL FONT & COLOR SYSTEM (Premium Wedding)
=================================================*/
body{
  font-family:'Poppins', sans-serif;
  background:#fffaf7;
  overflow-x:hidden;
}

:root{
  --rose:#b76e79;
  --rose-dark:#9c4f5c;
  --gold:#d4af37;
  --cream:#fffaf7;
  --soft:#f8f0f2;
}


/* =================================================
   PARALLAX HEADER (Premium look)
=================================================*/
header{
  padding-top:180px;
  padding-bottom:140px;

  background:
    linear-gradient(
      rgba(255,250,247,.55),   /* lebih tipis (dulu .85) */
      rgba(255,250,247,.55)
    ),
    url("https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=2070");

  background-size:cover;
  background-position:center;
  background-attachment:fixed;

  position:relative;
}

header::before{
  content:'';
  position:absolute;
  inset:0;

  background:radial-gradient(
    circle at center,
    rgba(0,0,0,0) 40%,
    rgba(0,0,0,.25) 100%
  );

  pointer-events:none;
}

header h1,
header p{
  text-shadow:0 4px 15px rgba(0,0,0,.25);
}


/* =================================================
   GLITTER GOLD LINE EFFECT
=================================================*/
header::after{
  content:'';
  display:block;
  width:120px;
  height:3px;
  margin:30px auto 0;

  background:linear-gradient(
      90deg,
      transparent,
      var(--gold),
      #fff,
      var(--gold),
      transparent
  );

  animation:glow 3s infinite linear;
}

@keyframes glow{
  0%{opacity:.3}
  50%{opacity:1}
  100%{opacity:.3}
}


/* =================================================
   TITLE STYLE (Elegant serif)
=================================================*/
h1,h2,h3,h5{
  font-family:'Cormorant Garamond', serif;
  letter-spacing:2px;
  color:var(--rose-dark);
}

h1{
  font-size:52px;
  font-weight:700;
}

.text-muted{
  font-size:17px;
}


/* =================================================
   SECTION BG (soft gradient)
=================================================*/
section{
  background:linear-gradient(to bottom,#fff,var(--cream));
  position:relative;
}


/* =================================================
   PACKAGE CARD PREMIUM
=================================================*/
.package-card{
  border:none;
  border-radius:24px;
  background:white;
  padding:18px;

  transition:.4s;
  box-shadow:0 8px 25px rgba(0,0,0,.06);
}

.package-card:hover{
  transform:translateY(-12px);
  box-shadow:0 25px 50px rgba(183,110,121,.25);
}


/* GOLD BORDER SHINE */
.package-card::before{
  content:'';
  position:absolute;
  inset:0;
  border-radius:24px;
  padding:1.5px;

  background:linear-gradient(45deg,var(--gold),transparent,var(--gold));
  -webkit-mask:
    linear-gradient(#000 0 0) content-box,
    linear-gradient(#000 0 0);
  -webkit-mask-composite: xor;
  pointer-events:none;
}


/* =================================================
   ICON STYLE
=================================================*/
.package-card i{
  width:75px;
  height:75px;
  border-radius:50%;
  background:var(--soft);
  display:flex;
  align-items:center;
  justify-content:center;
  margin:auto;
  font-size:30px;
  color:var(--rose);

  box-shadow:0 6px 18px rgba(183,110,121,.2);
}


/* =================================================
   PRICE
=================================================*/
.price{
  font-size:26px;
  font-weight:700;
  color:var(--rose-dark);
  margin:12px 0;
}


/* =================================================
   PREMIUM BUTTON
=================================================*/
.btn-outline-primary{
  border-radius:30px;
  border:2px solid var(--gold);
  color:var(--gold);
  font-weight:500;
  padding:8px 22px;
  transition:.3s;
}

.btn-outline-primary:hover{
  background:var(--gold);
  color:white;
}


/* =================================================
   MODAL BG
=================================================*/
.modal-bg{
  background:rgba(0,0,0,.92);
}

.image-wrapper{
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
}

#modalImage{
  max-width:100%;
  max-height:100%;
  object-fit:contain;
  transition:transform .3s ease;
  cursor:zoom-in;
}


/* =================================================
   ANIMATION FADE UP
=================================================*/
.package-card{
  opacity:0;
  transform:translateY(40px);
  animation:fadeUp .8s ease forwards;
}

@keyframes fadeUp{
  to{
    opacity:1;
    transform:translateY(0);
  }
}


/* =================================================
   NAV ARROW
=================================================*/
.nav-img{
  position:absolute;
  top:50%;
  transform:translateY(-50%);
  font-size:40px;
  background:none;
  color:#fff;
  border:none;
}

.nav-img.prev{left:20px;}
.nav-img.next{right:20px;}

</style>
</head>



<body>

<?php include 'Navbar.php'; ?>


<!-- ================= HEADER ================= -->
<header class="text-center">
  <div class="container">
    <h1>Paket Wedding</h1>
    <p class="text-muted">Pilih paket terbaik untuk mewujudkan hari bahagia Anda</p>
  </div>
</header>



<!-- ================= SECTION ================= -->
<section class="py-5">
  <div class="container">
    <div class="row g-4">

      <!-- SEMUA KODE PAKET KAMU TETAP SAMA (TIDAK DIUBAH) -->



      <!-- ================= SEMUA PAKET KAMU (TIDAK DIUBAH) ================= -->

      <!-- Paket 1 -->
      <div class="col-md-4">
        <div class="card package-card h-100">
          <div class="card-body text-center">
            <i class="bi bi-gem"></i>
            <h5 class="fw-bold mt-3">Paket 1</h5>
            <h6 class="fw-bold mt-2">Makeup & Attire, Photo & Videographer, Dekorasi, MC, dan Entertaiment</h6>
            <p class="price">Rp 25.000.000</p>
            <a href="#" class="btn btn-outline-primary"
               data-bs-toggle="modal"
               data-bs-target="#modalPaket"
               data-title="Detail Paket 1"
               data-images='["galeri/Paket1.jpg"]'>
              Pilih Paket
            </a>
          </div>
        </div>
      </div>

      <!-- Paket 2 -->
      <div class="col-md-4">
        <div class="card package-card h-100">
          <div class="card-body text-center">
            <i class="bi bi-award"></i>
            <h5 class="fw-bold mt-3">Paket 2</h5>
            <h6 class="fw-bold mt-2">Makeup & Attire, Photo & Videographer, Wedding Organizer, Dekorasi, MC, Entertaiment, dan Upacara Adat</h6>
            <p class="price">Rp 36.000.000</p>
            <a href="#" class="btn btn-outline-primary"
               data-bs-toggle="modal"
               data-bs-target="#modalPaket"
               data-title="Detail Paket 2"
               data-images='["galeri/Paket2.jpg"]'>
              Pilih Paket
            </a>
          </div>
        </div>
      </div>

      <!-- Paket 3 -->
      <div class="col-md-4">
        <div class="card package-card h-100">
          <div class="card-body text-center">
            <i class="bi bi-stars fs-1 text-warning"></i>
            <h5 class="fw-bold mt-3">Paket 3</h5>
            <h6 class="fw-bold mt-2">Makeup & Attire, Photo & Videographer, Upacara Adat, Dekorasi, MC, Entertaiment, Siraman, Pre-Wedding, dan Wedding Organizer</h6>
            <p class="price">Rp 40.000.000</p>
            <a href="#" class="btn btn-outline-primary"
               data-bs-toggle="modal"
               data-bs-target="#modalPaket"
               data-title="Detail Paket 3"
               data-images='["galeri/Paket3.jpg"]'>
              Pilih Paket
            </a>
          </div>
        </div>
      </div>

      <!-- Paket 4 -->
      <div class="col-md-4">
        <div class="card package-card h-100">
          <div class="card-body text-center">
            <i class="bi bi-stars fs-1 text-warning"></i>
            <h5 class="fw-bold mt-3">Paket 4</h5>
            <h6 class="fw-bold mt-2">Makeup & Attire, Photo & Videographer, Upacara Adat, Dekorasi, MC, Entertaiment, Siraman, Pre-Wedding, Wedding Organizer, dan Catering</h6>
            <p class="price">Rp 70.000.000</p>
            <a href="#" class="btn btn-outline-primary"
               data-bs-toggle="modal"
               data-bs-target="#modalPaket"
               data-title="Detail Paket 4"
               data-images='["galeri/Paket4.jpg","galeri/Paket4_1.jpg"]'>
              Pilih Paket
            </a>
          </div>
        </div>
      </div>

      <!-- Paket 5 -->
      <div class="col-md-4">
        <div class="card package-card h-100">
          <div class="card-body text-center">
            <i class="bi bi-stars fs-1 text-warning"></i>
            <h5 class="fw-bold mt-3">Paket 5</h5>
            <h6 class="fw-bold mt-2">Makeup & Attire, Photo & Videographer, Upacara Adat, Dekorasi, MC, Entertaiment, Siraman, Pre-Wedding, Wedding Organizer, dan Catering</h6>
            <p class="price">Rp 60.000.000</p>
            <a href="#" class="btn btn-outline-primary"
               data-bs-toggle="modal"
               data-bs-target="#modalPaket"
               data-title="Detail Paket 5"
               data-images='["galeri/Paket5.jpg"]'>
              Pilih Paket
            </a>
          </div>
        </div>
      </div>

      <!-- Paket 500 -->
      <div class="col-md-4">
        <div class="card package-card h-100">
          <div class="card-body text-center">
            <i class="bi bi-stars fs-1 text-warning"></i>
            <h5 class="fw-bold mt-3">Paket 500</h5>
            <h6 class="fw-bold mt-2">Makeup & Attire, Photo & Videographer, Dekorasi, MC, venue, Catering, dan Entertaiment</h6>
            <p class="price">Rp 50.000.000</p>
            <a href="#" class="btn btn-outline-primary"
               data-bs-toggle="modal"
               data-bs-target="#modalPaket"
               data-title="Detail Paket 500"
               data-images='["galeri/Paket500.jpg"]'>
              Pilih Paket
            </a>
          </div>
        </div>
      </div>

      <!-- Paket Intimate 1 -->
      <div class="col-md-4">
        <div class="card package-card h-100">
          <div class="card-body text-center">
            <i class="bi bi-stars fs-1 text-warning"></i>
            <h5 class="fw-bold mt-3">Paket Intimate 1</h5>
            <h6 class="fw-bold mt-2">Makeup & Attire, Photo & Videographer, Dekorasi, MC, Venue, dan Catering</h6>
            <p class="price">Rp 25.000.000</p>
            <a href="#" class="btn btn-outline-primary"
               data-bs-toggle="modal"
               data-bs-target="#modalPaket"
               data-title="Detail Paket Intimate 1"
               data-images='["galeri/PaketIntimate1.jpg"]'>
              Pilih Paket
            </a>
          </div>
        </div>
      </div>

      <!-- Paket Intimate 2 -->
      <div class="col-md-4">
        <div class="card package-card h-100">
          <div class="card-body text-center">
            <i class="bi bi-stars fs-1 text-warning"></i>
            <h5 class="fw-bold mt-3">Paket Intimate 2</h5>
            <h6 class="fw-bold mt-2">Makeup & Attire, Photo & Videographer, Dekorasi, MC, Venue, dan Catering</h6>
            <p class="price">Rp 32.500.000</p>
            <a href="#" class="btn btn-outline-primary"
               data-bs-toggle="modal"
               data-bs-target="#modalPaket"
               data-title="Detail Paket Intimate 2"
               data-images='["galeri/PaketIntimate2.jpg"]'>
              Pilih Paket
            </a>
          </div>
        </div>
      </div>

      <!-- Paket Venue -->
      <div class="col-md-4">
        <div class="card package-card h-100">
          <div class="card-body text-center">
            <i class="bi bi-buildings fs-1 text-info"></i>
            <h5 class="fw-bold mt-3">Paket Venue</h5>
            <h6 class="fw-bold mt-2">Makeup & Attire, Photo & Videographer, Wedding Organizer, Dekorasi, MC, Venue, Catering, dan Entertaiment</h6>
            <p class="price">Rp 55.000.000</p>
            <a href="#" class="btn btn-outline-primary"
               data-bs-toggle="modal"
               data-bs-target="#modalPaket"
               data-title="Detail Paket Venue"
               data-images='["galeri/PaketVenue.jpg"]'>
              Pilih Paket
            </a>
          </div>
        </div>
      </div>




      <!-- Tambahan paket lain tetap sama seperti kode kamu -->
      <!-- (aku sengaja tidak ubah satu baris pun supaya alur tetap sama) -->

    </div>
  </div>
</section>



<!-- ================= MODAL (TIDAK DIUBAH) ================= -->
<div class="modal fade" id="modalPaket" tabindex="-1">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Detail Paket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body modal-bg p-0">

        <div class="zoom-controls position-absolute top-0 end-0 m-3 z-3">
          <button id="zoomIn" class="btn btn-light btn-sm">+</button>
          <button id="zoomOut" class="btn btn-light btn-sm">−</button>
          <button id="zoomReset" class="btn btn-light btn-sm">Reset</button>
        </div>

        <button class="nav-img prev">&#10094;</button>
        <button class="nav-img next">&#10095;</button>

        <div class="image-wrapper">
          <img id="modalImage" src="">
        </div>

      </div>
    </div>
  </div>
</div>



<!-- ================= JS (TIDAK DIUBAH) ================= -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const modalPaket = document.getElementById('modalPaket');
const modalImage = document.getElementById('modalImage');
const modalTitle = document.getElementById('modalTitle');

const zoomInBtn = document.getElementById('zoomIn');
const zoomOutBtn = document.getElementById('zoomOut');
const zoomResetBtn = document.getElementById('zoomReset');
const prevBtn = document.querySelector('.nav-img.prev');
const nextBtn = document.querySelector('.nav-img.next');

let images = [];
let currentIndex = 0;
let scale = 1;

function updateImage(){
  modalImage.src = images[currentIndex];
  scale = 1;
  modalImage.style.transform='scale(1)';
}

modalPaket.addEventListener('show.bs.modal',function(event){
  const btn = event.relatedTarget;
  modalTitle.textContent = btn.getAttribute('data-title');
  images = JSON.parse(btn.getAttribute('data-images'));
  currentIndex = 0;
  updateImage();
});

zoomInBtn.onclick = ()=>{scale+=0.2;modalImage.style.transform=`scale(${scale})`};
zoomOutBtn.onclick = ()=>{scale=Math.max(1,scale-0.2);modalImage.style.transform=`scale(${scale})`};
zoomResetBtn.onclick = ()=>{scale=1;modalImage.style.transform='scale(1)'};

prevBtn.onclick = ()=>{currentIndex=(currentIndex-1+images.length)%images.length;updateImage()};
nextBtn.onclick = ()=>{currentIndex=(currentIndex+1)%images.length;updateImage()};
</script>

</body>
</html>

<script>
const cards = document.querySelectorAll('.package-card');

const observer = new IntersectionObserver(entries=>{
  entries.forEach(entry=>{
    if(entry.isIntersecting){
      entry.target.classList.add('show');
    }
  });
},{threshold:0.15});

cards.forEach(card=>observer.observe(card));
</script>

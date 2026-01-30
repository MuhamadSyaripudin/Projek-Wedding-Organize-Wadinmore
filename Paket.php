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

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .package-card {
      border: none;
      border-radius: 18px;
      transition: all 0.3s ease;
    }

    .package-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 18px 35px rgba(0,0,0,0.12);
    }

    .price {
      font-size: 26px;
      font-weight: bold;
      color: #d63384;
    }

    /* Background ARGB (hitam transparan) */
    /* Background ARGB */
    .modal-bg {
    background: rgba(0, 0, 0, 0.85);
    position: relative;
    overflow: hidden;
    }

    /* Image wrapper */
    .image-wrapper {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    /* Image */
    #modalImage {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
    cursor: zoom-in;
    }

    /* Zoom control */
    .zoom-controls {
    position: absolute;
    top: 15px;
    right: 20px;
    z-index: 10;
    }

    /* Navigation arrows */
    .nav-img {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 40px;
    background: none;
    color: #fff;
    border: none;
    cursor: pointer;
    z-index: 10;
    }

    .nav-img.prev { left: 20px; }
    .nav-img.next { right: 20px; }

  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="Dashboard.php">Wadinmore</a>
  </div>
</nav>

<!-- HEADER -->
<section class="py-5 text-center bg-light">
  <div class="container">
    <h1 class="fw-bold">Paket Wedding</h1>
    <p class="text-muted">Pilih paket terbaik untuk mewujudkan hari bahagia Anda</p>
  </div>
</section>

<!-- ================= PAKET ================= -->
<section class="py-5">
  <div class="container">
    <div class="row g-4">

      <!-- Paket 1 -->
      <div class="col-md-4">
        <div class="card package-card h-100">
          <div class="card-body text-center">
            <i class="bi bi-gem fs-1 text-secondary"></i>
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
        <div class="card package-card h-100 ">
          <div class="card-body text-center">
            <i class="bi bi-award fs-1 text-primary"></i>
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

    </div>
  </div>
</section>

<!-- ================= MODAL SATU SAJA ================= -->
<div class="modal fade" id="modalPaket" tabindex="-1">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Detail Paket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
        <div class="modal-body modal-bg p-0">

        <!-- CONTROL ZOOM -->
        <div class="zoom-controls">
            <button id="zoomIn" class="btn btn-light btn-sm">+</button>
            <button id="zoomOut" class="btn btn-light btn-sm">−</button>
            <button id="zoomReset" class="btn btn-light btn-sm">Reset</button>
        </div>

        <!-- NAVIGATION IMAGE -->
        <button class="nav-img prev">&#10094;</button>
        <button class="nav-img next">&#10095;</button>

        <div class="image-wrapper">
            <img id="modalImage" src="" alt="Detail Paket">
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Modal Dinamis -->
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

function updateImage() {
  modalImage.src = images[currentIndex];
  scale = 1;
  modalImage.style.transform = 'scale(1)';
}

modalPaket.addEventListener('show.bs.modal', function (event) {
  const btn = event.relatedTarget;
  modalTitle.textContent = btn.getAttribute('data-title');
  images = JSON.parse(btn.getAttribute('data-images'));
  currentIndex = 0;
  updateImage();
});

// Double click zoom
modalImage.addEventListener('dblclick', () => {
  scale = scale === 1 ? 1.8 : 1;
  modalImage.style.transform = `scale(${scale})`;
});

// Zoom buttons
zoomInBtn.onclick = () => { scale += 0.2; modalImage.style.transform = `scale(${scale})`; };
zoomOutBtn.onclick = () => { scale = Math.max(1, scale - 0.2); modalImage.style.transform = `scale(${scale})`; };
zoomResetBtn.onclick = () => { scale = 1; modalImage.style.transform = 'scale(1)'; };

// Navigation
prevBtn.onclick = () => { currentIndex = (currentIndex - 1 + images.length) % images.length; updateImage(); };
nextBtn.onclick = () => { currentIndex = (currentIndex + 1) % images.length; updateImage(); };
</script>
</body>
</html>

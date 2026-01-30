      <?php
      session_start();

      if (!isset($_SESSION['login'])) {
          header("Location: Login.php");
          exit;
      }

      $nama_user = $_SESSION['nama_lengkap'];
      ?>

      <!DOCTYPE html>
      <html lang="id">
      <head>
      <meta charset="UTF-8">
      <title>Booking - Wadinmore Wedding Organizer</title>
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
        padding-top:80px;
        min-height:100vh;

        background:
          linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)),
          url("https://images.unsplash.com/photo-1523438885200-e635ba2c371e");

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

      /* ================= TITLE ================= */
      .page-title{
        font-family:'Playfair Display', serif;
        font-size:42px;
        font-weight:700;
        color:white;
        text-align:center;
        text-shadow:0 5px 20px rgba(0,0,0,.5);
        margin-bottom:10px;
      }

      .subtitle{
        text-align:center;
        color:#eee;
        margin-bottom:35px;
      }

      /* ================= CARD ================= */
      .card{
        border:none;
        border-radius:28px;

        background:rgba(255,255,255,.95);
        backdrop-filter:blur(12px);

        box-shadow:0 25px 60px rgba(0,0,0,.35);

        animation:fadeUp .8s ease;
      }

      /* ================= LABEL ================= */
      .form-label{
        font-weight:500;
        color:var(--rose-dark);
      }

      /* ================= INPUT ================= */
      .form-control,
      .form-select{
        border-radius:14px;
        padding:11px;
        border:1px solid #eee;
      }

      .form-control:focus,
      .form-select:focus{
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

      .btn-success{
        border-radius:30px;
        font-weight:500;
      }

      /* ================= READONLY ================= */
      input[readonly]{
        background:var(--soft);
        font-weight:500;
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

      /* ================= FIX SELECT WEDDING COLOR ================= */

      /* normal */
      .form-select{
        border-radius:14px;
        border:1px solid #eee;
        background-color:#fff;
        color:#333;
      }

      /* focus (hilangkan biru bootstrap) */
      .form-select:focus{
        border-color: var(--rose) !important;
        box-shadow: 0 0 0 3px rgba(183,110,121,.25) !important;
      }

      /* dropdown arrow custom color */
      .form-select{
        background-image:
          linear-gradient(45deg, transparent 50%, var(--rose) 50%),
          linear-gradient(135deg, var(--rose) 50%, transparent 50%),
          linear-gradient(to right, #fff, #fff);
        background-position:
          calc(100% - 20px) calc(1.2em),
          calc(100% - 15px) calc(1.2em),
          100% 0;
        background-size:5px 5px, 5px 5px, 2.5em 2.5em;
        background-repeat:no-repeat;
      }

      /* option highlight (beberapa browser support) */
      .form-select option:checked{
        background: var(--rose);
        color:#fff;
      }

      /* hover */
      .form-select:hover{
        border-color: var(--rose-dark);
      }


      </style>
      </head>
      <body>

      <?php include 'navbar.php'; ?>


      <div class="container mt-4">

        <h1 class="page-title">Form Booking</h1>

        <p class="subtitle">
          Halo <strong><?= htmlspecialchars($nama_user); ?></strong>,  
          silakan isi form booking di bawah ini ✨
        </p>


        <div class="row justify-content-center">
          <div class="col-md-8">

            <div class="card shadow-sm">
              <div class="card-body p-4">

                <form action="proses_booking.php" method="post">

                  <!-- NAMA USER -->
                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input 
                      type="text" 
                      name="nama_user" 
                      class="form-control" 
                      value="<?= htmlspecialchars($nama_user); ?>" 
                      readonly
                    >
                  </div>

                  <!-- Paket -->
                  <div class="mb-3">
                    <label class="form-label">Paket</label>
                    <select name="nama_paket" id="paket" class="form-select" required>
                      <option value="">-- Pilih Paket --</option>
                      <option value="Paket1">Paket 1</option>
                      <option value="Paket2">Paket 2</option>
                      <option value="Paket3">Paket 3</option>
                      <option value="Paket4">Paket 4</option>
                      <option value="Paket5">Paket 5</option>
                      <option value="Paket500">Paket 500</option>
                      <option value="PaketIntimate1">Paket Intimate 1</option>
                      <option value="PaketIntimate2">Paket Intimate 2</option>
                      <option value="PaketVenue">Paket Venue</option>
                    </select>
                  </div>

                  <!-- Venue -->
                  <div id="venue-info" class="d-none;">
                    <div class="mb-3">
                      <label class="form-label">Venue</label>
                      <select id="venue-name" class="form-select"></select>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Kapasitas Maksimal</label>
                      <input type="text" id="venue-capacity" class="form-control" readonly>
                    </div>
                  </div>

                  <!-- Alamat -->
                  <div id="alamat-acara">
                    <div class="mb-3">
                      <label class="form-label">Alamat Acara</label>
                      <input type="text" name="alamat_acara" class="form-control">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Perkiraan Jumlah Tamu</label>
                      <input type="number" name="jumlah_tamu" class="form-control">
                    </div>
                  </div>

                  <!-- Tanggal -->
                  <div class="mb-3">
                    <label class="form-label">Tanggal Pernikahan</label>
                    <input type="date" name="tanggal_acara" class="form-control" required>
                  </div>

                  <!-- Catatan -->
                  <div class="mb-3">
                    <label class="form-label">Catatan Tambahan</label>
                    <textarea name="catatan" class="form-control" rows="3"></textarea>
                  </div>

                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                      <i class="bi bi-heart-fill me-2"></i> Kirim Booking
                    </button>
                  </div>

                </form>

                <div class="d-grid mt-3">
                  <a href="Status_Booking.php" class="btn btn-success">
                    Lihat Status Booking
                  </a>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>


      <!-- Bootstrap -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


      <!-- ===== JS LOGIC ASLI (TIDAK DIUBAH) ===== -->
      <script>
      const paketSelect   = document.getElementById('paket');
      const venueInfo     = document.getElementById('venue-info');
      const alamatAcara   = document.getElementById('alamat-acara');
      const venueName     = document.getElementById('venue-name');
      const venueCapacity = document.getElementById('venue-capacity');

      const venueData = {
        "Paket500":[{name:"Desofia Hotel Dago",capacity:"300 orang"}],
        "PaketIntimate1":[
          {name:"Mang Kabayan Resto",capacity:"200 orang"},
          {name:"Desofia Hotel Dago",capacity:"300 orang"}
        ],
        "PaketIntimate2":[
          {name:"Mang Kabayan Resto",capacity:"200 orang"},
          {name:"Desofia Hotel Dago",capacity:"300 orang"}
        ],
        "PaketVenue":[
          {name:"Cibabat Park",capacity:"200 orang"},
          {name:"Kiara Beat n Better",capacity:"300 orang"},
          {name:"Paku Haji",capacity:"300 orang"}
        ]
      };

      paketSelect.addEventListener('change', function () {
        const paket = this.value;

        if (venueData[paket]) {
          venueInfo.classList.remove('d-none');
          alamatAcara.classList.add('d-none');

          venueName.innerHTML = "";

          venueData[paket].forEach((v)=>{
            const option=document.createElement('option');
            option.value=v.name;
            option.textContent=v.name;
            option.dataset.capacity=v.capacity;
            venueName.appendChild(option);
          });

          venueCapacity.value=venueData[paket][0].capacity;
        } 
        else {
          venueInfo.classList.add('d-none');
          alamatAcara.classList.remove('d-none');
          venueName.innerHTML="";
          venueCapacity.value="";
        }
      });

      venueName.addEventListener('change', function () {
        const selected=this.options[this.selectedIndex];
        venueCapacity.value=selected.dataset.capacity;
      });
      </script>

      </body>
      </html>

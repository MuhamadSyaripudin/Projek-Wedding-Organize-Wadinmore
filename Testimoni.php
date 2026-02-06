    <?php
    session_start();
    include 'config/database.php';

    /* ================= QUERY (TIDAK DIUBAH) ================= */

    $qTestimoni = mysqli_query($conn, "
        SELECT nama_user, pesan
        FROM testimoni
        ORDER BY created_at DESC
    ");

    $testimoni_list = mysqli_fetch_all($qTestimoni, MYSQLI_ASSOC);

    $status_booking = null;
    $nama_user = null;

    if (isset($_SESSION['login']) && $_SESSION['role'] === 'user') {

        $id_user   = $_SESSION['user_id'];
        $nama_user = $_SESSION['nama_lengkap'];

        $qBooking = mysqli_query($conn, "
            SELECT status
            FROM bookings
            WHERE id_user = '$id_user'
            ORDER BY created_at DESC
            LIMIT 1
        ");

        $booking = mysqli_fetch_assoc($qBooking);
        $status_booking = $booking['status'] ?? null;
    }
    ?>

    <!DOCTYPE html>
    <html lang="id">
    <head>
    <meta charset="UTF-8">
    <title>Testimoni - Wadinmore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <style>

    /* =================================
      WADINMORE TESTIMONI – LUXURY STYLE
      SELARAS DENGAN STATUS BOOKING
      ================================= */

    :root{
      --rose:#ec7a98;
      --rose-dark:#d95c7e;
      --cream:#fffdfc;
      --text:#444;
    }

    /* ================= BODY ================= */
    body{
      padding-top:70px;
      font-family:'Poppins',sans-serif;

      background:
      radial-gradient(circle at top left,#f8dfe6,transparent 45%),
      radial-gradient(circle at bottom right,#f3e4c4,transparent 45%),
      linear-gradient(135deg,#f5f2f3,#efe8ea);
    }

    /* ================= TITLE ================= */
    h2{
      font-family:'Playfair Display',serif;
      font-weight:700;
      color:var(--rose-dark);
      letter-spacing:1px;
      text-shadow:0 6px 18px rgba(0,0,0,.1);
    }

    /* ================= TESTIMONI CARD ================= */
    .card{
      border:none;
      border-radius:28px;
      background:#ffffff;

      box-shadow:
      0 20px 40px rgba(0,0,0,.08),
      0 10px 25px rgba(236,122,152,.15);

      transition:.3s;
      height:100%;
    }

    /* hover glow */
    .card:hover{
      transform:translateY(-6px);
      background:#fff6f9;
      box-shadow:0 25px 55px rgba(236,122,152,.30);
    }

    /* isi pesan */
    .card-text{
      color:#555;
      font-size:14px;
      line-height:1.6;
    }

    /* nama user */
    .card h6{
      color:var(--rose-dark);
      font-weight:600;
      margin-top:12px;
    }

    /* ================= FORM ================= */
    .form-control{
      border-radius:18px;
      border:1px solid #f1d6dc;
      padding:12px;
    }

    .form-control:focus{
      border-color:var(--rose);
      box-shadow:0 0 0 3px rgba(236,122,152,.15);
    }

    /* ================= BUTTON ================= */
    .btn-success{
      background:linear-gradient(135deg,#ec7a98,#ffc86b);
      border:none;
      color:#fff;
      font-weight:600;
      border-radius:30px;
      padding:10px;
      box-shadow:0 10px 25px rgba(236,122,152,.35);
      transition:.25s;
    }

    .btn-success:hover{
      transform:translateY(-3px);
      box-shadow:0 18px 40px rgba(236,122,152,.45);
    }

    /* ================= FADE ANIMATION ================= */
    .fade-section{
      opacity:0;
      transform:translateY(40px);
      transition:.7s ease;
    }
    .fade-section.show{
      opacity:1;
      transform:translateY(0);
    }

    </style>
    </head>

    <body>

    <?php include 'navbar.php'; ?>

    <div class="container py-5 fade-section">

    <h2 class="text-center mb-5">💖 Apa Kata Klien Kami</h2>

    <!-- DAFTAR TESTIMONI -->
    <div class="row g-4">

    <?php if (count($testimoni_list) > 0): ?>
      <?php foreach($testimoni_list as $t): ?>

      <div class="col-md-4">
        <div class="card p-3">
          <div class="card-body">
            <p class="card-text">
              “<?= htmlspecialchars($t['pesan']); ?>”
            </p>
            <h6>– <?= htmlspecialchars($t['nama_user']); ?></h6>
          </div>
        </div>
      </div>

      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-center text-muted">Belum ada testimoni.</p>
    <?php endif; ?>

    </div>

    <!-- FORM TESTIMONI -->
    <?php if ($status_booking === "Completed"): ?>
    <div class="mt-5">
      <h4 class="fw-semibold mb-3">
        ✨ Tinggalkan Testimoni Anda, <?= htmlspecialchars($nama_user); ?>
      </h4>

      <form action="proses_testimoni.php" method="post">
        <div class="mb-3">
          <label class="form-label">Pesan</label>
          <textarea name="pesan" class="form-control" rows="3" required></textarea>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-success">
            💌 Kirim Testimoni
          </button>
        </div>
      </form>
    </div>

    <?php elseif (isset($_SESSION['login'])): ?>
    <p class="text-center mt-5 text-muted">
    Testimoni hanya dapat diberikan setelah acara selesai.
    </p>
    <?php endif; ?>

    </div>

    <script>
    const observer=new IntersectionObserver(entries=>{
    entries.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('show'); }});
    });
    observer.observe(document.querySelector('.fade-section'));
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>

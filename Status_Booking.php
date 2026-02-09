      <?php
      session_start();
      include 'config/database.php';

      /* ===== PROTEKSI (TIDAK DIUBAH) ===== */
      if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'user') {
          header("Location: login.php");
          exit;
      }

      $id_user   = $_SESSION['user_id'];
      $nama_user = $_SESSION['nama_lengkap'];

      /* ===== QUERY (TIDAK DIUBAH) ===== */
      $query = mysqli_query($conn, "
          SELECT * FROM bookings 
          WHERE id_user = '$id_user'
          ORDER BY created_at DESC
      ");
      ?>
      <!DOCTYPE html>
      <html lang="id">
      <head>
      <meta charset="UTF-8">
      <title>Status Booking - Wadinmore</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Icons -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

      <!-- Google Font Wedding -->
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

      <style>
      /* =================================
   WADINMORE LUXURY WEDDING THEME 3.0
   CLEAN • BRIGHT • PREMIUM
   ================================= */

    :root{
      --rose:#ec7a98;           /* pink fresh */
      --rose-dark:#d95c7e;
      --gold:#f7c94b;           /* gold terang */
      --gold-strong:#e6a900;
      --cream:#fffdfc;
      --text:#444;
    }

    /* ================= BODY ================= */
    /* ================= BODY (DARKER LUXURY BG) ================= */
    body{
      padding-top:70px;
      font-family:'Poppins',sans-serif;

      background:
      radial-gradient(circle at top left,#f8dfe6,transparent 45%),
      radial-gradient(circle at bottom right,#f3e4c4,transparent 45%),
      linear-gradient(135deg,#f5f2f3,#efe8ea);
    }


    /* ================= TITLE ================= */
    h1{
      font-family:'Playfair Display',serif;
      font-weight:700;
      color:var(--rose-dark);
      text-shadow:0 5px 15px rgba(0,0,0,.08);
    }

    /* ================= CARD ================= */
    .card{
      border:none;
      border-radius:30px;
      background:#fff;

      box-shadow:
      0 30px 70px rgba(0,0,0,.08),
      0 10px 25px rgba(236,122,152,.15);

      padding:28px;
    }

    /* ================= TABLE ================= */
    .table{
      border-collapse:separate;
      border-spacing:0 14px;
    }

    /* HEADER GOLD GLOW */
    /* HEADER TABLE — ROSE CHAMPAGNE LUXURY */
    .table thead th{
      background:linear-gradient(135deg,#d88a9b,#c46b7d);
      color:#fff;
      border:none;
      padding:16px;
      font-weight:600;
      font-size:14px;
      letter-spacing:.5px;
    }


    /* ROW PUTIH BERSIH */
    .table tbody tr{
      background:#fff7f9;
      border-radius:20px;
      box-shadow:0 8px 18px rgba(0,0,0,.06);
      transition:.25s;
    }

    /* HOVER SOFT PINK GLOW */
    .table tbody tr:hover{
      transform:translateY(-4px);
      background:#fff5f8;
      box-shadow:0 16px 35px rgba(236,122,152,.25);
    }

    .table tbody td{
      border:none;
      padding:16px;
      color:var(--text);
      font-weight:500;
    }

    /* ================= BADGE ================= */
    .badge{
      border-radius:30px;
      padding:8px 16px;
      font-weight:600;
      font-size:13px;
    }

    /* status warna cerah */
    .badge-pending{
      background:#fff3c7;
      color:#a87400;
    }
    .badge-confirm{
      background:#d6ffe7;
      color:#0d8f56;
    }
    .badge-complete{
      background:#ece2ff;
      color:#5c39b0;
    }
    .badge-cancel{
      background:#ffdcdc;
      color:#c23030;
    }

    /* ================= BUTTON GLOBAL ================= */
    .btn{
      border-radius:35px;
      padding:9px 22px;
      font-weight:600;
      border:none;
      transition:.25s;
    }

    /* tombol aksi utama */
    .btn-primary,
    .btn-success{
      background:linear-gradient(135deg,var(--rose),var(--gold));
      color:#fff;
      box-shadow:0 10px 25px rgba(236,122,152,.35);
    }

    .btn-primary:hover,
    .btn-success:hover{
      transform:translateY(-3px);
      box-shadow:0 20px 45px rgba(236,122,152,.45);
    }

    /* 🔥 TOMBOL KEMBALI (SEKARANG PREMIUM, BUKAN PUTIH) */
    .btn-secondary{
      background:linear-gradient(135deg,#ff9db3,#ffc86b);
      color:#fff;
      box-shadow:0 10px 25px rgba(0,0,0,.12);
    }

    .btn-secondary:hover{
      background:linear-gradient(135deg,var(--rose-dark),var(--gold-strong));
      transform:translateY(-3px);
      box-shadow:0 18px 40px rgba(236,122,152,.45);
    }

    /* ================= FADE ================= */
    .fade-section{
      opacity:0;
      transform:translateY(40px);
      transition:.7s ease;
    }
    .fade-section.show{
      opacity:1;
      transform:translateY(0);
    }

    /* ================= TESTIMONI BUTTON SOFT ================= */
    .btn-primary{
      background:linear-gradient(135deg,#f3d9df,#e8c3cb); /* soft rose pastel */
      color:#6b4b52 !important;   /* teks gelap lembut */
      font-weight:500;           /* jangan bold */
      box-shadow:0 8px 20px rgba(0,0,0,.08);
    }

    .btn-primary:hover{
      background:linear-gradient(135deg,#e7bcc6,#dca6b1);
      color:#5a3f45 !important;
      transform:translateY(-2px);
    }
    </style>
     </head>

      <body>

      <?php include 'navbar.php'; ?>

      <div class="container mt-5 fade-section">

      <h1 class="text-center mb-3">💍 Status Booking Anda</h1>
      <p class="text-center mb-4">
      Halo <strong><?= $nama_user; ?></strong>, berikut perjalanan booking pernikahan Anda ✨
      </p>

      <!-- ===== PROGRESS STEP VISUAL ===== -->

      <div class="row justify-content-center">
      <div class="col-md-11">
      <div class="card">

      <?php if (mysqli_num_rows($query) > 0): ?>

      <table class="table text-center align-middle">
      <thead>
      <tr>
      <th>Paket</th>
      <th>Tanggal</th>
      <th>Alamat</th>
      <th>Tamu</th>
      <th>Status</th>
      <th>Aksi</th>
      </tr>
      </thead>
      <tbody>

      <?php while ($data = mysqli_fetch_assoc($query)): ?>
      <tr>

      <td><?= htmlspecialchars($data['nama_paket']); ?></td>
      <td><?= date('d-m-Y', strtotime($data['tanggal_acara'])); ?></td>
      <td><?= $data['alamat_acara'] ?: '-'; ?></td>
      <td><?= $data['jumlah_tamu'] ?: '-'; ?></td>

      <td>
      <?php
      if ($data['status']==='Pending'){
        echo '<span class="badge badge-pending">⏳ Pending</span>';
      }elseif ($data['status']==='Confirmed'){
        echo '<span class="badge badge-confirm">✅ Confirmed</span>';
      }elseif ($data['status']==='Completed'){
        echo '<span class="badge badge-complete">🎉 Completed</span>';
      }elseif ($data['status']==='Cancelled'){
        echo '<span class="badge badge-cancel">❌ Cancelled</span>';
      }
      ?>
      </td>

      <td>
      <?php if ($data['status']==='Confirmed'): ?>
      <a href="Pembayaran.php?id=<?= $data['id_booking']; ?>" class="btn btn-sm btn-success">
      💳 Bayar Sekarang
      </a>

      <?php elseif ($data['status']==='Completed'): ?>
      <a href="Testimoni.php?id=<?= $data['id_booking']; ?>" class="btn btn-sm btn-primary">
      ✨ Isi Testimoni
      </a>

      <?php elseif ($data['status']==='Cancelled'): ?>
      <span class="text-muted">Dibatalkan</span>

      <?php else: ?>
      <span class="text-muted">Menunggu konfirmasi</span>
      <?php endif; ?>
      </td>

      </tr>
      <?php endwhile; ?>

      </tbody>
      </table>

      <?php else: ?>
      <p class="text-center text-muted">Belum ada booking yang dibuat.</p>
      <?php endif; ?>

      <p class="text-center mt-3"><em>*Status diperbarui oleh admin secara otomatis*</em></p>

      <div class="text-center mt-4">
      <a href="Booking.php" class="btn btn-secondary">⬅️ Kembali ke Booking</a>
      </div>

      </div>
      </div>
      </div>
      </div>

      <!-- Fade animation script -->
      <script>
      const observer=new IntersectionObserver(entries=>{
      entries.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('show'); }});
      });
      observer.observe(document.querySelector('.fade-section'));
      </script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      </body>
      </html>

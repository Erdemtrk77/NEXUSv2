<?php
session_start();
if (!isset($_SESSION['doctor_id'])) { header("Location: doktor_giris.php"); exit(); }

$doctor_id = $_SESSION['doctor_id'];
$secilen_tarih = $_GET['tarih'] ?? date('Y-m-d'); 

// EKSİK OLAN ID 2 BURAYA EKLENDİ
$doktorlar = [
    '1' => ['ad' => 'Dr. Elif Yılmaz', 'branis' => 'Kardiyoloji Uzmanı', 'img' => 'img/elif.png'],
    '2' => ['ad' => 'Dr. Ahmet Kaya', 'branis' => 'Kulak Burun Boğaz Uzmanı', 'img' => 'img/ahmet.png'], // Bu satır eksikti!
    '3' => ['ad' => 'Dr. Zeynep Öztürk', 'branis' => 'Nöroloji Uzmanı', 'img' => 'img/zeynep.png'],
    '4' => ['ad' => 'Dr. Can Demir', 'branis' => 'Kardiyoloji Uzmanı', 'img' => 'img/can.png']
];

// Eğer ID dizide yoksa hata vermemesi için varsayılan bir değer atayalım
if (isset($doktorlar[$doctor_id])) {
    $mevcut_doktor = $doktorlar[$doctor_id];
} else {
    $mevcut_doktor = ['ad' => 'Bilinmeyen Doktor', 'branis' => '-', 'img' => 'img/default.png'];
}

try {
    $db = new PDO("pgsql:host=localhost;port=5432;dbname=Hospital", "postgres", "123456");
    // Tarih karşılaştırmasını garantiye almak için ::date cast ekledik
    $sorgu = $db->prepare("SELECT * FROM appointments WHERE doctor_id = ? AND appointment_date::date = ?::date ORDER BY appointment_time ASC");
    $sorgu->execute([$doctor_id, $secilen_tarih]);
    $hastalar = $sorgu->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) { die($e->getMessage()); }
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Nexus - Doktor Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root { --nexus-teal: #00bfa5; --nexus-dark: #2c3e50; }
        body { background-color: #f4f7f6; font-family: 'Poppins', sans-serif; margin: 0; overflow-x: hidden; }
        
        /* Sol Menü Sabitleme */
        .sidebar { 
            width: 280px; 
            height: 100vh; 
            background: white; 
            position: fixed; 
            left: 0; 
            top: 0; 
            border-right: 1px solid #e0e0e0; 
            padding: 30px 20px;
            z-index: 1000;
        }

        /* Ana İçerik Kaydırma */
        .main-content { 
            margin-left: 280px; /* Sidebar genişliği kadar boşluk */
            width: calc(100% - 280px); 
            padding: 40px;
            min-height: 100vh;
        }

        .doctor-profile img { 
            width: 90px; 
            height: 90px; 
            border: 3px solid var(--nexus-teal); 
            object-fit: cover;
        }

        .table-custom { 
            background: white; 
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
            overflow: hidden; 
        }

        .main-header {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.02);
        }

        .badge-status { font-size: 0.8rem; padding: 6px 12px; }
        .text-teal { color: var(--nexus-teal) !important; }


    </style>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>👨‍⚕️</text></svg>">
</head>
<body>

<div class="sidebar">
    <div class="doctor-profile text-center mb-5">
        <img src="<?php echo $mevcut_doktor['img']; ?>" class="rounded-circle mb-3 shadow-sm">
        <h5 class="fw-bold text-dark mb-1"><?php echo $mevcut_doktor['ad']; ?></h5>
        <span class="badge bg-light text-success border px-3 py-2"><?php echo $mevcut_doktor['branis']; ?></span>
    </div>
    
    <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action border-0 active mb-2 rounded-3 p-3 shadow-sm" style="background: var(--nexus-teal)">
            <i class="fas fa-calendar-check me-2"></i> Randevularım
        </a>
        <a href="logout.php" class="list-group-item list-group-item-action border-0 text-danger p-3 mt-4">
            <i class="fas fa-sign-out-alt me-2"></i> Güvenli Çıkış
        </a>
    </div>
</div>

<div class="main-content">
    
    <div class="main-header mb-4 border">
        <div class="row align-items-center">
            <div class="col-md-7">
                <h3 class="fw-bold text-dark mb-1">Hasta Randevu Takvimi</h3>
                <p class="text-muted mb-0 small">
                    <i class="fas fa-user-md me-1"></i> Sayın <?php echo $mevcut_doktor['ad']; ?>, hastalarınızı buradan yönetin.
                </p>
            </div>
            <div class="col-md-5 text-md-end mt-3 mt-md-0">
                <div class="d-inline-flex align-items-center p-2 bg-light rounded-3 border">
                    <div class="px-3 border-end text-teal">
                        <i class="fas fa-calendar-day fa-lg"></i>
                    </div>
                    <div class="px-3 text-start">
                        <label class="d-block text-uppercase fw-bold text-muted" style="font-size: 0.6rem;">TARİH DEĞİŞTİR</label>
                        <form action="" method="GET">
                            <input type="date" name="tarih" class="form-control border-0 p-0 fw-bold bg-transparent shadow-none" 
                                   value="<?php echo $secilen_tarih; ?>" onchange="this.form.submit()" style="cursor: pointer;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-custom border">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr class="text-secondary small text-uppercase">
                    <th class="p-4" style="width: 15%;">Saat</th>
                    <th style="width: 35%;">Hasta Bilgisi</th>
                    <th style="width: 20%;">T.C. Kimlik</th>
                    <th style="width: 15%;">Durum</th>
                    <th class="text-center" style="width: 15%;">İşlem</th>
                </tr>
            </thead>
            <tbody>
                <?php if($hastalar): foreach($hastalar as $h): ?>
                <tr>
                    <td class="p-4 fw-bold text-teal">
                        <i class="far fa-clock me-1"></i> <?php echo substr($h['appointment_time'], 0, 5); ?>
                    </td>
                    <td>
                        <div class="fw-bold text-dark mb-0"><?php echo ucwords($h['patient_name']); ?></div>
                        <small class="text-muted"><?php echo $mevcut_doktor['branis']; ?></small>
                    </td>
                    <td class="text-muted font-monospace small"><?php echo $h['patient_tc']; ?></td>
                    <td>
                        <span class="badge badge-status rounded-pill bg-success-subtle text-success border border-success-subtle">
                            <i class="fas fa-check me-1"></i> <?php echo $h['status']; ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-outline-primary border-0" title="Tamamlandı"><i class="fas fa-check-circle"></i></button>
                            <button class="btn btn-sm btn-outline-danger border-0" title="İptal"><i class="fas fa-times-circle"></i></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <div class="py-4">
                            <i class="fas fa-calendar-times fa-3x text-light mb-3"></i>
                            <h5 class="text-muted fw-normal">Bu tarihte kayıtlı randevunuz bulunmuyor.</h5>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
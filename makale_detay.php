<?php
// Tıklanan makalenin ID'sini alıyoruz
$makale_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Makale verileri (CRISPR TAMAMEN SİLİNDİ - TOPLAM 7 MAKALE)
$makaleler = [
    1 => [
        "baslik" => "AI Teşhis Süreçlerini Nasıl Hızlandırıyor?",
        "kategori" => "Yapay Zeka 🤖",
        "resim" => "https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800",
        "icerik" => "Yapay zeka (AI), modern tıbbın en büyük yardımcısı haline geldi. Radyoloji görüntülerinden genetik haritalamaya kadar her alanda devrim yaratan AI, teşhis süreçlerinde %99 başarı oranı sunuyor."
    ],
    2 => [
        "baslik" => "Robotik Cerrahide Milimetrik Hassasiyet",
        "kategori" => "Cerrahi 🦾",
        "resim" => "https://images.unsplash.com/photo-1551076805-e1869033e561?w=800",
        "icerik" => "Robotik cerrahi, cerrahların çok daha küçük kesilerle ve milimetrik hassasiyetle ameliyat yapmasına olanak tanır. Da Vinci robotik sistemleri sayesinde iyileşme süreleri kısalıyor."
    ],
    3 => [
        "baslik" => "Akıllı Saatler Kalp Krizini Önlüyor Mu?",
        "kategori" => "Giyilebilir ⌚",
        "resim" => "https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=800",
        "icerik" => "Giyilebilir teknolojiler artık sadece adım saymıyor. Anlık EKG takibi, kandaki oksijen seviyesi ve nabız düzensizliklerini tespit ederek erken uyarı sistemi görevi görüyor."
    ],
    4 => [
        "baslik" => "Kanserli Hücreyi Hedefleyen Mikro Robotlar",
        "kategori" => "Nanoteknoloji 🔬",
        "resim" => "https://images.unsplash.com/photo-1530210124550-912dc1381cb8?w=800",
        "icerik" => "Nanoteknoloji sayesinde üretilen mikro robotlar, damarlarımızda yol alarak sadece hastalıklı hücrelere ilaç taşıyor. Bu yöntem kemoterapinin yan etkilerini minimize ediyor."
    ],
    6 => [
        "baslik" => "VR ile Cerrahi Eğitim ve Simülasyon",
        "kategori" => "Eğitim 🥽",
        "resim" => "https://images.unsplash.com/photo-1581056771107-24ca5f033842?w=800",
        "icerik" => "Sanal gerçeklik (VR), tıp öğrencilerinin ve cerrahların risk almadan ameliyat pratiği yapmasını sağlıyor. Gerçekçi simülasyonlar cerrahi başarı oranlarını artırıyor."
    ],
    7 => [
        "baslik" => "3D Yazıcılar ile Yapay Organ Üretimi",
        "kategori" => "Biyoteknoloji 🖨️",
        "resim" => "https://images.unsplash.com/photo-1582719471384-894fbb16e074?w=800",
        "icerik" => "Biyo-yazıcılar, canlı hücreleri kullanarak doku ve organ üretebiliyor. Gelecekte organ nakli sırası bekleme devri bu teknoloji ile sona erebilir."
    ],
    8 => [
        "baslik" => "Tele-Tıp: Geleceğin Muayene Sistemi",
        "kategori" => "Dijital Sağlık 🌐",
        "resim" => "https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800",
        "icerik" => "Doktorunuzla fiziksel olarak aynı ortamda bulunmadan muayene olabildiğiniz Tele-Tıp sistemleri, özellikle kronik hastalık takibinde büyük kolaylık sağlıyor."
    ]
];

// Aktif makaleyi belirle (Hata korumalı)
$aktif_makale = isset($makaleler[$makale_id]) ? $makaleler[$makale_id] : $makaleler[1];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $aktif_makale['baslik']; ?> | Nexus Sağlık</title>

    <link rel="icon" type="image/png" href="/img/logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        .detail-hero { height: 450px; object-fit: cover; border-radius: 30px; width: 100%; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .text-teal { color: #00bfa5 !important; }
        .bg-teal-soft { background: #e0f7f4; color: #00bfa5; }
        .mag-btn { 
            width: 45px; height: 45px; background: white; border-radius: 50%; 
            border: 1px solid #eee; color: #00bfa5; cursor: pointer;
            position: absolute; top: 50%; transform: translateY(-50%); z-index: 10;
            transition: 0.3s;
        }
        .mag-btn:hover { background: #00bfa5; color: white; }
        .magazine-item { min-width: 320px; transition: 0.3s; }
        .magazine-item:hover { transform: translateY(-5px); }
    </style>
</head>
<body class="bg-light">

    <div class="container py-5">
        <a href="index.html" class="btn btn-outline-secondary rounded-pill mb-4 px-4 shadow-sm bg-white">
            <i class="fas fa-arrow-left me-2"></i> Ana Sayfaya Dön
        </a>

        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mb-5 overflow-hidden">
            <img src="<?php echo $aktif_makale['resim']; ?>" class="detail-hero mb-4">
            <div class="px-2">
                <span class="badge bg-teal-soft px-3 py-2 mb-3 d-inline-block rounded-pill fw-bold"><?php echo $aktif_makale['kategori']; ?></span>
                <h1 class="fw-bold display-6 mb-4" style="color: #2c3e50;"><?php echo $aktif_makale['baslik']; ?></h1>
                <div class="article-body fs-5 text-muted" style="line-height: 1.9;">
                    <p><?php echo $aktif_makale['icerik']; ?></p>
                    <p>Hastanemiz, bu teknolojileri en verimli şekilde kullanarak hastalarımıza dünya standartlarında tedavi sunmayı hedeflemektedir.</p>
                </div>
            </div>
        </div>

        <hr class="my-5 opacity-25">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Diğer <span class="text-teal">Makaleler</span> ✨</h3>
            <a href="makale_detay.php?id=1" class="btn btn-sm btn-outline-teal rounded-pill px-3">Tümünü Gör</a>
        </div>

        <div class="position-relative">
            <button class="mag-btn" style="left: -20px;" onclick="scrollMag(-1)"><i class="fas fa-chevron-left"></i></button>
            
            <div id="magSlider" class="d-flex overflow-hidden gap-4 py-3" style="scroll-behavior: smooth;">
                <?php foreach($makaleler as $id => $makale): 
                    if($id == $makale_id) continue; ?>
                    <div class="magazine-item">
                        <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                            <img src="<?php echo $makale['resim']; ?>" class="card-img-top" style="height: 160px; object-fit: cover;">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-3" style="min-height: 40px;"><?php echo $makale['baslik']; ?></h6>
                                <a href="makale_detay.php?id=<?php echo $id; ?>" class="text-teal fw-bold text-decoration-none d-block">
                                    Hemen Oku <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <button class="mag-btn" style="right: -20px;" onclick="scrollMag(1)"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>

    <script>
        function scrollMag(dir) {
            const slider = document.getElementById('magSlider');
            const item = document.querySelector('.magazine-item');
            if (item) {
                const scrollAmount = item.offsetWidth + 24; // Genişlik + Gap
                slider.scrollBy({ left: dir * scrollAmount, behavior: 'smooth' });
            }
        }
    </script>
</body>
</html>
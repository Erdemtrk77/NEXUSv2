<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Nexus Sağlık - Global Health Tourism 🌍</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🌍</text></svg>">
    
    <style>
        :root { --nexus-teal: #00bfa5; --nexus-dark: #2c3e50; --soft-teal: #e0f7f4; }
        body { font-family: 'Poppins', sans-serif; background-color: #fdfdfd; }
        .hero-tourism { 
            background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(0, 191, 165, 0.7)), url('https://images.unsplash.com/photo-1544161515-4ab6ce6db874?auto=format&fit=crop&w=1500');
            background-size: cover; background-position: center; height: 60vh; display: flex; align-items: center; color: white;
        }
        .feature-box { 
            background: white; padding: 30px; border-radius: 20px; border-bottom: 5px solid var(--nexus-teal);
            transition: 0.3s; box-shadow: 0 10px 25px rgba(0,0,0,0.05); height: 100%;
        }
        .feature-box:hover { transform: translateY(-10px); }
        .icon-circle { 
            width: 70px; height: 70px; background: var(--soft-teal); color: var(--nexus-teal); 
            display: flex; align-items: center; justify-content: center; border-radius: 50%; margin-bottom: 20px; font-size: 1.8rem;
        }
        .step-card { border: none; border-radius: 15px; background: var(--nexus-dark); color: white; padding: 25px; position: relative; }
        .step-badge { position: absolute; top: -15px; left: 20px; background: var(--nexus-teal); padding: 5px 15px; border-radius: 10px; font-weight: bold; }
    </style>
</head>
<body>

    <section class="hero-tourism text-center">
        <div class="container">
            <h1 class="display-3 fw-bold">Global Sağlık Rehberiniz </h1>
            <p class="lead fs-4">Dünyanın neresinde olursanız olun, VIP standartlarda sağlık hizmeti yanınızda.</p>
            <a href="https://wa.me/905444766482" class="btn btn-lg btn-light fw-bold px-5 rounded-pill shadow" style="color: var(--nexus-teal);">
                <i class="fab fa-whatsapp me-2"></i> Hemen Bilgi Alın
            </a>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="color: var(--nexus-dark);">Ayrıcalıklı Hizmetlerimiz ✨</h2>
                <div style="width: 80px; height: 4px; background: var(--nexus-teal); margin: 10px auto;"></div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="feature-box text-center">
                        <div class="icon-circle mx-auto">🏨</div>
                        <h5 class="fw-bold">Lüks Konaklama</h5>
                        <p class="text-muted small">Anlaşmalı 5 yıldızlı otellerde iyileşme sürecinizi tatil tadında geçirin.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box text-center">
                        <div class="icon-circle mx-auto">🚐</div>
                        <h5 class="fw-bold">VIP Transfer</h5>
                        <p class="text-muted small">Havalimanı, otel ve hastane arasındaki tüm ulaşımınız özel şoförle sağlanır.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box text-center">
                        <div class="icon-circle mx-auto">🗣️</div>
                        <h5 class="fw-bold">Tercüman Desteği</h5>
                        <p class="text-muted small">Kendi dilinizde hizmet almanız için 7/24 yanınızda olacak asistanınız hazır.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box text-center">
                        <div class="icon-circle mx-auto">🛡️</div>
                        <h5 class="fw-bold">Global Garanti</h5>
                        <p class="text-muted small">Uluslararası akreditasyonlara sahip hastanemizde güvenle tedavi olun.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Süreç Nasıl İşliyor? </h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="step-card h-100">
                        <div class="step-badge">ADIM 1</div>
                        <h5>Ücretsiz Planlama 📝</h5>
                        <p class="small mb-0 opacity-75">Raporlarınızı gönderin, uzman doktorlarımız online konsültasyon ile tedavi planınızı çıkarsın.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card h-100">
                        <div class="step-badge">ADIM 2</div>
                        <h5>Seyahat & Tedavi 🛫</h5>
                        <p class="small mb-0 opacity-75">Uçağınızdan indiğiniz andan itibaren tüm süreciniz Nexus ekibi tarafından yönetilir.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card h-100">
                        <div class="step-badge">ADIM 3</div>
                        <h5>Sağlıklı Dönüş 🏡</h5>
                        <p class="small mb-0 opacity-75">Tedaviniz bittikten sonra kontrolleriniz yapılır ve ülkenize sağlıkla uğurlanırsınız.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5 text-center text-white" style="background: var(--nexus-dark);">
        <div class="container">
            <h3>Dünyanın 120 ülkesinden binlerce hastaya hizmet verdik 🌏</h3>
            <p class="opacity-75">Siz de Nexus Sağlık farkını yaşamak için bize ulaşın.</p>
            <button class="btn btn-nexus-teal btn-lg mt-3" style="background: var(--nexus-teal); color: white;">Bize Yazın 📩</button>
        </div>
    </footer>

</body>
</html>
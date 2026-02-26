// script.js dosyasını bununla tazele
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Doktor Detaylarını Gösterme
const doctorModal = document.getElementById('doctorModal');
if (doctorModal) {
    doctorModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        document.getElementById('doctorModalName').textContent = button.getAttribute('data-doctor-name');
        document.getElementById('doctorModalSpecialty').textContent = button.getAttribute('data-doctor-specialty');
        document.getElementById('doctorModalDescription').textContent = button.getAttribute('data-doctor-description');
        document.getElementById('doctorModalImg').src = button.getAttribute('data-doctor-img');
    });
}

document.addEventListener('DOMContentLoaded', function () {
    // 1. DOKTOR MODAL VERİ AKTARIMI
    const doctorModal = document.getElementById('doctorModal');
    if (doctorModal) {
        doctorModal.addEventListener('show.bs.modal', function (event) {
            // Tıklanan kartı yakala
            const button = event.relatedTarget; 
            
            // Kartın içindeki "data-" özelliklerini oku
            const name = button.getAttribute('data-doctor-name');
            const specialty = button.getAttribute('data-doctor-specialty');
            const description = button.getAttribute('data-doctor-description');
            const img = button.getAttribute('data-doctor-img');
            const edu = button.getAttribute('data-doctor-edu'); // Okul bilgisi
            const op = button.getAttribute('data-doctor-op');   // Ameliyat sayısı
            const exp = button.getAttribute('data-doctor-exp'); // Deneyim yılı

            // Modaldaki boş yerlere bu bilgileri yazdır
            doctorModal.querySelector('#doctorModalName').textContent = name;
            doctorModal.querySelector('#doctorModalSpecialty').textContent = specialty;
            doctorModal.querySelector('#doctorModalDescription').textContent = description;
            doctorModal.querySelector('#doctorModalImg').src = img;
            doctorModal.querySelector('#doctorModalEdu').innerHTML = edu;
            doctorModal.querySelector('#doctorOpCount').textContent = op;
            doctorModal.querySelector('#doctorExp').textContent = exp;
        });
    }

    // 2. NAVIGASYON RENGİ DEĞİŞİMİ (Scroll yapınca navbar beyaz olur)
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled', 'navbar-light');
            navbar.classList.remove('navbar-dark');
        } else {
            navbar.classList.remove('navbar-scrolled', 'navbar-light');
            navbar.classList.add('navbar-dark');
        }
    });
});

// 3. SAĞLIK DERGİSİ KAYDIRMA FONKSİYONU
function scrollMagazine(direction) {
    const slider = document.getElementById('magazineSlider');
    const firstItem = document.querySelector('.magazine-item');
    if (firstItem) {
        const scrollAmount = firstItem.offsetWidth + 20; // Kart genişliği + Gap
        slider.scrollBy({
            left: direction * scrollAmount,
            behavior: 'smooth'
        });
    }
}


document.addEventListener('DOMContentLoaded', function () {
    const doctorModal = document.getElementById('doctorModal');
    
    if (doctorModal) {
        doctorModal.addEventListener('show.bs.modal', function (event) {
            // Tıklanan kartı yakala
            const button = event.relatedTarget; 
            
            // Verileri al
            const name = button.getAttribute('data-doctor-name') || "";
            const specialty = button.getAttribute('data-doctor-specialty') || "";
            const description = button.getAttribute('data-doctor-description') || "";
            const img = button.getAttribute('data-doctor-img') || "";
            const edu = button.getAttribute('data-doctor-edu') || "Bilgi Yok";
            const op = button.getAttribute('data-doctor-op') || "0";
            const exp = button.getAttribute('data-doctor-exp') || "0";

            // Modala yerleştir
            this.querySelector('#doctorModalName').textContent = name;
            this.querySelector('#doctorModalSpecialty').textContent = specialty;
            this.querySelector('#doctorModalDescription').textContent = description;
            this.querySelector('#doctorModalImg').src = img;
            this.querySelector('#doctorModalEdu').innerHTML = edu;
            this.querySelector('#doctorOpCount').textContent = op;
            this.querySelector('#doctorExp').textContent = exp;
        });
    }
});




function scrollMagazine(direction) {
    const slider = document.getElementById('magazineSlider');
    const firstItem = document.querySelector('.magazine-item');
    
    if (firstItem) {
        // Bir kartın genişliğini ve aradaki boşluğu (20px) hesapla
        const scrollAmount = firstItem.offsetWidth + 20;
        
        slider.scrollBy({
            left: direction * scrollAmount,
            behavior: 'smooth'
        });
    }
}


// Randevu Doktor Listesi (Daha önce yaptığımız çalışan kısım)
const doktorlar = {
    // ID'lerin tırnak içinde olması sorun değil ama veritabanındaki ID'ler ile (1, 2, 3) eşleşmeli
    kardiyoloji: [{ id: 1, ad: 'Dr. Elif Yılmaz' }, { id: 4, ad: 'Dr. Can Demir' }],
    kulakburunbogaz: [{ id: 2, ad: 'Dr. Ahmet Kaya' }],
    noroloji: [{ id: 3, ad: 'Dr. Zeynep Öztürk' }]
};

const bolumSecim = document.getElementById('bolumSecim');
const doktorSecim = document.getElementById('doktorSecim');

if (bolumSecim && doktorSecim) {
    bolumSecim.addEventListener('change', function() {
        const key = this.value;
        doktorSecim.innerHTML = '<option value="" selected disabled>Doktor Seçin...</option>';
        if (doktorlar[key]) {
            doktorlar[key].forEach(d => {
                const opt = document.createElement('option');
                opt.value = d.id;
                opt.textContent = d.ad;
                doktorSecim.appendChild(opt);
            });
            doktorSecim.disabled = false;
        }
    });
}
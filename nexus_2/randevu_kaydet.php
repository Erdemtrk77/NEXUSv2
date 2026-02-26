<?php
try {
    $db = new PDO("pgsql:host=localhost;port=5432;dbname=Hospital", "postgres", "123456");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $patient_tc = $_POST['patient_tc'];
        $patient_name = $_POST['patient_name'];
        $doctor_id = $_POST['doctor_id']; // Formdan gelen doktor ID'si
        $appointment_date = $_POST['appointment_date'];
        $appointment_time = $_POST['appointment_time'];

        // --- CAN ALICI KISIM: ÇAKIŞMA KONTROLÜ ---
        $kontrol_sorgu = $db->prepare("SELECT COUNT(*) FROM appointments WHERE doctor_id = ? AND appointment_date = ? AND appointment_time = ?");
        $kontrol_sorgu->execute([$doctor_id, $appointment_date, $appointment_time]);
        $mevcut_randevu_sayisi = $kontrol_sorgu->fetchColumn();

        if ($mevcut_randevu_sayisi > 0) {
            // Eğer o saat doluysa hata mesajı ver ve geri gönder
            echo "<script>alert('Üzgünüz, bu saatte doktorun randevusu doludur. Lütfen başka bir saat seçiniz.'); window.history.back();</script>";
            exit();
        }

        // Eğer saat boşsa kaydet
        $sorgu = $db->prepare("INSERT INTO appointments (patient_tc, patient_name, doctor_id, appointment_date, appointment_time, status) VALUES (?, ?, ?, ?, ?, 'Onaylandı')");
        
        if ($sorgu->execute([$patient_tc, $patient_name, $doctor_id, $appointment_date, $appointment_time])) {
            echo "<script>alert('Randevunuz başarıyla oluşturuldu!'); window.location.href='index.html';</script>";
        }
    }
} catch (PDOException $e) {
    die("Hata: " . $e->getMessage());
}
?>
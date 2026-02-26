<?php
session_start();
// Basit bir örnek şifreleme; gerçek projede veritabanından kontrol edilir.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_id = $_POST['doctor_id'];
    $password = $_POST['password'];

    if ($password == "12345") {
        $_SESSION['doctor_id'] = $doctor_id;
        header("Location: doktor_paneli.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Nexus Sağlık - Doktor Girişi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); height: 100vh; display: flex; align-items: center; }
        .login-card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden; }
        .btn-nexus { background-color: #00bfa5; color: white; border-radius: 25px; padding: 10px 30px; }
        .btn-nexus:hover { background-color: #008e7a; color: white; }
    </style>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>👨‍⚕️</text></svg>">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card login-card p-4">
                <div class="text-center mb-4">
                    <img src="img/nexuslogo.png" width="80">
                    <h4 class="mt-2 fw-bold text-dark">Doktor Giriş Paneli</h4>
                </div>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Doktor ID</label>
                        <input type="text" name="doctor_id" class="form-control" placeholder="ID Giriniz" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Şifre</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••" required>
                    </div>
                    <button type="submit" class="btn btn-nexus w-100">Sisteme Giriş Yap</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
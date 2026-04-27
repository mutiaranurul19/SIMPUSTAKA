<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIMPUSTAKA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Background Full Image */
    .bg-image {
        background-image: url('<?= base_url('assets/img/bg-login.jpg') ?>'); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    /* Overlay Biru Gelap (Agar lebih matching dengan dashboard) */
    .bg-image::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(34, 45, 101, 0.6); /* Biru navy transparan */
    }

    /* Kotak Login */
    .login-box {
        position: relative;
        z-index: 1;
        background: rgba(255, 255, 255, 0.95); 
        padding: 40px;
        border-radius: 15px; /* Lebih bulat agar modern */
        box-shadow: 0 15px 35px rgba(0,0,0,0.4);
        width: 100%;
        max-width: 400px;
        text-align: center;
        border-top: 5px solid #0d6efd; /* Garis biru di atas kotak */
    }

    .login-box h2 {
        margin-bottom: 5px;
        font-weight: 700;
        color: #222e65; /* Biru gelap */
    }

    .login-box p {
        color: #6c757d;
        margin-bottom: 25px;
        font-size: 0.9rem;
    }

    .form-control {
        height: 48px;
        border-radius: 8px;
        margin-bottom: 15px;
        border: 1px solid #ced4da;
    }

    /* Fokus input jadi biru */
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    /* Tombol Login Biru (Matching dengan Sidebar & Card Dashboard) */
    .btn-login {
        width: 100%;
        height: 48px;
        background-color: #0d6efd; /* Biru Primary */
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 8px;
        transition: 0.3s;
        font-size: 1rem;
        letter-spacing: 0.5px;
    }

    .btn-login:hover {
        background-color: #0b5ed7; /* Biru lebih tua saat hover */
        transform: translateY(-2px); /* Efek melayang sedikit */
    }

    .footer-text {
        position: absolute;
        bottom: 20px;
        color: rgba(255, 255, 255, 0.8);
        z-index: 1;
        font-size: 0.85rem;
    }

    a.small {
        color: #0d6efd;
    }
</style>
</head>
<body>

<div class="bg-image">
    <div class="login-box">
        <h2>Simpustaka Login Form</h2>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-warning text-danger small p-2" style="background-color: #fff3cd;">
                <b>Invalid!</b> <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login/proses') ?>" method="POST">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="password" required>
            </div>
            
            <button type="submit" class="btn-login">Login</button>
            
            <div class="mt-3">
                <a href="#" class="text-decoration-none text-muted small">Lost your password?</a>
            </div>
        </form>
    </div>

    <div class="footer-text">
        © All rights reserved SIMPUSTAKA
    </div>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login SIMPUSTAKA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Background Soft Pastel dengan pola abstrak lingkaran */
            background-color: #f0f4f8;
            background-image: radial-gradient(at 0% 0%, #e3f2fd 0, transparent 50%), 
                              radial-gradient(at 100% 100%, #e8f5e9 0, transparent 50%);
            overflow: hidden;
        }

        .login-wrapper {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .brand-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand-logo h1 {
            font-size: 32px;
            font-weight: 700;
            color: #1976d2;
            letter-spacing: -1px;
            margin: 0;
        }

        .brand-logo p {
            font-size: 0.9rem;
            color: #718096;
        }

        /* CARD STYLE GAYA BARU */
        .card {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.7);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        }

        .card h2 {
            font-size: 22px;
            font-weight: 700;
            color: #333;
            margin-bottom: 25px;
            text-align: center;
        }

        /* INPUT FIELD GAYA MINIMALIS */
        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 8px;
            margin-left: 4px;
        }

        input {
            width: 100%;
            padding: 14px 20px;
            border-radius: 16px;
            border: 1.5px solid #edf2f7;
            background: #f8fafc;
            color: #333;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #1976d2;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(25, 118, 210, 0.05);
        }

        .password-container {
            position: relative;
        }

        .toggle-btn {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1.1rem;
            opacity: 0.4;
        }

        /* BUTTON GAYA CAPSULE */
        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 16px;
            background: #1976d2;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 0 8px 15px rgba(25, 118, 210, 0.2);
        }

        /* ALERT SOFT */
        .alert {
            padding: 12px;
            border-radius: 12px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            text-align: center;
        }
        .error { background: #fff5f5; color: #c53030; border: 1px solid #feb2b2; }

        .footer-link {
            text-align: center;
            margin-top: 25px;
            font-size: 0.85rem;
            color: #718096;
        }

        .footer-link a {
            color: #1976d2;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="brand-logo">
        <h1>SIMPUSTAKA</h1>
        <p>Pustaka Digital dalam Genggaman</p>
    </div>

    <div class="card">
        <h2>Selamat Datang</h2>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="post">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <div class="password-container">
                    <input type="password" name="password" id="password" placeholder="Masukan Password" required>
                    <span class="toggle-btn" onclick="togglePassword()">👁</span>
                </div>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>

        <div class="footer-link">
    Belum punya akun? <a href="<?= base_url('register') ?>">Daftar</a><br>
    <a href="<?= base_url('restore') ?>">Restore Database</a>
</div>
    </div>
</div>
<script>
    function togglePassword() {
        var x = document.getElementById("password");
        x.type = x.type === "password" ? "text" : "password";
    }
</script>

</body>
</html>
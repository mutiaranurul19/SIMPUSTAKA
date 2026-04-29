<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun - SIMPUSTAKA</title>
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Background Soft Pastel yang sama dengan Login */
            background-color: #f0f4f8;
            background-image: radial-gradient(at 0% 0%, #e3f2fd 0, transparent 50%), 
                              radial-gradient(at 100% 100%, #e8f5e9 0, transparent 50%);
            padding: 20px;
        }

        .register-wrapper {
            width: 100%;
            max-width: 450px; /* Sedikit lebih lebar untuk form daftar */
        }

        .brand-logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .brand-logo h1 {
            font-size: 32px;
            font-weight: 700;
            color: #1976d2;
            letter-spacing: -1px;
            margin: 0;
        }

        /* CARD STYLE GAYA BARU */
        .card {
            background: rgba(255, 255, 255, 0.9);
            padding: 35px;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.7);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        }

        .card h2 {
            font-size: 22px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        /* FOTO PREVIEW STYLE */
        .preview-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .preview {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            margin-bottom: 10px;
        }

        /* INPUT FIELD STYLE */
        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 6px;
            margin-left: 4px;
        }

        input {
            width: 100%;
            padding: 12px 18px;
            border-radius: 14px;
            border: 1.5px solid #edf2f7;
            background: #f8fafc;
            color: #333;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        input[type="file"] {
            padding: 8px;
            font-size: 0.8rem;
            background: transparent;
            border: 1px dashed #cbd5e0;
        }

        input:focus {
            outline: none;
            border-color: #1976d2;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(25, 118, 210, 0.05);
        }

        /* BUTTON STYLE */
        .btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 14px;
            background: #1976d2;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 15px;
            box-shadow: 0 8px 15px rgba(25, 118, 210, 0.2);
            transition: transform 0.2s ease;
        }

        .btn:active {
            transform: scale(0.98);
        }

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

<div class="register-wrapper">
    <div class="brand-logo">
        <h1>SIMPUSTAKA</h1>
    </div>

    <div class="card">
        <h2>Daftar Akun</h2>

        <form action="<?= base_url('register/save') ?>" method="post" enctype="multipart/form-data">
            
            <div class="preview-container">
                <img id="preview" src="<?= base_url('uploads/users/default.png') ?>" class="preview">
                <div class="input-group">
                    <input type="file" name="foto" accept="image/*" onchange="previewFoto(event)">
                </div>
            </div>

            <div class="input-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Buat username" required>
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukan Email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukan Password" required>
            </div>

            <button type="submit" class="btn">Daftar Akun Baru</button>
        </form>

        <div class="footer-link">
            Sudah punya akun? <a href="<?= base_url('login') ?>">Login</a>
        </div>
    </div>
</div>

<script>
function previewFoto(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('preview');
        output.src = reader.result;
    };
    if(event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
}
</script>

</body>
</html>
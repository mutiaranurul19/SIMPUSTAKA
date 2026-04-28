<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            width: 350px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        input:focus {
            border-color: #4e73df;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #4e73df;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background: #2e59d9;
        }

        .link {
            margin-top: 15px;
            font-size: 14px;
        }

        .preview {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin: 10px auto;
            display: block;
            border: 2px solid #ddd;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Daftar Akun</h2>

    <form action="<?= base_url('register/save') ?>" method="post" enctype="multipart/form-data">

        <!-- Preview Foto -->
        <img id="preview" src="<?= base_url('uploads/users/default.png') ?>" class="preview">

        <input type="file" name="foto" accept="image/*" onchange="previewFoto(event)">

        <input type="text" name="nama" placeholder="Nama lengkap" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Daftar</button>
    </form>

    <div class="link">
        Sudah punya akun? 
        <a href="<?= base_url('login') ?>">Login</a>
    </div>
</div>

<script>
function previewFoto(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('preview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

</body>
</html>
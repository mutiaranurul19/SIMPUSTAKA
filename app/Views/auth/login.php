<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login SIMPUSTAKA</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
* {
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
}

body {
    margin: 0;
    height: 100vh;
    display: flex;
}

/* KIRI */
.left {
    flex: 1;
    background: linear-gradient(135deg, #4e73df, #1cc88a);
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.left h1 {
    font-size: 45px;
    margin: 0;
}

.left p {
    opacity: 0.9;
}

/* KANAN */
.right {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f8f9fc;
}

/* CARD */
.card {
    width: 350px;
    padding: 30px;
    border-radius: 15px;
    background: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.card h2 {
    margin-bottom: 20px;
}

/* INPUT */
.input-group {
    position: relative;
}

input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 10px;
    border: 1px solid #ccc;
}

input:focus {
    border-color: #4e73df;
    outline: none;
}

/* TOGGLE PASSWORD */
.toggle {
    position: absolute;
    right: 10px;
    top: 20px;
    cursor: pointer;
}

/* BUTTON */
.btn {
    width: 100%;
    padding: 12px;
    border: none;
    background: linear-gradient(135deg, #4e73df, #1cc88a);
    color: white;
    border-radius: 10px;
    cursor: pointer;
}

/* LINK */
.link {
    margin-top: 15px;
    text-align: center;
}

.link a {
    color: #4e73df;
    text-decoration: none;
}

/* ALERT */
.alert {
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 10px;
    font-size: 14px;
}

.error { background: #ffe0e0; color: #c0392b; }
.success { background: #e0ffe8; color: #27ae60; }

</style>
</head>

<body>

<div class="left">
    <h1>SIMPUSTAKA</h1>
    <p>Sistem Perpustakaan Digital Modern</p>
</div>

<div class="right">
    <div class="card">
        <h2>Login</h2>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('salahpw')): ?>
            <div class="alert error"><?= session()->getFlashdata('salahpw') ?></div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="post">

            <input type="text" name="username" placeholder="Username" required>

            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="toggle" onclick="togglePassword()">👁️</span>
            </div>

            <button class="btn">Login</button>
        </form>

        <div class="link">
            Belum punya akun?
            <a href="<?= base_url('register') ?>">Daftar Sekarang</a>
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
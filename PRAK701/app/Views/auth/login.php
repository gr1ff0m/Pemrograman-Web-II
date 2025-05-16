<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; background: #f0f4f8; display:flex; justify-content:center; align-items:center; height:100vh; margin:0;}
        .login-container { background:#fff; padding:30px 40px; border-radius:8px; box-shadow:0 8px 20px rgba(0,0,0,0.1); width:320px;}
        h2 { text-align:center; color:#333; margin-bottom:20px;}
        label { display:block; margin-top:15px; margin-bottom:5px; color:#555; font-weight:bold;}
        input[type="text"], input[type="password"] { width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:5px; font-size:14px;}
        button { margin-top:25px; width:100%; background:#007BFF; border:none; color:#fff; padding:12px; font-size:16px; border-radius:5px; cursor:pointer;}
        button:hover { background:#0056b3;}
        .message { margin-top:15px; padding:10px; border-radius:5px; font-size:14px;}
        .error { background:#f8d7da; color:#721c24; border:1px solid #f5c6cb;}
        .success { background:#d4edda; color:#155724; border:1px solid #c3e6cb;}
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>

    <?php if(session()->getFlashdata('warning')): ?>
    <p style="color:red"><?= session()->getFlashdata('warning') ?></p>
<?php endif; ?>

<?php if(session()->getFlashdata('success')): ?>
    <p style="color:red"><?= session()->getFlashdata('success') ?></p>
<?php endif; ?>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="message success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form action="/login" method="post">
        <?= csrf_field() ?>
        <label>Username</label>
        <input type="text" name="username" value="<?= set_value('username') ?>" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>

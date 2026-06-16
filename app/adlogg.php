<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login – Tegna Travels</title>
    <link rel="stylesheet" href="assets/css/adlog.css">
</head>
    
<body>
    <section class="login-container">
        <div class="login-box">
            <div class="login-titel-container">
                <div class="img-container">
                    <img src="assets/img/tegna_logo.png" alt="tegna logo" class="login-img">
                </div>
                <h1 class="login-titel">tegna travels</h1>
                <h2 class="login-subtitel">welkom bij tegna travels</h2>
            </div>
            <form action="./acties/login.php" method="POST">
                <div class="input-box">
                    <input type="text" name="email" placeholder="Username" required>
                    <img src="assets/img/user.png" alt="" class="input-icon">
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <img src="assets/img/lock.png" alt="" class="input-icon">
                </div>
                <div class="remember-forgot">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </section>
</body>

</html>
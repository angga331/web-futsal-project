<!DOCTYPE html>
<html lang="en">

<head>
    <title>Buat Akun</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" href="img/createac.png">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url(img/bolaaa.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        .container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            max-width: 400px;
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            /* Lebih besar untuk tampilan yang lebih menarik */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
            /* Bayangan lebih besar untuk efek menarik */
        }

        .form-group label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-form">
            <h2 class="text-center mb-5">Buat <span class="text-success">Akun</span></h2>
            <form id="loginForm" action="../script/signup.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" maxlength="16" required>
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Konfirmasi Password:</label>
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" maxlength="16" required>
                </div>
                <div class="form-group">
                    <label for="no_telepon">Nomor Telepon:</label>
                    <input type="tel" class="form-control" id="no_telepon" name="no_telepon" maxlength="16" required>
                </div>
                <button type="submit" class="btn btn-success btn-block" id="submit" name="submit">Buat Akun</button>
            </form>
            <p class="mt-3 text-center">Sudah Memiliki Akun? <a class="create-account-link text-success"
                    href="../pages/login.php">Login</a></p>
        </div>
    </div>
</body>

</html>
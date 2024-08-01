<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Goat Futsal Arena</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" href="../img/login.png">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url(img/bolaaa.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;


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
            <h2 class="text-center mb-5">Login <span class="text-success">Goat Futsal Arena</span></h2>
            <form id="loginForm" action="../script/login.php" method="POST">
                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">Login</button>
            </form>
            <p class="mt-3 text-center">Belum memiliki akun? <a class="create-account-link text-success"
                    href="buat_akun.php">Buat akun</a></p>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
</script>


</html>
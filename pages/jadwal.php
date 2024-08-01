<?php include '../db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jadwal Goat Futsal Arena</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="icon" href="../img/jadwal.png">
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap" rel="stylesheet">

</head>

<body>
    <!-- MODAL -->
    <div class="modal" tabindex="-1" role="dialog" id="logoutModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin akan keluar?</p>
                </div>
                <div class="modal-footer">
                    <form method="post" action="../script/logout.php">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="confirmLogoutBtn" name="confirmLogoutBtn">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- NAVBAR -->
    <nav class="p-1 navbar navbar-expand-lg bg-dark navbar-dark position-fixed fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-5 text-white fs-5" href="#">
                <img src="../img/football.png" alt="icon" class="rounded-circle imgicon" />
                Goat Futsal Arena
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white fs-5" href="../pages/lapangan.php"><i
                                class="bi bi-plus-circle me-2"></i>Booking
                            Lapangan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white fs-5 me-1" href="../pages/jadwal.php"><i
                                class="bi bi-calendar-plus me-2"></i>Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-5 me-3" href="#"><i class="bi bi-person"></i>
                            Hallo!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><button class="btn btn-success">Logout</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- BANNER -->
    <div class="container-fluid banner d-flex">
        <div class="container text-white d-flex align-items-center">
            <h1 class="display-1 ms-5 fw-medium">WE COLOUR <span class="futsal">FUTSAL</span></h1>
        </div>
    </div>
    <!-- CONTENT -->
    <h3 class="text-center display-5 mt-2 fst-italic fw-bold">
        <img src="../img/ball.jpeg" class="img-fluid rounded-circle imgball"> Jadwal Goat Futsal Arena
    </h3>
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <h4 class="mb-3">Jadwal Lapang 1</h4>
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <?php include '../script/jadwal_con_1.php'; ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-5">
                    <h4 class="mb-3">Jadwal Lapang 2</h4>
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <?php include '../script/jadwal_con_2.php'; ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- MODAL -->
        <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingModalLabel">Letsgow Booking Secepat Mungkin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="namaTim" class="form-label">Nama Tim:</label>
                                <input type="text" class="form-control" id="namaTim" name="namaTim">
                            </div>
                            <div class="mb-3">
                                <label for="tanggalBooking" class="form-label">Tanggal Booking:</label>
                                <input type="date" class="form-control" id="tanggalBooking" name="tanggalBooking">
                            </div>
                            <div class="mb-3">
                                <label for="waktuMulai" class="form-label">Waktu Mulai:</label>
                                <input type="time" class="form-control" id="waktuMulai" name="waktuMulai">
                            </div>
                            <div class="mb-3">
                                <label for="waktuSelesai" class="form-label">Waktu Selesai:</label>
                                <input type="time" class="form-control" id="waktuSelesai" name="waktuSelesai">
                            </div>
                            <div class="mb-3">
                                <label for="kontakTim" class="form-label">Kontak Tim:</label>
                                <input type="text" class="form-control" id="kontakTim" name="kontakTim">
                            </div>
                            <div class="mb-3">
                                <label for="buktiBooking" class="form-label">Bukti Booking:</label>
                                <input type="file" class="form-control" id="buktiBooking" name="buktiBooking">
                            </div>
                        </form>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit Booking</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery. com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.getElementById('logoutLink').addEventListener('click', function () {
                var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
                logoutModal.show();
            });

            document.getElementById('confirmLogoutBtn').addEventListener('click', function () {
                document.querySelector('form[name="logoutForm"]').submit();
            });
        </script>
</body>

</html>
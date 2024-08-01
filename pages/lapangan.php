<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Lapang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="dist/css/lightbox.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/booking.png">
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
    <nav class="p-1 navbar navbar-expand-lg bg-dark navbar-dark position-fixed fixed-top ">
        <div class="container-fluid">
            <a class="navbar-brand ms-5 text-white fs-5" href="#">
                <img src="../img/football.png" alt="icon" class="rounded-circle imgicon" style="width: 40px; height: 40px;">
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
                        <a class="nav-link text-white fs-5 me-3" href="#.html">
                            <i class="bi bi-person"></i>
                            <?php
                                echo 'Hallo!';
                            ?>
                        </a>
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
        <div class="container text-white d-flex  align-items-center">
            <h1 class="display-1 ms-5 ">Sehatkan Dirimu<br>Dengan Berolahraga<br>Di Goat <span class="futsal">Futsal
                    Arena</span></h1>
        </div>
    </div>
    <!-- CONTENT -->
    <div class="container-fluid mt-4">
        <div class="text-center mt-3 mb-4">
            <p class="text-muted">Harap periksa <a href="../pages/jadwal.php" class="text-decoration-none fw-bold">Halaman
                    jadwal</a>
                sebelum melakukan booking.</p>
        </div>
        <div class="row justify-content-center">
            <!-- LAPANG 1 -->
            <div class="col-lg-3 text-center">
                <h3 class="mb-4">Lapang 1</h3>
                <hr>
                <div class="card">
                    <a href="../img/vinyl.jpeg" data-lightbox="lapang1" data-title="Lapang 1">
                        <img src="../img/vinyl.jpeg" alt="lapang1" class="img-fluid rounded"></a>
                </div>
            </div>
            <div class="col-lg-2 align-self-center">
                <h2 class="text-center"><strong>Senin - Minggu</strong></h2>
                <hr>
                <table class="table table-hover table-bordered">
                    <thead class="table">
                        <tr>
                            <th><i class="bi bi-clock"></i>Jam Main</th>
                            <th><i class="bi bi-coin"></i>Harga</th>
                        </tr>
                    </thead>
                   <?php include '../script/Jadwal_lapangaN_1.php'; ?>
                </table>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                    data-bs-target="#bookingModal1">Booking</button>
                <!-- MODAL BOOKING LAPANG 1 -->
                <div class="modal fade" id="bookingModal1" tabindex="-1" aria-labelledby="bookingModal1Label"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bookingModal1Label">Letsgow Booking Secepat Mungkin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="# d-flex justify-content-center">
                                <img src="../img/vinyl.jpeg" class="img-fluid bg-form">
                            </div>
                            <div class="modal-body">
                                <form id="bookingForm1" action="../script/booking_1.php" method="POST">
                                    <div class="mb-3">
                                        <label for="nama_penyewa" class="form-label">Nama Penyewa:</label>
                                        <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kontak_penyewa" class="form-label">Kontak Penyewa:</label>
                                        <input type="text" class="form-control" id="kontak_penyewa" name="kontak_penyewa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="namaTim" class="form-label">Nama Tim:</label>
                                        <input type="text" class="form-control" id="namaTim" name="namaTim">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalBooking" class="form-label">Tanggal Booking :</label>
                                        <input type="date" class="form-control" id="tanggalBooking"
                                            name="tanggalBooking">
                                    </div>
                                    <div class="mb-3">
                                        <label for="waktuMulai" class="form-label">Waktu Mulai :</label>
                                        <input type="time" class="form-control" id="waktuMulai" name="waktuMulai">
                                    </div>
                                    <div class="mb-3">
                                        <label for="waktuSelesai" class="form-label">Waktu Selesai :</label>
                                        <input type="time" class="form-control" id="waktuSelesai" name="waktuSelesai">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlahanggota" class="form-label">Jumlah Anggota</label>
                                        <input type="text" class="form-control" id="jumlahanggota" name="jumlahanggota">
                                    </div>
                                    <p>Transfer ke : Mandiri 1300020046549 a/n Goat Futsal Arena</p>
                                    <div class="mb-3">
                                        <label for="photo_url" class="form-label">Bukti Booking:</label>
                                        <input type="file" class="form-control" id="photo_url" name="photo_url">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit1" class="btn btn-primary" id="submit1" name="submit1">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- LAPANG 2 -->
            <div class=" col-lg-3 text-center">
                <h3 class="mb-4">Lapang 2</h3>
                <hr>
                <div class="card">
                    <a href="../img/sintetis.jpeg" data-lightbox="lapang2" data-title="Lapang 2">
                        <img src="../img/sintetis.jpeg" alt="lapang2" class="img-fluid lapang2 rounded">
                    </a>
                </div>

            </div>
            <div class="col-lg-2 align-self-center">
                <h2 class="text-center"><strong>Senin - Minggu</strong></h2>
                <hr>
                <table class="table table-hover table-bordered">
                    <thead class="table">
                        <tr>
                            <th><i class="bi bi-clock"></i>Jam Main</th>
                            <th><i class="bi bi-coin"></i>Harga</th>
                        </tr>
                    </thead>
                   <?php include "../script/Jadwal_LapangaN_2.php"?>
                </table>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                    data-bs-target="#bookingModal">Booking</button>
                <!-- MODAL BOOKING LAPANG 2 -->
                <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bookingModalLabel">Letsgow Booking Secepat Mungkin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="# d-flex justify-content-center">
                                <img src="../img/sintetis.jpeg" class="img-fluid bg-form">
                            </div>
                            <div class="modal-body">
                                <form id="bookingForm2" action="../script/booking_2.php" method="POST">
                                    <div class="mb-3">
                                        <label for="nama_penyewa" class="form-label">Nama Penyewa:</label>
                                        <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kontak_penyewa" class="form-label">Kontak Penyewa:</label>
                                        <input type="text" class="form-control" id="kontak_penyewa" name="kontak_penyewa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="namaTim" class="form-label">Nama Tim :</label>
                                        <input type="text" class="form-control" id="namaTim" name="namaTim">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggalBooking" class="form-label">Tanggal Booking :</label>
                                        <input type="date" class="form-control" id="tanggalBooking"
                                            name="tanggalBooking">
                                    </div>
                                    <div class="mb-3">
                                        <label for="waktuMulai" class="form-label">Waktu Mulai :</label>
                                        <input type="time" class="form-control" id="waktuMulai" name="waktuMulai">
                                    </div>
                                    <div class="mb-3">
                                        <label for="waktuSelesai" class="form-label">Waktu Selesai :</label>
                                        <input type="time" class="form-control" id="waktuSelesai" name="waktuSelesai">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlahanggota" class="form-label">Jumlah Anggota</label>
                                        <input type="text" class="form-control" id="jumlahanggota" name="jumlahanggota">
                                    </div>
                                    <p>Transfer ke : Mandiri 1300020046549 a/n Goat Futsal Arena</p>
                                    <div class="mb-3">
                                        <label for="buktiBooking" class="form-label">Bukti Booking:</label>
                                        <input type="file" class="form-control" id="photo_url" name="photo_url">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit2" class="btn btn-primary" id="submit2" name="submit2">Submit</button>
                                    </div>                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="dist/js/lightbox-plus-jquery.min.js"></script>
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
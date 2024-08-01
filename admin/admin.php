<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Goat Futsal Arena</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/admin.png">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-lg-2 d-lg-block bg-success sidebar collapse sticky-top">
                <div class="d-flex flex-column justify-content-between" style="height: 100%;">
                    <div class="mt-4 text-center">
                        <h3 class=" text-white">Admin</h3>
                        <hr>
                        <ul class="nav flex-column text-center">
                            <li class="nav-item mb-3">
                                <a class="nav-link text-white" id="v-pills-admin-tab" data-bs-toggle="pill" href="#v-pills-admin" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                    Data Admin
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="nav-link text-white" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                    Data Member
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                    Data Lapangan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white mt-3" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                    Data Pesanan
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-auto pb-3">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <a href="../pages/login.php">
                                    <button class="btn btn-success w-75">Logout</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- DATA ADMIN -->
            <main class="col-lg-9 ms-sm-auto col-lg-10 px-md-4 dashboard-content">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade" id="v-pills-admin" role="tabpanel" aria-labelledby="v-pills-admin-tab">
                        <h2>Data Admin</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Admin</th>
                                        <th>No Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php include 'data_admin.php';
                                        ?>
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAdminModal">
                            Tambah
                        </button>
                        <!-- Pop up Modal Admin -->
                        <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addAdminModalLabel">Tambah Admin Baru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="data_admin.php">
                                            <div class="mb-3">
                                                <label for="nama_admin" class="form-label">Nama Admin:</label>
                                                <input type="text" class="form-control" id="adminName" name="adminName" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="no_telepon" class="form-label">No Telepon:</label>
                                                <input type="tel" class="form-control" id="adminPhone" name="adminPhone" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="submit" name="submit">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success expor-admin"  id="exportButtonAdmin">Ekspor Csv</button>
                    </div>
                    <!-- DATA MEMBER  -->
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <h2>Data Member</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Member</th>
                                        <th>No Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php include 'data_member.php'; ?>
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-success" id="exportButtonMember">Ekspor Csv</button>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <h2>Data Lapangan</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lapangan</th>
                                        <th>Kualitas Lapangan</th>
                                        <th>Harga Di Jam Main 08.00 - 17.00</th>
                                        <th>Harga Di Jam Main 17.00 - 22.00</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php include 'data_lapangan.php';?>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <button class="btn btn-success" id="exportButtonLapangan">Ekspor Csv</button>
                            
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <h2>Data Pesanan</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tim</th>
                                        <th>Lapangan</th>
                                        <th>Tanggal Booking</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>  
                                        <th>Bukti Booking</th>
                                        <th>Status</th>
                                        <th>Konfirmasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php include 'data_pesanan.php';?>
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-success" id="exportButtonPesanan">Ekspor Csv</button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Pop Up Modal Data Edit Admin -->
    <div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAdminModalLabel">Edit Data Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="data_admin.php">
                        <input type="hidden" id="editAdminId" name="adminId">
                        <div class="mb-3">
                            <label for="editAdminName" class="form-label">Nama Admin:</label>
                            <input type="text" class="form-control" id="editAdminName" name="editAdminName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAdminPhone" class="form-label">No Telepon:</label>
                            <input type="tel" class="form-control" id="editAdminPhone" name="editAdminPhone" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="update">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Pop Up Modal Data Edit Member -->
<div class="modal fade" id="editMemberModal" tabindex="-1" aria-labelledby="editMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMemberModalLabel">Edit Data Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="data_member.php">
                    <input type="hidden" id="editMemberId" name="memberId">
                    <div class="mb-3">
                        <label for="editMemberName" class="form-label">Nama Member:</label>
                        <input type="text" class="form-control" id="editMemberName" name="editMemberName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editMemberPhone" class="form-label">No Telepon:</label>
                        <input type="tel" class="form-control" id="editMemberPhone" name="editMemberPhone" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="updateMember">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Pop Up Modal Data Edit Data Lapangan -->
    <div class="modal fade" id="editLapanganModal" tabindex="-1" aria-labelledby="editLapanganModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLapanganModalLabel">Edit Data Lapangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST" action="data_lapangan.php"> <!-- Gantilah action dengan URL Anda -->
                    <input type="hidden" name="editLapanganId" id="editLapanganId" value="">
                    
                    <div class="mb-3">
                        <label for="editLapanganName" class="form-label">Nama Lapangan</label>
                        <input type="text" class="form-control" id="editLapanganName" name="editLapanganName" required>
                    </div>

                    <div class="mb-3">
                        <label for="editKualitasLapangan" class="form-label">Kualitas Lapangan</label>
                        <input type="text" class="form-control" id="editKualitasLapangan" name="editKualitasLapangan" required>
                    </div>

                    <div class="mb-3">
                        <label for="editHargaJamNormal" class="form-label">Harga per Jam (Normal)</label>
                        <input type="text" class="form-control" id="editHargaJamNormal" name="editHargaJamNormal" required>
                    </div>

                    <div class="mb-3">
                        <label for="editStatusLapangan" class="form-label">Status Lapangan</label>
                        <select class="form-select" id="editStatusLapangan" name="editStatusLapangan" required>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="updateLapangan">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Pop up Modal Hapus Admin -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <input type="hidden" id="deleteId">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin untuk menghapus Admin ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="deleteConfirmed">Hapus</button>
                </div>
            </div>
        </div>
    </div>

 <!-- Pop up Modal Hapus Member -->
 <div class="modal fade" id="confirmDeleteMember" tabindex="-1" aria-labelledby="confirmDeleteMemberLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteMemberLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus member ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="deleteConfirmed-Member">Hapus</button>
                <input type="hidden" id="deleteIdMember" name="deleteIdMember" value="">
            </div>
        </div>
    </div>
</div>


     <!-- Pop up Modal Hapus Lapangan -->
     <div class="modal fade" id="confirmDeleteLapangan" tabindex="-1" aria-labelledby="confirmDeleteLapanganLabel" aria-hidden="true">
    <input type="hidden" id="deleteId">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLapanganLabel">Konfirmasi </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin untuk menghapus Lapangan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="deleteConfirmed">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pop up Modal Hapus Pesanan -->
    <div class="modal fade" id="confirmDeletePesan" tabindex="-1" aria-labelledby="confirmDeletePesanLabel" aria-hidden="true">
    <input type="hidden" id="deleteIdPesanan">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeletePesanLabel">Konfirmasi </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin untuk menghapus Pesanan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="deleteConfirmedPesanan">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    


    <!-- Pop up Modal Konfir -->
    <div class="modal fade" id="konfirPesanan" tabindex="-1" aria-labelledby="konfirPesananLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="konfirPesananLabel">Konfirmasi Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Cek Ulang kembali Data pesanan, Jika sudah fix silahkan konfirmasi
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success" id="konfirPesanan">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal structure (place this somewhere in your HTML body) -->
<div id="imageModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
   $('.edit-button').click(function() {
    var adminId = $(this).data('id'); // Mengambil data-id dari tombol yang diklik
    var adminName = $(this).data('name'); // Mengambil data-name
    var adminPhone = $(this).data('phone'); // Mengambil data-phone

    // Set nilai form modal dengan data yang diambil
    $('#editAdminModal #editAdminId').val(adminId);
    $('#editAdminModal #editAdminName').val(adminName);
    $('#editAdminModal #editAdminPhone').val(adminPhone);

    // Menampilkan modal
    $('#editAdminModal').modal('show');
});

$('.edit-member-button').click(function() {
    var memberId = $(this).data('id'); // Mengambil data-id dari tombol yang diklik
    var memberName = $(this).data('name'); // Mengambil data-name
    var memberPhone = $(this).data('phone'); // Mengambil data-phone

    // Set nilai form modal dengan data yang diambil
    $('#editMemberModal #editMemberId').val(memberId);
    $('#editMemberModal #editMemberName').val(memberName);
    $('#editMemberModal #editMemberPhone').val(memberPhone);

    // Menampilkan modal
    $('#editMemberModal').modal('show');
});


$('.edit-lapangan-button').click(function() {
    var lapanganId = $(this).data('id'); // Mengambil data-id dari tombol yang diklik
    var lapanganName = $(this).data('name'); // Mengambil data-name
    var kualitasLapangan = $(this).data('kualitas'); // Mengambil data-kualitas
    var hargaJamNormal = $(this).data('harganormal'); // Mengambil data-harganormal
    var statusLapangan = $(this).data('status'); // Mengambil data-status

    // Set nilai form modal dengan data yang diambil
    $('#editLapanganModal #editLapanganId').val(lapanganId);
    $('#editLapanganModal #editLapanganName').val(lapanganName);
    $('#editLapanganModal #editKualitasLapangan').val(kualitasLapangan);
    $('#editLapanganModal #editHargaJamNormal').val(hargaJamNormal);
    $('#editLapanganModal #editStatusLapangan').val(statusLapangan);

    // Menampilkan modal
    $('#editLapanganModal').modal('show');
});

document.getElementById("exportButtonAdmin").addEventListener("click", function() {
            // Send an AJAX request to the data_admin.php script
            var xhr = new XMLHttpRequest();
            var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/FrontendWebFutsal/admin/data_admin.php?export=true", true);
    xhr.responseType = "blob";
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Create a download link for the CSV file
                    var blob = new Blob([xhr.response], { type: "text/csv" });
                    var link = document.createElement("a");
                    link.href = window.URL.createObjectURL(blob);
                    link.download = "data_admin.csv";
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }
            };
            xhr.send();
        });

document.getElementById("exportButtonMember").addEventListener("click", function() {
    // Send an AJAX request to the data_admin.php script
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/FrontendWebFutsal/admin/data_member.php?export=true", true); // Add a query parameter to specify export
    xhr.responseType = "blob"; // Set response type to blob
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Create a download link for the CSV file
            var blob = new Blob([xhr.response], { type: "text/csv" });
            var link = document.createElement("a");
            link.href = window.URL.createObjectURL(blob);
            link.download = "data_member.csv";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    };
    xhr.send();
});

document.getElementById("exportButtonLapangan").addEventListener("click", function() {
    // Send an AJAX request to the data_admin.php script
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/FrontendWebFutsal/admin/data_lapangan.php?export=true", true); // Add a query parameter to specify export
    xhr.responseType = "blob"; // Set response type to blob
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Create a download link for the CSV file
            var blob = new Blob([xhr.response], { type: "text/csv" });
            var link = document.createElement("a");
            link.href = window.URL.createObjectURL(blob);
            link.download = "data_lapangan.csv";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    };
    xhr.send();
});


document.getElementById("exportButtonPesanan").addEventListener("click", function() {
    // Send an AJAX request to the data_admin.php script
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/FrontendWebFutsal/admin/data_pesanan.php?export=true", true); // Add a query parameter to specify export
    xhr.responseType = "blob"; // Set response type to blob
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Create a download link for the CSV file
            var blob = new Blob([xhr.response], { type: "text/csv" });
            var link = document.createElement("a");
            link.href = window.URL.createObjectURL(blob);
            link.download = "data_pesanan.csv";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    };
    xhr.send();
});

// JavaScript to handle delete button click Admin
document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".delete-button");

    deleteButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const deleteId = button.getAttribute("data-id");

            // Set nilai input hidden pada modal dengan ID 'deleteId'
            document.getElementById("deleteId").value = deleteId;

            // Tampilkan modal konfirmasi penghapusan
            const confirmDeleteModal = new bootstrap.Modal(document.getElementById("confirmDeleteModal"));
            confirmDeleteModal.show();
        });
    });

    // JavaScript to handle delete confirmation Admin
const deleteConfirmedButton = document.getElementById("deleteConfirmed");

deleteConfirmedButton.addEventListener("click", function () {
    const deleteId = document.getElementById("deleteId").value;

    // Mengirim permintaan penghapusan dengan AJAX
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../admin/data_admin.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {

            // Refresh halaman atau lakukan operasi lain yang sesuai
            location.reload();
        }
    };
    xhr.send("deleteId=" + deleteId);
});

});


function konfirmasiPesanan(idBooking) {
    // AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../admin/data_pesanan.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Handle response here
            console.log(xhr.responseText);
            location.reload(); // Reload halaman untuk melihat perubahan
        }
    }
    xhr.send("id_booking=" + idBooking);
}




$(document).ready(function() {
    $('.tutup').click(function() {
        $('#imageModal').modal('hide'); // Menutup modal dengan ID "imageModal"
    });

    $('.view-image').click(function(e) {
        e.preventDefault();
        var imgUrl = $(this).data('img-url');

        // Buat dialog modal
        var modal = $('<div class="modal" id="imageModal" tabindex="-1" role="dialog">\
            <div class="modal-dialog" role="document">\
                <div class="modal-content">\
                    <div class="modal-body">\
                        <img src="' + imgUrl + '" class="img-fluid">\
                    </div>\
                    <div class="modal-footer">\
                        <button type="button" class="btn btn-secondary tutup" data-dismiss="modal">Tutup</button>\
                    </div>\
                </div>\
            </div>\
        </div>');

        // Tambahkan modal ke dalam body dan tampilkan
        modal.appendTo('body');
        modal.modal('show');

        // Hapus modal dari DOM saat ditutup
        modal.on('hidden.bs.modal', function () {
            modal.remove();
        });
    });
});





</script>
</html>
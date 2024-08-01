<?php
include '../db_connect.php';

// Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek Koneksi
if ($conn->connect_error) {
    die("Koneksi error: " . $conn->connect_error);
}


// Menggabungkan tabel booking dan tim menggunakan INNER JOIN
$query = "SELECT booking.*, tim.Nama_Tim, lapangan.lapangan FROM booking 
INNER JOIN tim ON booking.ID_Tim = tim.ID_Tim
INNER JOIN lapangan ON booking.ID_Lapangan = lapangan.ID_Lapangan"; // removed the extra comma before FROM
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row_number = 1; // Inisialisasi nomor urut
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row_number . "</td>";
        echo "<td>" . $row['Nama_Tim'] . "</td>"; // Menampilkan Nama Tim dari tabel tim
        echo "<td>" . $row['lapangan'] . "</td>"; // Menampilkan Lapangan dari tabel lapangan
        echo "<td>" . $row['Tanggal_Booking'] . "</td>"; // Tanggal Booking dari tabel booking
        echo "<td>" . $row['Waktu_Mulai'] . "</td>"; // Waktu Mulai dari tabel booking
        echo "<td>" . $row['Waktu_Selesai'] . "</td>"; // Waktu Selesai dari tabel booking
        echo "<td><a href='#' class='view-image' data-img-url='" . $row['photo_url'] . "'>Lihat Bukti</a></td>";
        echo "<td>" . $row['Status_Booking'] . "</td>";
        echo "<td>";
        echo '<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#konfirPesananModal'.$row['ID_Booking'].'">Konfir</button>';
        echo "</td>";
        echo "</tr>";

        $row_number++; // Menambah nomor urut untuk baris berikutnya
    }
} else {
    echo "<tr><td colspan='7'>No data found</td></tr>";
}

// Kode untuk mengekspor data booking ke CSV
if (isset($_GET['export'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data_booking.csv');

    // Membuat file output
    $output = fopen("php://output", "w");

    // Menulis header kolom ke file CSV
    fputcsv($output, array('No', 'Nama Tim', 'Tanggal Booking', 'Waktu Mulai', 'Waktu Selesai', 'Link Bukti Booking'));

    // Query untuk mengambil data booking dan tim menggunakan INNER JOIN
    $query = "SELECT booking.*, tim.Nama_Tim FROM booking INNER JOIN tim ON booking.ID_Tim = tim.ID_Tim";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row_number = 1; // Inisialisasi nomor urut
        while ($row = $result->fetch_assoc()) {
            // Asumsi bahwa kolom bukti booking adalah 'Link_Bukti_Booking', sesuaikan jika berbeda
            $link_bukti_booking = 'path-to-bukti-booking/' . $row['ID_Booking'] . '.jpg';
            
            // Array data dengan nomor urut otomatis
            $data = array(
                $row_number,
                $row['Nama_Tim'],
                $row['Tanggal_Booking'],
                $row['Waktu_Mulai'],
                $row['Waktu_Selesai'],
                $link_bukti_booking
            );

            // Menulis baris data ke file CSV
            fputcsv($output, $data);

            $row_number++; // Menambah nomor urut untuk baris berikutnya
        }
    } else {
        echo "No data found";
    }

    fclose($output);
    exit();
}

// Modal Konfirmasi untuk setiap pesanan
if ($result->num_rows > 0) {
    $result->data_seek(0); // Kembali ke awal result set
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="modal fade" id="konfirPesananModal'.$row['ID_Booking'].'" tabindex="-1" aria-labelledby="konfirPesananLabel'.$row['ID_Booking'].'" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="konfirPesananLabel'.$row['ID_Booking'].'">Konfirmasi Pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Cek Ulang kembali Data pesanan, Jika sudah fix silahkan konfirmasi
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-success" onclick="konfirmasiPesanan('.$row['ID_Booking'].')">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_booking'])) {
    $id_booking = $conn->real_escape_string($_POST['id_booking']);

    // Query untuk mengupdate status booking
    $query = "UPDATE booking SET Status_Booking='Lunas' WHERE ID_Booking=" . $id_booking;

    if ($conn->query($query) === TRUE) {
        echo "Pesanan dikonfirmasi";
    } else {
        echo "Error: " . $conn->error;
    }
}



$conn->close();


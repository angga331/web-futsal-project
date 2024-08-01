<?php
include '../db_connect.php';

$conn = new mysqli($servername, $username, $password, $dbname);

$recordsPerPage = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$offset = ($page - 1) * $recordsPerPage;

$sql = "SELECT booking.*, tim.Nama_Tim FROM booking
        JOIN tim ON booking.id_tim = tim.id_tim
        JOIN lapangan ON booking.id_lapangan = lapangan.id_lapangan
        WHERE lapangan.id_lapangan = 1
        AND booking.status_booking = 'Lunas'
        ORDER BY tanggal_booking, Waktu_Mulai DESC
        LIMIT $offset, $recordsPerPage";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-hover table-bordered'>";
        echo "<thead class='table'>
                <tr>
                    <th><i class='bi bi-alexa'></i>Nama Tim</th>
                    <th><i class='bi bi-calendar2'></i>Tanggal Booking</th>
                    <th><i class='bi bi-clock'></i>Waktu Mulai</th>
                    <th><i class='bi bi-clock'></i>Waktu Selesai</th>
                    <th><i class='bi bi-eye'></i>Status</th>
                </tr>
            </thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Nama_Tim'] . "</td>";
            echo "<td>" . $row['Tanggal_Booking'] . "</td>";
            echo "<td>" . $row['Waktu_Mulai'] . "</td>";
            echo "<td>" . $row['Waktu_Selesai'] . "</td>";
            echo "<td>" . $row['Status_Booking'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        echo "<div class='pagination-container'>";
        echo "<nav aria-label='...'>";
        echo "<ul class='pagination pagination-sm'>";

        $totalRecords = mysqli_query($conn, "SELECT COUNT(*) FROM booking");
        $totalPages = ceil(mysqli_fetch_array($totalRecords)[0] / $recordsPerPage);

        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<li class='page-item " . ($i == $page ? 'active' : '') . "' aria-current='page'>";
            echo "<a class='page-link' href='?page=$i'>$i</a>";
            echo "</li>";
        }

        echo "</ul>";
        echo "</nav>";
        echo "</div>";
    } else {
        echo "<tr><td colspan='6'>No records found</td></tr>";
    }

    mysqli_free_result($result);
} else {
    echo "<tr><td colspan='6'>Error executing query</td></tr>";
}

$conn->close();
?>

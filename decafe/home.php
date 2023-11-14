<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_menu");
while ($row = mysqli_fetch_array($query)) {
    $result[] = $row;
}
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="col-lg-9 mt-2">
    <!--Carausel-->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carausel">
        <div class="carousel-indicators">
            <?php
            $slide = 0;
            $firstSlideButton = true;
            foreach ($result as $dataTombol) {
                ($firstSlideButton) ? $aktif = "active" : $aktif = "";
                $firstSlideButton = false;
            ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide ?>" class="<?php echo $aktif ?>" aria-current="true" aria-label="Slide <?php echo $slide + 1 ?>"></button>
            <?php
                $slide++;
            }
            ?>
        </div>
        <div class="carousel-inner rounded">
            <?php
            $firstSlide = true;
            foreach ($result as $data) {
                ($firstSlide) ? $aktif = "active" : $aktif = "";
                $firstSlide = false;
            ?>
                <div class="carousel-item <?php echo $aktif ?>">
                    <img src="assets/img/<?php echo $data['foto'] ?>" class="img-fluid" style="height: 250px; width: 1000px; object-fit:cover" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $data['nama_menu'] ?></h5>
                        <p><?php echo $data['keterangan'] ?></p>
                    </div>
                </div>
            <?php  } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--Akhir Carausel-->

    <!-- Awal Judul-->
    <div class="card mt-4 border-0 bg-light">
        <div class="card-body text-center">
            <h5 class="card-title">DECAFE - APLIKASI PEMESANAN MAKANAN DAN MINUMAN CAFE</h5>
            <p class="card-text">Aplikasi Pemesanan Makanan Dan Minuman Yang Mudah dan Praktis. Nikmati Berbagai Menu Makanan dan Minuman Favorit Anda Dengan Beberapa Klik. Pesan, Bayar, Dan Lacak Pesanan Anda Dengan Mudah Melalui Aplikasi Ini.
            </p>
            <a href="order" class="btn btn-primary">Buat Order</a>
        </div>
    </div>
    <!--akhir judul -->
    <!-- Awal chart-->
    <div class="card mt-4 border-0 bg-light">
        <div class="card-body text-center">
            <div>
                <canvas id="myChart"></canvas>
            </div>
            <script>
                const ctx = document.getElementById('myChart');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 13, 5, 20, 3],
                            borderWidth: 1,
                            backgroundColor:[
                                'rgba(245, 40, 145, 0.8)',
                                'rgba(101, 34, 68, 0.8)',
                                'rgba(237, 230, 28, 0.8)',
                                'rgba(78, 212, 56, 0.8)',
                                'rgba(197, 56, 212, 0.8)',
                                'rgba(255, 129, 0, 0.8)',
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
    <!--akhir chart -->
</div>
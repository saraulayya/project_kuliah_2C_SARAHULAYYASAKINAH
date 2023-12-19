<?php
include "prosses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_pasien");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Pasien
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahPasien"> Tambah Pasien</button>
                </div>
            </div>
            
            <!-- Modal Tambah User Baru-->
            <div class="modal fade" id="ModalTambahPasien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pasien</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="prosses/proses_input_pasien.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingName" placeholder="Your name" name="nama_pasien" required>
                                            <label for="floatingname">Name</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Pasien.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingKeluhan/penyakit" placeholder="Your Name" name="Keluhan/Penyakit" required>
                                            <label for="floatingInput">Keluhan/Penyakit</label>
                                            <div class="invalid-feedback">
                                                Masukan Keluhan/Penyakit.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="tipe_pasien" required>
                                                <option selected hidden value="">Pilih tipe Pasien</option>
                                                <option value="1">Rawat Inap</option>
                                                <option value="2">Rawat Jalan</option>
                                            </select>
                                            <label for="floatingInput">Tipe</label>
                                            <div class="invalid-feedback">
                                                Pilih Tipe Pasien.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxx" name="nohp">
                                            <label for="floatingInput">No HP</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="" style="height: 100px;" name="alamat"></textarea>
                                    <label for="floatingInput">Alamat</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_pasien_validate" value="12345">Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Tambah User Baru-->

            <?php
            foreach ($result as $row) {
            ?>
                <!-- Modal View-->
                <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Pasien</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="prosses/proses_input_pasien.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your name" name="nama_pasien" value="<?php echo $row['nama_pasien'] ?>">
                                                <label for="floatingInput">Nama</label>
                                                <div class="invalid-feedback">
                                                    Masukan Nama Pasien.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Keluhan" name="keluhan" value="<?php echo $row['keluhan'] ?>">
                                                <label for="floatingInput">Keluhan/Penyakit</label>
                                                <div class="invalid-feedback">
                                                    Masukan Keluhan/Penyakit.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                            <select disabled class="form-select" aria-label="Default select example" required name="Tipe" id="">
                                                <?php
                                                $data = array("Rawat Inap","Rawat Jalan");
                                                foreach($data as $key => $value) {
                                                    if($row['tipe_pasien'] == $key+1) {
                                                        echo "<option selected value='$key'>$value</option>";
                                                    }else{
                                                        echo "<option value='$key'>$value</option>";
                                                    }
                                                }
                                                ?>
                                                </select>
                                                <label for="floatingInput">Tipe Pasien</label>
                                                <div class="invalid-feedback">
                                                    Pilih Tipe Pasien.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-floating mb-3">
                                                <input disabled type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxx" name="nohp" value="<?php echo $row['nohp'] ?>">
                                                <label for="floatingInput">No HP</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating">
                                        <textarea disabled class="form-control" id="" style="height: 100px;" name="alamat"><?php echo $row['alamat'] ?></textarea>
                                        <label for="floatingInput">Alamat</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Akhir Modal View-->

                <!-- Modal Edit-->
                <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pasien</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="prosses/proses_edit_pasien.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Your name" name="nama_pasien" required value="<?php echo $row['nama_pasien'] ?>">
                                                <label for="floatingInput">Nama</label>
                                                <div class="invalid-feedback">
                                                    Masukan Nama Pasien.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input  type="text" class="form-control" id="floatingInput" placeholder="keluhan" name="Keluhan/Penyakit" required value="<?php echo $row['keluhan'] ?>">
                                                <label for="floatingInput">Keluhan/Penyakit</label>
                                                <div class="invalid-feedback">
                                                    Masukan Keluhan/Penyakit.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" aria-label="Default select example" required name="Tipe" id="">
                                                <?php
                                                $data = array("Rawat Inap","Rawat Jalan");
                                                foreach($data as $key => $value) {
                                                    if($row['tipe_pasien'] == $key+1) {
                                                        echo "<option selected value=".($key+1).">$value</option>";
                                                    }else{
                                                        echo "<option value=".($key+1).">$value</option>";
                                                    }
                                                }
                                                ?>
                                                </select>
                                                <label for="floatingInput">Tipe Pasien</label>
                                                <div class="invalid-feedback">
                                                    Pilih Tipe Pasien.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxx" name="nohp" value="<?php echo $row['nohp'] ?>">
                                                <label for="floatingInput">NoHP</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" id="" style="height: 100px;" name="alamat"><?php echo $row['alamat'] ?></textarea>
                                        <label for="floatingInput">Alamat</label>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_pasien_validate" value="12345">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Akhir Modal Edit-->

                
                
            <?php
            }
            if (empty($result)) {
                echo "Data user tidak ada";
            } else

            ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Tipe Pasien</th>
                            <th scope="col">Keluhan/Penyakit</th>
                            <th scope="col">Asal Rujukan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $no = 1;
                    foreach ($result as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td><?php echo $row['nama_pasien'] ?></td>
                                <td><?php
                                    if ($row['tipe_pasien'] == 1) {
                                        echo "Rawat Inap";
                                    } elseif ($row['tipe_pasien'] == 2) {
                                        echo "Rawat Jalan";
                                    }
                                    ?></td>
                                <td><?php echo $row['keluhan'] ?></td>
                                <td><?php echo $row['asal_rujukan'] ?></td>
                                <td class="d-flex">
                                    <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></i></button>
                            
                                    
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php

            ?>
        </div>
    </div>
</div>

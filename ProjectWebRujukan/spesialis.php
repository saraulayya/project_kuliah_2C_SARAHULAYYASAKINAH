<?php
include "prosses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_spesialis");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Spesialis
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahspesialis"> Tambah Dokter</button>
                </div>
            </div>

            <!-- Modal Tambah User Baru-->
            <div class="modal fade" id="ModalTambahspesialis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Dokter</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="prosses/proses_input_spesialis.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingName" placeholder="Your name" name="nama_dokter" required>
                                            <label for="floatingname">Nama Dokter</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Dokter.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="Spesialis" required>
                                            <label for="floatingInput">Spesialis</label>
                                            <div class="invalid-feedback">
                                                Masukan Spesialis.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="jadwal_kerja" required>
                                        <label for="floatingInput">Jadwal Kerja</label>
                                        <div class="invalid-feedback">
                                            Masukan Jadwal Kerja
                                        </div>
                                    </div>
                                </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxx" name="no_asisten" required>
                                <label for="floatingInput">No HP Asisten</label>
                                <div class="invalid-feedback">
                                    No HP Asisten
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control"  id="floatingInput" placeholder="penempatan" name="penempatan"></textarea>
                                <label for="floatingInput">Penempatan</label>
                                <div class="invalid-feedback">
                                    Penempatan
                                </div>
                            </div>
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
        </div>
        <!-- Akhir Modal Tambah User Baru-->

        <?php
        foreach ($result as $row) {
        ?>
            <!-- Modal View-->
            <div class="modal fade" id="ModalView<?php echo $row['id_dokter'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Spesialis</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="prosses/proses_input_spesialis.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your name" name="nama_dokter" value="<?php echo $row['nama_dokter'] ?>">
                                            <label for="floatingInput">Nama Dokter</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Dokter.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="spesialis" name="Spesialis" value="<?php echo $row['spesialis'] ?>">
                                            <label for="floatingInput">Spesialis</label>
                                            <div class="invalid-feedback">
                                                Masukan Spesialis.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <input disabled type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxx" name="no_asisten" value="<?php echo $row['no_asisten'] ?>">
                                            <label for="floatingInput">No HP Asisten</label>
                                        </div>
                                    </div>
                                
                                <div class="form-floating">
                                    <textarea disabled class="form-control" id="" name="penempatan"><?php echo $row['penempatan'] ?></textarea>
                                    <label for="floatingInput">Penempatan</label>
                                </div>
                                <div class="form-floating">
                                    <textarea disabled class="form-control" id="" name="jadwal_kerja"><?php echo $row['jadwal_kerja'] ?></textarea>
                                    <label for="floatingInput">Jadwal Kerja</label>
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
            <div class="modal fade" id="ModalEdit<?php echo $row['id_dokter'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Dokter</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="prosses/proses_edit_spesialis.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id_dokter'] ?>" name="id_dokter">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your name" name="nama_dokter" required value="<?php echo $row['nama_dokter'] ?>">
                                            <label for="floatingInput">Nama Dokter</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Dokter.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="spesialis" name="spesialis" required value="<?php echo $row['spesialis'] ?>">
                                            <label for="floatingInput">Spesialis</label>
                                            <div class="invalid-feedback">
                                                Masukan Spesialis.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxx" name="no_asisten" value="<?php echo $row['no_asisten'] ?>">
                                            <label for="floatingInput">No Asisten</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="" name="Penempatan"><?php echo $row['penempatan'] ?></textarea>
                                    <label for="floatingInput">Penempatan</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="" name="jadwal_kerja"><?php echo $row['jadwal_kerja'] ?></textarea>
                                    <label for="floatingInput">Jadwal Kerja</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_spesialis_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
            <!--Akhir Modal Edit-->



        <?php
        }
        if (empty($result)) {
            echo "Data Spesialis tidak ada";
        } else

        ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Spesialis</th>
                        <th scope="col">Penempatan</th>
                        <th scope="col">Jadwal Kerja</th>
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
                            <td><?php echo $row['nama_dokter'] ?></td>
                            <td><?php echo $row['spesialis'] ?></td>
                            <td><?php echo $row['no_asisten'] ?></td>
                            <td><?php echo $row['penempatan'] ?></td>
                            <td><?php echo $row['jadwal_kerja'] ?></td>
                            <td class="d-flex">
                                <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id_dokter'] ?>"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_dokter'] ?>"><i class="bi bi-pencil-square"></i></i></button>


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
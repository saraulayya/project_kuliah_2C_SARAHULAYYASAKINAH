<?php
include "prosses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT * FROM tb_janji LEFT JOIN tb_pasien ON tb_pasien.nama_pasien = tb_janji.spesialis");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

// $select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,kategori_menu FROM tb_kategori_menu");
?>

<div class="col-lg-9 mt-2 ">
    <div class="card">
        <div class="card-header">
            Halaman Jadwal Dan Janji
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah Janji</button>
                </div>
            </div>
            <!-- Modal tambah Order baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jadwal dan janji</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="prosses/proses_input_janji.php" method="POST">
                                <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingnojanji"
                                            placeholder="no_janji" name="no_janji" required>
                                            <label for="floatingnojanji">No Janji</label>
                                            <div class="invalid-feedback">
                                                Please choose a num of tabel.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingnamadokter"
                                            placeholder="nama_dokter" name="nama_dokter" required>
                                            <label for="floatingnamadokter">Nama Dokter</label>
                                            <div class="invalid-feedback">
                                                Please choose a num of tabel.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingpasien" 
                                            placeholder="Nama Pasien" name="nama_pasien" required>
                                            <label for="floatingpasien">Nama Pasien</label>
                                            <div class="invalid-feedback">
                                                Please choose a name.
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingspesialis" 
                                            placeholder="spesialis" name="spesialis" required>
                                            <label for="Floatingspesialis">Spesialis</label>
                                            <div class="invalid-feedback">
                                                Please choose a name.
                                            </div>
                                        </div>
                                        </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingjadwaltemu"
                                             placeholder="jadwal temu" name="jadwal_temu" required>
                                            <label for="floatingjadwaltemu">Jadwal Temu</label>
                                            <div class="invalid-feedback">
                                                Please choose a name.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="input_janji_validate" value="12345">Buat Janji</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal tambah order baru -->
        <?php
        if (empty($result)) {
            echo "Data Janji Tidak Ada";
        } else {
            foreach ($result as $row) {
        ?>
                

                <!-- Modal edit-->
                <div class="modal fade" id="ModalEdit<?php echo $row['kode_janji'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jadwal dan Janji</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form class="needs-validation" novalidate action="prosses/proses_edit_janji.php" method="POST">
                                <input type="hidden" name="no_janji" value="<?php echo $row ['no_janji'] ?>">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="uploadFoto" name="kode_order" value="<?php echo $row['id_order'] ?>" readonly>
                                            <label for="uploadFoto">Kode Order</label>
                                            <div class="invalid-feedback">
                                                Please choose a code order.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="nomor meja" name="meja" value="<?php echo $row['meja'] ?>"required>
                                            <label for="floatingInput">Meja</label>
                                            <div class="invalid-feedback">
                                                Please choose a num of tabel.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" name="pelanggan" value="<?php echo $row['pelanggan'] ?>" required>
                                            <label for="pelanggan">Nama Pelanggan</label>
                                            <div class="invalid-feedback">
                                                Please choose a name.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="edit_order_validate" value="12345">Save</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- end modal edit -->



                <!-- Modal delete-->
                <div class="modal fade" id="ModalDelete<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_order.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_order'] ?>" name="kode_order">
                                    <div class="col-lg-12">
                                        Apakah anda ingin menghapus order atas nama <b><?php echo $row['pelanggan'] ?></b> dengan kode order <b><?php echo $row['id_order'] ?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete_janji_validate" value="12345">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal delete -->


            <?php
            }

            ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">  
                            <th scope="col">No Janji</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Nama Dokter</th>
                            <th scope="col">Spesialis</th>
                            <th scope="col">Jadwal Temu</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($result as $row) {
                        ?>
                            <tr>
                                
                                <td><?php echo $row['no_janji'] ?></td>
                                <td><?php echo $row['nama_pasien'] ?></td>
                                <td><?php echo $row['nama_dokter'] ?></td>
                                <td><?php echo $row['spesialis'] ?></td>
                                <td><?php echo $row['jadwal_temu'] ?></td>
                                
                                <td>
                                    <div class="d-flex">

                                        <a class="btn btn-info btn-sm me-1" href="./?x=orderitem&order=<?php echo $row['no_janji']."&nama_pasien=".$row['nama_pasien']."&nama_dokter=".$row['nama_dokter'] ?>"><i class="bi bi-eye"></i></a>

                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['no_janji'] ?>"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['no_janji'] ?>"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>
    </div>
</div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
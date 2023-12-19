<?php
include "prosses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman User
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah User</button>
                </div>
            </div>

            <!-- Modal Tambah User Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="prosses/proses_input_user.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your name" name="nama_petugas" required>
                                            <label for="floatingInput">Nama Petugas</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Petugas.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required>
                                            <label for="floatingInput">Username</label>
                                            <div class="invalid-feedback">
                                                Masukan UserName.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="level" required>
                                                <option selected hidden value="">Pilih Level User</option>
                                                <option value="1">Supervisor</option>
                                                <option value="2">Admin Puskesmas</option>
                                                <option value="3">Admin RS</option>
                                                <option value="4">Perawat</option>
                                            </select>
                                            <label for="floatingInput">Level</label>
                                            <div class="invalid-feedback">
                                                Pilih Level User.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="080082721" name="id_petugas">
                                            <label for="floatingInput">No ID Petugas</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingInput" placeholder="Password" disable value="12345" name="password">
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save changes</button>
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
                <div class="modal fade" id="ModalView<?php echo $row['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="yourname" name="nama_petugas" value="<?php echo $row['nama_petugas'] ?>">
                                                <label for="floatingInput">Nama Petugas</label>
                                                <div class="invalid-feedback">
                                                    Masukan Nama Petugas.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php echo $row['username'] ?>">
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Masukan Username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select disabled class="form-select" aria-label="Default select example" required name="level" id="">
                                                <?php
                                                $data = array("Supervisor", "Admin Puskesmas", "Admin RS", "Perawat");
                                                foreach ($data as $key => $value) {
                                                    if ($row['level'] == $key + 1) {
                                                        echo "<option selected value='$key'>$value</option>";
                                                    } else {
                                                        echo "<option value='$key'>$value</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Level User</label>
                                            <div class="invalid-feedback">
                                                Pilih Level User.
                                            </div>
                                        </div>
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
                <div class="modal fade" id="ModalEdit<?php echo $row['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="prosses/proses_edit_user.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_petugas'] ?>" name="id_petugas">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Your name" name="nama_petugas" required value="<?php echo $row['nama_petugas'] ?>">
                                                <label for="floatingInput">Nama Petugas</label>
                                                <div class="invalid-feedback">
                                                    Masukan Nama Petugas.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <?php
                                                $isDisabled = (isset($_SESSION['username_rujukan']) && $row['username'] == $_SESSION['username_rujukan']) ? 'disabled' : '';
                                                ?>
                                                <input <?php echo $isDisabled; ?> type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required value="<?php echo $row['username'] ?>">
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Masukan Username.
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" aria-label="Default select example" required name="level" id="">
                                                    <?php
                                                    $data = array("Supervisor", "Admin Puskesmas", "Admin RS", "Perawat");
                                                    foreach ($data as $key => $value) {
                                                        if ($row['level'] == $key + 1) {
                                                            echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                                        } else {
                                                            echo "<option value=" . ($key + 1) . ">$value</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingInput">Level User</label>
                                                <div class="invalid-feedback">
                                                    Pilih Level User.
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Akhir Modal Edit-->

                <!-- Modal Delete-->
                <div class="modal fade" id="ModalDelete<?php echo $row['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="prosses/proses_delete_user.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_petugas'] ?>" name="id">
                                    <div class="col-lg-12">
                                    
                                    <?php
$isDisabled = (isset($_SESSION['username_rujukan']) && $row['username'] == $_SESSION['username_rujukan']);

if ($isDisabled) {
    echo "<div class='alert alert-danger'>Anda Tidak Dapat Menghapus Akun Admin</div>";
} else {
    echo "Apakah Anda Yakin Ingin Menghapus User <b>" . $row['username'] . "</b>";
}
?>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345" >Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Akhir Modal Delete-->

                <!-- Modal Reset Password-->
                <div class="modal fade" id="ModalResetPassword<?php echo $row['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="prosses/proses_reset_password.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_petugas'] ?>" name="id_petugas">
                                    <div class="col-lg-12">
                                        <?php
                                        if ($row['username'] == $_SESSION['username_petugas']) {
                                            echo "<div class='alert alert-danger'>Anda Tidak Dapat Mereset Password Sendiri</div>";
                                        } else {
                                            echo "Apakah Anda Yakin Ingin Mereset Password User<b>$row[username]</b> Menjadi Password Bawaan Sistem yaitu <b>password</b>";
                                        }
                                        ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="input_user_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_decafe']) ? 'disabled' : ''; ?>>Reset Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Akhir Modal Reset Password-->
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
                            <th scope="col">No</th>
                            <th scope="col">Nama Petugas</th>
                            <th scope="col">Username</th>
                            <th scope="col">Level</th>
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
                                <td><?php echo $row['nama_petugas'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php
                                    if ($row['level'] == 1) {
                                        echo "Supervisor";
                                    } elseif ($row['level'] == 2) {
                                        echo "Admin Puskesmas";
                                    } elseif ($row['level'] == 3) {
                                        echo "Admin RS";
                                    } elseif ($row['level'] == 4) {
                                        echo "Perawat";
                                    }
                                    ?></td>

                                <td class="d-flex">
                                    <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id_petugas'] ?>"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_petugas'] ?>"><i class="bi bi-pencil-square"></i></i></button>
                                    <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_petugas'] ?>"><i class="bi bi-trash3"></i></button>
                                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalResetPassword<?php echo $row['id_petugas'] ?>"><i class="bi bi-key"></i></i></button>
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
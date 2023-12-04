<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="height: 3000px">
    <!-- header -->
    <?php include "header.php";?>
    <!-- tutup header -->
    <div class="container-lg">
        <div class="row">
            <!-- sidebar -->
            <?php include "sidebar.php";?>
            <!-- tutup sidebar-->

            <!--content-->
            <?php 
            if (isset($_GET['x']) && $_GET['x']== 'home'){
            include "home.php";
            }
            elseif (isset($_GET['x']) && $_GET['x']== 'janji'){
                include "janji.php";
                }elseif (isset($_GET['x']) && $_GET['x']== 'spesialis'){
                    include "spesialis.php";
                    }else if (isset($_GET['x']) && $_GET['x']== 'pasien'){
                        include "pasien.php";
                        }else if (isset($_GET['x']) && $_GET['x']== 'notifikasi'){
                            include "notifikasi.php";
                            }
                            else if (isset($_GET['x']) && $_GET['x']== 'report'){
                                include "report.php";
                                }
        ?>
        <!-- tutup content -->
    </div>
    <div class="container-lg"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
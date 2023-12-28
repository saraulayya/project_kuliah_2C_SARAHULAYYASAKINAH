<style>
    .nav-link.active{
        background-color: #B03060 !important;
        color: whitesmoke !important;}
        
</style><div class="col-lg-3">
                <nav class="navbar navbar-expand-lg bg-light mt-2">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 250px">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1 pe-2">
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x']== 'home') || !isset($_GET['x'])) ? 'active link-light background-color: MediumVioletRed' : 'link-dark' ;?>" aria-current="page" href="home"> <i class="bi bi-house-heart-fill"></i> DashBoard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']== 'janji') ? 'active link-light' : 'link-dark' ;?>" href="janji"> <i class="bi bi-calendar4-week"></i> Jadwal Dan Janji</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']== 'spesialis') ? 'active link-light' : 'link-dark' ;?>" href="spesialis"> <i class="bi bi-person-vcard-fill"></i> Spesialis</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']== 'pasien') ? 'active link-light' : 'link-dark' ;?>" href="pasien"> <i class="bi bi-clipboard2-heart-fill"></i> Pasien</a>
                                    </li> <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']== 'user') ? 'active link-light' : 'link-dark' ;?>" href="user"> <i class="bi bi-clipboard2-heart-fill"></i> User</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    #logNavbar:hover {
        background-color: darkred;
        border-radius: 10px;
    }

    .navbar {
        font-weight: 600;
    }

    body {
        background: rgb(172, 186, 224);
        background: linear-gradient(180deg, rgba(172, 186, 224, 1) 0%, rgba(192, 197, 223, 1) 50%, rgba(223, 213, 247, 1) 100%);
        height: 100vh;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(44, 41, 69);">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="index.php">
            <img src="https://capital.petra.ac.id/2024/assets/img/logo_capital.PNG" alt="" height="35" class="d-inline-block align-text-top">
            <span style="vertical-align: bottom;">Admin Capital 2024</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2">
                    <a class="nav-link homeNavbar" aria-current="page" href="index.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link pendaftarNavbar" href="pendaftar.php"><i class="fas fa-user-check"></i> Data Kelompok</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link konsumNavbar" href="data_konsum.php"><i class="fas fa-hamburger"></i> Data Konsumsi</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link rekapNavbar" href="rekap_data.php"><i class="fas fa-table"></i> Rekap Data</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link adminNavbar" href="new_admin.php"><i class="fas fa-user-plus"></i> Add Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="logNavbar" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f7f7f7;
    }

    #logNavbar:hover {
        background-color: darkred;
        border-radius: 10px;
    }

    .navbar {
        font-weight: 600;
    }

    body {
        height: 100vh;
    }

    .nav-link {
        color: floralwhite !important;
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
                <li class="nav-item mx-3">
                    <a class="nav-link" aria-current="page" href="https://capital.petra.ac.id/2024/admin/games/index.php">Home</a>
                </li>
                <li class="nav-item dropdown mx-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kelompok
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://capital.petra.ac.id/2024/admin/games/kelompok/uang.php">Uang</a></li>
                        <li><a class="dropdown-item" href="https://capital.petra.ac.id/2024/admin/games/kelompok/history.php">Riwayat Transaksi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mx-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Games
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://capital.petra.ac.id/2024/admin/games/games/biaya_masuk.php">Biaya Masuk Game</a></li>
                        <li><a class="dropdown-item" href="https://capital.petra.ac.id/2024/admin/games/games/pemenang.php">Menang Game</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mx-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bank
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://capital.petra.ac.id/2024/admin/games/pinjaman/pinjam.php">Pinjam Bank</a></li>
                        <li><a class="dropdown-item" href="https://capital.petra.ac.id/2024/admin/games/pinjaman/bayar.php">Bayar Hutang Bank</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mx-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Saham
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://capital.petra.ac.id/2024/admin/games/saham/beli.php">Beli Saham</a></li>
                        <li><a class="dropdown-item" href="https://capital.petra.ac.id/2024/admin/games/saham/jual.php">Jual Saham</a></li>
                    </ul>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="https://capital.petra.ac.id/2024/admin/games/news/index.php">News</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="https://capital.petra.ac.id/2024/admin/games/phase/phase_poll.php">Ganti Phase</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="logNavbar" href="https://capital.petra.ac.id/2024/admin/games/logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
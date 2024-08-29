<?php
require_once "conn.php";

if (!isset($_SESSION['gmail'])) {
    header('Location: ../login.php');
    exit;
} else {
    $gmail = $_SESSION['gmail'];
    $username = $_SESSION['username'];
    $divisi = $_SESSION['divisi'];
}

//GET NRP
$sql = "SELECT * FROM `panitia` where is_admin = 0";
$nrpAction = $conn->prepare($sql);
$nrpAction->execute();
$arr = array();
$outputNRP = '';
while ($pendaftarRow = $nrpAction->fetch()) {
    $arr[] = $pendaftarRow;
    $val = MD5($pendaftarRow['id']);
    $outputNRP .= '<option value="' . $val . '">' . $pendaftarRow['nrp'] . '</option>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../assets/link.html"; ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <title>Admin CAPITAL 2024 | Add Admin</title>

    <style>
        body {
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        #card-main {
            border-radius: 0.7rem;
            border: 0;
            width: 80%;
        }

        .col-form-label {
            font-size: larger;
        }

        .formFill {
            margin-bottom: 40px;
        }

        .bodyCard {
            padding-left: 5rem;
            padding-right: 5rem;
        }

        @media screen and (max-width: 575px) {
            .bodyCard {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>
    <div class="container my-5">
        <div class="card mx-auto" id="card-main" style="display: block;">
            <div class="card-header text-center" style="background-color: #232950; color: white; border-top-left-radius: 0.7rem; border-top-right-radius: 0.65rem;">
                <h3 class="my-1">Add New Admin</h3>
            </div>
            <div class="card-body bodyCard mt-3">
                <div class="mx-auto" style="display: block; width: 95%">
                    <div class="formFill row">
                        <label for="staticName" class="col-md-3 col-form-label">Nama</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="nama" placeholder="Nama Panitia..." readonly>
                        </div>
                    </div>

                    <div class="formFill row">
                        <label for="inputPassword" class="col-md-3 col-form-label">NRP</label>
                        <div class="col-md-9">
                            <select class=" select2 form-control" name="state" id="selectNRP" style="width: 100%;padding:100px !important;">
                                <option value="" selected></option>
                                ...
                                <?= $outputNRP ?>
                            </select>
                        </div>
                    </div>

                    <div class="formFill row">
                        <label for="select" class="col-md-3 col-form-label">Divisi</label>
                        <div class="col-md-9">
                            <!-- <select class="form-select" id="selectDivisi" aria-label="Default select example" style="cursor: pointer;">
                                <option value="" selected hidden disabled>Divisi...</option>
                                <? // $outputDivisi;
                                ?>
                            </select> -->
                            <!-- <div id="emailHelp" class="form-text ms-1">Pilih salah satu divisi.</div> -->
                            <input type="text" class="form-control" id="selectDivisi" placeholder="Divisi..." readonly>

                        </div>
                    </div>

                    <button type="button" class="btn btn-dark mx-auto" style="display: block;">
                        <i class="fas fa-user-plus"></i> ADD
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            var select = $('.select2').select2({
                placeholder: "Masukkan NRP",
                width: 'resolve',
                allowClear: true
            });

            $('.select2').on("change", function() {
                var value = $('.select2 option:selected').text();
                // console.log(value);

                $.ajax({
                    url: "api/post.php",
                    method: "POST",
                    data: {
                        for: "getAdmin",
                        nrp: value
                    },
                    success: function(res) {
                        var data = JSON.parse(res);
                        console.log(data);
                        $("#nama").val(data.nama);
                        $("#selectDivisi").val(data.divisi);
                    }
                })

            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $(".adminNavbar").addClass("active disabled");
            Notiflix.Confirm.Init({
                borderRadius: "15px",
                titleColor: "#000000",
                titleFontSize: "20px",
                width: "400px",
                distance: "20px",
            });
            Notiflix.Notify.Init({
                position: "right-bottom",
                useGoogleFont: true,
            });

            $(document).on('click', '.btn-dark', function() {
                var nama = $("#nama").val();
                var nrp = $('.select2 option:selected').text();
                var divisi = $("#selectDivisi").val();

                if (nama == "" || nrp == "" || divisi == null) {
                    Notiflix.Notify.Warning('Data Belum Lengkap!');
                } else {
                    $.ajax({
                        url: "api/post.php",
                        method: "POST",
                        data: {
                            for: "addAdmin",
                            nrp: nrp,
                            nama: nama,
                            divisi: divisi
                        },
                        success: function(data) {
                            var res = data.split('//');
                            if (res[0] == 'success') {
                                Notiflix.Notify.Success('Input Berhasil!');
                                var nama = $("#nama").val("");
                                var nrp = $('.select2 option:selected').text();
                                var divisi = $("#selectDivisi").val("");
                            } else if (res[0] == 'already') {
                                Notiflix.Notify.Warning('Sudah Merupakan Admin!');
                            } else {
                                Notiflix.Notify.Failure('Input Gagal!');
                            }
                        },
                        error: function() {
                            Notiflix.Notify.Failure('Input Gagal!');
                        }
                    });
                }
  
            });
        });
    </script>
</body>

</html>
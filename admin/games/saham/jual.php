<?php
require_once "../../pendaftaran/conn.php";
?>

<?php
if (!isset($_SESSION['gmail'])) {
    header('Location: ./login.php');
    exit;
} else {
    $gmail = $_SESSION['gmail'];
    $username = $_SESSION['username'];
    $divisi = $_SESSION['divisi'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CAPITAL 2024 | Jual Saham</title>
    <?php include '../../assets/link.html' ?>

    <style>
        .col-sm-6,
        .col-sm-5,
        .col-sm-7 {
            margin: 10px auto;
        }
    </style>
</head>

<body>
    <?php include "../navbar.php" ?>

    <h1 class="text-center" style="margin-top: 60px; font-weight: bold;">JUAL SAHAM</h1>
    <div class="p-4 mt-5 card" style="border-radius: 1.3rem;">
        <div class="card-body table-responsive px-4">
            <table class="table table-striped" id="tableMain" style="width: 100%!important;">
                <thead>
                    <tr class="mid">
                        <th>Kelompok</th>
                        <th>Uang</th>
                        <th>Saham</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tbodyMain">
                    <?php
                    $sql = "SELECT * FROM `game_portfolio` gp JOIN `kelompok` k ON gp.id_kelompok = k.id JOIN `game_saham` gs ON gp.id_saham = gs.id JOIN `game_kelompok` gk ON gk.id_kelompok = gp.id_kelompok ORDER BY gp.id_kelompok ASC";
                    $action = $conn->prepare($sql);
                    $action->execute();

                    while ($data = $action->fetch()) {
                        echo '<tr class="mid">
                                <td>' . $data['nama_kelompok'] . '</td>
                                <td>' . number_format($data['uang'], 0, '.', '.') . '</td>
                                <td>' . $data['code'] . '</td>
                                <td>' . $data['quantity'] . '</td>
                                <td><a href="#" data-id="' . $data["id_kelompok"] . '" data-nama="' . $data["nama_kelompok"] . '" data-code=' . $data['code'] . ' data-saham=' . $data['id_saham'] . ' data-quantity=' . $data['quantity'] . ' class="jual-saham" data-toggle="modal" data-target="#exampleModal"><button class="btn btn-primary">Jual Saham</button></a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <form action="function_jual.php" method="POST" id="confirm-jual">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Jual Saham</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" id="id_kelompok" name="id_kelompok" hidden>
                        <input type="text" class="form-control" id="id_saham" name="id_saham" hidden>
                        <input type="text" class="form-control" id="quantity_awal" name="quantity_awal" hidden>
                        <input type="text" class="form-control" id="code" name="code" hidden>
                        <div class="mb-3">
                            <label for="nama_kelompok" class="col-form-label">Kelompok</label>
                            <input type="text" class="form-control" id="nama_kelompok" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="code_saham" class="col-form-label">Code Saham</label>
                            <input type="text" class="form-control" id="code_saham" name="code_saham" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="col-form-label">Quantity</label>
                            <input type="number" min="0" class="form-control" id="quantity" name="quantity" required placeholder="Masukkan quantity yang ingin dijual">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="jual" id="jual">Jual</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script>
        $('#tableMain').DataTable({
            "lengthMenu": [
                [-1, 5, 10, 25, 50, 100],
                ["All", 5, 10, 25, 50, 100]
            ],
            "scrollX": true,
            dom: "<'d-flex text-center justify-content-center'B><'row'<'col-sm-6'l><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: {
                dom: {
                    button: {
                        tag: "button",
                        className: "btn btn-dark my-2"
                    },
                    buttonLiner: {
                        tag: null
                    }
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.jual-saham').on('click', function() {
                var id_kelompok = $(this).data('id');
                $('#id_kelompok').val(id_kelompok);
                var nama_kelompok = $(this).data('nama');
                $('#nama_kelompok').val(nama_kelompok);
                var code_saham = $(this).data('code');
                $('#code').val(code_saham);
                $('#code_saham').val(code_saham);
                var id_saham = $(this).data('saham');
                $('#id_saham').val(id_saham);
                var quantity = $(this).data('quantity');
                $('#quantity').val(quantity);
                $('#quantity_awal').val(quantity);
                $('#exampleModal').modal('show');
            });
        });
    </script>

    <script>
        function displayNotification() {
            <?php
            if (isset($_SESSION['notification'])) {
                echo "Swal.fire({
                    icon: '{$_SESSION['notification']['type']}',
                    title: '{$_SESSION['notification']['title']}',
                    text: '{$_SESSION['notification']['message']}'
                });";
                unset($_SESSION['notification']);
            }
            ?>
        }

        displayNotification();
    </script>


</body>

</html>
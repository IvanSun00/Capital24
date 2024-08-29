<?php
require_once '../../pendaftaran/conn.php';

if (!isset($_SESSION['gmail'])) {
  header('Location: ./login.php');
  exit;
} else {
  $gmail = $_SESSION['gmail'];
  $username = $_SESSION['username'];
  $divisi = $_SESSION['divisi'];
}

$sql = "SELECT gk.id as gk_id, gk.*, k.* FROM game_kelompok gk inner JOIN kelompok k on gk.id_kelompok = k.id ORDER BY k.nama_kelompok";
$result = $conn->query($sql);
$data_kelompok = $result->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($data_kelompok);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin CAPITAL 2024 | SIMULATION ROUND</title>
  <?php include '../../assets/link.html' ?>
  <link rel="stylesheet" href="loader.css">
</head>

<body>


  <?php include '../navbar.php' ?>


  <div class="container mt-5 py-4 position-relative">
    <div class="loader-container d-none">
      <div class="loader"></div>
    </div>

    <h1 class="text-center" style="font-weight: bold;">PINJAMAN BANK</h1>

    <div class="px-4 pt-2 pb-4 mt-4" style="background-color: white; border-radius: 30px; box-shadow: 10px 10px 20px rgba(0,0,0,0.2);">
      <!-- ON CHANGE TAMPILKAN DATA KELOMPOK -->
      <!-- GA PERLU HAPUS KELOMPOK SETELAH SUBMIT, KOSONGIN NOMINAL AJA  -->
      <table class="table table-secondary mt-4">
        <thead>
          <tr>
            <th scope="col">Nama Kelompok</th>
            <th scope="col">Uang</th>
            <th scope="col">Sisa Pinjaman</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="3" id="msg" class="d-none"></td>
            <td class="data" id="nama_kelompok"></td>
            <td class="data" id="uang"></td>
            <td class="data" id="sisa_pinjaman"></td>
          </tr>
        </tbody>
      </table>


      <form action="" id="form_pinjaman">
        <div class="mb-3 mt-4">
          <label for="kelompok" class="form-label">Kelompok</label>
          <select name="" id="kelompok" class="form-control select-kelompok">
            <option value="" selected disabled hidden>Pilih Kelompok: </option>
            <?php foreach ($data_kelompok as $kelompok) : ?>
              <option value="<?= $kelompok['id_kelompok'] ?>"> <?= $kelompok['nama_kelompok'] ?> </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="nominal" class="form-label">Nominal</label>
          <input type="number" class="form-control" id="nominal" placeholder="Nominal" min="0">
        </div>
        <div class="d-flex justify-content-center p-2">
          <button type="submit" class="btn btn-primary submit ">Submit</button>
        </div>
      </form>

    </div>


  </div>

  <script>
    $(document).ready(function() {
      function fetch_kelompok(id_kelompok) {
        $.ajax({
          url: 'fetch_kelompok.php',
          type: 'POST',
          dataType: 'JSON',
          data: {
            id_kelompok: id_kelompok
          },
          success: function(res) {
            console.log(res);
            if (res.success) {
              $("#msg").addClass("d-none");
              $(".data").removeClass("d-none");
              $("#nama_kelompok").text(res.data.nama_kelompok);
              $("#uang").text(res.data.uang);
              $("#sisa_pinjaman").text(res.data.sisa_pinjaman);

            } else {
              $(".data").addClass("d-none");
              $("#msg").removeClass("d-none");
              $("#msg").text("Error Fetching Data");

            }
          },
          error: function(err) {
            console.log(err);
            $(".data").addClass("d-none");
            $("#msg").removeClass("d-none");
            $("#msg").text("Error Fetching Data");
          }
        })
      }

      function reset_form() {
        $("#nominal").val('');
      }

      function showLoader() {
        $(".submit").prop("disabled", true);
        $(".loader-container").removeClass("d-none");
      }

      function hideLoader() {
        $(".submit").prop("disabled", false);
        $(".loader-container").addClass("d-none");
      }

      $(".select-kelompok").change(function() {
        let id_kelompok = $(this).val();
        fetch_kelompok(id_kelompok);
      })



      $("#form_pinjaman").submit(function(e) {
        e.preventDefault();
        let kelompok_value = $('#kelompok').val();
        let kelompok = $('#kelompok').children("option:selected").text();
        let nominal = $('#nominal').val();

        //pengecekan
        if (kelompok_value == null || nominal == '') {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Isi semua form!',
          })
          return;
        }
        if (nominal <= 0) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Nominal tidak boleh kurang dari 0!',
          })
          return;
        }

        swal.fire({
          title: 'Tambahkan Pinjaman?',
          text: `Kelompok: ${kelompok} dengan Nominal: ${nominal}`,
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
          cancelButtonColor: '#d33'
        }).then((res) => {
          if (res.isConfirmed) {
            showLoader();

            $.ajax({
              url: 'pinjam_logic.php',
              type: 'POST',
              dataType: 'JSON',
              data: {
                id_kelompok: kelompok_value,
                nominal: nominal
              },
              success: function(res) {
                reset_form();
                fetch_kelompok(kelompok_value);
                hideLoader();
                if (res.success) {
                  Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: res.msg,
                  })
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: res.msg,
                  })
                }

              },
              error: function(err) {
                hideLoader();
                console.log(err);
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Terjadi Error saat menghubungi server',
                })
              }

            })
          }
        })

      })
    })
  </script>

</body>

</html>
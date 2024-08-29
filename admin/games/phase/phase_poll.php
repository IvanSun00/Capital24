<?php
require_once "../../pendaftaran/conn.php";

$sql = "SELECT * FROM game_phase";
$result = $conn->query($sql);
$row = $result->fetch();
?>

<?php
if (!isset($_SESSION['gmail'])) {
    header('Location: ../login.php');
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
    <title>Admin CAPITAL 2024 | SIMULATION ROUND</title>

    <?php include '../../assets/link.html' ?>
</head>
<style>
    main{
        margin: 12svh auto;
    }
    h1{
        font-size: 7rem;
        font-weight: 500;
    }

    @media screen and (max-width: 1024px){
        h1{
            font-size: 6rem;
        }
        
    }

    @media screen and (max-width: 500px){
        h1{
            font-size: 4.5rem;
        }
        
    }

</style>
<body >

    <?php include '../navbar.php' ?>
    
    <main class="container text-center">
        <h1 >Phase Now</h1>
        <h1 id="phase"><?php echo $row['phase']."-".$row['state'] ?></h1>
        <div class="row row-cols-2">
            <div class="col">
                <p>end:</p>
                <p id="phase_end"><?php echo $row['phase_end'] ?></p>
            </div>
            <div class="col ">
                <p>remaining time:</p>
                <p id="timer"></p>
            </div>
        </div>

        <button class="next-phase btn btn-lg btn-primary mt-2">Next Phase</button>
        <button class="next-state btn btn-lg btn-success mt-2">Next State</button>
    </main>
    

    <footer>
    </footer>
    
<script>
    $(document).ready(function(){
        $("#phase").addClass("active");
        var end = new Date("<?php echo $row['phase_end'] ?>").getTime();
        var time = "<?php echo $row['phase_end'] ?>";
        console.log(time)
        function timer(){
            var now = new Date().getTime();
            var distance = end - now;
            var hours = Math.floor(distance / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            if(distance < 0){
                distance = 0;
                hours = 0;
                minutes = 0;
                seconds = 0;
            }
            $("#timer").html(hours + "h " + minutes + "m " + seconds + "s ");
        }
        
        setInterval(timer, 1000);

        $(".next-phase").click(function(){
            Swal.fire({
                title: "Are you sure?",
                text: "Maju ke phase selanjutnya",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "phase_logic.php",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            next: true,
                        },
                        success: function (res) {
                            console.log(res);
                            if (res.success) {
                                $("#phase").html(res.phase);
                                $("#phase_end").html(res.phase_end);
                                end = new Date(res.phase_end).getTime();
                                time = res.phase_end;
                                Swal.fire({
                                    title: "Success",
                                    text: "Berhasil maju ke phase selanjutnya",
                                    icon: "success",
                                })

                            } else {
                                Swal.fire({
                                    title: "Error",
                                    text: res.msg,
                                    icon: "error",
                                });
                            }
                        },
                        error: function (err) {
                            console.log(err);
                            Swal.fire({
                                title: "Error",
                                text: "Terjadi Error saat menghubungi server",
                                icon: "error",
                            });
                        },
                    });
                }
            })
        })

        setInterval(()=>{
          $.ajax({
            url: "polling.php",
            type: "POST",
            dataType: "JSON",
            data: { 
              phase_end: time, 
            }
          }).done((res)=>{
            console.log(res);
            if(res.success){
              end = new Date(res.phase_end).getTime();
              time = res.phase_end;
            }
          })
        },8000)

        //nambah logic ganti harga saham 0,15,30
        $(".next-state").click(()=>{
            Swal.fire({
                title: "Are you sure?",
                text: "Maju ke state selanjutnya",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",

            }).then((result)=>{
                if(result.isConfirmed){
                    $.ajax({
                        url: "phase_logic.php",
                        type: "POST",
                        dataType: "JSON",
                        data:{
                            next_state: true,
                        },
                        success:function (res){
                            console.log(res)
                            if(res.success){
                                $("#phase").html(res.phase);
                                Swal.fire({
                                    title: "Success",
                                    text: "Berhasil update state",
                                    icon: "success",
                                })
                            }else{
                                Swal.fire({
                                    title: "Error",
                                    text: res.msg,
                                    icon: "error",
                                })
                            }
                        
                        },
                        error: (err)=>{
                            Swal.fire({
                                title: "Error",
                                text: "Terjadi Error saat menghubungi server",
                                icon: "error",
                            })
                        }
                    })

                }
            })
            
        }

        )
    });
</script>
</body>
</html>
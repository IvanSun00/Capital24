<?php include "include_php.php" ?>
<?php
$sql = "SELECT * FROM game_phase";
$result = $conn->query($sql);
$row = $result->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CAPITAL 2024 | SIMULATION ROUND</title>
  <?php include "../assets/link/link.html"; ?>
  <link rel="stylesheet" href="../assets/css/main.css">
  <style>
     .section {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            gap: 20px;
            letter-spacing: 0.5vw;
            color: white;
        }
  </style>
</head>
<body>
<?php include "include.php" ?>

<div class="section">
        <h1 class="header1 text-shadow" > PHASE <span id="phase"><?=$row['phase']?></span> </h1>
        <h3 class="header text-shadow" id="timer" >00:00:00</h3>
  </div>



  <script>
    $(document).ready(function(){
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
              $("#phase").text(res.phase);
              timer();
            }
          })
        },8000)
    });
</script>

  
</body>
</html>
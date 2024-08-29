<?php
// header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
// header('Pragma: no-cache');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>SSE demo with PHP</h1>

<ol id="list">
</ol>

<script>
  // Create new event, the server script is sse.php
  var eventSource = new EventSource("sse.php");

  // Event when receiving a message from the server
  eventSource.onmessage = function(event) {
    console.log(event.data);
    // Append the message to the ordered list
    document.getElementById("list").innerHTML += '<li>'+event.data + "</li>";
  };
  eventSource.onerror = function(event) {
    console.error('SSE Error:', event);

    // eventSource.close(); // Close the SSE connection on error
};



window.addEventListener('beforeunload', function() {
            eventSource.close(); // Close the SSE connection before the page is reloaded
        });

</script>
</body>
</html>
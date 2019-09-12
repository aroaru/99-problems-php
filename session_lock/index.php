<html>
  <head>
    <script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <style type="text/css">
      td, th { padding: 1rem; }
      td { color: white; height: 5rem; overflow-y: scroll; }
      td:first-child { background-color: hsla(200, 80%, 30%, 0.7); }
      td:last-child { background-color: hsla(100, 80%, 30%, 0.7); }
    </style>
  </head>

  <body>
    See <a href="https://github.com/mattiasgeniar/demo-php-blocking-sessions">https://github.com/mattiasgeniar/demo-php-blocking-sessions</a><br />

    This page calls 3 AJAX calls simultanuously. Each block below will update once the AJAX call is completed.<br />
    Each AJAX call takes 4 seconds to load. Left are blocking PHP sessions, right non-blocking.<br /><br />

    <table width="80%">
      <tr>
        <th id="block1" width="50%"> Blocking PHP session calls </th>
        <th id="noblock1"> Non-blocking PHP sessions </th>
      </tr>
      <tr>
        <td id="block2"></td><td id="noblock2"></td>
      </tr>
      <tr>
        <td id="block3"></td><td id="noblock3"></td>
      </tr>
      <tr>
        <td id="block4"></td><td id="noblock4"></td>
      </tr>
    </table>

    <script>
      $("#block1").load('./lock.php?primer', function() {
        $("#block2").load('./lock.php');
        $("#block3").load('./lock.php');
        $("#block4").load('./lock.php');
      });

      $("#noblock1").load('./no_lock.php?primer', function() {
        $("#noblock2").load('./no_lock.php');
        $("#noblock3").load('./no_lock.php');
        $("#noblock4").load('./no_lock.php');
      });
    </script>
  </body>
</html>

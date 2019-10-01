<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Administrator</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

</head>

<body>

    <div id="header">
        <div class="shell">

            <?php
include 'menu.php';
?>
        </div>
    </div>

    <div id="container">
        <div class="shell">

            <div class="small-nav">
                <a href="index.php">Komandna tabla</a>
                <span>&gt;</span>
                Poruke gostiju
            </div>

            <br />

            <div id="main">
                <div class="cl">&nbsp;</div>

                <div id="content">
        <div class="form-group">
            <div class="input-group">
              <form>
  <input type="text" name="search_text" id="search_text" placeholder="Pretraga.." class="pretraga" />
</form>
            </div>
        </div>
        <br />
      <br>  <div id="result"></div><h2><input type="submit" onclick="window.print()" value="Štampaj" /></h2>
    </div> </div> </div> </div>
    <div style="clear:both"></div>

</body>

</html>

<script>
    $(document).ready(function () {
        load_data();
        function load_data(query) {
            $.ajax({
                url: "fetch_msg.php",
                method: "POST",
                data: { query: query },
                success: function (data) {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function () {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            }
            else {
                load_data();
            }
        });
    });
</script>

<script type="text/javascript">
    function sureToApprove(id) {
        if (confirm("Da li ste sigurni da zelite da izbrišete poruku?")) {
            window.location.href = 'delete_msg.php?id=' + id;
        }
    }
    function changeStatus(id) {
        if (confirm("Promeni u pročitano?")) {
            window.location.href = 'changeStatus.php?id=' + id;
        }
    }
    function sendMessage(id) {
        if (!id) {
            window.alert("Izaberite poruku kojoj šaljete odgovor");
        } else {
            window.location.href = 'sendMessage.php?id=' + id;
        }
    }
</script>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Client request</title>
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
                Iznajmljena vozila
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

<script type="text/javascript">
    function sureToApprove(id, car) {
        if (confirm("Da li ste sigurni?")) {
            window.location.href = "approve.php?id=" + id + "&car=" + car;
        }
    }
    function deleteRequest(id){
        if (confirm("Da li ste sigurni?")) {
            window.location.href = 'delete_request.php?id=' + id;
        }
    }
    </script>

<script>
    $(document).ready(function () {
        load_data();
        function load_data(query) {
            $.ajax({
                url: "fetch_requests.php",
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

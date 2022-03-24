<?php
    session_start();

    include("./connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
    <title>EXPORT TO EXCEL</title>
</head>
<body id="exportBody">
    <h2 class="exportTitle">EXPORT DATA</h2>
    <div class="export-container">
        <form method="POST">
            <span>
                From: <input type="date" name="dateFrom" id="dateFrom" data-date="" data-date-format="DD-MM-YYYY"  onchange="btnClickF()" value="<?php echo date('Y-m-d'); ?>"/> 
            </span>
            <span>
                To: <input type="date" name="dateTo" id="dateTo" data-date="" data-date-format="DD-MM-YYYY"  onchange="btnClickT()" value="<?php echo date('Y-m-d'); ?>"/>
            </span>
            <div id="btnEx" class="buttonBox">
                <input type="submit" value="EXPORT" id="btnExport">
                <div class="border"></div>
                <div class="border"></div>
                <div class="border"></div>
                <div class="border"></div>
            </div>
            <input type="submit" name="searchDate" id="searchDate">
        </form>

        <?php
            if(isset($_POST['searchDate'])){
                $queryTable = "SELECT * "
            }
        ?>

        <div class="exportTable">
            <h1 id="fdate"></h1>
            <h1 id="tdate"></h1>
        </div>
    </div>

    <script>
        function btnClickF() {

            var fdate = document.getElementById("dateFrom").value;
            var tdate = document.getElementById("dateTo").value;

            var ftime = new Date(fdate).getTime();
            var ttime = new Date(tdate).getTime();

            if(ftime > ttime){
                document.getElementById("dateFrom").value = tdate;
            }

            // document.getElementById("searchDate").click();
        }

        function btnClickT() {

            var fdate = document.getElementById("dateFrom").value;
            var tdate = document.getElementById("dateTo").value;

            var ftime = new Date(fdate).getTime();
            var ttime = new Date(tdate).getTime();

            if(ttime < ftime){
                document.getElementById("dateTo").value = fdate;
            }

            // document.getElementById("searchDate").click();
        }
    </script>

</body>
</html>
<html>
<head>

     <!-- Meta tags -->
    <title>Demograph: Statistica</title>
    <meta charset="UTF-8">

    <!-- CSS stylesheets -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <link href="../image/favicon.png" rel="icon" type="image/png">

    <!-- MySQL to Google Chart -->
    <?php
        $conn = mysqli_connect("localhost", "root", "", "demo");
        $query = "SELECT * FROM durata_judet";
        $result = mysqli_query($conn, $query);
        $rows = array();
        $table = array();
        $table['cols'] = array(
            array('label' => 'Judet', 'type' => 'string'),
            array('label' => 'Durata medie de viata', 'type' => 'number')
        );
        foreach($result as $r) {
            $temp = array();
            $temp[] = array('v' => (string) $r['judet']);
            $temp[] = array('v' => (int) $r['durata']);
            $rows[] = array('c' => $temp);
        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table);
        $query = "SELECT AVG(durata) FROM durata_judet";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)){
            $sum = array_sum($row)/2;
        }
    ?>

    <!-- Javascript scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" language="Javascript" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js" language="Javascript" type="text/javascript"></script>
	<script src="https://www.gstatic.com/charts/loader.js" language="Javascript" type="text/javascript"></script>
    <script src="https://www.google.com/jsapi" language="Javascript" type="text/javascript"></script>
    <script type="text/javascript" src="../javascript/jquery.tablesorter.js"></script>
    <script>
        google.load('visualization', '1', {'packages':['corechart']});
        google.setOnLoadCallback(drawChart);
        function drawChart(){
            var data = new google.visualization.DataTable(<?=$jsonTable?>);
            var options ={
               is3D: 'true',
               width: 500,
               height: 500,
               pieSliceText: 'none',
               legend: 'none',
               chartArea: {width: '50%'},
               colors:['#1D976C', '#93F9B9']
            };
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
    <script>
        google.load('visualization', '1', {'packages':['bar']});
        google.setOnLoadCallback(drawChart);
        function drawChart(){
            var data1 = new google.visualization.DataTable(<?=$jsonTable?>);
            var options1 ={
                is3D: 'true',
                width: 500,
                height: 500,
                legend: {position: 'none'},
                chartArea: {width: '50%'},
                hAxis: {textPosition: 'none',baselineColor: 'none', gridlines: {color: 'none'}},
                colors:['#1D976C', '#93F9B9']
            };
            var chart = new google.charts.Bar(document.getElementById('chart_div1'));
            chart.draw(data1, options1);
        }
    </script>

</head>
<body>

    <!-- Loader -->
    <script>
        $('html, body').css({'overflow': 'hidden', 'height': '100%'});
    </script>
    <div class="loader">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-green-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to top -->
    <a href="#" class="scrollToTop"><i class="material-icons">play_arrow</i></a>

    <!-- Menu -->
    <nav class="white">
        <div class="nav-wrapper container">
            <a href="#" class=""><i class="medium brand-logo black-text material-icons">perm_identity</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../index.php" class="black-text">Acasa</a></li>
                <li><a href="../app.php" class="black-text">Statistici</a></li>
                <li><a href="../contact.php" class="black-text">Contact</a></li>
            </ul>
        </div>
    </nav>
    <nav class="teal show-on-med-and-down">
        <div class="nav-wrapper container">
            <div class="col s12">
                <a href="../index.php" class="breadcrumb">Acasa</a>
                <a href="../app.php" class="breadcrumb">Statistici</a>
                <a href="#" class="breadcrumb">Statistica</a>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="container">
            <div class="col s12">
                <h4 class="center">Durata medie de viata in functie de judet</h4>
            </div>
            <div class="col s8 offset-s2 center">
                <p>Aceasta statistica prezinta durata medie de viata a populatiei Romaniei, grupata in functie de judete. Datele au fost actualizate in anul 2014, cand s-a realizat ultimul recensamant, in care s-a inregistrat o medie de <b><?=round($sum)?></b> ani a duratei de viata in Romania.</p>
            </div>
        </div>
    </div>

    <!-- Tabs for statistics -->
    <div class="row">
        <div class="container">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s6"><a class="teal-text" href="#tabular">Prezentate tabelara</a></li>
                    <li class="tab col s6"><a class="teal-text" href="#grafic">Prezentare grafica</a></li>
                </ul>
            </div>
            <div id="tabular" class="col s12">
                <div class="input-field col s12" id="search-container">
                    <input type="text" class="validate" id="search" autocomplete="off">
                    <label for="search">Cauta inregistrare...</label>
                </div>
                <table class="striped highlight centered" id="sort" class="tablesorter">
                    <thead>
                        <tr>
                            <th>Judet<i class="material-icons tiny">swap_vert</i></th>
                            <th>Populatie<i class="material-icons tiny">swap_vert</i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "demo");
                            mysqli_select_db($conn, "durata_judet");
                            $query = "SELECT * FROM durata_judet";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                echo "<td>" . $row['judet'] . "</td><td>" . $row['durata'] . "</td></tr>";
                            }
                            echo "</table>";
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="grafic" class="col s12">
                <div class="col s6">
                    <div class="center">
                        <div id="chart_div"></div>
                    </div>
                </div>
                <div class="col s6">
                    <div class="center">
                        <div id="chart_div1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer teal">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Demograph</h5>
                    <p class="grey-text text-lighten-4">O platforma pentru gestionarea datelor statistice privind demografia Romaniei</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Social media</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Google Plus</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Copyright &copy2016
            </div>
        </div>
    </footer>

    <!-- Javascript script -->
    <script src="../javascript/search_in_statistics.js" language="Javascript" type="text/javascript"></script>
	<script>

        // Tabs and sort init
    	$(document).ready(function(){
                $('ul.tabs').tabs();
                $(".indicator").addClass("teal");
                $("#sort").tablesorter();
        });

        // Loader
        $(window).load(function(){
            window.setTimeout(function(){
                $('.loader').delay(10000).hide();
                $('html, body').removeAttr('style');
            }, 3000);
        });

        // Back to top
        $(window).scroll(function(){
    		if ($(this).scrollTop() > 100){
    			$('.scrollToTop').fadeIn();
    		}
            else{
    			$('.scrollToTop').fadeOut();
    		}
        });
        $('.scrollToTop').click(function(){
    	    $('html, body').animate({scrollTop : 0},800);
    	    return false;
        });

	</script>

</body>
</html>

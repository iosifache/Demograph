<html>
<head>

     <!-- Meta tags -->
    <title>Demograph: App</title>
    <meta charset="UTF-8">

    <!-- CSS stylesheets -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <link href="image/favicon.png" rel="icon" type="image/png">

    <!-- Javascript scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" language="Javascript" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js" language="Javascript" type="text/javascript"></script>
    <script src="https://cdn.firebase.com/js/client/2.2.1/firebase.js" language="javascript" type="text/javascript"></script>
	<script src="https://www.gstatic.com/charts/loader.js" language="Javascript" type="text/javascript"></script>
    <script src="https://www.google.com/jsapi" language="Javascript" type="text/javascript"></script>
    <script src="javascript/romania_chart.js" language="Javascript" type="text/javascript"></script>

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

	<!-- Initial modal -->
 	<div id="modal" class="modal">
   		<div class="modal-content center">
	 		<h4>Inainte de a incepe</h4>
	 		<p>Pentru ca datele sa fie reprezentative pentru tine, te rugam sa iti setezi varsta si sexul. Odata setate, ele pot fi modificate oricand prin reaccesarea acestui modal.</p>
   		</div>
		<div class="row">
			<div class="col s12" id="date">
				<div class="row">
					<div class="input-field col s6">
						<input id="age" type="number" class="validate">
						<label for="age" id="age-label">Vasta</label>
					</div>
					<div class="input-field col s6 center" style="margin-top: 23px;">
  						<input name="sex" type="radio" id="barbat" value="1">
  						<label for="barbat">Barbat</label>
  						<input name="sex" type="radio" id="femeie" value="2">
  						<label for="femeie">Femeie</label>
  					</div>
				</div>
                <div class="row center">
        			<a class="btn-large waves-effect waves-light teal" id="reset">Reseteaza<i class="material-icons right">replay</i></a>
        			<a class="modal-action modal-close btn-large waves-effect waves-light teal" id="submit">Seteaza<i class="material-icons right">send</i></a>
        			<a class="modal-action modal-close btn-large waves-effect waves-light teal">Inchide<i class="material-icons right">not_interested</i></a>
        		</div>
			</div>
		</div>
 	</div>

    <!-- Menu -->
    <nav class="white">
        <div class="nav-wrapper container">
            <a href="#" class=""><i class="medium brand-logo black-text material-icons">perm_identity</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php" class="black-text">Acasa</a></li>
                <li><a href="#" class="black-text">Statistici</a></li>
                <li><a href="contact.php" class="black-text">Contact</a></li>
            </ul>
        </div>
    </nav>
    <nav class="teal show-on-med-and-down">
        <div class="nav-wrapper container">
            <div class="col s12">
                <a href="index.php" class="breadcrumb">Acasa</a>
                <a href="#" class="breadcrumb">Statistici</a>
            </div>
        </div>
    </nav>

    <div class="row">
    	<div class="container">

            <!-- User info -->
            <div class="col s6">
        		<div class="card">
        	    	<div class="card-image waves-effect waves-block waves-light">
        	      		<img class="activator" src="https://unsplash.it/1000/500/?random">
        	    	</div>
        	    	<div class="card-content">
        	      		<span class="card-title activator grey-text text-darken-4">
        		      		Informatiile tale
        		      		<i class="material-icons right">more_vert</i>
        	      		</span>
        	      		<p><a href="#modal" class="modal-trigger">Adauga mai multe informatii</a></p>
        	    	</div>
        	    	<div class="card-reveal left">
        	      		<span class="card-title grey-text text-darken-4">Informatiile tale<i class="material-icons right">close</i></span>
        	      		Tara: <b id="country"></b> (<b id="country-code"></b>)<br>
        				Regiune: <b id="region"></b> (<b id="region-code"></b>)<br>
        				Oras: <b id="city"></b><br>
        				Cod postal: <b id="zip"></b><br>
        				Latitudine: <b id="lat"></b><br>
        				Longitudine: <b id="lon"></b><br>
        				IP: <b id="query"></b><br>
        				Varsta: <b id="year"></b><br>
        				Sex: <b id="sex"></b>
        	    	</div>
        	 	</div>
            </div>

            <!-- Map -->
            <div class="col s6">
                <div class="right">
                    <div id="chart-container">
                        <div class="card-panel white">
                            <div class="center">
                                <div id="regions_div"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Results -->
    <div class="row">
        <div class="container">
            <div class="col s12">
                <h4 class="center">Rezultate ale datelor tale</h4>
            </div>
            <div class="col s8 offset-s2">
                <p>In urma asocierii datelor dumneavoasta cu datele aflate in statisticile noastre, au rezultat urmatoarele:</p>
                <li>clasa ta de varsta este reprezentata de <b id="romani"></b> romani</li>
                <li>durata medie de viata in judetul tau este de <b id="durata"></b> de ani</p></li>
                <li>in judetul dumneavostra, se nasc <b id="nascuti"></b> de copii si mor <b id="decedati-judet"></b> de persoane in fiecare an</li>
                <li>in fiecare an, mor <b id="decedati-varsta"></b> de persoane din aceeasi categorie de varsta ca tine</li>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="row">
        <div class="container">
            <div class="col s12">
                <h4 class="center">Statistici disponibile</h4>
                <div class="input-field col s12">
                    <input type="text" class="validate" id="search" autocomplete="off">
                    <label for="search">Cauta statistica...</label>
                </div>
                <div class="collection">
                    <div class="collection-item">Populatia pe <b>varste</b><a href="#!" class="secondary-content"><a href="statistics/populatie_varsta.php" class="secondary-content"><i class="material-icons">toc</i></a></div>
                    <div class="collection-item">Populatia pe <b>judete</b><a href="statistics/populatie_judet.php" class="secondary-content"><i class="material-icons">toc</i></a></div>
                    <div class="collection-item">Durata medie de viata pe <b>judete</b><a href="statistics/durata_judet.php" class="secondary-content"><i class="material-icons">toc</i></a></div>
                    <div class="collection-item">Nascuti vii pe <b>judete</b><a href="statistics/nascuti_judet.php" class="secondary-content"><i class="material-icons">toc</i></a></div>
                    <div class="collection-item">Decedati pe <b>varsta</b><a href="statistics/decedati_varsta.php" class="secondary-content"><i class="material-icons">toc</i></a></div>
                    <div class="collection-item">Decedati pe <b>judete</b><a href="statistics/decedati_judet.php" class="secondary-content"><i class="material-icons">toc</i></a></div>
                    <div class="collection-item">Decedati pe <b>clasa de boala</b><a href="statistics/decedati_boala.php" class="secondary-content"><i class="material-icons">toc</i></a></div>
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
    <script src="javascript/search_statistics.js" language="Javascript" type="text/javascript"></script>
    <script src="javascript/get_ip_data.js" language="Javascript" type="text/javascript"></script>
    <script src="javascript/add_user.js" language="Javascript" type="text/javascript"></script>
	<script>

        // Get IP
		$(document).ready(function(){
            $.getJSON("http://ip-api.com/json/?callback=?", function(data){
                var ip = data.query;
            });
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

google.charts.load('current', {'packages': ['geochart']});
google.charts.setOnLoadCallback(drawMarkersMap);

// Add chart data
function drawMarkersMap(){
    var data = google.visualization.arrayToDataTable([
        ['Province', 'ID', {'role': 'tooltip', 'p': {'html': true}}],
        ['RO-AB', 1, "Judet: Alba<br>Resedinta: Alba Iulia<br>Populatie totala: 383252<br>Nascuti pe an: 3133<br>Decedati pe an: 4311<br>Durata medie de viata: 76.23 ani"],
        ['RO-AR', 2, "Judet: Arad<br>Resedinta: Arad<br>Populatie totala: 475841<br>Nascuti pe an: 3962<br>Decedati pe an: 5791<br>Durata medie de viata: 74.84 ani ani"],
        ['RO-AG', 3, "Judet: Arges<br>Resedinta: Pitesti<br>Populatie totala: 650332<br>Nascuti pe an: 5132<br>Decedati pe an: 7248<br>Durata medie de viata: 75.975 ani"],
        ['RO-BC', 4, "Judet: Bacau<br>Resedinta: Bacau<br>Populatie totala: 748402<br>Nascuti pe an: 6672<br>Decedati pe an: 8439<br>Durata medie de viata: 74.36 ani"],
        ['RO-BH', 5, "Judet: Bihor<br>Resedinta: Oradea<br>Populatie totala: 620866<br>Nascuti pe an: 5947<br>Decedati pe an: 7227<br>Durata medie de viata: 74.455 ani"],
        ['RO-BN', 6, "Judet: Bistrita-Nasau<br>Resedinta: Bistrita<br>Populatie totala: 329592<br>Nascuti pe an: 3481<br>Decedati pe an: 3273<br>Durata medie de viata: 75.705 ani"],
        ['RO-BT', 7, "Judet: Botosani<br>Resedinta: Botosani<br>Populatie totala: 460065<br>Nascuti pe an: 4279<br>Decedati pe an: 5821<br>Durata medie de viata: 74.7 ani"],
        ['RO-BR', 8, "Judet: Braila<br>Resedinta: Braila<br>Populatie totala: 361218<br>Nascuti pe an: 2473<br>Decedati pe an: 4717<br>Durata medie de viata: 74.81 ani"],
        ['RO-BV', 9, "Judet: Brasov<br>Resedinta: Brasov<br>Populatie totala: 629814<br>Nascuti pe an: 6229<br>Decedati pe an: 6070<br>Durata medie de viata: 76.6 ani"],
        ['RO-BZ', 10, "Judet: Buzau<br>Resedinta: Buzau<br>Populatie totala: 484524<br>Nascuti pe an: 3578<br>Decedati pe an: 6681<br>Durata medie de viata: 75.225 ani"],
        ['RO-CL', 11, "Judet: Calarasi<br>Resedinta: Calarasi<br>Populatie totala: 320302<br>Nascuti pe an: 2859<br>Decedati pe an: 4367<br>Durata medie de viata: 73.54 ani"],
        ['RO-CS', 12, "Judet: Caras-Severin<br>Resedinta: Resita<br>Populatie totala: 320302<br>Nascuti pe an: 2343<br>Decedati pe an: 4057<br>Durata medie de viata: 74.79 ani"],
        ['RO-CJ', 13, "Judet: Cluj<br>Resedinta: Cluj-Napoca<br>Populatie totala: 718633<br>Nascuti pe an: 6378<br>Decedati pe an: 7811<br>Durata medie de viata: 76.69 ani"],
        ['RO-CT', 14, "Judet: Constanta<br>Resedinta: Constanta<br>Populatie totala: 770783<br>Nascuti pe an: 7258<br>Decedati pe an: 7773<br>Durata medie de viata: 75.175 ani"],
        ['RO-CV', 15, "Judet: Covasna<br>Resedinta: Sfantu Gheorghe<br>Populatie totala: 229563<br>Nascuti pe an: 2387<br>Decedati pe an: 2495<br>Durata medie de viata: 75.2 ani"],
        ['RO-DB', 16, "Judet: Dambovita<br>Resedinta: Targoviste<br>Populatie totala: 531715<br>Nascuti pe an: 4569<br>Decedati pe an: 6251<br>Durata medie de viata: 75.215 ani"],
        ['RO-DJ', 17, "Judet: Dolj<br>Resedinta: Craiova<br>Populatie totala: 705760<br>Nascuti pe an: 5948<br>Decedati pe an: 9558<br>Durata medie de viata: 74.84 ani"],
        ['RO-GL', 18, "Judet: Galati<br>Resedinta: Galati<br>Populatie totala: 635559<br>Nascuti pe an: 4621<br>Decedati pe an: 6779<br>Durata medie de viata: 75.1 ani"],
        ['RO-GR', 19, "Judet: Giurgiu<br>Resedinta: Giurgiu<br>Populatie totala: 278630<br>Nascuti pe an: 2476<br>Decedati pe an: 4214<br>Durata medie de viata: 73.515 ani"],
        ['RO-GJ', 20, "Judet: Gorj<br>Resedinta: Targu Jiu<br>Populatie totala: 369857<br>Nascuti pe an: 2784<br>Decedati pe an: 4263<br>Durata medie de viata: 75.1 ani"],
        ['RO-HR', 21, "Judet: Harghita<br>Resedinta: Miercurea Ciuc<br>Populatie totala: 334586<br>Nascuti pe an: 3281<br>Decedati pe an: 3526<br>Durata medie de viata: 75.84 ani"],
        ['RO-HD', 22, "Judet: Hunedoara<br>Resedinta: Deva<br>Populatie totala: 475542<br>Nascuti pe an: 3225<br>Decedati pe an: 5815<br>Durata medie de viata: 75.195 ani"],
        ['RO-IL', 23, "Judet: Ialomita<br>Resedinta: Slobozia<br>Populatie totala: 296162<br>Nascuti pe an: 2839<br>Decedati pe an: 3884<br>Durata medie de viata: 74.35 ani"],
        ['RO-IS', 24, "Judet: Iasi<br>Resedinta: Iasi<br>Populatie totala: 901590<br>Nascuti pe an: 9628<br>Decedati pe an: 8547<br>Durata medie de viata: 76.015 ani"],
        ['RO-IF', 25, "Judet: Ilfov<br>Resedinta: Buftea<br>Populatie totala: 371037<br>Nascuti pe an: 3885<br>Decedati pe an: 3726<br>Durata medie de viata: 75.075 ani"],
        ['RO-MM', 26, "Judet: Maramures<br>Resedinta: Baia Mare<br>Populatie totala: 527663<br>Nascuti pe an: 4632<br>Decedati pe an: 5532<br>Durata medie de viata: 74.93 ani"],
        ['RO-MH', 27, "Judet: Mehedinti<br>Resedinta: Drobeta-Turnu Severin<br>Populatie totala: 290253<br>Nascuti pe an: 2310<br>Decedati pe an: 3987<br>Durata medie de viata: 74.27 ani"],
        ['RO-MS', 28, "Judet: Mures<br>Resedinta: Targu Mures<br>Populatie totala: 597849<br>Nascuti pe an: 5727<br>Decedati pe an: 6777<br>Durata medie de viata: 75.62 ani"],
        ['RO-NT', 29, "Judet: Neamt<br>Resedinta: Piatra Neamt<br>Populatie totala: 580933<br>Nascuti pe an: 5190<br>Decedati pe an: 6502<br>Durata medie de viata: 75.44 ani"],
        ['RO-OT', 30, "Judet: Olt<br>Resedinta: Slatina<br>Populatie totala: 456554<br>Nascuti pe an: 3237<br>Decedati pe an: 6445<br>Durata medie de viata: 74.445 ani"],
        ['RO-PH', 31, "Judet: Prahova<br>Resedinta: Ploiesti<br>Populatie totala: 815741<br>Nascuti pe an: 6378<br>Decedati pe an: 9782<br>Durata medie de viata: 75.86 ani"],
        ['RO-SJ', 32, "Judet: Salaj<br>Resedinta: Zalau<br>Populatie totala: 248794<br>Nascuti pe an: 2562<br>Decedati pe an: 2954<br>Durata medie de viata: 74.64 ani"],
        ['RO-SM', 33, "Judet: Satu Mare<br>Resedinta: Satu Mare<br>Populatie totala: 392129<br>Nascuti pe an: 3576<br>Decedati pe an: 4212<br>Durata medie de viata: 73.205 ani"],
        ['RO-SB', 34, "Judet: Sibiu<br>Resedinta: Sibiu<br>Populatie totala: 463436<br>Nascuti pe an: 4393<br>Decedati pe an: 4530<br>Durata medie de viata: 76.175 ani"],
        ['RO-SV', 35, "Judet: Suceava<br>Resedinta: Suceava<br>Populatie totala: 740861<br>Nascuti pe an: 8303<br>Decedati pe an: 7671<br>Durata medie de viata: 76.025 ani"],
        ['RO-TR', 36, "Judet: Teleorman <br>Resedinta: Alexandria<br>Populatie totala: 396522<br>Nascuti pe an: 2811<br>Decedati pe an: 6740<br>Durata medie de viata: 74.615 ani"],
        ['RO-TM', 37, "Judet: Timis<br>Resedinta: Timisoara<br>Populatie totala: 739217<br>Nascuti pe an: 6731<br>Decedati pe an: 7534<br>Durata medie de viata: 76.155 ani"],
        ['RO-TL', 38, "Judet: Tulcea<br>Resedinta: Tulcea<br>Populatie totala: 247111<br>Nascuti pe an: 1948<br>Decedati pe an: 3077<br>Durata medie de viata: 73.91 ani"],
        ['RO-VL', 39, "Judet: Valcea<br>Resedinta: Ramnicu Valcea<br>Populatie totala: 406314<br>Nascuti pe an: 3104<br>Decedati pe an: 4099<br>Durata medie de viata: 77.9 ani"],
        ['RO-VS', 40, "Judet: Vaslui<br>Resedinta: Vaslui<br>Populatie totala: 476406<br>Nascuti pe an: 5022<br>Decedati pe an: 5321<br>Durata medie de viata: 74.805 ani"],
        ['RO-VN', 41, "Judet: Vrancea<br>Resedinta: Focsani<br>Populatie totala: 393303<br>Nascuti pe an: 3764<br>Decedati pe an: 4701<br>Durata medie de viata: 75.69 ani"],
        ['RO-B', 42, "Oras: Bucuresti<br>Capitala Romaniei<br>Populatie totala: 2110752<br>Nascuti pe an: 19161<br>Decedati pe an: 21286<br>Durata medie de viata: 77.73"]
    ]);

    // Options
    var options = {
        region: 'RO',
        backgroundColor: {fill:'#fff'},
        datalessRegionColor: '#fff',
        defaultColor: '#fff',
        colorAxis: {colors:['#1D976C', '#93F9B9']},
        resolution: 'provinces',
        legend: 'none',
        tooltip: {isHtml: true},
        'width': 400,
        'height': 327
    };

    // Draw chart
    var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
    chart.draw(data, options);
    
};

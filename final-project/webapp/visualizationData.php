<!doctype html>

<?php
	// including FusionCharts PHP wrapper
	include("fusioncharts.php");

	// establishing DB connection
	$host= "localhost";
	// add values for below variables according to your system
	$port= "3306";
	$dbname="db_rukunin_backup";
	$dbuser="root";
	$dbpwd="";

	// connection string (pg_connect() is native PHP method for Postgres)
  $dbconn=mysqli_connect($host, $dbuser, $dbpwd, $dbname, $port);

	// validating DB connection
  if(!$dbconn) {
		exit("There was an error establishing database connection");
	}

?>

<html>
   <head>
      <title>Chart Penduduk</title>

      <!-- including style and font css -->
      <link href="css/style.css" rel="stylesheet">

    <!-- Manggil library javascript eksternal untuk layout auto keren, Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- Manggil library javascript eksternal untuk bikin chart -->
    <script src='https://cdn.plot.ly/plotly-2.12.1.min.js'></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

    <!-- Manggil library javascript eksternal untuk http client -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <link href='https://fonts.googleapis.com/css?family=Merriweather:300' rel='stylesheet' type='text/css'>
      <style>
      	* {
      		margin: 0;
      		padding: 0;
      		background-color: #FAF6F3;
      	}
      </style>

      <!-- FusionCharts core package JS files -->
      <script src="https://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
      <script src="https://static.fusioncharts.com/code/latest/fusioncharts.charts.js"></script>
      <script src="https://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js"></script>
   </head>
   <body>
   <nav id="menus" class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
      <div class="container-fluid bg-primary">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item bg-primary">
            <a class="nav-link active bg-primary" href="#">VisDat</a>
          </li>
          <li class="nav-item bg-primary">
            <a class="nav-link bg-primary" href="/webapp/penduduk-list.html">Operasional</a>
          </li>
        </ul>
      </div>
    </nav>
   <!-- <center><h1>Nama Penduduk dan Umur</h1></center> -->
<?php

// $mysqli -> query("SELECT * FROM Persons")
  $result = mysqli_query($dbconn, "SELECT nama_warga, `nik_warga`, `tanggal_lahir`, `status_keaktifan`, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia_warga,  
    CASE 
    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 25 THEN 'Remaja'
    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 50 AND TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) > 24 THEN 'Dewasa'
    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) > 50 THEN 'Lansia'
    END AS kategori_usia
    FROM `warga`
    ORDER BY usia_warga ASC; ") or exit("Error with quering database");

  if ($result) {

  // creating an associative array to store the chart attributes
	$arrData = array(
        "chart" => array(
          	// caption and sub-caption customization
            "caption"=> "Nama Penduduk dan Umur",
          	"captionFontSize"=> "24",
            "captionFontColor"=> "#4D394B",
            "captionPadding"=> "20",

            // font and text size customization
            "baseFont"=> "Merriweather, sans-serif",
            "baseFontColor"=> "#ABA39D",
            "outCnvBaseColor"=> "#ABA39D",
            "baseFontSize"=> "15",
            "outCnvBaseFontSize"=> "15",

            // div line customization
            "divLineColor"=> "#ABA39D",
            "divLineAlpha"=> "22",
            "numDivLines"=> "5",

            // y-axis scale customization
            "yAxisMinValue"=> "0",
            "yAxisMaxValue"=> "10",

            // tool-tip customization
            "toolTipBorderColor"=> "#ABA8B7",
            "toolTipBgColor"=> "#FFFFFF",
            "toolTipPadding"=> "13",
            "toolTipAlpha"=> "50",
            "toolTipBorderThickness"=> "2",
            "toolTipBorderAlpha"=> "30",
            "toolTipColor"=> "#4D394B",
            "plotToolText"=> "<div style='text-align: center; line-height: 1.5;'>\$label<br>\$value Tahun<div>",


            // other customizations
            "theme"=> "fint",
            "paletteColors"=> "#7F8C8D",
            "showBorder"=> "0",
      			"bgColor"=> "#FFFFFF",
            "canvasBgColor"=> "#FFFFFF",
            "bgAlpha"=> "100",
            "showValues"=> "0",
            "formatNumberScale"=> "0",
            "plotSpacePercent"=> "33",
            "showcanvasborder"=> "0",
            "showPlotBorder"=> "0"
          )
    );

	$arrData["data"] = array();

	// iterating over each data and pushing it into $arrData array
	while($row = mysqli_fetch_array($result)) {
		array_push($arrData["data"], array(
			"label" => $row["nama_warga"],
			"value" => $row["usia_warga"]
			)
		);
	}

  $jsonEncodedData = json_encode($arrData);

	// creating FusionCharts instance
	$mysqlChart = new FusionCharts("column2d", "topMedalChart" , '100%', '450', "mysql-chart", "json", $jsonEncodedData);

  // FusionCharts render method
  $mysqlChart->render();

	// closing database connection
  $dbconn -> close();

  }

?>
 	<!-- creating chart container -->
 	<center><div id="mysql-chart">A beautiful chart is on its way!</div></center>
   </body>
</html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Koleksi Buku Google Charts</title>
<link rel="stylesheet" href="<?php echo base_url('vendor/uikit/css/'); ?>uikit.css"> 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    // Mengambil API visualisasi.
    google.charts.load('current', {'packages':['corechart']});
    //mengambil data dari variabel PHP 
    var buku=[];
    buku['dataStr'] = '<?php echo $buku;?>';
    buku['dataArray'] = JSON.parse(buku['dataStr']);
    //menggambar grafik
    google.charts.setOnLoadCallback(function(){
        drawChart(buku['dataArray'], 'pie','grafik1');
        drawChart(buku['dataArray'], 'column','grafik2');
        drawChart(buku['dataArray'], 'bar','grafik3');
        drawChart(buku['dataArray'], 'line','grafik4');
    });
        console.log(buku['dataArray']);
    // Menentukan data yang akan ditampilkan
    function drawChart(dataArray,type,container) {
        // Membuat data tabel yang sesuai dengan format google chart dari sumber data array javascript
        var data = new google.visualization.arrayToDataTable(dataArray,false);      
        // Tentukan pengaturan chart
        var options = {
            legend:'bottom',            
            titlePosition:'none',
            titleTextStyle:{fontSize:18},
            chartArea:{width:'80%',height:'70%'}                      
            };
        if(type == 'pie')
        {
            var chart = new google.visualization.PieChart(document.getElementById(container));
        }
        if(type == 'column')
        {
            var chart = new google.visualization.ColumnChart(document.getElementById(container));
        }
        if(type == 'bar')
        {
            var chart = new google.visualization.BarChart(document.getElementById(container));
        }
        if(type == 'line')
        {
            var chart = new google.visualization.LineChart(document.getElementById(container));
        }
        chart.draw(data, options);
    }
</script>
</head>
<body>
<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="#">Analisis Koleksi Buku</a>
    </div>
</nav>
<div class="uk-container">
    <div class="uk-child-width-1-2@s" uk-grid uk-height-match="target: > div > .uk-card">    
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Data Klasifikasi Buku Grafik1</h3>
                <div id="grafik1" style="height:350px;"></div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Data Klasifikasi Buku Grafik2</h3>
                <div id="grafik2" style="height:350px;"></div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Data Klasifikasi Buku Grafik3</h3>
                <div id="grafik3" style="height:350px;"></div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Data Klasifikasi Buku Grafik4</h3>
                <div id="grafik4" style="height:350px;"></div>
            </div>
        </div>
    </div>
</div>
<div class="uk-flex uk-flex-column uk-flex-middle uk-flex-center uk-height-viewport" style="background-color:#ccc; height:300px;">
<div id="diagram-pie"></div>
</div>
<script src="<?php echo base_url('vendor/uikit/js/'); ?>uikit.js"></script>
</body>
</html>
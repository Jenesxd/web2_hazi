<!DOCTYPE HTML>
<html>
<div class="page_content">
  <head>
  <meta charset="utf-8">
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src = "varosok.js"></script>
  <title>Városok lakottsága évekre lebontva</title>
  <style>
    #informaciosdiv {
      width: 400px;
    }
    #intezmenyinfo {
      float: right;
      border: 1px solid black;
      width: 230px;
      height: 100px;
    }
    .cimke{
      display: inline-block;
      width: 100px;
      text-align: right;
    }
    span {
      margin: 3px 5px;
    }
    label {
      display: inline-block;
      width: 70px;
      text-align: right;
    }
    select {
      width: 115px;
    }
  </style>
  </head>
  <body>
    <h1>Városok Lakossága:</h1>
    <div id = 'informaciosdiv'>
      <div id = 'intezmenyinfo'>
        <span class="cimke">Év:</span><span id="ev" class="adat"></span><br>
        <span class="cimke">Nőtt:</span><span id="no" class="adat"></span><br>
        <span class="cimke">Összesen:</span><span id="osszesen" class="adat"></span><br>
        
      </div>
      <label for='megyecimke'>Megye:</label>
      <select id = 'megyekselect'></select>
      <br><br>
      <label for = 'varoscimke'>Város:</label>
      <select id = 'varosselect'></select>
      <br><br>
      <label for = 'evcimke'>Év:</label>
      <select id = 'evselect'></select>
    </div>
</div>
  </body>
  
</html>




<?php

$caixas = $_POST['caixas'];

 $total = $caixas/8;
 $local ="";


// Creates an array of strings to hold the lines of the KML file.
$file = fopen('infradefault.kml','w');
$kml = array('<?xml version="1.0" encoding="UTF-8"?>');
$kml[] = '<kml xmlns="http://www.opengis.net/kml/2.2" xmlns:gx="http://www.google.com/kml/ext/2.2" xmlns:kml="http://www.opengis.net/kml/2.2" xmlns:atom="http://www.w3.org/2005/Atom">';
$kml[] = ' <Document>';
$kml[] = ' <Style id="restaurantStyle">';
$kml[] = ' <IconStyle id="restuarantIcon">';
$kml[] = ' <Icon>';
$kml[] = ' <href>http://maps.google.com/mapfiles/kml/pal2/icon63.png</href>';
$kml[] = ' </Icon>';
$kml[] = ' </IconStyle>';
$kml[] = ' </Style>';
$kml[] = ' <Style id="barStyle">';
$kml[] = ' <IconStyle id="barIcon">';
$kml[] = ' <Icon>';
$kml[] = ' <href>http://maps.google.com/mapfiles/kml/pal2/icon27.png</href>';
$kml[] = ' </Icon>';
$kml[] = ' </IconStyle>';
$kml[] = ' </Style>';

$kml[] = '<Folder>';
$kml[] = '<name>InfraDefault</name>';
$kml[] = ' <Folder>
<name>Logotipo</name>
 <ScreenOverlay>


   <!-- Origin (x=0/y=0) is in the lower left corner.

        y goes up, x goes right.

     -->

<!-- Place the upper left corner (0/1) of the image... -->
       <overlayXY x="0" y="1" xunits="fraction" yunits="fraction"/>
       <screenXY x="0" y="1" xunits="fraction" yunits="fraction"/>
       <rotationXY x="0" y="0" xunits="fraction" yunits="fraction"/>
       <size x="150" y="150" xunits="pixels" yunits="pixels"/>

    <Icon><href>files/logo.png</href></Icon>
 
 </ScreenOverlay>
 </Folder>';
$kml[] = '<Folder>';
$kml[] = '<name>Arquivo de Cliente</name>';
$kml[] = '</Folder>';

$nrRedeNAP = 1;
$nrRedeHUB = 1;
$nrRedeCEO = 1;
$nrRedeEB = 1;
$nrDerivacao = 1;

$kml[] = '<Folder>';
$kml[] = '<name>Fibras</name>';
$kml[] = '<Folder>';
$kml[] = '<name>BACKBONE</name>';

if($total<=3){
    $kml[] = '<Folder>';
    $kml[] = '<name>06FO</name>';
    $kml[] = '</Folder>';
}
if ($total<=6 && $total>3) {
    $kml[] = '<Folder>';
    $kml[] = '<name>12FO</name>';
    $kml[] = '</Folder>';
}
if ($total<=12 && $total>6) {
    $kml[] = '<Folder>';
    $kml[] = '<name>24FO</name>';
    $kml[] = '</Folder>';
}
if ($total<=18 && $total>12) {
    $kml[] = '<Folder>';
    $kml[] = '<name>36FO</name>';
    $kml[] = '</Folder>';
}
if ($total<=24 && $total>18) {
    $kml[] = '<Folder>';
    $kml[] = '<name>48FO</name>';
    $kml[] = '</Folder>';
}
if($total>24){
    $kml[] = '<Folder>';
    $kml[] = '<name>06FO</name>';
    $kml[] = '</Folder>';
    $kml[] = '<Folder>';
    $kml[] = '<name>12FO</name>';
    $kml[] = '</Folder>';
    $kml[] = '<Folder>';
    $kml[] = '<name>24FO</name>';
    $kml[] = '</Folder>';
    $kml[] = '<Folder>';
    $kml[] = '<name>36FO</name>';
    $kml[] = '</Folder>';
    $kml[] = '<Folder>';
    $kml[] = '<name>48FO</name>';
    $kml[] = '</Folder>';

}

$kml[] = '<Folder>';
$kml[] = '<name>EB</name>';
$kml[] = '<Folder>';
$kml[] = '<name>Rede '.$nrRedeEB.' </name>';
$kml[] = '</Folder>';
while ($nrRedeEB < $total) {
    $nrRedeEB++;
    //$kml[] = '</Folder>';
    $kml[] = '<Folder>';
    $kml[] = '<name>Rede '.$nrRedeEB.' </name>';   
    $kml[]='</Folder>';
    
}
//$kml[]='</Folder>';
$kml[]='</Folder>';
$kml[]='</Folder>';

$kml[] = '<Folder>';
$kml[] = '<name>DERIVAÇÃO</name>';
$kml[] = '<Folder>';
$kml[] = '<name>Rede '.$nrDerivacao.' </name>';
$kml[] = '</Folder>';
while ($nrDerivacao < $total) {
    $nrDerivacao++;
    //$kml[] = '</Folder>';
    $kml[] = '<Folder>';
    $kml[] = '<name>Rede '.$nrDerivacao.' </name>';   
    $kml[]='</Folder>';
    
}
//$kml[]='</Folder>';
$kml[]='</Folder>';
$kml[]='</Folder>';





// Iterates through the rows, printing a node for each row.

// Create Folder NAP
$kml[]= '<Folder>';
$kml[]= '<name>Caixas</name>';
$kml[] = '<Folder>';
$kml[] = '<name>NAP</name>';
$kml[] = '<Folder>';
$kml[] = '<name>Rede '.$nrRedeNAP.' </name>';
$kml[]='</Folder>';
while ($nrRedeNAP < $total) {
    $nrRedeNAP++;
    //$kml[] = '</Folder>';
    $kml[] = '<Folder>';
    $kml[] = '<name>Rede '.$nrRedeNAP.' </name>';   
    $kml[]='</Folder>';
    

}

$kml[]='</Folder>';


// Create Folder HUB
$kml[] = '<Folder>';
$kml[] = '<name>HUB</name>';
$kml[] = '<Folder>';
$kml[] = '<name>Rede '.$nrRedeHUB.' </name>';
$kml[]='</Folder>';
while ($nrRedeHUB < $total) {
   
    $nrRedeHUB++;
    $kml[] = '<Folder>';
    $kml[] = '<name>Rede '.$nrRedeHUB.' </name>';
    $kml[]='</Folder>';   
   

}

$kml[]='</Folder>';

// Create Folder CEO
$kml[] = '<Folder>';
$kml[] = '<name>CEO</name>';
$kml[] = '<Folder>';
$kml[] = '<name>Rede '.$nrRedeCEO.' </name>';
$kml[]='</Folder>';
while ($nrRedeCEO < $total) {
  
    $nrRedeCEO++;
    //$kml[] = '</Folder>';
    $kml[] = '<Folder>';
    $kml[] = '<name>Rede '.$nrRedeCEO.' </name>';   
    $kml[]='</Folder>';
   

}

$kml[]='</Folder>';


// End XML file
$kml[] = ' </Folder>';
$kml[] = ' </Folder>';
$kml[] = ' </Document>';
$kml[] = '</kml>';
$kmlOutput = join("\n", $kml);
//header('location: engenharia.php');
fwrite($file,  print_r($kmlOutput, TRUE));

header('location: index.php');



?>

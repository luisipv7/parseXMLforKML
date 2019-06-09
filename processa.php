<?php
/*
$conn = new mysqli("localhost","root","","converte");

if ($conn->connect_error) {
    echo "Error:". $conn->connect_error;
    exit;
}*/

$xml = simplexml_load_file($_FILES['arquivo']['tmp_name']);

$param1 = 01;

$param2 = 01;

$nome = $_POST['nome'];



 //$lng = $xml->Document->Folder->Folder->Placemark->LookAt->longitude;

 $html ="<style>
table, th, td {
  border: 1px solid black;
}
        </style>";
        $html .="<table>";
        $html .="<tr>";
        $html .="<th>Longitude</th>";
        $html .="<th>Latitude</th>";
        $html .="<th>Coodinates</th>";
        $html .="<th>Nomenclatura</th>";
        $html .="</tr>";


/*
 foreach($xml->Document->Folder as $name){
     foreach($name->Folder->Placemark->LookAt as $name2){
        $html .="<tr>";
        $html .="<td>".$name2->longitude."</td>";
        $html .="</tr>";
    }
       // $result+= $name2->name
}*/

//$var = $xml->Document->Folder->Folder->Placemark->LookAt->longitude;
//$html .= "<strong>".$var."</strong>";

        

        foreach ($xml->Document->Folder->Folder as $value1) {
            foreach($value1->Placemark as $value2){
                
                $html .="<tr>";
                $html .="<td>". $value2->LookAt->longitude."</td>";
                $lng =  $value2->LookAt->longitude;
                $html .="<td>". $value2->LookAt->latitude."</td>";
                $lat =  $value2->LookAt->latitude;
                //////////////////////////////////////////////////////////////
                $camera ='<longitude>'. $value2->LookAt->longitude .'</longitude>
                <latitude>'. $value2->LookAt->latitude .'</latitude>   
                <altitude>2000</altitude>
     
                </Camera>';
                /////////////////////////////////////////////////////////////////
                $html .="<td>". $value2->Point->coordinates."</td>";
                $coordinates =  $value2->LookAt->longitude;
                if($param2==9){
                    $param1++;
                    $param2=01;
                }
                if($param1<10){
                    $html .='<td>'.$nome.'.0'.$param1.'.0'.$param2.'</td>';
                    $name = $nome.'.0'.$param1.'.0'.$param2;
                    $param2++;
                    $html .="</tr>";
                }else{
                $html .='<td> '.$nome.'.'.$param1.'.0'.$param2.'</td>';
                $name = $nome.'.'.$param1.'.0'.$param2;
                $param2++;
                $html .="</tr>";

               // $stmt = $conn->prepare("INSERT INTO tb_usuarios(lat,lng,coordinates,nome)VALUES(?,?,?,?)");
               // $stmt->bind_param("ssss",$lat,$lng,$coordinates,$name);
                //$stmt->execute();

                
            }
           // $result_usuario = "INSERT INTO markers(lat,lng,coordinates,nome) VALUES ('$lat','$lng','$coordinates','$name') ";
           //     $resultado_usuario = mysqli_query($conn, $result_usuario);
            }
            
            
                
            
        }
/*
        $html .="<tr>";
        $html .="<th>Latitude</th>";
        $html .="</tr>";



 foreach($xml->Document->Folder as $name){
     foreach($name->Folder->Placemark->LookAt as $name2){
        $html .="<tr>";
        $html .="<td>".$name2->longitude."</td>";
        $html .="</tr>";
    }
       // $result+= $name2->name
}*/

//$var = $xml->Document->Folder->Folder->Placemark->LookAt->longitude;
//$html .= "<strong>".$var."</strong>";

       /* 
            $param1 = 01;

            $param2 = 01;
        foreach ($xml->Document->Folder->Folder as $value1) {
            
            foreach($value1->Placemark as $value2){
                $html .="<tr>";
                $html .="<td>". $value2->LookAt->longitude."</td>";
                
                if($param2==9){
                    $param1++;
                    $param2=01;
                }
                if($param1<10){
                    $html .="<td> CTO.0".$param1.".0".$param2."</td>";
                    $param2++;
                    $html .="</tr>";
                }else{
                $html .="<td> CTO.".$param1.".0".$param2."</td>";
                $param2++;
                $html .="</tr>";
            }
            }
            
            
        }
            */
        

        $html .="</table>";
        echo $html;
        //echo $var;

        $nrRede = 01;

 $cont=0;

// Creates an array of strings to hold the lines of the KML file.
$file = fopen('nap.kml','w');
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
$kml[] = ' <Camera>';   
$kml[] = '<longitude>'.$xml->Document->Folder->Folder->PlacemarkLookAt->longitude.'</longitude>';
$kml[] = '</latitude>'.$xml->Document->Folder->Folder->PlacemarkLookAt->latitude.'</latitude>'  ;
$kml[] ='<altitude>2000</altitude>';
$kml[] ='</Camera>';
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
 $kml[] = '<name>NAP</name>';
 //$kml[] = '<Folder>';
// $kml[] = '<name>Rede'.$nrRede.' </name>';
 
 foreach ($xml->Document->Folder->Folder as $value1) {
    foreach($value1->Placemark as $value2){
        ///////
        
        if($param1<10){
            if($param2==8){
                $nrRede++;
                $param1++;
                $param2=0;
            }
            if($param2<=8){
            $kml[] = '<Folder>';
            $kml[] = '<name>Rede'.$nrRede.' </name>';
            $kml[]='<Placemark>';
            $kml[]='<name>'.$nome.'.0'.$param1.'.0'.$param2.'</name>';
            $kml[] = ' <LookAt>';
            $kml[] = ' <longitude>'. $value2->LookAt->longitude .'</longitude>';
            $kml[] = ' <latitude>'. $value2->LookAt->latitude .'</latitude>';
            $kml[] = ' <altitude> 0 </altitude>';
            $kml[] = ' <gx:altitudeMode>relativeToSeaFloor</gx:altitudeMode>';  
            $kml[] = ' </LookAt>';
            $kml[] = ' <styleUrl>#msn_triangle4</styleUrl>';
            $kml[] = ' <Point>';
            $kml[] = ' <coordinates>' .$value2->Point->coordinates. '</coordinates>';
            $kml[] = ' </Point>';
            $kml[] = ' </Placemark>';
            $kml[] = '</Folder>';

        }
            //$name = $nome.'.0'.$param1.'.0'.$param2;
            $param2++;
            
           // $html .="</tr>";
        }else{

            if($param2==8){
                $nrRede++;
                $param1++;
                $param2=0;
            }
            if($param2<=8){
            $kml[] = '<Folder>';
            $kml[] = '<name>Rede'.$nrRede.' </name>';
            $kml[]='<Placemark>';
            $kml[]='<name> '.$nome.'.'.$param1.'.0'.$param2.'</name>';
            $kml[] = ' <LookAt>';
            $kml[] = ' <longitude>'. $value2->LookAt->longitude .'</longitude>';
            $kml[] = ' <latitude>'. $value2->LookAt->latitude .'</latitude>';
            $kml[] = ' <altitude> 0 </altitude>';
            $kml[] = ' <gx:altitudeMode>relativeToSeaFloor</gx:altitudeMode>';  
            $kml[] = ' </LookAt>';
            $kml[] = ' <styleUrl>#msn_triangle4</styleUrl>';
            $kml[] = ' <Point>';
            $kml[] = ' <coordinates>' .$value2->Point->coordinates. '</coordinates>';
            $kml[] = ' </Point>';
            $kml[] = ' </Placemark>';
       // $name = $nome.'.'.$param1.'.0'.$param2;
        $param2++;
            }
        }
        $html .="</tr>";

        ///////
 $kml[] = ' <Placemark>';
 $kml[] = ' <name>' . . '</name>';
 $kml[] = ' <LookAt>';
 $kml[] = ' <longitude>'. $value2->LookAt->longitude .'</longitude>';
 $kml[] = ' <latitude>'. $value2->LookAt->latitude .'</latitude>';
 $kml[] = ' <altitude> 0 </altitude>';
 $kml[] = ' <gx:altitudeMode>relativeToSeaFloor</gx:altitudeMode>';  
 $kml[] = ' </LookAt>';
 $kml[] = ' <styleUrl>#msn_triangle4</styleUrl>';
 $kml[] = ' <Point>';
 $kml[] = ' <coordinates>' .$value2->Point->coordinates. '</coordinates>';
 $kml[] = ' </Point>';
 $kml[] = ' </Placemark>';
        //mysqli_query($conn,'TRUNCATE TABLE markers');
        

        
        foreach ($xml->Document->Folder->Folder as $value1) {
            foreach($value1->Placemark as $value2){
                
                $html .="<tr>";
                $html .="<td>". $value2->LookAt->longitude."</td>";
                $lng =  $value2->LookAt->longitude;
                $html .="<td>". $value2->LookAt->latitude."</td>";
                $lat =  $value2->LookAt->latitude;
                //////////////////////////////////////////////////////////////
                $camera ='<longitude>'. $value2->LookAt->longitude .'</longitude>
                <latitude>'. $value2->LookAt->latitude .'</latitude>   
                <altitude>2000</altitude>
     
                </Camera>';
                /////////////////////////////////////////////////////////////////
                $html .="<td>". $value2->Point->coordinates."</td>";
                $coordinates =  $value2->LookAt->longitude;
                if($param2==9){
                    $param1++;
                    $param2=01;
                }
                if($param1<10){
                    $html .='<td>'.$nome.'.0'.$param1.'.0'.$param2.'</td>';
                    $name = $nome.'.0'.$param1.'.0'.$param2;
                    $param2++;
                    $html .="</tr>";
                }else{
                $html .='<td> '.$nome.'.'.$param1.'.0'.$param2.'</td>';
                $name = $nome.'.'.$param1.'.0'.$param2;
                $param2++;
                $html .="</tr>";

               // $stmt = $conn->prepare("INSERT INTO tb_usuarios(lat,lng,coordinates,nome)VALUES(?,?,?,?)");
               // $stmt->bind_param("ssss",$lat,$lng,$coordinates,$name);
                //$stmt->execute();

                
            }
           // $result_usuario = "INSERT INTO markers(lat,lng,coordinates,nome) VALUES ('$lat','$lng','$coordinates','$name') ";
           //     $resultado_usuario = mysqli_query($conn, $result_usuario);
            }
            
            
                
            
        }
/*

        
if($param2==9){
            $param1++;
            $param2=01;
        }
?>
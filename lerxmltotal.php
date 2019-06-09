<?php
/*
$dados = $_FILES['arquivo'];
*/

$xml = simplexml_load_file($_FILES['arquivo']['tmp_name']);

//$xml = simplexml_load_file();

$html ="<style>
table, th, td {
  border: 1px solid black;
}
</style>";

$result = 0;

    if($xml->Document->Folder->Folder->Folder->Folder->Folder->name=="06F"){

        foreach($xml->Document->Folder->Folder->Folder->Folder->Folder as $name){
            foreach ($name->Placemark as $key => $name2) {
                echo'<br>'.$name2->name;
                $result+= $name2->name;
            }
          
        }

    }else if($xml->Document->name=="06F.kml"||$xml->Document->name=="12F.kml"||$xml->Document->name=="24F.kml"||$xml->Document->name=="36F.kml"||$xml->Document->name=="48F.kml")
    {


    foreach($xml->Document->Folder->Placemark as $name){
    echo'<br>'.$name->name;
    $result+= $name->name;
        }

    }

    else if ($xml->Document->name=="NAP.kml"||$xml->Document->name=="Nap.kml"||$xml->Document->name=="nap.kml"||$xml->Document->name=="HUB.kml"||$xml->Document->name=="Hub.kml"||$xml->Document->name=="hub.kml"||$xml->Document->name=="CEO.kml"||$xml->Document->name=="Ceo.kml"||$xml->Document->name=="ceo.kml") {
                 $html .="<table>";
                 $html .="<tr>";
                 $html .="<th>Caixas</th>";
                 $html .="</tr>";
                 
        foreach($xml->Document->Folder->Folder as $name){
            foreach ($name->Placemark as $key => $name2) {
                
                $html .="<tr>";
                $html .="<td>".$name2->name."</td>";
                $html .="</tr>";
                $result+= 1;
            }
          
        }
        $html .="</table>";
        echo $html;
    }



echo'<br/><br/><strong>Resultado: '.$result.'</strong>';

?>
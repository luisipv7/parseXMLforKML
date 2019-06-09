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

    if($xml->Document->name=="DERIVAÇÃO.kml" ||$xml->Document->name=="DERIVACAO.kml"|| $xml->Document->name=="derivacao.kml"){
        $html .="<table>";
        $html .="<tr>";
        $html .="<th>Fibras</th>";
        $html .="</tr>";
        $html .="<tr>";
        $html .="<td><strong>".$xml->Document->Folder->name."</strong></td>";
        $html .="</tr>";

        foreach($xml->Document->Folder->Folder as $name){
            foreach ($name->Placemark as $name2) {
                $html .="<tr>";
                $html .="<td>".$name2->name."</td>";
                $html .="</tr>";
                $result+= $name2->name;
            }
          
        }
        $html .="</table>";
        echo $html;
    }else if($xml->Document->name=="06FO.kml"||$xml->Document->name=="12FO.kml"||$xml->Document->name=="24FO.kml"||$xml->Document->name=="36FO.kml"||$xml->Document->name=="36FO.kml"||$xml->Document->name=="48FO.kml")
    {
        $html .="<table>";
        $html .="<tr>";
        $html .="<th>Fibras</th>";
        $html .="</tr>";
        $html .="<tr>";
        $html .="<td><strong>".$xml->Document->Folder->name."</strong></td>";
        $html .="</tr>";

    foreach($xml->Document->Folder->Placemark as $name){
        $html .="<tr>";
        $html .="<td>".$name->name."</td>";
        $html .="</tr>";
        $result+= $name->name;
        }
        $html .="</table>";
        echo $html;
    }

    else if ($xml->Document->name=="NAP.kml"||$xml->Document->name=="Nap.kml"||$xml->Document->name=="nap.kml"||$xml->Document->name=="HUB.kml"||$xml->Document->name=="Hub.kml"||$xml->Document->name=="hub.kml"||$xml->Document->name=="CEO.kml"||$xml->Document->name=="Ceo.kml"||$xml->Document->name=="ceo.kml"||$xml->Document->name=="EMENDA.kml"||$xml->Document->name=="Emenda.kml"||$xml->Document->name=="emenda.kml") {
                 $html .="<table>";
                 $html .="<tr>";
                 $html .="<th>Caixas</th>";
                 $html .="</tr>";
                 $html .="<tr>";
                 $html .="<td><strong>".$xml->Document->Folder->name."</strong></td>";
                 $html .="</tr>";
                 
        foreach($xml->Document->Folder->Folder as $name){
            foreach ($name->Placemark as $name2) {
                
                $html .="<tr>";
                $html .="<td>".$name2->name."</td>";
                $html .="</tr>";
                $result+= 1;
            }
          
        }
        $html .="</table>";
        echo $html;
    }

    else if($xml->Document->name == "EB.kml" || $xml->Document->Folder->name=="36F"||$xml->Document->Folder->name=="24F"||$xml->Document->Folder->name=="48F"||$xml->Document->Folder->name=="12F"||$xml->Document->Folder->name=="06F"){
        $html .="<table>";
        $html .="<tr>";
        $html .="<th>Caixas</th>";
        $html .="</tr>";
        $html .="<tr>";
        $html .="<td><strong>".$xml->Document->Folder->name."</strong></td>";
        $html .="</tr>";

    foreach($xml->Document->Folder->Placemark as $name){
        $html .="<tr>";
         $result+= 1;
        $html .="<td>".$name->name."</td>";
        $html .="</tr>";
       
        }
        $html .="</table>";
        echo $html;

       
}

echo'<br/><br/><strong>Resultado: '.$result.'</strong>';

?>
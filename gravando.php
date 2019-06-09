<?php

$xml = simplexml_load_file($_FILES['arquivo']['tmp_name']);

$sxe = new SimpleXMLElement($xml);





 
 $html ="<style>
table, th, td {
  border: 1px solid black;
}
        </style>";
        $html .="<table>";
        $html .="<tr>";
        $html .="<th>Longitude</th>";
        $html .="</tr>";



        

        foreach ($xml->Document->Folder->Folder as $value1) {
            foreach($value1->Placemark as $value2){
                
                $html .="<tr>";
                $value2 = $sxe->addChild('name','CTO.');
                $html .="<td>".$value2."</td>";
                $html .="</tr>";
            }
            
                
            
        }
        /*
        $html .="<tr>";
        $html .="<th>Latitude</th>";
        $html .="</tr>";



        

        foreach ($xml->Document->Folder->Folder as $value1) {
            foreach($value1->Placemark as $value2){
                
                $html .="<tr>";
                $html .="<td>". $value2->LookAt->latitude."</td>";
                $html .="</tr>";
            }
            
                
            
        }
        */

        //$html .="</table>";
        //echo $html;
        echo $sxe->asXML();
      
        

?>
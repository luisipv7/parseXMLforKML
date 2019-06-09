<?php
/*
$dados = $_FILES['arquivo'];
*/

$xml = simplexml_load_file($_FILES['arquivo']['tmp_name']);

//$xml = simplexml_load_file();

$result = 0;

$local = $xml->Document->name;


    switch ($local) {
        
        case 'DERIVAÇÃO.kml'|| 'DERIVACAO.kml'||'derivacao.kml':

        foreach($xml->Document->Folder->Folder as $name){
            foreach ($name->Placemark as $key => $name2) {
                echo'<br>'.$name2->name;
                $result+= $name2->name;
            }
          
        }
            break;

            case "12F.kml":
            echo 'entrou';
            foreach($xml->Document->Folder->Placemark as $name){
                echo'<br>'.$name->name;
                $result+= $name->name;
                    }
                    echo'<br/><br/><strong>Resultado: '.$result.'</strong>';
                    break;

                    case '24F.kml':

                    foreach($xml->Document->Folder->Placemark as $name){
                        echo'<br>'.$name->name;
                        $result+= $name->name;
                            }
                            echo'<br/><br/><strong>Resultado: '.$result.'</strong>'; 
                            break;

                            case '36F.kml':

                            foreach($xml->Document->Folder->Placemark as $name){
                                echo'<br>'.$name->name;
                                $result+= $name->name;
                                    }
                                    echo'<br/><br/><strong>Resultado: '.$result.'</strong>';
                                    break;

                                    case '48F.kml':

                                    foreach($xml->Document->Folder->Placemark as $name){
                                        echo'<br>'.$name->name;
                                        $result+= $name->name;
                                            }
                                            echo'<br/><br/><strong>Resultado: '.$result.'</strong>';
                                            break;
        
        default:
        echo $local;
            break;
    }

   


    






?>
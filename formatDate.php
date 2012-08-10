<?php
function formatDate($date, $oldFormat, $newFormat) {
    //Converte strings atual para array.
    $arrDate = str_split(strtoupper ($date));
    $arrOld = str_split(strtoupper ($oldFormat));
    $arrNew = str_split(strtoupper ($newFormat));
    
    $newDate = array();
    $i = 0;
             
    //Identifico dia, mês, ano e separador na data usando o formato atual como referência.
    while (in_array("D", $arrOld) AND in_array("D", $arrNew)) {
        $newDate [array_search("D", $arrNew)] = $date[array_search("D", $arrOld)];
        unset($arrOld[array_search("D", $arrOld)]);
        unset($arrNew[array_search("D", $arrNew)]);
    }
    
    while (in_array("M", $arrOld) AND in_array("M", $arrNew)) {
        $newDate [array_search("M", $arrNew)] = $date[array_search("M", $arrOld)];
        unset($arrOld[array_search("M", $arrOld)]);
        unset($arrNew[array_search("M", $arrNew)]);
    }
    
    while (in_array("Y", $arrOld) AND in_array("Y", $arrNew)) {
        $newDate [array_search("Y", $arrNew)] = $date[array_search("Y", $arrOld)];
        unset($arrOld[array_search("Y", $arrOld)]);
        unset($arrNew[array_search("Y", $arrNew)]);
    }
    
    for ($i = 0; $i <= count($newDate)-1; $i++) {
        if (!array_key_exists($i,$newDate)) {
            $newDate[$i] = array_shift($arrNew);
        }
    }

    ksort($newDate);
    $newDate = implode("", $newDate);

    return $newDate;
}

?>
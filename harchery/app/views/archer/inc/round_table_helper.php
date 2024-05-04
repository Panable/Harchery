<?php

function genTableHead($data) {
    $html = '<table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th rowspan="2">Round Name</th>
                        <th colspan="100%">Distance in metres</th>
                    </tr>
                    <tr>
                        <td>90</td>
                        <td>80</td>
                        <td>70</td>
                        <td>60</td>
                        <td>50</td>
                        <td>40</td>
                        <td>30</td>
                        <td>20</td>
                        <td>10</td>
                    </tr>
                </thead>';

    return $html;
}

function genTableRows($data) {
    $rounds = $data['Rounds'];
    $html = '';

    foreach($rounds as $roundName => $distances) {
        $html .= "<tr>\n";
        $html .= "<td>{$roundName}</td>\n";
        
        // I'm writing this before finishing this function
        // But this may be some of the worst php code I've ever written.
        // - Dan R
        $arrayPointer = 0;
        for ($i=0; $i < 9; $i++) {
            $html .= "<td>\n";
            if (!array_key_exists($arrayPointer, $distances['Distance'])) continue;
            $current = $distances['Distance'][$arrayPointer];

            $end   = $current['TotalEnds'];
            $range = $current['Range'];
            $face  = $current['Face'];

            // This shit only works because the array is sorted
            if ($range == (90 - ($i * 10))) {
                // FOUND A RANGE!!

                $face_chr = '';

                switch ($face) {
                    case 120:
                        $face_chr = '+';
                        break;

                    case 80:
                        $face_chr = '*';
                        break;
                    
                    default:
                        break;
                }

                $html .= "{$end}{$face_chr}";
                
                $arrayPointer++;
            }
            $html .= "</td>\n";
        }

        $html .= "</tr>\n";
    }


    return $html;
}


function genTable($data) {
    $html = '<table class="table table-bordered table-dark">';
    $head = genTableHead($data);
    $rows = genTableRows($data);
    $html .= $head;
    $html .= $rows;
    $html .= "</table>";
    echo $html;
}
?>

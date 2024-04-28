<?php


function genTableHead($data) {
    $categories = $data['categories'];
    $header_cell="";
    $sub_header_cells="";

    //print_r($categories);

    foreach ($categories as $category) {
        $num_genders = sizeof($category->Genders);
        $header_cell .= "<th colspan=\"{$num_genders}\">$category->AgeGroup</th>\n";
        foreach ($category->Genders as $gender) {
            $sub_header_cells .= "<td>$gender</td>\n";
        }
    }

    $head = '<thead>
                 <tr>
                   <th class="yellow-cell" rowspan="2">Event</th>'
                 . $header_cell .
                 '</tr>
                 <tr>'
                 . $sub_header_cells .
                 '</tr>
            </thead>';

    return $head;
}

function genTableRows($data) {
    $rows = '<tr>
              <td>WA90/1440</td>
              <td class="yellow-cell">RC</td>
              <td class="yellow-cell">RC</td>
              <!-- More td elements for event data -->
            </tr>';
    return $rows;
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

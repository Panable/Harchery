<?php


function genTableHead($data) {
    $categories = $data['categories'];
    $header_cell="";
    $sub_header_cells="";

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
              <td class="yellow-cell">
                <select class="custom-select mt-2" multiple name="records[0][WA90/1440,50+,Female][]">
                    <option value="C">Compound</option>
                    <option value="CB">Compound Barebow</option>
                    <option value="L">Longbow</option>
                    <option value="R">Recurve</option>
                    <option value="RB">Recurve Barebow</option>
                </select>
              </td>
              <td class="yellow-cell">
                <select class="custom-select mt-2" multiple name="records[0][WA90/1440,50+,Male][]">
                    <option value="Compound">Compound</option>
                    <option value="Compound Barebow">Compound Barebow</option>
                    <option value="Longbow">Longbow</option>
                    <option value="Recurve">Recurve</option>
                    <option value="Recurve Barebow">Recurve Barebow</option>
                </select>
              </td>
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

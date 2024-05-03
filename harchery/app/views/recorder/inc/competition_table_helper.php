<?php

function genTableHead($data) {
    $categories = $data['categories'];
    $header_cell="";
    $sub_header_cells="";
    $data_layout = [
        'categories' => [],
        'html' => "",
    ];

    foreach ($categories as $index => $category) {
        $num_genders = sizeof($category->Genders);
        $header_cell .= "<th colspan=\"{$num_genders}\">$category->AgeGroup</th>\n";
        foreach ($category->Genders as $gender) {
            $sub_header_cells .= "<td>$gender</td>\n";
            $newCategory = [
                'Gender' => $gender,
                'AgeGroup' => $category->AgeGroup,
            ];
            array_push($data_layout['categories'], $newCategory);
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

    $data_layout['html'] = $head;

    return $data_layout;
}

function genTableRows($data, $categories) {
    
    $full_rows = '';
    $equipment_html = '';     

    foreach($data['equipment'] as $equipment) {
        $equipment_html .= "<option value =\"{$equipment}\">{$equipment}</option>\n";
    }

    
    foreach($data['rounds'] as $round) {
        $full_rows .= "<tr>\n";
        $full_rows .= "<td>{$round}</td>\n";

        foreach($categories as $category) {
            $full_rows .= "<td class=\"yellow-cell\">\n";
            $full_rows .= "<select class=\"form-select mt-2\" size=\"2\" multiple name=\"records[0][{$round},{$categories['AgeGroup']},{$categories['Gender']}][]\">\n";
            $full_rows .= $equipment_html;
            $full_rows .= "</select>\n";
            $full_rows .= "</td>\n";
        }

        $full_rows .= "</tr>";
    }

    

    $rows = '<tr>
              <td>WA90/1440</td>
              <td class="yellow-cell">
                <select class="form-select mt-2" size="2" multiple name="records[0][WA90/1440,50+,Female][]">'
                . $equipment_html .
                '</select>
              </td>
              <td class="yellow-cell">
                <select class="form-select mt-2" size="2" multiple name="records[0][WA90/1440,50+,Male][]">'
                . $equipment_html .
                '</select>
              </td>
              <!-- More td elements for event data -->
            </tr>';

    $rows1 = '<tr>
              <td>WA90/1440</td>
              <td class="yellow-cell">
                <select class="form-select mt-2" size="2" multiple name="records[0][WA90/1440,50+,Female][]">
                    <option value="C">Compound</option>
                    <option value="CB">Compound Barebow</option>
                    <option value="L">Longbow</option>
                    <option value="R">Recurve</option>
                    <option value="RB">Recurve Barebow</option>
                </select>
              </td>
              <td class="yellow-cell">
                <select class="form-select mt-2" size="2" multiple name="records[0][WA90/1440,50+,Male][]">
                    <option value="Compound">Compound</option>
                    <option value="Compound Barebow">Compound Barebow</option>
                    <option value="Longbow">Longbow</option>
                    <option value="Recurve">Recurve</option>
                    <option value="Recurve Barebow">Recurve Barebow</option>
                </select>
              </td>
              <!-- More td elements for event data -->
            </tr>';
    return $full_rows;
}

function genTable($data) {
    $html = '<table class="table table-bordered table-dark">';
    $head_data_layout = genTableHead($data);
    $head = $head_data_layout['html'];
    $categories = $head_data_layout['categories'];
    $rows = genTableRows($data, $categories);
    $html .= $head;
    $html .= $rows;
    $html .= "</table>";
    echo $html;
}

?>

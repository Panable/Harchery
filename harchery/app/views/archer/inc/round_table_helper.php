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
                   <th rowspan="2">Event</th>'
                 . $header_cell .
                 '</tr>
                 <tr>'
                 . $sub_header_cells .
                 '</tr>
            </thead>';

    $data_layout['html'] = $head;

    return $data_layout;
}

function abbreviateString($string) {
    $abbreviation = '';
    
    // Iterate through each character in the string
    for ($i = 0; $i < strlen($string); $i++) {
        // Check if the character is a capitalized letter
        if (ctype_upper($string[$i])) {
            // Append the capitalized letter to the abbreviation
            $abbreviation .= $string[$i];
        }
    }
    
    return $abbreviation;
}

function genTableRows($data, $categories) {

    $full_rows = '';
    $equipment_html = '';

    foreach($data['equipment'] as $equipment) {
        $abv = abbreviateString($equipment);
        $equipment_html .= "<option value=\"{$equipment}\">{$abv}</option>\n";
    }


    foreach($data['rounds'] as $round) {
        $full_rows .= "<tr>\n";
        $full_rows .= "<td>{$round}</td>\n";

        foreach($categories as $category) {
            $full_rows .= "<td class=\"p-2\">\n";
            $full_rows .= "<select class=\"form-select custom-select-lg\" style=\"max-width: 12em; height: 120px; overflow-y: auto; \" size=\"2\" multiple name=\"records[0][{$round},{$category['AgeGroup']},{$category['Gender']}][]\">\n";
            $full_rows .= $equipment_html;
            $full_rows .= "</select>\n";
            $full_rows .= "</td>\n";
        }

        $full_rows .= "</tr>";
    }

    return $full_rows;
}


function genTable($data) {
    // $html = '<table class="table table-bordered table-dark">';
    // $head_data_layout = genTableHead($data);
    // $head = $head_data_layout['html'];
    // $categories = $head_data_layout['categories'];
    // $rows = genTableRows($data, $categories);
    // $html .= $head;
    // $html .= $rows;
    // $html .= "</table>";
    // echo $html;
}

?>

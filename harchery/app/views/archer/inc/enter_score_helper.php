<?php 

function encode_name($name) {
    $encoded_name = str_replace('/', '|', $name);
    $encoded_name = str_replace(' ', '_', $encoded_name);
    return $encoded_name;
}

function prompt_score($data)
{
    //unset($_POST['RoundName']);

    $head = genTableHead($data);
    $rows = genTableRows($data);

    $selects = "<label for=\"Division\">What equipment did you shoot?</label>";
    $selects .= "<select name=\"Division\">\n";

    foreach ($data['Division'] as $division) {
        $selects .= "<option value=\"$division\">$division</option>\n";
    }

    $selects .= "</select>";

    $date = date("Y-m-d H:i:s");

    $encoded_name = $data['Round'][0]->Name;
    $encoded_name = encode_name($encoded_name);

    $root = URLROOT;
    $html = "<h1>Enter your score.</h1>\n
             <br>
             <h3>{$data['Round'][0]->Name}</h3>
             <form action=\"{$root}archer/enterScore/$encoded_name\" method=\"post\">
                 <table class=\"table table-bordered table-dark\">\n
                     {$head}
                     {$rows}
                 </table>\n
                 {$selects}
                 <label for=\"Date\">Enter Date:</label>
                 <input type=\"datetime-local\"  name=\"Date\" value=\"{$date}\">
                 <input type=\"hidden\" id=\"ArcherID\" name=\"ArcherID\" value=\"{$data['ArcherID']}\">
                 <input type=\"hidden\" id=\"RoundName\" name=\"RName\" value=\"{$encoded_name}\">
                 <button type=\"submit\" class=\"btn btn-primary\">Enter</button>
              </form>";
    echo $html;
}

function genTableHead($data)
{
    $html = "<thead>\n";

    $html .= '<tr>
                 <th rowspan="2">Range</th>
                 <th colspan="100%">Ends</th>
             </tr>';


    $rounds = $data['Round'];

    $html .= "<tr>";

    for ($i = 1; $i <= 6; $i++) {
        $html .= "<td>$i</td>";
    }

    $html .= "</thead>\n";
    $html .= "</tr>";

    return $html;
}

function genTableRows($data)
{
    $html = '';
    $html .= "<tbody>";

    $rounds = $data['Round'];

    $normalized_index = 0;
    foreach ($rounds as $round) {
        $html .= "<tr>\n";
        $html .= "<td>{$round->Range}</td>";
        
        for ($i = 1; $i <= 6; $i++) {
            $normalized_index++;
            if ($i > $round->TotalEnds) {
                $html .= "<td></td>";
                continue;
            }

            $html .= "<td>
                          <input type=\"hidden\" id=\"Range\" name=\"Ranges[{$normalized_index}][Range]\" value=\"{$round->Range}\">
                          <input type=\"hidden\" id=\"Range\" name=\"Ranges[{$normalized_index}][End]\" value=\"{$i}\">
                          <input name=\"Ranges[{$normalized_index}][Scores]\" type=\"text\" id=\"numbersInput\" placeholder=\"e.g., 1,2,3,4,5,6\">
                      </td>";
        }
        $html .= "</tr>\n";
    }
    $html .= "</tbody>";
    return $html;
}

function prompt_round($data)
{
    $select = '';
    foreach ($data['round_names'] as $round) {
        $select .= "<option value=\"{$round}\">{$round}</option>";
    }

    $root = URLROOT;

    $html ="<h1 class=\"card-text\">Select the Round you are playing.</h1>
            <form action=\"{$root}archer/enterScore/-1\" method=\"post\">
                <div class=\"mb-3\">
                    <label for=\"RoundName\">Round Name:</label>
                    <select class=\"form-select\" id=\"RoundName\" name=\"RoundName\">'
                        {$select}
                    </select>
                </div>
                <button type=\"submit\" class=\"btn btn-primary\">Select</button>
            </form>";

    return $html;
}

function generate_form($data)
{
    $html = '';

    
    if ($data['PromptRound'])
       $html = prompt_round($data);
    else
       $html = prompt_score($data);

    echo $html;
}

?>

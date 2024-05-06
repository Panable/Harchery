<?php 

function prompt_score($data)
{
    $head = genTableHead($data);
    $rows = genTableRows($data);

    $html = "<h1> Stage your score.</h1>\n
             <table class=\"table table-bordered table-dark\">\n
                 {$head}
                 {$rows}
             </table>\n
             <form>
                   <label for=\"equipment\">What equipment did you shoot?</label>
                   <select name=\"equipment\">
                      <option value=\"C\">Crossbow</option>
                   </select>
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

    print_r($data);
    return $html;
}

function genTableRows($data)
{
    $html = '';
    $html .= "<tbody>";

    $rounds = $data['Round'];

    foreach ($rounds as $round) {
        $html .= "<tr>\n";
        $html .= "<td>{$round->Range}</td>";
        
        for ($i = 0; $i < $round->TotalEnds; $i++) {
            $html .= "<td>1, 2, 3, 4, 5, 6</td>";
        }
        $html .= "</tr>\n";
    }
    $html .= "</tbody>";
    return $html;
}

// call stage score with post to regenerate new view
function prompt_round($data)
{
    $select = '';
    foreach ($data['round_names'] as $round) {
        $select .= "<option value=\"{$round}\">{$round}</option>";
    }

    $root = URLROOT;

    $html ="<h1 class=\"card-text\">Select the Round you are playing.</h1>
            <form action=\"{$root}archer/stageScore/-1\" method=\"post\">
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

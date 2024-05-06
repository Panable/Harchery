<?php 

function genTableHead() {
}

function genTableRows() {
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

function prompt_score($data)
{
    $html = '';

    $html .= "<h1>Stage your score.</h1>";

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

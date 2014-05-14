<?php

function sort_by($route, $column, $body)
{
    $direction = (Request::get('direction') == 'asc')? 'desc': 'asc';
    return link_to_action($route, $body, ['sortBy' => $column, 'direction' => $direction]);
}
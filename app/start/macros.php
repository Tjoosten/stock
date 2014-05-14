<?php

Form::macro('bt_text', function($name, $value, $label = null, $attr = array())
{
    $element = Form::text($name, $value, mergeArr(array("class" => "form-control"), $attr));
    return bt_wrapper($element, $name, $label);
});

Form::macro('bt_email', function($name, $value, $label = null, $attr = array())
{
    $element = Form::email($name, $value, mergeArr(array("class" => "form-control"), $attr));
    return bt_wrapper($element, $name, $label);
});

Form::macro('bt_textarea', function($name, $value, $label = null, $attr = array())
{
    $element = Form::textarea($name, $value, mergeArr(array("class" => "form-control"), $attr));
    return bt_wrapper($element, $name, $label);
});

Form::macro('bt_password', function($name, $label = null, $attr = array())
{
    $element = Form::password($name, mergeArr(array("class" => "form-control"), $attr));
    return bt_wrapper($element, $name, $label);
});

Form::macro('bt_button', function($name, $attr = array())
{
    $element = Form::submit($name, mergeArr(array("class" => "btn"), $attr));
    return bt_wrapper($element, $name);
});

HTML::macro('link_box', function($col, $action, $icon = null, $title, $description = null, array $param = null){
    $linkCreator = (!is_null($param)) ? action($action, $param) : action($action);

    $out = "<div class=$col>";
    $out .= "<a class='info-box-click' href='" . $linkCreator . "' >";
    $out .= "<div class='info-box'>";
    $out .= "<h3>" . $title . "</h3>";

    if(isset($icon)) $out .= "<span class='glyphicon " . $icon . "' ></span>";
    if(isset($description)) $out .= "<p><small>" . $description . "</small></p>";

    $out .= "</div></a></div>";

    return $out;
});

HTML::macro("unavailable", function($text){
    $out = '<div class="unavailable"><span class="glyphicon glyphicon-repeat"></span>';
    $out .= '<p>' . $text . '</p>';
    $out .= '</div>';

    return $out;
});

/*
HTML::macro('product_log', function($type, $date, $message, $map = null){
    $config = typeGenerator($type);

    $out = '<article><div class="date"><span class="glyphicon ' . $config['icon'] . '"></span></div>';
    $out .= '<div class="arrow-left"></div><div class="articleblock">';
    $out .= "<small class=\"pull-right\">$date</small>";
    $out .= '<h3>' . $config['title'] . '</h3>';
    $out .= '<p>' . $message . '</p>';
    $out .= '</div></article>';
    return $out;
});

function typeGenerator($type){
    $out = "";

    switch($type)
    {
        case 0:
        case 'registration':
            $out = array('icon' => 'glyphicon-tag', 'title' => 'Product aangemaakt');
            break;
        case 1:
        case 'checkin':
            $out = array('icon' => 'glyphicon-ok', 'title' => 'Checkin Codivex');
            break;
        case 2:
        case 'checkout':
            $out = array('icon' => 'glyphicon-send', 'title' => 'Checkout bedrijf');
            break;
        case 3:
        case 'reparation':
            $out = array('icon' => 'glyphicon-wrench', 'title' => 'Product herstelling');
            break;
        case 4:
        case 'replacement':
            $out = array('icon' => 'glyphicon-retweet', 'title' => 'Product vervanging');
            break;
        case 5:
        case 'movement':
            $out = array('icon' => 'glyphicon-road', 'title' => 'Product verplaatsing');
            break;
        case 6:
        case 'comment':
            $out = array('icon' => 'glyphicon-comment', 'title' => 'Opmerking');
            break;
    }

    return $out;
}//*/

function getLabel($name, $label)
{
    if(isset($label))
    {
        return Form::label($name, $label, array('class' => 'control-label'));
    }

    return '';
}

function fieldError($field)
{
    $error = "";
    if($errors = Session::get('errors'))
    {
        $error = $errors->first($field) ? "has-error" : "";
    }
    return $error;
}

function bt_wrapper($element, $name, $label = null)
{
    $out = "<div class='form-group ";
    $out .= fieldError($name) . " '>";
    $out .= getLabel($name, $label);
    $out .= $element;
    $out .= "</div>";

    return $out;
}

function mergeArr($arr1, $arr2)
{
    $output = array_merge_recursive($arr1, $arr2);
    $keys = array();
    $vals = array();

    foreach ($output as $key => $val) {
        $s = "";
        $s = (is_array($val)) ? implode(" ", $val) : $val;

        array_push($keys, $key);
        array_push($vals, $s);

    }

    return array_combine($keys, $vals);
}
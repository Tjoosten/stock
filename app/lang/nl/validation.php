<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    "accepted"       => ":attribute moet geaccepteerd zijn.",
    "active_url"     => ":attribute is geen geldige URL.",
    "after"          => ":attribute moet een datum na :date zijn.",
    "alpha"          => ":attribute mag enkel letters bevatten.",
    "alpha_dash"     => ":attribute mag enkel letters, cijfers, underscores(_) en dashes(-) bevatten.",
    "alpha_num"      => ":attribute mag enkel letters en cijfers bevatten.",
    "array"          => ":attribute moet geselecteerde elementen bevatten.",
    "before"         => ":attribute moet een datum voor :date zijn.",
    "between"        => array(
        "numeric" => ":attribute moet tussen :min en :max zijn.",
        "file"    => ":attribute moet tussen :min en :max kilobytes zijn.",
        "string"  => ":attribute moet tussen :min en :max karakters zijn.",
        "array"   => ":attribute moet tussen :min en :max items bevatten."
    ),
    "confirmed"      => ":attribute bevestiging komt niet overeen.",
    "date"           => ":attribute is een ongeldige datum.",
    "date_format"    => ":attribute moet een geldig datum formaat bevatten.",
    "different"      => ":attribute en :other moeten verschillend zijn.",
    "digits"           => "The :attribute must be :digits digits.",
    "digits_between"   => "The :attribute must be between :min and :max digits.",
    "email"          => ":attribute is geen geldig e-mailadres.",
    "exists"         => ":attribute bestaat niet.",
    "image"          => ":attribute moet een afbeelding zijn.",
    "in"             => ":attribute is ongeldig.",
    "integer"        => ":attribute moet een getal zijn.",
    "ip"             => ":attribute moet een geldig IP-adres zijn.",
    "max"            => array(
        "numeric" => ":attribute moet minder dan :max zijn.",
        "file"    => ":attribute moet minder dan :max kilobytes zijn.",
        "string"  => ":attribute moet minder dan :max karakters zijn.",
        "array"   => ":attribute mag maximaal :max items bevatten."
    ),
    "mimes"            => ":attribute moet een bestand zijn van het volgende type: :values.",
    "min"              => array(
        "numeric" => ":attribute moet minstens :min.",
        "numeric" => ":attribute moet minstens :min.",
        "file"    => ":attribute moet minstens :min kilobytes.",
        "string"  => ":attribute moet minstens :min karakters.",
        "array"   => ":attribute moet minstens :min items.",
    ),
    "not_in"           => "Het geselecteerde :attribute is incorrect.",
    "numeric"          => ":attribute moet een nummer zijn.",
    "regex"            => ":attribute formaat is incorrect.",
    "required"         => "Het :attribute veld is vereist.",
    "required_if"      => "Het :attribute is verplicht wanneer :other een waarde bevat van :value.",
    "required_with"    => "Het :attribute veld is verplicht in combinatie met :value.",
    "required_without"     => ":attribute is verplicht als :values niet ingevuld is.",
    "same"           => ":attribute en :other moeten overeenkomen.",
    "size"           => array(
        "numeric" => ":attribute moet :size zijn.",
        "file"    => ":attribute moet :size kilobyte zijn.",
        "string"  => ":attribute moet :size characters zijn.",
        "array"   => ":attribute moet :size items bevatten."
    ),
    "unique"         => ":attribute is al in gebruik.",
    "url"            => ":attribute is geen geldige URL.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => array(),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => array(
        'name'      =>   'naam',
        'address'   =>  'adres',
        'city'      =>  'stad',
        'btw'       =>  'BTW'
    ),

);

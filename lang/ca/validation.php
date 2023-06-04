<?php

return [

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

    'accepted' => 'El camp :attribute ha de ser acceptat.',
    'accepted_if' => 'El camp :attribute ha de ser acceptat quan :other és :value.',
    'active_url' => 'El camp :attribute ha de ser una URL vàlida.',
    'after' => 'El camp :attribute ha de ser una data posterior a :date.',
    'after_or_equal' => 'El camp :attribute ha de ser una data posterior o igual a :date.',
    'alpha' => 'El camp :attribute només pot contenir lletres.',
    'alpha_dash' => 'El camp :attribute només pot contenir lletres, números, guions i guions baixos.',
    'alpha_num' => 'El camp :attribute només pot contenir lletres i números.',
    'array' => 'El camp :attribute ha de ser un array.',
    'ascii' => 'El camp :attribute només pot contenir caràcters alfanumèrics de byte únic i símbols.',
    'before' => 'El camp :attribute ha de ser una data anterior a :date.',
    'before_or_equal' => 'El camp :attribute ha de ser una data anterior o igual a :date.',
    'between' => [
        'array' => 'El camp :attribute ha de tenir entre :min i :max elements.',
        'file' => 'El camp :attribute ha de tenir entre :min i :max kilobytes.',
        'numeric' => 'El camp :attribute ha de ser entre :min i :max.',
        'string' => 'El camp :attribute ha de tenir entre :min i :max caràcters.',
    ],
    'boolean' => 'El camp :attribute ha de ser verdader o fals.',
    'confirmed' => 'La confirmació del camp :attribute no coincideix.',
    'current_password' => 'La contrasenya és incorrecta.',
    'date' => 'El camp :attribute ha de ser una data vàlida.',
    'date_equals' => 'El camp :attribute ha de ser una data igual a :date.',
    'date_format' => 'El camp :attribute ha de coincidir amb el format :format.',
    'decimal' => 'El camp :attribute ha de tenir :decimal decimals.',
    'decimal' => 'El camp :attribute ha de tenir :decimal places decimals.',
    'declined' => 'El camp :attribute ha de ser rebutjat.',
    'declined_if' => 'El camp :attribute ha de ser rebutjat quan :other és :value.',
    'different' => 'El camp :attribute i :other han de ser diferents.',
    'digits' => 'El camp :attribute ha de tenir :digits dígits.',
    'digits_between' => 'El camp :attribute ha de tenir entre :min i :max dígits.',
    'dimensions' => "El camp :attribute té dimensions d'imatge no vàlides.",
    'distinct' => 'The :attribute field has a duplicate value.',
    'doesnt_end_with' => 'El camp :attribute no pot acabar amb cap dels següents valors: :values.',
    'doesnt_start_with' => 'El camp :attribute no pot començar amb cap dels següents valors: :values.',
    'email' => 'El camp :attribute ha de ser una adreça de correu electrònic vàlida.',
    'ends_with' => 'El camp :attribute ha de acabar amb un dels següents valors: :values.',
    'enum' => 'El :attribute seleccionat no és vàlid.',
    'exists' => 'El :attribute seleccionat no és vàlid.',
    'file' => 'El camp :attribute ha de ser un fitxer.',
    'filled' => 'El camp :attribute ha de tenir un valor.',
    'gt' => [
        'array' => 'El camp :attribute ha de tenir més de :value elements.',
        'file' => 'El camp :attribute ha de ser més gran de :value kilobytes.',
        'numeric' => 'El camp :attribute ha de ser més gran de :value.',
        'string' => 'El camp :attribute ha de ser més gran de :value caràcters.',
    ],
    'gte' => [
        'array' => 'El camp :attribute ha de tenir :value elements o més.',
        'file' => 'El camp :attribute ha de ser més gran o igual a :value kilobytes.',
        'numeric' => 'El camp :attribute ha de ser més gran o igual a :value.',
        'string' => 'El camp :attribute ha de ser més gran o igual a :value caràcters.',
    ],
    'image' => 'El camp :attribute ha de ser una imatge.',
    'in' => 'El :attribute seleccionat no és vàlid.',
    'in_array' => 'El camp :attribute ha de existir a :other.',
    'integer' => 'El camp :attribute ha de ser un nombre enter.',
    'ip' => 'El camp :attribute ha de ser una adreça IP vàlida.',
    'ipv4' => 'El camp :attribute ha de ser una adreça IPv4 vàlida.',
    'ipv6' => 'El camp :attribute ha de ser una adreça IPv6 vàlida.',
    'json' => 'El camp :attribute ha de ser una cadena JSON vàlida.',
    'lowercase' => 'El camp :attribute ha de ser en minúscules.',
    'lt' => [
        'array' => 'El camp :attribute ha de tenir menys de :value elements.',
        'file' => 'El camp :attribute ha de ser inferior a :value kilobytes.',
        'numeric' => 'El camp :attribute ha de ser inferior a :value.',
        'string' => 'El camp :attribute ha de ser inferior a :value caràcters.',
    ],
    'lte' => [
        'array' => 'El camp :attribute no pot tenir més de :value elements.',
        'file' => 'El camp :attribute ha de ser inferior o igual a :value kilobytes.',
        'numeric' => 'El camp :attribute ha de ser inferior o igual a :value.',
        'string' => 'El camp :attribute ha de ser inferior o igual a :value caràcters.',
    ],
    'mac_address' => 'El camp :attribute ha de ser una adreça MAC vàlida.',
    'max' => [
        'array' => 'El camp :attribute no pot tenir més de :max elements.',
        'file' => 'El camp :attribute no pot ser més gran de :max kilobytes.',
        'numeric' => 'El camp :attribute no pot ser més gran de :max.',
        'string' => 'El camp :attribute no pot ser més gran de :max caràcters.',
    ],
    'max_digits' => 'El camp :attribute no pot tenir més de :max dígits.',
    'mimes' => 'El camp :attribute ha de ser un fitxer del tipus: :values.',
    'mimetypes' => 'El camp :attribute ha de ser un fitxer del tipus: :values.',
    'min' => [
        'array' => 'El camp :attribute ha de tenir com a mínim :min elements.',
        'file' => 'El camp :attribute ha de tenir com a mínim :min kilobytes.',
        'numeric' => 'El camp :attribute ha de ser com a mínim :min.',
        'string' => 'El camp :attribute ha de ser com a mínim :min caràcters.',
    ],
    'min_digits' => 'El camp :attribute ha de tenir com a mínim :min dígits.',
    'missing' => "El camp :attribute ha d'estar desaparegut.",
    'missing_if' => "El camp :attribute ha d'estar desaparegut quan :other és :value.",
    'missing_unless' => "El camp :attribute ha d'estar desaparegut llevat que :other sigui :value.",
    'missing_with' => "El camp :attribute ha d'estar desaparegut quan :values estigui present.",
    'missing_with_all' => "El camp :attribute ha d'estar desaparegut quan :values estiguin presents.",
    'multiple_of' => "El camp :attribute ha de ser múltiple de :value.",
    'not_in' => 'El :attribute seleccionat no és vàlid.',
    'not_regex' => 'El format del camp :attribute no és vàlid.',
    'numeric' => 'El camp :attribute ha de ser un nombre.',
    'password' => [
        'letters' => 'El camp :attribute ha de contenir almenys una lletra.',
        'mixed' => 'El camp :attribute ha de contenir almenys una lletra majúscula i una minúscula.',
        'numbers' => 'El camp :attribute ha de contenir almenys un número.',
        'symbols' => 'El camp :attribute ha de contenir almenys un símbol.',
        'uncompromised' => 'El camp :attribute proporcionat ha aparegut en una filtració de dades. Si us plau, tria un :attribute diferent.',
    ],
    'present' => "El camp :attribute ha d'estar present.",
    'prohibited' => 'El camp :attribute està prohibit.',
    'prohibited_if' => 'El camp :attribute està prohibit quan :other és :value.',
    'prohibited_unless' => 'El camp :attribute està prohibit llevat que :other estigui a :values.',
    'prohibits' => 'El camp :attribute prohibeix que :other estigui present.',
    'regex' => 'El format del camp :attribute no és vàlid.',
    'required' => 'El camp :attribute és obligatori.',
    'required_array_keys' => 'El camp :attribute ha de contenir entrades per a: :values.',
    'required_if' => 'El camp :attribute és obligatori quan :other és :value.',
    'required_if_accepted' => 'El camp :attribute és obligatori quan :other s\'ha acceptat.',
    'required_unless' => 'El camp :attribute és obligatori llevat que :other estigui a :values.',
    'required_with' => 'El camp :attribute és obligatori quan :values estigui present.',
    'required_with_all' => 'El camp :attribute és obligatori quan :values estiguin presents.',
    'required_without' => 'El camp :attribute és obligatori quan :values no estigui present.',
    'required_without_all' => 'El camp :attribute és obligatori quan cap dels :values estigui present.',
    'same' => 'El camp :attribute ha de coincidir amb :other.',
    'size' => [
        'array' => 'El camp :attribute ha de contenir :size elements.',
        'file' => 'El camp :attribute ha de ser de :size kilobytes.',
        'numeric' => 'El camp :attribute ha de ser :size.',
        'string' => 'El camp :attribute ha de tenir :size caràcters.',
    ],
    'starts_with' => 'El camp :attribute ha de començar amb un dels següents valors: :values.',
    'string' => 'El camp :attribute ha de ser una cadena de text.',
    'timezone' => 'El camp :attribute ha de ser una zona horària vàlida.',
    'unique' => 'El :attribute ja està en ús.',
    'uploaded' => 'El fitxer :attribute no s\'ha pogut carregar.',
    'uppercase' => 'El camp :attribute ha de ser en majúscules.',
    'url' => 'El camp :attribute ha de ser una URL vàlida.',
    'ulid' => 'El camp :attribute ha de ser un ULID vàlid.',
    'uuid' => 'El camp :attribute ha de ser un UUID vàlid.',


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

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'missatge personalitzat',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];

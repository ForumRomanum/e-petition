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

    'accepted' => 'Pole :attribute musi być accepted.',
    'active_url' => 'Pole :attribute nie jest poprawnym adresem URL.',
    'after' => 'Pole :attribute musi być datą po :date.',
    'after_or_equal' => 'Pole :attribute musi być datą po lub równą :date.',
    'alpha' => 'Pole :attribute może zawierać tylko litery.',
    'alpha_dash' => 'Pole :attribute może zawierać tylko litery, liczby i znaki "-" oraz "_".',
    'alpha_num' => 'Pole :attribute może zawierać tylko litery i liczby.',
    'array' => 'Pole :attribute musi być tablicą.',
    'before' => 'Pole :attribute musi być a datą przed :date.',
    'before_or_equal' => 'Pole :attribute musi być a datą przed lub równą :date.',
    'between' => [
        'numeric' => 'Pole :attribute musi być pomiędzy :min i :max.',
        'file' => 'Pole :attribute musi być pomiędzy :min i :max kilobajtów.',
        'string' => 'Pole :attribute musi być pomiędzy :min i :max znaków.',
        'array' => 'Pole :attribute must have pomiędzy :min i :max elementów.',
    ],
    'boolean' => 'Pole :attribute musi być warością logiczną.',
    'confirmed' => 'Pole :attribute musi być zatwierdzone.',
    'date' => 'Pole :attribute nie jest poprawną datą.',
    'date_equals' => 'Pole :attribute musi być datą równą :date.',
    'date_format' => 'Pole :attribute nie pasuje do formatu :format.',
    'different' => 'Pola :attribute i :other musi być różne.',
    'digits' => 'Pole :attribute musi mieć :digits cyfr.',
    'digits_between' => 'Pole :attribute musi być pomędzy :min i :max cyfr.',
    'dimensions' => 'Pole :attribute ma niepoprawne wymiary obrazu.',
    'distinct' => 'Pole :attribute ma zduplikowaną wartość.',
    'email' => 'Pole :attribute musi być poprawnym adresem email.',
    'ends_with' => 'Pole :attribute musi się kończyć na jeden z poniższych: :values.',
    'exists' => 'Pole :attribute jest niepoprawne.',
    'file' => 'Pole :attribute musi być plikiem.',
    'filled' => 'Pole :attribute jest puste.',
    'gt' => [
        'numeric' => 'Pole :attribute musi być większe od :value.',
        'file' => 'Pole :attribute musi być większe od :value kilobajtów.',
        'string' => 'Pole :attribute musi być większe od :value znaków.',
        'array' => 'Pole :attribute musi zawierać więcej niż :value elementów.',
    ],
    'gte' => [
        'numeric' => 'Pole :attribute musi być większe lub równe :value.',
        'file' => 'Pole :attribute musi być większe lub równe :value kilobajtów.',
        'string' => 'Pole :attribute musi być większe lub równe :value znaków.',
        'array' => 'Pole :attribute zawierać :value lub więcej elementów.',
    ],
    'image' => 'Pole :attribute musi być obrazem.',
    'in' => 'Pole :attribute jest niepoprawne.',
    'in_array' => 'Pole :attribute nie istnieje w :other.',
    'integer' => 'Pole :attribute musi być liczbą.',
    'ip' => 'Pole :attribute musi być poprawnym adresem IP.',
    'ipv4' => 'Pole :attribute musi być poprawnym adresem IPv4.',
    'ipv6' => 'Pole :attribute musi być poprawnym adresem IPv6.',
    'json' => 'Pole :attribute musi być poprawnym fomatem JSON.',
    'lt' => [
        'numeric' => 'Pole :attribute musi być mniejsze niż :value.',
        'file' => 'Pole :attribute musi być mniejsze niż :value kilobajtów.',
        'string' => 'Pole :attribute musi być mniejsze niż :value znaków.',
        'array' => 'Pole :attribute musi zawierać mnirj niż :value elementów.',
    ],
    'lte' => [
        'numeric' => 'Pole :attribute musi być mniejsze lub równe :value.',
        'file' => 'Pole :attribute musi być mniejsze lub równe :value kilobajtów.',
        'string' => 'Pole :attribute musi być mniejsze lub równe :value znaków.',
        'array' => 'Pole :attribute nie może zawierać więcej niż :value elementów.',
    ],
    'max' => [
        'numeric' => 'Pole :attribute nie może być większe od :max.',
        'file' => 'Pole :attribute nie może być większe od :max kilobajtów.',
        'string' => 'Pole :attribute nie może być większe od :max znaków.',
        'array' => 'Pole :attribute nie może zawierać więcej niż :max elementów.',
    ],
    'mimes' => 'Pole :attribute musi być plikiem typu: :values.',
    'mimetypes' => 'Pole :attribute musi być plikiem typu: :values.',
    'min' => [
        'numeric' => 'Pole :attribute musi być przynajmniej :min.',
        'file' => 'Pole :attribute musi być przynajmniej :min kilobajtów.',
        'string' => 'Pole :attribute musi być przynajmniej :min znaków.',
        'array' => 'Pole :attribute musi zawierać przynajmniej :min elementów.',
    ],
    'multiple_of' => 'Pole :attribute musi być a multiple of :value',
    'not_in' => 'Pole :attribute jest niepoprawne.',
    'not_regex' => 'Pole :attribute ma niepoprawny format.',
    'numeric' => 'Pole :attribute musi być liczbą.',
    'password' => 'Hasło jest niepoprawne.',
    'present' => 'Pole :attribute musi być obecne.',
    'regex' => 'Pole :attribute ma niepoprawny format.',
    'required' => 'Pole :attribute jest wymagane.',
    'required_if' => 'Pole :attribute jest wymagane gdy :other jest :value.',
    'required_unless' => 'Pole :attribute jest chyba że :other należy do :values.',
    'required_with' => 'Pole :attribute jest wymagane gdy :values jest obecne.',
    'required_with_all' => 'Pole :attribute jest wymagane gdy :values są obecne.',
    'required_without' => 'Pole :attribute jest wymagane gdy :values nie są obecne.',
    'required_without_all' => 'Pole :attribute jest wymagane gdy żadne z :values nie są obecne.',
    'same' => 'Pola :attribute i :other muszą być takie same.',
    'size' => [
        'numeric' => 'Pole :attribute musi być :size.',
        'file' => 'Pole :attribute musi być :size kilobajtów.',
        'string' => 'Pole :attribute musi być :size znaków.',
        'array' => 'Pole :attribute musi zawierać :size elementów.',
    ],
    'starts_with' => 'Pole :attribute musi się zaczynać od: :values.',
    'string' => 'Pole :attribute musi być tekstem.',
    'timezone' => 'Pole :attribute musi być poprawną strefą czasową.',
    'unique' => 'Pole :attribute jest już zajęte.',
    'uploaded' => 'Pole :attribute - błąd wgrywania.',
    'url' => 'Pole :attribute ma niepoprawny format.',
    'uuid' => 'Pole :attribute musi być poprawnym UUID.',

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
            'rule-name' => 'custom-message',
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

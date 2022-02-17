<?php

namespace Github\Logist\Rules;

use Illuminate\Contracts\Validation\Rule;

class CarNumberRule implements Rule
{

    const CHAR_PATTERN = '[A-ZЁАБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЫЭЮЯҮӨԼՈՍՏՕ\p{Han}]';

    private $_patterns = [
        //Russia
        '/^[ABCEHKMOPTXYАВЕКМНОРСТУХ]\d{2,3}[ABCEHKMOPTXYАВЕКМНОРСТУХ]{1,2}\d{2,3}$/u',//changed


        //Ukraine
        '/^[ABCEHIKMOPTXІАВЕКМНОРСТХ]{2}\d{4}[ABCEHIKMOPTXІАВЕКМНОРСТХ]{2}$/u',
        '/^\d{4,5}[ABCEHIKMOPTXІАВЕКМНОРСТХ]{3}$/u',


        //Kazahstan
        '/^'.self::CHAR_PATTERN.'{1}\d{3}'.self::CHAR_PATTERN.'{2,3}$/u',
        '/^\d{3}'.self::CHAR_PATTERN.'{2,3}\d{2}$/u',
        '/^\d{2}'.self::CHAR_PATTERN.'{3}\d{2}$/u', // 'YYXXXYY


        //Armenia
        '/^\d{2}[ABCDEFGHIJKLMNOPQRSTUVWXYZԼՈՍՏՕ]{2}\d{3}$/u',
        '/^\d{3}[ABCDEFGHIJKLMNOPQRSTUVWXYZԼՈՍՏՕ]{2}\d{2}$/u',


        //Kyrgyzstan
        '/^\d{3-5}[A-Z]{2}$/u',
        '/^\d{4,5}[A-Z]{3}$/u',
        '/^[A-Z]\d{4}[A-Z]{1,2}$/u',
        '/^\d{2}[A-Z]{2}\d{3}[A-Z]{3}$/u',


        //Tajikistan
        '/^\d{3,4}[ABCDEHKMOPTXYАВЕКМНОРСТХ]{2}\d{2}$/u',


        //Uzbekistan
        '/^\d{3}[A-Z]{3}\d{2}$/u',
        '/^[A-Z]\d{3}[A-Z]{2}\d{2}$/u',


        //Azerbaijan
        '/^\d{2}[A-Z]{2}\d{3}$/u',


        //Belarus
        '/^[ABCEHIKMOPTXІАВЕКМНОРСТХ]{2}\d{5}$/u',
        '/^[ABCEHIKMOPTXІАВЕКМНОРСТХ]{4}\d{5}$/u',
        '/^[ABCEHIKMOPTXІАВЕКМНОРСТХ]{2}[ABCEHIKMOPTXІАВЕКМНОРСТХ]\d{4}[ABCEHIKMOPTXІАВЕКМНОРСТХ]\d/u',


        //Mongolia
        '/^\d{4}[ЁАБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЫЭЮЯҮӨ]{3}$/u',


        //China
        '/^\p{Han}+[A-Z][A-Z\d]{2}\d{3}$/u',

        //Czech
        '/^\d{1}'.self::CHAR_PATTERN.'{2}\d{4}$/u', //7AJ5683


        //Other
        //letter as first
        //'X YY X YYY'
        '/^'.self::CHAR_PATTERN.'{1}\d{2}'.self::CHAR_PATTERN.'{1}\d{3}$/u',

        // 'X YY XXX',
        '/^'.self::CHAR_PATTERN.'{1}\d{2}'.self::CHAR_PATTERN.'{3}$/u',

        // 'X YYY XX',
        // 'X YYY XXX',
        '/^'.self::CHAR_PATTERN.'{1}\d{3}'.self::CHAR_PATTERN.'{2,3}$/u',

        // 'X YYY XX YY',
        '/^'.self::CHAR_PATTERN.'{1}\d{3}'.self::CHAR_PATTERN.'{2}\d{2}$/u',

        // 'X YYYY',
        // 'X YYYYY',
        '/^'.self::CHAR_PATTERN.'{1}\d{4,5}$/u',

        // 'X YYYY X',
        // 'X YYYY XX',
        // 'X YYYY XXX',
        '/^'.self::CHAR_PATTERN.'{1}\d{4}'.self::CHAR_PATTERN.'{1,3}$/u',

        // 'XX Y X YYY',
        '/^'.self::CHAR_PATTERN.'{2}\d{1}'.self::CHAR_PATTERN.'{1}\d{3}$/u',

        // 'XX YY XXX',
        '/^'.self::CHAR_PATTERN.'{2}\d{2}'.self::CHAR_PATTERN.'{3}$/u',

        // 'XX YYY',
        // 'XX YYYY',
        // 'XX YYYYY',
        // 'XX YYYYYY',
        '/^'.self::CHAR_PATTERN.'{2}\d{3,6}$/u',

        //'XXX YYYY X Y',
        '/^'.self::CHAR_PATTERN.'{3}\d{4}'.self::CHAR_PATTERN.'{1}\d{1}$/u',

        // 'XX YYY X',
        // 'XX YYY XX',
        // 'XX YYYY X',
        // 'XX YYYY XX',
        '/^'.self::CHAR_PATTERN.'{2}\d{3,4}'.self::CHAR_PATTERN.'{1,2}$/u',

        // 'XXX YYY',
        // 'XXX YYYY',
        '/^'.self::CHAR_PATTERN.'{3}\d{3,4}$/u',

        // 'XXX YY X',
        // 'XXX YYYY X',
        '/^'.self::CHAR_PATTERN.'{3}\d{2}'.self::CHAR_PATTERN.'{1}$/u',
        '/^'.self::CHAR_PATTERN.'{3}\d{4}'.self::CHAR_PATTERN.'{1}$/u',

        // 'XXX YYYYY',
        '/^'.self::CHAR_PATTERN.'{3}\d{5}$/u',

        // 'XXXX Y',
        // 'XXXX YY',
        // 'XXXX YYY',
        // 'XXXX YYYY',
        // 'XXXX YYYYY',
        '/^'.self::CHAR_PATTERN.'{4}\d{1,5}$/u',

        // 'XXXXX Y',
        // 'XXXXX YY',
        // 'XXXXX YYY',
        '/^'.self::CHAR_PATTERN.'{5}\d{1,3}$/u',

        //from tooltip
        '/^'.self::CHAR_PATTERN.'{4}\d{4}'.self::CHAR_PATTERN.'{2}$/u',


        // digit as first
        // 'Y X YYYYY',
        '/^\d{1}'.self::CHAR_PATTERN.'{1}\d{5}$/u',

        // 'Y XX YYYY',
        '/^\d{1}'.self::CHAR_PATTERN.'{2}\d{4}$/u',

        // 'YY XX YY',
        // 'YY XX YYY',
        // 'YYY XX YY',
        // 'YYY XX YYY',
        '/^\d{2,3}'.self::CHAR_PATTERN.'{2}\d{2,3}$/u',

        // 'YY XX YYY XXX',
        '/^\d{2}'.self::CHAR_PATTERN.'{2}\d{3}'.self::CHAR_PATTERN.'{3}$/u',

        // 'YY XX YYYY',
        // 'YY XX YYYYY',
        '/^\d{2}'.self::CHAR_PATTERN.'{2}\d{4,5}$/u',

        // 'YY XXX Y',
        '/^\d{2}'.self::CHAR_PATTERN.'{3}\d{1}$/u',

        // 'YYY XX',
        // 'YYY XXX',
        '/^\d{3}'.self::CHAR_PATTERN.'{2,3}$/u',

        // 'YYY X YYYY',
        '/^\d{3}'.self::CHAR_PATTERN.'{1}\d{4}$/u',

        // 'YYY XXX YY',
        '/^\d{3}'.self::CHAR_PATTERN.'{3}\d{2}$/u',

        // 'YYYY XX YY',
        '/^\d{4}'.self::CHAR_PATTERN.'{2}\d{2}$/u',

        // 'YYYY XX',
        // 'YYYY XXX',
        // 'YYYYY XX',
        // 'YYYYY XXX',
        '/^\d{4,5}'.self::CHAR_PATTERN.'{2,3}$/u',


    ];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        foreach( $this->_patterns as $pattern){
            if(preg_match($pattern, $value)){
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if (\Lang::has('validation.custom.number.custom_patterns')) {
            return trans('validation.custom.number.custom_patterns');
        }
        return 'Car plate is in wrong format';
    }
}

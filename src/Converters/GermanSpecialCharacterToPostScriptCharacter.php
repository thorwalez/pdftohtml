<?php


namespace ThorWalez\PdfToHtml\Converters;

/**
 * Class GermanSpecialCharacterToPostScriptCharacter
 * @package ThorWalez\PdfToHtml\Converter
 */
class GermanSpecialCharacterToPostScriptCharacter
{
    const MAP_CHARACTER_LIST = [
        '\201' => 'ü',
        '\232' => 'Ü',
        '\204' => 'ä',
        '\216' => 'Ä',
        '\224' => 'ö',
        '\231' => 'Ö',
        '\341' => 'ß',
        //            '\304' =>'Ä',
        //            '\344' =>'ä',
        //            '\334' =>'Ü',
        //            '\374' =>'ü',
        //            '\326' =>'Ö',
        //            '\366' =>'ö',
    ];

    /**
     * @param string $input
     * @return string
     */
    public function convert(string $input) : string
    {
        foreach (self::MAP_CHARACTER_LIST as $hit => $gsc) {
            if (\strpos($input, $gsc) !== false) {
                $input = \str_replace($gsc, $hit, $input);
            }
        }

        return $input;
    }

}
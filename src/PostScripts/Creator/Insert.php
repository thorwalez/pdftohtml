<?php
/**
 * Copyright (c) 2021.
 * Created By
 * @author Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license  The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created 4.03.2021
 * @version 0.0.0
 */

namespace ThorWalez\PdfToHtml\PostScripts\Creator;

/**
 * Class Insert
 * @package ThorWalez\PdfToHtml\PostScripts\Creator
 */
class Insert
{
    const SHOWPAGE_PATTERN = 'showpage';

    /**
     * @param string $contentFile
     * @param string $contentInsert
     * @return string
     */
    public function insert(string $contentFile, string $contentInsert) : string
    {

        $positionShowpage = \mb_strpos($contentFile, self::SHOWPAGE_PATTERN);

        $splitContentFileStart = \mb_substr($contentFile, 0, $positionShowpage);
        $splitContentFileEnd = \mb_substr($contentFile, $positionShowpage);

        return $splitContentFileStart . $this->defaultContent() . $contentInsert . $splitContentFileEnd;
    }

    /**
     * @return string
     */
    private function defaultContent() : string
    {
        return '/Reencsmalldict 12 dict def
/ReEncodeSmall
{ Reencsmalldict begin
/NewCodesAndNames exch def
/NewFontName exch def
/BaseFontName exch def
/BaseFontDict                % Basis-Font suchen
BaseFontName findfont def
/NewFont BaseFontDict        % Neues Dictionary in ausreichender Groesse
maxlength dict def           % schaffen
BaseFontDict                 % Alle Eintraege des Basis-Fonts, bis auf FID-
{ exch dup /FID ne           % Feld, werden kopiert.
{ dup /Encoding eq
{ exch dup
length array copy
NewFont 3 1 roll put
}
{ exch NewFont
3 1 roll put
 } ifelse
}
{ pop pop                  % FID-Eintrag ignorieren
} ifelse
} forall
NewFont
/FontName NewFontName put    % Neuen Namen eintragen
NewCodesAndNames aload pop   % Wertepaare fuer Aenderung des Codierungsvek-
% tors laden.
NewCodesAndNames             % Fuer jedes Wertepaar auf dem Stack wird der
length 2 idiv                % der neue Name in den Vektor eingetragen.
{ NewFont /Encoding get
3 1 roll put
} repeat
NewFontName NewFont          % aus neuem Font wird POSTSCRIPT-Font; das von
definefont pop               % definefont gelieferte Diction. wird ignoriert
end
} def
/GermanVec
[ 8#201 /udieresis
8#204 /adieresis
8#216 /Adieresis
8#224 /odieresis
8#231 /Odieresis
8#232 /Udieresis
8#341 /germandbls
] def
/Courier /Courier-German GermanVec ReEncodeSmall
/Courier-German findfont 10 scalefont setfont' . \PHP_EOL;
    }
}
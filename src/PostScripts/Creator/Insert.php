<?php


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
        return '
% x y start with 0 from bottom or left edge
/Times-Roman findfont
12 scalefont
setfont
newpath' . \PHP_EOL;
    }
}
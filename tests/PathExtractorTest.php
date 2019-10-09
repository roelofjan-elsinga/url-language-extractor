<?php


namespace Tests;

use LanguageExtractor\Extractors\PathExtractor;
use PHPUnit\Framework\TestCase;

class PathExtractorTest extends TestCase
{
    public function test_accepted_short_codes_can_be_set_later()
    {
        $extractor = new PathExtractor('/en/page/url', ['en']);

        $this->assertSame(['en'], $extractor->getAcceptedShortCodes());

        $extractor = new PathExtractor('/en/page/url');

        $extractor->setAcceptedShortCodes(['en']);

        $this->assertSame(['en'], $extractor->getAcceptedShortCodes());
    }
}

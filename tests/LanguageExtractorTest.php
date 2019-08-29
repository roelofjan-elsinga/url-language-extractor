<?php


namespace Tests;

use LanguageExtractor\LanguageExtractor;
use PHPUnit\Framework\TestCase;

class LanguageExtractorTest extends TestCase
{
    public function testExceptionIsThrownWhenNoShortcodesProvided()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("You need to supply accepted language short codes.");

        LanguageExtractor::forUrl('/en/page/url')->extract();
    }

    public function testLanguageIsFoundInUrlPath()
    {
        $short_code = LanguageExtractor::forUrl('/en/page/url')
            ->setAcceptedShortCodes(['en'])
            ->extract();

        $this->assertSame('en', $short_code);
    }

    public function testLanguageIsNotFoundIfNotSuppliedAsAcceptable()
    {
        $short_code = LanguageExtractor::forUrl('/en/page/url')
            ->setAcceptedShortCodes(['nl'])
            ->extract();

        $this->assertNull($short_code);
    }

    public function testLanguageIsFoundWhenShortCodeNotAtBeginning()
    {
        $short_code = LanguageExtractor::forUrl('/page/en/content-page')
            ->setAcceptedShortCodes(['en'])
            ->extract();

        $this->assertSame('en', $short_code);
    }
}

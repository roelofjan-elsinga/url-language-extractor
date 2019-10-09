<?php


namespace Tests;

use LanguageExtractor\LanguageExtractor;
use PHPUnit\Framework\TestCase;

class LanguageExtractorTest extends TestCase
{
    public function test_exception_is_thrown_when_no_shortcodes_provided()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("You need to supply accepted language short codes.");

        LanguageExtractor::forUrl('/en/page/url')->extract();
    }

    public function test_language_is_found_in_url_path()
    {
        $short_code = LanguageExtractor::forUrl('/en/page/url')
            ->setAcceptedShortCodes(['en'])
            ->extract();

        $this->assertSame('en', $short_code);
    }

    public function test_language_is_not_found_if_not_supplied_as_acceptable()
    {
        $short_code = LanguageExtractor::forUrl('/en/page/url')
            ->setAcceptedShortCodes(['nl'])
            ->extract();

        $this->assertNull($short_code);
    }

    public function test_language_is_found_when_short_code_not_at_beginning()
    {
        $short_code = LanguageExtractor::forUrl('/page/en/content-page')
            ->setAcceptedShortCodes(['en'])
            ->extract();

        $this->assertSame('en', $short_code);
    }
}

<?php


namespace LanguageExtractor;

use LanguageExtractor\Extractors\ExtractorInterface;
use LanguageExtractor\Extractors\PathExtractor;

class LanguageExtractor
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $accepted_short_codes;

    /**
     * LanguageExtractor constructor.
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * Named constructor.
     *
     * @param string $url
     * @return LanguageExtractor
     */
    public static function forUrl(string $url): LanguageExtractor
    {
        return new static($url);
    }

    /**
     * Provide the extractor with whitelisted short codes
     *
     * @param array $accepted_short_codes
     * @return LanguageExtractor
     */
    public function setAcceptedShortCodes(array $accepted_short_codes): LanguageExtractor
    {
        $this->accepted_short_codes = $accepted_short_codes;

        return $this;
    }

    /**
     * Extract the language shortcode from the URL
     *
     * @return null|string
     * @throws \Exception
     */
    public function extract(): ?string
    {
        $this->assertShortCodesAreProvided();

        foreach ($this->extractors() as $extractor) {
            if ($extractor->hasMatch()) {
                return $extractor->extract();
            }
        }

        return null;
    }

    /**
     * Get the possible extractors to find the language
     *
     * @return ExtractorInterface[]
     */
    private function extractors(): array
    {
        return [
            new PathExtractor($this->url, $this->accepted_short_codes)
        ];
    }

    /**
     * Assert this class has language short codes
     *
     * @throws \Exception
     */
    private function assertShortCodesAreProvided()
    {
        if (is_null($this->accepted_short_codes) || count($this->accepted_short_codes) === 0) {
            throw new \Exception("You need to supply accepted language short codes.");
        }
    }
}

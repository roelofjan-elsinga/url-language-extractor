<?php


namespace LanguageExtractor\Extractors;

class PathExtractor implements ExtractorInterface
{
    /**
     * @var array
     */
    private $accepted_short_codes;
    /**
     * @var string
     */
    private $url;

    /**
     * PathExtractor constructor.
     * @param string $url
     * @param array $accepted_short_codes
     */
    public function __construct(string $url, array $accepted_short_codes = [])
    {
        $this->url = $url;
        $this->accepted_short_codes = $accepted_short_codes;
    }

    /**
     * Set the accepted language short codes this extractor should match against
     *
     * @param array $accepted_short_codes
     * @return ExtractorInterface
     */
    public function setAcceptedShortCodes(array $accepted_short_codes): ExtractorInterface
    {
        $this->accepted_short_codes = $accepted_short_codes;

        return $this;
    }

    /**
     * Get the accepted language short codes this extractor should match against
     *
     * @return array
     */
    public function getAcceptedShortCodes(): array
    {
        return $this->accepted_short_codes;
    }

    /**
     * Determine whether this Extractor is able to find a language
     *
     * @return bool
     */
    public function hasMatch(): bool
    {
        $matches = $this->findMatches();

        return isset($matches[1]);
    }

    /**
     * Extract the language shortcode from the URL
     *
     * @return null|string
     */
    public function extract(): ?string
    {
        $matches = $this->findMatches();

        return isset($matches[1]) ? $matches[1] : null;
    }

    /**
     * Find matches in the URL path using a regex
     *
     * @return array
     */
    private function findMatches(): array
    {
        $regex = sprintf('/\/(%s)\/.*$/', implode('|', $this->accepted_short_codes));

        preg_match($regex, $this->url, $matches);

        return $matches;
    }
}

<?php


namespace LanguageExtractor\Extractors;

interface ExtractorInterface
{

    /**
     * Set the accepted language shortcodes this extractor should match against
     *
     * @param array $accepted_shortcodes
     * @return ExtractorInterface
     */
    public function setAcceptedShortCodes(array $accepted_shortcodes): ExtractorInterface;

    /**
     * Determine whether this Extractor is able to find a language
     *
     * @return bool
     */
    public function hasMatch(): bool;

    /**
     * Extract the language shortcode from the URL
     *
     * @return null|string
     */
    public function extract(): ?string;
}

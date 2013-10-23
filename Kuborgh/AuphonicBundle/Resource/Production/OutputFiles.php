<?php

namespace Kuborgh\AuphonicBundle\Resource\Production;

class OutputFiles
{
    /**
     * Format of the file
     *
     * @var string
     */
    protected $format;

    /**
     * Bitrate to use
     *
     * https://auphonic.com/api/info/output_files.json
     * Check the url above for all available bitrates.
     *
     * @var int
     */
    protected $bitrate;

    /**
     * String to append to basename for this output file.
     *
     * @var string
     */
    protected $suffix;

    /**
     * Fileending without leading dot.
     *
     * @var string
     */
    protected $ending;

    /**
     * Flag if the file should be a mono mixdown
     *
     * @var boolean
     */
    protected $mono_mixdown;

    /**
     * If true for every chapter a file will be created
     *
     * @var boolean
     */
    protected $split_on_chapters;

    /**
     * @param int $bitrate
     */
    public function setBitrate($bitrate)
    {
        $this->bitrate = $bitrate;
    }

    /**
     * @return int
     */
    public function getBitrate()
    {
        return $this->bitrate;
    }

    /**
     * @param string $ending
     */
    public function setEnding($ending)
    {
        $this->ending = $ending;
    }

    /**
     * @return string
     */
    public function getEnding()
    {
        return $this->ending;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param boolean $mono_mixdown
     */
    public function setMonoMixdown($mono_mixdown)
    {
        $this->mono_mixdown = $mono_mixdown;
    }

    /**
     * @return boolean
     */
    public function getMonoMixdown()
    {
        return $this->mono_mixdown;
    }

    /**
     * @param boolean $split_on_chapters
     */
    public function setSplitOnChapters($split_on_chapters)
    {
        $this->split_on_chapters = $split_on_chapters;
    }

    /**
     * @return boolean
     */
    public function getSplitOnChapters()
    {
        return $this->split_on_chapters;
    }

    /**
     * @param string $suffix
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
    }

    /**
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }


}
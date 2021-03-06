<?php

namespace Kuborgh\AuphonicBundle\Resource\Production;

use Kuborgh\AuphonicBundle\Resource\Production\Metadata\Location;
use Kuborgh\AuphonicBundle\Resource\ResourceFactory;

class Metadata implements ResourceFactory
{
    /**
     * Production title.
     *
     * @var string
     */
    protected $title;

    /**
     * Name of the artist.
     *
     * @var string
     */
    protected $artist;

    /**
     * Name of the album.
     *
     * @var string
     */
    protected $album;

    /**
     * Track number.
     *
     * @var int
     */
    protected $track;

    /**
     * Subtitle of the production.
     *
     * @var string
     */
    protected $subtitle;

    /**
     * Flag wether chapters should be appended.
     *
     * todo check what this means
     *
     * @var boolean
     */
    protected $append_chapters;

    /**
     * Summary.
     *
     * @var string
     */
    protected $summary;

    /**
     * Genre of the production.
     *
     * @var string
     */
    protected $genre;

    /**
     * Year of production.
     *
     * @var int
     */
    protected $year;

    /**
     * Name of the publisher.
     *
     * @var string
     */
    protected $publisher;

    /**
     * Web address related to this production.
     *
     * @var string
     */
    protected $url;

    /**
     * Name of the license for this production.
     *
     * @var string
     */
    protected $license;

    /**
     * Url where to read the full license text.
     *
     * @var string
     */
    protected $license_url;

    /**
     * Array of tags.
     *
     * @var string[]
     */
    protected $tags;

    /**
     * Location metadata subset.
     *
     * @var Location
     */
    protected $location;

    /**
     * @param string $album
     */
    public function setAlbum($album)
    {
        $this->album = $album;
    }

    /**
     * @return string
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param boolean $append_chapters
     */
    public function setAppendChapters($append_chapters)
    {
        $this->append_chapters = $append_chapters;
    }

    /**
     * @return boolean
     */
    public function getAppendChapters()
    {
        return $this->append_chapters;
    }

    /**
     * @param string $artist
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    /**
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param string $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param string $license
     */
    public function setLicense($license)
    {
        $this->license = $license;
    }

    /**
     * @return string
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * @param string $license_url
     */
    public function setLicenseUrl($license_url)
    {
        $this->license_url = $license_url;
    }

    /**
     * @return string
     */
    public function getLicenseUrl()
    {
        return $this->license_url;
    }

    /**
     * @param \Kuborgh\AuphonicBundle\Resource\Production\Metadata\Location $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return \Kuborgh\AuphonicBundle\Resource\Production\Metadata\Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param string $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param string $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param \string[] $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return \string[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param int $track
     */
    public function setTrack($track)
    {
        $this->track = $track;
    }

    /**
     * @return int
     */
    public function getTrack()
    {
        return $this->track;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @inheritdoc
     */
    public static function create()
    {
        return new self();
    }
}
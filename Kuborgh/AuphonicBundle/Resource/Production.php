<?php

namespace Kuborgh\AuphonicBundle\Resource;

use Kuborgh\AuphonicBundle\Resource\Production\Metadata;
use Kuborgh\AuphonicBundle\Resource\Production\OutputFiles;
use Kuborgh\AuphonicBundle\Resource\Production\OutgoingService;
use Kuborgh\AuphonicBundle\Resource\Production\Algorithms;

class Production
{
    /**
     * Unique ID.
     *
     * @var string
     */
    protected $uuid;

    /**
     * Date of creation.
     * e.g "2012-05-14T19:27:34.833"
     *
     * @var string
     */
    protected $creation_time;

    /**
     * Metadata of this production.
     * Including title, year of production
     *
     * @var Metadata
     */
    protected $metadata;

    /**
     * Basename of the output files to be generated.
     *
     * @var string
     */
    protected $output_basename;

    /**
     * List of output files to generate.
     *
     * @var OutputFiles[]
     */
    protected $output_files;

    /**
     * @var OutgoingService[]
     */
    protected $outgoing_services;

    /**
     * @var Algorithms[]
     */
    protected $algorithms;

    /**
     * @var
     */
    protected $chapters;

    /**
     * @var
     */
    protected $input_file;

    /**
     * @var
     */
    protected $multi_input_files;

    /**
     * URL of the cover image
     *
     * @var string
     */
    protected $image;

    /**
     * URL of the thumbnail for the cover image
     *
     * @var string
     */
    protected $thumbnail;

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $algorithms
     */
    public function setAlgorithms($algorithms)
    {
        $this->algorithms = $algorithms;
    }

    /**
     * @return mixed
     */
    public function getAlgorithms()
    {
        return $this->algorithms;
    }

    /**
     * @param mixed $chapters
     */
    public function setChapters($chapters)
    {
        $this->chapters = $chapters;
    }

    /**
     * @return mixed
     */
    public function getChapters()
    {
        return $this->chapters;
    }

    /**
     * @param mixed $input_file
     */
    public function setInputFile($input_file)
    {
        $this->input_file = $input_file;
    }

    /**
     * @return mixed
     */
    public function getInputFile()
    {
        return $this->input_file;
    }

    /**
     * @param Metadata $metadata
     */
    public function setMetadata(Metadata $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return Metadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param mixed $multi_input_files
     */
    public function setMultiInputFiles($multi_input_files)
    {
        $this->multi_input_files = $multi_input_files;
    }

    /**
     * @return mixed
     */
    public function getMultiInputFiles()
    {
        return $this->multi_input_files;
    }

    /**
     * @param \Kuborgh\AuphonicBundle\Resource\Production\OutgoingService[] $outgoing_services
     */
    public function setOutgoingServices($outgoing_services)
    {
        $this->outgoing_services = $outgoing_services;
    }

    /**
     * @return \Kuborgh\AuphonicBundle\Resource\Production\OutgoingService[]
     */
    public function getOutgoingServices()
    {
        return $this->outgoing_services;
    }

    /**
     * @param string $output_basename
     */
    public function setOutputBasename($output_basename)
    {
        $this->output_basename = $output_basename;
    }

    /**
     * @return string
     */
    public function getOutputBasename()
    {
        return $this->output_basename;
    }

    /**
     * @param \Kuborgh\AuphonicBundle\Resource\Production\OutputFiles[] $output_files
     */
    public function setOutputFiles($output_files)
    {
        $this->output_files = $output_files;
    }

    /**
     * @return \Kuborgh\AuphonicBundle\Resource\Production\OutputFiles[]
     */
    public function getOutputFiles()
    {
        return $this->output_files;
    }

    /**
     * @param string $uuid
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param string $creation_time
     */
    public function setCreationTime($creation_time)
    {
        $this->creation_time = $creation_time;
    }

    /**
     * @return string
     */
    public function getCreationTime()
    {
        return $this->creation_time;
    }
}
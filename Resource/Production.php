<?php

namespace Kuborgh\AuphonicBundle\Resource;

use Kuborgh\AuphonicBundle\Resource\Production\Metadata;
use Kuborgh\AuphonicBundle\Resource\Production\OutputFiles;
use Kuborgh\AuphonicBundle\Resource\Production\OutgoingService;

class Production
{
    /**
     * Unique ID.
     *
     * @var string
     */
    protected $uuid;

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

    protected $algorithms;

    protected $chapters;

    protected $input_file;

    protected $multi_input_files;
}
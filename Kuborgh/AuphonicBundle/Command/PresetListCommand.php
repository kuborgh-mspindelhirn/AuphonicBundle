<?php

namespace Kuborgh\AuphonicBundle\Command;

use Kuborgh\AuphonicBundle\Client;
use Kuborgh\AuphonicBundle\Resource\Preset;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class PresetListCommand
 * This Command prints all available presets from auphonic.
 *
 * @package Kuborgh\AuphonicBundle\Command
 */
class PresetListCommand extends ContainerAwareCommand
{
    /**
     * Configure command for symfony console
     *
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('auphonic:presets:list')
            ->setDefinition(array(
                    new InputArgument('username', InputArgument::OPTIONAL, 'Alternative username. If non is given use the confiured user.'),
                    new InputArgument('password', InputArgument::OPTIONAL, 'Password for alternative user.'),
                ))
            ->setDescription('List all presets available on auphonic.')
            ->setHelp(<<<EOF
The <info>%command.name%</info> displays all presets available on auphonic.
EOF
            )
        ;
    }

    /**
     * Execute the command
     *
     * @see Command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var $apiClient Client */
        $apiClient = $this->getContainer()->get('kuborgh_auphonic.client');
        $apiClient->allowUserPasswordAuthentification();

        /** @var $list Preset[] */
        $list = $apiClient->preset()->getList();

        $output->writeln(sprintf('<info>%d Preset(s)</info>', count($list)));
        $text = "\n";
        foreach($list as $preset) {
            $text .= sprintf("* %s [ Album: %s ]", $preset->getPresetName(), $preset->getMetadata()->getAlbum());
        }
        $output->writeln($text);
    }
}
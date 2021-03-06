<?php

namespace Kuborgh\AuphonicBundle\Command;

use Kuborgh\AuphonicBundle\Client;
use Kuborgh\AuphonicBundle\Resource\Production;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ReadProductions
 * This Command
 *
 * @package Kuborgh\AuphonicBundle\Command
 */
class ProductionsListCommand extends ContainerAwareCommand
{
    /**
     * Configure command for symfony console
     *
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('auphonic:productions:list')
            ->setDefinition(array(
                    new InputArgument('username', InputArgument::OPTIONAL, 'Alternative username. If non is given use the confiured user.'),
                    new InputArgument('password', InputArgument::OPTIONAL, 'Password for alternative user.'),
                ))
            ->setDescription('List all productions available on auphonic.')
            ->setHelp(<<<EOF
The <info>%command.name%</info> displays all productions available on auphonic.
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

        /** @var $list Production[] */
        $list = $apiClient->production()->getList();

        $output->writeln(sprintf('<info>%d Productions</info>', count($list)));
        $text = "";
        foreach($list as $production) {
            $text .= $production->getMetadata()->getTitle();
            $text .= "\n";
        }
        $output->writeln($text);
    }
}
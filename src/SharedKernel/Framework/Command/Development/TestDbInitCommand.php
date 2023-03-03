<?php

declare(strict_types=1);

namespace SharedKernel\Framework\Command\Development;

use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use function array_diff;
use function scandir;

final class TestDbInitCommand extends Command
{
    public function __construct(
        private ContainerInterface $container,
        private Connection $connection
    ) {
        parent::__construct('dev:db:init');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @phpstan-ignore-next-line */
        $projectDir = (string) $this->container->getParameter('kernel.project_dir');
        $initializeDbFiles = array_diff((array) scandir("{$projectDir}/dev/mysql"), ['.', '..']);

        foreach ($initializeDbFiles as $file) {
            if (pathinfo(($file))['extension'] === 'sql') {
                $this->connection->executeQuery((string) file_get_contents("{$projectDir}/dev/mysql/{$file}"));
            }
        }

        return Command::SUCCESS;
    }
}

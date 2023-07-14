<?php

namespace App\Command;

use App\Repository\PersonRepository;
use App\Service\PersonBuilderService;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:download-data',
    description: 'Download all people data from The Star Wars API',
)]
class DownloadDataCommand extends Command
{
    public function __construct(
        private readonly PersonBuilderService $personBuilderService,
        private readonly PersonRepository $personRepository
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        for ($i = 1; $i <= 83; $i++) {
            try {
                $output->write('Building person with swapi_id='.$i.' ... ');

                // Build a specific person only if it doesn't exist already in the database
                if ($this->personRepository->findOneBy(['swapiId' => $i]) === null) {
                    $this->personBuilderService->build($i);
                }

                $output->writeln('done!');
            } catch (GuzzleException|Exception $e) {
                $io->error($e->getMessage());
            }
        }

        return Command::SUCCESS;
    }
}

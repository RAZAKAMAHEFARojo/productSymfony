<?php

namespace App\Command;

use App\Entity\Product as EntityProduct;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Product;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:import-csv',
    description: 'Import data from a CSV file into the database',
)]
class ImportCsvCommand extends Command
{
    private EntityManagerInterface $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('file', InputArgument::REQUIRED, 'Path to the CSV file')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $filePath = $input->getArgument('file');

        if (!file_exists($filePath)) {
            $io->error(sprintf('File "%s" does not exist.', $filePath));
            return Command::FAILURE;
        }

        $io->info('Starting CSV import...');

        $rows = 0;

        if (($handle = fopen($filePath, 'r')) !== false) {
            // Lire les en-têtes
            $headers = fgetcsv($handle, 1000, ',');

            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $rows++;

                // Créer une nouvelle entité
                $entity = new EntityProduct();

                // Mapper les données (adapté aux colonnes de votre entité)
                $entity->setName($data[0]);
                $entity->setDescription($data[1]);
                $entity->setPrice($data[2]);
                $entity->setCover($data[3]);
                $entity->setStock($data[4]);
                

                // Ajouter à l'EntityManager
                $this->entityManager->persist($entity);
            }

            fclose($handle);

            // Flusher les entités
            $this->entityManager->flush();

            $io->success(sprintf('%d rows have been imported successfully.', $rows));
        } else {
            $io->error('Unable to open the file.');
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}

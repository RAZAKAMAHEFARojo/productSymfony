<?php

namespace App\Command;

use App\Entity\User;
use App\Services\UserServices;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:user',
    description: 'Add a short description for your command',
)]
class UserCommand extends Command
{
    public function __construct(private UserServices $userServices)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption(name: 'name', shortcut: null, mode:InputOption::VALUE_REQUIRED, description:'nom')
            ->addOption(name: 'age', shortcut: null, mode:InputOption::VALUE_REQUIRED, description:'age de l/utilisateur')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);//interfacage
        $io->error("une erreur est survenue");

        $name = $input->getOption(name: 'name');
        $age = $input->getOption(name: 'age');


        if ($name && $age) {
            $user = new User();
            $user->setFirstname($name);
            $user->setAge($age);

            //$this->userServices->HandleUser();

            $io->success("User created with success !");
            exit(0);
        }

        $io->error("Name & age required");

        return 1;
    }
}

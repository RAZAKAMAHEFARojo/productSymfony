<?php


namespace App\Services;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class UserServices
{
    public function __construct(private LoggerInterface $logger, private EntityManagerInterface $entityManager, private UserRepository $userRepository)
    {
    }

    public function handleUser(User $user): bool
    {
        try {
            if ($user->getAge() < 18) {
                $user->setYoung(true);
            }

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return true;
        }catch (\Exception $exception){
            $this->logger->log('error', $exception->getMessage());

            return false;
        }
    }

    public function getAllUsers(): array
    {
        return   $this->userRepository->findAll();
    }
}
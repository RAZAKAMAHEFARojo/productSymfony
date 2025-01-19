<?php


namespace App\Services;

use App\Entity\Product;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ProductServices
{
    public function __construct(private LoggerInterface $logger, private EntityManagerInterface $entityManager, private UserRepository $userRepository)
    {
    }

    public function deleteProduct(Product $product): void
    {
        $this->entityManager->remove($product);
        $this->entityManager->flush();
    }

    public function getAllProducts(): array
    {
        return   $this->userRepository->findAll();
    }
}
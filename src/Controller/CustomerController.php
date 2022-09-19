<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Customer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{


    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    )
    {
    }

    #[Route('/customers', name: 'app_customers')]
    public function index(): JsonResponse
    {
        $customers = $this->entityManager->getRepository(Customer::class)->findAll();

        return $this->json(array_map(static function (Customer $customer) {
            return [
                'id' => $customer->getId(),
                'name' => $customer->getName(),
                'address' => $customer->getAddress(),
                'email' => $customer->getEmail(),
            ];
        }, $customers));

    }
}

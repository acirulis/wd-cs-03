<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\Customer;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:gen-data',
    description: 'Generate customer data',
)]
class GenDataCommand extends Command
{
    private const CUSTOMER_MAX = 50;

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $faker = Factory::create('lv_LV');

        for ($n = 0; $n < self::CUSTOMER_MAX; $n++) {
            $customer = (new Customer())
                ->setName($faker->name())
                ->setAddress($faker->address())
                ->setEmail($faker->email());

            $this->entityManager->persist($customer);
        }

        $this->entityManager->flush();
        $output->writeln("Customer data generated for " . self::CUSTOMER_MAX . " records.");
        return Command::SUCCESS;
    }
}

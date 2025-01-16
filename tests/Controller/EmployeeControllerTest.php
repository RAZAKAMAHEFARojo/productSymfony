<?php

namespace App\Tests\Controller;

use App\Entity\Employee;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class EmployeeControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/employee/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Employee::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Employee index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'employee[firstname]' => 'Testing',
            'employee[lastname]' => 'Testing',
            'employee[birthdaydate]' => 'Testing',
            'employee[placeofbirth]' => 'Testing',
            'employee[adress]' => 'Testing',
            'employee[fathername]' => 'Testing',
            'employee[mothername]' => 'Testing',
            'employee[cin]' => 'Testing',
            'employee[dateofissue]' => 'Testing',
            'employee[matricule]' => 'Testing',
            'employee[cnapsnumber]' => 'Testing',
            'employee[osie]' => 'Testing',
            'employee[companyposition]' => 'Testing',
            'employee[category]' => 'Testing',
            'employee[departement]' => 'Testing',
            'employee[statut]' => 'Testing',
            'employee[dateofhire]' => 'Testing',
            'employee[basesalary]' => 'Testing',
            'employee[typeofpayment]' => 'Testing',
            'employee[bankaccountnumber]' => 'Testing',
            'employee[accountname]' => 'Testing',
            'employee[bankname]' => 'Testing',
            'employee[bankadress]' => 'Testing',
            'employee[rib]' => 'Testing',
            'employee[child]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Employee();
        $fixture->setFirstname('My Title');
        $fixture->setLastname('My Title');
        $fixture->setBirthdaydate('My Title');
        $fixture->setPlaceofbirth('My Title');
        $fixture->setAdress('My Title');
        $fixture->setFathername('My Title');
        $fixture->setMothername('My Title');
        $fixture->setCin('My Title');
        $fixture->setDateofissue('My Title');
        $fixture->setMatricule('My Title');
        $fixture->setCnapsnumber('My Title');
        $fixture->setOsie('My Title');
        $fixture->setCompanyposition('My Title');
        $fixture->setCategory('My Title');
        $fixture->setDepartement('My Title');
        $fixture->setStatut('My Title');
        $fixture->setDateofhire('My Title');
        $fixture->setBasesalary('My Title');
        $fixture->setTypeofpayment('My Title');
        $fixture->setBankaccountnumber('My Title');
        $fixture->setAccountname('My Title');
        $fixture->setBankname('My Title');
        $fixture->setBankadress('My Title');
        $fixture->setRib('My Title');
        $fixture->setChild('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Employee');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Employee();
        $fixture->setFirstname('Value');
        $fixture->setLastname('Value');
        $fixture->setBirthdaydate('Value');
        $fixture->setPlaceofbirth('Value');
        $fixture->setAdress('Value');
        $fixture->setFathername('Value');
        $fixture->setMothername('Value');
        $fixture->setCin('Value');
        $fixture->setDateofissue('Value');
        $fixture->setMatricule('Value');
        $fixture->setCnapsnumber('Value');
        $fixture->setOsie('Value');
        $fixture->setCompanyposition('Value');
        $fixture->setCategory('Value');
        $fixture->setDepartement('Value');
        $fixture->setStatut('Value');
        $fixture->setDateofhire('Value');
        $fixture->setBasesalary('Value');
        $fixture->setTypeofpayment('Value');
        $fixture->setBankaccountnumber('Value');
        $fixture->setAccountname('Value');
        $fixture->setBankname('Value');
        $fixture->setBankadress('Value');
        $fixture->setRib('Value');
        $fixture->setChild('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'employee[firstname]' => 'Something New',
            'employee[lastname]' => 'Something New',
            'employee[birthdaydate]' => 'Something New',
            'employee[placeofbirth]' => 'Something New',
            'employee[adress]' => 'Something New',
            'employee[fathername]' => 'Something New',
            'employee[mothername]' => 'Something New',
            'employee[cin]' => 'Something New',
            'employee[dateofissue]' => 'Something New',
            'employee[matricule]' => 'Something New',
            'employee[cnapsnumber]' => 'Something New',
            'employee[osie]' => 'Something New',
            'employee[companyposition]' => 'Something New',
            'employee[category]' => 'Something New',
            'employee[departement]' => 'Something New',
            'employee[statut]' => 'Something New',
            'employee[dateofhire]' => 'Something New',
            'employee[basesalary]' => 'Something New',
            'employee[typeofpayment]' => 'Something New',
            'employee[bankaccountnumber]' => 'Something New',
            'employee[accountname]' => 'Something New',
            'employee[bankname]' => 'Something New',
            'employee[bankadress]' => 'Something New',
            'employee[rib]' => 'Something New',
            'employee[child]' => 'Something New',
        ]);

        self::assertResponseRedirects('/employee/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getFirstname());
        self::assertSame('Something New', $fixture[0]->getLastname());
        self::assertSame('Something New', $fixture[0]->getBirthdaydate());
        self::assertSame('Something New', $fixture[0]->getPlaceofbirth());
        self::assertSame('Something New', $fixture[0]->getAdress());
        self::assertSame('Something New', $fixture[0]->getFathername());
        self::assertSame('Something New', $fixture[0]->getMothername());
        self::assertSame('Something New', $fixture[0]->getCin());
        self::assertSame('Something New', $fixture[0]->getDateofissue());
        self::assertSame('Something New', $fixture[0]->getMatricule());
        self::assertSame('Something New', $fixture[0]->getCnapsnumber());
        self::assertSame('Something New', $fixture[0]->getOsie());
        self::assertSame('Something New', $fixture[0]->getCompanyposition());
        self::assertSame('Something New', $fixture[0]->getCategory());
        self::assertSame('Something New', $fixture[0]->getDepartement());
        self::assertSame('Something New', $fixture[0]->getStatut());
        self::assertSame('Something New', $fixture[0]->getDateofhire());
        self::assertSame('Something New', $fixture[0]->getBasesalary());
        self::assertSame('Something New', $fixture[0]->getTypeofpayment());
        self::assertSame('Something New', $fixture[0]->getBankaccountnumber());
        self::assertSame('Something New', $fixture[0]->getAccountname());
        self::assertSame('Something New', $fixture[0]->getBankname());
        self::assertSame('Something New', $fixture[0]->getBankadress());
        self::assertSame('Something New', $fixture[0]->getRib());
        self::assertSame('Something New', $fixture[0]->getChild());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Employee();
        $fixture->setFirstname('Value');
        $fixture->setLastname('Value');
        $fixture->setBirthdaydate('Value');
        $fixture->setPlaceofbirth('Value');
        $fixture->setAdress('Value');
        $fixture->setFathername('Value');
        $fixture->setMothername('Value');
        $fixture->setCin('Value');
        $fixture->setDateofissue('Value');
        $fixture->setMatricule('Value');
        $fixture->setCnapsnumber('Value');
        $fixture->setOsie('Value');
        $fixture->setCompanyposition('Value');
        $fixture->setCategory('Value');
        $fixture->setDepartement('Value');
        $fixture->setStatut('Value');
        $fixture->setDateofhire('Value');
        $fixture->setBasesalary('Value');
        $fixture->setTypeofpayment('Value');
        $fixture->setBankaccountnumber('Value');
        $fixture->setAccountname('Value');
        $fixture->setBankname('Value');
        $fixture->setBankadress('Value');
        $fixture->setRib('Value');
        $fixture->setChild('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/employee/');
        self::assertSame(0, $this->repository->count([]));
    }
}

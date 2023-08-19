<?php

namespace App\Test\Controller;

use App\Entity\Alumno;
use App\Repository\AlumnoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AlumnoControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private AlumnoRepository $repository;
    private string $path = '/alumno/crud/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Alumno::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Alumno index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'alumno[nombre]' => 'Testing',
            'alumno[edad]' => 'Testing',
            'alumno[puntaje]' => 'Testing',
            'alumno[fecha]' => 'Testing',
        ]);

        self::assertResponseRedirects('/alumno/crud/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Alumno();
        $fixture->setNombre('My Title');
        $fixture->setEdad('My Title');
        $fixture->setPuntaje('My Title');
        $fixture->setFecha('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Alumno');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Alumno();
        $fixture->setNombre('My Title');
        $fixture->setEdad('My Title');
        $fixture->setPuntaje('My Title');
        $fixture->setFecha('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'alumno[nombre]' => 'Something New',
            'alumno[edad]' => 'Something New',
            'alumno[puntaje]' => 'Something New',
            'alumno[fecha]' => 'Something New',
        ]);

        self::assertResponseRedirects('/alumno/crud/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getNombre());
        self::assertSame('Something New', $fixture[0]->getEdad());
        self::assertSame('Something New', $fixture[0]->getPuntaje());
        self::assertSame('Something New', $fixture[0]->getFecha());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Alumno();
        $fixture->setNombre('My Title');
        $fixture->setEdad('My Title');
        $fixture->setPuntaje('My Title');
        $fixture->setFecha('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/alumno/crud/');
    }
}

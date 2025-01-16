<?php

namespace App\Controller;

use App\Entity\Children;
use App\Form\ChildrenType;
use App\Repository\ChildrenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/children')]
final class ChildrenController extends AbstractController
{
    #[Route(name: 'app_children_index', methods: ['GET'])]
    public function index(ChildrenRepository $childrenRepository): Response
    {
        return $this->render('children/index.html.twig', [
            'childrens' => $childrenRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_children_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $child = new Children();
        $form = $this->createForm(ChildrenType::class, $child);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($child);
            $entityManager->flush();

            return $this->redirectToRoute('app_children_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('children/new.html.twig', [
            'child' => $child,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_children_show', methods: ['GET'])]
    public function show(Children $child): Response
    {
        return $this->render('children/show.html.twig', [
            'child' => $child,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_children_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Children $child, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ChildrenType::class, $child);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_children_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('children/edit.html.twig', [
            'child' => $child,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_children_delete', methods: ['POST'])]
    public function delete(Request $request, Children $child, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$child->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($child);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_children_index', [], Response::HTTP_SEE_OTHER);
    }
}

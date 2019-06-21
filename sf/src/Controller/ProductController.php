<?php

namespace App\Controller;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/", name="product_index")
     */
    public function index() {

        $repository = $this->getDoctrine()->getRepository(
            Product::class
        );

        $products = $repository->findAll();
        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @param $id
     * @Route("/product/delete/{id}", name="product_delete")
     */
    public function delete(Product $product) {

        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute('product_index');
    }

    /**
     * @Route("/product/new", name="product_new")
     */
    public function new(Request $request) {

        $product = new Product();

        $form = $this->createFormBuilder($product)
            ->add('name', TextType::class, array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('save', SubmitType::class, [
                'label' => 'Create Task',
                'attr' => ['class' => 'btn btn-success']
            ])
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $product = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($product);
            $entityManager->flush();
            return $this->redirectToRoute('product_index');
        }

        return $this->render('product/new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @param Product $product
     * @return Response
     * @Route("/product/{id}", name="product_show")
     */
    public function show(Product $product) {

        return $this->render('product/show.html.twig', [
            'product' => $product
        ]);
    }

    /**
     * @Route("/product/edit/{id}", name="product_edit")
     */
    public function edit(Request $request, Product $product) {

        $form = $this->createFormBuilder($product)
            ->add('name', TextType::class, array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('save', SubmitType::class, [
                'label' => 'Modifier',
                'attr' => ['class' => 'btn btn-success']
            ])
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->redirectToRoute('product_index');
        }
        return $this->render('product/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
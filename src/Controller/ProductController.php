<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="product_show")
     */
    
    public function show(int $id): Response
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if (!$product) {
            return new Response('<h2> No product found for id '.$id. '</h2>');
        }
        else 
            return new Response('<h2> Check out this great product: '.$product->getName(). '</h2>');

    }

    
    // /**
    //  * @Route("/product", name="create_product")
    //  */
    // public function createProduct(): Response
    // {
    //     // you can fetch the EntityManager via $this->getDoctrine()
    //     // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
    //     $entityManager = $this->getDoctrine()->getManager();

    //     $product = new Product();
    //     $product->setName('Keyboard');
    //     $product->setPrice(1999);
    //     //$product->setDescription('Ergonomic and stylish!');

    //     // tell Doctrine you want to (eventually) save the Product (no queries yet)
    //     $entityManager->persist($product);

    //     // actually executes the queries (i.e. the INSERT query)
    //     $entityManager->flush();

    //     return new Response('Saved new product with id '.$product->getId());
    // }
    
    // /**
    //  * @Route("/product", name="product")
    //  */
    // public function index(): Response
    // {
    //     return $this->render('product/index.html.twig', [
    //         'controller_name' => 'ProductController',
    //     ]);
    // }
}

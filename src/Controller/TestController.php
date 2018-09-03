<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Order;
use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/", name="test")
     */
    public function index()
    {
        return $this->render(
            'test/index.html.twig', [
            'controller_name' => 'TestController',
            ]
        );
    }

    /**
     * @Route("/get", name="get")
     */
    public function getIndex()
    {
        $s = $this->getDoctrine()->getRepository(Order::class)->findAll();
        dump($s);
        exit;
        //        $c2 = $this->getDoctrine()->getRepository(Customer::class)->find(2);
        //        dump($c[0]->getCustomer()->get(0)->getCompany());

        //        $c = new Customer();
        //        $c->setCompany("a");
        //        $c->setSiret("siret1");
        //        $c->setApe("ape1");
        //        $c->setFirstname("f1");
        //        $c->setLastname("l2");
        //        $c->setEmail("e1");
        //
        //        $c2 = new Customer();
        //        $c2->setCompany("a2");
        //        $c2->setSiret("siret2");
        //        $c2->setApe("ape2");
        //        $c2->setFirstname("f");
        //        $c2->setLastname("l2");
        //        $c2->setEmail("e2");
        //
        //
        //        $s->addCustomer($c);
        //        $s->addCustomer($c2);
        //
        //        $em->persist($s);
        //        $em->flush();
        exit;

        return new JsonResponse($answers);
    }

    /**
     * @Route("/save", name="save")
     */
    public function save()
    {
        $em = $this->getDoctrine()->getManager();
        $q = new Question();
        $a = new Answer();
        $a->setWording('Reponse5');

        $a1 = new Answer();
        $a1->setWording('Reponse525');

        $q->setWording('Question 5.5 ?');
        $q->addAnswer($a);
        $q->addAnswer($a1);

        $em->persist($q);
        $em->flush();

        return $this->render(
            'test/index.html.twig', [
            'controller_name' => 'TestController',
            ]
        );
    }
}

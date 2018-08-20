<?php

namespace App\Controller;

use App\Entity\Employee;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class EmployeeController extends FOSRestController
{

    /**
     * @Annotations\Get(
     *     path="/employee/{employee}",
     *     name = "get_employee_collection"
     * )
     *
     * @ParamConverter("employee", class="App\Entity\Employee")
     * @param Employee $employee
     * @return View
     */
    public function getEmployeeAction(Employee $employee) : View
    {
        return $this->view($employee , Response::HTTP_OK);
    }

    /**
     * @Annotations\Post(
     *     path="/employee",
     *     name = "new_employee"
     * )
     *
     * @param SerializerInterface $serializer
     * @param Request $request
     *
     * @return View(statusCode=Response::HTTP_CREATED)
     */
    public function newAddressAction(SerializerInterface $serializer, Request $request) : View
    {
        $json = $request->getContent();
        $employee   = $serializer->deserialize($json, Employee::class, 'json');
        $em = $this->getDoctrine()->getManager();

        $em->persist($employee);
        $em->flush();

        return $this->view([], Response::HTTP_CREATED);
    }

}

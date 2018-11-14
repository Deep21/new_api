<?php

namespace App\Controller;

use App\Entity\Employee;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\View as ViewAnnotation;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class EmployeeController extends FOSRestController
{
    /**
     * @Annotations\Get(
     *     path="/employee/{id}",
     *     name = "get_employee"
     * )
     * @Entity("employee", expr="repository.findEmployeeBy(id)", class="App\Entity\Employee")
     * @param Employee $employee
     * @ViewAnnotation(serializerGroups={"employee"}, statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function getEmployeeAction(Employee $employee): View
    {
        return $this->view($employee);
    }

    /**
     * @Annotations\Get(
     *     path="/employees",
     *     name = "get_employee_collection"
     * )
     *
     * @ViewAnnotation(serializerGroups={"employee"}, statusCode=Response::HTTP_OK)
     *
     * @return View
     */
    public function getEmployeeCollectionAction(): View
    {
        $employees = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Employee::class)
            ->getEmployeeCollection();

        return $this->view($employees);
    }

    /**
     * @Annotations\Put(
     *     path="/employee",
     *     name = "update_employee"
     * )
     *
     * @Entity("employee", expr="repository.findEmployeeBy(id)", class="App\Entity\Employee")
     * @param Employee                         $employee
     *
     * @ViewAnnotation(serializerGroups={"employee"}, statusCode=Response::HTTP_ACCEPTED)
     * @return View
     */
    public function editEmployeeAction(Employee $employee): View
    {

        $em = $this->getDoctrine()->getManager();

        $em->persist($employee);
        $em->flush();

        return $this->view($employee);
    }

    /**
     * @Annotations\Post(
     *     path="/employee",
     *     name = "new_employee"
     * )
     *
     * @param                      ConstraintViolationListInterface $validationErrors
     * @ParamConverter("employee", converter="fos_rest.request_body", class="App\Entity\Employee")
     * @param                                             Employee                         $employee
     * @ViewAnnotation(statusCode=Response::HTTP_CREATED)
     *
     * @return View
     */
    public function newEmployeeAction(ConstraintViolationListInterface $validationErrors, Employee $employee): View
    {
        if (count($validationErrors) > 0) {
            return $this->view([], Response::HTTP_BAD_REQUEST);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($employee);
        $em->flush();

        return $this->view([]);
    }

    /**
     * @Annotations\Delete(
     *     path="/customer/{customer}",
     *     name = "remove_customer"
     * )
     * @ViewAnnotation(serializerGroups={"list"}, statusCode=Response::HTTP_NO_CONTENT)
     * @Entity("customer", expr="repository.getCustomerById(customer)", class="App\Entity\Customer")
     * @param Employee $employee
     * @return View
     */
    public function removeCustomerAction(Employee $employee): View
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($employee);
        $em->flush();

        $this->view($employee->getId());
    }
}

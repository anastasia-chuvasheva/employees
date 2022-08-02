<?php namespace App\Controller;

use App\DTO\DepartmentDTO;
use App\Entity\Department;
use App\Entity\Employee;
use App\Forms\DepartmentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    /**
     * @Route("/show-employees/{department}", name="employees_show")
     */
    public function showEmployeesByDepartment(Department $department): Response
    {
        $employees = $department->getEmployees();

        return $this->render('employees_show.html.twig', [
            'department' => $department,
            'employees'  => $employees,
        ]);
    }

    /**
     * @Route("/choose-department", name="department_choose")
     */
    public function chooseDepartmentAction(Request $request): Response
    {
        $form = $this->createForm(DepartmentType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            /** @var Department $department */
            $department = $data['department'];

            return $this->redirectToRoute('employees_show', [
                'department' => $department->getId(),
            ]);
        }

        return $this->renderForm('department_choose.html.twig', [
            'form' => $form,
        ]);
    }
}
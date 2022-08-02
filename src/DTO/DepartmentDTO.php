<?php namespace App\DTO;

use App\Entity\Department;

class DepartmentDTO
{
    /**
     * @var Department
     */
    private $department;

    /**
     * @return Department|null
     */
    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    /**
     * @param Department $department
     */
    public function setDepartment(Department $department): void
    {
        $this->department = $department;
    }
}
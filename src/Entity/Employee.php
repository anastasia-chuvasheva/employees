<?php namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;


/**
 * @Entity
 * @Table(name="employee")
 */
class Employee
{
    /**
     * @Id
     * @Column(type="integer", length="10")
     * @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @Column(type="string", length="255")
     * @var string
     */
    private $name;

    /**
     * @ManyToOne(targetEntity="Department", inversedBy="employees")
     * @JoinColumn(name="department_id", referencedColumnName="id")
     * @var Department
     */
    private $department;

    /**
    *  @ManyToMany(targetEntity="Job", mappedBy="employees")
     *
     * @var Collection
     */
    private $jobs;

    /**
     * @OneToMany(targetEntity="Department", mappedBy="leadBy")
     * @var Department
     */
    private $leading;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Department
     */
    public function getDepartment(): Department
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

    /**
     * @return Collection
     */
    public function getJobs(): Collection
    {
        return $this->jobs;
    }

    /**
     * @return Department
     */
    public function getLeading(): Department
    {
        return $this->leading;
    }

    /**
     * @param Department $leading
     */
    public function setLeading(Department $leading): void
    {
        $this->leading = $leading;
    }


}
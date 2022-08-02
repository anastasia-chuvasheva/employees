<?php namespace App\Entity;


use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
* @Table(name="department")
 */
class Department
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
     * @ManyToOne(targetEntity="Employee", inversedBy="leading")
     * @JoinColumn(name="lead_by", referencedColumnName="id")
     * @var Employee
     */
    private $leadBy;

    /**
     * @OneToMany(targetEntity="Employee", mappedBy="department")
     * @var Collection
     */
    private $employees;

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
     * @return Employee
     */
    public function getLeadBy(): Employee
    {
        return $this->leadBy;
    }

    /**
     * @param Employee $leadBy
     */
    public function setLeadBy(Employee $leadBy): void
    {
        $this->leadBy = $leadBy;
    }

    /**
     * @return Collection
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    /**
     * @param Collection $employees
     */
    public function setEmployees(Collection $employees): void
    {
        $this->employees = $employees;
    }


}
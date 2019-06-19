<?php
// src/User.php
namespace Entity;

/**
 * @Entity @Table(name="users")
 **/
class User
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     **/
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     **/
    protected $name;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="reporter")
     * @var Bug[] An ArrayCollection of Bug objects.
     **/
    protected $reportedBugs = null;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="engineer")
     * @var Bug[] An ArrayCollection of Bug objects.
     **/
    protected $assignedBugs = null;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Bug[]
     */
    public function getReportedBugs()
    {
        return $this->reportedBugs;
    }

    /**
     * @param Bug[] $reportedBugs
     */
    public function setReportedBugs($reportedBugs)
    {
        $this->reportedBugs = $reportedBugs;
    }

    /**
     * @return Bug[]
     */
    public function getAssignedBugs()
    {
        return $this->assignedBugs;
    }

    /**
     * @param Bug[] $assignedBugs
     */
    public function setAssignedBugs($assignedBugs)
    {
        $this->assignedBugs = $assignedBugs;
    }
}
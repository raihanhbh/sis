<?php

namespace Edu\SisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Edu\SisBundle\Entity\CourseRepository")
 */
class Course
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="c_name", type="string", length=255)
     */
    private $cName;

    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="course")
     * @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     **/
    private $teacher_id;

    /**
     * @ORM\ManyToMany(targetEntity="Person", mappedBy="courses")
     **/
    private $students;

    /**
     * @var string
     *
     * @ORM\Column(name="c_description", type="string", length=255)
     */
    private $cDescription;


    public function __construct() {
      $this->students = new \Doctrine\Common\Collections\ArrayCollection();
      $this->teacher = new Person();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cId
     *
     * @param integer $cId
     * @return Course
     */
    public function setCId($cId)
    {
        $this->cId = $cId;

        return $this;
    }

    /**
     * Get cId
     *
     * @return integer 
     */
    public function getCId()
    {
        return $this->cId;
    }

    /**
     * Set cName
     *
     * @param string $cName
     * @return Course
     */
    public function setCName($cName)
    {
        $this->cName = $cName;

        return $this;
    }

    /**
     * Get cName
     *
     * @return string 
     */
    public function getCName()
    {
        return $this->cName;
    }

    /**
     * Set tId
     *
     * @param integer $tId
     * @return Course
     */
    public function setTId($tId)
    {
        $this->teacher_id = $tId;

        return $this;
    }

    /**
     * Get tId
     *
     * @return integer 
     */
    public function getTId()
    {
        return $this->teacher_id;
    }

    /**
     * Set cDescription
     *
     * @param string $cDescription
     * @return Course
     */
    public function setCDescription($cDescription)
    {
        $this->cDescription = $cDescription;

        return $this;
    }

    /**
     * Get cDescription
     *
     * @return string 
     */
    public function getCDescription()
    {
        return $this->cDescription;
    }
}

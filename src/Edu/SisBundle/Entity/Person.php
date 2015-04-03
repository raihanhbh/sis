<?php

namespace Edu\SisBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Person
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Edu\SisBundle\Entity\PersonRepository")
 */
class Person extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DOB", type="date")
     */
    private $dOB;

    /**
     * @var string
     *
     * @ORM\Column(name="Sex", type="string", columnDefinition="enum('male', 'female')")
     */
    private $sex;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Is_teacher", type="boolean")
     */
    private $isTeacher;

    /**
     * @ORM\OneToMany(targetEntity="Course", mappedBy="person")
     **/
    private $courses;

    /**
     * @ORM\ManyToMany(targetEntity="Course", inversedBy="persons")
     * @ORM\JoinTable(name="course_enrollment",
     *      joinColumns={@ORM\JoinColumn(name="student_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="course_id", referencedColumnName="id")}
     *      )
     **/
    private $enrolled_courses;

    public function __construct() {
      parent::__construct();

      $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
      $this->enrolled_courses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     * @return Person
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Person
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set dOB
     *
     * @param \DateTime $dOB
     * @return Person
     */
    public function setDOB($dOB)
    {
        $this->dOB = $dOB;

        return $this;
    }

    /**
     * Get dOB
     *
     * @return \DateTime 
     */
    public function getDOB()
    {
        return $this->dOB;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return Person
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set isTeacher
     *
     * @param boolean $isTeacher
     * @return Person
     */
    public function setIsTeacher($isTeacher)
    {
        $this->isTeacher = $isTeacher;

        return $this;
    }

    /**
     * Get isTeacher
     *
     * @return boolean 
     */
    public function getIsTeacher()
    {
        return $this->isTeacher;
    }
}

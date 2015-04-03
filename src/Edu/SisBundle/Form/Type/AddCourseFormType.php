<?php
/**
 * Created by PhpStorm.
 * User: Raihan
 * Date: 4/3/2015
 * Time: 11:17 AM
 */

namespace Edu\SisBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AddCourseFormType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    // add your custom field
    $builder->add('FirstName', null, array(
      'required' => true,
    ));
    $builder->add('LastName', null, array(
      'required' => false
    ));
    $builder->add('DOB', 'date', array (
      'label' => 'Birth Date'
    ));
    $builder->add('sex', 'choice', array(
      'choices' => array('male' => 'Male', 'female' => 'Female'),
    ));
    $builder->add('isTeacher', 'checkbox', array(
      'label'     => 'Are you Teacher ?',
      'required'  => false,
    ));
  }

  public function getParent()
  {
    return 'edu_sis_add_course';
  }

  public function getName()
  {
    return 'edu_sis_add_course';
  }
}
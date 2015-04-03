<?php
/**
 * Created by PhpStorm.
 * User: Raihan
 * Date: 4/2/2015
 * Time: 6:48 PM
 */

namespace Edu\SisBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType
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

  public function getName()
  {
    return 'edu_user_registration';
  }
}
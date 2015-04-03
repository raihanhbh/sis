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
    $builder->add('cName', null, array(
      'required' => true,
    ));
    $builder->add('cDescription', null, array(
      'required' => false
    ));

    $builder->add('save', 'submit', array('label' => 'Add Course'));
  }

//  public function getParent()
//  {
//    return 'edu_sis_add_course';
//  }
//
  public function getName()
  {
    return 'edu_sis_add_course';
  }
}
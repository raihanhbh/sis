<?php

namespace Edu\SisBundle\Controller;

use Edu\SisBundle\Entity\Course;
use Edu\SisBundle\Entity\Person;
use Edu\SisBundle\Form\Type\AddCourseFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
      $user = $this->get('security.context')->getToken()->getUser();
      $users = $this->get('doctrine')->getRepository('EduSisBundle:Person')->findAll();
      $courses = $this->get('doctrine')->getRepository('EduSisBundle:Course')->findAll();

      return $this->render(
        'EduSisBundle:default:index.html.twig', array('user' => $user, 'users' => $users, 'courses' => $courses)
      );
    }

    public function aboutAction()
    {
      return $this->render(
        'EduSisBundle:default:about.html.twig', array()
      );
    }

    public function adminAction()
    {
      $user = $this->get('security.context')->getToken()->getUser();

      if(!is_object($user)) {

      }

      return $this->render(
        'EduSisBundle:default:admin.html.twig', array('user' => $user)
      );
    }

    public function addCourseAction(Request $request)
    {
      $user = $this->get('security.context')->getToken()->getUser();
      $course = new Course();

      $form = $this->get('edu_sis.form.task');

//      $course = new Course();
//      $course->setCName('Write a blog post');
//      $course->setCDescription('This is a description');
//
//      $form = $this->createFormBuilder($course)
//        ->add('cname', 'text')
//        ->add('cdescription', 'text')
//        ->add('save', 'submit', array('label' => 'Add Course'))
//        ->getForm();

      $form->handleRequest($request);

      if ($form->isValid()) {

        $em = $this->getDoctrine()->getManager();
        $data = $form->getData();
        $course->setCName($data['cName']);
        $course->setCDescription($data['cDescription']);
        $course->setTId($user);
        $em->persist($course);
        $em->flush();
      }
      return $this->render(
        'EduSisBundle:default:add_course.html.twig', array('user' => $user, 'form' => $form->createView())
      );
    }

    public function courseListAction(Request $request)
    {
      //$user = $this->get('security.context')->getToken()->getUser();
      $courses = $this->getDoctrine()->getRepository('EduSisBundle:Course')->findAll();

      return $this->render(
        'EduSisBundle:default:course_list.html.twig', array('courses' => $courses)
      );
    }
}

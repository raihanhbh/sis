<?php
/**
 * Created by PhpStorm.
 * User: Raihan
 * Date: 4/2/2015
 * Time: 11:44 PM
 */

namespace Edu\SisBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

/**
 * Listener responsible for adding the default user role at registration
 */
class AutoListener implements EventSubscriberInterface
{
  private $container;

  public function __construct(Container $container)
  {
    $this->container = $container;
  }
  public static function getSubscribedEvents()
  {
    return array(
      FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
    );
  }

  public function onRegistrationSuccess(FormEvent $event)
  {
    echo "ami ekhane"; die;
    $doctrine = $this->container->get('doctrine');
    $em = $doctrine->getManager();

    $user = $event->getForm()->getData();
    $user->addRole('ROLE_ADMIN');
    $em->persist($user);
//    $this->um->updateUser($user);
//    $this->dm->flush();
  }
}
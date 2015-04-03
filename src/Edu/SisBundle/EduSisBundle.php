<?php

namespace Edu\SisBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class EduSisBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}

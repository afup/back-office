<?php

namespace Afup\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AfupUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}

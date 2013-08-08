<?php

namespace Sdz\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SdzUserBundle extends Bundle
{
    //Fonction a rajouter pour que FOSUserBundle pourras faire corespondre a nos besoins
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}

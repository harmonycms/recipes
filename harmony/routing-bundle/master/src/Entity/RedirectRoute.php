<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Harmony\Bundle\RoutingBundle\Model\RedirectRoute as RedirectRouteModel;

/**
 * Class RedirectRoute
 * @ORM\Entity()
 * @ORM\Table()
 *
 * @package App\Entity
 */
class RedirectRoute extends RedirectRouteModel
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Get Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
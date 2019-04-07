<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Bundle\RoutingBundle\Model\RedirectRoute as RedirectRouteModel;

/**
 * Class RedirectRoute
 * @MongoDB\Document()
 *
 * @package App\Document
 */
class RedirectRoute extends RedirectRouteModel
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * Get Id
     *
     * @return null|string|int
     */
    public function getId()
    {
        return $this->id;
    }
}
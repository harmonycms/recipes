<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Harmony\Extension\StaticPage\Model\StaticPage as BaseStaticPage;
use Symfony\Cmf\Component\Routing\RouteObjectInterface;

/**
 * Class StaticPage
 * @ORM\Entity()
 *
 * @package App\Entity
 */
class StaticPage extends BaseStaticPage
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var RouteObjectInterface[]|ArrayCollection
     * @ORM\ManyToMany(targetEntity="Symfony\Cmf\Component\Routing\RouteObjectInterface", cascade={"persist", "remove"})
     */
    protected $routes;

    /**
     * StaticPage constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->routes = new ArrayCollection();
    }

    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }
}
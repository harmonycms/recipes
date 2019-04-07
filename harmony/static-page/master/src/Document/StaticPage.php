<?php

namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Exception;
use Gedmo\Mapping\Annotation as Gedmo;
use Harmony\Extension\StaticPage\Model\StaticPage as BaseStaticPage;
use Symfony\Cmf\Component\Routing\RouteObjectInterface;

/**
 * Class StaticPage
 * @MongoDB\Document()
 *
 * @package App\Document
 */
class StaticPage extends BaseStaticPage
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @var RouteObjectInterface[]|ArrayCollection
     * @MongoDB\ReferenceMany(targetDocument="Harmony\Bundle\RoutingBundle\Model\Route", cascade={"persist", "remove"})
     */
    protected $routes;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @var string $slug
     */
    protected $slug;

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
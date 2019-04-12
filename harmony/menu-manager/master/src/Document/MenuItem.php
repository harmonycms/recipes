<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Gedmo\Mapping\Annotation as Gedmo;
use Harmony\Extension\MenuManager\Model\MenuItem as BaseMenuItem;

/**
 * Class MenuItem
 * @MongoDB\Document(repositoryClass="Harmony\Extension\MenuManager\DocumentRepository\MenuItemRepository")
 * @MongoDB\HasLifecycleCallbacks()
 *
 * @package App\Document
 */
class MenuItem extends BaseMenuItem
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * Name of this menu item (used for id by parent menu)
     * @Gedmo\Slug(fields={"label"}, separator="_", updatable=false, unique=true)
     */
    protected $name;

    /**
     * Child items
     * @MongoDB\ReferenceMany(
     *     targetDocument="App\Document\MenuItem",
     *     mappedBy="parent",
     *     cascade={"all"},
     *     indexBy="name"
     * )
     */
    protected $children;

    /**
     * Parent item
     * @MongoDB\ReferenceOne(targetDocument="App\Document\MenuItem", inversedBy="children")
     */
    protected $parent = null;

    /**
     * Getter for 'id'.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
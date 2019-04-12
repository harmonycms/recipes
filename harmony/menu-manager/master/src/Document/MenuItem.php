<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
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
     * Getter for 'id'.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
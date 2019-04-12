<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Harmony\Extension\MenuManager\Model\MenuItem as BaseMenuItem;

/**
 * Class MenuItem
 * @ORM\Entity(repositoryClass="Harmony\Extension\MenuManager\EntityRepository\MenuItemRepository")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(indexes={@ORM\Index(name="uri_idx", columns={"uri"})})
 *
 * @package App\Entity
 */
class MenuItem extends BaseMenuItem
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
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
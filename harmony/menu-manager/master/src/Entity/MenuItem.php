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
     * Child items
     * @ORM\OneToMany(targetEntity="MenuItem", mappedBy="parent", cascade={"all"}, indexBy="name")
     */
    protected $children;

    /**
     * Parent item
     * @ORM\ManyToOne(targetEntity="MenuItem", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="SET NULL")
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
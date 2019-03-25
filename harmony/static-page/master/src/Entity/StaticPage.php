<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Harmony\Extension\StaticPage\Model\StaticPage as BaseStaticPage;

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
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }
}
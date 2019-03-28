<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Harmony\Extension\TranslationManager\Manager\TranslationInterface;
use Harmony\Extension\TranslationManager\Model\Translation as TranslationModel;
use Harmony\Extension\TranslationManager\Model\TransUnit;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity()
 * @UniqueEntity(fields={"transUnit", "locale"})
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class Translation extends TranslationModel implements TranslationInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @var TransUnit
     */
    protected $transUnit;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set transUnit
     *
     * @param TransUnit $transUnit
     */
    public function setTransUnit(TransUnit $transUnit)
    {
        $this->transUnit = $transUnit;
    }

    /**
     * Get transUnit
     *
     * @return TransUnit
     */
    public function getTransUnit()
    {
        return $this->transUnit;
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist()
    {
        $now             = new \DateTime("now");
        $this->createdAt = $now;
        $this->updatedAt = $now;
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime("now");
    }
}

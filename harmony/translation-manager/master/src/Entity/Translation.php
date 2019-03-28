<?php

namespace App\Entity;

use Harmony\Extension\TranslationManager\Manager\TranslationInterface;
use Harmony\Extension\TranslationManager\Model\Translation as TranslationModel;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @UniqueEntity(fields={"transUnit", "locale"})
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class Translation extends TranslationModel implements TranslationInterface
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var Harmony\Extension\TranslationManager\Entity\TransUnit
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
     * @param Harmony\Extension\TranslationManager\Entity\TransUnit $transUnit
     */
    public function setTransUnit(\Harmony\Extension\TranslationManager\Model\TransUnit $transUnit)
    {
        $this->transUnit = $transUnit;
    }

    /**
     * Get transUnit
     *
     * @return Harmony\Extension\TranslationManager\Entity\TransUnit
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

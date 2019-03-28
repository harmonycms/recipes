<?php

namespace App\Entity;

use Harmony\Extension\TranslationManager\Manager\TransUnitInterface;
use Harmony\Extension\TranslationManager\Model\TransUnit as TransUnitModel;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @UniqueEntity(fields={"key", "domain"})
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class TransUnit extends TransUnitModel implements TransUnitInterface
{

    /**
     * Add translations
     *
     * @param Harmony\Extension\TranslationManager\Entity\Translation $translations
     */
    public function addTranslation(\Harmony\Extension\TranslationManager\Model\Translation $translation)
    {
        $translation->setTransUnit($this);

        $this->translations[] = $translation;
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime("now");
    }
}

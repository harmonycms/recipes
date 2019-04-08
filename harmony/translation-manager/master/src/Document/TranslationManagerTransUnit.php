<?php

namespace App\Document;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Extension\TranslationManager\Manager\TransUnitInterface;
use Harmony\Extension\TranslationManager\Model\Translation;
use Harmony\Extension\TranslationManager\Model\TransUnit as TransUnitModel;
use MongoTimestamp;

/**
 * @MongoDB\Document(repositoryClass="Harmony\Extension\TranslationManager\DocumentRepository\TransUnitRepository")
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class TranslationManagerTransUnit extends TransUnitModel implements TransUnitInterface
{

    /**
     * @MongoDB\Id()
     * @var string $id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceMany(
     *     targetDocument="App\Entity\TranslationManagerTranslation",
     *     mappedBy="transUnit",
     *     cascade={"all"}
     * )
     * @var Collection $translations
     */
    protected $translations;

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
     * Add translations
     *
     * @param Translation $translation
     */
    public function addTranslation(Translation $translation)
    {
        $translation->setTransUnit($this);

        $this->translations[] = $translation;
    }

    /**
     * Convert all MongoTimestamp object to time.
     */
    public function convertMongoTimestamp()
    {
        $this->createdAt = ($this->createdAt instanceof MongoTimestamp) ? $this->createdAt->sec : $this->createdAt;
        $this->updatedAt = ($this->updatedAt instanceof MongoTimestamp) ? $this->updatedAt->sec : $this->updatedAt;

        foreach ($this->getTranslations() as $translation) {
            $translation->convertMongoTimestamp();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist()
    {
        $now = new DateTime("now");

        $this->createdAt = $now->format('U');
        $this->updatedAt = $now->format('U');
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate()
    {
        $now = new DateTime("now");

        $this->updatedAt = $now->format('U');
    }
}

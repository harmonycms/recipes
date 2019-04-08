<?php

namespace App\Document;

use DateTime;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Extension\TranslationManager\Manager\TranslationInterface;
use Harmony\Extension\TranslationManager\Model\Translation as TranslationModel;
use MongoTimestamp;

/**
 * @MongoDB\Document()
 * @MongoDB\HasLifecycleCallbacks()
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class TranslationManagerTranslation extends TranslationModel implements TranslationInterface
{

    /**
     * @MongoDB\Id()
     * @var string $id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="App\Document\TranslationManagerTransUnit", inversedBy="translations")
     * @var TranslationManagerTransUnit $transUnit
     */
    protected $transUnit;

    /**
     * @MongoDB\ReferenceOne(targetDocument="App\Document\TranslationManagerFile", inversedBy="translations")
     * @var TranslationManagerFile $file
     */
    protected $file;

    /**
     * @MongoDB\Field(name="modified_manually", type="boolean")
     * @var boolean $modifiedManually
     */
    protected $modifiedManually = false;

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
     * @param TranslationManagerTransUnit $transUnit
     *
     * @return TranslationManagerTranslation
     */
    public function setTransUnit(TranslationManagerTransUnit $transUnit): TranslationManagerTranslation
    {
        $this->transUnit = $transUnit;

        return $this;
    }

    /**
     * Get transUnit
     *
     * @return null|TranslationManagerTransUnit
     */
    public function getTransUnit(): ?TranslationManagerTransUnit
    {
        return $this->transUnit;
    }

    /**
     * Set file
     *
     * @param TranslationManagerFile $file
     *
     * @return TranslationManagerTranslation
     */
    public function setFile(TranslationManagerFile $file): TranslationManagerTranslation
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return null|TranslationManagerFile
     */
    public function getFile(): ?TranslationManagerFile
    {
        return $this->file;
    }

    /**
     * Convert all MongoTimestamp object to time.
     */
    public function convertMongoTimestamp()
    {
        $this->createdAt = ($this->createdAt instanceof MongoTimestamp) ? $this->createdAt->sec : $this->createdAt;
        $this->updatedAt = ($this->updatedAt instanceof MongoTimestamp) ? $this->updatedAt->sec : $this->updatedAt;
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

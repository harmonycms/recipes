<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Extension\TranslationManager\Manager\FileInterface;
use Harmony\Extension\TranslationManager\Model\File as FileModel;

/**
 * @MongoDB\Document(repositoryClass="Harmony\Extension\TranslationManager\DocumentRepository\FileRepository")
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class TranslationManagerFile extends FileModel implements FileInterface
{

    /**
     * @MongoDB\Id()
     * @var string $id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceMany(
     *     targetDocument="App\Document\TranslationManagerTranslation",
     *     mappedBy="file",
     *     cascade={"persist"}
     * )
     * @var Collection $translations
     */
    protected $translations;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist()
    {
        $now = new \DateTime("now");

        $this->createdAt = $now->format('U');
        $this->updatedAt = $now->format('U');
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate()
    {
        $now = new \DateTime("now");

        $this->updatedAt = $now->format('U');
    }
}

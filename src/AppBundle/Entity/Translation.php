<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Translation
 *
 * @ORM\Table(name="translation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TranslationRepository")
 */
class Translation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="translation", type="string", length=255)
     */
    private $translation;

    /**
     * Many Translations have One Emoji.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Emoji", inversedBy="translations")
     * @ORM\JoinColumn(name="emoji_id", referencedColumnName="id")
     */
    private $emoji;


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
     * Set language
     *
     * @param string $language
     *
     * @return Translation
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set translation
     *
     * @param string $translation
     *
     * @return Translation
     */
    public function setTranslation($translation)
    {
        $this->translation = $translation;

        return $this;
    }

    /**
     * Get translation
     *
     * @return string
     */
    public function getTranslation()
    {
        return $this->translation;
    }

    /**
     * Set emoji
     *
     * @param \AppBundle\Entity\Emoji $emoji
     *
     * @return Translation
     */
    public function setEmoji(\AppBundle\Entity\Emoji $emoji = null)
    {
        $this->emoji = $emoji;

        return $this;
    }

    /**
     * Get emoji
     *
     * @return \AppBundle\Entity\Emoji
     */
    public function getEmoji()
    {
        return $this->emoji;
    }
}

<?php

/**
 * Intersect CMS Unleashed
 * 2.2 Update
 * Last modify : 24/08/2021 at 20:21
 * Author : XFallSeane
 * Website : https://intersect.thomasfds.fr
 */

namespace App\Entity;

use App\Repository\CmsSettingsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'cms_settings')]
#[ORM\Entity(repositoryClass: CmsSettingsRepository::class)]
#[ORM\UniqueConstraint(name: 'setting', columns: ['setting'])]
class CmsSettings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(name: 'setting', type: 'string', length: 255, nullable: false)]
    private $setting;

    /**
     * @var string
     */
    #[ORM\Column(name: 'default_value', type: 'text', length: 65535, nullable: false)]
    private $defaultValue;

    /**
     * @var string
     */
    #[ORM\Column(name: 'description', type: 'text', length: 65535, nullable: false)]
    private $description;



    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of setting
     *
     * @return  string
     */
    public function getSetting()
    {
        return $this->setting;
    }

    /**
     * Set the value of setting
     *
     * @param  string  $setting
     *
     * @return  self
     */
    public function setSetting(string $setting)
    {
        $this->setting = $setting;

        return $this;
    }


    /**
     * Get the value of defaultValue
     *
     * @return  string
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * Set the value of defaultValue
     *
     * @param  string  $defaultValue
     *
     * @return  self
     */
    public function setDefaultValue(string $defaultValue)
    {
        $this->defaultValue = $defaultValue;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }
}

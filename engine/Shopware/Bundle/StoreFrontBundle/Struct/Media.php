<?php
/**
 * Shopware 5
 * Copyright (c) shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

namespace Shopware\Bundle\StoreFrontBundle\Struct;

/**
 * @category  Shopware
 * @package   Shopware\Bundle\StoreFrontBundle\Struct
 * @copyright Copyright (c) shopware AG (http://www.shopware.de)
 */
class Media extends Extendable implements \JsonSerializable
{
    const TYPE_IMAGE = 'IMAGE';

    /**
     * @var int
     */
    protected $id;

    /**
     * Name of the media file
     * @var string $name
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var boolean
     */
    protected $preview;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $file;

    /**
     * @var string
     */
    protected $extension;

    /**
     * Contains the different thumbnail sizes.
     * @var array
     */
    protected $thumbnails;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param boolean $preview
     */
    public function setPreview($preview)
    {
        $this->preview = $preview;
    }

    /**
     * @return boolean
     */
    public function isPreview()
    {
        return $this->preview;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $extension
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return Thumbnail[]
     */
    public function getThumbnails()
    {
        return $this->thumbnails;
    }

    /**
     * @param $index
     * @return Thumbnail
     */
    public function getThumbnail($index)
    {
        return $this->thumbnails[$index];
    }

    /**
     * @param Thumbnail[] $thumbnails
     * @return $this
     */
    public function setThumbnails(array $thumbnails)
    {
        $this->thumbnails = $thumbnails;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

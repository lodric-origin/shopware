<?php
/**
 * Shopware 4.0
 * Copyright © 2012 shopware AG
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
 *
 * @category   Shopware
 * @package    Shopware_Models
 * @subpackage Article
 * @copyright  Copyright (c) 2012, shopware AG (http://www.shopware.de)
 * @version    $Id$
 * @author     $Author$
 */

namespace Shopware\Models\Article;
use Shopware\Components\Model\ModelEntity,
    Doctrine\ORM\Mapping AS ORM,
    Symfony\Component\Validator\Constraints as Assert,
    Doctrine\Common\Collections\ArrayCollection;
/**
 * todo@all: Documentation
 *
 * @ORM\Entity
 * @ORM\Table(name="s_articles_img")
 */
class Image extends ModelEntity
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer $articleId
     * @ORM\Column(name="articleID", type="integer", nullable=true)
     */
    private $articleId = null;

    /**
     * @var integer $articleDetailId
     * @ORM\Column(name="article_detail_id", type="integer", nullable=true)
     */
    private $articleDetailId = null;

    /**
     * @var string $description
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description = '';

    /**
     * @var string path
     * @ORM\Column(name="img", type="string", length=100, nullable=true)
     */
    private $path = null;

    /**
     * @var integer $main
     * @ORM\Column(name="main", type="integer", nullable=false)
     */
    private $main = 0;

    /**
     * @var integer $position
     * @ORM\Column(name="position", type="integer", nullable=false)
     */
    private $position = 0;

    /**
     * @var integer $width
     * @ORM\Column(name="width", type="integer", nullable=false)
     */
    private $width = 0;

    /**
     * @var integer $height
     * @ORM\Column(name="height", type="integer", nullable=false)
     */
    private $height = 0;

    /**
     * @var string $relations
     * @ORM\Column(name="relations", type="text", nullable=false)
     */
    private $relations = '';

    /**
     * @var string $extension
     * @ORM\Column(name="extension", type="string", length=255, nullable=false)
     */
    private $extension = '';

    /**
     * @var int $parentId
     * @ORM\Column(name="parent_id", type="integer", nullable=true)
     */
    private $parentId = null;

    /**
     * @var int $mediaId
     * @ORM\Column(name="media_id", type="integer", nullable=true)
     */
    private $mediaId = null;

    /**
     * OWNING SIDE
     * @var Article
     * @ORM\ManyToOne(targetEntity="Shopware\Models\Article\Article", inversedBy="images")
     * @ORM\JoinColumn(name="articleID", referencedColumnName="id")
     */
    protected $article;

    /**
     * INVERSE SIDE
     * @ORM\OneToOne(targetEntity="Shopware\Models\Attribute\ArticleImage", mappedBy="articleImage", orphanRemoval=true,cascade={"persist", "update"})
     * @var \Shopware\Models\Attribute\ArticleImage
     */
    protected $attribute;

    /**
     * The parent category
     *
     * @var Category
     * @ORM\ManyToOne(targetEntity="Image", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Image", mappedBy="parent")
     */
    private $children;

    /**
     * INVERSE SIDE
     * The mapping property contains the configuration for the variant images. One mapping contains one or many
     * rule sets which contains the configured configurator options.
     * Based on the image mapping, the variant images will be extended from the main image of the article.
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Shopware\Models\Article\Image\Mapping", mappedBy="image", orphanRemoval=true, cascade={"persist", "update"})
     */
    protected $mappings;

    /**
     * OWNING SIDE
     * @var Detail
     * @ORM\ManyToOne(targetEntity="Shopware\Models\Article\Detail", inversedBy="images")
     * @ORM\JoinColumn(name="article_detail_id", referencedColumnName="id")
     */
    protected $articleDetail;

    /**
     * OWNING SIDE
     * @var
     * @ORM\ManyToOne(targetEntity="Shopware\Models\Media\Media", inversedBy="articles")
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     */
    protected $media;

    /**
     * Class constructor which initials the array collections.
     */
    public function __construct() {
        $this->mappings = new ArrayCollection();
        $this->children = new ArrayCollection();
    }

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
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $main
     */
    public function setMain($main)
    {
        $this->main = $main;
    }

    /**
     * @return int
     */
    public function getMain()
    {
        return $this->main;
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
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param int $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param string $relations
     */
    public function setRelations($relations)
    {
        $this->relations = $relations;
    }

    /**
     * @return string
     */
    public function getRelations()
    {
        return $this->relations;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return \Shopware\Models\Article\Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param \Shopware\Models\Article\Article $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }

    /**
     * @return \Shopware\Models\Attribute\ArticleImage
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param \Shopware\Models\Attribute\ArticleImage|array|null $attribute
     * @return \Shopware\Models\Attribute\ArticleImage
     */
    public function setAttribute($attribute)
    {
        return $this->setOneToOne($attribute, '\Shopware\Models\Attribute\ArticleImage', 'attribute', 'articleImage');
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getMappings()
    {
        return $this->mappings;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $mappings
     * @return \Shopware\Components\Model\ModelEntity
     */
    public function setMappings($mappings)
    {
        return $this->setOneToMany($mappings, '\Shopware\Models\Article\Image\Mapping', 'mappings', 'image');
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return \Shopware\Models\Article\Category
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param \Shopware\Models\Article\Category $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return \Shopware\Models\Article\Detail
     */
    public function getArticleDetail()
    {
        return $this->articleDetail;
    }

    /**
     * @param \Shopware\Models\Article\Detail $articleDetail
     */
    public function setArticleDetail($articleDetail)
    {
        $this->articleDetail = $articleDetail;
    }

    /**
     * @return
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param  $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }
}

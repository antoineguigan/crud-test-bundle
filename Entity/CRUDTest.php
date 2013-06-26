<?php
/*
 * This file is part of the Qimnet update tracker Bundle.
 *
 * (c) Antoine Guigan <aguigan@qimnet.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Qimnet\CRUDTestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class CRUDTest
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    protected $id;
    /**
     * @var string
     * @ORM\Column
     * @Assert\NotBlank
     */
    protected $name;
    /**
     * @var int
     * @ORM\Column(type="integer", name="test_type")
     * @Assert\Range(min=0, max=2)
     */
    protected $type;

    /**
     * Get Name
     * @return string
     **/
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name
     * @param string
     * @return CRUDTest
     **/
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Type
     * @return int
     **/
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set Type
     * @param int
     * @return CRUDTest
     **/
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get Id
     * @return int
     **/
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->name;
    }
}

<?php

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"user-list", "comment-list"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     * @Groups({"user-list", "comment-list"})
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     * @Groups({"user-list", "comment-list"})
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     * @Groups({"user-list"})
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=true)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_dt_tm", type="datetime", nullable=false)
     * @Groups({"user-list"})
     */
    private $createDtTm = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_dt_tm", type="datetime", nullable=false)
     * @Groups({"user-list"})
     */
    private $updateDtTm = '0000-00-00 00:00:00';

    /**
     * @var boolean
     *
     * @ORM\Column(name="delete_flag", type="boolean", nullable=true)
     * @Groups({"user-list"})
     */
    private $deleteFlag;
    
    /**
     * @ORM\OneToMany(targetEntity="\User\Entity\Comment",
     * mappedBy="user", cascade={"all"},
     * orphanRemoval=true)
     * @Groups({"user-list"})
     */
    private $comments;

    /**
     * 
     */
    public function __construct() {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set createDtTm
     *
     * @param \DateTime $createDtTm
     * @return User
     */
    public function setCreateDtTm($createDtTm)
    {
        $this->createDtTm = $createDtTm;

        return $this;
    }

    /**
     * Get createDtTm
     *
     * @return \DateTime 
     */
    public function getCreateDtTm()
    {
        return $this->createDtTm;
    }

    /**
     * Set updateDtTm
     *
     * @param \DateTime $updateDtTm
     * @return User
     */
    public function setUpdateDtTm($updateDtTm)
    {
        $this->updateDtTm = $updateDtTm;

        return $this;
    }

    /**
     * Get updateDtTm
     *
     * @return \DateTime 
     */
    public function getUpdateDtTm()
    {
        return $this->updateDtTm;
    }

    /**
     * Set deleteFlag
     *
     * @param boolean $deleteFlag
     * @return User
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;

        return $this;
    }

    /**
     * Get deleteFlag
     *
     * @return boolean 
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     * @return User
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param string $updatedBy
     * @return User
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return string 
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Add comment
     * 
     * @param \User\Entity\Comment $comment
     * @return \User\Entity\User
     */
    public function addComment(\User\Entity\Comment $comment = null)
    {
        $this->comments->add($comment);
        return $this;
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
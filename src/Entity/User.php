<?php
namespace App\Entity;
 
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use DateTime;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation as Serializer;
 
/**
 * User
 *
 * @ORM\Table(name="user");
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository");
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 * @ORM\HasLifecycleCallbacks()
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
 
    /**
     * @ORM\Column(name="name", type="string", length=191)
     */
    protected $name;
 
    /**
     * @ORM\Column(name="email", type="string", length=191, unique=true)
     * @Assert\NotBlank()
     */
    protected $email;
 
    /**
     * @ORM\Column(name="username", type="string", length=191, unique=true)
     * @Assert\NotBlank()
     */
    protected $username;
 
    protected $salt;
 
    /**
     * @ORM\Column(name="password", type="string", length=191)
     * @Serializer\Exclude()
     */
    protected $password;
 
    /**
     * @var string
     */
    protected $plainPassword;
 
    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    protected $roles = [];
 
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;
 
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isActive;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $termsAccepted;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    protected $lang = 'en_EN';
 
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
 
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
 
    /**
     * @param mixed $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
 
        return $this;
    }
 
    /**
     * Set email
     *
     * @param string $email
     *
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
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
 
    /**
     * @param mixed $username
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;
 
        return $this;
    }
 
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
 
    /**
     * @param mixed $password
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;
 
        return $this;
    }
 
    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }
 
    /**
     * @param $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
 
        $this->password = null;
    }
 
    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
 
        return $this;
    }
 
    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return ["ROLE_USER"];
    }
 
    public function getSalt() {}
 
    public function eraseCredentials() {}
 
    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
 
    /**
     * @param mixed $createdAt
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
 
        return $this;
    }
 
    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
 
    /**
     * @param mixed $updatedAt
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
 
        return $this;
    }
    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }
    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;
        return $this;
    }
    public function getTermsAccepted(): ?bool
    {
        return $this->termsAccepted;
    }
    public function setTermsAccepted(bool $termsAccepted): self
    {
        $this->termsAccepted = $termsAccepted;
        return $this;
    }
    public function setLang(string $lang): self
    {
        $this->lang = $lang;
        return $this;
    }
    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {
        $dateTimeNow = new DateTime('now');
        $this->setUpdatedAt($dateTimeNow);
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt($dateTimeNow);
        }
    }
    public function __construct()
    {
        $this->isActive = true;
        $this->termsAccepted = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
        $this->roles = array('ROLE_ADMIN');
        $this->roles = array('ROLE_USER');
    }
}
 

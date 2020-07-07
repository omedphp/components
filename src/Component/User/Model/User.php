<?php

/*
 * This file is part of the API Platform project.
 *
 * (c) Anthonius Munthi <https://itstoni.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Omed\Component\User\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User.
 *
 * @ORM\Entity
 * @ORM\Table(name="omed_users")
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var null|int
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    protected $username;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string|null
     */
    protected $salt;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    protected $email;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string|null
     */
    protected $password;

    /**
     * @var string|null
     */
    protected $plainPassword;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTimeInterface|null
     */
    protected $lastLogin;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string|null
     */
    protected $emailVerificationToken;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string|null
     */
    protected $passwordResetToken;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTimeInterface|null
     */
    protected $passwordRequestedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTimeInterface|null
     */
    protected $emailVerifiedAt;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool
     */
    protected $locked = false;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTimeInterface|null
     */
    protected $credentialsExpireAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return User
     */
    public function setUsername(?string $username): UserInterface
    {
        $this->username = $username;

        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    /**
     * @return User
     */
    public function setSalt(?string $salt): UserInterface
    {
        $this->salt = $salt;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return User
     */
    public function setEmail(?string $email): UserInterface
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return User
     */
    public function setPassword(?string $password): UserInterface
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @return User
     */
    public function setPlainPassword(?string $plainPassword): UserInterface
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeInterface
    {
        return $this->lastLogin;
    }

    /**
     * @return User
     */
    public function setLastLogin(?\DateTimeInterface $lastLogin): UserInterface
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    public function getEmailVerificationToken(): ?string
    {
        return $this->emailVerificationToken;
    }

    /**
     * @return User
     */
    public function setEmailVerificationToken(?string $emailVerificationToken): UserInterface
    {
        $this->emailVerificationToken = $emailVerificationToken;

        return $this;
    }

    public function getPasswordResetToken(): ?string
    {
        return $this->passwordResetToken;
    }

    /**
     * @return User
     */
    public function setPasswordResetToken(?string $passwordResetToken): UserInterface
    {
        $this->passwordResetToken = $passwordResetToken;

        return $this;
    }

    public function getPasswordRequestedAt(): ?\DateTimeInterface
    {
        return $this->passwordRequestedAt;
    }

    /**
     * @return User
     */
    public function setPasswordRequestedAt(?\DateTimeInterface $passwordRequestedAt): UserInterface
    {
        $this->passwordRequestedAt = $passwordRequestedAt;

        return $this;
    }

    public function getEmailVerifiedAt(): ?\DateTimeInterface
    {
        return $this->emailVerifiedAt;
    }

    /**
     * @return User
     */
    public function setEmailVerifiedAt(?\DateTimeInterface $emailVerifiedAt): UserInterface
    {
        $this->emailVerifiedAt = $emailVerifiedAt;

        return $this;
    }

    public function isLocked(): bool
    {
        return $this->locked;
    }

    /**
     * @return User
     */
    public function setLocked(bool $locked): UserInterface
    {
        $this->locked = $locked;

        return $this;
    }

    public function getCredentialsExpireAt(): ?\DateTimeInterface
    {
        return $this->credentialsExpireAt;
    }

    /**
     * @return User
     */
    public function setCredentialsExpireAt(?\DateTimeInterface $credentialsExpireAt): UserInterface
    {
        $this->credentialsExpireAt = $credentialsExpireAt;

        return $this;
    }
}
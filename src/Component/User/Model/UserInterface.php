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

/**
 * User Interface.
 */
interface UserInterface
{
    /**
     * Get current user id.
     */
    public function getId(): ?int;

    public function getUsername(): ?string;

    public function setUsername(string $username): self;

    public function setEmail(string $email): self;

    public function getEmail(): ?string;

    public function getSalt(): ?string;

    public function setSalt(?string $salt): self;

    public function getPassword(): ?string;

    public function setPassword(?string $password): self;

    public function getPlainPassword(): ?string;

    public function setPlainPassword(?string $plainPassword): self;

    public function getLastLogin(): ?\DateTimeInterface;

    public function setLastLogin(?\DateTimeInterface $lastLogin): self;

    public function getEmailVerificationToken(): ?string;

    public function setEmailVerificationToken(?string $emailVerificationToken): self;

    public function getPasswordResetToken(): ?string;

    public function setPasswordResetToken(?string $passwordResetToken): self;

    public function getPasswordRequestedAt(): ?\DateTimeInterface;

    public function setPasswordRequestedAt(?\DateTimeInterface $passwordRequestedAt): self;

    public function getEmailVerifiedAt(): ?\DateTimeInterface;

    public function setEmailVerifiedAt(?\DateTimeInterface $emailVerifiedAt): self;

    public function isLocked(): bool;

    public function setLocked(bool $locked): self;

    public function getCredentialsExpireAt(): ?\DateTimeInterface;

    public function setCredentialsExpireAt(?\DateTimeInterface $credentialsExpireAt): self;
}
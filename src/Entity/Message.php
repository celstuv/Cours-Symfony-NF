<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(
     *      min = 5,
     *      max = 50,
     *      minMessage = "Il faut mettre un nom de 5 caractères au minimum",
     *      maxMessage = "Il faut mettre un nom de 50 caractères au maximum"
     * )
     */
    private $sender;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(
     *      min = 5,
     *      max = 50,
     *      minMessage = "Il faut mettre un nom de 5 caractères au minimum",
     *      maxMessage = "Il faut mettre un nom de 50 caractères au maximum"
     * )
     */
    private $receiver;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "Il faut mettre un message de 5 caractères au minimum",
     * )
     */
    private $body;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSender(): ?string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiver(): ?string
    {
        return $this->receiver;
    }

    public function setReceiver(string $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}

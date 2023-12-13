<?php

namespace App\Entity;

use App\Repository\IpmCpuUsageDetailsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IpmCpuUsageDetailsRepository::class)]
class IpmCpuUsageDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $serverName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hostName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $scriptName = null;

    #[ORM\Column(nullable: true)]
    private ?float $cpuPeakUsage = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServerName(): ?string
    {
        return $this->serverName;
    }

    public function setServerName(?string $serverName): static
    {
        $this->serverName = $serverName;

        return $this;
    }

    public function getHostname(): ?string
    {
        return $this->hostName;
    }

    public function setHostname(?string $hostName): static
    {
        $this->hostName = $hostName;

        return $this;
    }

    public function getScriptName(): ?string
    {
        return $this->scriptName;
    }

    public function setScriptName(?string $scriptName): static
    {
        $this->scriptName = $scriptName;

        return $this;
    }

    public function getCpuPeakUsage(): ?float
    {
        return $this->cpuPeakUsage;
    }

    public function setCpuPeakUsage(?float $cpuPeakUsage): static
    {
        $this->cpuPeakUsage = $cpuPeakUsage;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}

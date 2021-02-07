<?php

namespace App\Entity;

use App\Repository\WeatherRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WeatherRepository::class)
 */
class Weather
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $time;

    /**
     * @ORM\Column(type="float")
     */
    private $temp;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $icon;

    /**
     * @ORM\Column(type="float")
     */
    private $wind_kph;

    /**
     * @ORM\Column(type="integer")
     */
    private $wind_degree;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $wind_dir;

    /**
     * @ORM\Column(type="float")
     */
    private $pressure_mb;

    /**
     * @ORM\Column(type="float")
     */
    private $precip_mm;

    /**
     * @ORM\Column(type="integer")
     */
    private $humidity;

    /**
     * @ORM\Column(type="integer")
     */
    private $cloud;

    /**
     * @ORM\Column(type="float")
     */
    private $feelslike;

    /**
     * @ORM\Column(type="float")
     */
    private $vis;

    /**
     * @ORM\Column(type="float")
     */
    private $uv;

    /**
     * @ORM\Column(type="float")
     */
    private $gust;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getTemp(): ?float
    {
        return $this->temp;
    }

    public function setTemp(float $temp): self
    {
        $this->temp = $temp;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getWindKph(): ?float
    {
        return $this->wind_kph;
    }

    public function setWindKph(float $wind_kph): self
    {
        $this->wind_kph = $wind_kph;

        return $this;
    }

    public function getWindDegree(): ?int
    {
        return $this->wind_degree;
    }

    public function setWindDegree(int $wind_degree): self
    {
        $this->wind_degree = $wind_degree;

        return $this;
    }

    public function getWindDir(): ?string
    {
        return $this->wind_dir;
    }

    public function setWindDir(string $wind_dir): self
    {
        $this->wind_dir = $wind_dir;

        return $this;
    }

    public function getPressureMb(): ?float
    {
        return $this->pressure_mb;
    }

    public function setPressureMb(float $pressure_mb): self
    {
        $this->pressure_mb = $pressure_mb;

        return $this;
    }

    public function getPrecipMm(): ?float
    {
        return $this->precip_mm;
    }

    public function setPrecipMm(float $precip_mm): self
    {
        $this->precip_mm = $precip_mm;

        return $this;
    }

    public function getHumidity(): ?int
    {
        return $this->humidity;
    }

    public function setHumidity(int $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getCloud(): ?int
    {
        return $this->cloud;
    }

    public function setCloud(int $cloud): self
    {
        $this->cloud = $cloud;

        return $this;
    }

    public function getFeelslike(): ?float
    {
        return $this->feelslike;
    }

    public function setFeelslike(float $feelslike): self
    {
        $this->feelslike = $feelslike;

        return $this;
    }

    public function getVis(): ?float
    {
        return $this->vis;
    }

    public function setVis(float $vis): self
    {
        $this->vis = $vis;

        return $this;
    }

    public function getUv(): ?float
    {
        return $this->uv;
    }

    public function setUv(float $uv): self
    {
        $this->uv = $uv;

        return $this;
    }

    public function getGust(): ?float
    {
        return $this->gust;
    }

    public function setGust(float $gust): self
    {
        $this->gust = $gust;

        return $this;
    }
}

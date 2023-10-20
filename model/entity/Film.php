<?php

class Film {
    private string $id;
    private string $title;
    private string $synopsis;
    private string $year;
    private string $director;
    private string $genre;
    private string $scenarist;
    private string $prodCompany;

    public function __construct($id, $title, $synopsis, $year, $director, $genre, $scenarist, $prodCompany)
    {
        $this->id = $id;
        $this->title = $title;
        $this->synopsis = $synopsis;
        $this->year = $year;
        $this->director = $director;
        $this->genre = $genre;
        $this->scenarist = $scenarist;
        $this->prodCompany = $prodCompany;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getScenarist(): string
    {
        return $this->scenarist;
    }

    public function getProdCompany(): string
    {
        return $this->prodCompany;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setSynopsis(string $synopsis)
    {
        $this->synopsis = $synopsis;
    }

    public function setYear(string $year)
    {
        $this->year = $year;
    }

    public function setDirector(string $director)
    {
        $this->director = $director;
    }

    public function setGenre(string $genre)
    {
        $this->genre = $genre;
    }

    public function setScenarist(string $scenarist)
    {
        $this->scenarist = $scenarist;
    }

    public function setProdCompany(string $prodCompany)
    {
        $this->prodCompany = $prodCompany;
    }
}

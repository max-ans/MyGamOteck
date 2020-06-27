<?php

namespace App\Service;

use Symfony\Component\String\Slugger\SluggerInterface;


class Slugger 
{
    private $asciiSlugger;

    public function __construct(SluggerInterface $asciiSlugger)
    {
        $this->asciiSlugger = $asciiSlugger;
    }

    public function slugify (String $string) :string 
    {
        $string = strtolower($string);

        return $this->asciiSlugger->slug($string);
    }
}
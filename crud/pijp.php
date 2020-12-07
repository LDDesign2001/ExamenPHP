<?php

class pijp
{
    private $kleur;
    private $size;
    private $price;
    public function setKleur($kleur)
    {
        $this->kleur = $kleur;
    }
    public function getKleur()
    {
        return $this->kleur;
    }


}
$pijp = new pijp();
$pijp->setKleur("oranje");

$pipe = new pijp();
$pipe->setKleur("blauw");
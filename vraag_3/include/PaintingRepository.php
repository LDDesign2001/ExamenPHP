<?php

class PaintingRepository {

    private $paintings;

    public function __construct() {
        $this->loadData();
    }

    public function findAll() {
        return $this->paintings;
    }

    private function loadData() {
        $rawData = array(
            array(
                'id' => 1,
                'name' => "Meisje met de parel",
                'price' => 200000000,
                'painter' => 'Vermeer',
                'image' => 'Girl_with_a_Pearl_Earring.jpg'
            ),
            array(
                'id' => 2,
                'name' => "Le Fils de l'homme",
                'price' => 3500000,
                'painter' => 'Magritte',
                'image' => 'Le_Fils_de_lhomme.jpg'
            ),
            array(
                'id' => 3,
                'name' => "De kus",
                'price' => 135000000,
                'painter' => 'Klimt',
                'image' => 'De_kus.jpg'
            ),
            array(
                'id' => 4,
                'name' => "Le Moulin de la Galette",
                'price' => 78100000,
                'painter' => 'Renoir',
                'image' => 'Le_Moulin_de_la_Galette.jpg'
            ),
            array(
                'id' => 5,
                'name' => "Nighthawks",
                'price' => 15000000,
                'painter' => 'Hopper',
                'image' => 'Nighthawks.jpg'
            ),
            array(
                'id' => 6,
                'name' => "Child with a dove",
                'price' => 150000000,
                'painter' => 'Picasso',
                'image' => 'picasso.jpg'
            ),
            array(
                'id' => 7,
                'name' => "Bassin aux nymphéas",
                'price' => 80500000,
                'painter' => 'Monet',
                'image' => 'lo_stagno_delle_ninfee.jpg'
            ),
            array(
                'id' => 8,
                'name' => "De pannenkoekenbakker",
                'price' => 1500000,
                'painter' => 'Brouwer',
                'image' => 'The_Pancake_Baker.jpg'
            ),
            array(
                'id' => 9,
                'name' => "Persistence of memory",
                'price' => 550000000,
                'painter' => 'Dali',
                'image' => 'persistance.jpg'
            ),
            array(
                'id' => 10,
                'name' => "De Schreeuw",
                'price' => 119992000,
                'painter' => 'Munch',
                'image' => 'schreeuw.jpg'
            )
        );
        foreach ($rawData as $rawPainting) {
            $painting = new Painting();
            $painting->setId($rawPainting["id"]);
            $painting->setName($rawPainting["name"]);
            $painting->setPrice($rawPainting["price"]);
            $painting->setPainter($rawPainting["painter"]);
            $painting->setImage($rawPainting["image"]);
            $this->paintings[] = $painting;
        }
        return $this->paintings;
    }
} 
<?php
class Painting {

    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var integer */
    private $price;
    /** @var string */
    private $image;
    /** @var string */
    private $painter;

    private $currencies = array(
        "eur" => "€",
        "usd" => "$",
        "gbp" => "£",
        "yen" => "¥"
    );
    private $rates = array(
        "eur" => 1,
        "usd" => 1.11,
        "gbp" => 0.85,
        "yen" => 120.61
    );

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $currency
     * @return string
     */
    public function getPrice($currency = "eur")
    {
        return number_format($this->rates[$currency]*$this->price,2,',','') . " " . $this->currencies[$currency];
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getPainter()
    {
        return $this->painter;
    }

    /**
     * @param string $painter
     */
    public function setPainter($painter)
    {
        $this->painter = $painter;
    }





} 
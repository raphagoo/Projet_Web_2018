<?php

class Cart
{
    private $totalPrice = 0;
    private $nbArticles = 0;

    private $articles = array();

    public function __construct()
    {

    }

    public function getNbArticles()
    {
        return $this->nbArticles;
    }

    public function setNbArticles()
    {
        $this->nbArticles = 0;
        for ($i = 0; $i < count($this->articles); $i++)
        {
            $this->nbArticles += $this->articles[$i]['qty'];
        }
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function setTotalPrice()
    {
        $this->totalPrice = 0;
        for ($i = 0; $i < count($this->articles); $i++)
        {
            for ($j = 0; $j < $this->articles[$i]['qty']; $j++)
            {
                $this->totalPrice += $this->articles[$i]['price'];
            }
        }

        return $this->totalPrice;
    }

    private function calculateTotalPrice()
    {

    }

    public function addArticle($id, $name, $price, $nbArts)
    {
        $added = false;
        for ($i = 0; $i < count($this->articles); $i++)
        {
            if ($id == $this->articles[$i]['id'])
            {
                $this->articles[$i]['qty'] += $nbArts;
                $added = true;
            }
        }

        if (!$added)
        {
            array_unshift($this->articles, array('id'=>$id, 'name'=>$name, 'qty'=>$nbArts, 'price'=>$price));
        }

        $this->setNbArticles();
        $this->setTotalPrice();
    }

    public function getArticle($id)
    {

    }

    public function getArticles()
    {
        return $this->articles;
    }

    public function removeArticle($id)
    {
        for ($i = 0; $i < count($this->articles); $i++)
        {
            if ($id == $this->articles[$i]['id'])
            {
                unset($this->articles[$i]);
            }
        }

        $this->articles = array_values($this->articles);
        $this->setNbArticles();
        $this->setTotalPrice();
    }

    public function emptyCart()
    {
        $this->articles = array();
        $this->setTotalPrice();
        $this->setNbArticles();
    }

    public function setArticleQty($id, $qty)
    {
        for ($i = 0; $i < count($this->articles); $i++)
        {
            if ($id == $this->articles[$i]['id'])
            {
                $this->articles[$i]['qty'] = $qty;
            }
        }
        $this->setTotalPrice();
        $this->setNbArticles();
    }

    public function validateCart()
    {

    }

    public function __destruct()
    {

    }
}
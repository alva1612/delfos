<?php

namespace App\Models;

class Product
{
    private $_id;
    private $name;
    private $slug;

    public function __construct($_id, $name, $slug) {
        $this->_id = $_id;
        $this->name = $name;
        $this->slug = $slug;
    }

    public function get_id(){
		return $this->_id;
	}

	public function set_id($_id){
		$this->_id = $_id;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getSlug(){
		return $this->slug;
	}

	public function setSlug($slug){
		$this->slug = $slug;
	}


    function product_card() {
        return view('products.product-row', [
            'product' => $this
        ]);
    }
}

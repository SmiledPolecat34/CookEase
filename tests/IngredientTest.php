<?php


// IngredientTest.php

require_once ('./Back/Ingredient.php');

use PHPUnit\Framework\TestCase;

class IngredientTest extends TestCase {

    public function testGetId() {
        $ingredient = new Ingredient();
        $ingredient->setId(1);
        $this->assertEquals(1, $ingredient->getId());
    }

    public function testGetName() {
        $ingredient = new Ingredient();
        $ingredient->setName('Tomate');
        $this->assertEquals('Tomate', $ingredient->getName());
    }

    public function testSetId() {
        $ingredient = new Ingredient();
        $ingredient->setId(1);
        $this->assertEquals(1, $ingredient->getId());
    }

    public function testSetName() {
        $ingredient = new Ingredient();
        $ingredient->setName('Tomate');
        $this->assertEquals('Tomate', $ingredient->getName());
    }

}
?>
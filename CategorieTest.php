<?php

// CategorieTest.php

require_once ('./Back/Categorie.php');

use PHPUnit\Framework\TestCase;

class CategorieTest extends TestCase {

    public function testGetId() {
        $categorie = new Categorie();
        $categorie->setId(1);
        $this->assertEquals(1, $categorie->getId());
    }

    public function testGetName() {
        $categorie = new Categorie();
        $categorie->setName('Entrée');
        $this->assertEquals('Entrée', $categorie->getName());
    }

    public function testSetId() {
        $categorie = new Categorie();
        $categorie->setId(1);
        $this->assertEquals(1, $categorie->getId());
    }

    public function testSetName() {
        $categorie = new Categorie();
        $categorie->setName('Entrée');
        $this->assertEquals('Entrée', $categorie->getName());
    }

}
?>
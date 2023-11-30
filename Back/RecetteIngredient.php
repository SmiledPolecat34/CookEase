<?php

// RecetteIngredient.php

class RecetteIngredient {
    private $recette_id;
    private $ingredient_id;
    private $quantity;

    public function getRecetteId() {
        return $this->recette_id;
    }

    public function getIngredientId() {
        return $this->ingredient_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setRecetteId($recette_id) {
        $this->recette_id = $recette_id;
    }

    public function setIngredientId($ingredient_id) {
        $this->ingredient_id = $ingredient_id;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
}

?>
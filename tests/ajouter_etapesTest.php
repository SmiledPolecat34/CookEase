
<?php
require_once('config.php');
require_once('./Back/ajouter_etapes.php');

use PHPUnit\Framework\TestCase;

class AjouterEtapesTest extends TestCase {

    public function testAjouterEtapes() {
        $pdoMock = $this->createMock(PDO::FETCH_ASSOC);
        $stepsManager = new StepsManager($pdoMock);

        $recipeId = 1;
        $stepsArray = ['Étape 1', 'Étape 2', 'Étape 3'];

        $pdoMock->method('prepare')->willReturn($this->createMock('PDOStatement'));
        $pdoMock->method('execute')->willReturn(true);
        $pdoMock->method('fetch')->willReturn(['steps' => json_encode($stepsArray)]);

        ajouterEtapes($pdoMock, $recipeId, $stepsArray);

        $this->assertEquals($stepsArray, $stepsManager->getStepsByRecipeId($recipeId)->getSteps());
    }

}

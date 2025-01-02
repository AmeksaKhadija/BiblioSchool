
<?php 
require_once ('../controllers/categorieController.php');

$result = [];

if (isset($_GET['idcategorie'])) {
    $id = $_GET['idcategorie'];
    $result = $categorieController->getCategoryById($id);
}
?>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter contact</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method='POST' action="./editCategorie.php">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input class="form-control" type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($result['nom']); ?>" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class=" btn btn-dark">Save changes</button>
                        </div>
                        <div id="message" style="color: red;"></div>
                    </form>
                </div>
            </div>
        </div>
</div>
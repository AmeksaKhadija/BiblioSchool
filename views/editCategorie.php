
<?php 
require_once ('../controllers/categorieController.php');

$result = [];

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $result = $categorieController->getCategoryById($id);

    if (!$result) {
        echo "Catégorie introuvable.";
        exit();
    }
} else {
    echo "ID de catégorie invalide.";
    exit();
}

$nom = isset($result['nom']) ? htmlspecialchars($result['nom']) : '';

?>




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method='POST' action="./../Helpers/categorieHelpers.php">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input class="form-control" type="text" name="nom" id="nom" value="<?php echo $nom; ?>" required>
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($result['id']); ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submitEdit" class=" btn btn-dark">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
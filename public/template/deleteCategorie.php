<div class="modal fade" id="modalDeleteCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Supprimer categorie</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Voulez vous vraiment supprimer la categorie
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
            <form action='../controllers/adminSupprimer.php' method="post">
                <input type="hidden" name="CDid" id="CDid" value="">
                <button type="submit" class="btn btn-primary">Oui </button>
            </form>
        </div>
        </div>
    </div>
</div>
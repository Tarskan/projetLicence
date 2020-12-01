<div class="modal fade" id="modalAddCons" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un conseil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="../controllers/adminAjouter.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Ireference">Titre</label>
                            <input class="form-control" type="text" id="Ititre" name="CO-Atitre" >
                        </div>
                        <div class="form-group">
                            <label for="Ilibelle">Libelle</label>
                            <textarea class="form-control" rows="3" id="Ilibelle" name="CO-Alibelle"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Ivideo">Lien de la video</label>
                            <input class="form-control" type="text" id="Ivideo" name="CO-Avideo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                        <button type="submit" class="btn btn-primary">Oui </button>
                    </div>
                </form>
        </div>
    </div>
</div>
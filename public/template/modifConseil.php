<div class="modal fade" id="modalModifCons" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier un conseil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="../controllers/adminModifier.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="CO-Mid" id="id" value="">
                        <div class="form-group">
                            <label for="Ireference">Titre</label>
                            <input class="form-control" type="text" id="titre" name="CO-Mtitre" >
                        </div>
                        <div class="form-group">
                            <label for="llibelle">Libelle</label>
                            <textarea class="form-control" rows="3" id="libelle" name="CO-Mlibelle"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Ivideo">Lien de la video</label>
                            <input class="form-control" type="text" id="video" name="CO-Mvideo">
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
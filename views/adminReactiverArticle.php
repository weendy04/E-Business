<div class="modal fade" id="modal<?= $article['idArticle']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ré-activer Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment ré-activer l'article <?= $article['idArticle']?>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
		<form method="post" action="adminReactiverArticle">
            <input type="hidden" name="idArticle" value=<?=$article['idArticle']?>>
            <button class="btn btn-outline-success" type="submit">Ré-activer</button>
        </form>
      </div>
    </div>
  </div>
</div>

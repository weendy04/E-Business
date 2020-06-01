<?php
ob_start();
?>
<table class="table">
    <thead>
        <tr>
			<th scope="col">Apercu</th>
            <th scope="col">#</th>
            <th scope="col">Article</th>
            <th scope="col">Prix</th>
            <th scope="col">Description</th>
            <th scope="col">ImageArticle</th>
            <th scope="col">Action</th>
			<th style="text-align: right" scope="col"><a href="<?= ROOT_PATH.'formulaireArticle//ajouter'?>" class="btn btn-secondary">Ajouter Article</a></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($articles as $article):?>	
			<?php if ($article['isActive'] == 1):?>	
					<tr>
						<td><img src="/images/jeux/<?=$article['nomImageArticle']?>" alt="Card image cap" style="width: 10rem;"><td>
						<th scope="row"><?=$article['idArticle']?></th>
						<td><?=str_replace("-"," ", $article['nomArticle'])?></td>
						<td><?=$article['prixArticle']?></td>
						<td><?=str_replace("-"," ", $article['descriptionArticle'])?></td>
						<td><?=$article['nomImageArticle']?></td>
						<td>
							 <div class="row">
									
								<a href="<?= ROOT_PATH.'formulaireArticle/'.$article['idArticle'].'/modifier' ?>" class="btn btn-outline-success">Modifier</a>
										
								<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal<?=$article['idArticle']?>">
									Désactiver
								</button>
								<?php include 'adminDesactiverArticle.php' ?>
							</div>
						</td>
						<td>></td>
					</tr>
			<?php endif ?>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$title = 'Gestion des articles';
$content = ob_get_clean();
include 'includes/layout.php';
?>

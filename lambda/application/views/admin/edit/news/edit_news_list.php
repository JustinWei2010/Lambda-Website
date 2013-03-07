<?php foreach ($news as $news_item): ?>
	<div id="<?=$news_item['NID']?>" class="hentry">
		<div class="entry-meta">
			<div class="date"> <?= $news_item['DATE'] ?></div>
			<div class="location"><?= $news_item['LOCATION']?></div>
			<div class="edit">Edit</div>
			<div class="remove">Remove</div>
		</div>
		<div class="main">
			<h2 class="entry-title"><?= $news_item['TITLE'] ?></h2>  
			<div class="entry-content"><p><?= html_entity_decode($news_item['CONTENT']) ?></p></div>
		</div>
	
	</div>
<?php endforeach ?>

<?php foreach ($news as $news_item): ?>
	<div id="<?=$news_item['NID']?>" class="hentry">
		<div class="entry-meta">
			<div class="date"> <?= $news_item['DATE'] ?></div>
			<div class="location"><?= $news_item['LOCATION']?></div>
		</div>
		<div class="main">
			<h2 class="entry-title"><a href="news/<?=$news_item['NID']?>"><?= $news_item['TITLE'] ?></a></h2>  
			<div class="entry-content"><p><?= html_entity_decode($news_item['CONTENT']) ?></p></div>
		</div>
	
	</div>
<?php endforeach ?>
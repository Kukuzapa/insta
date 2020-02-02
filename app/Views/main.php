<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
	<div class="row">
		
		<div class="col-2"></div>
			
		<div class="col-8"><h1 class="text-center col-12">Привет, <?=$login?></h1></div>
		
		<div class="col-2 align-self-center">
			<a class="btn btn-primary btn-block" href="/logout" role="button">Выход</a>
		</div>
		
		<div class="col-6 text-center">
			<h4>Контакты</h4>
		</div>
		
		<div class="col-6 text-center">
			<h4>Избранное</h4>
		</div>
		
		<div class="col-6">
			<div class="row">
				<?php foreach ($contacts as $contact) : ?>
					<div class="col-12 mt-1">
						<div class="row">
							<div class="col-10"><?=$contact->contact_name?></div>
							
							<div class="col-2">
								<button type="button'" class="btn btn-primary btn-sm btn-block addF" data-id="<?=$contact->contact_id?>">--></button>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		
		<div class="col-6">
			<div class="row">
					<div class="col-12 mt-1">
						<div class="row" id="favourites">
							<?php foreach ($favourites as $favourite) : ?>
								<div class="col-12"><?=$favourite->contact_name?></div>
							<?php endforeach ?>
						</div>
					</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
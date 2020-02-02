<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
	
	<div class="row">
		<div class="col-3"></div>
		
		<div class="col-6">
			<div class="row">
				<div class="col-6">
					<a class="btn btn-primary btn-block" href="/login/auth" role="button">Вход</a>
				</div>
				<div class="col-6">
					<a class="btn btn-primary btn-block" href="/login/reg" role="button">Регистрация</a>
				</div>
			</div>
			
			<form method="post" action="/auth" id="authForm"  style="display: <?=($action!='reg')?'':'none'?>">
				<h4 class="text-center mt-3">Вход</h4>
				<div class="form-group">
					<label for="loginAuth">Логин</label>
					<input type="text" class="form-control" id="loginAuth" name="login">
				</div>
				<div class="form-group">
					<label for="passwordAuth">Пароль</label>
					<input type="password" class="form-control" id="passwordAuth" name="password">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php if (!empty($errA)): ?>
					<div class="alert alert-danger mt-3" role="alert">
						<?= $errA ?>
					</div>
				<?php endif ?>
			</form>
			
			<form method="post" action="/reg" id="regForm" style="display: <?=($action=='reg')?'':'none'?>">
				<h4 class="text-center mt-3">Регистрация</h4>
				<div class="form-group">
					<label for="loginReg">Логин</label>
					<input type="text" class="form-control" id="loginReg" name="login">
				</div>
				<div class="form-group">
					<label for="passwordReg">Пароль</label>
					<input type="password" class="form-control" id="passwordReg" name="password">
				</div>
				<div class="form-group">
					<label for="repassReg">Повтор пароля</label>
					<input type="password" class="form-control" id="repassReg" name="repass">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php if (!empty($errR)): ?>
					<div class="alert alert-danger mt-3" role="alert">
						<?= $errR ?>
					</div>
				<?php endif ?>
				<?php if (!empty($sucR)): ?>
					<div class="alert alert-success mt-3" role="alert">
						<?= $sucR ?>
					</div>
				<?php endif ?>
			</form>
		</div>
		<div class="col-3"></div>
	</div>
<?= $this->endSection() ?>
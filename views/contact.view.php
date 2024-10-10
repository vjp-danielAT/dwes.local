<?php include __DIR__ . '/partials/inicio-doc.part.php' ?>

<!-- Navigation Bar -->
<nav class="navbar navbar-fixed-top navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand page-scroll" href="#page-top">
				<span>[PHOTO]</span>
			</a>
		</div>
		<div class="collapse navbar-collapse navbar-right" id="menu">
			<ul class="nav navbar-nav">
				<li class=" lien"><a href="index.php"><i class="fa fa-home sr-icons"></i> Home</a></li>
				<li class="lien"><a href="about.php"><i class="fa fa-bookmark sr-icons"></i> About</a></li>
				<li class="lien"><a href="blog.php"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
				<li class="active"><a href="#"><i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
			</ul>
		</div>
	</div>
</nav>
<!-- End of Navigation Bar -->

<!-- Principal Content Start -->
<div id="contact">
	<div class="container">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<h1>CONTACT US</h1>
			<hr>
			<p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

			
			<?php if (!empty($errores)): ?>
				<div class="alert alert-danger">
					<ul>
						<?php foreach ($errores as $error): ?>
							<li><?php echo $error ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if (empty($errores) && isset($datos)): ?>
				<div class="alert alert-info">
					<ul>
						<?php foreach ($datos as $clave => $valor): ?>
							<?php if (!empty($valor)): ?>
								<li><?php echo $clave, ': ', $valor ?></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<form class="form-horizontal" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
				<div class="form-group">
					<div class="col-xs-6">
						<label class="label-control">First Name</label>
						<input class="form-control" type="text" id="nombre" name="nombre" value="<?php if (!empty($errores)) echo $nombre ?>">
					</div>
					<div class="col-xs-6">
						<label class="label-control">Last Name</label>
						<input class="form-control" type="text" id="apellido" name="apellido" value="<?php if (!empty($errores)) echo $apellido ?>">
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Email</label>
						<input class="form-control" type="text" id="correo" name="correo" value="<?php if (!empty($errores)) echo $correo ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Subject</label>
						<input class="form-control" type="text" id="asunto" name="asunto" value="<?php if (!empty($errores)) echo $asunto ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Message</label>
						<textarea class="form-control" id="mensaje" name="mensaje"><?php if (!empty($errores)) echo $mensaje ?></textarea>
						<button class="pull-right btn btn-lg sr-button">SEND</button>
					</div>
				</div>
			</form>
			<hr class="divider">
			<div class="address">
				<h3>GET IN TOUCH</h3>
				<hr>
				<p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
				<div class="ending text-center">
					<ul class="list-inline social-buttons">
						<li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
						</li>
					</ul>
					<ul class="list-inline contact">
						<li class="footer-number"><i class="fa fa-phone sr-icons"></i> (00228)92229954 </li>
						<li><i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com</li>
					</ul>
					<p>Photography Fanatic Template &copy; 2017</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Principal Content Start -->

<?php include __DIR__ . '/partials/fin-doc.part.php' ?>
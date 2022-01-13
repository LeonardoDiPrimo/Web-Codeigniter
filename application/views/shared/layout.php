<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tienda de Libros</title>

	<!-- Bootstrap -->
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css' rel="stylesheet"
		  integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	<!-- Grocery Crud css de las tablas -->
	<?php
	foreach ($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>"/>
	<?php endforeach; ?>

</head>
<body>
<header>
	<div class="container-fluid">
		<div class="bg-light">
			<!-- BARRA NAVEGACIÓN -->
			<nav class="navbar navbar-expand-md navbar-light bg-light border-3 border-bottom border-primary">
				<div class="container-fluid">
					<a class="navbar-brand" href='<?php echo base_url('/libro') ?>'>
						<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
							 class="bi bi-book-half" viewBox="0 0 16 16">
							<path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
						</svg>
						<small>Librería el Mago</small>
					</a>
					<button type="button"
							class="navbar-toggler"
							data-bs-toggle="collapse"
							data-bs-target="#MenuNavegacion">
						<span class="navbar-toggler-icon"></span>
					</button>
					<form class="d-flex input-group w-auto">
						<input
								type="search"
								class="form-control rounded"
								placeholder="Buscar..."
								aria-label="Search"
								aria-describedby="search-addon"
						/>
						<span class="input-group-text border-0" id="search-addon">
        					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
								 class="bi bi-search"
								 viewBox="0 0 16 16">
  								<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
							</svg>
      					</span>
					</form>
				</div>
				<div id="MenuNavegacion" class="collapse navbar-collapse">
					<ul class="navbar-nav ms-3">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
								Ventas
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href='<?php echo base_url('/cliente') ?>'>Clientes</a></li>
								<li><a class="dropdown-item" href='<?php echo base_url('/factura') ?>'>Facturas</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
								Consulta de Libreria
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href='<?php echo base_url('/libro') ?>'>Libros</a></li>
								<li><a class="dropdown-item" href='<?php echo base_url('/autor') ?>'>Autores</a></li>
								<li><a class="dropdown-item" href='<?php echo base_url('/editorial') ?>'>Editoriales</a>
								</li>
								<li><a class="dropdown-item" href='<?php echo base_url('/categoria') ?>'>Categorias</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</div>

		<?php
		$requestUrl = $_SERVER["REQUEST_URI"];
		$basename = basename($requestUrl);
		?>

		<!-- Genero el breadcrumb con la URL (El controlador valida que la ruta exista)-->
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb"
			 class="navbar navbar-expand-md navbar-light bg-light">
			<ol class="breadcrumb">
				<?php
				if ($basename == "cliente" || $basename == "factura")
					cargarBreadcrumb("/factura", "Ventas", false);
				else
					cargarBreadcrumb("/libro", "Consulta de Libreria", false);

				if ($basename == "libro")
					cargarBreadcrumb("/libro", "Libros", true);
				else if ($basename == "autor")
					cargarBreadcrumb("/autor", "Autores", true);
				else if ($basename == "editorial")
					cargarBreadcrumb("/editorial", "Editoriales", true);
				else if ($basename == "categoria")
					cargarBreadcrumb("/categoria", "Categorias", true);
				else if ($basename == "cliente")
					cargarBreadcrumb("/cliente", "Clientes", true);
				else if ($basename == "factura")
					cargarBreadcrumb("/factura", "Facturas", true);
				else
					cargarBreadcrumb("/libro", "Libros", true);
				?>
			</ol>
		</nav>

		<?php
		function cargarBreadcrumb($href, $name, $currentPage)
		{
			if ($currentPage) { ?>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $name ?></li>
				<?php
			} else { ?>
				<li class="breadcrumb-item"><a href='<?php echo base_url($href) ?>'><?php echo $name ?></a></li>
				<?php
			}
		}

		?>
</header>

<!-- Proporciona CSS y JS compilado -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
		crossorigin="anonymous"></script>

<div class="container-fluid">
	<!-- Genera los datos de las tablas -->
	<div class="row justify-content-center mt-4">
		<?php echo $output; ?>
	</div>
</div>

<!-- JavaScript de Grocery Crud -->
<?php foreach ($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script><?php endforeach; ?>

<footer class="bg-dark text-center text-white fixed-bottom">
	<div class="container p-4 pb-0">
		<section class="mb-4">
			<!-- Facebook -->
			<a class="text-white" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
					 class="bi bi-facebook"
					 viewBox="0 0 16 16">
					<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
				</svg>
			</a>

			<!-- Twitter -->
			<a class="text-white" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-twitter"
					 viewBox="0 0 16 16">
					<path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
				</svg>
			</a>

			<!-- Google -->
			<a class="text-white" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-google"
					 viewBox="0 0 16 16">
					<path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
				</svg>
			</a>

			<!-- Instagram -->
			<a class="text-white" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
					 class="bi bi-instagram"
					 viewBox="0 0 16 16">
					<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
				</svg>
			</a>

			<!-- Messenger -->
			<a class="text-white" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
					 class="bi bi-messenger"
					 viewBox="0 0 16 16">
					<path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"/>
				</svg>
			</a>

			<!-- Whatsapp -->
			<a class="text-white" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
					 class="bi bi-whatsapp"
					 viewBox="0 0 16 16">
					<path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
				</svg>
			</a>

			<!-- Envelope plus -->
			<a class="text-white" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
					 class="bi bi-envelope-plus" viewBox="0 0 16 16">
					<path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
					<path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>

				</svg>
			</a>
		</section>
	</div>

	<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
		© Librería el Mago
		<a class="text-white" href="#">www.LibreriaElMago.com</a>
	</div>
</footer>
</body>

</html>

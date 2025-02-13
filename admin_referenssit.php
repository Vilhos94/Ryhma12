<?php require("db_pdo.php");
session_start();
if (!isset($_SESSION['kayttajanimi']) || $_SESSION['rooli'] !== 'admin') {
	header("Location: login.php");
	exit();
} ?>

<!DOCTYPE html>
<html lang="fi">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Referenssit | Insinööritoimisto Koivu Oy</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Roboto font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900" rel="stylesheet">

	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
	<link rel="manifest" href="site.webmanifest">

	<link rel="stylesheet" href="henri.css">
	<link rel="stylesheet" href="ville.css">
	<link rel="stylesheet" href="nico.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

	<?php include './header_admin.php'; ?>

	<main class="container-lg py-5 px-md-5">
		<h2 class="mb-4">Referenssit</h2>

		<?php
		$sql = "SELECT * FROM koivu_referenssit";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$references = $stmt->fetchAll();

		foreach ($references as $key => $reference) {
			$id = $reference["id"];
			?>
			<section>
				<form id="form<?= $id ?>">
					<div class="row">
						<input class="d-none" name="id" value="<?= $id ?>">
						<div class="col-md roboto">
							<h3 id="postTitle<?= $id ?>" class="mb-2"><?= $reference["otsikko"] ?></h3>
							<input id="postTitleEdit<?= $id ?>" type="text" name="otsikko"
								value="<?= $reference["otsikko"] ?>" class="h3-edit mb-2 form-control d-none">
							<p id="postText<?= $id ?>" class="mb-2"><?= $reference["teksti"] ?></p>
							<textarea id="postTextEdit<?= $id ?>" name="teksti" class="form-control mb-2 d-none"
								rows="7"><?= $reference["teksti"] ?></textarea>
						</div>
						<div class="col-md">
							<input id="postImgEdit<?= $id ?>" type="text" class="form-control d-none mb-2" name="kuva"
								placeholder="Kuvan URL" value="<?= $reference["kuva"] ?>">
							<img id="postImg<?= $id ?>" src="<?= $reference["kuva"] ?>" class="img-fluid"
								alt="referenssikuva">
						</div>
					</div>
					<div>
						<div id="btnEdit<?= $id ?>" class="btn btn-primary mt-2" onClick="startEditPost(<?= $id ?>)">Muokkaa
							<i class="bi bi-pencil"></i>
						</div>
						<div id="btnSave<?= $id ?>" class="btn btn-success mt-2 d-none" onClick="saveEditPost(<?= $id ?>)">
							Tallenna
							muutokset <i class="bi bi-check-circle"></i></i>
						</div>
						<div id="btnUndo<?= $id ?>" class="btn btn-secondary mt-2 d-none"
							onClick="undoEditPost(<?= $id ?>)">
							Peru
							muutokset <i class="bi bi-reply"></i></i>
						</div>
						<div id="btnDelete<?= $id ?>" class="btn btn-danger mt-2" onClick="deletePost(<?= $id ?>)">Poista <i
								class=" bi bi-trash">
							</i></div>
					</div>
				</form>
				<hr>
			</section><?php }
		?>

		<form id="formNew" class="d-none">
			<div class="row">
				<div class="col-md roboto">
					<input id="postTitleEditNew" type="text" name="otsikko" placeholder="Otsikko"
						class="h3-edit mb-2 form-control">
					<textarea id="postTextEditNew" name="teksti" class="form-control mb-2" rows="7"
						placeholder="Kuvaus referenssistä"></textarea>
				</div>
				<div class="col-md">
					<input id="postImgEditNew" type="text" class="form-control mb-2" placeholder="Kuvan URL"
						name="kuva">
				</div>
			</div>
			<div>
				<div id="btnCreate" class="btn btn-success mt-2" onClick="saveCreatePost()">
					Tallenna
					muutokset <i class="bi bi-check-circle"></i></i>
				</div>
				<div id="btnUndoCreate" class="btn btn-secondary mt-2" onClick="undoCreatePost()">
					Peru
					lisäys <i class="bi bi-reply"></i></i>
				</div>
			</div>
		</form>

		<section>
			<div class="btn btn-success mt-2" onClick="startCreatePost()">Luo uusi referenssi <i
					class="bi bi-plus-square"></i></i>
			</div>
		</section>
	</main>

	<?php include 'footer.php'; ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<script>

		function startEditPost(id) {
			// Hide title, display title editor
			const postTitleElement = document.getElementById("postTitle" + id);
			postTitleElement.classList.add("d-none");
			const postTitleEditElement = document.getElementById("postTitleEdit" + id);
			postTitleEditElement.classList.remove("d-none");

			// Hide text, display text editor
			const postTextElement = document.getElementById("postText" + id);
			postTextElement.classList.add("d-none");
			const postTextEditElement = document.getElementById("postTextEdit" + id);
			postTextEditElement.classList.remove("d-none");

			// Hide edit, display save and undo
			const btnEdit = document.getElementById("btnEdit" + id);
			btnEdit.classList.add("d-none");
			const btnSave = document.getElementById("btnSave" + id);
			btnSave.classList.remove("d-none");
			const btnUndo = document.getElementById("btnUndo" + id);
			btnUndo.classList.remove("d-none");

			// Display image editor
			const imgEditElement = document.getElementById("postImgEdit" + id);
			imgEditElement.classList.remove("d-none");

			// Copy title to titleEditor, copy text to textEditor, copy img url to image editor
			postTitleEditElement.value = postTitleElement.innerText;
			postTextEditElement.value = postTextElement.innerText;
			const imgElement = document.getElementById("postImg" + id);
			imgEditElement.value = imgElement.getAttribute("src");
		}

		function undoEditPost(id) {
			// Hide title editor, display title
			const postTitleElement = document.getElementById("postTitle" + id);
			postTitleElement.classList.remove("d-none");
			const postTitleEditElement = document.getElementById("postTitleEdit" + id);
			postTitleEditElement.classList.add("d-none");

			// Hide text editor, display text
			const postTextElement = document.getElementById("postText" + id);
			postTextElement.classList.remove("d-none");
			const postTextEditElement = document.getElementById("postTextEdit" + id);
			postTextEditElement.classList.add("d-none");

			// Hide save and undo, display edit
			const btnEdit = document.getElementById("btnEdit" + id);
			btnEdit.classList.remove("d-none");
			const btnSave = document.getElementById("btnSave" + id);
			btnSave.classList.add("d-none");
			const btnUndo = document.getElementById("btnUndo" + id);
			btnUndo.classList.add("d-none");

			// Hide image editor
			const imgEditElement = document.getElementById("postImgEdit" + id);
			imgEditElement.classList.add("d-none");
		}

		function startCreatePost() {
			// Display new post editor
			let postFormElement = document.getElementById("formNew");
			postFormElement.classList.remove("d-none");
		}

		function undoCreatePost() {
			// Reset post editor
			let postTitleEditElement = document.getElementById("postTitleEditNew");
			postTitleEditElement.value = "";
			let postTextEditElement = document.getElementById("postTextEditNew");
			postTextEditElement.value = "";
			let postImgEditElement = document.getElementById("postImgEditNew");
			postImgEditElement.value = "";

			// Hide new post editor
			let postFormElement = document.getElementById("formNew");
			postFormElement.classList.add("d-none");
		}

		async function saveCreatePost() {
			let formData = new FormData(document.getElementById("formNew"));

			try {
				let response = await fetch("create_reference.php", {
					method: "POST",
					body: formData,
					credentials: "same-origin"
				});

				if (response.status == 200) {
					location.reload();
				}
			} catch (error) {
				console.error(error);
			}
		}

		async function saveEditPost(id) {
			// Hide title editor, display title
			const postTitleElement = document.getElementById("postTitle" + id);
			postTitleElement.classList.remove("d-none");
			const postTitleEditElement = document.getElementById("postTitleEdit" + id);
			postTitleEditElement.classList.add("d-none");

			// Hide text editor, display text
			const postTextElement = document.getElementById("postText" + id);
			postTextElement.classList.remove("d-none");
			const postTextEditElement = document.getElementById("postTextEdit" + id);
			postTextEditElement.classList.add("d-none");

			// Hide save and undo, display edit
			const btnEdit = document.getElementById("btnEdit" + id);
			btnEdit.classList.remove("d-none");
			const btnSave = document.getElementById("btnSave" + id);
			btnSave.classList.add("d-none");
			const btnUndo = document.getElementById("btnUndo" + id);
			btnUndo.classList.add("d-none");

			// Hide image editor
			const imgEditElement = document.getElementById("postImgEdit" + id);
			const imgElement = document.getElementById("postImg" + id);
			imgEditElement.classList.add("d-none");

			// Save
			let formData = new FormData(document.getElementById("form" + id));

			try {
				let response = await fetch("edit_reference.php", {
					method: "POST",
					body: formData,
					credentials: "same-origin"
				});

				if (response.status == 200) {
					location.reload();
				}
			} catch (error) {
				console.error(error);
			}
		}

		async function deletePost(id) {
			let title = document.getElementById("postTitle" + id).innerText;
			if (!confirm("Haluatko varmasti poistaa referenssin '" + title + "'")) {
				return;
			}

			let formData = new FormData(document.getElementById("form" + id));

			try {
				let response = await fetch("delete_reference.php", {
					method: "POST",
					body: formData,
					credentials: "same-origin"
				});

				let result = await response.text;
				console.log(result);

				if (response.status == 200) {
					location.reload();
				}
			} catch (error) {
				console.error(error);
			}
		}
	</script>
</body>

</html>
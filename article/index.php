<?php
$id = $_GET['id'];
$conn = new mysqli("localhost", "root", "", "presmun");

try{
    
$stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
$stmt->bind_param('d', $id);
$stmt->execute();
$result = $stmt->get_result();
$results = $result->fetch_all();
$title = $results[0][1];
$content = $results[0][2];
$img = $results[0][3];

if(!$results) {
    header("location: /");
    die();
    
}
}


catch(Exception $e){
    header("Location: /");
}

function truncateText($text, $limit = 100, $suffix = '...') {
  if (mb_strlen($text) <= $limit) {
    return $text;
  } else {
    $truncatedText = mb_substr($text, 0, $limit);
    $lastSpace = mb_strrpos($truncatedText, ' ');
    $truncatedText = mb_substr($truncatedText, 0, $lastSpace);
    $truncatedText .= $suffix;
    return $truncatedText;
  }
}
$truncate = truncateText($content, 200);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>PresMUN</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" />
		<link href="../css/style.css" rel="stylesheet" />
		<link href="../css/bootstrap.min.css" rel="stylesheet" />
		<meta http-equiv="Cache-control" content="public">
		<meta property="og:url" content="https://presmun.com<?=$img;?>" />
		<meta property="og:title" content="PRESMUN 2023 | <?= $title; ?>" />
		<meta property="og:description" content="<?= htmlspecialchars($truncate); ?>" />
		<meta property="og:image" content="https://presmun.com<?=$img;?>" />
	</head>
	<body>
		<main>
			<nav id="headers" class="navbar navbar-expand-lg navbar-dark fixed-top">
				<div class="container">
					<div class="row">
						<div id="brand" class="col-3">
						    <a href="/">
							<img id="logo" class="img-responsive" src="../img/logo.png" height=100 />
							</a>
						</div>
						<div class="col py-4 text-white text-sm px-4">
							<div>PRESIDENT INTERNATIONAL</div>
							<div>MODEL UNITED NATIONS 2024</div>
						</div>
					</div>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ms-auto"></ul>
					</div>
				</div>
			</nav>
			<div class="py-5">&nbsp;</div>
			<section id="article" class="py-3 text-white bg-dark" >
				<div class="container mb-5">
						<p class="h1"><?= $title; ?></p>
						<p class="h3"><img src="<?= $img; ?>" class="w-100" alt="<?=$title;?>"></p>
						<?php foreach(explode("\n", $content) as $text)
						{   
                            $pattern = '/!\[([^]]+)\]\(([^)]+)\)/';
                            preg_match($pattern, $text, $matches);
                            if(count($matches) == 3){
						    ?>
						    <p><img src="<?=$matches[2];?>" alt="<?=$matches[1];?>" class="w-100"></p>
						    <?php
                            }
                            else{
                                
                                if(strpos($text, "**") !== false)
                                {
                                    $text = substr($text, 2);
                                    $text = "<b>".$text;
                                    $text = str_replace("**", "</b>", $text);
                                    
                                }
                                
                                ?>
                                
						    <p class="h3"><?=$text;?>&nbsp;</p>
                                <?php
                            }
						}
						?>
			</section>
			<section id="footer" class="text-white">
				<div class="container">
					<footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5">
						<div class="col mb-3">
							<a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
								<img src="../img/logo.png" height="150" />
							</a>
							<p>© DATA MASTER 2023</p>
						</div>
						<div class="col"></div>
						<div class="col"></div>
						<div class="col"></div>
						<div class="col py-5">
							<h5>CONNECT WITH US</h5>
							<ul class="nav flex-column">
								<li class="nav-item mb-2">
									<a href="https://wa.me/+6285243218570" class="text-decoration-none text-white">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
											<path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
										</svg> M. Ayub Bashir Rahail </a>
								</li>
								<li class="nav-item mb-2">
									<a href="#" class="nav-link p-0 text-body-secondary">
										<a href="#" class="text-white text-decoration-none">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-line" viewBox="0 0 16 16">
												<path d="M8 0c4.411 0 8 2.912 8 6.492 0 1.433-.555 2.723-1.715 3.994-1.678 1.932-5.431 4.285-6.285 4.645-.83.35-.734-.197-.696-.413l.003-.018.114-.685c.027-.204.055-.521-.026-.723-.09-.223-.444-.339-.704-.395C2.846 12.39 0 9.701 0 6.492 0 2.912 3.59 0 8 0ZM5.022 7.686H3.497V4.918a.156.156 0 0 0-.155-.156H2.78a.156.156 0 0 0-.156.156v3.486c0 .041.017.08.044.107v.001l.002.002.002.002a.154.154 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157Zm.791-2.924a.156.156 0 0 0-.156.156v3.486c0 .086.07.155.156.155h.562c.086 0 .155-.07.155-.155V4.918a.156.156 0 0 0-.155-.156h-.562Zm3.863 0a.156.156 0 0 0-.156.156v2.07L7.923 4.832a.17.17 0 0 0-.013-.015v-.001a.139.139 0 0 0-.01-.01l-.003-.003a.092.092 0 0 0-.011-.009h-.001L7.88 4.79l-.003-.002a.029.029 0 0 0-.005-.003l-.008-.005h-.002l-.003-.002-.01-.004-.004-.002a.093.093 0 0 0-.01-.003h-.002l-.003-.001-.009-.002h-.006l-.003-.001h-.004l-.002-.001h-.574a.156.156 0 0 0-.156.155v3.486c0 .086.07.155.156.155h.56c.087 0 .157-.07.157-.155v-2.07l1.6 2.16a.154.154 0 0 0 .039.038l.001.001.01.006.004.002a.066.066 0 0 0 .008.004l.007.003.005.002a.168.168 0 0 0 .01.003h.003a.155.155 0 0 0 .04.006h.56c.087 0 .157-.07.157-.155V4.918a.156.156 0 0 0-.156-.156h-.561Zm3.815.717v-.56a.156.156 0 0 0-.155-.157h-2.242a.155.155 0 0 0-.108.044h-.001l-.001.002-.002.003a.155.155 0 0 0-.044.107v3.486c0 .041.017.08.044.107l.002.003.002.002a.155.155 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156Z"></path>
											</svg> nbilas13 </a>
									</a>
								</li>
								<li class="nav-item mb-2">
									<a href="#" class="nav-link p-0 text-body-secondary">
										<a href="#" class="text-white text-decoration-none">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-line" viewBox="0 0 16 16">
												<path d="M8 0c4.411 0 8 2.912 8 6.492 0 1.433-.555 2.723-1.715 3.994-1.678 1.932-5.431 4.285-6.285 4.645-.83.35-.734-.197-.696-.413l.003-.018.114-.685c.027-.204.055-.521-.026-.723-.09-.223-.444-.339-.704-.395C2.846 12.39 0 9.701 0 6.492 0 2.912 3.59 0 8 0ZM5.022 7.686H3.497V4.918a.156.156 0 0 0-.155-.156H2.78a.156.156 0 0 0-.156.156v3.486c0 .041.017.08.044.107v.001l.002.002.002.002a.154.154 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157Zm.791-2.924a.156.156 0 0 0-.156.156v3.486c0 .086.07.155.156.155h.562c.086 0 .155-.07.155-.155V4.918a.156.156 0 0 0-.155-.156h-.562Zm3.863 0a.156.156 0 0 0-.156.156v2.07L7.923 4.832a.17.17 0 0 0-.013-.015v-.001a.139.139 0 0 0-.01-.01l-.003-.003a.092.092 0 0 0-.011-.009h-.001L7.88 4.79l-.003-.002a.029.029 0 0 0-.005-.003l-.008-.005h-.002l-.003-.002-.01-.004-.004-.002a.093.093 0 0 0-.01-.003h-.002l-.003-.001-.009-.002h-.006l-.003-.001h-.004l-.002-.001h-.574a.156.156 0 0 0-.156.155v3.486c0 .086.07.155.156.155h.56c.087 0 .157-.07.157-.155v-2.07l1.6 2.16a.154.154 0 0 0 .039.038l.001.001.01.006.004.002a.066.066 0 0 0 .008.004l.007.003.005.002a.168.168 0 0 0 .01.003h.003a.155.155 0 0 0 .04.006h.56c.087 0 .157-.07.157-.155V4.918a.156.156 0 0 0-.156-.156h-.561Zm3.815.717v-.56a.156.156 0 0 0-.155-.157h-2.242a.155.155 0 0 0-.108.044h-.001l-.001.002-.002.003a.155.155 0 0 0-.044.107v3.486c0 .041.017.08.044.107l.002.003.002.002a.155.155 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156Z"></path>
											</svg> Official LINE @ghu3650+ </a>
									</a>
								</li>
								<li class="nav-item mb-2">
									<a href="#" class="nav-link p-0 text-body-secondary">
										<a href="https://www.instagram.com/presidentmodelun" class="text-decoration-none text-white">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
												<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
											</svg> OFFICIAL INSTAGRAM </a>
									</a>
								</li>
							</ul>
						</div>
					</footer>
				</div>
			</section>
		</main>
		<script src="../js/bootstrap.bundle.min.js"></script>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/main.js"></script>
	</body>
</html>
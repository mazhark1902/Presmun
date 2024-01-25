		<?php
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


		$conn = new mysqli("localhost", "root", "", "presmun");

		$q = "SELECT * FROM articles";
		$data = $conn->query($q);


		$articles = $data->fetch_all();


		?>


		<!DOCTYPE html>
		<html lang="en" data-bs-theme="dark">
			<head>
				<meta charset="utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1" />
				<title>PresMUN</title>
				<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" />
				<link href="css/style.css" rel="stylesheet" />
				<link href="css/bootstrap.min.css" rel="stylesheet" />
				<link rel="stylesheet" href="style.css">
				<meta http-equiv="Cache-control" content="public">
				<meta property="og:url" content="https://presmun.com" />
				<meta property="og:title" content="PRESMUN 2024" />
				<meta property="og:description" content="PresMUN itself is an annual MUN conference co-hosted by President University Model United Nations (PUMUN). PresMUN has achieved a certain reputation and is often deemed as one of the most prestigious MUN conferences in Indonesia despite its young age." />
				<meta property="og:image" content="https://presmun.com/img/banner-1.jpg" />
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
				
				<style>
				.card-img-top-box {
					height: 300px;  /* Tinggi yang Anda inginkan */
					object-fit: cover;  /* Ini akan memotong gambar jika perlu */
					object-position: top; /* Atau 'top', 'left', 'right', atau koordinat seperti '50% 50%' */
				}
				
				</style>
			</head>
			<body>
				<main id="main" >
<nav class="navbar bg-primary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/logo.png" alt="Logo" width="30" height="" class="d-inline-block align-text-top">
	  PRESIDENT INTERNATIONAL MODEL UNITED NATIONS 2024
    </a>
  </div>
</nav>
					<section id="carousel">
						<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/banner-1.jpg" class="d-block w-100" alt="..." />
								</div>
								<div class="carousel-caption py-0 mt-3" >
									<a href="#" class="py-4" >
										<button class="btn btn-warning">REGISTER NOW</button>
									</a>
								</div>
							</div>
						</div>
					</section>


					<section id="history" class="py-4 text-light bg-dark">
						<div class="container">
							<p class="h1">History</p>
							<hr class="featurette-divider" style="opacity: 0.5 !important"/>
							<div class="row featurette">
								<div class="col-md-7">
									<h2 class="featurette-heading fw-normal h1-1">Since 2012</h2>
									<p class="p"> President Model United Nations (PresMUN) 2023 is the tenth season of PresMUN in its Secretariat service. PresMUN itself is an annual MUN conference co-hosted by President University Model United Nations (PresUniv MUN). Its first installment was done in 2012 and ever since has received high enthusiasm and eager anticipation from local and international audiences. </p>
								</div>
								<div class="col-md-5">
									<img src="img/2012.jpg" class="w-100" />
								</div>
							</div>
							<hr class="featurette-divider" style="opacity: 0.5 !important"/>
							<div class="row featurette">
								<div class="col-md-7 order-md-2">
									<h2 class="featurette-heading fw-normal h1-1">Encourage</h2>
									<p class="p"> PresMUN has achieved a certain reputation at the national level and is often deemed one of the most prestigious MUN conferences in Indonesia despite its young age. This year, PresMUN 2o21 aims to be a vessel upon which a group of young thinkers could pour their ideas and learn how to shape this world into a better place. </p>
								</div>
								<div class="col-md-5 order-md-1">
									<img src="img/2012-1.jpg" class="w-100" />
								</div>
							</div>
						</div>
					</section>


					
					<section id="article" class="py-3 text-white" >
						<div class="container mb-5">
								<p class="h1">Article's</p>
								<?php foreach($articles as $index => $article)
								{
									$truncatedText = truncateText($article[2], 200);
									if(strpos($truncatedText, "**") !== false)
										{
											$truncatedText = explode("**", $truncatedText);
											$truncatedText = $truncatedText[0]."<b>".$truncatedText[1]."</b>".$truncatedText[2];
											
										}
									?>
							<hr class="featurette-divider" style="opacity: 100 !important"/>
							<div class="row featurette d-flex">
								<div class="col-md-7 <?= $article[0] % 2 == 0 ? "order-md-2" : ""; ?>">
									<h2 class="featurette-heading fw-normal h1-1"><?= $article[1];?></h2>
									<p class="h5"><?= $truncatedText . '<a href="article/'.$article[0].'">Read more</a>'; ?></p>
								</div>
								<div class="col-md-5">
									<img src="<?=$article[3];?>" class="w-100" />
								</div>
							</div>
									<?php
								}
								?>
						</div>
					</section>


					<section id="vision" class="text-white py-4 text-center bg-dark">
						<div class="container">

							<h1>VISION</h1>
							<div class="row justify-content-center">
							<div class="col-md-5 col-lg-3">
								<div class="card text-white border-0 align-items-center bg-dark">
									<img src="img/mortarboard.svg" class="card-img-top w-25 svg-white" />
									<div class="card-body">
										<p class="card-text"> To bring forward greater awareness of potential future leaders for crucial international issues and how such issues are handled. </p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<h1>MISSION</h1>
							<div class="col-md-4 col-lg-4">
								<div class="card text-white border-0 align-items-center bg-dark">
									<img src="img/globe.svg" class="card-img-top w-25 svg-white" />
									<div class="card-body">
										<p class="card-text"> Creating an atmosphere that is substantially supportive of the learning process for all participating delegates. </p>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-lg-4">
								<div class="card text-white border-0 align-items-center bg-dark">
									<img src="img/hand-thumbs-up.svg" class="card-img-top w-25 svg-white" />
									<div class="card-body">
										<p class="card-text"> Providing the best service possible to thec participating delegates through professional manner and amiable presence that President Model United Nations (PresMUN) has always been attributed to. </p>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-lg-4">
								<div class="card text-white border-0 align-items-center bg-dark">
									<img src="img/people.svg" class="card-img-top w-25 svg-white" />
									<div class="card-body">
										<p class="card-text"> Building strong partnerships with several external parties which shall unsure mutual benefit upon continuous, long-lasting fashion. </p>
									</div>
								</div>
							</div>
						</div>
					</div>
					</section>

								
	<section id="secretariat" class="p-4 text-white">
    <div class="container">
        <!-- Header -->
        <div class="text-center mb-4">
            <h1>Secretariat</h1>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Board Of Director</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			<section id="secretariat" class="p-4 text-white">
    	<div class="container">
        <!-- Header -->
        <div class="text-center mb-4">
            <h4>Data Master</h4>
        </div>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <!-- Carousel Item 1 -->
                <div class="carousel-item active">
                    <div class="d-flex justify-content-around">
                        <!-- Cardbox 1 -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top-box" src="img/Kiemme Sarah Foutoula Koroh.jpg" alt="Card image cap">
                            <div class="card-body text-center">
								<h5 class="card-title">Data Master</h5>
                                <p class="card-text">Muhammad Azhar K</p>
                            </div>
                        </div>
                        <!-- Cardbox 2 -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top-box" src="img/Andika Alvianus Haganta Meliala.jpg" alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">Secretariat</h5>
                                <p class="card-text">Data Masters</p>
                            </div>
                        </div>
                        <!-- Cardbox 3 -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top-box" src="img/Azhar.jpg" alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">Secretariat</h5>
                                <p class="card-text">Data Masters</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item 2 -->
                <div class="carousel-item">
                    <div class="d-flex justify-content-around">
                        <!-- Cardbox 4 -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top-box" src="img/Azhar.jpg" alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">Secretariat</h5>
                                <p class="card-text">Data Masters</p>
                            </div>
                        </div>
                        <!-- Cardbox 5 -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top-box" src="img/Azhar.jpg" alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">Secretariat</h5>
                                <p class="card-text">Data Masters</p>
                            </div>
                        </div>
                        <!-- Cardbox 6 -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top-box" src="img/Azhar.jpg" alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">Secretariat</h5>
                                <p class="card-text">Data Masters</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>	
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			<section id="secretariat" class="p-4 text-white">
    	<div class="container">
        <!-- Header -->
        <div class="text-center mb-4">
            <h4>Data Master</h4>
        </div>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <!-- Carousel Item 1 -->
                <div class="carousel-item active">
                    <div class="d-flex justify-content-around">
                        <!-- Cardbox 1 -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top-box" src="img/Kiemme Sarah Foutoula Koroh.jpg" alt="Card image cap">
                            <div class="card-body text-center">
								<h5 class="card-title">Data Master</h5>
                                <p class="card-text">Muhammad Azhar K</p>
                            </div>
                        </div>
                        <!-- Cardbox 2 -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top-box" src="img/Andika Alvianus Haganta Meliala.jpg" alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">Secretariat</h5>
                                <p class="card-text">Data Masters</p>
                            </div>
                        </div>
                        <!-- Cardbox 3 -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top-box" src="img/Azhar.jpg" alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">Secretariat</h5>
                                <p class="card-text">Data Masters</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item 2 -->
                <div class="carousel-item">
                    <div class="d-flex justify-content-around">
                        <!-- Cardbox 4 -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top-box" src="img/Azhar.jpg" alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">Secretariat</h5>
                                <p class="card-text">Data Masters</p>
                            </div>
                        </div>
                        <!-- Cardbox 5 -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top-box" src="img/Azhar.jpg" alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">Secretariat</h5>
                                <p class="card-text">Data Masters</p>
                            </div>
                        </div>
                        <!-- Cardbox 6 -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top-box" src="img/Azhar.jpg" alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">Secretariat</h5>
                                <p class="card-text">Data Masters</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>	
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

			</div>
        </div>


        
    </div>
</section>








					<section class="bg-dark p-4 text-white">
						<div class="container">
							<h1 class="text-center">Gossip Box</h1>
							<div class="container">
								<div class="d-flex justify-content-center">
									<button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#addNew">ADD NEW</button>
								</div>
								<div class="row py-3 justify-content-center" id="gossip"></div>
					</section>

					
					<section id="footer" class="text-white">
						<div class="container">
							<footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5">
								<div class="col mb-3">
									<a href="" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
										<img src="img/logo.png" height="150"	 />
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
			<div id="addNew" class="modal fade">
			<div class="modal-dialog bg-dark rounded rounded-5">
				<div class="modal-content bg-dark border-5 border-light rounded rounded-5">
				<div class="modal-header bg-dark rounded rounded-5">
					<h5 class="modal-title">ADD NEW GOSSIP</h5>
				</div>
				<div class="modal-body bg-dark rounded rounded-5">
					<div id="loadingA" class="d-none">
						<div class="spinner-border" role="status">
							<span class="sr-only"></span>
							</div>
					</div>
						
					<div class="form-group py-1">
					<label for="name">From:</label>
					<input type="text" class="form-control bg-dark" id="from" placeholder="Anon">
					</div>
					<div class="form-group  py-1">
					<label for="to">To:</label>
					<input type="text" class="form-control bg-dark" id="to" placeholder="XXX">
					</div>
					<div class="form-group  py-1">
					<label for="message">Message:</label>
					<textarea  class="form-control no-resize bg-dark" id="message"></textarea>
					</div>
					<div class="py-3">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCEL</button>
					<button type="button" class="btn btn-warning" id="submitGossip">SUBMIT</button>
					</div>
				</div>
				
				</div>
			</div>
			</div>
			<div id="modalGosip" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content border border-5 border-light rounded rounded-5">
				<div class="modal-body bg-dark border-5 border-light rounded rounded-5">
				<div>
					<p class="h5" id="toContent"></p>
					<p class="h5" id="fromContent"></p>
					<p class="h4" id="messageContent"></p>
					<div id="containerGossip" class="d-none">
						<p class="h5">&nbsp;</p>
						<p class="h5">Reply</p>
					<div id="replyan" class="border p-3 rounded rounded-3">
					</div>
					<p class="h5">&nbsp;</p>
					</div>
					<div class="form-group py-1">
						<label for="name">From:</label>
						<input type="text" class="form-control bg-dark" id="fromR" placeholder="Anon">
					</div>
					<div class="form-group  py-1">
						<label for="to">To:</label>
						<input type="text" class="form-control bg-dark" id="toR" placeholder="XXX">
					</div>
					<div class="form-group  py-1">
						<label for="message">Message:</label>
						<textarea  class="form-control no-resize bg-dark" id="messageR"></textarea>
					</div>
						<input type="hidden" class="form-control bg-dark" id="idR">

					<div class="py-3">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCEL</button>
						<button type="button" class="btn btn-warning" id="replyGossip">REPLY</button>
					</div>

				</div>
			</div>
			</div>
			
				<div class="py-50 h-100 d-flex align-items-center justify-content-center" id="spinner">
					<div class="spinner-border text-dark" role="status" id="spin"></div>
				</div>
				<script src="js/bootstrap.bundle.min.js"></script>
				<script src="js/jquery.min.js"></script>
				<script src="js/main.js"></script>
				<script>
				let gosip = [];

			$(document).ready(function() {
				const urlParams = new URLSearchParams(window.location.search);
				var $dialog  = $(this).find(".modal-dialog"),
				offset       = ($(window).height() - $dialog.height()) / 4,
				bottomMargin = parseInt($dialog.css('marginBottom'), 10);

				// Make sure you don't hide the top part of the modal w/ a negative margin if it's longer than the screen height, and keep the margin equal to the bottom margin of the modal
				if(offset < bottomMargin) offset = bottomMargin;
				$dialog.css("margin-top", offset);
						$.ajax({
							url: 'getsecre.php',
							type: 'GET',
							success: function(result) {
								appendData(result)
							}
						})
				$.ajax({
							url: 'gossip.php',
							type: 'GET',
							success: function(result) {
					result.forEach(function(gossip, i)
					{
						danger = ""
						if (i == 27)
						{
							danger = "bg-danger "
						}
					gosip[i] = gossip
					html = `							<div class="col rounded rounded-4 ${danger}border border-light d-flex m-3">
										<div class="p-3">
											<p class="h4">From: ${gossip[1]}</p>
											<p class="h4">To: ${gossip[2]}</p>
											<p class="h2 fw-bold">
												<button class="btn btn-warning btn-lg" onclick="show(${i})">View Message</button>
							</p>
							</div>
							</div>`
							$("#gossip").append(html)
						})
						}
						}).then(() => {

				const queryGossip = urlParams.get('gossip');
				if(queryGossip == null) {
					$("#main").css("display", "block")
					return;
				}
				show(queryGossip-1)
						})
						const btnR = document.getElementById("replyGossip");
						const btn = document.getElementById("submitGossip");
						btnR.addEventListener("click", function()
					{
						btn.disabled = true;
						
							document.getElementById("loadingA").classList.remove("d-none");
						
						const from = document.getElementById("fromR").value
						const to = document.getElementById("toR").value
						const message = document.getElementById("messageR").value
						const id = +document.getElementById("idR").value + 1
						data = {
						from: from,
						to: to,
						message: message,
						reply: id,
						}
						$.ajax({
						url: 'gossip.php',
						type: 'POST',
						contentType: 'application/json',
						data: JSON.stringify(data),
						success: function(result) {
							result = result
							if(result.success == false){
								
								alert("Error");
							btn.disabled = false;
							document.getElementById("loadingA").classList.add("d-none");
								
							}
							else window.location.href = "?gossip="+id;
						}
						})
					})
					btn.addEventListener("click", function()
					{
						btn.disabled = true;
						
							document.getElementById("loadingA").classList.remove("d-none");
						
						const from = document.getElementById("from").value
						const to = document.getElementById("to").value
						const message = document.getElementById("message").value
						data = {
						from: from,
						to: to,
						message: message
						}
						$.ajax({
						url: 'gossip.php',
						type: 'POST',
						contentType: 'application/json',
						data: JSON.stringify(data),
						success: function(result) {
							result = result
							if(result.success == false){
								
								alert("Error");
							btn.disabled = false;
							document.getElementById("loadingA").classList.add("d-none");
								
							}
							else window.location.href = "?gossip="+result.id;
						}
						})
					})
					})
			function show(id)
			{
				$("#idR").val(id);
				$("#toContent").html("From: " + gosip[id][1])
				$("#fromContent").html("To: " + gosip[id][2])
				$("#messageContent").html( gosip[id][3])
				$("#messageContent").html( gosip[id][3])
				$("#modalGosip").modal("show")
				$("#containerGossip").addClass("d-none")
				$("#replyan").html('');
				if(gosip[id]['child'])
				{
					$("#containerGossip").removeClass("d-none")

				gosip[id]['child'].forEach(function (e){
					html = `
						<div class="border p-3 my-2 rounded rounded-3">
							<h6>From: ${e[1]}</h6>
							<h6>To: ${e[2]}</h6>
							<h6>&nbsp;</h6>
							<h6>${e[3]}</h6>
						</div>`
					$("#replyan").append(html)
				})	
				}
			}
					async function appendData(img) {
						x = 0;
						for (let start = 1; start <= Object.keys(img).length; start++) {
							let html = ''
							html += `
						
						
							
								<div class="carousel-item${start == 1 ? " active" :""}">
									<h3 class="text-center">${img[start].d_name}</h3>
									<div class="row" >`;
							for (let x = 0; x < Object.keys(img[start]['data']).length; x++) {
								await $.ajax({
									url: img[start]['data'][x].img,
									type: 'GET',
									headers: {
										'Cache-Control': 'max-age=31536000'
									}
								});
								html += `
								
								
									
										<div class="col-md-6 col-lg-3 p-4">
											<div class="card border-4 bg-black text-white">
												<img
										src="${img[start]['data'][x].img}"
										alt=""
										class="card-img-top img-secretariat w-100"
										/>
												<div class="card-title text-center">
													<p class="mt-3">
														<b>${img[start]['data'][x].name}</b>
													</p>
													<p>${img[start]['data'][x].sub_division}</p>
									s			</div>
											</div>
										</div>`
							}
							html += `
							
							
								
									</div>
								</div>`
							await $("#carousel-inner").append(html);
							if (start == 1) {
								$("#spinner").remove();
								await $("main").show();
							}
						}
					}
					
				</script>
			</body>
		</html>
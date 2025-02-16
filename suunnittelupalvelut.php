<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suunnittelupalvelut | Insinööritoimisto Koivu Oy</title>
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
</head>

<body>
    <!-- Header ja Navigointipalkki -->

    <?php include 'header.php'; ?>

    <main class="suunnittelupalvelut-page container-lg px-md-5">
        <?php
			
			include 'db_pdo.php';

        function formatTextWithParagraphs($text) {
            $paragraphs = explode("\n\n", $text);
            $formattedText = '';
            foreach ($paragraphs as $paragraph) {
                $formattedText .= '<p>' . htmlspecialchars(trim($paragraph)) . '</p>';
            }
            return $formattedText;
        }

        // Funktio datan hakuun tietokannasta
        function getSectionData($pdo, $section_id) {
            $sql = "SELECT otsikko, teksti, kuva FROM koivu_palvelut WHERE section_id = :section_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':section_id', $section_id, PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result ? $result : null;
        }

        // Rakennussuunnittelu osio
        $section_1 = getSectionData($pdo, 'section_1');
        if ($section_1) {
            ?>
            <section id="section_1">
                <div class="container">
                    <div class="row mt-5">
                        <article class="col-12 col-md-6">
                            <header>
                                <h2><?php echo htmlspecialchars($section_1['otsikko']); ?></h2>
                            </header>
                            <p class="mt-4"><?php echo formatTextWithParagraphs($section_1['teksti']); ?></p>
                        </article>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <img src="<?php echo htmlspecialchars($section_1['kuva']); ?>" alt="section_1"
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }

        // Rakennesuunnittelu osio
        $section_2 = getSectionData($pdo, 'section_2');
        if ($section_2) {
            ?>
            <section id="section_2">
                <div class="container">
                    <div class="row mt-5 flex-column-reverse flex-md-row">
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <img src="<?php echo htmlspecialchars($section_2['kuva']); ?>" alt="section_2"
                                class="img-fluid">
                        </div>
                        <article class="col-12 col-md-6">
                            <header>
                                <h2 class="mt-4"><?php echo htmlspecialchars($section_2['otsikko']); ?></h2>
                            </header>
                            <p class="mt-4"><?php echo formatTextWithParagraphs($section_2['teksti']); ?></p>
                        </article>
                    </div>
                </div>
            </section>
            <?php
        }

        // Elementtisuunnittelu osio
        $section_3 = getSectionData($pdo, 'section_3');
        if ($section_3) {
            ?>
            <section id="section_3">
                <div class="container">
                    <div class="row mt-5">
                        <article class="col-12 col-md-6">
                            <header>
                                <h2><?php echo htmlspecialchars($section_3['otsikko']); ?></h2>
                            </header>
                            <p class="mt-4"><?php echo formatTextWithParagraphs($section_3['teksti']); ?></p>
                        </article><?php
        }
                    $aside_1 = getSectionData($pdo, 'aside_1');
                    if ($aside_1) {
                        ?>
                        <aside
                            class="col-12 col-md-6 text-center bg-blue d-flex flex-column align-items-center justify-content-center text-white text-white-h2">
                            <h3 class="text-white"><?php echo htmlspecialchars($aside_1['otsikko']); ?></h3>
                            <article class="mt-3">
                            <?php echo formatTextWithParagraphs($aside_1['teksti']); ?>
                            </article>
                        </aside>
                    </div>
                </div>
            </section>

            <section>
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/karuselli1.webp" class="d-block w-100" alt="referenssi1">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="text-white">2018 Kangasala</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/karuselli2.webp" class="d-block w-100" alt="referenssi2">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="text-white">2017 Tampere</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/karuselli3.webp" class="d-block w-100" alt="referenssi3">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="text-white">2016 Kerava</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
            <?php
        }

        // Pääsuunnittelu ja Energiasuunnittelu osio
        $section_4 = getSectionData($pdo, 'section_4');
        if ($section_4) {
            ?>
            <section id="section_4">
                <div class="container">
                    <div class="row mt-5 mb-5">
                        <article class="col-12 col-md-6">
                            <header>
                                <h2><?php echo htmlspecialchars($section_4['otsikko']); ?></h2>
                            </header>
                            <p class="mt-4"><?php echo formatTextWithParagraphs($section_4['teksti']); ?></p>
                        </article>
                        <?php
		}
		$section_5 = getSectionData($pdo, 'section_5');
		if ($section_5) {
                        ?>
                        <article class="col-12 col-md-6">
                            <header>
                                <h2><?php echo htmlspecialchars($section_5['otsikko']); ?></h2>
                            </header>
                            <p class="mt-4"><?php echo formatTextWithParagraphs($section_5['teksti']); ?></p>
                        </article>
                    </div>
                </div>
            </section>
            <?php
        }



        $accordian_1 = getSectionData($pdo, 'accordian_1');
        if ($accordian_1) {
                        ?>
                        <div class="accordion accordion-flush custom-accordion mb-5" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <?php echo htmlspecialchars($accordian_1['otsikko']); ?>
                                 </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <article class="accordion-body"><?php echo formatTextWithParagraphs($accordian_1['teksti']); ?>
                    </article>
                </div>
            </div><?php
        }
            $accordian_2 = getSectionData($pdo, 'accordian_2');
            if ($accordian_2) {
                ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <?php echo htmlspecialchars($accordian_2['otsikko']); ?>
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <article class="accordion-body"><?php echo formatTextWithParagraphs($accordian_2['teksti']); ?>
                    </article><?php 
            }?>
                </div>
            </div>
        </div>
    </main>
        
    <?php
    $pdo = null;
    ?>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
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
            $paragraphs = explode("\n\n", $text); // Split into paragraphs
            $formattedText = '';
            foreach ($paragraphs as $paragraph) {
                $formattedText .= '<p>' . htmlspecialchars(trim($paragraph)) . '</p>'; // Wrap in <p> tags
            }
            return $formattedText;
        }

        // Function to fetch data from the database
        function getSectionData($pdo, $section_id) {
            $sql = "SELECT otsikko, teksti, kuva FROM koivu_palvelut WHERE section_id = :section_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':section_id', $section_id, PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch associative array

            return $result ? $result : null; // Return null if no result
        }

        // Rakennussuunnittelu Section
        $rakennussuunnittelu = getSectionData($pdo, 'rakennussuunnittelu');
        if ($rakennussuunnittelu) {
            ?>
            <section id="rakennussuunnittelu">
                <div class="container">
                    <div class="row mt-5">
                        <article class="col-12 col-md-6">
                            <header>
                                <h2><?php echo htmlspecialchars($rakennussuunnittelu['otsikko']); ?></h2>
                            </header>
                            <p class="mt-4"><?php echo formatTextWithParagraphs($rakennussuunnittelu['teksti']); ?></p>
                        </article>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <img src="<?php echo htmlspecialchars($rakennussuunnittelu['kuva']); ?>" alt="rakennussuunnittelu"
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }

        // Rakennesuunnittelu Section
        $rakennesuunnittelu = getSectionData($pdo, 'rakennesuunnittelu');
        if ($rakennesuunnittelu) {
            ?>
            <section id="rakennesuunnittelu">
                <div class="container">
                    <div class="row mt-5 flex-column-reverse flex-md-row">
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <img src="<?php echo htmlspecialchars($rakennesuunnittelu['kuva']); ?>" alt="rakennesuunnittelu"
                                class="img-fluid">
                        </div>
                        <article class="col-12 col-md-6">
                            <header>
                                <h2 class="mt-4"><?php echo htmlspecialchars($rakennesuunnittelu['otsikko']); ?></h2>
                            </header>
                            <p class="mt-4"><?php echo formatTextWithParagraphs($rakennesuunnittelu['teksti']); ?></p>
                        </article>
                    </div>
                </div>
            </section>
            <?php
        }

        // Elementtisuunnittelu Section
        $elementtisuunnittelu = getSectionData($pdo, 'elementtisuunnittelu');
        if ($elementtisuunnittelu) {
            ?>
            <section id="elementtisuunnittelu">
                <div class="container">
                    <div class="row mt-5">
                        <article class="col-12 col-md-6">
                            <header>
                                <h2><?php echo htmlspecialchars($elementtisuunnittelu['otsikko']); ?></h2>
                            </header>
                            <p class="mt-4"><?php echo formatTextWithParagraphs($elementtisuunnittelu['teksti']); ?></p>
                        </article>
                        <!-- You'll likely need to adapt the structure for the aside based on your database content -->
                        <aside
                            class="col-12 col-md-6 text-center bg-blue d-flex flex-column align-items-center justify-content-center text-white text-white-h2">
                            <h3 class="text-white">Yleisiä suunniteltavia betonielementtityyppejä ovat mm:</h3>
                            <ul class="mt-3">
                                <li>Sokkeli- ja julkisivuelementit</li>
                                <li>Väliseinäelementit</li>
                                <li>Parveke-elementit</li>
                                <li>Massiivilaatat ja ontelolaatat</li>
                                <li>Runkoelementit</li>
                            </ul>
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

        // Pääsuunnittelu and Energiasuunnittelu Section
        $paasuunnittelu_energia = getSectionData($pdo, 'paasuunnittelu');
        if ($paasuunnittelu_energia) {
            ?>
            <section id="paasuunnittelu-energia">
                <div class="container">
                    <div class="row mt-5 mb-5">
                        <article class="col-12 col-md-6">
                            <header>
                                <h2><?php echo htmlspecialchars($paasuunnittelu_energia['otsikko']); ?></h2>
                            </header>
                            <p class="mt-4"><?php echo formatTextWithParagraphs($paasuunnittelu_energia['teksti']); ?></p>
                        </article>
                        <?php
		}
		$energiasuunnittelu = getSectionData($pdo, 'energiasuunnittelu');
		if ($energiasuunnittelu) {
                        ?>
                        <article class="col-12 col-md-6">
                            <header>
                                <h2><?php echo htmlspecialchars($paasuunnittelu_energia['otsikko']); ?></h2>
                            </header>
                            <p class="mt-4"><?php echo formatTextWithParagraphs($paasuunnittelu_energia['teksti']); ?></p>
                        </article>
                    </div>
                </div>
            </section>
            <?php
        }

        // Close database connection
        $pdo = null; //Close PDO connection by setting it to null
        ?>

        <div class="accordion accordion-flush custom-accordion mb-5" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Energiatodistus
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <article class="accordion-body">Energiatodistus on työkalu eri rakennusten energiatehokkuuden
                        vertailuun
                        ja parantamiseen myynti- ja vuokraustilanteessa. Energiatodistuksen avulla voi helposti verrata
                        eri rakennuksia sillä se perustuu rakennuksen ominaisuuksiin ja niistä johdettuun
                        energiankulutukseen. Energiatodistus on voimassa 10 vuotta sen antopäivästä.
                    </article>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Energiaselvitys
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <article class="accordion-body">Energiaselvitys on kattava selvitys rakennuksen energiankäytöstä ja
                        se
                        tulee laatia uusille rakennuksille rakennusluvan liitteeksi. Energiatodistus on
                        energiaselvityksen osa, jonka lisäksi pientalon energiaselvitys sisältää yleensä: selvityksen
                        lämpöhäviöiden määräystenmukaisuudesta, ilmanvaihtojärjestelmän ominaissähkötehon, arvioidun
                        lämmitystehontarpeen, sekä arvion todellisesta ostoenergiankulutuksesta.
                    </article>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <style>
        body {
            background-color: #f8fafc;
        }

       
        .slider-wrapper {
            
            position: relative;
            width: 100%;
            max-width: 100%;
            overflow: hidden;
            
            margin: 0 auto;
        }

        .slider {
           
            display: flex;
            width: 100%;
            aspect-ratio: 20 / 4;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            box-shadow: 0 1.5rem 3rem -0.75rem hsla(0, 0%, 0%, 0.25);
            border-radius: 0.5rem;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .slider::-webkit-scrollbar {
            display: none;
        }

        .slider img {
            flex: 1 0 100%;
            scroll-snap-align: start;
            object-fit: cover;
        }

        .slider-nav {
            display: flex;
            column-gap: 1rem;
            position: absolute;
            bottom: 1.25rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
        }

        .slider-nav a {
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 50%;
            background-color: #fff;
            opacity: 0.75;
            transition: opacity ease 250ms;
        }

        .slider-nav a:hover {
            opacity: 1;
        }

        .link-container {
            display: flex;
            gap: 100px;
            
            position: relative;
            justify-content: center;
            align-items: center;
            
        }

        .link {
            width: 220px;
            height: 120px;
            background-color: #ff5100;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            position: relative;
            transition: transform 0.3s;
        }

        .link:hover {
            transform: scale(1.1);
        }

        .link a {
            text-decoration: none;
            
            color: #fff;
            margin-top: 10px;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
        }

        .link ion-icon {
            font-size: 2.5rem;
            color: rgb(247, 247, 247);
            margin-bottom: 10px;
        }
        .container {
    display: flex;
  
}
h1 {
    font-size: 36px; /* Taille de police */
    font-family: Arial, sans-serif; /* Police */
    color: #ff5100; /* Couleur du texte */
  margin-left: 50px;
  margin-top: 30px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); /* Ombre du texte */
    position: relative; /* Position relative pour les animations */
}

h1::before {
    content: ''; /* Ajout d'un contenu avant le titre */
    position: absolute;
    width: 100%;
    height: 3px; /* Hauteur de la ligne d'animation */
    bottom: -10px; /* Position de la ligne par rapport au titre */
    background-color: #ff5100; /* Couleur de la ligne */
    visibility: hidden;
    transform: scaleX(0); /* Agrandissement de la ligne à zéro */
    transition: all 0.3s ease;
}

h1:hover::before {
    visibility: visible;
    transform: scaleX(1); /* Agrandissement de la ligne au survol */
}

h1:hover {
    color: #ff5100; /* Couleur du texte au survol */
    transform: scale(1.1); /* Agrandissement au survol */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8); /* Modification de l'ombre au survol */
}

.activities-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    max-width: 800px;
   margin-left: 200px;
    gap: 40px;
    margin-top: 40px;
}

.activity {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 220px;
    padding: 30px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.activity:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.activity:hover .icon img {
    transform: rotate(360deg);
}

.icon {
    position: relative;
    overflow: hidden;
}

.icon img {
    width: 100px;
    height: 100px;
    object-fit: contain;
 
}

.text {
    text-align: center;
    font-size: 20px;
    color: #555;
    margin-top: 20px;
    transition: color 0.3s;
}

.activity:hover .text {
    color: #ff5100;
}
.activity a {
    text-decoration: none;
}

/* Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.5);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.activity {
    animation: fadeIn 0.6s ease;
}

    </style>
</head>

<body>
    
    <section class="container">
        <div class="slider-wrapper">
            <div class="slider">
                <img id="slide-1"
                    src="https://www.lechoixdelecole.org/wp-content/uploads/2018/08/le_choix_de_l_ecole_aller_plus_loin_candidater-800x600.jpg"
                    alt="3D rendering of an imaginary orange planet in space" />
                <img id="slide-2"
                    src="https://demarchesadministratives.fr/images/demarches/1728/parents-d-eleves.jpg"
                    alt="3D rendering of an imaginary green planet in space" />
                <img id="slide-3"
                    src="https://www.bienenseigner.com/wp-content/uploads/2023/06/petit-mot-de-fin-dannee-scolaire-pour-les-parents.jpg"
                    alt="3D rendering of an imaginary blue planet in space" />
            </div>
            <div class="slider-nav">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
            </div>
        </div>
    </section>
    <h1>Pour vous</h1>
    <div class="link-container">
        <div class="link">
            <ion-icon name="calendar-outline"></ion-icon>
            <a href="emploidutemp.php">Emploi du temps</a>
        </div>
        <div class="link">
            <ion-icon name="create-outline"></ion-icon>
            <a href="notesetevaluation.php">Notes & Evaluation </a>
        </div>
        <div class="link">
            <ion-icon name="people-circle-outline"></ion-icon>
            <a href="rapportscolaire.html">Rapports Scolaires</a>
        </div>
        <div class="link">
            <ion-icon name="receipt-outline"></ion-icon>
            <a href="reglementinterieur.html">Reglement Interieur</a>
        </div>
    </div>
    <h1>Activités</h1>
    <div class="activities-container">
        <div class="activity">
            <div class="icon"><img src="event.png" alt="Icon 1"></div>
            <a href ="inscriptionactivite.html"><div class="text"> Inscription aux Activites</div></a>
        </div>
        <div class="activity">
            <div class="icon"><img src="resource.png" alt="Icon 2" ></div>
            <a href ="signalerabsence.html"><div class="text">Signaler l’absence et retard </div></a>
        </div>
        <div class="activity">
            <div class="icon"><img src="resource.png" alt="Icon 2" ></div>
            <a href ="resourcepedagoque.html"><div class="text">Ressources pédagogiques </div></a>
        </div>
        <div class="activity">
            <div class="icon"><img src="payement.png" alt="Icon 3"></div>
            <a href ="inscptionpaiment.html">  <div class="text">paiements & Frais</div></a>
        </div>
        <div class="activity">
            <div class="icon"><img src="activite.png" alt="Icon 3"></div>
            <a href ="CommunauteParentale.html"> <div class="text">Communaute Parentale</div></a>
        </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slider img');
        const totalSlides = slides.length;

        function showSlide(n) {
            for (let slide of slides) {
                slide.style.display = 'none';
            }
            slides[n].style.display = 'block';
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        setInterval(nextSlide, 3000);
    </script>
</body>

</html>

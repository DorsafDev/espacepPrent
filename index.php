<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/gilroy-bold" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/Gilroy-Light" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <title>espace parent</title>

</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
                        <span class="title">parent Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="pagehome.php" target="_blank" id="home-link">

                        <span class="icon">
                            <lord-icon
                            src="https://cdn.lordicon.com/cnpvyndp.json"
                            trigger="hover"
                            
                            style="width:35px;height:35px">
                        </lord-icon>
                        </span>
                        <span class="title">Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="Chat.html">
                        <span class="icon">
                            <lord-icon
                                src="https://cdn.lordicon.com/fdxqrdfe.json"
                                trigger="hover"
                               
                                style="width:35px;height:35px">
                            </lord-icon>
                        </span>
                        <span class="title">Discussion</span>
                    </a>
                </li>
                <li>
                    <a href="horaireetevenement.php">
                        <span class="icon">
                            <lord-icon
                                src="https://cdn.lordicon.com/abfverha.json"
                                trigger="morph"
                               
                                state="morph-calendar "
                                style="width:35px;height:35px">
                            </lord-icon>
                        </span>
                        <span class="title">Evenment et Réunions</span>
                    </a>
                </li>

                <li>
                    <a href="devoir.html">
                        <span class="icon"><ion-icon name="bulb-outline"></ion-icon></span>
                        <span class="title">Consultation</span>
                    </a>
                </li>
                <br><br><br><br><br><brr>

               
                <li>
                    <a href="#">
                        <span class="icon">
                            <lord-icon
                            src="https://cdn.lordicon.com/lecprnjb.json"
                            trigger="hover"
                            state="hover-cog-2"
                            style="width:35px;height:35px">
                        </lord-icon>
                        </span>
                        <span class="title">Parametres</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Deconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
        

        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
                </div>
           </div>    
        <div class="frame" id="main-content">
            
            <iframe id="iframe" src="pagehome.php"></iframe>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.lordicon.com/lordicon-1.1.0.js"></script>
    <script>
        //MenuToggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }

        let list = document.querySelectorAll('.navigation li')
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
    item.addEventListener('mouseover',activeLink));
    document.getElementById('home-link').addEventListener('click', function (event) {
            event.preventDefault();
            loadContent('pagehome.html');
        });

        function loadContent(url) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        document.getElementById('main-content').innerHTML = xhr.responseText;
                    } else {
                        console.error('Erreur de chargement du contenu');
                    }
                }
            };
            xhr.open('GET', url, true);
            xhr.send();
        }
</script>
<script>
    let links = document.querySelectorAll('.navigation a');
    let iframe = document.getElementById('iframe');

    links.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            let page = this.getAttribute('href');
            iframe.src = page;
        });
    });
</script>
</body>
</html>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top" id="navbar">
    <div class="container-fluid p-container">
        <a class="navbar-brand" href="#"><img src="../../assets/img/logo_putih.PNG" alt="" class="img_logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#landing">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutUs">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#timeline">Timeline</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#guide">Guide</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contactUs">Contact Us</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="https://capital.petra.ac.id/2024/games">Sign In</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var sections = document.querySelectorAll("section");
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

            sections.forEach(function(section) {
                var sectionTop = section.offsetTop - 100;

                if (scrollPosition >= sectionTop) {
                    var id = section.getAttribute("id");
                    updateActiveNav(id);
                }
            });

            var currentScrollPos = window.pageYOffset;
            var navbar = document.getElementById("navbar");

            if (currentScrollPos == 0) {
                navbar.style.backgroundColor = "transparent";
                navbar.style.boxShadow = "0px 4px 8px rgba(0, 0, 0, 0)";
            } else {
                navbar.style.backgroundColor = "#171524";
                navbar.style.boxShadow = "0px 4px 8px rgba(0, 0, 0, 0.4)";
                navbar.style.top = "0";
            }

            prevScrollpos = currentScrollPos;
        };

        function updateActiveNav(currentId) {
            var navLinks = document.querySelectorAll(".navbar-nav a.nav-link");

            navLinks.forEach(function(link) {
                link.classList.remove("active");
                var href = link.getAttribute("href").substring(1);

                if (href === currentId) {
                    link.classList.add("active");
                }
            });
        }
    });
</script>
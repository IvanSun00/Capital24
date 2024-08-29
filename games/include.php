<style>
    html,
    body {
        overflow-x: hidden;
        height: 100%;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url("https://capital.petra.ac.id/2024/assets/img/bg_fix.PNG");
        background-size: cover;
        font-family: "subfont";
    }

    ::-webkit-scrollbar {
        width: 0;
    }

    .navbar {
        display: block;
        margin: 0 auto;
        width: 100%;
        max-width: 100%;
        box-shadow: none;
        background-color: #161e33;
        position: fixed;
        height: 70px !important;
        overflow: hidden;
        z-index: 10;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
    }

    .main {
        margin: 0 auto;
        display: block;
        height: 100%;
        margin-top: 70px;
    }

    .mainInner {
        display: table;
        height: 100%;
        width: 100%;
        text-align: center;
    }

    .mainInner div {
        display: table-cell;
        vertical-align: middle;
        font-size: 3em;
        font-weight: bold;
        letter-spacing: 1.25px;
    }

    #sidebarMenu {
        height: 100%;
        position: fixed;
        right: 0;
        width: 310px;
        margin-top: 70px;
        transform: translateX(310px);
        transition: transform 310ms ease-in-out;
        background: #161e33;
        z-index: 999;
    }

    .sidebarMenuInner {
        margin: 0;
        padding: 0;
    }

    .sidebarMenuInner a {
        text-decoration: none;
        color: black;
    }

    .sidebarMenuInner li {
        list-style: none;
        font-weight: bold;
        cursor: pointer;
        background-color: floralwhite;
        border-radius: 50px;
        text-align: center;
    }

    .sidebarMenuInner li h4 {
        cursor: pointer;
        text-decoration: none;
        margin: 0;
    }

    input[type="checkbox"]:checked~#sidebarMenu {
        transform: translateX(0);
    }

    input[type="checkbox"] {
        transition: all 0.3s;
        box-sizing: border-box;
        display: none;
    }

    .logo_container {
        position: absolute;
        z-index: 99;
        left: 25px;
        top: 15px;
        width: 40px;
        height: 40px;
    }

    .logo_capital {
        width: 40px;
        height: 40px;
    }

    .title_nav {
        position: absolute;
        z-index: 99;
        top: 22px;
        left: 75px;
        color: white;
    }

    .money-container {
        position: absolute;
        z-index: 99;
        top: 15px;
        right: 95px;
        background-color: floralwhite;
        border-radius: 50px;
        width: 200px;
        text-align: center;
        gap: 10px;
    }

    .money-sidebar {
        display: none !important;
    }

    .sidebarIconToggle {
        transition: all 0.3s;
        box-sizing: border-box;
        cursor: pointer;
        position: absolute;
        z-index: 99;
        height: 100%;
        width: 100%;
        top: 28px;
        right: 35px;
        height: 22px;
        width: 22px;
    }

    .wudii {
        position: fixed;
        width: 220px;
        height: auto;
        z-index: 99;
        bottom: 0;
        right: 0;
    }

    .spinner {
        transition: all 0.3s;
        box-sizing: border-box;
        position: absolute;
        height: 3px;
        width: 100%;
        background-color: #fff;
    }

    .horizontal {
        transition: all 0.3s;
        box-sizing: border-box;
        position: relative;
        float: left;
        margin-top: 3px;
    }

    .diagonal.part-1 {
        position: relative;
        transition: all 0.3s;
        box-sizing: border-box;
        float: left;
    }

    .diagonal.part-2 {
        transition: all 0.3s;
        box-sizing: border-box;
        position: relative;
        float: left;
        margin-top: 3px;
    }

    input[type="checkbox"]:checked~.sidebarIconToggle>.horizontal {
        transition: all 0.3s;
        box-sizing: border-box;
        opacity: 0;
    }

    input[type="checkbox"]:checked~.sidebarIconToggle>.diagonal.part-1 {
        transition: all 0.3s;
        box-sizing: border-box;
        transform: rotate(135deg);
        margin-top: 8px;
    }

    input[type="checkbox"]:checked~.sidebarIconToggle>.diagonal.part-2 {
        transition: all 0.3s;
        box-sizing: border-box;
        transform: rotate(-135deg);
        margin-top: -9px;
    }

    @media screen and (max-width: 500px) {
        .title_nav {
            top: 24px;
        }

        .money-container {
            display: none !important;
        }

        .money-sidebar {
            display: flex !important;
        }

        #sidebarMenu {
            height: 100%;
            width: 100vw;
            transform: translateX(100vw);
            transition: transform 100vw ease-in-out;
        }

        .sidebarMenuInner {
            padding: 30px !important;
        }

        .wudii {
            width: 150px;
        }
    }
</style>

<div class="navbar"></div>
<div class="logo_container">
    <img src="https://capital.petra.ac.id/2024/assets/img/logo_capital.PNG" alt="" class="logo_capital">
</div>
<h4 class="title_nav">CAPITAL 2024</h4>
<a href="uang.php">
    <div class="money-container p-1 d-flex flex-row justify-content-center align-items-center">
        <i class="fa-solid fa-sack-dollar fa-xl" style="color: #c88546;"></i>
        <h4 style="margin: 0; color: black"><?php echo $uang ?></h4>
    </div>
</a>

<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
<label for="openSidebarMenu" class="sidebarIconToggle">
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
</label>
<div id="sidebarMenu">
    <ul class="sidebarMenuInner p-3">
        <a href="uang.php">
            <li class="money-sidebar p-2 mb-3 mb-xl-4 d-flex flex-row justify-content-center align-items-center" style="gap: 10px;">
                <i class="fa-solid fa-sack-dollar fa-xl" style="color: #c88546;"></i>
                <h4><?php echo $uang ?></h4>
            </li>
        </a>
        <a href="index.php">
            <li class="p-2 mb-3 mb-xl-4">
                <h4>Home</h4>
            </li>
        </a>
        <a href="storyline.php">
            <li class="p-2 mb-3 mb-xl-4">
                <h4>Storyline</h4>
            </li>
        </a>
        <a href="map.php">
            <li class="p-2 mb-3 mb-xl-4">
                <h4>Maps</h4>
            </li>
        </a>
        <a href="news.php">
            <li class="p-2 mb-3 mb-xl-4">
                <h4>News</h4>
            </li>
        </a>
        <a href="portfolio.php">
            <li class="p-2 mb-3 mb-xl-4">
                <h4>Portfolio</h4>
            </li>
        </a>
        <a href="rules.php">
            <li class="p-2 mb-3 mb-xl-4">
                <h4>Rules</h4>
            </li>
        </a>
        <a href="logout.php">
            <li class="p-2 mb-3 mb-xl-4 text-danger">
                <h4>Logout</h4>
            </li>
        </a>
    </ul>
</div>

<a href="tips.php"><img src="https://capital.petra.ac.id/2024/assets/img/WUDII.png" alt="" class="wudii"></a>
<div class="main-sidebar sidebar-style-2 bg-primarya d-print-none">
    <aside id="sidebar-wrapper ">
        <div class="sidebar-brand bg-warniang" style="
    border-bottom: 1px solid #eadbdb;
">
            <a href="index.php"> <img alt="YCNS" src="assets/img/logo.png" class="header-logo" /> <span
                    class="logo-name">JMBS</span>
                <!-- <hr> -->
            </a>
        </div>
        <ul class="sidebar-menu ">
            <li class="menu-header">Main</li>
            <li class="dropdown <?= isActivePage('index') ?>">
                <a href="index" class="nav-link"><i class="

              fas fa-clipboard-list"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header"></li>
            <li class="dropdown <?= isActivePage('dailyTasks') ?>">
                <a href="dailyTasks" class="nav-link"><i class="fas fa-tasks"></i><span>Tasks</span></a>
            </li>


            <li class="menu-header"></li>
            <li class="dropdown ">
                <a href="#" class="nav-link"><i class="

              fas fa-copy"></i><span>Library</span></a>
            </li>


            <li class="menu-header"></li>
            <li class="dropdown <?= isActivePage('mytest') ?>">
                <a href="mytest" class="nav-link"><i class="
fas fa-book-reader"></i><span>Tests</span></a>
            </li>






        </ul>
    </aside>
</div>

<?php
// Function to check if the current page matches the given page name
function isActivePage($pageName) {
    // Get the current page name from the URL (without the file extension)
//    $currentPage = basename($_SERVER['REQUEST_URI'], ".php");
    $currentPage = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), ".php");


    // If the current page matches the passed page name, return "active" class
    return $currentPage == $pageName ? "active" : "";
}
?>

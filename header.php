    <!-- Start NavBar-->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid container">
            <a class="navbar-brand " href="#">Student management system</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Student management system</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white nv" href="create.php">Add student</a>
                        </li>
                    </ul>
                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                    <?php
                    if (empty($_COOKIE['user'])) { ?>
                        <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                            <a href="register.php" id="signAndLogout"
                                class="text-white text-decoration-none px-3 py-1  rounded-4 mt-3"
                                style="background-color : #151415;">Register</a>
                        </div>
                        <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">

                            <a href="login.php" id="signAndLogout"
                                class="text-white text-decoration-none px-4 py-1 mx-3 rounded-4 mt-3"
                                style="background-color : #151415;">Login</a>
                        <?php
                    } else { ?>
                            <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                                <a href="logout.php" id="signAndLogout"
                                    class="text-white text-decoration-none px-3 py-1  rounded-4"
                                    style="background-color : #151415;">Logout</a>
                            </div>
                        <?php  }
                        ?>

                        </div>
                </div>
            </div>
    </nav>
    <!--End NavBar-->
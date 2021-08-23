<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<div class="container" style="padding: 30px 0">
    <nav class="navbar navbar-expand-lg  ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/Portal"><img src="/assets/images/LabFinder-logo.png" width=280 height=60></a>
            <!-- <a class="navbar-brand" href="/Portal"><img src="/assets/images/AGN-Logo.png" width=300 height="60"></a> -->
            <button class="navbar-toggler outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" aria-expanded="false" aria-label="Toggle navigation">
                Menu
            </button>
            <!-- modal -->
            <div style='background-image: linear-gradient(180deg,#282572,#4b4b88);' class="offcanvas offcanvas-start" data-bs-scroll="true" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <ul class="navbar-nav" style='font-size: 18px'>
                    <li style="margin-left: 20px;" class="nav-item">
                        <a class="nav-link" style="color: #f2f2f1" href="/Portal">Home</a>
                    </li>
                    <li style="margin-left: 20px" class="nav-item">
                        <a class="nav-link" style="color: #f2f2f1" href="https://www.auscope.org.au/agn">About</a>
                    </li>
                    <li style="margin-left: 20px" class="nav-item">
                        <a class="nav-link" style="color: #f2f2f1" href="https://app.ausgeochem.org/"> AuGeoChem</a>
                    </li>

                    <li style="margin-left: 20px" class="nav-item dropdown">
                        <a style="color: #f2f2f1" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Research Type
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/Portal/geochemOptionsSelection">Geochemical Analysis</a>
                            </li>
                            <li><a class="dropdown-item" href="/Portal/expProcOptionsSelection">Experimental
                                    Procedure</a></li>
                            <li><a class="dropdown-item" href="/Portal/samplePrepOptionsSelection">Sample
                                    Preparation</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div style="margin-left: 100px;  color: #F2F2F1;" class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav" style='font-size: 18px'>
                    <li style="margin-left: 20px;" class="nav-item">
                        <a class="nav-link" style="color: #f2f2f1" href="/Portal">Home</a>
                    </li>
                    <li style="margin-left: 20px" class="nav-item">
                        <a class="nav-link" style="color: #f2f2f1" href="https://www.auscope.org.au/agn">About</a>
                    </li>
                    <li style="margin-left: 20px" class="nav-item">
                        <a class="nav-link" style="color: #f2f2f1" href="https://app.ausgeochem.org/"> AuGeoChem</a>
                    </li>
                    <li style="margin-left: 20px" class="nav-item dropdown">
                        <a style="color: #f2f2f1" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Research Type
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/Portal/geochemOptionsSelection">Geochemical Analysis</a>
                            </li>
                            <li><a class="dropdown-item" href="/Portal/expProcOptionsSelection">Experimental
                                    Procedure</a></li>
                            <li><a class="dropdown-item" href="/Portal/samplePrepOptionsSelection">Sample
                                    Preparation</a></li>
                        </ul>
                    </li>
                    <li style="margin-left: 20px" class="nav-item">
                        <button class='btn outline-primary' onclick="window.location='<?php echo base_url(); ?>Portal/adminLogin'">Admin Login</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
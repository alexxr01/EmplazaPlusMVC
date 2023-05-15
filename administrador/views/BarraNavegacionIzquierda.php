<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <!-- Pestaña principal -->
                <div class="sb-sidenav-menu-heading">Inicio</div>
                <a class="nav-link" href="index">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Panel
                </a>

                <!-- Pestañas de consultas acerca de la web y BBDD -->
                <div class="sb-sidenav-menu-heading">Gestión</div>
                <a class="nav-link" href="listausuarios">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-person-through-window"></i></div>
                    Lista de usuarios
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-house-laptop"></i></div>
                    Emplazamientos
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="listaemplazamientos">Listado de emplazamientos</a>
                        <a class="nav-link" href="registraremplazamiento">Registrar uno nuevo</a>
                    </nav>
                </div>
                <a class="nav-link" href="listareservas">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-ticket"></i></div>
                    Reservas
                </a>

                <!-- Pestaña de configuraciones -->
                <!--
                <div class="sb-sidenav-menu-heading">Configuracion General</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Sin configurar
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Sin configurar
                </a>
                -->

                <!-- Pestaña para realizar acciones en la sesion -->
                <div class="sb-sidenav-menu-heading">Usuario</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-lock"></i></div>
                    Cerrar sesion
                </a>
            </div>
        </div>
        <!--
        <div class="sb-sidenav-footer">
            <button type="button" class="btn btn-light">Cerrar sesión</button>
        </div>
        -->
    </nav>
</div>
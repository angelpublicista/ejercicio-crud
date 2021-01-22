<?php

$rtl_modules = array(
    // DASHBOARD
    array(
        "title_menu" => "Dashboard",
        "icon" => "<i class='nav-icon fas fa-tachometer-alt'></i>",
        "link" => "".ROUTE_URL."/pages",
        "subitems" => false
    ),

    // SUSCRIPCIONES
    array(
        "title_menu" => "Suscripciones",
        "icon" => "<i class='nav-icon fas fa-star'></i>",
        "link" => "#",
        "subitems" => array(
            array(
                "title_menu" => "Todas las suscripciones",
                "link" => "".ROUTE_URL."/plans",
                "subitems" => false
            ),

            array(
                "title_menu" => "Agregar suscripción",
                "link" => "".ROUTE_URL."/plans/add",
                "subitems" => false
            ),

            array(
                "title_menu" => "Importar suscripciones",
                "link" => "".ROUTE_URL."/plans/import",
                "subitems" => false
            )
        )
    ),

    // PLANES
    array(
        "title_menu" => "Planes Hosting",
        "icon" => "<i class='nav-icon fas fa-server'></i>",
        "link" => "#",
        "subitems" => array(
            array(
                "title_menu" => "Todos los planes",
                "link" => "".ROUTE_URL."/plans",
                "subitems" => false
            ),

            array(
                "title_menu" => "Agregar plan",
                "link" => "".ROUTE_URL."/plans/add",
                "subitems" => false
            ),

            array(
                "title_menu" => "Importar planes",
                "link" => "".ROUTE_URL."/plans/import",
                "subitems" => false
            )
        )
    ),

    // USUARIOS
    array(
        "title_menu" => "Usuarios",
        "icon" => "<i class='nav-icon fas fa-users'></i>",
        "link" => "#",
        "subitems" => array(
            array(
                "title_menu" => "Todos los usuarios",
                "link" => "".ROUTE_URL."/users",
                "subitems" => false
            ),

            array(
                "title_menu" => "Agregar usuario",
                "link" => "".ROUTE_URL."/users/add",
                "subitems" => false
            ),

            array(
                "title_menu" => "Importar usuarios",
                "link" => "".ROUTE_URL."/users/import",
                "subitems" => false
            )
        )
    ),

    // PROFILE
    array(
        "title_menu" => "Mi perfil",
        "icon" => "<i class='nav-icon fas fa-user'></i>",
        "link" => "#",
        "subitems" => false
    )
);
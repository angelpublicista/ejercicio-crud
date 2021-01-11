<?php

function redirectTo($page){
    header('Location:' . ROUTE_URL . $page);
}
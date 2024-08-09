<?php

function flashMessages() {
    if ( isset($_SESSION["success"]) ) {
        echo('<div class="message-success"><p>'.htmlentities($_SESSION["success"])."</p></div>");
        unset($_SESSION["success"]);
    }
    if ( isset($_SESSION["error"]) ) {
        echo('<div class="message-error"><p>'.htmlentities($_SESSION["error"])."</p></div>");
        unset($_SESSION["error"]);
    }
}

?>
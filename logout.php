<?php

    session_start();
    session_destroy();

    header("location: index.php?alerts&alert=success&message=Log out Successfully")

?>
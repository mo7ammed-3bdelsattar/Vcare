<?php
unset($_SESSION);
session_regenerate_id();
session_destroy();
(new Functions)->redirect('index.php');


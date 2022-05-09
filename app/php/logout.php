<?php
session_start();

echo '
    <script>
        window.alert("Goodbye!")
        window.location.href = "../index.php";
    </script>
';
session_destroy();
?>

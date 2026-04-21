
    <?php
    session_start();
    require_once 'config/db.php';
    require_once 'core/validations.php';
    require_once 'core/functions.php';
    require_once 'views/layouts/header.php';

    showMessage();

    require_once 'routing.php';
    require_once 'views/layouts/footer.php';

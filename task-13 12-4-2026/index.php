
    <?php
    session_start();
    require_once 'config/db.php';
    require_once 'core/validations.php';
    require_once 'core/functions.php';
    require_once 'views/layouts/header.php';


    $page = $_GET['page'] ?? 'home';
    showMessage();
    switch ($page) {
        case 'home':
            include 'views/home.php';
            break;
        case 'post':
            include 'views/post.php';
            break;
        case 'about':
            include 'views/about.php';
            break;
        case 'contact':
            include 'views/contact.php';
            break;
        case 'register':
            include 'views/register.php';
            break;
        case 'login':
            include 'views/login.php';
            break;
        case 'blog':
            include 'views/blog.php';
            break;
        case 'register_controllers':
            include 'controllers/auth/RegisterControllers.php';
            break;  
        case 'login_controllers':
            include 'controllers/auth/LoginControllers.php';
            break;
        case 'blog_controllers':
            include 'controllers/BlogControllers.php';
            break;
        case 'logout':
            include 'controllers/auth/LogoutControllers.php';
            break;
        default:
            include 'views/404.php';
            break;
    }

    require_once 'views/layouts/footer.php';

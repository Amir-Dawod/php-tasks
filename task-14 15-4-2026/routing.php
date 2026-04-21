<?php
$page = $_GET['page'] ?? 'home';
switch ($page) {
    case 'home':
        include 'views/pages/home.php';
        break;
    case 'about':
        include 'views/pages/about.php';
    case 'contact':
        include 'views/pages/contact.php';
        break;
    case 'post':
        include 'views/pages/post.php';
        break;
        break;
    case 'register':
        include 'views/auth/register.php';
        break;
    case 'login':
        include 'views/auth/login.php';
        break;
    case 'blogs':
        include 'views/blogs/index.php';
        break;
    case 'create-blog':
        include 'views/blogs/create.php';
        break;
    case 'edit-blog':
        include 'views/blogs/edit.php';
        break;
    case 'register-controllers':
        include 'controllers/auth/RegisterControllers.php';
        break;
    case 'login-controllers':
        include 'controllers/auth/LoginControllers.php';
        break;
    case 'logout':
        include 'controllers/auth/LogoutControllers.php';
        break;
    case 'blog-controllers':
        include 'controllers/BlogControllers.php';
        break;
    case 'edit-blog-controllers':
        include 'controllers/EditBlogControllers.php';
        break;
    case 'delete-blog-controllers':
        include 'controllers/DeleteBlogControllers.php';
        break;
    default:
        include 'views/pages/404.php';
        break;
}

<?php
include ('../../path.php');
include (ROOT_PATH . "/app/controllers/security.php");

usersOnly();

$id = $_SESSION['id'];
$image_preview = selectOne('users',['id' => $id]);


$t_posts_published = totalNumber('posts',['published' => 1]);
$t_posts_unpublished = totalNumber('posts',['published' => 2]);
$t_comments =  totalNumber('comments',['user_id' => $_SESSION['id']]);
$visitor = $_SERVER['REMOTE_ADDR'];
$activity =  totalNumber('visitors',['ip_address' => $visitor]);
$subscription = totalNumber('newsletter', ['email' => $image_preview['email']]);


$t_users = totalNumber('users');
$t_topics = totalNumber('topics');
$comment_id = '';
$comments = '';

$subs = selectAll('newsletter', ['email' =>  $image_preview['email']]);
$questions = selectAll('security', ['user_id' => $image_preview['id']]);






?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <link rel="shortcut icon" type="image/png" href="../../assets/img/peerTalk.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Settings || <?php echo $_SESSION['username']; ?>.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="User Dashboard.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="../../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="../../assets/css/main.css" rel="stylesheet">
    <link href="../../assets/css/dashboard.css" rel="stylesheet">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!--counter js-->
    <script src="../../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../../assets/js/counter-up.js"></script>
    <script src="../../assets/js/jquery-waypoints.js"></script>


</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow bg-dark header-text-light">
        <div class="app-header__logo">
            <div style="height:23px;width:97px;"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
        </div>    <div class="app-header__content">
            <div class="app-header-left">
                <div class="search-wrapper">
                    <div class="input-holder">
                        <input type="text" class="search-input" placeholder="Type to search">
                        <button class="search-icon"><span></span></button>
                    </div>
                    <button class="close"></button>
                </div>
                <ul class="header-menu nav">
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL . '/settings/index.php'  ?>" class="nav-link">
                            <i class="nav-link-icon fa fa-database"> </i>
                            Statistics
                        </a>
                    </li>
                    <?php if ($_SESSION['admin']): ?>
                        <li class="btn-group nav-item">
                            <a href="<?php echo BASE_URL . '/posts/project.php'  ?>" class="nav-link">
                                <i class="nav-link-icon fa fa-edit"></i>
                                Projects
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="dropdown nav-item">
                        <a href="<?php echo BASE_URL . '/settings/index.php'  ?>" class="nav-link">
                            <i class="nav-link-icon fa fa-cog"></i>
                            Settings
                        </a>
                    </li>
                </ul>        </div>
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                        <?php if ($image_preview['assigned_image']): ?>
                                            <img width="42" height="42" class="rounded-circle" src="<?php echo BASE_URL . "/assets/img/" . $image_preview['image']; ?>" alt="<?php echo $_SESSION['username']; ?>">
                                        <?php else: ?>
                                            <img width="42" height="42" class="rounded-circle" src="../../assets/img/face-0.jpg" alt="<?php echo $_SESSION['username']; ?>">
                                        <?php endif; ?>


                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <a href="<?php echo BASE_URL . '/user/view.php'  ?>" style="text-decoration: none;"><button type="button" tabindex="0" class="dropdown-item">User Account</button></a>
                                        <a href="<?php echo BASE_URL . 'settings/index.php'  ?>" style="text-decoration: none;"><button type="button" tabindex="0" class="dropdown-item">Settings</button></a>
                                        <h6 tabindex="-1" class="dropdown-header"> Actions </h6>
                                        <a href="<?php echo BASE_URL . '/index.php'  ?>" style="text-decoration: none;"><button type="button" tabindex="0" class="dropdown-item">Browse Content</button></a>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <a href="<?php echo BASE_URL . '/logout.php' ?>" style="text-decoration: none;"><button type="button" tabindex="0" class="dropdown-item" style="color: tomato;">Logout</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    <?php echo $_SESSION['username']; ?>
                                </div>
                                <div class="widget-subheading">
                                    <?php echo $image_preview['description']; ?>
                                </div>
                            </div>
                            <div class="widget-content-right header-user-info ml-3">
                                <a href="<?php echo BASE_URL . "/dashboard/gallery/index.php" ?>"><button type="button" class="btn-shadow p-1 btn btn-primary btn-sm ">
                                        <i class="fa text-black-50 fa-camera-retro pr-1 pl-1"></i>
                                    </button></a>
                            </div>
                        </div>
                    </div>
                </div>        </div>
        </div>
    </div>
    <div class="app-main">
        <div class="app-sidebar sidebar-shadow bg-vicious-stance sidebar-text-light">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
            </div>    <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">  </li>
                        <li class="app-sidebar__heading"> Home </li>
                        <li>
                            <a href=" <?php echo BASE_URL . '/dashboard/dashboard.php'  ?>">
                                <i class="metismenu-icon pe-7s-rocket "></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href=" <?php echo BASE_URL . '/index.php'  ?>" >
                                <i class="metismenu-icon pe-7s-light"></i>
                                View Blog
                            </a>
                        </li>
                        <li class="app-sidebar__heading">User Settings</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-user"></i>
                                Details
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?php echo BASE_URL . '/dashboard/user/view.php'  ?>">
                                        <i class="metismenu-icon"></i>
                                        View User Details
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL . '/dashboard/user/edit.php'  ?>?u_id=<?php echo $_SESSION['id']; ?>">
                                        <i class="metismenu-icon">
                                        </i>Edit Details
                                    </a>
                                </li>
                                <?php if ($_SESSION['su_admin']): ?>

                                    <li>
                                        <a href="<?php echo BASE_URL . '/dashboard/user/create.php'  ?>">
                                            <i class="metismenu-icon">
                                            </i>Add new user
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo BASE_URL . '/dashboard/user/index.php'  ?>">
                                            <i class="metismenu-icon">
                                            </i>  View system users.
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php if ($_SESSION['admin']): ?>
                            <li class="app-sidebar__heading"> Category Settings </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-albums"></i>
                                    Topics
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?php echo BASE_URL . '/dashboard/topics/index.php'  ?>">
                                            <i class="metismenu-icon">
                                            </i> View Topics
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo BASE_URL . '/dashboard/topics/create.php'  ?>">
                                            <i class="metismenu-icon">
                                            </i> create topic
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        <?php endif; ?>

                        <li class="app-sidebar__heading"> Posts Settings </li>
                        <?php if ($_SESSION['admin']): ?>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-news-paper"></i>
                                    Posts
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?php echo BASE_URL . '/dashboard/posts/index.php'  ?>">
                                            <i class="metismenu-icon">
                                            </i> View Posts
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo BASE_URL . '/dashboard/posts/create.php'  ?>">
                                            <i class="metismenu-icon">
                                            </i> create Post
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        <?php endif; ?>

                        <li>
                            <a href="<?php echo BASE_URL . '/dashboard/posts/create.php'  ?>">
                                <i class="metismenu-icon pe-7s-comment"></i>
                                Comments
                            </a>
                        </li>
                        <li class="app-sidebar__heading"> Preferences </li>
                        <li>
                            <a href="<?php echo BASE_URL . '/dashboard/messages/index.php'  ?>">
                                <i class="metismenu-icon pe-7s-print"></i>
                                Messages
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL . '/dashboard/settings/index.php'  ?>" class="mm-active">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Account Settings
                            </a>
                        </li>


                        <li class="app-sidebar__heading"> Logout </li>
                        <li>
                            <a href="<?php echo BASE_URL . '/logout.php' ?>" style="color:tomato;">
                                <i class="metismenu-icon pe-7s-next-2">
                                </i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-display2 icon-gradient bg-happy-itmeo">
                                </i>
                            </div>
                            <div> Account
                                <div class="page-title-subheading">
                                    <?php include(ROOT_PATH . "/app/includes/messages.php");?>
                                </div>
                            </div>
                        </div>
                        <div class="page-title-actions">
                            <button type="button" data-toggle="tooltip" title="Account details and settings." data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                <i class="fa fa-star"></i>
                            </button>
                            <div class="d-inline-block dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-gears fa-w-20"></i>
                                            </span>
                                    Options
                                </button>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo BASE_URL . '/messages/index.php' ?>" class="nav-link">
                                                <i class="nav-link-icon lnr-inbox"></i>
                                                <span> Messages </span>
                                                <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo BASE_URL . '/comments/index.php' ?>" class="nav-link">
                                                <i class="nav-link-icon lnr-book"></i>
                                                <span> Comments </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo BASE_URL . '/gallery/index.php' ?>" class="nav-link">
                                                <i class="nav-link-icon lnr-picture"></i>
                                                <span> Gallery </span>
                                            </a>
                                        </li>
                                            <li class="nav-item">
                                                <a  href="<?php echo BASE_URL . '/dashboard/dashboard.php' ?>" class="nav-link ">
                                                    <i class="nav-link-icon lnr-file-empty"></i>
                                                    <span> Dashboard </span>
                                                </a>
                                            </li>

                                    </ul>
                                </div>
                            </div>
                        </div>    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading"> Comments </div>
                                        <div class="widget-subheading"> Total number of comments you posted </div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-success num2"><?php echo $t_comments ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading"> Activity </div>
                                        <div class="widget-subheading"> Total posts you have read </div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-warning num2"><?php echo $activity ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading"> Subscriptions </div>
                                        <div class="widget-subheading"> Active Subscriptions</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-danger num2"> <?php echo $subscription ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $(".num2").counterUp({delay:10,time:1000});
                    </script>
                </div>
                 <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">Subscriptions
                                </div>
                                <div class="table-responsive">
                                    <?php if (count($subs) === 0): ?>
                                        <p class="text-center"> You have no Subscriptions. Please subscribe to our newsletter to get alerts on what we are up tp.</p>
                                    <?php else: ?>
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($subs as $key => $sub): ?>
                                        <tr>
                                            <td class="text-center text-muted"><?php echo $key + 1; ?></td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading"> Newsletter </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($sub['sub']): ?>
                                                    <div class="badge btn-success"> Subscribed </div>
                                                <?php else: ?>
                                                    <div class="badge badge-warning"> Pending </div>
                                                <?php endif; ?>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                    <?php endif; ?>
                                </div>
                                <div class="d-block text-center card-footer">

                                </div>
                            </div>
                        </div>
                    </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header">Security Question
                            </div>
                            <div class="table-responsive">
                                <?php if (count($questions) === 0): ?>
                                <p class="text-center"> Please add a security question.This will help you during password resets.</p>
                                <?php else: ?>
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th> Question </th>
                                        <th class="text-center"> Actions </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($questions as $key => $question): ?>


                                        <tr>
                                            <td class="text-center text-muted"><?php echo $key + 1; ?></td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading"> <?php echo $question['question']?> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                //encript post id
                                                $encrypt_1 = ($question['id']*123456789*5678);

                                                $data= $encrypt_1;
                                                $link1 = "/dashboard/settings/edit.php?id=".urlencode(base64_encode($data));
                                                $link2 = "/dashboard/settings/index.php?del_id=".urlencode(base64_encode($data));
                                                ?>
                                                    <a href="<?php echo BASE_URL . $link2;?>"><button type="button" rel="tooltip" title="Delete Security question" class="btn btn-danger btn-simple btn-xs">
                                                            <i class="fa fa-times"></i>
                                                        </button></a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>



                                    </tbody>
                                </table>
                            </div>
                            <div class="d-block text-center card-footer">
                                <a href="<?php echo BASE_URL . '/dashboard/settings/security.php' ?>"><button class="btn-wide btn btn-success"> Add Security Question. </button></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="app-wrapper-footer">
                <div class="app-footer">
                    <div class="app-footer__inner">
                        <div class="app-footer-left">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="<?php echo BASE_URL . '/index.php'  ?>" class="nav-link">
                                        <div class="badge badge-success mr-1 ml-0">
                                            <small>NEW</small>
                                        </div>
                                        View Blog
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo BASE_URL . '/dashboard/user/view.php'  ?>" class="nav-link">
                                        <?php echo $_SESSION['username']; ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="app-footer-right">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="https://www.instagram.com/davekariz/?hl=en" class="nav-link" target="_blank">
                                        Copyright  &copy; <script>document.write(new Date().getFullYear())</script> All Rights reserved.
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>    </div>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    </div>
</div>
<script type="text/javascript" src="../../assets/js/main.js"></script></body>
</html>


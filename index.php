<?php
include "path.php";
include (ROOT_PATH . '/app/controllers/topics.php');

$posts = array();
$postTitle = 'Recent Posts';
$t_id ='';

if (isset($_GET['t_id']))
{
    //decode the id
    $decode = base64_decode(urldecode($_GET['t_id']));
    $decript_id = (($decode/5678)/123456789);
    $t_id = $_GET['t_id'];
    $postTitle = "You Searched For posts under '" . $_GET['name'] . "'";
    $posts = getPostsByTopicId($decript_id);
}elseif(isset($_POST['search-term']))
{
    $postTitle = " You searched for ' " . $_POST['search-term'] . " '";
    $posts = searchPosts($_POST['search-term']);
/*    dd($_POST);*/
}else
{
    $posts = owlSlider();
}



?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Home || Welcome </title>
    <link rel="shortcut icon" type="image/png" href="assets/img/peerTalk.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- font awesome icons-->
    <link rel="stylesheet" href="assets/css/all.css">

    <!--Owl Carousel-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <!--AOS-->
    <link rel="stylesheet" href="assets/css/aos.css">



    <!--custom styling-->
    <link rel="stylesheet" href="assets/css/styles.css">


    <!--Google fonts -->
<!--    <link href="https://fonts.googleapis.com/css?family=Abel|Atomic+Age|Black+Ops+One|Gotu|Livvic|Reenie+Beanie|Sarina&display=swap" rel="stylesheet">
-->

</head>
<body>

<!---------------------------------------------Navigation------------------------------------------->
<?php require (ROOT_PATH . "/app/includes/header.php"); ?>

<!----------------------xxxxx-----------------------End of Navigation-------------------xxxxx------------------------>
<?php require (ROOT_PATH . "/app/includes/messages.php"); ?>
<!---------------------------------------------Main section------------------------------------------->

<main>

    <!--site title-->
    <?php if (isset($_POST['search-term']) || $t_id) : ?>

    <?php else: ?>
        <section class="site-title">
            <div class="site-background">
                <h3 data-aos="fade-up" data-aos-delay="200" class="text-gray"> Wambui's Column </h3>
                <h1 data-aos="fade-up" data-aos-delay="500" class="text-gray"> This and That By Wambui.</h1>
                <a href="#blog" data-aos="fade-down" data-aos-delay="800"><button class="btn"> Explore </button></a>
            </div>
        </section>
    <?php endif; ?>
    <!--end of site title-->


    <!--blog Carousel-->
    <section>

        <div class="blog">
            <div class="container">
                <div class="owl-carousel owl-theme blog-post">

                    <?php foreach ($posts as $key => $post): ?>
                    <div class="blog-content" data-aos="fade-down" data-aos-delay="200">
                        <?php
                        //encript post id
                        $encrypt_1 = (($post['id']*123456789*5678));

                         $data= $encrypt_1;
                         $link = "/single.php?d_id=".urlencode(base64_encode($data));


                        ?>

                        <a href="<?php echo BASE_URL . $link ?>"><img src="<?php echo BASE_URL . "/assets/img/" . $post['image']; ?>" alt="<?php echo $post['title']; ?>"></a>
                        <div class="blog-title">
                            <a href="<?php echo BASE_URL . $link ?>"><h3> <?php echo $post['title']; ?> </h3></a>
                            <button class="btn btn-blog"> <?php echo $post['name']; ?> </button>
                            <span> <?php echo $post['username']; ?> </span>
                            <span> <?php echo date('F j, Y.', strtotime($post['created_at'])); ?> </span>

                            <a href="<?php echo BASE_URL . $link ?>"><span> Read More </span></a>

                        </div>
                    </div>
                    <?php endforeach; ?>




                </div>

                <div class="owl-navigation">

                    <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                    <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>

                </div>
            </div>
        </div>
    </section>
    <!--end of blog Carousel-->


    <!----------Side Content------------>
    <div class="container" style="margin-top: 40px;">
        <div class="site-content">
            <div class="posts" id="blog">
                <h1> <?php echo $postTitle; ?> </h1>
                <?php foreach ($posts as $key => $post): ?>
                <?php
                    $visitors = totalNumber('visitors',['post_id' => $post['id']]);
                    $t_comments = totalNumber('comments',['post_id' =>$post['id']]);

                        //encript post id
                        $encrypt_1 = ($post['id']*123456789*5678);

                         $data= $encrypt_1;
                         $link = "/single.php?d_id=".urlencode(base64_encode($data));


                    ?>
                <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                    <div class="post-image">
                        <div>
                            <a href="<?php echo BASE_URL . $link; ?>"><img src="<?php echo BASE_URL . "/assets/img/" . $post['image']; ?>" class="img" alt="<?php echo $post['title']; ?>"></a>
                        </div>
                        <div class="post-info flex-row">
                            <span ><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;<?php echo $post['username']; ?>.</span>
                            <span class="see"><i class="fas fa-calendar-alt text-gray"> </i>&nbsp;&nbsp;<?php echo date('F j, Y.', strtotime($post['created_at'])); ?>.</span>
                            <span class="no-see no-tablet"><i class="fas fa-eye text-gray "></i>&nbsp;&nbsp;<?php echo $visitors ?> Views.</span>
                            <span class="no-see"><i class="fas fa-comment-alt text-gray "></i>&nbsp;&nbsp;<?php echo $t_comments ?> Comments.</span>


                        </div>
                    </div>
                    <div class="post-title">
                        <a href="<?php echo BASE_URL . $link; ?>"> <?php echo $post['title']; ?> </a>
                        <p><?php echo html_entity_decode(substr($post['body'], 0,150) . '...') ?></p>
                        <a href="<?php echo BASE_URL . $link; ?>"><button class="btn post-btn" data-aos="fade-right" data-aos-delay="200"> Read More &nbsp; <i class="fas fa-arrow-right"></i></button></a>
                    </div>
                </div>
                <hr>
                <?php endforeach; ?>



                <div class="pagination flex-row">
                    <!--<a href="#"><i class="fas fa-chevron-left"></i></a>-->
                    <a href="#" class="pages" data-aos="fade-up" data-aos-delay="200"> View More Posts </a>
                    <!--<a href="#"><i class="fas fa-chevron-right"></i></a>-->
                </div>
            </div>
            <aside class="sidebar">
                <div class="category">
                    <h2> Category </h2>
                    <?php foreach ($topics as $key => $topic ): ?>
                    <?php $total = totalNumber('posts',['topic_id' => $topic['id'] , 'published' => 1]); ?>
                    <ul class="category-list">
                        <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                            <?php
                            //encript post id
                            $encrypt_3 = ($topic['id']*123456789*5678);

                            $data3= $encrypt_3;
                            $link3 = "/index.php?t_id=".urlencode(base64_encode($data3));
                            ?>
                            <a href="<?php echo BASE_URL . $link3 . '&name=' . $topic['name']; ?>"> <?php echo $topic['name']; ?></a>
                            <span data-aos="fade-up" data-aos-delay="200"> (<?php echo $total; ?>) </span>
                        </li>
                    </ul>
                    <?php endforeach; ?>
                </div>

                <div class="popular-post">
                    <h2> Popular Posts </h2>
                    <?php foreach ($posts as $key => $post): ?>
                    <?php
                        $visitors = totalNumber('visitors',['post_id' => $post['id']]);
                        $t_comments = totalNumber('comments',['post_id' =>$post['id']]);

                        //encript post id
                        $encrypt_1 = ($post['id']*123456789*5678);

                         $data= $encrypt_1;
                         $link = "/single.php?d_id=".urlencode(base64_encode($data));


                    ?>
                     <div class="post-content" data-aos="flip-up" data-aos-delay="200">
                            <div class="post-image">
                                <div>
                                <a href="<?php echo BASE_URL . $link; ?>"><img src="<?php echo BASE_URL . "/assets/img/" . $post['image']; ?>" class="img" alt="<?php echo $post['title']; ?>"></a>
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;<?php echo $post['username']; ?>.</span>
                                    <span><i class="fas fa-calendar-alt text-gray"> </i>&nbsp;&nbsp;<?php echo date('F j, Y.', strtotime($post['created_at'])); ?>.</span>


                                </div>
                            </div>
                            <div class="post-title">
                            <a href="<?php echo BASE_URL . $link; ?>"> <?php echo $post['title']; ?> </a>
                            </div>
                        </div>
                        <?php endforeach; ?>




                    <div class="newsletter" style="margin-top: -12rem; margin-bottom:-2rem;" data-aos="fade-up" data-aos-delay="200">
                        <h2> Search Post </h2>
                        <div class="form-element">
                            <form action="index.php" method="post">
                                <input type="text" class="input-element" name="search-term" placeholder=" Search Post">
<!--                                <button class="btn form-btn" type="submit"><i class="fas fa-search"></i> Search </button>
-->                            </form>
                        </div>
                    </div>

                    <div class="newsletter" data-aos="fade-down" data-aos-delay="300">
                        <h2 id="news"> News Letter </h2>
                        <div class="form-element">
                            <?php include(ROOT_PATH . "/app/includes/messages.php");?>
                            <?php include (ROOT_PATH . "/app/helpers/formErrors.php")?>
                            <form action="index.php#news" method="post">
                            <input type="text" name="name" class="input-element" placeholder=" Enter Your Name">
                                <input type="email" class="input-element" name="email" placeholder=" Enter Email"><br>
                                <input type="checkbox" required><span> By continuing, you accept the privacy policy</span>
                            <button type="submit" name="newsletter" class="btn form-btn"> Subscribe </button>
                            </form>
                        </div>
                    </div>

                    <div class="popular-tags">
                        <h2> Popular Tags </h2>
                        <div class="tags flex-row">
                            <span class="tag" data-aos="flip-up" data-aos-delay="100">Software</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="200">Technology</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="300">Travel</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="400">Poetry</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="500"> Quotes</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="600"> Love </span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="700"> Projects</span>

                        </div>
                    </div>




                </div>
            </aside>
        </div>
    </div>

    <!----------End of Side Content------------>

</main>



<!----------------------xxxxx-----------------------End of Main Setion------------------xxxxx------------------------->
<div>
    <a class="gotopbtn" href="#"><i class="fas fa-arrow-up"></i></a>
</div>

<!---------------------------------Footer Section-------------------------------------------->
<?php /*require (ROOT_PATH . "/app/includes/footer.php"); */?>
<footer class="footer">
    <div class="container">

        <div class="about-us" data-aos="fade-right" data-aos-delay="100">
            <h2> About Us </h2>
            <p> This is a Blog that Creates a platform for youths to interact, read
                and get enlightened on how to handle life
                thus enabling them to be free without criticism from society.</p>
        </div>
        <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
            <h2> Newsletter</h2>
            <p> Stay Updated with our Latest Content.</p>
            <div class="form-element">
                <form>
                    <input type="email" placeholder=" Enter Email">
                    <input type="submit" class="btn form-btn" value="Subscribe">
                </form>
            </div>
        </div>
        <div class="gallery" data-aos="fade-left" data-aos-delay="200">
            <h2> Gallery</h2>
            <p> A photographer's Journal </p>
            <div class="flex-row">
                <img src="assets/img/thumb-card3.png" alt="gallery-1">
                <img src="assets/img/thumb-card4.png" alt="gallery-2">
                <img src="assets/img/thumb-card5.png" alt="gallery-3">

            </div>
            <div class="flex-row">
                <img src="assets/img/thumb-card6.png" alt="gallery-4">
                <img src="assets/img/thumb-card7.png" alt="gallery-5">
                <img src="assets/img/thumb-card8.png" alt="gallery-6">

            </div>
        </div>
        <div class="follow" data-aos="fade-left" data-aos-delay="100">
            <h2> Follow Us </h2>
            <p> Let's Be social </p>
            <div>
                <a href="#" class="f-blue"><i class="fab fa-facebook"></i> </a>
                <a href="https://www.linkedin.com/in/david-kariuki-691b3918b/" target="_blank"> <i class="fab fa-linkedin"></i> </a>
                <a href="https://www.instagram.com/davekariz/?hl=en" target="_blank"> <i class="fab fa-instagram"></i> </a>
                <a href="https://github.com/DkariukiM?tab=repositories" target="_blank"> <i class="fab fa-github"></i> </a>

            </div>
        </div>

    </div>

    <div class="right flex-row">
        <h4 class="text-gray"> Copyright  &copy; <script>document.write(new Date().getFullYear())</script>
            All Rights reserved | Designed & Developed by
            <a href="https://www.instagram.com/davekariz/?hl=en" target="_blank" >David Kariuki <i class="fas fa-laptop"></i></a> </h4>
    </div>


</footer>


<!---------------xxxx------------------Footer Section----------------------xxxx---------------------->

<!--jquery-->
<script src="assets/js/jquery-3.4.1.min.js"></script>

<!--Owl Carousel js-->
<script src="assets/js/owl.carousel.min.js"></script>

<!--AOS js-->
<script src="assets/js/aos.js"></script>


<!--custom javascript-->
<script src="assets/js/script.js"></script>
</body>
</html>
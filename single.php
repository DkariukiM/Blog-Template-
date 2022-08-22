<?php
include "path.php";
include (ROOT_PATH . '/app/controllers/posts.php');
//validate comment
function validateComment($comment)
{
    $errors = array();
    if(empty($comment['comment']))
    {
        array_push($errors, 'Please type in your comment');
    }
    return $errors;
}

//validate newsletter
function validateEmail($email)
{
    $errors = array();
    if(empty($email['name']))
    {
        array_push($errors, 'Name is required');
    }
    if(empty($email['email']))
    {
        array_push($errors, 'Email is required');
    }

    $existingMail = selectOne('newsletter', ['email' => $email['email']] );
    if ($existingMail)
    {
        array_push($errors, 'Email already exists');
    }

    return $errors;

}


if (isset($_GET['d_id']))
{
    $p_id = $_GET['d_id'];
    //decode the id
    $decode = base64_decode(urldecode($_GET['d_id']));
    $decript_id = (($decode/5678)/123456789);
    $c_id = '';
    $post = selectOne('posts',['id' => $decript_id]);
    $similars = similarPosts( 'posts',$post['topic_id']);
    $category = selectOne('topics',['id' => $post['topic_id'] ]);


    $c_id = $decript_id;


    //add new viewer to database
    $visitor = $_SERVER['REMOTE_ADDR'];
    //check for uniqueness of ip_address
    $check = selectOne('visitors',['ip_address' => $visitor , 'post_id' => $decript_id]);
    if ($check)
    {

    }
    else
    {
        $post_id = create('visitors', ['post_id' => $decript_id , 'ip_address' => $visitor]);
    }

    $visitors = totalNumber('visitors',['post_id' => $decript_id]);
    $t_comments = totalNumber('comments',['post_id' =>$decript_id]);
    /*dd($post);*/

    //comments
    if (isset($_POST['add-comment']))
    {
        validComment();
        $errors = validateComment($_POST);
        if (count($errors) === 0)
        {
            $_POST['username'] = $_SESSION['username'];
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['comment'] = htmlentities($_POST['comment']);
            unset($_POST['add-comment']);
            $comment_id = create('comments', $_POST);

            $_SESSION['message'] = 'Comment successfully saved';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . "/single.php?d_id=$p_id#comment-div");
            exit();
        }else
        {
            $comment = $_POST['comment'];
            /*        dd($_POST);*/
        }


    }

//newsletter
if (isset($_POST['newsletter'])) {
    $errors = validateEmail($_POST);

    if (count($errors) === 0) {
        unset($_POST['newsletter']);
        $_POST['sub'] = 1;
        $letter_id = create('newsletter', $_POST);

        $_SESSION['message'] = 'Successfully Subscribed to our newsletter.';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/single.php?id=$p_id#newsletter");
        exit();
        /*        dd($_POST);*/
    }
}
}else
{
    header('location:' . BASE_URL . "/index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $post['title'] ?> || Peer Talk </title>
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
    <link rel="stylesheet" href="assets/css/style.css">



    <!--Google fonts -->
    <!--    <link href="https://fonts.googleapis.com/css?family=Abel|Atomic+Age|Black+Ops+One|Gotu|Livvic|Reenie+Beanie|Sarina&display=swap" rel="stylesheet">
    -->

</head>
<body>

<!---------------------------------------------Navigation------------------------------------------->
<?php require (ROOT_PATH . "/app/includes/header.php"); ?>
<!----------------------xxxxx-----------------------End of Navigation-------------------xxxxx------------------------>

<!---------------------------------------------Main section------------------------------------------->

<main>
    <!----------Side Content------------>
    <div class="container" style="margin-top: 40px;">
        <div class="site-content">
            <div class="posts" id="blog">
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                        <?php
                            //encript post id
                            $encrypt_3 = ($category['id']*123456789*5678);

                            $data3= $encrypt_3;
                            $link3 = "/index.php?t_id=".urlencode(base64_encode($data3));
                            ?>
                            <p> <a href="<?php echo BASE_URL . "/index.php" ?>"><i class="fa fa-home">Home</i></a> / <a href="<?php echo BASE_URL . $link3 . '&name=' . $category['name']; ?>"> <?php echo $category['name']; ?></a> / <a href="single.php?id=<?php echo $post['id']; ?>"> <?php echo $post['title']; ?></a></p>
                            <div>
                                <img src="<?php echo BASE_URL . "/assets/img/" . $post['image']; ?>" class="img" alt="<?php echo $post['title']; ?>">
                            </div>
                            <div class="post-info flex-row" data-aos="fade-right" data-aos-delay="400">
                                <span data-aos="fade-right" data-aos-delay="600" ><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;<?php echo $post['username']; ?>.</span>
                                <span class="see" data-aos="fade-up" data-aos-delay="600"><i class="fas fa-calendar-alt text-gray"> </i>&nbsp;&nbsp;<?php echo date('F j, Y.', strtotime($post['created_at'])); ?></span>
                                <span class="no-tablet" data-aos="fade-down" data-aos-delay="600"><i class="fas fa-eye text-gray "></i>&nbsp;&nbsp;<?php echo $visitors ?></span>
                                <span data-aos="fade-left" data-aos-delay="600"><i class="fas fa-comment-alt text-gray "></i>&nbsp;&nbsp; <?php echo $t_comments ?></span>


                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#" > <?php echo $post['title']; ?> </a>
                            <p><?php echo html_entity_decode($post['body']) ?></p>
                        </div>
                    </div>
                    <hr>

                <div class="form-element" data-aos="fade-left" data-aos-delay="200">
                    <h3 data-aos="fade-right" data-aos-delay="400" id="comment-div">Leave a comment</h3>
                    <?php
                    //encript post id
                    $encrypt_1 = ($post['id']*123456789*5678);

                    $data= $encrypt_1;
                    $link = "single.php?d_id=".urlencode(base64_encode($data));
                    ?>
                    <form action="<?php echo $link . "#comment-div" ?> " method="post" data-aos="zoom-in" data-aos-delay="500" >
                        <?php include(ROOT_PATH . "/app/includes/messages.php");?>
                        <?php include (ROOT_PATH . "/app/helpers/formErrors.php")?>
                        <input type="hidden" name="post_id" value="<?php echo $post['id'] ?>">
                        <textarea class="input-element" id="comment" name="comment" required> <?php echo $comment; ?> </textarea>
                        <button class="btn form-btn" type="submit" name="add-comment" style="margin: 1.5rem 5rem " data-aos="fade-right" data-aos-delay="600" > Add Comment </button>
                    </form>

                </div>

                <hr>


                <div class="pagination flex-row">
                    <!--<a href="#"><i class="fas fa-chevron-left"></i></a>-->
                    <a href="<?php echo BASE_URL . "/index.php#blog"; ?>" class="pages" data-aos="fade-up" data-aos-delay="200"> View More Posts. </a>
                    <!--<a href="#"><i class="fas fa-chevron-right"></i></a>-->
                </div>
            </div>
            <aside class="sidebar">
                <div class="popular-post" style="margin-top: -8rem;">
                    <h2> Similar Posts </h2>
                    <?php foreach ($similars as $key => $similar):?>
                        <?php
                        //encript post id
                        $encrypt = ($similar['id']*123456789*5678);

                        $data2= $encrypt;
                        $link2 = "single.php?d_id=".urlencode(base64_encode($data2));
                        ?>

                    <div class="post-content" data-aos="flip-up" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <a href="<?php echo $link2; ?>"><img src="<?php echo BASE_URL . "/assets/img/" . $similar['image']; ?>" class="img" alt="<?php echo $similar['title']; ?>"></a>
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;<?php echo $similar['username']; ?>.</span>
                                <span><i class="fas fa-calendar-alt text-gray"> </i>&nbsp;&nbsp;<?php echo date('F j, Y.', strtotime($similar['created_at'])); ?>.</span>


                            </div>
                        </div>
                        <div class="post-title">
                            <a href="<?php echo $link2; ?>"> <?php echo $similar['title']; ?> </a>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <div class="newsletter" style="margin-top:-5rem; margin-bottom:-2rem;" data-aos="fade-up" data-aos-delay="200">
                        <h2> Search Post </h2>
                        <div class="form-element">
                            <form action="index.php" method="post">
                                <input type="text" class="input-element" name="search-term" placeholder=" Search Post">
                            </form>
                        </div>
                    </div>

                    <div class="newsletter" data-aos="fade-down" data-aos-delay="300">
                        <h2 id="newsletter"> &nbsp; News Letter </h2>
                        <div class="form-element">

                            <form method="post" action="<?php echo $link . "#newsletter" ?>">
                                <?php
                                include(ROOT_PATH . "/app/includes/messages.php");
                                include (ROOT_PATH . "/app/helpers/formErrors.php");
                                ?>

                                <input type="text" class="input-element" name="name" placeholder=" Enter Your name">
                                <input type="email" class="input-element" name="email" placeholder=" Enter Email"><br>
                                <input type="checkbox" required><span> By continuing, you accept the privacy policy</span>
                                <button type="submit" class="btn form-btn" name="newsletter"> Subscribe </button>
                            </form>
                        </div>
                    </div>

                    <div class="popular-tags">
                        <h2> Popular Tags </h2>
                        <div class="tags flex-row">
                            <?php foreach ($topics as $key => $topic ): ?>
                                <?php
                                //encript post id
                                $encrypt_3 = ($topic['id']*123456789*5678);

                                $data3= $encrypt_3;
                                $link3 = "index.php?t_id=".urlencode(base64_encode($data3));
                                ?>
                                <span class="tag" data-aos="flip-up" data-aos-delay="200"><a href="<?php echo BASE_URL . $link3 . '&name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a></span>
                            <?php endforeach; ?>
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
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#comment' ), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ]
            }
        } )
        .catch( error => {
            console.log( error );
        } );
</script>

<!--Owl Carousel js-->
<script src="assets/js/owl.carousel.min.js"></script>

<!--AOS js-->
<script src="assets/js/aos.js"></script>


<!--custom javascript-->
<script src="assets/js/script.js"></script>
</body>
</html>


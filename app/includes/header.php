<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 4/1/2020
 * Time: 5:17 PM
 */
?>
<nav class="nav">
    <div class="nav-menu flex-row">
        <div class="nav-brand">
            <a href="<?php echo BASE_URL . '/index.php' ?>" class="text-gray" data-aos="fade-right"> <span> Wambui's </span> Column </a>
        </div>

        <div class="toggle-collapse">

            <div class="toggle-icons" data-aos="fade-left">
                <i class="fas fa-bars"></i>
            </div>

        </div>

        <div>
            <ul class="nav-items">
                <li class="nav-link" data-aos="fade-left">
                    <a href="<?php echo BASE_URL . '/index.php' ?>">Home</a>
                </li>

                <li class="nav-link" data-aos="fade-left" data-aos-delay="100">
                    <a href="<?php echo BASE_URL . '/about.php' ?>"> About</a>
                </li>
                <?php if (isset($_SESSION['id'])): ?>
                    <li class="nav-link" data-aos="fade-left" data-aos-delay="200">
                        <a href="<?php echo BASE_URL . '/contact.php' ?>"> Contact Us </a>
                    </li>
                <li class="nav-link" data-aos="fade-left" data-aos-delay="300">
                    <a href="<?php echo BASE_URL . '/dashboard/dashboard.php' ?>"> Dashboard </a>
                </li>
                    <li class="nav-link" data-aos="fade-left" data-aos-delay="400">
                        <a href="<?php echo BASE_URL . '/logout.php' ?>" style="color: red;"> Logout </a>
                    </li>
                <li class="nav-link" data-aos="fade-left" data-aos-delay="400">
                    <a href="#"> <?php echo $_SESSION['username'] ?> </a>
                </li>
                <?php else: ?>
                <li class="nav-link" data-aos="fade-left" data-aos-delay="200">
                    <a href="<?php echo BASE_URL . '/login.php' ?>"> Login </a>
                </li>

                <li class="nav-link" data-aos="fade-left" data-aos-delay="300">
                    <a href="<?php echo BASE_URL . '/signup.php' ?>"> Sign Up </a>
                </li>

                <li class="nav-link" data-aos="fade-left" data-aos-delay="400">
                    <a href="<?php echo BASE_URL . '/contact.php' ?>"> Contact Us </a>
                </li>
                <?php endif; ?>

            </ul>
        </div>

        <div class="social text-grey">
            <a href="#" class="f-blue" data-aos="fade-up" ><i class="fab fa-facebook"></i> </a>
            <a href="https://www.linkedin.com/in/david-kariuki-691b3918b/" target="_blank" class="l-blue" data-aos="fade-up" data-aos-delay="200"> <i class="fab fa-linkedin"></i> </a>
            <a href="https://www.instagram.com/davekariz/?hl=en" class="red" target="_blank" data-aos="fade-up" data-aos-delay="400"> <i class="fab fa-instagram"></i> </a>
            <a href="https://github.com/DkariukiM?tab=repositories" target="_blank" class="t-blue" data-aos="fade-up" data-aos-delay="600"> <i class="fab fa-github"></i> </a>



        </div>
    </div>


</nav>

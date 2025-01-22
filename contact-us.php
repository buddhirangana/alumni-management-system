<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Alumni Association SICT</title>
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php include('includes/header.php'); ?>

    <section class="py-5 py-xl-8">
        <div class="page-header-area">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="section-title-wrapper text-white">
                            <div class="text-white hidden">
                                <h1 class="text-white mb-3 mt-4">Contact Us</h1>
                                <p class="text-white"><a href="/">Home </a> &nbsp; <i class="bi bi-arrow-right"></i> &nbsp; <span class="lnr lnr-arrow-right"></span>
                                    <a href="contact-us.php">Contact Us</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 py-md-4 mb-5">
        <div class="container">
            <div class="row gy-3 gy-md-4 gy-lg-0 align-items-md-center">
                <div class="col-12 col-lg-6">
                    <div class="row justify-content-xl-center">
                        <div class="col-12 col-xl-11">
                            <h2 class="mb-3 display-5 mb-xl-9 aluh1 hidden">Get in touch</h2>
                            <p class="lead fs-4 text-secondary mb-5 hidden">Your ideas and suggestions are welcome. Please use this section to contact us about this site and alumni activities.</p>
                            <div class="d-flex mb-5 hidden">
                                <div class="me-4 text-primary">
                                    <i class="bi bi-geo-alt" style="color:var(--accent-color);font-size: 32px;"></i>
                                </div>
                                <div>
                                    <h4 class="mb-3">Address</h4>
                                    <address class="mb-0 text-secondary">Alumni Association, School of ICT, Nāgānanda International Institute for Buddhist Studies, Manelwatta, Bollegala, Kelaniya, Sri Lanka.</address>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-12 col-sm-6 hidden">
                                    <div class="d-flex mb-5 mb-sm-0">
                                        <div class="me-4 text-primary">
                                            <i class="bi bi-telephone-outbound" style="color:var(--accent-color);font-size: 32px;"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-3">Phone</h4>
                                            <p class="mb-0">
                                                <a class="link-secondary text-decoration-none" href="tel:+94112904676">+94 11 2904 676</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 hidden">
                                    <div class="d-flex mb-0">
                                        <div class="me-4 text-primary">
                                            <i class="bi bi-envelope-at" style="color:var(--accent-color);font-size: 32px;"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-3">E-Mail</h4>
                                            <p class="mb-0">
                                                <a class="link-secondary text-decoration-none" href="mailto:itschool@niibs.edu.lk">itschool@niibs.edu.lk</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="bg-white border shadow-sm overflow-hidden hidden" style="border-radius: 20px;">
                        <form action="" method="post">
                            <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                                <div class="col-12">
                                    <label for="fullname" id="fullname-info" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fullname" name="fullname" value="" required style="border-radius: 20px;">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="email" id="email-info" class="form-label">Email <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="border-radius: 20px 0px 0px 20px;">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" value="" required style="border-radius: 0px 20px 20px 0px;">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="phone" id="phone-info" class="form-label">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="border-radius: 20px 0px 0px 20px;">
                                            <i class="bi bi-telephone"></i>
                                        </span>
                                        <input type="tel" class="form-control" id="phone" name="phone" value="" style="border-radius: 0px 20px 20px 0px;">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="subject" id="subject-info" class="form-label">Subject <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="subject" name="subject" value="" required style="border-radius: 20px;">
                                </div>
                                <div class="col-12">
                                    <label for="message" id="message-info" class="form-label">Message <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="message" name="message" rows="3" required style="border-radius: 20px;"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn calltoactionbtn btn-lg" type="submit" style="width: auto; height: auto;">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-2">
        <div class="hidden">
            <div class="col-md-12 mb-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15842.19166540632!2d79.950808!3d6.944505!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae257a7a4a13801%3A0xb6dd898cc5999b09!2sN%C4%81g%C4%81nanda%20International%20Institute%20for%20Buddhist%20Studies%20(NIIBS)!5e0!3m2!1sen!2slk!4v1723027780862!5m2!1sen!2slk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <?php include('includes/footer.php'); ?>
    
</body>

</html>
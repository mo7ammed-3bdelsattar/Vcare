<?php require_once "../classes/footer.php"?>
<?php

 require_once "../classes/Header.php";
 $header=new Header();
 echo $header->getHeader('Contact');
require_once "../classes/Header.php";
require_once "../classes/nav.php";

$header = new Header();
$nav = new Nav();
echo $header->getHeader('Contact');

?>
<div class="page-wrapper">
    <?php echo $nav->getNav(); ?>
    <div class="container">

        <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
            <form class="form">
                <div class="form-items">
                    <div class="mb-3">
                        <label class="form-label required-label" for="name">Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="subject">subject</label>
                        <input type="text" class="form-control" id="subject" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="message">message</label>
                        <textarea class="form-control" id="message" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>

    </div>
</div>

   <?php $footer=new Footer(); 
    echo $footer->gitFooter();
   ?>

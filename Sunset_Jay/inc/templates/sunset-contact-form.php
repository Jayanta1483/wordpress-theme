<?php

/*

@package Sunset -- Template for Contact Form


*/

?>

<div class="form-container">
  <div class="contact-form-symbol">

  </div>
  <form class="contact-form" id="contactForm" method="post" action="#" >
    <div class="form-group">
      <input type="text" name="name" value="" class="form-control contact-name" placeholder="YOUR NAME" >
    </div>
    <div class="form-group">
      <input type="email" name="email" value="" class="form-control contact-email" placeholder="YOUR EMAIL" >
    </div>
    <div class="form-group">
      <textarea name="message" class="form-control contact-message" placeholder="YOUR MESSAGE" ></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Submit" name="contactSub" id="contactSub">
    <?php wp_nonce_field('sunset_contact_form-wpnonce', 'sunset_contact_form'); ?>
  </form>
</div>

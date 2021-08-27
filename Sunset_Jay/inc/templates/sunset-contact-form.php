<?php

/*

@package Sunset -- Template for Contact Form


*/

?>

<div class="form-container">
  <form class="contact-form" action="#" method="post">
    <div class="form-group">
      <input type="text" name="name" value="" class="form-control contact-name" placeholder="Your Name" required>
    </div>
    <div class="form-group">
      <input type="email" name="email" value="" class="form-control contact-email" placeholder="Your Email" required>
    </div>
    <div class="form-group">
      <textarea name="message" class="form-control contact-message" placeholder="Your Message" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

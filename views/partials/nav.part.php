<!-- Navigation Bar -->
<nav class="navbar navbar-fixed-top navbar-default">
     <div class="container">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a  class="navbar-brand page-scroll" href="#page-top">
              <span class="miTitulo">[DWES.LOCAL]</span>
            </a>
         </div>
         <div class="collapse navbar-collapse navbar-right" id="menu">
            <ul class="nav navbar-nav miNav">
              <li class="<?php generarActive('/') ?> lien"><a href="<?php generarHref('/') ?>"><i class="fa fa-home sr-icons"></i> Home</a></li>
              <li class="<?php generarActive('/about.php') ?> lien"><a href="<?php generarHref('/about.php') ?>"><i class="fa fa-bookmark sr-icons"></i> About</a></li>
              <li class="<?php generarActiveBlogPost(['/blog.php', '/single_post.php']) ?> lien"><a href="<?php generarHref('/blog.php') ?>"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
              <li class="<?php generarActive('/contact.php') ?> lien"><a href="<?php generarHref('/contact.php') ?>"><i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
              <li class="<?php generarActive('/gallery.php') ?>"><a href="<?php generarHref('/gallery.php') ?>"><i class="fa fa-image sr-icons"></i> Gallery</a></li>
            </ul>
         </div>
     </div>
   </nav>
<!-- End of Navigation Bar -->
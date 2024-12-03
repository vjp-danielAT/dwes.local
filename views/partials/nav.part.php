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
              <li class="<?php generarActive('/about') ?> lien"><a href="<?php generarHref('/about') ?>"><i class="fa fa-bookmark sr-icons"></i> About</a></li>
              <li class="<?php generarActiveBlogPost(['/blog', '/post']) ?> lien"><a href="<?php generarHref('/blog') ?>"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
              <li class="<?php generarActive('/contacto') ?> lien"><a href="<?php generarHref('/contacto') ?>"><i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
              <li class="<?php generarActive('/galeria') ?> lien"><a href="<?php generarHref('/galeria') ?>"><i class="fa fa-image sr-icons"></i> Gallery</a></li>
              <li class="<?php generarActive('/asociados') ?>"><a href="<?php generarHref('/asociados') ?>"><i class="fa fa-hand-o-right sr-icons"></i> Partners</a></li>
            </ul>
         </div>
     </div>
   </nav>
<!-- End of Navigation Bar -->
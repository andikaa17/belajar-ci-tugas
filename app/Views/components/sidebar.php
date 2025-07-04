<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
  <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="/">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
  <a class="nav-link <?php echo (uri_string() == 'keranjang') ? "" : "collapsed" ?>" href="keranjang">
      <i class="bi bi-cart-check"></i>
      <span>Keranjang</span>
    </a>
  </li><!-- End Keranjang Nav -->

  <?php
        if (session()->get('role') == 'admin') {
        ?>

  <li class="nav-item">
  <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="produk">
        <i class="bi bi-receipt"></i>
      <span>Produk</span>
    </a>
  </li><!-- End Produk Nav -->


   <!-- Tambahkan Menu Diskon di sini -->
  <?php if(session()->get('role') == 'admin') : ?>
<li class="nav-item">
    <a class="nav-link <?= (url_is('diskon*')) ? 'active' : 'collapsed' ?>" 
       href="<?= base_url('diskon') ?>">
       <i class="bi bi-tag-fill"></i>
       <span>Diskon</span>
    </a>
</li>
<?php endif; ?>

  <?php
        }
        ?>

         <li class="nav-item">
  <a class="nav-link <?php echo (uri_string() == 'produk-kategori') ? "" : "collapsed" ?>" href="produk-kategori">
        <i class="bi bi-receipt-cutoff"></i>
      <span>Kategori Produk</span>
    </a>
  </li><!-- End Produk Kategori Nav -->
  
  

  <li class="nav-item">
      <a class="nav-link" <?php echo (uri_string() == 'profile') ? "" : "collapsed" ?>" href="profile">
        <i class="bi bi-person-circle"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile -->

  <li class="nav-item">
      <a class="nav-link" <?php echo (uri_string() == 'faq') ? "" : "collapsed" ?>" href="faq">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
      </a>
    </li><!-- End F.A.Q nav -->
    
  <li class="nav-item">
      <a class="nav-link" <?php echo (uri_string() == 'contact') ? "" : "collapsed" ?>" href="contact">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
      </a>
    </li><!-- End F.A.Q nav -->
        
    </ul>

</aside><!-- End Sidebar-->
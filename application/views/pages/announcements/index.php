<?= $this->load->view('layouts/welcome_header', NULL, true); ?>

<!-- Inner Content Box ==== -->
<div class="page-content bg-white">
  <!-- Page Heading Box ==== -->
  <div class="page-banner ovbl-dark" style="background-image:url(<?= base_url(); ?>public/images/banner/banner1.jpg);">
    <div class="container">
      <div class="page-banner-entry">
        <h1 class="text-white">Pengumuman Angkatan</h1>
      </div>
    </div>
  </div>
  <div class="breadcrumb-row">
    <div class="container">
      <ul class="list-inline">
        <li><a href="<?= site_url(); ?>">Home</a></li>
        <li>Pengumuman Angkatan</li>
      </ul>
    </div>
  </div>
  <!-- Page Heading Box END ==== -->

  <div class="container my-5">
    <h3>Cari Pengumuman</h3>
    <table id="table1" class="table table-bordered table-hover text-center">
      <thead>
      <tr>
        <th>Gambar</th>
        <th>Judul</th>
        <th>Deskripsi Singkat</th>
        <th>Tanggal</th>
        <th>Penulis</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($announcements as $announcement): ?>
      <tr>
        <td class="align-middle"><img src="<?= ($announcement->image!==null) ? html_escape($announcement->image) : base_url('public/images/announcements/default.jpg'); ?>" alt="" style="max-width:100px"></td>
        <td class="align-middle judul"><?= html_escape($announcement->title) ?></td>
        <td class="align-middle"><?= html_escape($announcement->excerpt) ?></td>
        <td class="align-middle"><?= html_escape($announcement->created_at) ?></td>
        <td class="align-middle"><?= html_escape($announcement->author_name) ?></td>
        <td class="align-middle">
          <a href="<?= site_url('announcements/show/') . $announcement->slug?>" class="badge badge-info">Lihat</a>          
        </td>
      </tr>
      <?php endforeach; ?>
      </tbody>
      <tfoot>
      <tr>
        <th>Gambar</th>
        <th>Judul</th>
        <th>Deskripsi Singkat</th>
        <th>Tanggal</th>
        <th>Penulis</th>
        <th>Aksi</th>
      </tr>
      </tfoot>
    </table>
  </div>
</div>
<!-- Inner Content Box END ==== -->

<?= $this->load->view('layouts/welcome_footer', NULL, true); ?>
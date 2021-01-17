<?= $this->load->view('layouts/welcome_header', NULL, true); ?>

<div class="page-content">
    <!-- Page Heading Box ==== -->
    <div class="page-banner ovbl-dark" style="background-image:url(<?= base_url(); ?>public/images/banner/banner2.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Struktur Sukarelawan Angkatan</h1>
                </div>
        </div>
    </div>
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="<?= site_url(); ?>">Home</a></li>
                <li>Struktur Sukarelawan Angkatan</li>
            </ul>
        </div>
    </div>
    <!-- Page Heading Box END ==== -->
    <!-- Page Content Box ==== -->
    <div class="content-block">       
        <div class="section-area section-sp2">
            <div class="d-flex justify-content-center">
                <div class="container">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Yusuf Habibi Harahap</td>
                        <td>5-03</td>
                        <td>Ketua Angkatan</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Belladinna Afnan Zuhmi</td>
                        <td>5-25</td>
                        <td>Sekretaris</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>Ayodhya Agti Firdausa</td>
                        <td>5-29</td>
                        <td>Bendahara</td>
                        </tr>
                        <tr>
                        <th scope="row">4</th>
                        <td>Yurita Putri Rahmasari</td>
                        <td>5-11</td>
                        <td>Bidang Pendidikan</td>
                        </tr>
                        <tr>
                        <th scope="row">5</th>
                        <td>Titania Audrey Al Fikriyyah</td>
                        <td>5-12</td>
                        <td>Bidang Pendidikan</td>
                        </tr>
                        <tr>
                        <th scope="row">6</th>
                        <td>Widya Sri Lestari</td>
                        <td>5-18</td>
                        <td>Bidang Pendidikan</td>
                        </tr>
                        <tr>
                        <th scope="row">7</th>
                        <td>Vandhana Prasasti Salsabila</td>
                        <td>5-15</td>
                        <td>Bidang Pendidikan</td>
                        </tr>
                        <tr>
                        <th scope="row">8</th>
                        <td>Chika Salsabila</td>
                        <td>5-02</td>
                        <td>Bidang Kominfo</td>
                        </tr>
                        <tr>
                        <th scope="row">9</th>
                        <td>Giovanni Octa Anggoman</td>
                        <td>5-04</td>
                        <td>Bidang Kominfo</td>
                        </tr>
                        <tr>
                        <th scope="row">10</th>
                        <td>Jalu Satria Pratama</td>
                        <td>5-32</td>
                        <td>Bidang Kominfo</td>
                        </tr>
                        <tr>
                        <th scope="row">11</th>
                        <td>Muhammad Ivan Alfitra Darussalam</td>
                        <td>5-02</td>
                        <td>Bidang Kominfo</td>
                        </tr>
                        <tr>
                        <th scope="row">12</th>
                        <td>Permata Namyra Maulia</td>
                        <td>5-06</td>
                        <td>Bidang Kominfo</td>
                        </tr>
                        <tr>
                        <th scope="row">13</th>
                        <td>Agung Nugraha</td>
                        <td>5-19</td>
                        <td>Bidang Sosial</td>
                        </tr>
                        <tr>
                        <th scope="row">14</th>
                        <td>Muhamad Solihin</td>
                        <td>5-22</td>
                        <td>Bidang Sosial</td>
                        </tr>
                        <tr>
                        <th scope="row">15</th>
                        <td>Muhammad Tirta Artesian</td>
                        <td>5-17</td>
                        <td>Bidang Sosial</td>
                        </tr>
                        <tr>
                        <th scope="row">16</th>
                        <td>Siti Mutiah Rahmadanti</td>
                        <td>5-05</td>
                        <td>Bidang Sosial</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>       
        </div>
    </div>
    <!-- Page Content Box END ==== -->  
</div>

<?= $this->load->view('layouts/welcome_footer', NULL, true); ?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?= $this->load->view('layouts/dashboard_header', NULL, true) ?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Angota dari grup <strong><?= $group->name ?></strong></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <?= form_open($form_destination, ['class' => 'form-horizontal']); ?>
            <div class="form-group row">
              <label for="inputUsers" class="col-sm-2 col-form-label">Tambahkan Anggota:</label>
              <div class="select2-yellow col-sm-8">
                <select name="user_ids[]" class="select2" id="inputUsers" multiple="multiple" data-placeholder="Pilih Anggota" data-dropdown-css-class="select2-yellow" style="width: 100%;">
                  <?php foreach($users as $user): ?>
                  <option value="<?= html_escape($user->id) ?>"><?= html_escape($user->email) ?></option>                    
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-sm-2">
                <button type="submit" class="btn btn-warning">Submit</button>              
              </div>
            </div>
          </form>
          <hr>
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>NPM</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users_in_group as $user): ?>
            <tr>
              <td></td>
              <td><?= html_escape($user->fullname) ?></td>
              <td><?= html_escape($user->email) ?></td>
              <td class="text-center">                                
                <a href="<?= site_url('dashboard/groups/remove_member/') . $group->id . '/' . $user->id ?>" class="badge badge-danger" onclick="return delete_confirmation()">remove </a>
              </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>NPM</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>Aksi</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<?= $this->load->view('layouts/dashboard_footer', NULL, true) ?>
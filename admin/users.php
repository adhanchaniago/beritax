<?php require ('includes/topheader.php'); ?>
<?php require ('includes/leftsidebar.php'); ?>

<?php tambah_user();
 ?>
<?php edit_user();
 ?>

<?php pesan(); ?>

      <h2 id="mng_user">User Management</h2>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalTambahUser">Tambah User</button>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Last Activity</th>
              <th>IP Lgin</th>
              <th>Change Status</th>
              <th>Active/Inactive</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $qry = mysqli_query($conn,"SELECT * FROM users");
            while ($data = mysqli_fetch_assoc($qry)) {
             ?>
            <tr>
              <td><?php echo $data['id']; ?></td>
              <td><?php echo $data['name'] ?></td>
              <td><?php echo $data['username'] ?></td>
              <td><?php echo $data['lastactivity'] ?></td>
              <td><?php echo $data['login_ip'] ?></td>
              <td>
                <?php 
                  if ($data['status']==1) {
                    echo "<p id=sts".$data['id']." style='color: green'>Active</p>";
                  }
                  else {
                    echo "<p sts".$data['id']." style='color: red'>Inactive</p>";
                  }
                 ?>
              </td>
              <td><select onchange="active_inactive_user(this.value,<?php echo $data['id'];?>)">
                  <option value="">--Pilih</option>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
              </select></td>
              <td>
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalEditUser">Edit</button>
      <a href="proses_del_user.php?id=<?=$data['id'];?>" onclick="return confirm('Apakah anda yakin akan menghapus?')"><button type="button" class="btn btn-danger">Delete</button></a>
    </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
<hr>

<?php require ('includes/footer.php'); ?>
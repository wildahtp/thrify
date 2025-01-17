<?php
session_start();
include("../koneksi/koneksi.php");
include("./classes/View.php");
$pageTitle = "Provider Pembayaran";
$pageSeq = 4;
?>
<!doctype html>
<html lang="en">
<?php include("./chunks/head.php") ?>

<body class="antialiased">
  <div class="wrapper">
    <?php include("./chunks/sidebar.php") ?>
    <div class="page-wrapper">
      <div class="container-fluid">
        <!-- Page title -->
        <div class="page-header d-print-none">
          <div class="row align-items-center">
            <div class="col">
              <div class="page-pretitle">
                Data Master
              </div>
              <h2 class="page-title">
                Provider Pembayaran
              </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
              <div class="btn-list">
                <a href="providerpembayaran-tambah.php" class="btn btn-primary d-none d-sm-inline-block">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                  </svg>
                  Tambah Provider
                </a>
                <a href="providerpembayaran-tambah.php" class="btn btn-primary d-sm-none btn-icon" aria-label="Tambah Provider">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="page-body">
        <div class="container-xl">
          <div class="row row-cards">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Provider Pembayaran</h3>
                </div>
                <div class="card-body border-bottom py-3">
                  <div class="d-flex">
                    <div class="text-muted">
                      Search:
                      <div class="ms-md-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" aria-label="Search brand">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table card-table table-vcenter datatable">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Provider</th>
                        <th>No. Rek</th>
                        <th class="text-center text-md-end">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = "SELECT * FROM tbl_provider WHERE deleted IS NULL OR deleted = 0";
                      $ret = mysqli_query($koneksi, $query);
                      $jum = mysqli_num_rows($ret);
                      if ($jum > 0) {
                        $no = 0;
                        while ($data = mysqli_fetch_row($ret)) {
                          $no++;
                          $id_provider = $data[0];
                          $nama_provider = $data[1];
                          $no_rek = $data[2];
                          $logo_provider = $data[3];
                      ?>
                          <tr>
                            <td data-label="No."><span class="text-muted"><?= $no ?></span></td>
                            <td data-label="Provider">
                              <div class="d-flex py-1 align-items-center">
                                <span class="payment payment-s me-2" style="background-image: url(./assets/images/providers/<?= $logo_provider ?>)"></span>
                                <a href="providerpembayaran-edit.php?id=<?= $id_provider ?>" class="flex-fill text-dark"><?= $nama_provider ?></a>
                              </div>
                            </td>
                            <td><?= $no_rek ?></td>
                            <td data-label="Action">
                              <div class="btn-list justify-content-md-end flex-nowrap">
                                <a href="providerpembayaran-edit.php?id=<?= $id_provider ?>" class="btn btn-outline-primary">
                                  Edit
                                </a>
                                <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?= $nama_provider ?>?'))window.location.href = './handlers/providerpembayaran.php?hapus=<?= $id_provider ?>'" class="btn btn-outline-danger">
                                  Hapus
                                </a>
                              </div>
                            </td>
                          </tr>
                      <?php }
                      } ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                  <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
                  <ul class="pagination m-0 ms-auto">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <polyline points="15 6 9 12 15 18" />
                        </svg>
                      </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <polyline points="9 6 15 12 9 18" />
                        </svg>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include("./chunks/footer.php") ?>
    </div>
  </div>
  <!-- Libs JS -->
  <!-- Tabler Core -->
  <script src="./dist/js/tabler.min.js"></script>
</body>

</html>
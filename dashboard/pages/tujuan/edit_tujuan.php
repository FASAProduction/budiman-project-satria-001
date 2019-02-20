<?php
$kon = new mysqli("localhost", "root", "", "budiman");

$id_tujuan = $_GET['id_tujuan'];

$query = mysqli_query($kon, "select * from tujuan where tujuan.id_tujuan='$id_tujuan'") or die(mysqli_error());

$data = mysqli_fetch_array($query);

?>
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline12-list">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Edit Data Tujuan</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-form-element-inner">
                                        <form action="pages/tujuan/proses_edit.php" method="post">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Nama
                                                            Tujuan</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                                                        <input type="text" name="nama_tujuan" class="form-control"
                                                            value="<?php echo $data['nama_tujuan']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Harga</label>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                        <input type="text" name="harga" class="form-control"
                                                            value="<?php echo $data['harga']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

                                                        </div>
                                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                            <input type="hidden" name="id_tujuan" class="form-control"
                                                                value="<?php echo $data['id_tujuan']; ?>" />
                                                            <input class="btn btn-white" onclick="window.history.back()"
                                                                type="reset" />
                                                            <input class="btn btn-sm btn-primary login-submit-cs"
                                                                type="submit" value="Simpan" name="simpan" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

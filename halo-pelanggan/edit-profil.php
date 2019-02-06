<form action="proses_edit.php" method="POST">
                                                    <div class="row">
                                                        <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                        <input type="hidden" class="form-control form-control-lg" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>">
                                                            <div class="form-group">
                                                                <label for="name">Nama Anda</label>
                                                                <input type="text" class="form-control form-control-lg" name="nama" value="<?php echo $data['nama_pelanggan']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Alamat</label>
                                                                <textarea class="form-control" name="alamat" rows="6"><?php echo $data['alamat']; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                            <label for="jk">Jenis Kelamin</label><br/>
                                                            <label class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" name="jk" value="Pria" class="custom-control-input" <?php if ($jk == 'Pria') {
                                                                                                                echo 'checked';
                                                                                                            } ?>><span class="custom-control-label">Pria</span>
                                                            </label>
                                                            <label class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" name="jk" value="Wanita" class="custom-control-input" <?php if ($jk == 'Wanita') {
                                                                                                                echo 'checked';
                                                                                                            } ?>><span class="custom-control-label">Wanita</span>
                                                            </label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Tanggal Lahir</label>
                                                                <input type="date" class="form-control form-control-lg" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">No KTP</label>
                                                                <input type="number" class="form-control form-control-lg" name="ktp" value="<?php echo $data['no_ktp']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">No HP</label>
                                                                <input type="number" class="form-control form-control-lg" name="telp" value="<?php echo $data['no_telp']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Ubah Password Baru</label>
                                                                <input type="password" class="form-control form-control-lg" name="pass" value="<?php echo $data['password']; ?>">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary float-right">Ubah Data Anda</button>
                                                        </div>
                                                    </div>
                                                </form>
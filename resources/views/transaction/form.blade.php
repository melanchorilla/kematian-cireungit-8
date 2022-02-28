    <!-- Modal Transaction -->
    <div class="modal fade" id="modalTransaction" tabindex="-1" role="dialog" aria-labelledby="modalTransactionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTransactionLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form action="" method="post" class="form-horizontal" data-toggle="validator" id="formTransaction">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="penerimaan">Penerimaan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" class="form-control" id="penerimaan" aria-label="Amount" name="penerimaan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pengeluaran">Pengeluaran</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" class="form-control" id="pengeluaran" aria-label="Amount" name="pengeluaran" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" rows="3" placeholder="Masukkan Keterangan..." name="keterangan" required></textarea>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="save-transaction">Simpan</button>
                </div>
            </div>
        </div>
    </div>
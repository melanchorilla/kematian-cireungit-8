    <!-- Modal User -->
    <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="modalUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUserLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form action="" method="post" class="form-horizontal" data-toggle="validator" id="formUser">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <input type="hidden" class="form-control" id="email" name="email">
                        <div class="form-group">
                            <label for="active">Status</label>
                            <select class="form-control" id="active" name="active">
                                <option value="0">Tidak Aktif</option>
                                <option value="1">Aktif</option>
                            </select>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="save-user">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Task</h1>
                <button type="button" data-bs-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" value="<?= $item->title ?>">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="3"> <?= $item->description ?></textarea>
                    </div>
                    <div class="row mb-3" style="align-items: center">
                        <div class="col-8">
                            <label for="list" class="form-label">Add List</label>
                            <input type="text" class="form-control" id="list">
                        </div>
                        <div class="col-4 text-end">
                            <button type="button" class="btn btn-success">Add List</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <ul class="list-group" id="list-check">
                            <li class="list-group-item bg-dark text-white">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label for="flexCheckDefault" class="form-check-label">
                                                UI Login
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <a href="#" class="text-danger text-decoration-none"><i
                                                class="bi bi-dash-circle"></i></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="educationModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ADD Education</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="educationAdd">
                    @csrf

                    <div class="row">
                        <!-- level -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Level *</label>
                                <input class="form-control" name="level" type="text" value="" required="">
                            </div>
                        </div>
                        <!-- degree -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Degree *</label>
                                <input class="form-control" name="degree" type="text" value="" required="">
                            </div>
                        </div>
                        <!-- year -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Year *</label>
                                <input class="form-control yearpicker" name="year" type="text" value=""
                                    placeholder="yyyy" required="">
                            </div>
                        </div>
                        <!-- note -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Note</label>
                                <textarea name="note" value=""></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ms-2">Add Education</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="experienceEditModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Experience</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="experienceEdit">
                    @csrf

                    <div class="row">
                        <!-- Company -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Company *</label>
                                <input class="form-control" name="company" type="text" value="" required="">
                            </div>
                        </div>
                        <!-- department -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Department *</label>
                                <input class="form-control" name="department" type="text" value=""
                                    required="">
                            </div>
                        </div>
                        <!-- designation -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Designation *</label>
                                <input class="form-control" name="designation" type="text" value=""
                                    required="">
                            </div>
                        </div>
                        <!-- Start Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Start Date *</label>
                                <input class="form-control datepicker" name="start" type="text" value=""
                                    placeholder="yyyy/mm/dd" required="">
                            </div>
                        </div>
                        <!-- End Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">End Date</label>
                                <input class="form-control datepicker" name="end" type="text" value=""
                                    placeholder="yyyy/mm/dd">
                            </div>
                        </div>
                        <!-- responsibility -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Responsibility</label>
                                <textarea name="responsibility" value=""></textarea>
                            </div>
                        </div>
                        <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" name="currently_working" value="1"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Iam currently working.
                            </label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ms-2">Edit Experience</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="truck_type_info" tabindex="-1" data-backdrop="false" role="dialog"
    aria-labelledby="myModalType" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalType">Add Truck Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="repeater-default">
                    <form class="form" method="POST" action="{{ route('type.store') }}" enctype="multipart/form-data">
                        <input type="hidden" id="add_type_method" name="_method" value="POST">
                        @csrf
                        <div data-repeater-list="truck_types">
                            <div data-repeater-item>
                                <div class="form-row">

                                    <div class="form-group mb-1 col-sm-12 col-md-4">
                                        <label for="type">Truck Type</label>
                                        <br>
                                        <input type="text" class="form-control" id="type" name="type"
                                            placeholder="Truck type">
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-4">
                                        <label for="description">Description</label>
                                        <br>
                                        <input type="text" class="form-control" id="type_description" name="description"
                                            placeholder="optional">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                        <button type="button" class="btn btn-danger" data-repeater-delete> <i
                                                class="ft-x"></i>
                                            Delete</button>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">

                            <button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <a data-repeater-create class="btn btn-primary">
                                <i class="ft-plus"></i> Add
                            </a>
                            <button type="submit" id="type_submit_btn" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Edit truck Type modal --}}
<div class="modal fade text-left" id="truck_type_edit" tabindex="-1" data-backdrop="false" role="dialog"
    aria-labelledby="myModalTypeEdit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalTypeEdit">Edit Truck Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="repeater-default">
                    <form class="form" method="POST" action="{{ route('type.store') }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                <label for="edit_type">Truck Type</label>
                                <br>
                                <input type="text" class="form-control" id="edit_type" name="type"
                                    placeholder="Truck type">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                <label for="edit_type_description">Description</label>
                                <br>
                                <input type="text" class="form-control" id="edit_type_description" name="description"
                                    placeholder="optional">
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" name="id" id="type_id" value="">

                            <button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" id="type_Update_btn" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="/backend/app-assets/js/core/libraries/jquery.min.js"></script>
<script>
    /* ===================== Add Truck Type Toggle ============================ */
    $(document).on("click", "#addTruckType", function(e) {
        e.preventDefault();

        $('#type_submit_btn').text("Save");
        $('#myModalType').text("Add Truck Type");

        $('#add_type_method').val('POST');


        $('#id').val('');
        $('#type').val('');
        $('#description').val('');



        $('#truck_type_info').modal('show');
    });

    /* ===================== Edit Truck type Toggle ============================ */
    $(document).on("click", "#edit_truck_type", function(e) {
        e.preventDefault();

        $('#submit_btn').text("Update");
        $('#myModalTypeEdit').text("Edit Truck Type");


        let id = $(this).attr('data-id'),
            type = $(this).attr('data-truck_type'),
            description = $(this).attr('data-description');

            console.log(type)

        $('#type_id').val(id);
        $('#edit_type').val(type);
        $('#edit_type_description').val(description);



        $('#truck_type_edit').modal('show');
    });
</script>

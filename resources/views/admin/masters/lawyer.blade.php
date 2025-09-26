<x-admin.layout>
    <x-slot name="title">Lawyers</x-slot>
    <x-slot name="heading">Lawyers</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="court_id">Lawyers<span class="text-danger">*</span></label>
                                    <select name="court_id" id="court_id" class="form-control">
                                        <option>--Select Lawyers--</option>
                                        @foreach ($court as $courts)
                                            <option value="{{ $courts->id }}">{{ $courts->court_name_in_english }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text court_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="lawyer_name_in_english">Lawyer Name In English<span class="text-danger">*</span></label>
                                    <input class="form-control" id="lawyer_name_in_english" name="lawyer_name_in_english" type="text" placeholder="Enter Lawyer Name In English">
                                    <span class="text-danger error-text lawyer_name_in_english_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="lawyer_name_in_marathi">Court Name In Marathi<span class="text-danger">*</span></label>
                                    <input class="form-control" id="lawyer_name_in_marathi" name="lawyer_name_in_marathi" type="text" placeholder="Enter Lawyer Name In Marathi"></input>
                                    <span class="text-danger error-text lawyer_name_in_marathi_err"></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="addSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        {{-- Edit Form --}}
        <div class="row" id="editContainer" style="display:none;">
            <div class="col">
                <form class="form-horizontal form-bordered" method="post" id="editForm">
                    @csrf
                    <section class="card">
                        <header class="card-header">
                            <h4 class="card-title">Edit Lawyers</h4>
                        </header>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                                 <div class="col-md-4">
                                    <label class="col-form-label" for="court_id">Lawyers<span class="text-danger">*</span></label>
                                    <select name="court_id" id="court_id" class="form-control">
                                        <option>--Select Lawyers--</option>
                                        @foreach ($court as $courts)
                                            <option value="{{ $courts->id }}">{{ $courts->court_name_in_english }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text court_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="lawyer_name_in_english">Lawyer Name In English<span class="text-danger">*</span></label>
                                    <input class="form-control" id="lawyer_name_in_english" name="lawyer_name_in_english" type="text" placeholder="Enter Lawyer Name In English">
                                    <span class="text-danger error-text lawyer_name_in_english_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="lawyer_name_in_marathi">Lawyer Name In Marathi<span class="text-danger">*</span></label>
                                    <input class="form-control" id="lawyer_name_in_marathi" name="lawyer_name_in_marathi" type="text" placeholder="Enter Lawyer Name In Marathi">
                                    <span class="text-danger error-text lawyer_name_in_marathi_err"></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="editSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="">
                                    <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                    <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Lawyer Name In English</th>
                                        <th>Lawyer Name In Marathi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lawyer as $lawyers)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$lawyers->lawyer_name_in_english}}</td>
                                            <td>{{$lawyers->lawyer_name_in_marathi}}</td>
                                            <td>
                                            <select class="form-select change-status" data-id="{{ $lawyers->id }}">
                                                <option value="1" {{ $lawyers->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $lawyers->status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                           </td>
                                            <td>
                                                <button class="edit-element btn btn-secondary px-2 py-1" title="Edit sub" data-id="{{ $lawyers->id }}" ><i data-feather="edit"></i></button>
                                                <button class="btn btn-danger rem-element px-2 py-1" title="Delete sub" data-id="{{ $lawyers->id }}"><i data-feather="trash-2"></i> </button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-admin.layout>

{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('lawyer.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route('lawyer.index') }}';
                        });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#addSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#addSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

    });
</script>

<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('lawyer.edit', ":model_id") }}";
        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                console.log(data);
                editFormBehaviour();
                if (!data.error)
                {
                     $("#editForm input[name='edit_model_id']").val(data.lawyer.id);
                     $("#editForm select[name='court_id']").val(data.lawyer.court_id);
                     $("#editForm input[name='lawyer_name_in_english']").val(data.lawyer.lawyer_name_in_english);
                     $("#editForm input[name='lawyer_name_in_marathi']").val(data.lawyer.lawyer_name_in_marathi);
                }
                else
                {
                    alert(data.error);
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                alert("Some thing went wrong");
            },
        });
    });
</script>
<!-- Update -->
<script>
    $(document).ready(function() {
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('lawyer.update', ":model_id") }}";
            //
            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data)
                {
                    $("#editSubmit").prop('disabled', false);
                    if (!data.error2)
                        swal("Successful!", data.success, "success")
                            .then((action) => {
                                window.location.href = '{{ route('lawyer.index') }}';
                            });
                    else
                        swal("Error!", data.error2, "error");
                },
                statusCode: {
                    422: function(responseObject, textStatus, jqXHR) {
                        $("#editSubmit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#editSubmit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
                    }
                }
            });

        });
    });
</script>


<!-- Delete -->
<script>
    $("#buttons-datatables").on("click", ".rem-element", function(e) {
        e.preventDefault();
        swal({
            title: "Are you sure to delete this subquestions?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('lawyer.destroy', ":model_id") }}";

                $.ajax({
                    url: url.replace(':model_id', model_id),
                    type: 'POST',
                    data: {
                        '_method': "DELETE",
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(data, textStatus, jqXHR) {
                        if (!data.error && !data.error2) {
                            swal("Success!", data.success, "success")
                                .then((action) => {
                                    window.location.reload();
                                });
                        } else {
                            if (data.error) {
                                swal("Error!", data.error, "error");
                            } else {
                                swal("Error!", data.error2, "error");
                            }
                        }
                    },
                    error: function(error, jqXHR, textStatus, errorThrown) {
                        swal("Error!", "Something went wrong", "error");
                    },
                });
            }
        });
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $(document).on('change', '.change-status', function () {
        let lawyerId = $(this).data('id');
        let status = $(this).val();

        // Generate URL dynamically with route placeholder
        let url = "{{ route('lawyer.change-status', ':id') }}".replace(':id', lawyerId);

        $.ajax({
            url: url,
            type: "POST",
            data: {
                status: status,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                // Show message on the frontend using SweetAlert
                if(response.success){
                    Swal.fire({
                        title: "Success!",
                        text: response.success,  // <-- This message comes from controller
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            },
            error: function(xhr) {
                let msg = xhr.responseJSON?.error || "Something went wrong!";
                Swal.fire("Error", msg, "error");
            }
        });
    });
});
</script>

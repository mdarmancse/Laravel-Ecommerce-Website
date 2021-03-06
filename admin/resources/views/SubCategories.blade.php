@extends('Layout.app')
@section('title','SubCategory')
@section('content')
    <!-----Table--->
    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">Subcategory</li>
            </ol>
            <div class="row">
                <div id="mainDiv" class="col-md-12 p-5 d-none">
                    <button id="addNew" type="button" class=" btn btn-sm btn-danger">Add Subcategory</button>
                    <table id="subcategoryDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm">Id</th>
                            <th class="th-sm">Category</th>
                            <th class="th-sm">Subcategory Name</th>
                            <th class="th-sm">Status</th>
                            <th class="th-sm">Edit</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                        </thead>
                        <tbody id="subcategoryTable">


                        </tbody>
                    </table>

                </div>

            </div>


            <!-----Loader--->

            <div id="loaderDiv" class="container">
                <div class="row">
                    <div class="col-md-12 text-center p-5">
                        <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                    </div>
                </div>
            </div>

            <!-----Went Wrong--->
            <div id="WrongDiv" class="container d-none">
                <div class="row">
                    <div class="col-md-12 text-center p-5">
                        <h3>Something Went Wrong !</h3>
                    </div>
                </div>
            </div>


            <!-----Delete Modal--->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-3 text-center">
                            <h5 class="mt-4">Do You Want To Delete?</h5>
                            <h5 id="DeleteId" class="mt-4 d-none"> </h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                            <button id="DeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-----Edit Modal--->

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body mx-3">

                            <h5>Want to Update??</h5>

                            <p id="EditId" class="mt-4 d-none"></p>

                            <div id="EditForm" class="d-none">

                                <div class="md-form mb-5">
                                    <i class="fas fa-info-circle prefix grey-text"></i>
                                    <input type="text" id="categoryId" class="form-control validate" placeholder="Category ID">
                                </div>

                                <div class="md-form mb-5">
                                    <i class="fas fa-info-circle prefix grey-text"></i>
                                    <input type="text" id="subcatnameId" class="form-control validate" placeholder="Subcategory Name">
                                </div>

                                <div class="md-form mb-5">

                                    <i class="fas fa-tags prefix grey-text"></i>
                                    <input type="email" id="statusId" class="form-control validate" placeholder="Status">
                                </div>

                            </div>
                            <div class="text-center">
                                <img id="EditLoader" class="loading-icon m-5" src="{{asset('admin/images/loader.svg')}}">
                                <h5 id="EditWrong" class="d-none">Something Went Wrong!</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                                <button type="button" id="EditConfirmBtn" data-id="" class="btn btn-sm btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-------------------------------Insert MODAL------------------------------------------->


            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Add Subcategory</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">

                            <div class="md-form mb-5">
                                <i class="fas fa-info-circle prefix grey-text"></i>
                                <input type="text" id="addcategoryId" class="form-control validate" placeholder="Category ID">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-info-circle prefix grey-text"></i>
                                <input type="text" id="addsubcatnameId" class="form-control validate" placeholder="Subcategory Name">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-tags prefix grey-text"></i>
                                <input placeholder="Status" type="text" id="addStatusId" class="form-control validate">
                            </div>

{{--foreach($allData as $row)--}}
{{--{{$row->category_b->name }}--}}

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-sm btn-danger">Cancel</button>
                            <button id="AddConfirmBtn" class="btn btn-sm btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>


            @endsection


@section('script')
                <script type="text/javascript">
                    getSubCategoryData();
                    function getSubCategoryData() {
                        axios.get('/getSubCategoryData')
                            .then(function(response) {

                                if (response.status == 200) {

                                    $('#mainDiv').removeClass('d-none');
                                    $('#loaderDiv').addClass('d-none');
                                    $('#subcategoryDataTable').DataTable().destroy();
                                    $('#subcategoryTable').empty();
                                    var jsonData = response.data;

                                    $.each(jsonData, function(i,v) {
                                        $('<tr>').html(


                                            "<th>" + jsonData[i].id + "</th>" +
                                            "<th>" + jsonData[i].category_b.name + "</th>" +
                                            "<td>" + jsonData[i].sub_cat_name + "</td>" +
                                            "<td>" + jsonData[i].status + "</td>" +
                                            "<td ><a class='subcategoryEdit' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                                            "<td ><a class='subcategoryDelete' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"

                                        ).appendTo('#subcategoryTable');
                                    });

                                    $('.subcategoryDelete').click(function() {
                                        var id = $(this).data('id');
                                        $('#DeleteId').html(id);

                                        $('#deleteModal').modal('show');

                                    });
                                    $('.subcategoryEdit').click(function() {
                                        var id = $(this).data('id');
                                        $('#EditId').html(id);
                                        getUpdateDetails(id);
                                        $('#editModal').modal('show');

                                    });

                                    $('#subcategoryDataTable').DataTable({
                                        "order": false
                                    });
                                    $('.dataTables_length').addClass('bs-select')

                                } else {
                                    $('#loaderDiv').addClass('d-none');
                                    $('#WrongDiv').removeClass('d-none');
                                }


                            })
                            .catch(function(error) {
                                $('#loaderDiv').addClass('d-none');
                                $('#WrongDiv').removeClass('d-none');
                            })


                    }

                    $('#DeleteConfirmBtn').click(function() {

                        var id = $('#DeleteId').html();
                        deleteSubCategoryData(id);

                    })


                    function deleteSubCategoryData(deleteId) {
                        $('#DeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
                        axios.post('/deleteSubCategoryData', {
                            id: deleteId
                        })

                            .then(function(response) {

                                if (response.status == 200) {
                                    if (response.data == 1) {
                                        $('#deleteModal').modal('hide');
                                        toastr.success('Delete Success');
                                        getSubCategoryData();


                                    } else {
                                        $('#deleteModal').modal('hide');
                                        toastr.error('Delete Failed');
                                        getSubCategoryData();


                                    }

                                } else {
                                    $('#deleteModal').modal('hide');
                                    toastr.error('Something Went wrong')


                                }

                            })
                            .catch(function(error) {

                                $('#deleteModal').modal('hide');
                                toastr.error('Something Went wrong')

                            })

                    }

                    function getUpdateDetails(detailsId) {

                        axios.post('/getSubCategoryDetails', {
                            id: detailsId
                        })
                            .then(function(response) {

                                if (response.status == 200) {
                                    $('#EditForm').removeClass('d-none');
                                    $('#EditLoader').addClass('d-none');

                                    var jsonData = response.data;

                                    $('#categoryId').val(jsonData[0].category_id);
                                    $('#addsubcatnameId').val(jsonData[0].sub_cat_name);
                                    $('#statusId').val(jsonData[0].status);


                                } else {


                                    $('#EditLoader').addClass('d-none');
                                    $('#EditWrong').removeClass('d-none');


                                }

                            })
                            .catch(function(error) {
                                $('#EditLoader').addClass('d-none');
                                $('#EditWrong').removeClass('d-none');
                            })



                    }

                    $('#EditConfirmBtn').click(function() {

                        var id = $('#EditId').html();
                        var catId = $('#categoryId').val();
                        var subname = $('#subcatnameId').val();
                        var status = $('#statusId').val();

                        updateDetails(id, catId,subname,status);

                    });

                    function updateDetails(id, category_id,sub_cat_name, status) {
                        if (category_id.length == 0) {
                            toastr.error('Category Id is empty');
                        } else if (sub_cat_name.length == 0) {
                            toastr.error('SubCategory is empty');
                            if (category_id.length == 0) {
                                toastr.error('Category Id is empty');
                            } else if (sub_cat_name.length == 0) {
                                toastr.error('SubCategory is empty');

                            } else {

                                $('#EditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
                                var url = '/updateSubCategoryDetails';
                                var detailsData = {
                                    id: id,
                                    category_id: category_id,
                                    sub_cat_name: sub_cat_name,
                                    status: status
                                };
                                axios.post(url, detailsData)
                                    .then(function (response) {

                                        $('#EditConfirmBtn').html('Save');

                                        if (response.status == 200) {
                                            if (response.data == 1) {

                                                $('#editModal').modal('hide');
                                                toastr.success("Update Success");
                                                getSubCategoryData();
                                            } else {

                                                $('#editModal').modal('hide');
                                                toastr.error("Update Failed");
                                                getSubCategoryData();

                                            }

                                        } else {
                                            $('#editModal').modal('hide');
                                            toastr.error("Something went wrong");

                                        }

                                    })
                                    .catch(function (error) {
                                        $('#editModal').modal('hide');
                                        toastr.error("Something went wrong");
                                    })

                            }

                        }


                        $('#addNew').click(function () {

                            $('#addModal').modal('show');

                        });

                        $('#AddConfirmBtn').click(function () {


                            var catId = $('#addcategoryId').val();
                            var subname = $('#addsubcatnameId').val();
                            var status = $('#addStatusId').val();
                            insertDetails(catId, subname, status);

                        });

                        function insertDetails(category_id, sub_cat_name, status) {
                            if (category_id.length == 0) {
                                toastr.error('Category Id is empty');
                            } else if (sub_cat_name.length == 0) {
                                toastr.error('SubCategory is empty');

                            } else {

                                $('#AddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
                                var url = '/insertSubCategory';
                                var detailsData = {
                                    category_id: category_id,
                                    sub_cat_name: sub_cat_name,
                                    status: status
                                };
                                axios.post(url, detailsData)
                                    .then(function (response) {

                                        $('#AddConfirmBtn').html('Save');

                                        if (response.status == 200) {
                                            if (response.data == 1) {

                                                $('#addModal').modal('hide');
                                                toastr.success("Insert Success");
                                                getSubCategoryData();
                                            } else {

                                                $('#addModal').modal('hide');
                                                toastr.error("Insert Failed");
                                                getSubCategoryData();

                                            }

                                        } else {
                                            $('#addModal').modal('hide');
                                            toastr.error("Something went wrong");

                                        }

                                    })
                                    .catch(function (error) {
                                        $('#addModal').modal('hide');
                                        toastr.error("Something went wrong");
                                    })

                            }

                        }
                    }




                </script>

@endsection

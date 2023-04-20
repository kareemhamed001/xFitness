@extends('layouts.app-blog-create')

@section('title',$brand->name)

@section('content')


    <!-- Modal -->
    <div class="modal fade" id="deletebrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete brand?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <span class="text-danger">
                        the brand will be deleted forever!
                     </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">
                        Close
                    </button>
                    <button  type="button" class="btn btn-danger" onclick="deletebrand()">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-xl" id="editbrandModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onclick="closeeditmodal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editbrandForm" class="d-flex flex-wrap" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-6 my-1">
                            <img id="coverImageEdit" style="object-fit: scale-down" class="img-fluid" src="" alt="">
                        </div>

                        <div class="form-group col-6 my-1 ps-2">
                            <label for="coverImage">Cover Image</label>
                            <input name="cover_image" class="form-control-file" type="file" id="coverImage"
                                   placeholder="Enter name in english">
                        </div>
                        <div class="form-group col-12 my-1">
                            <label for="brandNameEnEdit">Name En</label>
                            <input name="name" class="form-control" type="text" id="brandNameEnEdit"
                                   placeholder="Enter name in english">
                        </div>
                        <div class="form-group col-6 px-1 my-1">
                            <label for="brandNameArEdit">Name Ar</label>
                            <input name="name_ar" class="form-control" type="text" id="brandNameArEdit"
                                   placeholder="Enter name in arabic">
                        </div>
                        <div class="form-group col-6 px-1 my-1">
                            <label for="brandNameKuEdit">Name Ku</label>
                            <input name="name_ku" class="form-control" type="text" id="brandNameKuEdit"
                                   placeholder="Enter name in kurdish">
                        </div>
                        <div class="form-group col-12 my-1">
                            <label for="brandDescriptionEnEdit">Description En</label>
                            <textarea name="description" class="form-control" type="text" id="brandDescriptionEnEdit"
                                      placeholder="Enter Description in english"></textarea>
                        </div>
                        <div class="form-group col-6 px-1 my-1">
                            <label for="brandDescriptionArEdit">Description Ar</label>
                            <textarea name="description_ar" class="form-control" type="text"
                                      id="brandDescriptionArEdit"
                                      placeholder="Enter Description in arabic"></textarea>
                        </div>
                        <div class="form-group col-6 px-1 my-1">
                            <label for="brandDescriptionKuEdit">Description Ku</label>
                            <textarea name="description_ku" class="form-control" type="text"
                                      id="brandDescriptionKuEdit"
                                      placeholder="Enter Description in kurdish"></textarea>
                        </div>

                        <hr>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeeditmodal()">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary" form="editbrandForm">Save changes</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="addCategoryModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addBrandForm"  enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="brand_id" value="{{$brand->id}}">
                        <div class="form-group px-1 my-1">
                            <label for="category_id">Category Id</label>
                            <select name="category_id" class="form-select" id="category_id">
                                <option>--Select Brand--</option>
                                @foreach(\App\Models\category::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeeditmodal()">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary" form="addBrandForm">Save changes</button>

                </div>
            </div>
        </div>
    </div>


    <div class="row my-3 flex-column flex-lg-row align-items-center">

        <nav class="breadcrumb-style-one mb-3  col-lg-6" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('coach')}}">Coach</a></li>
                <li class="breadcrumb-item"><a href="{{url('coach/brands')}}">brands</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$brand->name}}</li>
            </ol>
        </nav>
        <div class="d-flex col-lg-6 flex-wrap justify-content-center">

            <a type="button" data-toggle="modal" data-target="#deletebrandModal" title="Delete"
               class="btn btn-sm btn-danger mx-1 d-flex align-items-center col-5 col-lg my-1 my-lg-0" onclick="preparebrand({{$brand->id}})">
                <i class="fa-light fa-trash fa-2xs fs-6 mx-1"></i> Delete
            </a>
            <a onclick="preparebrandtoedit({{$brand->id}})"
               href="javascript:void(0);" title="Edit"
               class="btn btn-sm btn-success mx-1 d-flex align-items-center col-5 col-lg my-1 my-lg-0">
                <i class="fa-light fa-pen fa-2xs fs-6 mx-1"></i> Edit
            </a>
            <a type="button" data-toggle="modal" data-target="#addCategoryModal"
               href="javascript:void(0);" title="Add Brand"
               class="btn btn-sm btn-warning mx-1 d-flex align-items-center col-5 col-lg my-1 my-lg-0">
                <i class="fa-light fa-plus fa-2xs fs-6 mx-1"></i>To Category
            </a>
            <a href="{{url('coach/brands')}}" class="btn btn-sm btn-primary mx-1 d-flex align-items-center col-5 col-lg my-1 my-lg-0" title="go back">
                <i class="fa-light  fa-arrow-left fa-2xs fs-6 mx-1"></i>  Back
            </a>
        </div>

    </div>
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            {{session('error')}}
        </div>
    @elseif(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            {{session('success')}}
        </div>
    @endif

    <div class="row my-2">
        <div>
            <img class="w-100 h-100 rounded" style="object-fit: scale-down" src="{{asset($brand->cover_image)}}"
                 alt="">
        </div>


        <div class="d-flex flex-column flex-lg-row my-2">

            <div class="row">
                <div class="my-2">
                    <div class="form-group">
                        <label class="form-label" for="">Name En</label>
                        <input class="form-control text-black disabled" type="text" value="{{$brand->name}}"
                               disabled>
                    </div>
                </div>
                <div class="my-2 col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Name Ar</label>
                        <input class="form-control text-black disabled" type="text" value="{{$brand->name_ar}}"
                               disabled>
                    </div>
                </div>
                <div class="my-2 col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Name Ku</label>
                        <input class="form-control text-black disabled" type="text" value="{{$brand->name_ku}}"
                               disabled>
                    </div>
                </div>
                <div class="my-2 ">
                    <div class="form-group">
                        <label class="form-label" for="">Description En</label>
                        <textarea class="form-control text-black disabled" type="text"
                                  disabled>{{$brand->description}}</textarea>
                    </div>
                </div>
                <div class="my-2 col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Description Ar</label>
                        <textarea class="form-control text-black disabled" type="text"
                                  disabled>{{$brand->description_ar}}</textarea>
                    </div>
                </div>
                <div class="my-2 col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Description Ku</label>
                        <textarea class="form-control text-black disabled" type="text"
                                  disabled>{{$brand->description_ku}}</textarea>
                    </div>
                </div>

            </div>

        </div>


    </div>

    <div class="row my-3">

        <h3 class="text-capitalize">Categories contains this brand</h3>

    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">EN</th>
                <th scope="col">AR</th>
                <th scope="col">KU</th>
                <th scope="col">Owner</th>

                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>
                        <div class="media">
                            <div class="avatar me-2">
                                <img alt="avatar" src="{{asset($category->cover_image)}}" class="rounded-circle"/>
                            </div>
                            <div class="media-body align-self-center">
                                <h6 class="mb-0">{{$category->name}}</h6>
                                <span class="text-success">{{$category->description}}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="mb-0">{{$category->name_ar??'NULL'}}</p>
                        <span class="text-success">{{$category->description_ar??'NULL'}}</span>
                    </td>
                    <td>
                        <p class="mb-0">{{$category->name_ku??'NULL'}}</p>
                        <span class="text-success">{{$category->description_ku??'NULL'}}</span>
                    </td>
                    <td>
                        <p class="mb-0">{{$category->coach->name??'NULL'}}</p>
                        <span class="text-success">{{$category->coach->email??'NULL'}}</span>
                    </td>

                    <td class="cursor-pointer ">
                        <div class="d-flex align-items-center">


                            <div class="action-btns ">
                                <a href="{{url('coach/categories',$category->id)}}" class="action-btn btn-view bs-tooltip me-2"
                                   data-toggle="tooltip" data-placement="top" title="View">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </a>
                            </div>

                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>
@endsection
@section('scripts')

    <script>
        $(document).ready(function () {
            $('#selectAll').click(function () {
                $('[name="brands[]"]').prop('checked', this.checked);
            });
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        let brandId;
        let price;

        function preparebrand(id) {
            brandId = id;
        }

        let brandIdEdit = 0

        async function preparebrandtoedit(id) {
            brandIdEdit = id
            const response = await fetch(`/api/brands/${id}`, {
                method: 'GET'
            });
            const result = await response.json();
            if (result.status === 200) {

                document.querySelector('#brandNameEnEdit').value = result.data.name;
                document.querySelector('#brandNameArEdit').value = result.data.name_ar;
                document.querySelector('#brandNameKuEdit').value = result.data.name_ku;
                document.querySelector('#brandDescriptionEnEdit').value = result.data.description;
                document.querySelector('#brandDescriptionArEdit').value = result.data.description_ar;
                document.querySelector('#brandDescriptionKuEdit').value = result.data.description_ku;
                document.querySelector('#coverImageEdit').src = `http://gym.test/${result.data.cover_image}`
                $('#editbrandModal').modal('show')

            } else if (result.status === 400) {


            }
        }

        function closeeditmodal() {
            $('#editbrandModal').modal('hide')
        }

        async function deletebrand() {
            if (brandId) {
                $.ajax({
                    url: `http://gym.test/api/brands/${brandId}`,
                    method: 'DELETE',
                    success: function (response) {
                        Swal.fire({
                            title: "Success",
                            text: `brand ${brandId} deleted successfully`,
                            icon: "success",
                            button: "Ok",
                            position: 'center',
                            timer: 3000
                        })

                        brandId = null
                        price = null
                        $('#deletebrandModal').modal('hide')

                        window.location.replace('/coach/brands')
                    },
                    error: function (error) {
                        price = null;
                        brandId = null;
                        let messages = error.responseJSON.message
                        // $.each(messages, function(index, value) {
                        //     console.log(`Item at index ${index} is ${value}`);
                        // });

                    }
                });
            } else {
                swal("brand id not set", "error");
            }
        }

    </script>

    <script>

        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        const editForm = document.querySelector('#editbrandForm');
        editForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formDataEdit = new FormData(editForm);

            try {
                const response = await fetch(`/api/brands/${brandIdEdit}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formDataEdit
                });

                const result = await response.json();
                console.log(result)
                if (result.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Updated Successfully',
                    })

                    $('#addCategoryModal').modal('hide')
                    location.reload();
                } else if (result.status === 400) {
                    let message = result.message;
                    let errorMessage = ``;
                    for (const key in message) {
                        errorMessage += message[key] + `\n`
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage,
                    })
                }

            } catch (error) {
                console.error(error);
            }
        });

        const addBrandForm = document.querySelector('#addBrandForm');
        addBrandForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(addBrandForm);

            try {
                const response = await fetch(`/api/brands/to-category`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formData
                });

                const result = await response.json();
                console.log(result)
                if (result.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: result.message,
                        timeout:3000
                    })

                    $('#addCategoryModal').modal('hide')
                    location.reload();
                } else if (result.status === 400) {
                    let message = result.message;
                    let errorMessage = ``;
                    for (const key in message) {
                        errorMessage += `<span class="text-danger d-block">${message[key]} </span>`
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessage,
                    })
                }

            } catch (error) {
                console.error(error);
            }
        });
    </script>
@endsection
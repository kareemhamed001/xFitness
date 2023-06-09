@extends('layouts.app-blog-create')

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="deletecategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{!! __('subcategories.deleteCategory') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <span class="text-danger">
                        {!! __('subcategories.deleteCategoryForever') !!}
                     </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="closeModal()">
                        {!! __('subcategories.close') !!}
                    </button>
                    <button type="button" class="btn btn-danger" onclick="deletecategory()">{!! __('subcategories.delete') !!}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteArrayOfCategoriesModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{!! __('subcategories.deleteSelected') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <span class="text-danger">
                        {!! __('subcategories.deleteSelectedForever') !!}
                     </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="closeModal()">
                        {!! __('subcategories.close') !!}
                    </button>
                    <button type="button" class="btn btn-danger" onclick="deleteSelected()"> {!! __('subcategories.delete') !!}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade modal-xl" id="addCategoryModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel"> {!! __('subcategories.addNewCategory') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createCategoryForm" class="d-flex flex-wrap" enctype="multipart/form-data">
                        @csrf
                        <input name="coach_id" type="hidden" value="{{Auth::user()->id}}">
                        <input name="category_id" type="hidden" value="{{$category->id}}">
                        <div class="form-group col-12 my-1">
                            <label for="coverImage"> {!! __('subcategories.coverImage') !!}</label>
                            <input name="cover_image" class="form-control" type="file" id="coverImage"
                                   placeholder="Enter name in english">
                        </div>
                        <div class="form-group col-md-4 col-12 my-1">
                            <label for="categoryNameEn"> {!! __('subcategories.nameEn') !!}</label>
                            <input name="name" class="form-control" type="text" id="categoryNameEn"
                                   placeholder=" {!! __('subcategories.enterNameEn') !!}">
                        </div>
                        <div class="form-group col-md-4 col-12 px-1 my-1">
                            <label for="categoryNameAr"> {!! __('subcategories.nameAr') !!}</label>
                            <input name="name_ar" class="form-control" type="text" id="categoryNameAr"
                                   placeholder="{!! __('subcategories.enterNameAr') !!}">
                        </div>
                        <div class="form-group col-md-4 col-12 px-1 my-1">
                            <label for="categoryNameKu">{!! __('subcategories.nameKu') !!}</label>
                            <input name="name_ku" class="form-control" type="text" id="categoryNameKu"
                                   placeholder="{!! __('subcategories.enterNameKu') !!}">
                        </div>
                        <div class="form-group col-md-4 col-12 my-1">
                            <label for="categoryDescriptionEn">{!! __('subcategories.descriptionEn') !!}</label>
                            <textarea name="description" class="form-control" type="text" id="categoryDescriptionEn"
                                      placeholder="{!! __('subcategories.enterDescriptionEn') !!}"></textarea>
                        </div>
                        <div class="form-group col-md-4 col-12 px-1 my-1">
                            <label for="categoryDescriptionAr">{!! __('subcategories.descriptionAr') !!}</label>
                            <textarea name="description_ar" class="form-control" type="text" id="categoryDescriptionAr"
                                      placeholder="{!! __('subcategories.enterDescriptionAr') !!}"></textarea>
                        </div>
                        <div class="form-group col-md-4 col-12 px-1 my-1">
                            <label for="categoryDescriptionKu">{!! __('subcategories.descriptionKu') !!}</label>
                            <textarea name="description_ku" class="form-control" type="text" id="categoryDescriptionKu"
                                      placeholder="{!! __('subcategories.enterDescriptionKu') !!}"></textarea>
                        </div>

                        <hr>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{!! __('subcategories.close') !!}</button>
                    <button type="submit" class="btn btn-primary" form="createCategoryForm">{!! __('subcategories.save') !!}</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-xl" id="editCategoryModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">{!! __('subcategories.edit') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onclick="closeeditmodal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm" class="d-flex flex-wrap" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input name="coach_id" type="hidden" value="{{Auth::user()->id}}">
                        <label for="coverImage" class="col-6 my-1">
                            <img id="coverImageEdit" style="object-fit: scale-down" class="img-fluid " src="" alt="">
                        </label>

                        <div class="form-group col-6 my-1 px-2">
                            <label for="coverImage">{!! __('subcategories.coverImage') !!}</label>
                            <input name="cover_image" class="form-control" type="file" id="coverImage"
                                   placeholder="Enter name in english">
                        </div>
                        <div class="form-group col-md-4 col-12 my-1">
                            <label for="categoryNameEnEdit">{!! __('subcategories.nameEn') !!}</label>
                            <input name="name" class="form-control" type="text" id="categoryNameEnEdit"
                                   placeholder="{!! __('subcategories.enterNameEn') !!}">
                        </div>
                        <div class="form-group col-md-4 col-12 px-1 my-1">
                            <label for="categoryNameArEdit">{!! __('subcategories.nameAr') !!}</label>
                            <input name="name_ar" class="form-control" type="text" id="categoryNameArEdit"
                                   placeholder="{!! __('subcategories.enterNameAr') !!}">
                        </div>
                        <div class="form-group col-md-4 col-12 px-1 my-1">
                            <label for="categoryNameKuEdit">{!! __('subcategories.nameKu') !!}</label>
                            <input name="name_ku" class="form-control" type="text" id="categoryNameKuEdit"
                                   placeholder="{!! __('subcategories.enterNameKu') !!}">
                        </div>
                        <div class="form-group col-md-4 col-12 my-1">
                            <label for="categoryDescriptionEnEdit">{!! __('subcategories.descriptionEn') !!}</label>
                            <textarea name="description" class="form-control" type="text" id="categoryDescriptionEnEdit"
                                      placeholder="{!! __('subcategories.enterDescriptionEn') !!}"></textarea>
                        </div>
                        <div class="form-group col-md-4 col-12 px-1 my-1">
                            <label for="categoryDescriptionArEdit">{!! __('subcategories.descriptionAr') !!}</label>
                            <textarea name="description_ar" class="form-control" type="text"
                                      id="categoryDescriptionArEdit"
                                      placeholder="{!! __('subcategories.enterDescriptionAr') !!}"></textarea>
                        </div>
                        <div class="form-group col-md-4 col-12 px-1 my-1">
                            <label for="categoryDescriptionKuEdit">{!! __('subcategories.descriptionKu') !!}</label>
                            <textarea name="description_ku" class="form-control" type="text"
                                      id="categoryDescriptionKuEdit"
                                      placeholder="{!! __('subcategories.enterDescriptionKu') !!}"></textarea>
                        </div>

                        <hr>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeeditmodal()">
                        {!! __('subcategories.close') !!}
                    </button>
                    <button type="submit" class="btn btn-primary" form="editCategoryForm">{!! __('subcategories.save') !!}</button>

                </div>
            </div>
        </div>
    </div>


    <div class="row my-3">
        <div class="d-flex justify-content-between">
            <h3>{!! __('subcategories.subcategories') !!}</h3>
            <div>
                <button type="button" data-toggle="modal" data-target="#deleteArrayOfCategoriesModal"
                        title="delete selected orders"
                        class="btn btn-danger">{!! __('subcategories.delete') !!}
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                    {!! __('subcategories.add') !!}
                </button>

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
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <thead>
            <tr>
                <th class="checkbox-area" scope="col">
                    <div class="form-check form-check-primary">
                        <input class="form-check-input" type="checkbox" id="selectAll">
                    </div>
                </th>
                <th scope="col">{!! __('subcategories.id') !!}</th>
                <th scope="col">{!! __('subcategories.subcategory') !!}</th>

                <th scope="col" class="text-center">{!! __('subcategories.createdAt') !!}</th>
                <th scope="col" class="text-center">{!! __('subcategories.action') !!}</th>

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>
                        <div class="form-check form-check-primary">
                            <input class="form-check-input" type="checkbox" name="categories[]"
                                   value="{{$category->id}}">
                        </div>
                    </td>
                    <td>
                        {{$category->id}}
                    </td>
                    <td>
                        <div class="media">
                            <div class="avatar mx-2">
                                <img alt="" src="{{asset($category->cover_image)}}" class="rounded-circle"/>
                            </div>
                            <div class="media-body align-self-center">
                                <h6 class="mb-0">{{$category['name_'.\Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale().'']}}</h6>
                                <span class="text-success d-block" style="word-break: break-word">{{Str::substr($category['description_'.\Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale().''],0,50)}}... </span>
                            </div>
                        </div>
                    </td>

                    <td class="text-center">
                        <p class="mb-0">{{\Carbon\Carbon::make($category->created_at)->toDateString()??'NULL'}}</p>
                        <span
                            class="text-success">{{\Carbon\Carbon::make($category->created_at)->toTimeString()??'NULL'}}</span>
                    </td>
                    <td class="cursor-pointer ">
                        <div class="d-flex align-items-center">


                            <div class="action-btns m-auto">
{{--                                <a href="{{url('coach/categories',$category->id)}}" class="action-btn btn-view bs-tooltip me-2"--}}
{{--                                   data-toggle="tooltip" data-placement="top" title="View">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
{{--                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
{{--                                         stroke-linejoin="round" class="feather feather-eye">--}}
{{--                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>--}}
{{--                                        <circle cx="12" cy="12" r="3"></circle>--}}
{{--                                    </svg>--}}
{{--                                </a>--}}
                                <a onclick="preparecategorytoedit({{$category->id}})"
                                   href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2"
                                   data-placement="top" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </a>
                                <a type="button" data-toggle="modal" data-target="#deletecategoryModal"
                                   href="javascript:void(0);" class="action-btn btn-delete bs-tooltip"
                                   data-placement="top" title="Delete" onclick="preparecategory({{$category->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-trash-2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </a>
                            </div>

                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$categories->links()}}

    </div>

@endsection
@section('scripts')

    <script>
        $(document).ready(function () {
            $('#selectAll').click(function () {
                $('[name="categories[]"]').prop('checked', this.checked);
            });
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        let categoryId;
        let price;

        function preparecategory(id) {
            categoryId = id;
        }

        let categoryIdEdit = 0

        async function preparecategorytoedit(id) {

            categoryIdEdit = id
            showLoader();
            const response = await fetch(`/api/sub-categories/${id}`, {
                method: 'GET'
            });
            removeLoader()
            const result = await response.json();
            if (result.status === 200) {

                document.querySelector('#categoryNameEnEdit').value = result.data.name_en;
                document.querySelector('#categoryNameArEdit').value = result.data.name_ar;
                document.querySelector('#categoryNameKuEdit').value = result.data.name_ku;
                document.querySelector('#categoryDescriptionEnEdit').value = result.data.description_en;
                document.querySelector('#categoryDescriptionArEdit').value = result.data.description_ar;
                document.querySelector('#categoryDescriptionKuEdit').value = result.data.description_ku;
                document.querySelector('#coverImageEdit').src = `http://gym.test/${result.data.cover_image}`
                $('#editCategoryModal').modal('show')

            } else if (result.status === 400) {
                console.log(result)
                let messages = result
                Swal.fire({
                    title: "error",
                    text: messages,
                    icon: "error",
                    button: "Ok",
                    position: 'center',
                    timer: 3000
                })

            }
        }

        function closeeditmodal() {
            $('#editCategoryModal').modal('hide')
        }

        async function deletecategory() {
            if (categoryId) {
                showLoader()
                $.ajax({
                    url: `/api/sub-categories/${categoryId}`,
                    method: 'DELETE',
                    success: function (response) {
                        removeLoader()
                        Swal.fire({
                            title: "Success",
                            text: `category ${categoryId} deleted successfully`,
                            icon: "success",
                            button: "Ok",
                            position: 'center',
                            timer: 3000
                        })

                        categoryId = null
                        price = null
                        $('#deletecategoryModal').modal('hide')
                        location.reload();
                    },
                    error: function (error) {
                        removeLoader()
                        price = null;
                        categoryId = null;
                        let messages = error.responseJSON.message
                        // $.each(messages, function(index, value) {
                        //     console.log(`Item at index ${index} is ${value}`);
                        // });
                        Swal.fire({
                            title: "error",
                            text: messages,
                            icon: "error",
                            button: "Ok",
                            position: 'center',
                            timer: 3000
                        })
                    }
                });
            } else {
                removeLoader()
                swal("category id not set", "error");
                Swal.fire({
                    title: "error",
                    text: `category id not set`,
                    icon: "error",
                    button: "Ok",
                    position: 'center',
                    timer: 3000
                })
            }
        }


        function deleteSelected() {
            let checkboxes = $('[name="categories[]"]:checked');
            // Create an empty array to store the selected values
            let selectedValues = [];
            // Loop through the checked checkboxes and push their values to the array
            checkboxes.each(function () {
                selectedValues.push(parseInt($(this).val()));
            });


            if (selectedValues.length > 0) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                showLoader()
                $.ajax({
                    url: `/api/sub-categories/delete-collection`,
                    method: 'POST',
                    data: {'categories': selectedValues},
                    success: function (response) {
                        removeLoader()
                        console.log(response)
                        Swal.fire({
                            title: "Success",
                            text: `deleted successfully`,
                            icon: "success",
                            button: "Ok",
                            position: 'center',
                            timer: 3000
                        })
                        selectedValues = null
                        $('#deleteArrayOfCategoriesModal').modal('hide')
                        location.reload();
                    },
                    error: function (error) {
                        removeLoader()
                        let messages = error.responseJSON.message
                        Swal.fire({
                            title: "error",
                            text: `Something went wrong`,
                            icon: "error",
                            button: "Hide",
                            position: 'center',
                            timer: 3000
                        })
                    }
                });
            } else {
                removeLoader()

                Swal.fire({
                    title: "No categories selected",
                    text: `select at least one category to delete`,
                    icon: "error",
                    button: "Ok",
                    position: 'center',
                    timer: 3000
                })
                $('#deleteArrayOfCategoriesModal').modal('hide')
            }


        }

    </script>

    <script>


        const form = document.querySelector('#createCategoryForm');


        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(form);

            try {
                showLoader()
                const response = await fetch('/api/sub-categories', {
                    method: 'post',
                    body: formData
                });
                removeLoader()
                const result = await response.json();
                console.log(result)
                if (result.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: result.message,
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
                removeLoader()
                console.error(error);
            }
        });
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        const editForm = document.querySelector('#editCategoryForm');
        editForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formDataEdit = new FormData(editForm);

            try {
                showLoader()
                const response = await fetch(`/api/sub-categories/${categoryIdEdit}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formDataEdit
                });
                removeLoader()

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
                removeLoader()
                console.error(error);
            }
        });
    </script>
@endsection


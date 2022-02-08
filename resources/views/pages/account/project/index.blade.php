<title>{{ __('Мои проекты') }}</title>
@section('PageName','Мои проекты')
@section('breadcrumbs')
    <li class="breadcrumb-item text-gray-600">
        <a href="/" class="text-muted text-hover-primary">
            Рабочая панель
        </a>
    </li>
    <li class="breadcrumb-item text-gray-500">Мои проекты</li>
@endsection
<x-base-layout>
    <div id="project"  class="userBlock" >
        @section('customFields')
        <div class="projectFilter" style="display: none">
            <div class="d-flex flex-wrap flex-stack mb-6 " bis_skin_checked="1">
                <h3 class="fw-bolder my-2"></h3>
                <form method="GET" action="/account/project" class="d-flex flex-wrap my-2">
                    <div class="d-flex align-items-center position-relative my-1" bis_skin_checked="1">
                        <div class="me-4" bis_skin_checked="1">
                            <!--begin::Select-->
                            <select onchange="this.form.submit()"  name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm form-select-transparent w-125px select2-hidden-accessible" data-select2-id="select2-data-10-rson" tabindex="-1" aria-hidden="true">
                                <option value="" <?=isset($_GET['status']) && empty($_GET['status']) ? 'selected' : ''?>  data-select2-id="select2-data-12-qog7">Все статусы</option>
                                <option value="0" <?=isset($_GET['status']) && $_GET['status'] === 0 ? 'selected' : ''?> data-select2-id="select2-data-147-wdcj" >В разработке</option>
                                <option value="1" <?=isset($_GET['status']) && $_GET['status'] == 1 ? 'selected' : ''?> data-select2-id="select2-data-148-8dcw" >На экспертизе</option>
                                <option value="2" <?=isset($_GET['status']) && $_GET['status'] == 2 ? 'selected' : ''?> data-select2-id="select2-data-149-i0m5" >Готов</option>
                            </select>
                            <!--end::Select-->
                        </div>
                        <div class="me-4" bis_skin_checked="1">
                            <select onchange="this.form.submit()" name="organizationId" data-control="select2" data-hide-search="true" class="form-select form-select-sm form-select-transparent w-225px select2-hidden-accessible" data-select2-id="select2-data-10-ah93" tabindex="-1" aria-hidden="true">
                                <option value="" selected="selected" >Все организации</option>
                                @foreach($projectOrganization as $organization)
                                    <option value="{{$organization->organization_id}}" <?=isset($_GET['organizationId']) && $_GET['organizationId'] == $organization->organization_id ? 'selected' : ''?>>{{$organization->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">Добавить проект</a>
                    </div>
                </form>
                <!--end::Actions-->
            </div>
        </div>
        @endsection
        <!--end::Toolbar-->
        <!--begin::Row-->
        <div class="row g-6 g-xl-9">
            <!--begin::Col-->
            @foreach($allProject as $project)
                <div class="col-md-6 col-xl-3">
                    <!--begin::Card-->
                    <div class="card border-hover-primary">
                    <a href="/account/project/{{$project->project_id}}">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-9">
                            <!--begin::Card Title-->
                            <div class="card-title m-0">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px w-50px bg-light">
                                    <img src="/core/media/svg/brand-logos/disqus.svg" alt="image" class="p-3">
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::Car Title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                @if($project->status == 0)
                                    <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">В разработке </span>
                                @elseif($project->status == 1)
                                    <span class="badge badge-light-warning fw-bolder me-auto px-4 py-3">На экспертизе </span>
                                @else
                                    <span class="badge badge-light-success fw-bolder me-auto px-4 py-3">Готов </span>
                                @endif
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                    </a>
                        <!--end:: Card header-->
                        <!--begin:: Card body-->
                        <div class="card-body p-9">
                            <!--begin::Name-->
                            <a href="/account/project/{{$project->project_id}}">
                                <div class="fs-3 fw-bolder text-dark">{{$project->project_name}}</div>
                                <!--end::Name-->
                                <!--begin::Description-->
                                @if(strlen($project->description) > 88)
                                    <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">{{mb_substr($project->description,0,85)}}...</p>
                                @else
                                    <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">{{$project->description}}</p>
                                @endif
                                <!--end::Description-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap mb-5">
                                    <!--begin::Due-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                        <div class="fs-6 text-gray-800 fw-bolder">{{$project->name != null ? $project->name : 'Не добавлено'}}</div>
                                        <div class="fw-bold text-gray-400">Организация</div>
                                    </div>
                                </div>
                            </a>
                            <div class="d-flex justify-content-end" bis_skin_checked="1">
                                <button type="button" class="btn btn-danger btn-sm deleteProject" projectId="{{$project->project_id}}" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                        <!--end:: Card body-->
                    <!--end::Card-->
                </div>
            @endforeach
        </div>
        <!--end::Row-->
        <!--begin::Pagination-->
        <div class="d-flex flex-stack flex-wrap pt-10" bis_skin_checked="1">
            {{ $allProject->appends(['status' => request()->status,'organizationId'=>request()->organizationId])->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Подтвердите удаление</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <p>Вы уверены, что хотите удалить проект?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light notDeletedProject" data-bs-dismiss="modal">Нет</button>
                    <button type="button" class="btn btn-primary deletedProject">Да</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_create_project" tabindex="-1" bis_skin_checked="1" style="display: none;" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
            <!--begin::Modal content-->
            <div class="modal-content rounded" bis_skin_checked="1">
                <!--begin::Modal header-->
                <div class="modal-header" bis_skin_checked="1">
                    <!--begin::Modal title-->
                    <h2>Добавить проект</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" bis_skin_checked="1">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
														</svg>
													</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5" bis_skin_checked="1">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_project_stepper" data-kt-stepper="true" bis_skin_checked="1">
                        <!--begin::Container-->
                        <div class="container" bis_skin_checked="1">
                            <form class="mx-auto w-100 mw-800px  fv-plugins-bootstrap5 fv-plugins-framework needs-validation" novalidate id="kt_modal_create_project_form" method="POST" action="{{route('account.createUserProject')}}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" required name="user_id" class="form-control form-control-lg form-control-solid" value="{{$userId}}">
                                <div class="row mb-6" bis_skin_checked="1">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Название проекта</label>
                                    <div class="col-lg-8 fv-row" bis_skin_checked="1">
                                        <input type="text"  name="project_name" class="form-control form-control-lg form-control-solid" value="" placeholder="Название" required/>
                                    </div>
                                </div>
                                <div class="row mb-6" bis_skin_checked="1">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Описание проекта</label>
                                    <div class="col-lg-8 fv-row" bis_skin_checked="1">
                                            <textarea name="project_description" class="form-control form-control-lg form-control-solid"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-6" bis_skin_checked="1">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Организация</label>
                                    <div class="col-lg-8 fv-row" bis_skin_checked="1">
                                        {{--                                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">--}}
                                        <select class="form-select form-select-solid" name="organization">
                                            <option value="0" selected>Не выбрано</option>--}}
                                            @foreach($allOrganization as $organization)
                                                <option value="{{$organization->organization_id}}">{{$organization->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-6" bis_skin_checked="1">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Статус</label>
                                    <div class="col-lg-8 fv-row" bis_skin_checked="1">
                                        <select class="form-select form-select-solid" name="project_status">
                                            <option value="0" selected>В разработке</option>
                                            <option value="1">На экспертизе</option>
                                            <option value="2">Готов</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" bis_skin_checked="1">
                                    <button type="submit" class="btn btn-primary" id="saveUserProfile">
                                        <span class="indicator-label">Добавить</span>
                                    </button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--begin::Container-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

    {{--@section('script')--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        var deleteProjectId = 0;
        $(document).ready(function () {
            $('.projectFilter').show();
        });
        $(document).on('click','.deleteProject',function (){
            deleteProjectId = Number($(this).attr('projectId'));
        });
        $(document).on('click','.notDeletedProject',function (){
            deleteProjectId = 0;
        });
        $(document).on('click','.deletedProject',function (){
            if(deleteProjectId != 0){
                $.ajax({
                    url: "/account/deletedProject",
                    async: false,
                    type: 'GET',
                    data: {
                        deleteProjectId:deleteProjectId,
                    },
                    success: function(data) {
                        location.reload();
                    },
                    error: function(err) {}
                });
            }
        });

    </script>

</x-base-layout>

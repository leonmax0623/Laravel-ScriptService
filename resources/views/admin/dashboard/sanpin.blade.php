@extends('layout.admin')

@section('title', 'Вещества из СанПиН')

@section('content')
    <div class="card" bis_skin_checked="1">
        <div class="d-flex justify-content-end mt-5" data-kt-sanpin-table-toolbar="base" bis_skin_checked="1">
            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"></path>
                    </svg>
                </span>
                Фильтр</button>
            <div id="kt_menu_1" class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" bis_skin_checked="1">
                <div class="px-7 py-5" bis_skin_checked="1">
                    <div class="fs-5 text-dark fw-bolder" bis_skin_checked="1">Фильтр поиска</div>
                </div>
                <div class="separator border-gray-200" bis_skin_checked="1"></div>
                <div class="px-7 py-5" data-kt-sanpin-table-filter="form" bis_skin_checked="1">
                    <form method="GET" action="{{route('admin.searchSanpin')}}">
                        <div class="mb-10" bis_skin_checked="1">
                            <label class="form-label fs-6 fw-bold">Наименование</label>
                            <input type="text" class="form-control  fw-bolder " data-placeholder="Введите наименование" name="name" value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}"/>
                        </div>
                        <div class="d-flex justify-content-end" bis_skin_checked="1">
                            <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-sanpin-table-filter="filter">Поиск</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body pt-0" bis_skin_checked="1">
            <div id="kt_table_sanpins_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1"><div class="table-responsive" bis_skin_checked="1">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_sanpins">
                        <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th tabindex="0" aria-controls="kt_table_sanpins" rowspan="1" colspan="1" >Код</th>
                            <th tabindex="0" aria-controls="kt_table_sanpins" rowspan="1" colspan="1" >Наименование</th>
                            <th tabindex="0" aria-controls="kt_table_sanpins" rowspan="1" colspan="1" >ПДК максимальная разовая</th>
                            <th tabindex="0" aria-controls="kt_table_sanpins" rowspan="1" colspan="1" >ПДК средне суточная</th>
                            <th tabindex="0" aria-controls="kt_table_sanpins" rowspan="1" colspan="1" >ПДК средне годовая</th>
                            <th tabindex="0" aria-controls="kt_table_sanpins" rowspan="1" colspan="1" >Класс опасности</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            @foreach ($sanpin as $item)
                                <tr class="even">
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->pdkmr }}</td>
                                    <td>{{ $item->pdkss }}</td>
                                    <td>{{ $item->pdksg }}</td>
                                    <td>{{ $item->danger_class }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start" bis_skin_checked="1"></div>
                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end" bis_skin_checked="1">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_sanpins_paginate" bis_skin_checked="1">
                            {{ $sanpin->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
</script>

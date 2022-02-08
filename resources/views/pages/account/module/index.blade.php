<title>{{$moduleInfo->module_name}}</title>
@section('PageName',$moduleInfo->module_name)
@section('breadcrumbs')
    <li class="breadcrumb-item text-gray-600">
        <a href="/" class="text-muted text-hover-primary">
            Рабочая панель
        </a>
    </li>
    <li class="breadcrumb-item text-gray-600">
        <a href="/account/calculations" class="text-muted text-hover-primary">
            Модули расчета
        </a>
    </li>
    <li class="breadcrumb-item text-gray-500">{{ $moduleInfo->module_name }}</li>
@endsection
<x-base-layout>
    {{--@section('script')--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</x-base-layout>

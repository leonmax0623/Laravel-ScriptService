<!--begin::Header-->
<?php
use App\Models\User;
?>

<div id="kt_header" class="header">
  <!--begin::Container-->
  <div class="container-fluid d-flex flex-stack">
    <!--begin::Brand-->
    <div class="d-flex align-items-center me-5">
      <!--begin::Aside toggle-->
      <div class="d-lg-none btn btn-icon btn-active-color-white w-30px h-30px ms-n2 me-3" id="kt_aside_toggle">
        <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
        <span class="svg-icon svg-icon-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
            <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
          </svg>
        </span>
        <!--end::Svg Icon-->
      </div>
      <!--end::Aside  toggle-->
      <!--begin::Logo-->
      <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
          <a href="{{ theme()->getPageUrl('') }}">
              <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'logos/logo-2.svg') }}" class="h-25px h-lg-30px"/>
          </a>
      </div>
      <!--end::Logo-->
    </div>
    <!--end::Brand-->
    <div class="d-flex align-items-stretch flex-shrink-0">
        {{ theme()->getView('layout/topbar/_base') }}
    </div>
  </div>
  <!--end::Container-->
</div>
<!--end::Header-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    var link = window.location.href;
    if (link.indexOf('modulePage') > -1){
        $('#kt_header_nav .menu-item').each(function () {
            if (typeof $('.menu-link', this).attr('href') !== 'undefined') {
                if ($('.menu-link', this).attr('href').indexOf('calculations') > -1) {
                    if ($(this).parents('.menu-item').length > 0) {
                        $(this).parents('.menu-item').addClass('here').addClass('show');
                    } else {
                        $(this).addClass('here').addClass('show');
                    }
                    return false;
                }
            }
        });
    } else {
        $('#kt_header_nav .menu-item').each(function () {
            if (typeof $('.menu-link', this).attr('href') !== 'undefined') {
                if ($('.menu-link', this).attr('href') === link || $('.menu-link', this).attr('href') + '/' === link) {
                    if ($(this).parents('.menu-item').length > 0) {
                        $(this).parents('.menu-item').addClass('here').addClass('show');
                    } else {
                        $(this).addClass('here').addClass('show');
                    }
                }
            }
        });
    }
</script>

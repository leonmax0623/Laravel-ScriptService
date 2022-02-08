<div class="d-flex align-items-center ms-1" id="kt_header_user_menu_toggle">
  <!--begin::User info-->
  <div class="btn btn-flex align-items-center bg-hover-white bg-hover-opacity-10 py-2 px-2 px-md-3" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
    <!--begin::Name-->
    <div class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-4">
      <span class="text-white fs-8 fw-bolder lh-1">{{ isset(auth()->user()->email) ? auth()->user()->email : '' }}</span>
    </div>
    <!--end::Name-->
    <!--begin::Symbol-->
    <div class="symbol symbol-30px symbol-md-40px">
        <img alt="Logo" style="object-fit: cover !important;" src="{{isset( auth()->user()->avatar_url) ?  auth()->user()->avatar_url : '' }}"/>
    </div>
    <!--end::Symbol-->
  </div>
  <!--end::User info-->
  <!--begin::Menu-->
  <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
      <div class="menu-content d-flex align-items-center px-3">
        <!--begin::Avatar-->
        <div class="symbol symbol-50px me-5">
          <img alt="Logo" style="object-fit: cover !important;" src="{{isset( auth()->user()->avatar_url) ?  auth()->user()->avatar_url : '' }}"/>
        </div>
        <!--end::Avatar-->
        <!--begin::Username-->
        <div class="d-flex flex-column">
          <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ isset(auth()->user()->email) ? auth()->user()->email : '' }}</a>
        </div>
        <!--end::Username-->
      </div>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
      <a href="{{ theme()->getPageUrl('settings.index') }}" class="menu-link px-5">
          {{ __('Настройки профиля') }}
      </a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="/logout" class="menu-link px-5">
            {{ __('Выход') }}
        </a>
    </div>
    <!--end::Menu item-->

  </div>
  <!--end::Menu-->
</div>

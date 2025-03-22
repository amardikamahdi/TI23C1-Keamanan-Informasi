<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}"
    data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}"
    style="animation-duration: 0.3s;">
    <div class="app-container  container-xxl d-flex align-items-center justify-content-between "
        id="kt_app_header_container">
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
                data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                    id="kt_app_header_menu" data-kt-menu="true">
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
                        class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                            <span class="menu-title">Menu</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </span>
                        <div
                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                            <div class="menu-item">
                                <a class="menu-link home" href="{{ route('welcome') }}">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-rocket fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Halaman Utama</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link encrypt--text-create" href="{{ route('encrypt.text.create') }}">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-note-2 fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Buat Enkripsi Teks</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('welcome') }}">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-file fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Buat Enkripsi File</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
                <a href="{{ route('welcome') }}">
                    <img alt="Logo" src="{{ asset('favicon.png') }}"
                        class="h-50px d-none d-lg-inline app-header-logo-default">
                </a>
            </div>

            <div class="app-navbar flex-shrink-0">
                <div class="app-navbar-item ms-2 ms-lg-5" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-35px symbol-lg-40px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <img src="{{ asset('assets/src/media/avatars/300-11.jpg') }}" alt="user">
                    </div>

                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true" style="">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="{{ asset('assets/src/media/avatars/300-11.jpg') }}">
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">
                                        John Doe
                                    </div>
                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                        johndoe@mail.com
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="separator my-2"></div>

                        {{-- <div class="menu-item px-5">
                            <a href="/metronic8/demo47/authentication/layouts/corporate/sign-in.html"
                                class="menu-link px-5">
                                Sign Out
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

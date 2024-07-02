@extends('app', [
    'title' => 'Dashboard',
])

@section('content')
    @include('sweetalert::alert')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6"></div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Engage widget 4-->
                <div class="card border-transparent " data-bs-theme="light" style="background-color: #1C325E;">
                    <!--begin::Body-->
                    <div class="card-body d-flex ps-xl-15">
                        <!--begin::Wrapper-->
                        <div class="m-0">
                            <!--begin::Title-->
                            <div class="position-relative fs-2x z-index-2 fw-bold text-white mb-7">
                                <span class="me-2">
                                    Selamat Datang,
                                    <span class="position-relative d-inline-block text-danger">
                                        <a href="{{ route('profile.edit') }}" class="text-danger opacity-75-hover">
                                            {{ auth()->user()->name }}
                                        </a>

                                        <!--begin::Separator-->
                                        <span
                                            class="position-absolute opacity-50 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                                        <!--end::Separator-->
                                    </span>
                                </span><br />
                                <span class="fw-bold">
                                    Aplikasi Kriptografi Sederhana
                                </span>
                            </div>
                            <!--end::Title-->

                            <!--begin::Action-->
                            <div class="mb-3">
                                <a href='{{ route('enkripsi') }}' class="btn btn-danger fw-semibold me-2">
                                    Enkripsi
                                </a>

                                <a href="{{ route('deskripsi') }}"
                                    class="btn btn-color-white bg-white bg-opacity-15 bg-hover-opacity-25 fw-semibold">
                                    Deskripsi
                                </a>
                            </div>
                            <!--begin::Action-->
                        </div>
                        <!--begin::Wrapper-->

                        <!--begin::Illustration-->
                        <img src="{{ asset('assets/media/illustrations/sigma-1/17-dark.png') }}"
                            class="position-absolute me-3 bottom-0 end-0 h-200px" alt="" />
                        <!--end::Illustration-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Engage widget 4-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection

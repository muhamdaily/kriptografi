@extends('app', [
    'title' => 'Deskripsi',
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
                <div class="card shadow-sm mb-5">
                    <div class="card-header">
                        <h3 class="card-title">
                            Deskripsi Pesan
                        </h3>
                    </div>
                    <form action="{{ route('decrypt') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating mb-7">
                                <input type="text" class="form-control form-control-solid" id="encrypted_message"
                                    name="encrypted_message" placeholder="Masukkan Enkripsi Pesan" autocomplete="off"
                                    required />

                                <label for="encrypted_message" class="required">
                                    Enkripsi Pesan
                                </label>
                            </div>

                            <div class="form-floating">
                                <input type="text" class="form-control form-control-solid" id="key" name="key"
                                    placeholder="Masukkan Kata Kunci" autocomplete="off" required />

                                <label for="key" class="required">
                                    Kata Kunci
                                </label>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-sm btn-secondary hover-rotate-end" onclick="refreshPage()">
                                Refresh
                            </button>

                            <button type="submit" class="btn btn-sm btn-info hover-rotate-start">
                                Proses
                            </button>
                        </div>
                    </form>
                </div>

                @if (isset($decryptedMessage))
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <!--begin::Input wrapper-->
                            <div class="w-100">
                                <!--begin::Title-->
                                <h4 class="fs-5 fw-semibold text-gray-800">
                                    Pesan Deskripsi
                                </h4>
                                <!--end::Title-->

                                <!--begin::Title-->
                                <div class="d-flex">
                                    <textarea class="form-control form-control-solid me-3 flex-grow-1" id="result" cols="2" rows="2"
                                        readonly>{{ $decryptedMessage }}</textarea>

                                    <button id="copy_button" class="btn btn-light fw-bold flex-shrink-0"
                                        data-clipboard-target="#result">
                                        Salin
                                    </button>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Input wrapper-->
                        </div>
                    </div>
                @endif
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection

@push('custom-javascript')
    <script src="https://unpkg.com/clipboard@2/dist/clipboard.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var button = document.querySelector('#copy_button');
            var input = document.querySelector('#result');
            var clipboard = new ClipboardJS(button);

            if (!clipboard) {
                console.log('ClipboardJS initialization failed');
                return;
            }

            clipboard.on('success', function(e) {
                var buttonCaption = button.innerHTML;
                input.classList.add('bg-info');
                input.classList.add('text-inverse-info');
                button.innerHTML = 'Tersalin';

                setTimeout(function() {
                    button.innerHTML = buttonCaption;
                    input.classList.remove('bg-info');
                    input.classList.remove('text-inverse-info');
                }, 3000);

                e.clearSelection();
            });

            clipboard.on('error', function(e) {
                console.log('ClipboardJS copy failed', e);
            });
        });

        function refreshPage() {
            location.reload();
        }
    </script>
@endpush

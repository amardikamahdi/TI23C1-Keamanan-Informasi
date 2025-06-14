@extends('layouts.app')

@push('vendor-styles')
    <link href="{{ asset('assets/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
@endpush

@section('title')
    Home
@endsection

@section('content')
    <div class="col-xl-6">
        <div class="card card-flush h-lg-100">
            <div class="card-header pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-900">Enkripsi Teks</span>
                    <span class="text-gray-500 pt-2 fw-semibold fs-6">Menampilkan Percobaan Enkripsi Teks dalam bentuk
                        grafik.</span>
                </h3>
                <div class="card-toolbar">
                </div>
            </div>
            <div class="card-body pt-0 px-0">
                <div id="chart" style="height: 350px;"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card card-flush h-lg-100">
            <div class="card-header pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-900">Enkripsi File (Dalam pengembangan)</span>
                    <span class="text-gray-500 pt-2 fw-semibold fs-6">Menampilkan Percobaan Enkripsi File dalam bentuk
                        grafik.</span>
                </h3>
                <div class="card-toolbar">
                </div>
            </div>
            <div class="card-body pt-0 px-0">
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card card-flush h-lg-100">
            <div class="card-header pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-900">List Enkripsi Teks</span>
                    <span class="text-gray-500 pt-2 fw-semibold fs-6">Menampilkan Percobaan Enkripsi Teks dalam bentuk
                        tabel.</span>
                </h3>
                <div class="card-toolbar">
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text"
                            class="form-control form-control-solid w-250px ps-13 default--datatables-search"
                            placeholder="Cari">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table align-middle table-row-dashed table-layout-fixed fs-6 gy-5 default--datatables">
                    <thead>
                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                            <th width="5%">#</th>
                            <th width="15%">Nama</th>
                            <th width="60%">Teks Terenkripsi</th>
                            <th width="10%">Dibuat</th>
                            <th width="10%" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('modals')
    @include('encrypt.text.partials.modal-decrypt')
@endpush

@push('vendor-scripts')
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="{{ asset('assets/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('custom/js/default-datatable.js') }}"></script>
    <script src="{{ asset('custom/js/default-ajax.js') }}"></script>
    <script>
        $('.home').addClass('active');

        var datatablesUrl = "{{ route('encrypt.text.list') }}";
        var datatablesColumns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'text',
                name: 'text',
            },
            {
                data: 'created_at',
                name: 'created_at',
            },
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                searchable: false
            },
        ];

        $('.default--datatables-search').on('keyup', function() {
            initDatatableSearch($('.default--datatables'), $(this).val());
        });

        initDatatable($(".default--datatables"), datatablesUrl, datatablesColumns, {
            order: [
                [3, 'desc']
            ],
        });

        var element = document.getElementById('chart');

        var height = parseInt(KTUtil.css(element, 'height'));
        var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
        var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
        var baseColor = KTUtil.getCssVariableValue('--bs-primary-active');
        var lightColor = KTUtil.getCssVariableValue('--bs-primary-bg-subtle');

        var options = {
            series: [],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {

            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 1
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 3,
                colors: [baseColor]
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    },
                    formatter: function(value) {
                        return moment(value).format('HH:mm');
                    }
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                },
            },
            yaxis: {
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                }
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 3
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();

        fetchEncryptTextChartSeries();

        function fetchEncryptTextChartSeries() {
            $.ajax({
                url: "{{ route('encrypt.text.hourly-series-chart') }}",
                type: 'GET',
                success: function(response) {
                    chart.updateSeries([{
                        name: 'Percobaan Enkripsi',
                        data: response.data.hourly,
                    }]);
                }
            });
        }

        // Init modal decrypt submission
        defaultAjax($('.decrypt--text-create-form'));

        // Show modal decrypt
        function showModalDecrypt({encryptId}) {
            var modal = $('#modal-decrypt');
            modal.find('input[name="encrypt_id"]').val(encryptId);
            modal.modal('show');
        }

    </script>
@endpush

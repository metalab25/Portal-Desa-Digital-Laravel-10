@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-success rounded-3">
                        <div class="inner">
                            <h3 class="font-outfit">{{ $d_count }}</h3>
                            <p class="font-outfit">{{ 'Wilayah ' . $setting->sebutan_dusun }}</p>
                        </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 18 18"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.5.5 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.5.5 0 0 0-.196 0zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1z">
                            </path>
                        </svg> <a href="{{ route('wilayah.index') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i> </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-primary rounded-3">
                        <div class="inner">
                            <h3 class="font-outfit">{{ $k_count }}</h3>
                            <p class="font-outfit">Keluarga</p>
                        </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        </svg> <a href="{{ route('keluarga.index') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i> </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-warning rounded-3">
                        <div class="inner">
                            <h3 class="font-outfit">{{ $p_count }}</h3>
                            <p class="font-outfit">Penduduk</p>
                        </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path
                                d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />

                        </svg> <a href="{{ route('penduduk.index') }}"
                            class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i> </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-danger rounded-3">
                        <div class="inner">
                            <h3 class="font-outfit">65</h3>
                            <p>Unique Visitors</p>
                        </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z">
                            </path>
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z">
                            </path>
                        </svg> <a href="#"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

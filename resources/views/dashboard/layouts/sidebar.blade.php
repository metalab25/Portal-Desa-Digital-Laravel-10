<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard.index') }}" class="brand-link">
            {{-- <img src="../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> --}}
            <span class="brand-text ms-0 font-outfit">{{ config('app.alias') }}</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}"
                        class="nav-link {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'desa' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-clipboard-fill"></i>
                        <p>
                            Info {{ $setting->sebutan_desa }}
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('identitas.index') }}"
                                class="nav-link {{ request()->segment(2) == 'identitas' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-house-fill"></i>
                                <p>Identitas {{ $setting->sebutan_desa }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('wilayah.index') }}"
                                class="nav-link {{ request()->segment(2) == 'wilayah' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-map"></i>
                                <p>Wilayah {{ $setting->sebutan_desa }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pemerintah.index') }}"
                                class="nav-link {{ request()->segment(2) == 'pemerintah' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-diagram-3-fill"></i>
                                <p>Pemerintah {{ $setting->sebutan_desa }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'kependudukan' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-person-lines-fill"></i>
                        <p>
                            Kependudukan
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('keluarga.index') }}"
                                class="nav-link {{ request()->segment(2) == 'keluarga' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-people-fill"></i>
                                <p>Keluarga</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('penduduk.index') }}"
                                class="nav-link {{ request()->segment(2) == 'penduduk' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-person-fill"></i>
                                <p>Penduduk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kelompok.index') }}"
                                class="nav-link {{ request()->segment(2) == 'kelompok' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-person-lines-fill"></i>
                                <p>Kelompok</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'statistik' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-clipboard-data"></i>
                        <p>
                            Statistik Data
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('statistik.index') }}"
                                class="nav-link {{ request()->segment(1) == 'statistik' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-bar-chart-fill"></i>
                                <p>Statistik Kependudukan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->segment(2) == 'wilayah' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-clipboard2-data"></i>
                                <p>Laporan Bulanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->segment(2) == 'pemerintah' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-file-earmark-bar-graph"></i>
                                <p>Laporan Kelompok</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-printer"></i>
                        <p>
                            Layanan Surat
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-medical"></i>
                                <p>Pengaturan Surat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-break"></i>
                                <p>Cetak Surat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-archive"></i>
                                <p>Arsip Surat</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-clipboard-check"></i>
                        <p>Analisis</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'administrasi' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-bookmarks"></i>
                        <p>
                            Administrasi
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('jabatan.index') }}"
                                class="nav-link {{ request()->segment(2) == 'jabatan' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-award"></i>
                                <p>Jabatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-arrow-down"></i>
                                <p>Surat Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-arrow-up"></i>
                                <p>Surat Keluar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon bi bi-award"></i>
                                <p>Surat Keputusan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-ruled"></i>
                                <p>Peraturan {{ $setting->sebutan_desa }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-boxes"></i>
                                <p>Inventaris</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-tags"></i>
                                <p>Klasifikasi Surat</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-cash-coin"></i>
                        <p>
                            Keuangan
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-bank"></i>
                                <p>Sumber Dana</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-calculator"></i>
                                <p>Anggaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-basket2"></i>
                                <p>Realisasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bantuan.index') }}"
                        class="nav-link {{ request()->segment(1) == 'bantuan' ? 'active' : '' }}">
                        <i class="nav-icon bi bi-gift"></i>
                        <p>Bantuan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-tv"></i>
                        <p>
                            Admin Web
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-post"></i>
                                <p>Artikel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-menu-button-wide-fill"></i>
                                <p>Widget</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-menu-button-wide"></i>
                                <p>Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-images"></i>
                                <p>Galeri</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-cast"></i>
                        <p>
                            Layanan Mandiri
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-jurnal-code"></i>
                                <p>Laporan Penduduk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-qr-code-scan"></i>
                                <p>Pendaftaran Mandiri</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}"
                        class="nav-link {{ request()->segment(1) == 'setting' ? 'active' : '' }}">
                        <i class="nav-icon bi bi-gear-wide-connected"></i>
                        <p>Pengaturan</p>
                    </a>
                </li>
                <hr>
                <li class="nav-item"> <a href="#" class="nav-link"> <i
                            class="nav-icon bi bi-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

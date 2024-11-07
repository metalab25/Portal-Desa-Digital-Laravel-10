@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3 mb-3 shadow">
                <div class="card-header">
                    <div class="float-end">
                        <select name="" id="" class="form-control form-select">
                            <option value="2024">2024</option>
                            <option value="2024">2023</option>
                            <option value="2024">2022</option>
                            <option value="2024">2021</option>
                            <option value="2024">2020</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="bg-gray disabled color-palette">
                                <tr>
                                    <?php foreach ($data[0] as $key => $value): ?>
                                    <th>
                                        <?= $key ?>
                                    </th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <?php foreach ($data as $baris): ?>
                            <tr>
                                <?php foreach ($data[0] as $key => $value): ?>
                                <td class="<?php echo empty($baris['NO']) ? 'bg-light' : ''; ?>" style="padding: 10px 5px">
                                    <?= $baris[$key] ?>
                                </td>
                                <?php endforeach ?>
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

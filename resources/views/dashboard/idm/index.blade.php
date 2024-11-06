@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered table-striped dataTable table-hover">
                    <thead class="bg-gray disabled color-palette">
                        <tr>
                            <?php foreach ($data[0] as $key => $value): ?>
                            <td>
                                <?= $key ?>
                            </td>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <?php foreach ($data as $baris): ?>
                    <tr>
                        <?php foreach ($data[0] as $key => $value): ?>
                        <td class="<?php echo empty($baris['NO']) ? 'bg-green' : ''; ?>" style="padding: 10px 5px">
                            <?= $baris[$key] ?>
                        </td>
                        <?php endforeach ?>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
@endsection

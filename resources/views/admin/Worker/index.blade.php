<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
<!-- Custom style CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

<style>
    .custom-select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Бухгалтерское обслуживание</h1>
        </div>
        <div class="col-12">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>

                        <th>Обшая сумма:</th>
                        <th colspan="5">Действие:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($workers as $worker)
                        <tr>
                            <td>{{ $worker->salary }} сум</td>
                            <td>
                                <button class="btn btn-outline-success btn-sm" data-toggle="modal"
                                    data-target="#Доход{{ $worker->id }}">Доход</button>
                                {{-- Доход --}}
                                <div class="modal fade" id="Доход{{ $worker->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="formModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="formModal">Доход</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('workerhistory.store') }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Сумма дохода</label>
                                                        <input type="number" id="doxod" class="form-control"
                                                            placeholder="Введите сумму" name="summa" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Выберите категорию дохода</label>
                                                        <select class="custom-select" name="income_category_id">
                                                            @foreach ($incomes as $income)
                                                                <option value="{{ $income->id }}">{{ $income->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Причина</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Напишите точную причину" name="comment" required>
                                                    </div>
                                                    <input type="hidden" name="worker_id" value="{{ $worker->id }}">
                                                    <input type="hidden" name="type" value="Доход">
                                                    <button type="submit"
                                                        class="btn btn-success m-t-15 waves-effect">Продолжать</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Доход end --}}
                            </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                    data-target="#Расход{{ $worker->id }}">Расход</button>

                                {{-- Расход --}}
                                <div class="modal fade" id="Расход{{ $worker->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="formModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="formModal">Расход</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('workerhistory.store') }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Сумма расхода</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Введите сумму" name="summa" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Выберите категорию расхода</label>
                                                        <select class="custom-select" name="income_category_id">
                                                            @foreach ($costs as $cost)
                                                                <option value="{{ $cost->id }}">
                                                                    {{ $cost->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Причина</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Напишите точную причину" name="comment" required>
                                                    </div>
                                                    <input type="hidden" name="worker_id"
                                                        value="{{ $worker->id }}">
                                                    <input type="hidden" name="type" value="Расход">
                                                    <button type="submit"
                                                        class="btn btn-danger m-t-15 waves-effect">Продолжать</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Расход end --}}
                            </td>



                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('workers.show', $worker->id) }}">
                                    История
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- General JS Scripts -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<!-- JS Libraies -->
<script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/index.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<!-- Custom JS File -->
<script src="{{ asset('assets/js/custom.js') }}"></script>






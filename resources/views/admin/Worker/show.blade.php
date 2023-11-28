 <!-- General CSS Files -->
 <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
 <!-- Template CSS -->
 <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
 <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
 <!-- Custom style CSS -->
 <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
 <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>История:</h1>
            </div>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-warning btn-sm" href="{{route('workers.index')}}">
                    Назад
                </a>
            </div>
            <div class="col-12">
                <table class="table text-center">
                   
                    <tr>
                        <th>Обшая сумма:</th>
                        <td>
                           {{$worker->salary}} сум
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-12">
                <p>История:</p>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No:</th>
                            <th>Сумма</th>
                            <th>Тип</th>
                            <th>Комментарий</th>
                            <th>Дата</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workerhistories as $history)  
                        
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$history->summa}} сум</td>
                                    <td>{{$history->type}}</td>
                                    <td>{{$history->comment}}</td>
                                    <td>{{$history->name}}</td>
                                    <td>{{$history->created_at}}</td>
                                </tr>
                    
                        @endforeach
                    
                     
                    </tbody>
                </table>

            </div>

        </div>
    </div>


  <!-- General JS Scripts -->
  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/index.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('assets/js/custom.js')}}"></script>
@extends('admin.layouts.layout')

@section('title')

    statistics Adding Building
    {{ $year }}

@endsection


@section('header')

    {!! Html::style('cus/css/select2.css')  !!}

@endsection


@section('content')

    <section class="content-header">
        <h1>
            statistics Adding Building
            {{ $year }}


        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/adminpanel/buYear/statistics')}}">statistics Adding Building
                    {{ $year }}
                </a></li>

        </ol>
    </section>


    <!-- Main content -->
    <section class="content">

        <div class="row">


            <div class="col-md-12">

                {!! Form::open(['url' => '/adminpanel/buYear/statistics', 'method' => 'post','class' => 'pull-right' ]) !!}

                <select class=" pull-right" name="year">
                    @for($i =2016; $i <=2100 ;$i++)

                        <option value="{{ $i }}">{{ $i }}</option>


                    @endfor
                </select>
                <input name="submit" type="submit" value="show statistics" class="btn btn-warning" style="margin-right: 5px;">
                {!! Form::close() !!}
                <p class="text-center">
                    <strong> statistics Adding Building
                        {{ $year }}</strong>
                </p>
                <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                </div><!-- /.chart-responsive -->
            </div><!-- /.col -->

        </div><!-- /.row -->

    </section>



@endsection




@section('footer')

    {!! Html::script('cus/js/select2.js')  !!}
    <script type="text/javascript">
        $('.select2').select2();

        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //-----------------------
        //- MONTHLY SALES CHART -
        //-----------------------

        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);

        var salesChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
            datasets: [
                {
                    label: "Digital Goods",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [
                        @foreach($new as $c)
                            @if(is_array($c))

                        {{ $c['counting'] }},
                            @else

                        {{ $c }},

                            @endif
                        @endforeach
                    ]
                }
            ]
        };
    </script>
@endsection

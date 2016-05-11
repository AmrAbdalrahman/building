@extends('admin.layouts.layout')

@section('title')

Controlling to members

@endsection


@section('header')

{!! Html::style('admin/plugins/datatables/dataTables.bootstrap.css') !!}


@endsection


@section('content')

 <section class="content-header">
          <h1>
            Controlling in members

          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/users')}}">Controlling in members</a></li>

          </ol>
        </section>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Controlling in members</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="data" class="table table-bordered table-hover " cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Member Name</th>
                        <th>Email</th>
                        <th>Added at</th>
                          <th>My Buildings</th>
                        <th>Permissions</th>
                        <th>Controlling</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                     <tr>
                        <th>#</th>
                        <th>Member Name</th>
                        <th>Email</th>
                        <th>Added at</th>
                         <th>My Buildings</th>
                        <th>Permissions</th>
                        <th>Controlling</th>

                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

@endsection




@section('footer')

{!! Html::script('admin/plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('admin/plugins/datatables/dataTables.bootstrap.min.js') !!}



<script type="text/javascript">

   var lastIdx = null;

  $('#data thead th').each( function () {
      if($(this).index()  < 4 ){
          var classname = $(this).index() == 6  ?  'date' : 'dateslash';
          var title = $(this).html();
          $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" Search '+title+'" />' );
      }else if($(this).index() == 5){
          $(this).html( '<select><option value="0"> Member </option><option value="1"> Administrator </option></select>' );
      }

  } );

  var table = $('#data').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: '{{ url('/adminpanel/users/data') }}',
      columns: [
          {data: 'id', name: 'id'},
          {data: 'name', name: 'name'},
          {data: 'email', name: 'email'},
          {data: 'created_at', name: 'created_at'},
          {data: 'mybu', name: 'mybu'},
          {data: 'admin', name: 'admin'},
          {data: 'control', name: ''}
      ],
      "language": {
          "url": "{{ Request::root()  }}/admin/cus/English.json"
      //  "url": "http://cdn.datatables.net/plug-ins/1.10.11/i18n/English.json"
      },
      "stateSave": false,
      "responsive": true,
      "order": [[0, 'desc']],
      "pagingType": "full_numbers",
      aLengthMenu: [
          [25, 50, 100, 200, -1],
          [25, 50, 100, 200, "All"]
      ],
      iDisplayLength: 25,
      fixedHeader: true,

      "oTableTools": {
          "aButtons": [


              {
                  "sExtends": "csv",
                  "sButtonText": "excel file",
                  "sCharSet": "utf16le"
              },
              {
                  "sExtends": "copy",
                  "sButtonText": "copy information",
              },
              {
                  "sExtends": "print",
                  "sButtonText": "printing",
                  "mColumns": "visible",


              }
          ],


      // "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf"
       "sSwfPath": "{{ Request::root()  }}/admin/cus/copy_csv_xls_pdf.swf"
      },

      "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
      ,initComplete: function ()
      {
          var r = $('#data tfoot tr');
          r.find('th').each(function(){
              $(this).css('padding', 8);
          });
          $('#data thead').append(r);
          $('#search_0').css('text-align', 'center');
      }

  });

  table.columns().eq(0).each(function(colIdx) {
      $('input', table.column(colIdx).header()).on('keyup change', function() {
          table
                  .column(colIdx)
                  .search(this.value)
                  .draw();
      });




  });



  table.columns().eq(0).each(function(colIdx) {
      $('select', table.column(colIdx).header()).on('change', function() {
          table
                  .column(colIdx)
                  .search(this.value)
                  .draw();
      });

      $('select', table.column(colIdx).header()).on('click', function(e) {
          e.stopPropagation();
      });
  });


  $('#data tbody')
          .on( 'mouseover', 'td', function () {
              var colIdx = table.cell(this).index().column;

              if ( colIdx !== lastIdx ) {
                  $( table.cells().nodes() ).removeClass( 'highlight' );
                  $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
              }
          } )
          .on( 'mouseleave', function () {
              $( table.cells().nodes() ).removeClass( 'highlight' );
          } );



</script>
@endsection
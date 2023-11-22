@extends('admin.layouts.admin_layout_index')

@section('title', 'products')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">

@endsection

@section('body')
    <div class="container row row-cols-4  bg-info my-5">
        <input class="form-control m-2" type="text" id="buscarid" data-index="0" placeholder="id">
        <input class="form-control m-2" type="text" id="buscarname" data-index="1" placeholder="name">
        <input class="form-control m-2" type="text" id="buscarbrand" data-index="2" placeholder="brand">
        <input class="form-control m-2" type="text" id="buscarprice" data-index="3" placeholder="price">
        <input class="form-control m-2" type="text" id="buscarstock" data-index="4" placeholder="stock">
        <input class="form-control m-2" type="text" id="buscarcategory" data-index="5" placeholder="category">
        <input class="form-control m-2 col-6" type="text" id="buscardesde" placeholder="buscar desde...">
        <input class="form-control m-2 col-6" type="text" id="buscarhasta" placeholder="buscar hasta...">
    </div>

    <x-admin.table>


    </x-admin.table>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>



    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.13.6/api/sum().js"></script>
    <script src="https://cdn.datatables.net/scroller/2.2.0/js/dataTables.scroller.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>






    <script>
        let table = new DataTable('#table-products', {
            {{-- responsive: true, --}}
            dom: 'Blrftip',
            buttons: [{
                    extend: 'excel',
                    text: 'excel',
                    titleAttr: 'Exportar a excel',
                    className: 'boton-verde'
                },
                {
                    extend: 'pdf',
                    text: 'pdf',
                    titleAttr: 'Exportar a pdf',
                    className: 'btn btn-danger'
                },
                {
                    extend: 'copy',
                    text: 'Copiar',
                    titleAttr: 'Copiar',
                    className: 'btn btn-dark'
                },
                {
                    extend: 'print',
                    text: 'Imprimir',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                },
                {
                    extend: 'selected'
                },
                {
                    extend:'selectedSingle'
                },
                {
                    extend: 'selectAll'
                },
                {
                    extend: 'selectNone'
                },
                {
                    extend: 'selectRows'
                },
                {
                    extend: 'selectColumns'
                },
                {
                    extend: 'selectCells'
                }
            ],

            
            language: {
                sProcessing: 'Procesando...', //Este es el mensaje que aparece en la tarjeta de carga de datos
                info: 'Mostrando pagina _PAGE_ of _PAGES_',
                infoEmpty: 'Datos no disponibles',
                infoFiltered: '(filtrado de un total de _MAX_ registros)',
                lengthMenu: 'Mostrar _MENU_ datos por pagina',
                zeroRecords: 'No encontrado  - losiento',
                sSearch: 'Buscar:',
                'paginate': {
                    'next': 'Siguiente',
                    'previous': 'Anterior'
                },
                select:{
                    rows:{
                        _:"Ud selecciono %d filas",//msg cuando todavia no selecciono
                        0:"Haga clic en una fila para seleccionarla.", //aviso
                        1:"Solo una fila seleccionada"//aviso
                    }
                },
            },
            search: {
                autocomplete: true,
                search: ''
            },
            autoWidth: true,
            ajax: {
                "url": "/products/get",
                "dataSrc": function(json) {
                    for (var i = 0, ien = json.length; i < ien; i++) {
                        json[i][1] = "Hola bro" + json[i][1];
                    }
                    return json;
                }
            },
            orderCellsTop: true,
            fixedHeader: true,
            colReorder: false,
            processing: true, //Mientras se cargan los datos aparece una tarjeta con una animacion que anuncia que el contenido se esta cargando
            columns: [
                {
                    defaultContent: ''
                },
                {
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'brand'
                },
                {
                    data: 'unit_price'
                },
                {
                    data: 'stock'
                },
                {
                    data: 'categories_id'
                },
                {
                    data: 'new_product'
                },
                {
                    data: 'img'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'updated_at'
                },
                {
                    defaultContent: "<button class='editar btn btn-info'>Editar</button>"
                },
                {
                    defaultContent: "<button class='eliminar btn btn-danger'>Eliminar</button>"
                },
            ],
            {{-- scrollY: "300px",
            scrollCollapse : true,
            paging: true,
            scrollX: true, --}}
            deferRender: true,
            scroller: true,
            scrollCollapse: true,
            scrollY: 200,
            scrollX: false,

            select: true,
            select:{
                items: 'row'
            },
            columnDefs: [{
                orderable:false,
                className: 'select-checkbox',
                targets:0
            }],
            select: {
                style: 'single',
                selector: 'td:first-child'
            },


            "createdRow": function(row, data, dataIndex) {
                if (data["unit_price"] <= 10) {

                    $('td', row).eq(0).css({
                        "background-color": "red",
                        "color": "white"
                    });
                }
            },

            "drawCallback": function() {
                let api = this.api();
                $(api.column(4).footer()).html(
                    'Total: ' + api.column(4, {
                        page: 'current'
                    }).data().sum()
                )
            },

        });

        var edit = (tbody, table) => {
            $(tbody).on("click", "button.editar", function() {
                var data = table.row($(this).parents("tr")).data();
                var url = "products/:id";
                url = url.replace(':id', data.id);
                
                window.location.href = url;
            })
        }

        var borrar = (tbody, table) => {
            $(tbody).on("click", "button.eliminar", function() {
                var data = table.row($(this).parents("tr")).data();
                var url = "products/delete/:id";
                url = url.replace(':id', data.id);
                
                window.location.href = url;
            })
        }

        edit("#table-products tbody", table);


        borrar("#table-products tbody", table);




        {{-- //1 forma  de hacer el filtro
        $('#table-products thead tr').clone(true).appendTo('#table-products thead');

        $('#table-products tr:eq(1) th').each(function(i) {
            let title = $(this).text();
            $(this).html('<input type="text" placeholder="Buscar..."/>');

            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table.column(i).search(this.value).draw();
                }
            })
        }) --}}


        //2 forma de hacer el filtro

        $('#buscarid').keyup(function() {
            table.column($(this).data('index')).search(this.value).draw();
        })

        $('#buscarname').keyup(function() {
            table.column($(this).data('index')).search(this.value).draw();
        })

        $('#buscarbrand').keyup(function() {
            table.column($(this).data('index')).search(this.value).draw();
        })
        $('#buscarbrand').keyup(function() {
            console.log('Presionaste este elemento');
        })

        $('#buscardesde, #buscarhasta').keyup(function() {
            table.draw();
        })


        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                let creadoDesde = parseInt($('#buscardesde').val());
                let creadoHasta = parseInt($('#buscarhasta').val());

                var colCreado = parseInt(data[0]);

                if ((isNaN(creadoDesde) && isNaN(creadoHasta)) ||
                    (isNaN(creadoDesde) && colCreado <= creadoHasta) ||
                    (creadoDesde <= colCreado && isNaN(creadoHasta)) ||
                    (creadoDesde <= colCreado && colCreado <= creadoHasta)) {
                    return true;
                }
                return false;
            }
        )


    </script>
@endsection

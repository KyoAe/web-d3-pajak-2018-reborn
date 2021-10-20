// Initialize DataTables for Rank Angkatan
// Setup - add a text input to each footer cell
$('#rank-table thead tr')
    .clone(true)
    .addClass('filters')
    .appendTo('#rank-table thead');

var table = $('#rank-table').DataTable({
    "paging": true,
    "order": [],
    "info": true,
    "autoWidth": false,
    // "responsive": true,
    orderCellsTop: true,
    fixedHeader: true,
    "footerCallback": function ( row, data, start, end, display ) {
        var api2 = this.api(), data;

        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
                i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };

        // Total IPK over all pages
        totalIPK = api2
            .column( 2, {filter: 'applied'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total SKD over all pages
        totalSKD = api2
            .column( 3, {filter: 'applied'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        
        totalIPKSKD = api2
            .column( 4, {filter: 'applied'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        totalData = api2
            .column( 2, {filter: 'applied'} )
            .data().length;

        // Update footer
        $( api2.column( 2 ).footer() ).html(
            'Rata2 IPK: '+(totalIPK / totalData) + '<br>'
            + 'Rata2 SKD: '+(totalSKD / totalData) + '<br>'
            + 'Rata2 IPK & SKD: '+(totalIPKSKD / totalData) + '<br>'
            + 'Total Data: ' + totalData
        );
    },
    initComplete: function () {
    var api = this.api();

    // For each column
    api
        .columns()
        .eq(0)
        .each(function (colIdx) {
        // Set the header cell to contain the input element
        var cell = $('.filters th').eq(
            $(api.column(colIdx).header()).index()
        );
        var title = $(cell).text();
        $(cell).html('<input type="text" placeholder="' + title + '" />');

        // On every keypress in this input
        $(
            'input',
            $('.filters th').eq($(api.column(colIdx).header()).index())
        )
            .off('keyup change')
            .on('keyup change', function (e) {
            e.stopPropagation();

            // Get the search value
            $(this).attr('title', $(this).val());
            var regexr = '({search})'; //$(this).parents('th').find('select').val();

            var cursorPosition = this.selectionStart;
            // Search the column for that value
            api
                .column(colIdx)
                .search(
                    this.value != ''
                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                        : '',
                    this.value != '',
                    this.value == ''
                )
                .draw();

            $(this)
                .focus()[0]
                .setSelectionRange(cursorPosition, cursorPosition);
            });
        });
    },
});
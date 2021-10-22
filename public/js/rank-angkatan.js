// Initialize DataTables for Rank Angkatan
// Setup - add a text input to each footer cell
// $('#rank-table thead tr')
//     .clone(true)
//     .addClass('filters')
//     .appendTo('#rank-table thead');

var table = $('#rank-table').DataTable({
    "paging": false,
    "lengthChange": false,
    // "order": [],
    "info": true,
    // "autoWidth": true,
    // "scrollY": "200px",
    // "scrollCollapse": true,
    // "responsive": true,
    // "scrollX": true,
    orderCellsTop: true,
    fixedHeader: true,
    dom: 'rt',
    // searching: false,
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
        $('.average-ipk').html((totalIPK / totalData));
        $('.average-skd').html((totalSKD / totalData));
        $('.average-ipk-skd').html((totalIPKSKD / totalData));        
    },
    initComplete: function () {
        $('#search').on( 'keyup', function () {
            table.search( this.value ).draw();
        } );
        $('#choice-1').on( 'keyup', function () {
            table.column(5).search("^"+this.value,true,false).draw();
        } );
        $('#choice-2').on( 'keyup', function () {
            table.column(6).search("^"+this.value,true,false).draw();
        } );
        $('#choice-3').on( 'keyup', function () {
            table.column(7).search("^"+this.value,true,false).draw();
        } );
        $('#jump-to-me').on( 'click', function() {
            $.scrollTo('#user-rank', 400, {offset: {top: -100}});
        })
    }
});


table.on( 'order.dt search.dt', function () {
    table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
    // console.log(table.row('.bg-warning').data());
    // $('.user-rank').html((user_rank + 1) + '/' + totalData);
} ).draw();

table.on( 'draw.dt', function() {
    $('.user-rank').html($('#user-rank').html() + '/' + totalData);
    // console.log($('#user-rank').html())
})

// Scroll to top button
$(function() {
var slideToTop = $("<div />");
    slideToTop.html('<i class="fa fa-chevron-up"></i>');
    slideToTop.css({
    position: 'fixed',
    bottom: '20px',
    right: '25px',
    width: '40px',
    height: '40px',
    color: '#eee',
    'font-size': '',
    'line-height': '40px',
    'text-align': 'center',
    'background-color': '#222d32',
    cursor: 'pointer',
    'border-radius': '5px',
    'z-index': '99999',
    opacity: '.7',
    'display': 'none'
    });
    slideToTop.on('mouseenter', function () {
    $(this).css('opacity', '1');
    });
    slideToTop.on('mouseout', function () {
    $(this).css('opacity', '.7');
    });
    $('.wrapper').append(slideToTop);
    $(window).scroll(function () {
    if ($(window).scrollTop() >= 150) {
        if (!$(slideToTop).is(':visible')) {
        $(slideToTop).fadeIn(500);
        }
    } else {
        $(slideToTop).fadeOut(500);
    }
    });
    $(slideToTop).click(function () {
        $.scrollTo(0, 400);
    });
    $(".sidebar-menu li:not(.treeview) a").click(function () {
    var $this = $(this);
    var target = $this.attr("href");
    if (typeof target === 'string') {
        $("body").animate({
        scrollTop: ($(target).offset().top) + "px"
        }, 500);
    }
    });
});
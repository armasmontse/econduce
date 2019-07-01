const $ = jQuery;

export var tablesdrops = function() {

    var toggleTables = '.toogle-table_JS';
    var openButtons = '.open-table_JS';

    $(toggleTables).each(function() {

        var tabla = this;

        $(tabla).find(openButtons).each(function() {

            var boton = this;
            var counter = 0;

            $(boton).click(function() {

                $(toggleTables).toggleClass('open')

                if (!counter) {
                    $(openButtons).text('Ocultar detalles')
                    counter++
                }else {
                    $(openButtons).text('Ver detalles')
                    counter = 0;
                }

            })
        })
    })

    var toggleMobileTables = '.toogle-mobile-table_JS';

    $(toggleMobileTables).each(function() {

        var tabla = this;

        $(tabla).find(openButtons).each(function() {

            var boton = this;
            var counter = 0;

            $(boton).click(function() {

                $(tabla).toggleClass('open')

                if (!counter) {
                    $(boton).text('Ocultar detalles')
                    counter++
                }else {
                    $(boton).text('Ver detalles')
                    counter = 0;
                }

            })
        })
    })

}

var x = 2, y = 3, z = 4;
function mayora(Limite){
    if(x >= Limite){
        x = 0;
    }
    else if(x == 0){
        x = Limite;
    }

    if (y >= Limite){
        y = 0;
    }
    else if(y <= 0){
        y = Limite;
    }
    if(z >= Limite){
        z = 0;
    }
    else if(z <= 0){
        z = Limite;
    }
}
function aumentar(){
    x++; y++; z++;
}
function disminuir(){
    x--; y--; z--;
}
function direccioncentral(Dir){
    return Dir + y + '.png';
}
function direccionizq(Dir){
    return Dir + x + '.png';
}
function direccionder(Dir){
    return Dir + z + '.png';
}
function carrsuelizq(e1,e2,e3,d){
    disminuir();
    mayora(6)
    e1.src=direccionizq(d);
    e2.src=direccioncentral(d);
    e3.src=direccionder(d);
}
function carruselder(e1,e2,e3,d){
    mayora(6);
    aumentar();
    e1.src=direccionizq(d);
    e2.src=direccioncentral(d);
    e3.src=direccionder(d);
}



$.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Anterior',
    nextText: 'Siguiente>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};

$.datepicker.setDefaults($.datepicker.regional['es']);

$(function(){
    $("#datepicker").datepicker({
        minDate: 0,
        maxDate: "+3m",
        stepMonths: 3,
        changeMonth: true
    });
});

$('#ModalServicio').on('show.bs.modal', function(e) {

    var servicio = $(e.relatedTarget).data('servicio');
    
    $(e.currentTarget).find('input[name="nombre_servicio"]').val(servicio);
    $(e.currentTarget).find('input[name="servicio_hid"]').val(servicio);
});

$('#ModalEspecie').on('show.bs.modal', function(e) {

    var especie = $(e.relatedTarget).data('especie');
    
    $(e.currentTarget).find('input[name="nombre_especie"]').val(especie);
    $(e.currentTarget).find('input[name="especie_hid"]').val(especie);
});

$('#ModalMedicamento').on('show.bs.modal', function(e) {

    var medicamento = $(e.relatedTarget).data('medicamento');
    
    $(e.currentTarget).find('input[name="nombre_medicamento"]').val(medicamento);
    $(e.currentTarget).find('input[name="medicamento_hid"]').val(medicamento);
});
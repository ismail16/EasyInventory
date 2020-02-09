$(document).ready(function () {
    //DatePicker Example
    $('.datetimepicker').datetimepicker({
    	format: "d-m-Y",
    	timepicker: false,
    });
});

$('#printInvoice').click(function(){
    // Popup($('.invoice')[0].outerHTML);
    // function Popup(data) 
    // {
    	window.print();
        // return true;
    // }
});
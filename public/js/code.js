Number.prototype.toBrl = function () {
return 'R$ ' + this.toFixed(2).replace('.', ',');
}

$(function () {
    $('#cliente_id').select2({
        theme: 'bootstrap4',
    });
 });


var $ = require('jquery');
var DataTable = require('datatables.net')(window, $);
var language = require('datatables.net-plugins/i18n/pt-BR.js');
 
var table = new DataTable('#myTable', {
    language: language,
});





  
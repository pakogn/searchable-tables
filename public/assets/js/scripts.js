var m = moment();
var today = moment().format('DD/MM/YYYY');

var months = new Array();
var days = new Array();

for (var i = 0; i < 12; i++) months[i] = m.month(i).format('MMMM');
for (var i = 0; i < 7; i++) days[i] = m.day(i).format('dd');

$('.daterange-picker').daterangepicker({
  locale: {
    "format": "DD/MM/YYYY",
    "separator": " - ",
    "applyLabel": "Aplicar",
    "cancelLabel": "Cancelar",
    "fromLabel": "Desde",
    "toLabel": "Hasta",
    "customRangeLabel": "Personalizado",
    "daysOfWeek": days,
    "monthNames": months,
    "firstDay": 1
  },
  "ranges": {
    "Hoy": [
      today,
      today],
    "Ayer": [
      moment().subtract(1, 'day'),
      moment().subtract(1, 'day')],
    "Esta semana": [
      moment().subtract(7, 'day'),
      today],
    "Los últimos 30 días": [
      moment().subtract(30, 'day'),
      today],
    "Este mes": [
      moment().startOf('month'),
      today],
    "El mes pasado": [
      moment().subtract(1, 'month').startOf('month'),
      moment().subtract(1, 'month').endOf('month')],
    "Este año": [
      moment().startOf('year'),
      today],
    "En general": [
      '01/01/1900',
      today]
  },
  //"startDate": '01/01/2014',
  //"endDate": today,
  "maxDate": today,
  "autoApply": true,
  "opens": "right",
});

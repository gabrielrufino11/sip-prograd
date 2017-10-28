// JavaScript Document
$(document).ready(function(e) {
	
	function DataHoje(){
		var d = new Date();
		var month = d.getMonth()+1;
		var day = d.getDate();
		var hoje = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
		return hoje;
	}
	
	
});
$(document).ready(function() {
	$("#divConsuTabelaDebitos").hide("fast");
	$("#divConsuTabelaCreditos").hide("fast");
	$("#amostraTabela1").hide("fast");
	$("#amostraTabela2").hide("fast");
	
	$("#escolherTabela").click(function(){
		$("#amostraTabela1").show("slow");
		$("#amostraTabela2").show("slow");
	});
	
	$("#tabela1").click(function(){
		$("#escolherTabela").hide("slow");
		//$("#amostraTabela1").hide("slow");
		$("#amostraTabela2").hide("slow");
		$("#divConsuTabelaDebitos").show("slow");
	});
	
	$("#tabela2").click(function(){
		$("#escolherTabela").hide("slow");
		$("#amostraTabela1").hide("slow");
		//$("#amostraTabela2").hide("slow");
		$("#divConsuTabelaCreditos").show("slow");
	});
	
	/*$("#calcel").click(function(){
		$("#divConsuTabelaDebitos").hide("slow");
		$("#divConsuTabelaCreditos").hide("slow");
		$("#amostraTabela1").show("slow");
		$("#amostraTabela2").show("slow");
		$("#escolherTabela").show("slow");
	});
	$("#calcel2").click(function(){
		$("#divConsuTabelaDebitos").hide("slow");
		$("#divConsuTabelaCreditos").hide("slow");
		$("#amostraTabela1").show("slow");
		$("#amostraTabela2").show("slow");
		$("#escolherTabela").show("slow");
	});*/
});
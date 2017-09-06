/*
	=====================================================================
	printElement
	=====================================================================
	Version     : 0.1
	Author      : Budi
	Requirement : jQuery
*/

var printElement = function(){
// window.printElement = new function(){

	this.init = function(){
		return true;
	}

	this.print = function(){
		window.print();
	}

	this.setElementPrint = function(elem, append, delimiter) {

		initializeDocument();

		var domClone = elem.cloneNode(true);
		var $printSection = document.getElementById("printSection");
		if (!$printSection) {
			$printSection = document.createElement("div");
			$printSection.id = "printSection";
			document.body.appendChild($printSection);
		}

		if (append !== true) {
			$printSection.innerHTML = "";
		}

		else if (append === true) {
			if (typeof (delimiter) === "string") {
				$printSection.innerHTML += delimiter;
			}
			else if (typeof (delimiter) === "object") {
				$printSection.appendChlid(delimiter);
			}
		}

		$printSection.appendChild(domClone);
	}

	function initializeDocument(){
		function addStyleString(str) {
			var node = document.createElement('style');
			node.innerHTML = str;
			document.body.appendChild(node);
		}

		addStyleString('@media screen {#printSection {display: none;}}');
		addStyleString('@media print {body * {visibility:hidden;}#printSection, #printSection * {visibility:visible;}#printSection {position:absolute;left:0;top:0;}}');
	}
}


// This the interface
window.thunder.printElement = new printElement();
/*
	stringManipulator
	Author: Budi
	Version: 0.1
	19-07-2017

	Contents
	-------------

	1. ucWords
	call method: window.stringManipulator.ucWords('YOUR STRING')
	return : ucWords (php ucWords function like)

	2. ucFirst
	call method: window.stringManipulator.ucFirst('YOUR STRING')
	return : ucFirst (php ucFirst function like)

*/


// Ucwords
var stringManipulator = function(){

	this.ucWords = function(str) {
	  return (str + '')
	    .replace(/^(.)|\s+(.)/g, function ($1) {
	      return $1.toUpperCase()
	    })
	}

	// Ucwords
	this.ucFirst = function(str) {
		return str.charAt(0).toUpperCase() + str.slice(1);
	}

	this.toSpace = function(str) {
		return str.replace(/_/g, ' ');
	}

	// init
	this.init = function(){
		return true;
	}
}


// interface
window.thunder.stringManipulator = new stringManipulator();

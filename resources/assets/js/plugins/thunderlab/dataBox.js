/*
	dataBox
	Author: Budi
	Version: 0.1

	Contents
	-------------
	1. set
		set data to dataBox.
		usage : dataBox.set(INDEX, YOUR DATA)
	2. unset
		unset data from dataBox.
		dataBox.unset(INDEX)
	3. get
		get data from dataBox.
		dataBox.get(INDEX)		
*/


// Ucwords
var dataBox = function(){

	var data = [];

	this.set = function(index, value) {
		try {
			data[index] = value;
		} catch(e) {
			console.log(e);
		}
	}

	this.unset = function(index) {
		try {
			var i = data.indexOf(index);
			if(i != -1) {
				array.splice(i, 1);
			}
		} catch(e) {
			console.log(e);
		}
	}

	this.get = function(index){
		try {
			return data[index];
		} catch(e) {
			console.log(e);
		}
	}

	this.init = function(){
		return true;
	}
}

// This the interface
window.thunder.dataBox = new dataBox();
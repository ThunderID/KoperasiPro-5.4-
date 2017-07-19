/*
	String Caps
	Author: Budi
	Version: 0.1
	19-07-2017

	Contents
	-------------

	1. ucWords
	call method: windows.ucWords('YOUR STRING')
	return : ucWords (php ucWords function like)

	2. ucFirst
	call method: windows.ucFirst('YOUR STRING')
	return : ucFirst (php ucFirst function like)

*/


// Ucwords
window.ucWords = function(str) {
  return (str + '')
    .replace(/^(.)|\s+(.)/g, function ($1) {
      return $1.toUpperCase()
    })
}

// Ucwords
window.ucFirst = function(str) {
	return str.charAt(0).toUpperCase() + str.slice(1);
}
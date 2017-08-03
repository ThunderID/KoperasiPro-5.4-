window.thunder = {};
var config = require('./config.json');

Object.keys(config.plugins).map(function(objectKey, index) {
    var plugin = config.plugins[objectKey];
	require(`${plugin}`);

	if(config.autoload == true){
		try {
			window.thunder[objectKey].init();
		} catch(e) {
			if(config.debug == true){
				console.log("%cERROR : Thunderlab Js Bundle" + "\n" + "Source : " + plugin + "\n" + "Cause : Autoload process failed" + "\n" + "Error detail : "+ e, 'color: red; font-size: 14px;');
			}else{
				console.log("Error detected!" + "\n" + "Source : Thunderlab Js Bundle" + "\n" + "Please enable debug mode to see detail of error");
			}
		}
	}
});
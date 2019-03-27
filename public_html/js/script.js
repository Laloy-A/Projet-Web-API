var carte;

function initialiser() {
	console.log("initialisation");
	var points = [
		[48.018296, 0.160859],
		[48.318296, 0.160859],
		[48.258296, 0.560859]];

	// console.log(points);
	// console.log(centre(points));

	var options = {
		// center: centre(points),
		center: points[0],
		zoom: 16,
		mapTypeId: google.maps.MapTypeId.HYBRID
	};

	carte = new google.maps.Map(document.getElementById("carte"), options);

	for(var i = 0; i < points.length; i++) {
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(points[i][0], points[i][1]),
			map: carte
		});
	}


	//test géo loc
	if (navigator.geolocation) {
		// console.log("Géo loc OK");
		var watchId = navigator.geolocation.watchPosition(successCallback, null, {enableHighAccuracy:true});
	}
	else
		alert("Votre navigateur ne prend pas en compte la géolocalisation HTML5");
}
// Retourne la coordonnée dans une google.maps.LatLng qui est le centre des coordonnées dans points
function centre(points) {
	var latMoy = 0.0, lngMoy = 0.0;
	var len = points.length;
	// console.log("points.length = " + points.length)
	for(var i = 0; i < len; i++) {
		latMoy += points[i][0];
		lngMoy += points[i][1];
	}
	latMoy /= len;
	lngMoy /= len;
	return new google.maps.LatLng(latMoy, lngMoy);
}



//Centre la map et pose un marker sur la position trouvée par géo loc
function successCallback(position){
	carte.panTo(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
		map: carte
	});
}

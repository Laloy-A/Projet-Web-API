var carte;

function initialiser() {
	// console.log("l'initialisation");
	var points = [
		[48.018296, 0.160859],
		[48.318296, 0.160859],
		[48.258296, 0.560859]];
	// var markers = new Array();

	// console.log(points);
	// console.log(centre(points));

	var options = {
		// center: centre(points),
		center: {lat: 48.018296, lng: 0.160859},
		zoom: 8,
		mapTypeId: google.maps.MapTypeId.HYBRID
	};

	carte = new google.maps.Map(document.getElementById("carte"), options);

	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(48.018296, 0.160859),
		map: carte,
		icon: {
		    url: 'https://upload.wikimedia.org/wikipedia/commons/b/b1/Male_mallard_standing.jpg',
		    scaledSize: new google.maps.Size(192,108),
		    origin: new google.maps.Point(0, 0),
		  }
	});
	var coucouLesForains = new google.maps.Marker({
		position: {lat: 48.007762, lng: 0.198354},
		map: carte
	});



	// var lbl = ["A", "B", "C", "D"];
	// var indiceLbl = 0;
	// for(var i = 0; i < points.length; i++) {
	//
	//
	// 	var marker = new google.maps.Marker({
	// 		position: new google.maps.LatLng(points[i][0], points[i][1]),
	// 		map: carte,
	// 		label: lbl[indiceLbl++ % lbl.length]
	// 	});
	// 	// marker.addListener("click", function(){
	// 	// 	console.log("i = " + i);
	// 	// 	console.log("clique sur marker " + marker.getLabel());
	// 	// });
	// 	// markers.push(marker);
	// 	// console.log(markers[i].getLabel());
	// }


	//test géo loc
	// if (navigator.geolocation) {
	// 	// console.log("Géo loc OK");
	// 	var watchId = navigator.geolocation.watchPosition(successCallback, null, {enableHighAccuracy:true});
	// }
	// else
	// 	alert("Votre navigateur ne prend pas en compte la géolocalisation HTML5");
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

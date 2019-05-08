function CustomMarker(latlng, map, args) {
	this.latlng = latlng;	
	this.args = args;	
	this.setMap(map);	
}

CustomMarker.prototype = new google.maps.OverlayView();

CustomMarker.prototype.draw = function() {
	var self = this;
	
	var div = this.div;
	var title = this.title;
	var panes = this.getPanes();

	if (!div) {
		div = this.div = document.createElement('div');
		
		div.className = this.args.divClass ? this.args.divClass : 'pulse__marker';

		if (typeof(self.args.marker_id) !== 'undefined') {
			div.dataset.marker_id = self.args.marker_id;
		}
		
		panes.overlayImage.appendChild(div);
	}

	if (!title) {
		title = this.title = document.createElement('span');
		title.innerHTML = self.args.title;
		panes.overlayImage.appendChild(title);
	}
	
	var point = this.getProjection().fromLatLngToDivPixel(this.latlng);
	
	if (point) {
		div.style.left = (point.x + 5) + 'px';
		div.style.top = (point.y - 15) + 'px';
		title.style.left = (point.x + 22) + 'px';
		title.style.top = (point.y - 4) + 'px';
	}
};

CustomMarker.prototype.remove = function() {
	if (this.div) {
		this.div.parentNode.removeChild(this.div);
		this.div = null;
	}	
};

CustomMarker.prototype.getPosition = function() {
	return this.latlng;	
};
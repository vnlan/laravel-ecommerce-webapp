
		
var slider = document.getElementById("myRange");
var output = document.getElementById("max_price");
output.innerHTML = slider.value;


slider.oninput = function() {
    output.value = this.value;
};



import Offcanvas from 'bootstrap/js/dist/offcanvas';
// example importing other Bootstrap Javascript Module
import Modal from 'bootstrap/js/dist/modal';
import Dropdown from 'bootstrap/js/dist/dropdown';

// document.addEventListener("DOMContentLoaded", () => {
// 	navbar.hoverDropdown();
//     navbar.events();
// });

const searchToggle = document.querySelector('.search-toggle');
searchToggle.addEventListener("click", (event) => {
	let menu = document.querySelector('#searchform');
	let searchField=document.querySelector('.search-box__input');
	menu.classList.toggle('open');
	searchToggle.classList.toggle('close');
	searchField.focus();
});

document.addEventListener("DOMContentLoaded", function(){
	document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
		everydropdown.addEventListener('shown.bs.dropdown', function () {
			el_overlay = document.createElement('span');
			el_overlay.className = 'screen-darken';
			document.body.appendChild(el_overlay)
		});
		everydropdown.addEventListener('hide.bs.dropdown', function () {
			document.body.removeChild(document.querySelector('.screen-darken'));
		});
	});
}); 


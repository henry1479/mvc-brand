// alert('hello!');

let headerButton = document.getElementById('headerButton');
let brandButton = document.getElementById('brandButton');
let overlayWrapper = document.getElementById('overlayWrapper');
let buttonIcon = document.getElementById('buttonIcon');

headerButton.addEventListener('click', function () {
	overlayWrapper.classList.toggle('active');
	if (overlayWrapper.classList.contains('active')) {
		buttonIcon.style.fill = '$dark-pink';
		overlayWrapper.style.display = 'block';
	} else {
		buttonIcon.style.fill = '$white';
		overlayWrapper.style.display = 'none';
	}
})

brandButton.addEventListener('click', function () {
	overlayWrapper.classList.remove('active');
	buttonIcon.style.fill = '$white';
	overlayWrapper.style.display = 'none';
})
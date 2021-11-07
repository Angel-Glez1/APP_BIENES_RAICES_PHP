document.addEventListener('DOMContentLoaded', () => {
	
	eventListeners();
	darkMode();

});

function darkMode(){

	const prefiereDarkMode = window.matchMedia('(prefers-scheme: dark)');

	if (prefiereDarkMode.matches){

		document.body.classList.add('dark-mode');

	}else {

		document.body.classList.remove('dark-mode');

	}

	prefiereDarkMode.addEventListener('change', () => {
		if (prefiereDarkMode.matches) {

			document.body.classList.add('dark-mode');

		} else {

			document.body.classList.remove('dark-mode');

		}
	});

	const botonDarkMode = document.querySelector('.dark-mode-boton');
	botonDarkMode.addEventListener('click', activeDrakMode)
}

function activeDrakMode(){
	document.body.classList.toggle('dark-mode');
}

function eventListeners(){
	const movilMenu = document.querySelector('.movil-menu');
	movilMenu.addEventListener('click', navegacionResponsive);


	// Muestra campos condicionales
	const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
	metodoContacto.forEach(input => input.addEventListener('click', mostarMetodosContacto))

}
function mostarMetodosContacto(e){
	const contactoDiv = document.querySelector('#contacto');

	if(e.target.value === 'telefono'){
		
		contactoDiv.innerHTML = `
			
			<input type="tel" name="telefono" id="telefono" placeholder="Telefono...">

			<p>Eliga la fecha y la hora para la llamada</p>

			<label for="fecha">Fecha</label>
			<input type="date" name="fecha" id="fecha">

			<label for="hora">Hora</label>
			<input type="time" name="hora" id="hora" min="09:00" max="18:00">
		`;

	}else if(e.target.value === 'email'){

		contactoDiv.innerHTML = `
			<input type="email" name="email" id="email" placeholder="Email...">
		`;
	}
}

function navegacionResponsive(){
	const navegacion = document.querySelector('.navegacion');

	navegacion.classList.toggle('mostar');
		
}
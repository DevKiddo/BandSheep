<?php

class bsLanguage {

	public static $lines = array(

		/* Modelo: cosas entre <> deben ser sustituidas.
		 
		'<código-corto>' => array(
				'es'=>' <literal> ',
			),
			
		Para referenciar a la línea en la página:
		
		echo $this->getLanguage()->getLine('error-404')
			
		*/
			
		'sorry-exist' => array(
				'es'=>'Upps ! Lo sentimos, esa pagina no existe',
				'en'=>"Oops ! Sorry, the page doesn't exist",
			),
			
		'sheep-ashamed' => array(
				'es'=>'Nuestra oveja esta tan avergonzada que ha tirado su guitarra al mar',
				'en'=>'The Bandsheep Sheep feels so ashamed, she broke her guitar Pete Townshend-style',
			),
			
		'error-ocurred' => array(
				'es'=>"Ha habido un error.",
				'en'=>'An error occurred.',
			),
		
		'instrument-nolist' => array(
				'es'=>'Se ha quitado el instrumento de la lista.',
				'en'=>'Instrument was taken off the list.',	
				
			),
			
		'error-message' => array(
				'es'=>'Ha habido un error al eliminar el mensaje.',
				'en'=>'An error occurred when eliminating the message.',
			),
			
		'no-band-message' => array(
				'es'=>'No tienes ninguna banda',
				'en'=> "You have no band",
			),
			
		'url-code-error' => array(
				'es'=>'El codigo de la URL es erróneo.',
				'en'=>'The URL code is incorrect.',
			),
			
		'similar-bands' => array(
				'es'=>'Bandas Similares',
				'en'=> 'Similar Bands',
			),
		
		'band-pre-videos' => array(
				'es'=> 'Vídeos de ',
				'en'=> '',
			),
		
		'band-pos-videos' => array(
				'es'=>'',
				'en'=>"'s Videos",
			),
		
		'band-pre-sounds'=> array(
				'es'=> 'Sonidos de ',
				'en'=> '',
			),
		
		'band-pos-sounds' => array(
				'es'=>'',
				'en'=>"'s Sounds",
			),
		
		'band-pre-blog'=> array(
				'es'=> 'Blog de ',
				'en'=> '',
			),
		
		'band-pos-blog' => array(
				'es'=>'',
				'en'=>"'s Blog",
			),
			
		'invite-band' => array(
				'es'=>'Invitar',
				'en'=>'Invite',
			),
		
		'no-post-message' => array(
				'es'=>'No hay ningun post.',
				'en'=>'There are no posts yet.',
			),	
		
		'is-fan-of' => array(
				'es'=>'Es fan de:',
				'en'=>'Is fan of:',
				
			),
			
		'not-following' => array(
				'es'=>'No es fan de nadie.',
				'en'=>"Not following anyone.", 
			),
			
		'no-fan-message' => array(
				'es'=>'Ningun fan.',
				'en'=>'No fans.',
			),
			
		'instruments-mmusicians'=> array(
				'es'=>'Instrumentos: ',
				'en'=>'Instruments: ',
			),
			
		'no-result'=> array(
				'es'=>'No hay resultados, prueba cambiando el criterio de búsqueda.',
				'en'=>'There were no results, try entering a different search criteria',
			), 

		'search-users'=> array(
				'es'=>'Usuarios',
				'en'=>'Users',
			),
			
		'search-bands'=> array(
				'es'=>'Bandas',
				'en'=>'Bands',
			),
			
		'connected-users'=> array(
				'es'=>'Usuarios Conectados',
				'en'=>'Online Users',
			),
		'connected-bands'=> array(
				'es'=>'Bandas Conectados',
				'en'=>'Online Bands',
			),
		'results-for'=> array(
				'es'=>'Resultados para: ',
				'en'=>'Results for: ',
		),
			
		'no-instrument-msearch'=> array(
				'es'=>'Ningún instrumento.',
				'en'=>'No instrument.',
			),
			
		'distance'=> array(
				'es'=>'Aproximadamente a',
				'en'=>'Approximately'
			),
			
		'lives-in-msearch'=> array(
				'es'=>'Vive en',
				'en'=>'Lives in',
			),
			
		'unknown-location-msearch'=> array(
				'es'=>'Ubicación desconocida.',
				'en'=>'Unknown location'
			),
			
		'previous'=> array(
				'es'=>'Anteriores',
				'en'=>'Previous',
			),
			
		'next'=> array(
				'es'=>'Siguientes',
				'en'=>'Next',
			),
				
		'no-sounds'=> array(
				'es'=>'Aun no hay ningún sonido.',
				'en'=>'No sounds have been uploaded yet.',
			),
			
		'no-videos'=> array(
				'es'=>'Aun no hay ningún video.',
				'en'=>'No videos have been uploaded yet.',
			),
			
		'retry'=> array(
				'es'=>'Reintentar',
				'en'=>'Retry'
			),
		
		'logged-in'=> array(
				'es'=>'Te has logueado',
				'en'=>'You are logged in',
			),
			
		'post-not-found'=> array(
				'es'=>'No se ha encontrado el post',
				'en'=>'Post was not found',
			),

		'email-instructions'=> array(
				'es'=>'Por favor sigue las instrucciones que hemos enviado a tu email. Si no ves el email en tu bandeja de entrada echale un vistazo a tu carpeta de correo no deseado o spam.',
				'en'=>'Please follow the directions that have been sent to your email address. If you cannot see the email in your inbox, please check your spam folder. ',
			),
			
		'no-pass-sent'=> array(
				'es'=>'No hemos podido enviarte el link para resetear la contraseña. Sentimos las molestias',
				'en'=>'We could not send you the link to reset your password. We apologize for any inconvenience',
			),
			
		'no-email-database'=> array(
				'es'=>'Ese email no se encuentra en nuestra base de datos',
				'en'=>'The email could not be found in our database',
			),
			
		'email-fill-in'=> array(
				'es'=>'Por favor, rellena el campo del email',
				'en'=>'Please, fill out the email field', 
			),
				
		'confirmation-email'=> array(
				'es'=>'Se ha enviado un email de confirmación a ',
				'en'=>'A confirmation email was send to ',
			),
			
		'login-error'=> array(
				'es'=>'Estas logueado o no has especificado un email y/o contraseña',
				'en'=>'You are logged in or have not entered an email and/or password',
			),
			
		'new-video-band' => array(
				'es'=>'Nuevo Vídeo',
				'en'=>'New Video',
			),
			
		'new-sound-band' => array (
				'es'=>'Nuevo Sonido',
				'en'=>'New Sound',
			),
			
		'new-post-band' => array (
				'es'=>'Nuevo Post',
				'en'=>'New Post',
			),	
		
		'bands-on-fire-bands' => array(
				'es'=>'Bands on Fire',
				'en'=>'Bands on Fire',
			),
			
		'new-band' => array(
				'es'=>'Nueva Banda',
				'en'=>'New Band',
			),
			
		'recommended-bands' => array(
				'es'=> 'Bandas Recomendadas',
				'en'=> 'Recommended Bands',
			),
			
		'random-bands' => array(
				'es'=> 'Bandas Aleatorias',
				'en'=> 'Random Bands',
			),
			
		'band-name' => array(
			'es'=> 'Nombre de la banda',
			'en'=> "Name of band",
			),
			
		'contact-form' => array(
				'es'=>'Formulario de Contacto',
				'en'=>'Contact Form',
			),
			
		'name-form' => array(
				'es'=>'Nombre:',
				'en'=>'Name:',
			),
			
		'purpose-form' => array(
				'es'=> 'Motivo de contacto:',
				'en'=> 'Purpose of contact:',
			),
			
		'lastname-form' => array(
				'es'=> 'Apellido:',
				'en'=> 'Last Name:',
			),
			
		'report-abuse-form' => array(
				'es'=> 'Uso fraudulento',
				'en'=> 'Report Abuse',
			),
			
		'claim-form' => array(
				'es'=> 'Reclamación',
				'en'=> 'Claim',
			),
			
		'other-form' => array(
				'es'=>'Otro',
				'en'=>'Other',
			),
			
		'email-form' => array(
				'es'=> 'Correo:',
				'en'=> 'Email:',
			),
			
		'message-form' => array(
				'es'=> 'Mensaje:',
				'en'=> 'Message:',
			),
			
		'send-form' => array(
				'es'=> 'Enviar',
				'en'=> 'Send',
			),
			
		'sex-form' => array(
				'es'=> 'Sexo:',
				'en'=> 'Sex:',
			),
			
		'male-form' => array(
				'es'=> 'Hombre',
				'en'=> 'Male'
			),
			
		'female-form' => array(
				'es'=> 'Mujer',
				'en'=> 'Female',
			),
			
		'email-not-sent-form' => array(
				'es'=>'El correo no ha sido enviado.',
				'en'=>'Email was not sent',
			),
			
		'email-sent-form' => array(
				'es'=>'Mensaje enviado',
				'en'=>'Email sent',
			),
			
		'bands-on-fire-default'=> array(
				'es'=>'Bands on Fire',
				'en'=>'Bands on Fire',
			),
			
		'personal-msg'=> array(
				'es'=>'Bandeja de Entrada',
				'en'=>'Inbox'
			),
			
		'sent-items'=> array(
				'es'=> 'Enviados',
				'en'=> 'Sent items'
			),
			
		'inbox' => array(
			'es'=>'Mensajes',
			'en'=>'Inbox',
			),
			
		'select-instrument'=> array(
			'es'=>'Filtrar por instrumento:',
			'en'=>'Select an instrument',	
			),
			
		'instrument-search'=> array(
			'es'=>'- Instrumento -',
			'en'=>'- Instrument -',
			),
			
		'user-order'=> array(
			'es'=> 'Ordenar usuarios por:',
			'en'=> 'Arrange users by:',
			),
			
		'registry-order'=> array(
			'es'=> 'Orden de registro',
			'en'=> 'Registry date',
			),
			
		'fans-order'=> array(
				'es'=> 'Ordenar por número de fans',
				'en'=> 'Arrange by number of fans',
			),
		
		'proximity-order'=> array(
				'es'=>'Ordenar por cercania',
				'en'=>'Arrange by proximity',	
			),
		
		'location-not-specified-mainsearch'=> array(
				'es'=> '(No has marcado tu ubicación)',
				'en'=> '(You have not specified your location)',
			),
				
		'user-settings'=> array(
				'es'=> 'Ajustes de Cuenta',
				'en'=> 'User Settings',		
			),
			
		'location-settings'=> array(
				'es'=> 'Ajustes de Localización',
				'en'=> 'Location Settings',
			),
			
		'instrument-settings'=> array(
				'es'=> 'Instrumentos',
				'en'=> 'Instruments',
			),
			
		'user-settings1'=> array(
				'es'=> 'Ajustes de Cuenta',
				'en'=> 'User Settings',	
			),
			
		'name-settings'=> array(
				'es'=> 'Nombre:',
				'en'=> 'Name:',
			),
			
		'name-description'=> array(
				'es'=> 'El nombre que quieres mostrar.',
				'en'=> 'The name that you wish to display.',
			),
			
		'email-settings'=> array(
				'es'=> 'Email:',
				'en'=> 'Email:',
			),
			
		'email-description'=> array(
				'es'=>'El email no puede ser cambiado.',
				'en'=>'You cannot change your email address.',
			),
			
		'birthday-settings'=> array(
				'es'=> 'Fecha de nacimiento:',
				'en'=> 'Date of birth:',
			),
			
		'birthday-change'=> array(
				'es'=>'Puedes cambiar tu fecha de nacimiento.',
				'en'=>'You may change your date of birth.',
			),
			
		'password-settings'=> array(
				'es'=>'Contraseña:',
				'en'=>'Password:',
			),
			
		'password-change'=> array(
				'es'=>'Puedes cambiar tu contraseña.',
				'en'=>'You may change your password.',
			),
			
		'user-settings-bar'=> array(
				'es'=>'Ajustes de Cuenta',
				'en'=>'User Settings',
			),
			
		'musicians-bar'=> array(
				'es'=> 'Músicos',
				'en'=> 'Musicians',
			),
			
		'bands-bar'=> array(
				'es'=> 'Bandas',
				'en'=> 'Bands',
			),
			
		'search-bar'=> array(
				'es'=> 'Buscar',
				'en'=> 'Search',				
			),
			
		'profile-menu'=> array(
				'es'=> 'Perfil',
				'en'=> 'Profile',
			),
			
		'inbox-menu'=> array(
				'es'=> 'Mensajes',
				'en'=> 'Inbox',
			),
			
		'settings-menu'=> array(
				'es'=> 'Ajustes',
				'en'=> 'Settings',
			),
			
		'logout-menu'=> array(
				'es'=>'Salir',
				'en'=>'Log Out',
			),
			
		't&c' => array(
				'es'=>'Términos y Condiciones de Uso',
				'en'=> 'Terms & Conditions',
			),
		
		'privacy-policy' => array(
				'es'=>'Política de Privacidad',
				'en'=>'Privacy Policy',
				
			),
		
		'about-us' => array(
				'es'=>'Acerca de Bandsheep',
				'en'=>'About Bandsheep',
				
			),
			
		'contact-footer'=> array(
				'es'=>'Contáctanos',
				'en'=>'Contact Us',
			),
			
		'is-old'=> array(
				'es'=>'Tiene',
				'en'=>'Is',
			),
			
		'years-old'=> array(
				'es'=>'años.',
				'en'=>'years old.',
			),
			
		'lives-in-profile'=> array(
				'es'=>'Vive en ',
				'en'=>'Lives in ',
			),
			
		'location-not-specified'=> array(
				'es'=>'Aun no ha indicado su ubicación',
				'en'=>'Has not specified a location yet',
			),
			
		'no-instrument-profile'=> array(
				'es'=>'Ningún instrumento.',
				'en'=>'No instrument.',
			),
			
		'no-genre-profile'=> array(
				'es'=>'Ningún género.',
				'en'=>'No genre.',
			),
			
		'no-bio-profile'=> array(
				'es'=>'Ninguna biografía.',
				'en'=>'No bio.',
			),
	
		'no-band-profile'=> array(
				'es'=>'No tiene ninguna banda.',
				'en'=>'Is not in any band.'
			),
	
		'new-video-profile'=> array(
				'es'=>'Nuevo Vídeo',
				'en'=>'New Video',
			),
		
		'new-sound-profile'=> array(
				'es'=>'Nuevo Sonido',
				'en'=>'New Sound',
			),
		
		'new-post-profile'=> array(
				'es'=>'Nuevo Post',
				'en'=>'New Post',
			),
		
		'profile-pre-videos' => array(
				'es'=> 'Vídeos de ',
				'en'=> '',
			),
			
		'profile-pos-videos' => array(
				'es'=>'',
				'en'=>"'s Videos",
			),
		
		'profile-pre-sounds' => array(
				'es'=> 'Sonidos de ',
				'en'=> '',
			),
				
		'profile-pos-sounds' => array(
				'es'=>'',
				'en'=>"'s Sounds",
			),
			
		'profile-pre-blog' => array(
				'es'=> 'Blog de ',
				'en'=> '',
			),
				
		'profile-pos-blog' => array(
				'es'=>'',
				'en'=>"'s Blog",
			),
			
		'do-it-now' => array(
				'es'=>'Házlo ahora',
				'en'=>'Do it now',
			),
		
		'bands-profile' => array(
				'es'=> 'Bandas:',
				'en'=> 'Bands:', 
			),
			
		'previous-bspage' => array(
				'es'=> '← Anteriores',
				'en'=> '← Previous',
			),
			
		'next-bspage' => array(
				'es'=> 'Siguientes →',
				'en'=> 'Next →',
			),
			
		'no-instrument-musicians'=> array(
				'es'=>'No tocas ningún instrumento',
				'en'=>'You play no instruments.',
			),
			
		'put-location-musicians'=> array(
				'es'=>'Configura tu localización ',
				'en'=>'Set your location ',		
			),

		'here-location-musicians'=> array(
				'es'=>'aquí',
				'en'=>'here',
			),
			
		'bands-on-fire-musicians'=> array(
				'es'=>'Bands on Fire',
				'en'=>'Bands on Fire',
			),	

		'main-search-musicians'=> array(
				'es'=> "Nombre o Instrumento",
				'en'=> "Name or Instrument",
			),

		'add-instrument-sminstruments'=> array(
				'es'=>'Añadir Instrumento',
				'en'=>'Add Instrument',			
			),
		
		'instrument-sminstruments'=> array(
				'es'=>'- Instrumento -',
				'en'=>'- Instrument -',
			),
			
		'update-settings-location'=> array(
				'es'=>'Actualizar',
				'en'=>'Update',
			),
		
		'no-instrument-bssearchresult'=> array (
				'es'=>'Ningún instrumento.',
				'en'=>'No instrument.',
			),
		
		'genres'=> array(
				'es'=>'- Generos -',
				'en'=>'- Genres -',
		),
			
		'add-genres'=> array(
				'es'=>'Añadir Generos',
				'en'=>'Add Genres',
		),
			
		'lives-in-bssearchresult' => array(
				'es'=>'Vive en ',
				'en'=>'Lives in ',
			),
		
		'unknown-location-bssearchresult'=> array(
				'es'=>'Ubicación desconocida.',
				'en'=>'Unknown location',
			),
			
		'conection-error-bsBand'=> array(
				'es'=>'Error de conexion a DB.',
				'en'=>'Error conecting to DB.',
			),
		
		'conection-error-bsUser'=> array(
				'es'=>'Error de conexion a DB.',
				'en'=>'Error conecting to DB.',
			),
			
		'harmonium'=> array(
				'es'=>'Armonio',
				'en'=>'Harmonium',
			),
			
		'harmonica'=> array(
				'es'=>'Armónica',
				'en'=>'Harmonica',	
			),

		'harp'=> array(
				'es'=>'Arpa',
				'en'=>'Harp',	
			),	
			
		'bass'=> array(
				'es'=>'Bajo',
				'en'=>'Bass',
			),	
			
		'balalaika'=> array(
				'es'=>'Balalaica',
				'en'=>'Balalaika',
			),
		
		'bandurria'=> array(
				'es'=>'Bandurria',
				'en'=>'Bandurria',
			),
			
		'banjo'=> array(
				'es'=>'Banjo',
				'en'=>'Banjo',
			),
			
		'drums'=> array(
				'es'=>'Batería',
				'en'=>'Drums',
			),
		
		'saxhorn'=> array(
				'es'=>'Bombardino',
				'en'=>'Saxhorn',
			),
			
		'seed-bracelet'=> array(
				'es'=>'Brazalete de semillas',
				'en'=>'Seed bracelet',
			),
			
		'bell'=> array(
				'es'=>'Campana',
				'en'=>'Bell',
			),
			
		'rattles'=> array(
				'es'=>'Cascabeles',
				'en'=>'Rattles',	
			),
			
		'castanets'=> array(
				'es'=>'Castañuelas',
				'en'=>'Castanets',
			),
			
		'charango'=> array(
				'es'=>'Charango',
				'en'=>'Charango',
			),	
			
		'clarinet'=> array(
				'es'=>'Clarinete',
				'en'=>'Clarinet',
			),
			
		'bass-clarinet'=> array(
				'es'=>'Clarinete bajo',
				'en'=>'Bass clarinet',
			),
			
		'clavecin'=> array(
				'es'=>'Clavecín',
				'en'=>'Clavecin',
			),	
			
		'clavichord'=> array(
				'es'=>'Clavicordio',
				'en'=>'Clavichord',
			),	
			
		'contrabass'=> array(
				'es'=>'Contrabajo',
				'en'=>'Contrabass',
			),

		'double-bassoon'=> array(
				'es'=>'Contrafagot',
				'en'=>'Double Bassoon',
			),
			
		'chorist'=> array(
				'es'=>'Corista',
				'en'=>'Chorist',
			),	
			
		'english-horn'=> array(
				'es'=>'Corno inglés',
				'en'=>'English horn',
			),	
			
		'cuatro'=> array(
				'es'=>'Cuatro',
				'en'=>'Cuatro',
			),
			
		'zither'=> array(
				'es'=>'Cítara',
				'en'=>'Zither',
			),
			
		'espinetav'=> array(
				'es'=>'Espinetav',
				'en'=>'Espinetav',
			),
			
		'bassoon'=> array(
				'es'=>'Fagot',
				'en'=>'Bassoon',
			),
			
		'flabiol'=> array(
				'es'=>'Flabiol',
				'en'=>'Flabiol',
			),	

		'flute'=> array(
				'es'=>'Flauta',
				'en'=>'Flute',
			),	
			
		'piccolo'=> array(
				'es'=>'Flautín o píccolo',
				'en'=>'Piccolo',
			),

		'flugelhorn'=> array(
				'es'=>'Fliscorno',
				'en'=>'Flugelhorn',
			),
			
		'bagpipes'=> array(
				'es'=>'Gaita',
				'en'=>'Bagpipes',
			),

		'gong'=> array(
				'es'=>'Gong',
				'en'=>'Gong',
			),
			
		'guitar'=> array(
				'es'=>'Guitarra',
				'en'=>'Guitar',
			),
			
		'electric-guitar'=> array(
				'es'=>'Guitarra Eléctrica',
				'en'=>'Electric Guitar',
			),	
			
		'lute'=> array(
				'es'=>'Laúd',
				'en'=>'Lute',
			),
			
		'lyra'=> array(
				'es'=>'Lira',
				'en'=>'Lyra',
			),	
			
		'maracas'=> array(
				'es'=>'Maracas',
				'en'=>'Maracas',
			),	
		
		'mandolin'=> array(
				'es'=>'Mandolina',
				'en'=>'Mandolin'	
				
			),
			
		'viola-lyra'=> array(
				'es'=>'Lira viola',
				'en'=>'Viola lyra',
			),	
			
		'marimba'=> array(
				'es'=>'Marimba',
				'en'=>'Marimba',
			),	

		'melodic'=> array(
				'es'=>'Melódica',
				'en'=>'Melodic',
			),

		'oboe'=> array(
				'es'=>'Oboe',
				'en'=>'Oboe',
			),	
			
		'ocarina'=> array(
				'es'=>'Ocarina',
				'en'=>'Ocarina',
			),

		'percussion'=> array(
				'es'=>'Percusión',
				'en'=>'Percussion',
			),	
			
		'piano'=> array(
				'es'=>'Piano',
				'en'=>'Piano',
			),	
			
		'qena'=> array(
				'es'=>'Quena',
				'en'=>'Qena',
			),

		'rabel'=> array(
				'es'=>'Rabel',
				'en'=>'Rabel',
			),

		'requinto'=> array(
				'es'=>'Requinto',
				'en'=>'Requinto',
			),	
			
		'saxophone'=> array(
				'es'=>'Saxofón',
				'en'=>'Saxophone',
			),	
			
		'sicu'=> array(
				'es'=>'Sicu',
				'en'=>'Sicu',
			),	
			
		'sitar'=> array(
				'es'=>'Sitar',
				'en'=>'Sitār',
			),	
			
		'rattles'=> array(
				'es'=>'Sonajas',
				'en'=>'Rattles',
			),
			
		'sousaphone'=>  array(
				'es'=>'Sousafón',
				'en'=>'Sousaphone',
			),	
			
		'tin-and-low-whistle'=> array(
				'es'=>'Tin y Low Whistle',
				'en'=>'Tin y Low Whistle',
			),	
			
		'triangle'=> array(
				'es'=>'Triángulo',
				'en'=>'Triangle',
			),

		'trombone'=> array(
				'es'=>'Trombón',
				'en'=>'Trombone',
			),
			
		'trumpet'=> array(
				'es'=>'Trompeta',
				'en'=>'Trumpet',	
			),
			
		'horn'=> array(
				'es'=>'Trompa',
				'en'=>'Horn',
			),	
			
		'french-horn'=> array(
				'es'=>'Trompeta',
				'en'=>'French horn',
			),

		'txistu'=> array(
				'es'=>'Txistu',
				'en'=>'Txistu',
			),	
			
		'ukelele'=> array(
				'es'=>'Ukelele',
				'en'=>'Ukelele',
			),	
			
		'viola'=> array(
				'es'=>'Viola',
				'en'=>'Viola',
			),

		'cello'=> array(
				'es'=>'Violonchelo',
				'en'=>'Cello',
			),	
			
		'violin'=> array(
				'es'=>'Violín',
				'en'=>'Violin',
			),
		
		'vocalist'=> array(
				'es'=>'Vocalista',
				'en'=>'Vocalist',
			),
			
		'vocalist-bass'=> array(
				'es'=>'Vocalista Bajo',
				'en'=>'Bass vocalist',
			),
			
		'vocalist-baritone'=> array(
				'es'=>'Vocalista Barítono',
				'en'=>'Baritone Vocalist',
			),
			
		'vocalist-contraalto'=> array(
				'es'=>'Vocalista Contralto',
				'en'=>'Cobtraalto Vocalist',
			),
			
		'vocalist-mezzosoprano'=> array(
				'es'=>'Vocalista Mezzosoprano',
				'en'=>'Mezzosoprano Vocalist',
			),
			
		'vocalist-soprano'=> array(
				'es'=>'Vocalista Soprano',
				'en'=>'Soprano Vocalist',
			),	
			
		'vocalist-tenor'=> array(
				'es'=>'Vocalista Tenor',
				'en'=>'Tenor Vocalist',
			),

		'xylophone'=> array(
				'es'=>'Xilófono',
				'en'=>'Xylophone',
			),
			
		'organ'=> array(
				'es'=>'Órgano',
				'en'=>'Organ',
			),	
			
		'all-fields-required'=> array(
				'es'=>'Tienes que rellenar todos los campos.',
				'en'=>'All fields are required.',
			),
			
		'incorrect-login'=> array(
				'es'=>'User o contraseña incorrectos',
				'en'=>'Incorrect username or password',
			),

		'password-login'=> array(
				'es'=>'Contraseña',
				'en'=>'Password',
			),

		'register-login'=> array(
				'es'=>'Registrarse',
				'en'=>'Register',
			),
			
		'remember-password-login'=> array(
				'es'=>'¿Has olvidado tu contraseña?',
				'en'=>'Forgot your password?',
			),
			
		'update-location'=> array(
				'en'=>'Update location',
				'es'=>'Cambiar ubicación',
			),
			
		'account-not-validated'=> array(
				'en'=>"You haven't validated your email yet",
				'es'=>'Tu email aun no ha sido validado',
			),
			
		'account-already-validated'=> array(
				'en'=>"This account was already validated.",
				'es'=>'Esta cuenta ya ha sido validada antes.',
		),
			
		'resend-email'=> array(
				'en'=>"Resend",
				'es'=>'Reenviar',
			),
			
		'no-messages'=> array(
				'en'=>"There are no messages",
				'es'=>'No hay mensajes',
			),
		'about-us-content'=> array(
				'en'=>
				       "<br><br>
				 		<br><br> Millions of ads are posted every year on musician-wanted and musician-available sites. Musicians, producers, promoters, and other music industry professionals are looking for talent worldwide – whether it is to start a band or to win the Grammy Award. Most of them rarely end up finding what they want.
						<br><br> We want to solve this problem.
				        <br><br> BandSheep is a social platform that connects local musicians and bands. Our holistic vision is to build a network that connects and helps everyone in the music industry.",
				'es'=> "<br><br>
						<br><br> Millones de anuncios son publicados cada año a partir de personas que buscan concectar con músicos. Músicos, productores, patrocinadores, y otros profesionales dentro de la industria musical estan buscando por talento global - sea para empezar una banda, o para ganar el Grammy Award. La mayoria, raramente acaba topandose con lo que buscaba.
						<br><br> Queremos solucionar este problema.
						<br><br> BandSheep es una plataforma social que conecta a músicos y bandas locales. Nuestra vision es construir una red que conecte y ayude a todo individuo dentro de la industria musical",
			),
			
		'profile'=> array(
				'es'=>'Perfil',
				'en'=>'Profile',
			),
			
		'bands'=> array(
				'es'=>'Bandas',
				'en'=>'Bands',
			),
			
		'band'=> array(
				'es'=>'Banda',
				'en'=>'Band',
			),
		
		'messages'=> array(
				'es'=>'Mensajes',
				'en'=>'Messages',
			),
			
		'settings'=> array(
				'es'=>'Ajustes',
				'en'=>'Settings',		
			),
			
		'search'=> array(
				'es'=>'Búsqueda',
				'en'=>'Search',
			),
			
		'terms'=> array(
				'es'=>'Términos',
				'en'=>'Terms',
			),
			
		'contact'=> array(
				'es'=>'Contacto',
				'en'=>'Contact',
			),
			
		'change-password'=> array(
				'es'=>'Cambio de Contraseña',
				'en'=>'Change Password',		
			),
			
		'activate-user'=> array(
				'es'=>'Activar Usuario',
				'en'=>'Activate User',
			),
			
		'404-error'=> array(
				'es'=>'Error 404',
				'en'=>'404 Error', 
			),
			
		'musicians'=> array(
				'es'=>'Músicos',
				'en'=>'Musicians',
			),
			
		'about-us'=> array(
				'es'=>'Acerca de Nosotros',
				'en'=>'About Us',
			),
		'send-correct-feedback'=> array(
				'es'=>'Tu feedback se ha enviado correctamente.',
				'en'=>'Your feedback was sent correctly.',
		),
			
		'rate-form'=> array(
				'es'=>'Puntuación (1=Mala; 10=¡Increíble!):',
				'en'=>'Rate (1=Bad; 10=Awesome!):',
		),
			
		'subject-form'=> array(
				'es'=>'Asunto:',
				'en'=>'Subject:',	
		),
			
		'comments-form'=> array(
				'es'=>'Comentarios:',
				'en'=>'Comments:',
		),
			
		'bslist-and'=> array(
				'es'=>'y',
				'en'=>'and',
		),
			
		'edit'=> array(
				'es'=>'Editar',
				'en'=>'Edit',
			),
		'more'=> array(
				'es'=>'Más',
				'en'=>'More',
		),
			
		'privacy-policy-content'=> array(
				'es'=>'
				<h2 align="center">
				<strong>Política de Privacidad de Bandsheep</strong>
			</h2>
			<p>Bansheep adquiere un alto compromiso con la privacidad. A
				continuación, revelamos nuestras prácticas de recopilación de
				información y métodos de divulgación para nuestra página web:
				Bandsheep.com. Esta declaración será actualizada de vez en cuando,
				por lo que recomendamos que la revises periódicamente.</p>
			<p>
				<strong>La información de nuestros miembros recopilada en el momento
					en que se registraron está dividida en las siguientes secciones:</strong>
			</p>
			<p>
				<strong><u>Información Confidencial</u>
				</strong> <strong>:</strong>
			</p>
			<p>Parte de tu información es confidencial y no será publicada en tu
				perfil. Es posible que contactemos contigo para asuntos
				administrativos referentes a tu cuenta. También podemos usar esta
				información para personalizar tu experiencia con Bandsheep.com. Tu
				información confidencial nunca será vendida, revelada o transmitida
				a terceras partes de otros modos. Solo facilitaremos tu información
				personal si lo requiere la Ley.</p>
			<p>
				<strong><u>Dirección de correo electrónico</u>
				</strong> <strong>:</strong>
			</p>
			<p>No facilitaremos, venderemos o revelaremos de cualquier otro modo
				tu email a terceras partes. Sin embargo, puede que haya promociones
				y encuestas en nuestra web, en las que tendrás la oportunidad de
				participar opcionalmente y tu participación podrá ser compartida con
				terceras partes. Estas circunstancias serán divulgadas en la página
				web. Al hacerte miembro, aceptas recibir la correspondencia que
				enviamos por e-mail.</p>
			<p>
				<strong><u>Información de Perfil</u>
				</strong> <strong>:</strong>
			</p>
			<p>Otros miembros de Bandsheep.com podrán ver tu perfil. Los perfiles
				de miembros incluyen una descripción y fotos, redacciones
				individuales y otra información que será de ayuda para hacer
				búsqueda de similitudes. Tu perfil visible no incluye ningún tipo de
				información identificativa, excepto el nombre de usuario que
				elegiste al registrarte.</p>
		
			<p>
				<strong><u>Contacta con nosotros</u>
				</strong> <strong>:</strong>
			</p>
			<p>Cuando contactas con Bandsheep.com a través de la opción “Contáctanos”,
				usamos el email e información incluida para responder preguntas o
				resolver problemas acerca de la nuestra web Bandsheep.com. Puede que
				documentemos tu dirección de IP, tipo de navegador y otra
				información técnica para diagnosticar problema con el uso de Nuestro
				servidor, para la gestión de seguridad y referencia demográfica. En
				ocasiones, también recopilamos esta información para Asuntos
				internos de negocios pero que no estará disponible a personas fuera
				de la organización de Bandsheep.com. Solo facilitaremos esta
				información si lo requiere la Ley.</p>
			<p>
				<strong><u>Seguridad</u>
				</strong> <strong>:</strong>
			</p>
			<p>Puede que usemos “cookies” para simplificar la experiencia de los
				usuarios. Si configuras tu navegador para rechazar cookies, Es
				posible que el servicio no funcione. La base de datos de
				Bandsheep.com permanece protegido por los firewalls contra la
				pérdida, el mal uso o la alteración de la información bajo nuestro
				control. Hemos tomado medidas preventivas para restringir el acceso
				a datos personales, así como para detectar y prohibir ciertas
				conexiones y operaciones realizadas por usuarios no autorizados.
				Aunque nuestras medidas superan a los estándares de la industria, no
				podemos afirmar con seguridad que el sistema será impenetrable bajo
				circunstancias fuera de lo común o que podrá recuperarse por
				completo de futuros ataques.</p>
			<p>
				<strong><u>Enlaces</u>
				</strong> <strong>:</strong>
			</p>
			<p>Bandsheep.com contiene enlaces a otras paginas webs. Por favor, ten en
				cuenta que cuando haces click en uno de estos enlaces, estas
				“haciendo click” en otra web. Te animamos a leer la política de
				privacidad de estas paginas webs, ya que puede ser diferente a la nuestra.</p>
			<p>
				<strong><u>Protégete del Spam</u>
				</strong> <strong>:</strong>
			</p>
			<p>Es bueno evitar dar tu dirección de email o cualquier otra
				información en los chats, formularios públicos o en cualquier otro
				lugar, a menos que sea protegido adecuadamente. Otras personas
				podrian utilizar la información</p>
			<p>
				<strong><u>Elección/Opción de exclusión voluntaria</u>
				</strong> <strong>:</strong>
			</p>
			<p>Bandsheep.com envía emails informativos a sus miembros
				periódicamente, así como noticias acerca de nuevos servicios
				disponibles, mejoras, programa de interrupción de servicios, etc.
				Nuestros miembros pueden decidir la exclusión voluntaria de nuestras
				comunicaciones suspendiendo su membresía.</p>
			<p>Para suspender o cancelar nuestra membresía y, de este modo, no
				recibir más nuestros servicios o comunicaciones: Ve a El área de
				"Opciones de Cuenta". Ahí podrás modificar o actualizar toda tu
				información online del siguiente modo: Ve a La sección de tu perfil
				"Editar Perfil"</p>
			<p>
				<strong><u>Notificación de cambios</u>
				</strong> <strong>:</strong>
			</p>
			<p>Si cambiamos nuestra privacidad o el modo en que usamos la
				información identificativa, publicaremos de forma claramente visible
				en la web dicha modificación 30 días antes de que se lleve a cabo.</p>
			<p>
				<strong><u>Contactar con la web</u>
				</strong> <strong>:</strong>
			</p>
			<p>Si tienes alguna duda respecto a la política de privacidad, las
				prácticas de esta web o tu trato con nuestra web, puedes contactar
				con Bandsheep.com y su “Soporte técnico” haciendo clic sobre el
				enlace “Contáctanos”.</p>',
				'en'=>"
				<h2 align='center'>
				<strong>BandSheep Privacy Policy</strong>
				</h2>
				<p>BandSheep practices a strong commitment to privacy. The following
				 discloses our information gathering and dissemination practices for 
				 this website: BandSheep.com.This statement may be updated from time to time, 
				 so please check back periodically. </p>
				<p>
				<strong> The information collected from our members at the time of registration is divided into the following sections: </strong>
				</p>
				<p>
				<strong><u>Confidential Information</u>
				</strong> <strong>:</strong>
				</p>
				<p>Part of your information is confidential and will not be posted in your profile. 
				We may contact you for administrative purposes regarding your account. Also, we may 
				use this information to customize your experience with BandSheep.com. Your confidential
				information will never be sold or disclosed or otherwise made available to third parties. 
				We will only disclose your personal information if required by law. </p>
				<p>
				<strong><u>E-mail Address</u>
				</strong> <strong>:</strong>
				</p>
				<p>We do not disclose your e-mail address nor do we sell it or make it available to any third party.
				 However, there may be promotions and surveys which may appear on the site in which your participation
				 is optional and your taking part in same may be shared with a third party. These circumstances will be
				 disclosed on the site. By being a member, you agree to receive e-mail correspondence from us. </p>
				<p>
				<strong><u>Profile Information</u>
				</strong> <strong>:</strong>
				</p>
				<p> Your profile is available for other members to view at BandSheep.com. Member's profiles include a 
				description and photos, individual essays and other information helpful in determining matches. Your 
				viewable profile does not include any identifying information about you, except the username (&quot;Online Handle&quot;) 
				you chose upon registering. </p>
				<p>
				<strong><u>Contact Us</u>
				</strong> <strong>:</strong>
				</p>
				<p>When you contact BandSheep.com through the support feature, we use the e-mail address and information entered to respond to
				 questions or problems about the BandSheep.com web site. We may document your IP address, browser type and other technical information
				 for use in diagnosing problems with our server, managing security and for demographic reference. We also sometimes collect this information
				 for internal business purposes but not available to any person outside the BandSheep.com organization. We will only disclose this information
				 if required by law. </p>
				<p>
				<strong><u>Security</u>
				</strong> <strong>:</strong>
				</p>
				<p>We may use cookies to simplify the user's experience. If you set your browser to reject cookies, the service may not function properly. 
				The BandSheep.com database resides behind firewalls in order to protect against the loss, misuse and alteration of the information under our 
				control. We have taken preventive measures to restrict access to sensitive data, as well as to detect and prohibit certain connections and 
				operations by unauthorized users. While our measures exceed industry standards, no claim is made as to the impenetrability of the system
				under unusual circumstance or its resilience to future attacks. </p>
				<p>
				<strong><u>Links</u>
				</strong> <strong>:</strong>
				</p>
				<p>BandSheep.com contains links to other web sites. Please note that when you click on one of these links, you are clicking to another web
				 site. We encourage you to read the privacy statements of these linked sites as their privacy policy may differ from ours. </p>
				<p>
				<strong><u>Protect yourself from Spam</u>
				</strong> <strong>:</strong>
				</p>
				<p>It is a good practice to refrain from disclosing your e-mail address or any other information in chat rooms, public forms or anywhere
				 else unless it's properly protected. Other persons may use information disclosed for many purposes, including spamming. </p>
				<p>
				<strong><u>Choice/Opt-Out</u>
				</strong> <strong>:</strong>
				</p>
                <p>BandSheep.com sends e-mail newsletters to members and periodically sends e-mails about new services, improvements, scheduled service 
				interruptions, etc. Our members can opt-out of receiving communications from us by suspending their membership. 
				To suspend or cancel your membership and no longer receive our service or communications from us: Go to the Account Options area. 
				You can change or update all your personal information online by going to your profile section in Edit Profile. </p>
				<p>
				<strong><u>Notification of Changes</u>
				</strong> <strong>:</strong>
				</p>
				<p>If we materially change our privacy practices or how we use your personally identifiable information, we will post a prominent
				 notice on our site 30 days prior to the change.</p>
				<p>
				<strong><u>Contacting the Web Site</u>
				</strong> <strong>:</strong>
				</p>
				<p>If you have any questions about this privacy statement, the practices of this site, or your dealings with this Web site, you should
				 contact BandSheep.com by clicking on the 'Contact Us' link.</p>",
				
			),
			
			't&c-content'=> array(
					'es'=>'<h2 align="center">
				<strong>Condiciones de T&#233;rmino y Uso de Bandsheep</strong>
			</h2>
			<p>Bandsheep es una plataforma social pública que facilita un espacio
				personal a través del que puedes facilitar e intercambiar
				información y establecer comunicación entre músicos y/o grupos
				musicales. La plataforma social pública Bandsheep es administrada
				por Bandsheep LLC.</p>
			<p>
				Estas Condiciones de uso regulan el acceso y la utilización del
				Servicio, a través del sitio web alojado bajo los nombres de dominio
				<a href="http://www.bandsheep.com/">www.bandsheep.com</a> como, en su
				caso, de las aplicaciones móviles que Bandsheep ponga a disposición
				de los usuarios en cada momento en los "Marketplaces" y/o "App
				Stores" de terminales móviles, así como de todos los contenidos que
				se muestren o pongan a disposición de los usuarios en el Servicio.
			</p>
			<p>Al usar la web de Bandsheep acuerda estar sujeto a sus Términos de
				Uso, tanto si se registra como miembro, como si no lo hace, o crea
				un perfil. Si deseas hacerte Miembro y comunicarte con otros
				Miembros, así como hacer uso de los servicios de Bandsheep, lee
				nuestros Términos de Uso e indica tu aceptación siguiendo las
				instrucciones en el "proceso de registro".</p>
			
			<p>Bandsheep se reserva el derecho a su elección exclusiva, de
				revisar las presentes Condiciones de uso en cualquier momento por
				razones legales, por motivos técnicos o por cambios en la prestación
				del Servicio o en la normativa, así como modificaciones que pudieran
				derivarse de códigos tipo aplicables o, en su caso, por decisiones
				corporativas estratégicas. Cuando esto ocurra lo publicaremos en el
				sitio web y/o te avisaremos de ello a través del mismo, y si
				continúas utilizando el Servicio, entenderemos que has aceptado las
				modificaciones introducidas. Si no estuvieras de acuerdo con las
				modificaciones efectuadas, podrás darte de baja en el Servicio
				siguiendo el procedimiento habilitado para ello.</p>
			
			<p>Este acuerdo expone los términos legales de tu uso de la Web y
				aplicaciones móviles, así como de tu membresía en los servicios, los
				cuales se harán efectivos al ser publicados en la Web por Bandsheep.
				Este Acuerdo incluye la Política de Uso Aceptable del Contenido
				Publicado en la Web de Bandsheep, la Políticas de Privacidad de
				Bandsheep, y cualquier otro anuncio acerca de la Web. Podrás
				solicitar una copia de este Acuerdo mandándonos un email
				a: soporte@bandsheep.com Asunto: Acuerdo de Términos de Uso.</p>
			
			<ol start="1" type="1">
				<p><li><strong><u>Elegibilidad</u></strong>: Deberás tener dieciocho años o
					más o ser representado por alguien de dieciocho años o mayor para
					registrarte como miembro en Bandsheep o usar la web. La membresía
					será nula donde este prohibida. Al usar la Web, constituyes y
					garantizas que tienes el derecho, autoridad y capacidad para entrar
					en este Acuerdo, así como para atenerse a todos los términos y
					condiciones de este Acuerdo.</li></p>
				<p><li><strong><u>Término</u></strong>: Este Acuerdo permanecerá en plena
					vigencia cuando uses la Web y/o seas un Miembro. Podrás cancelar tu
					membresía en cualquier momento, por cualquier motivo, siguiendo las
					instrucciones en las páginas de Renuncia en Configuración de la
					Cuenta, o al recibo por Bandsheep de tu notificación de renuncia
					por escrito o email. Bandsheep podrá terminar tu membresía por
					cualquier motivo, la cual será efectiva al enviar la notificación
					al email que facilitaste en tu solicitud de membresía, u otras
					direcciones de email que hayas facilitado más tarde en Bandsheep.
					Si Bandsheep cancela tu membresía en el Servicio porque has violado
					el Acuerdo, no tendrás el derecho de recibir ningún reembolso de
					cualquier cargo por suscripción no usada. Aún cuando la membresía
					haya terminado, este Acuerdo seguirá estando en vigencia. Incluso
					cuando este Acuerdo haya terminado, ciertas provisiones seguirán
					estando en vigor, lo que incluye las secciones 4, 5,8 y 10-15 de
					este Acuerdo.</li></p>
				<p><li><strong><u>Uso No Comercial por los Miembros</u></strong>: El uso
					ilegal y/o no autorizado de la web, incluida la recopilación de
					nombres de usuario y/o email de miembros usando medios electrónicos
					u otros con el propósito de enviar emails no solicitados o enlaces
					con la Web serán investigados, y se tomarán las debidas acciones
					legales, lo que incluye, pero no se limita a leyes civiles,
					criminales y resarcimiento legal.</li></p>
				<p><li><strong><u>Derechos de Propiedad Intelectual del Contenido en
						Bandsheep</u></strong>: Bandsheep posee y mantiene todos los derechos
					de propiedad intelectual de la Web y del Servicio. La Web contiene
					el material, marcas y otra información protegida por el derecho de
					autor de Bandsheep y sus licenciadores. Con excepción de la
					información que sea de dominio público o para la cual se haya
					recibido permiso por escrito, no se podrá copiar, modificar,
					publicar, transmitir, distribuir, reproducir, mostrar o vender
					ninguna de esa información propietaria.</li></p>
				<p><li><strong><u>Contenido publicado en la Web</u></strong>:</li>
				<ol start="1" type="a">
					<li>Entiendes y estás de acuerdo con que Bandsheep revise o borre
						cualquier contenido, mensajes, mensajes enviados con el Messenger
						de Bandsheep, fotos o perfiles (contenido general) que, a juicio
						de Bandsheep, violen este Acuerdo o que sean ofensivos, ilegales o
						que puedan violar los derechos, dañar o amenazar la seguridad de
						los Miembros.</li>
					<li>Eres el único responsable por el Contenido que publiques o
						muestres (de ahora en adelante) en el Servicio o que transmitas a
						otros Miembros.</li>
					<li>Al publicar Contenido en cualquier área pública de Bandsheep,
						automáticamente representas que garantizas y tienes el derecho de
						autorizar a Bandsheep con una licencia de uso irrevocable,
						perpetua, sin exclusiones, completamente pagada y a nivel mundial
						para copiar, reproducir, mostrar y distribuir dicha información y
						contenido y de preparar trabajos derivados de ella o incorporar a
						otros trabajos dicha información y contenido, y de permitir y
						autorizar sub licencias de la información mencionada.</li>
					<li>La siguiente es una lista parcial del tipo de Contenido que es
						ilegal o está prohibido en la Web. Bandsheep se reserva el derecho
						de investigar y tomar la acción legal requerida, según su
						exclusivo criterio, contra cualquiera que viole esta provisión,
						incluida pero no limitada a, eliminar la comunicación ofensiva del
						Servicio y cancelar la membresía de los que la violen. Incluye el
						contenido que:</li>
				
					<ul type="disc">
						<li>Es evidentemente ofensiva para la comunidad online, tal como: el
							contenido racista, intolerante, que cause odio o daño físico de
							cualquier tipo hacia cualquier grupo o individuo;</li>
						<li>Acosa o promueve el acoso a otra persona;</li>
						<li>Envuelva la transmisión de cartas o el envío de emails masivos
							no solicitados;</li>
						<li>Promueva información que sabes que es falsa, engañosa o que
							promueva actividades ilegales, conducta abusiva, amenazadora,
							obscena, difamatoria o injuriosa;</li>
						<li>Promueva la copia ilegal o no autorizada del trabajo de otra
							persona, tal como proporcionar programas de informática pirateados
							o enlaces a ellos, facilitar información que evada los dispositivos
							creados para proteger los derechos de autores o que proporcione
							música pirateada o enlaces a archivos de música pirateada.;</li>
						<li>Contenga páginas restringidas o de acceso con contraseña, o
							páginas o imágenes ocultas (aquellas que no tengan un enlace o que
							procedan de una página accesible).;</li>
						<li>Proporcione material que explota sexualmente o de forma violenta
							a menores de 18 años, o que solicite información personal a
							cualquier menor de 18 años. ;</li>
						<li>Facilite información instructiva acerca de actividades ilegales,
							tales como la creación o compra de armas, que violen la privacidad
							de alguien, o que transmita o cree virus informáticos.;</li>
						<li>Solicite contraseñas o información personal de otros usuarios
							con propósitos comerciales o ilegales; y</li>
						<li>Participe en actividades comerciales y/o venda sin previo
							consentimiento escrito, concursos, sorteos, trueques, anuncios y
							ventas piramidales.</li>
						</ul>
				
				<li>Debes usar el Servicio de una manera consistente con todas las
					leyes y regulaciones aplicables.</li>
				<li>No podrá participar en anunciar o solicitar a otros Miembros que
					compren o vendan cualquier producto o servicio mediante el Servicio.
					No podrás transmitir cartas en cadena o correo basura a otros
					Miembros. Aunque Bandsheep no puede controlar la conducta de sus
					Miembros fuera de la Web, también es una violación de las normas el
					uso de cualquier información obtenida en el Servicio para acosar,
					abusar o dañar a otra persona, o para contactar, anunciar, solicitar
					o vender cosas a cualquier Miembro sin su previo y explicito
					consentimiento. Con el propósito de proteger a nuestros Miembros de
					tales anuncios o propagandas, Bandsheep se reserva el derecho de
					restringir la cantidad de emails que un Miembro podrá enviar a otro
					Miembro dentro de un período de 24 horas a una cantidad que
					Bandsheep considere adecuada, según su propio criterio.</li>
					</ol> </p>
	
			<p><li><strong><u>Política de Derechos de Propiedad Intelectual</u></strong>:
				No podrás publicar, distribuir o reproducir de ningún modo cualquier
				material protegido por los derechos de propiedad intelectual, marcas
				u otra información propietaria sin obtener de antemano el
				consentimiento por escrito del propietario de dichos derechos. Sin
				limitar lo anterior, si piensas que tu obra ha sido copiada y
				publicada en el Servicio de cualquier modo que constituya una
				infracción de los derechos de autores, por favor, proporciona a
				nuestro Agente de Copyright la siguiente información: una firma
				electrónica o física de la persona autorizada para actuar en favor
				del propietario de los derechos de autores, una descripción del
				trabajo bajo protección intelectual que afirmas que ha sido
				infringido, una descripción de dónde está situado el material que
				afirmas ha sido infringido en la Web, tu dirección, número de
				teléfono, email, una declaración realizada por ti mismo en la que
				expresas que tienes buena fe y crees que el uso objeto de
				controversia no está autorizado por el propietario de los derechos
				intelectuales, su agente o la ley, una declaración hecha por ti
				mismo, hecha bajo pena de perjuicio, de que la información
				mencionada es exacta y de que eres el propietario de los derechos
				intelectuales o estas autorizado para actuar a favor del
				propietario. El Agente de Copyright de Bandsheep puede ser
				contactado, para notificaciones o reclamos de infracciones de
				propiedad intelectual, en:
				_______________________________________________________________</li></p>
			<p><li><strong><u>Geolocalización</u></strong>: Al utilizar nuestro IPA
				(Interfaz de Programación de Aplicaciones) de georeferenciación de
				usuarios te comprometes a aceptar los términos de uso de Google
				Maps.</li></p>
			<p><li><strong><u>Suscripciones</u></strong>: Las suscripciones mensuales o
				trimestrales serán automáticamente renovadas a menos que hayan sido
				canceladas por el miembro dentro de 1 día antes de la próxima fecha
				de factura. Cualquier código de cupón que se haya aplicado en el
				tiempo de la transacción inicial no aplicará a cualquiera de los
				siguientes cargos para cualquier cuenta.</li></p>
			<p><li><strong><u>Disputas de miembros</u></strong>: Eres el único responsable
				de tus interacciones con otros Miembros de Bandsheep. Bandsheep se
				reserva el derecho, pero no tiene la obligación de, monitorizar las
				disputas entre tú y otros Miembros.</li></p>
			<p><li><strong><u>Opción de Exclusión de Email</u></strong>: Al unirte a
				Bandsheep aceptas recibir los emails periódicos diseñados para
				mejorar tu experiencia en Bandsheep. Estos incluyen mensajes con
				información de combinaciones de músicos potenciales, mensajes con
				notificaciones y notificaciones del sistema. Puedes elegir la
				exclusión de cualquiera de estos mensajes con alguno de los
				siguientes métodos: Iniciar con tu cuenta en
				http://www.Bandsheep/sign-in Aquí, haciendo clic sobre “Opciones de
				Email” y desactivando cualquier correo directo que no desees
				recibir.</li></p>
			<p><li><strong><u>Privacidad</u></strong>: El uso de nuestra Web y/o Servicio
				también está regulado por nuestra <a
				href="http://www.bandsheep.com"><u>Política de
					Privacidad de Bandsheep</u></a>.</li></p>
			<p><li><strong><u>Disclaimers</u></strong>: Bandsheep no es responsable de
				cualquier contenido incorrecto o inexacto publicado en la Web o
				relacionado con el Servicio, ya sea creado por los usuarios de la
				Web, Miembros o por cualquier equipo o programación asociada con o
				utilizada en el Servicio. Bandsheep no es responsable de la
				conducta, ya sea online o fuera de la red, de cualquiera de los
				usuarios de la Web o Miembros del Servicio. Bandsheep no asume
				ninguna responsabilidad por cualquier error, omisión, interrupción,
				eliminación, defecto, demora en operaciones o transmisiones, fallos
				de comunicaciones en la línea, robo o destrucción o acceso no
				autorizado a, o alteración de, comunicaciones de usuarios o
				Miembros. Bandsheep no se responsabiliza por cualquier problema o
				mal funcionamiento técnico de cualquier línea de teléfono, sistemas
				informáticos online, servidores, proveedores, equipo informático,
				software, fallo de email o reproductores relacionados con problemas
				técnicos o congestión de tráfico en la Internet en cualquier Web o
				combinación de ambas, lo que incluye el daño a usuarios y/o Miembros
				o a la computadora de cualquier otra persona relacionado o
				resultante de participar o descargar material relacionado con la Web
				y/o con el Servicio. Bajo ningunas circunstancias será Bandsheep
				responsable por la pérdida o daño, incluido el daño personal o
				muerte como resultado del uso personal de la Web o el Servicio,
				cualquier contenido publicado en la Web o transmitido a los
				Miembros, o cualquier interacción entre los usuarios de la Web, ya
				sea online o fuera de la red. La Web y el Servicio están disponibles
				y Bandsheep expresamente se descarga de la responsabilidad de
				cualquier garantía o adaptación para un fin en particular o la no
				incumplimiento. Bandsheep.com no puede garantizar y no promete unos
				resultados específicos del uso de la Web y/o del Servicio.</li></p>
			<p><li><strong><u>Limitación de responsabilidades</u></strong>: Exceptuando
				las jurisdicciones donde tales provisiones estén restringidas, en
				ningún caso será Bandsheep responsable de ti o cualquier otra
				tercera persona por cualquier daño indirecto, consecuente, ejemplar,
				incidental, especial o punitivos, incluidas también las pérdidas
				debidas a tu uso de la Web o el Servicio, aun cuando Bandsheep haya
				avisado de la posibilidad de tales daños. Sin perjuicio de todo lo
				anterior, la responsabilidad de Bandsheep hacia ti por cualquier
				causa estará limitada a una cantidad pagada, si alguna, por ti a
				Bandsheep por el Servicio durante tu membresía.</li></p>
			<p><li><strong><u>Controles de Exportación de Estados Unidos</u></strong>: El
				software de esta Web está sujeto al control de exportación de los
				Estados Unidos. No se podrá descargar de la Web o ser exportado o
				re-exportado (i) a (o a un nacional o residente de) Cuba, Iraq,
				Libia, Corea del Norte, Irán, Siria o cualquier otro país al que los
				Estados Unidos haya embargado bienes; o (ii) a cualquier persona en
				la Lista de Nacionales Especialmente Designados del Departamento de
				Tesorería o en la Tabla de Ordenes Denegadas del Departamento de
				Comercio de Estados Unidos. Al descargar o usar el software,
				representas y garantizas que no estas localizado o bajo control de
				un nacional o residente de cualquiera de esos países o cualquiera de
				los que se hayan en dicha lista.</li></p>
			<p><li><strong><u>Disputas</u></strong>: Si hubiese alguna disputa respecto o
				relacionada con la Web y/o el Servicio, al usar la Web, aceptas que
				las disputas estarán reguladas por las leyes del Estado de Massachusetts
				independientemente de cualquier conflicto con los principios
				legales. Aceptas tu jurisdicción personal al estado y las cortes
				federales del Estado de Massachusetts.</li></p>
			<p><li><strong><u>Indemnización</u></strong>: Aceptas indemnizar y eximir a
				Bandsheep, sus subsidiarios, afiliados, oficiales, agentes, y otros
				socios y empleados por cualquier pérdida, responsabilidad, reclamo,
				o demanda, incluyendo los cargos razonables de un abogado, hecha por
				terceros debido a, o por consecuencia de tu uso del Servicio en
				violación a este Acuerdo y/o debido a quebrantar este Acuerdo y/o de
				cualquier representación y garantías mencionadas anteriormente.</li></p>
			<p><li><strong><u>Otro</u></strong>: Este Acuerdo, aceptado al hacer uso de la
				Web y confirmado al hacerse Miembro del Servicio , contiene el
				acuerdo completo entre ti y Bandsheep referente al uso de la Web y/o
				el Servicio. Si cualquiera de las provisiones en este Acuerdo se
				resultaran inválidas, el recordatorio de este Acuerdo continuara en
				plena vigencia y efecto. Por favor, contacta con nosotros para consultar
				cualquier duda que tengas con
				relación a este acuerdo.</li></p>

				</ol>',
					'en'=> "<h2 align='center'>
				<strong>BandSheep Terms & Conditions</strong>
			</h2>
			<p> BandSheep is a public social platform that provides a 
				personal space through which you can share and exchange
				information, and communicate with other musicians and/or 
				bands.The public social network BandSheep is operated 
			    by BandSheep LLC.</p>
			<p>
				These Terms of Use apply to the access and use of the Service
				both through the website provided under the domain name
			   <a href='http://www.bandsheep.com/'>www.bandsheep.com</a> and
				through applications that BandSheep may make available to 
				users for mobile devices through 'Marketplaces' and/or 'App Stores' 
				of mobile operators, along with all contents that are displayed
				or made available to users within the Service. 
			</p>
			<p> By using the BandSheep.com Website (the 'Website') you agree to be
				bound by these Terms of Use (this 'Agreement'), whether or not you
				register as a member ('Member') or create a profile ('Profile'). 
			    If you wish to become a Member and communicate with other Members
				and make use of the BandSheep.com service (the 'Service'), read these
				Terms of Use and indicate your acceptance of them by following the
				instructions in the registration process.</p>
			
			<p> Bandsheep reserves the right to modify these Terms of Use at any time for
				legal or technical reasons, due to changes in the provision of the Service
				or applicable laws, for reasons deriving from self-regulation and codes
				of conduct, or based on corporate strategy decisions. Users will be
				notified of changes to these Terms of Use through publication of the
				Terms on the website and/or announcements posted on users’ profiles. If
				– after the publication of changes to these Terms of Use – you continue using
				the Service, it will be understood that you have read and accepted said changes.
				If you decide that you are unwilling or unable to comply with any changes made
				to these Terms of Use, you can terminate your use of the Service by following
				the provided procedures for closing your Profile.</p>
			
			<p>This Agreement sets out the legally binding terms of your use of the
			   Website and your membership in the Service and may be modified by BandSheep.com
			   from time to time, such modifications to be effective upon posting by BandSheep.com
			   on the Website. This Agreement includes BandSheep.com's Acceptable Use Policy for
			   Content Posted on the Website, BandSheep.com's Privacy Policy, and any notices regarding
			   the Website. You may also receive a copy of this Agreement by e-mailing us at: 
			   support@bandsheep.com, Subject: Terms of Use Agreement. </p>
			
			<ol start='1' type='1'>
				<p><li><strong><u>Eligibility</u></strong>: You must be eighteen or over
						or represented by someone eighteen or over to register as a member 
						of BandSheep.com or use the Website. Membership in the Service is
						void where prohibited. By using the Website, you represent and warrant
						that you have the right, authority, and capacity to enter into this
						Agreement and to abide by all of the terms and conditions of this Agreement. </li></p>
				<p><li><strong><u>Term</u></strong>: This Agreement will remain in full force and effect
						while you use the Website and/or are a Member. You may terminate your membership
						at any time, for any reason by following the instructions on the Resign pages in
						Account Settings, or upon receipt by BandSheep.com of your written or e-mail notice
						of termination. BandSheep.com may terminate your membership for any reason,
					 	effective upon sending notice to you at the e-mail address you provide in your
					 	application for membership, or such other e-mail address as you may later provide
						to BandSheep.com. If BandSheep.com terminates your membership in the Service because
						you have breached the Agreement, you will not be entitled to any refund of unused
						subscription fees. Even after membership is terminated, this Agreement will remain
					 	in effect. Even after this Agreement is terminated, certain provisions will remain in
					 	effect, including sections 4, 5,8 and 10-15 of this Agreement. </li></p>
				<p><li><strong><u>Non Commercial Use by Members</u></strong>: 
						Illegal and/or unauthorized uses of the Website, including collecting usernames
						and/or e-mail addresses of members by electronic or other means for the purpose
					 	of sending unsolicited e-mail and unauthorized framing of or linking to the
						Website will be investigated, and appropriate legal action will be taken,
						including without limitation, civil, criminal, and injunctive redress.</li></p>
				<p><li><strong><u>Proprietary Rights in Content on Bandsheep</u></strong>: 
						BandSheep.com owns and retains all proprietary rights in the Website and the Service.
					 	The Website contains the copyrighted material, trademarks, and other proprietary information
						of BandSheep.com, and its licensors. Except for that information which is in the public domain
						or for which you have been given written permission, you may not copy, modify, publish, transmit,
						distribute, perform, display, or sell any such proprietary information. </li></p>
				<p><li><strong><u>Content Posted on the Site</u></strong>:</li>
				<ol start='1' type='a'>
					<li>You understand and agree that BandSheep.com may review and delete any content,
					 	messages, BandSheep.com Messenger messages, photos or profiles (collectively, 'Content')
					 	that in the sole judgment of BandSheep.com violate this Agreement or which might be offensive,
					 	illegal, or that might violate the rights, harm, or threaten the safety of Members. </li>
					<li>You are solely responsible for the Content that you publish or display
						(hereinafter, 'post') on the Service, or transmit to other Members. .</li>
					<li>By posting Content to any public area of BandSheep.com, you automatically grant,
						and you represent and warrant that you have the right to grant, to BandSheep.com an
						irrevocable, perpetual, non-exclusive, fully paid, worldwide license to use, copy,
					 	perform, display, and distribute such information and content and to prepare
					 	derivative works of, or incorporate into other works, such information and content,
					 	and to grant and authorize sublicenses of the foregoing. </li>
					<li>The following is a partial list of the kind of Content that is illegal
					 	or prohibited on the Website. BandSheep.com reserves the right to investigate
						and take appropriate legal action in its sole discretion against anyone who
						violates this provision, including without limitation, removing the offending
					 	communication from the Service and terminating the membership of such violators.
					 	It includes Content that: </li>
				
					<ul type='disc'>
						<li>Is patently offensive to the online community, such as Content that
					 		promotes racism, bigotry, hatred or physical harm of any kind against any
					 		group or individual;</li>
						<li>Harasses or advocates harassment of another person;</li>
						<li>Involves the transmission of 'junk mail', 'chain letters,' 
							or unsolicited mass mailing or 'spamming';</li>
						<li>Promotes information that you know is false, misleading or promotes
							illegal activities or conduct that is abusive, threatening, obscene,
							defamatory or libelous; </li>
						<li>Promotes an illegal or unauthorized copy of another person's copyrighted 
							work, such as providing pirated computer programs or links to them,
							providing information to circumvent manufacture-installed copy-protect
							devices, or providing pirated music or links to pirated music files; </li>
						<li>Contains restricted or password only access pages, or hidden pages or images
							(those not linked to or from another accessible page);</li>
						<li>Provides material that exploits people under the age of 18 in a sexual
							or violent manner, or solicits personal information from anyone under 18;</li>
						<li>Provides instructional information about illegal activities such as
							making or buying illegal weapons, violating someone's privacy, or providing
					 		or creating computer viruses; </li>
						<li>Solicits passwords or personal identifying information for commercial
							or unlawful purposes from other users; and</li>
						<li>Engages in commercial activities and/or sales without our prior
							written consent such as contests, sweepstakes, barter, advertising,
					        and pyramid schemes.</li>
						</ul>
				
				<li>You must use the Service in a manner consistent with any and all applicable
					laws and regulations. </li>
				<li>You may not engage in advertising to, or solicitation of, other Members to
					buy or sell any products or services through the Service. You may not transmit
					any chain letters or junk e-mail to other Members. Although BandSheep.com cannot
					monitor the conduct of its Members off the Website, it is also a violation of
					these rules to use any information obtained from the Service in order to harass,
					abuse, or harm another person, or in order to contact, advertise to, solicit,
					or sell to any Member without their prior explicit consent. In order to protect
					our Members from such advertising or solicitation, BandSheep.com reserves the right
					to restrict the number of e-mails which a Member may send to other Members in any
					24-hour period to a number which BandSheep.com deems appropriate in its sole 
					discretion.</li>
					</ol> </p>
	
			<p><li><strong><u>Copyright Policy</u></strong>:
					You may not post, distribute, or reproduce in any way any copyrighted
					material, trademarks, or other proprietary information without obtaining
					the prior written consent of the owner of such proprietary rights. Without
					limiting the foregoing, if you believe that your work has been copied and
					posted on the Service in a way that constitutes copyright infringement,
					please provide our Copyright Agent with the following information: an
					electronic or physical signature of the person authorized to act on behalf
					of the owner of the copyright interest; a description of the copyrighted work
					that you claim has been infringed; a description of where the material that
					you claim is infringing is located on the Website; your address, telephone number,
					and e-mail address; a written statement by you that you have a good faith belief
					that the disputed use is not authorized by the copyright owner, its agent, or 
					the law; a statement by you, made under penalty of perjury, that the above
					information in your notice is accurate and that you are the copyright owner
					or authorized to act on the copyright owner's behalf. BandSheep.com's Copyright
					Agent for notice of claims of copyright infringement can be reached as follows:
					_______________________________________________________________</li></p>
			<p><li><strong><u>Geolocation</u></strong>: 
					When using our georeferencing API (Application Programming Interface) 
					you agree to accept Google Map's Terms of Use.</li></p>
			<p><li><strong><u>Subscription</u></strong>: Subscriptions on monthly
					and quarterly billings will be automatically renewed unless
					cancelled by the member within 1 day of the next billing date.
					Any coupon code applied at the time of the initial transaction
					will not be applied to any following renewal charges for any 
					account. </li></p>
			<p><li><strong><u>Member Disputes</u></strong>: 
					You are solely responsible for your interactions with other BandSheep.com Members.
					BandSheep.com, LLC. reserves the right, but has no obligation, to monitor disputes
					between you and other Members. </li></p>
			<p><li><strong><u>E-mail Opt-Out</u></strong>: 
					When joining BandSheep.com, you agree to receive periodic e-mails designed to
					improve your experience on BandSheep. These e-mails include messages
					with information on potential musician matches, message notifications,
					and system notifications. You can opt-out of any or all of these messages
					by logging into your account, clicking E-mail Options, and disabling any 
					mailers you do not wish to receive</li></p>
			<p><li><strong><u>Privacy</u></strong>: 
					Use of the Website and/or the Service is also governed by our <a
					href='http://www.bandsheep.com'><u>Privacy Policy</u></a>.</li></p>
			<p><li><strong><u>Disclaimers</u></strong>: 
					BandSheep.com is not responsible for any incorrect or inaccurate
				    Content posted on the Website or in connection with the Service, 
					whether caused by users of the Website, Members or by any of the
					equipment or programming associated with or utilized in the Service.
					BandSheep.com is not responsible for the conduct, whether online or
					offline, of any user of the Website or Member of the Service. BandSheep.com
					assumes no responsibility for any error, omission, interruption, deletion,
					defect, delay in operation or transmission, communications line failure,
					theft or destruction or unauthorized access to, or alteration of, user or Member
					communications. BandSheep.com is not responsible for any problems or technical
					malfunction of any telephone network or lines, computer online systems, servers
					or providers, computer equipment, software, failure of e-mail or players on
					account of technical problems or traffic congestion on the Internet or at any
					Website or combination thereof, including injury or damage to users and/or Members
					or to any other person's computer related to or resulting from participating or
					downloading materials in connection with the Web and/or in connection with the
					Service. Under no circumstances will BandSheep.com be responsible for any loss or
					damage, including personal injury or death, resulting from anyone's use of the
					Website or the Service, any Content posted on the Website or transmitted to Members,
					or any interactions between users of the Website, whether online or offline. The
					Website and the Service are provided 'AS-IS' and BandSheep.com expressly disclaims
					any warranty of fitness for a particular purpose or non-infringement. BandSheep.com
					cannot guarantee and does not promise any specific results from use of the Website
					and/or the Service. </li></p>
			<p><li><strong><u>Limitation on Liability</u></strong>: 
					Except in jurisdictions where such provisions are restricted, in
					no event will BandSheep.com be liable to you or any third person for
					any indirect, consequential, exemplary, incidental, special or
					punitive damages, including also lost profits arising from your use
					of the Web site or the Service, even if BandSheep.com has been advised
					of the possibility of such damages. Notwithstanding anything to the
					contrary contained herein, BandSheep.com's liability to you for any 
					cause whatsoever, and regardless of the form of the action, will at
					all times be limited to the amount paid, if any, by you to BandSheep.com
					for the Service during the term of membership. </li></p>
			<p><li><strong><u>U.S. Export Controls</u></strong>: 
					Software from this Website (the 'Software') is further subject
					to United States export controls. No Software may be downloaded
					from the Website or otherwise exported or re-exported (i) into
					(or to a national or resident of) Cuba, Iraq, Libya, North Korea,
					Iran, Syria, or any other Country to which the U.S. has embargoed
					goods; or (ii) to anyone on the U.S. Treasury Department's list of
					Specially Designated Nationals or the U.S. Commerce Department's
					Table of Deny Orders. By downloading or using the Software, you
					represent and warrant that you are not located in, under the control
					of, or a national or resident of any such country or on any such list.</li></p>
			<p><li><strong><u>Disputes</u></strong>: 
					If there is any dispute about or involving the Website and/or 
					the Service, by using the Website, you agree that the dispute
					will be governed by the laws of the State of Massachusetts without
					regard to its conflict of law provisions. You agree to personal
					jurisdiction by and venue in the state and federal courts of
					the State of Massachusetts. </li></p>
			<p><li><strong><u>Indemnity</u></strong>: 
					You agree to indemnify and hold BandSheep.com, its subsidiaries,
				    affiliates, officers, agents, and other partners and employees,
					harmless from any loss, liability, claim, or demand, including
					reasonable attorney's fees, made by any third party due to or 
					arising out of your use of the Service in violation of this 
					Agreement and/or arising from a breach of this Agreement and/or
				    any breach of your representations and warranties set forth above. </li></p>
			<p><li><strong><u>Other</u></strong>: 
					This Agreement, accepted upon use of the Website and further 
					affirmed by becoming a Member of the Service, contains the 
					entire agreement between you and BandSheep.com regarding the use
					of the Website and/or the Service. If any provision of this
					Agreement is held invalid, the remainder of this Agreement shall 
					continue in full force and effect. </li></p>",
					), 
			
			'new-message'=> array(
					'es'=>'Mensaje nuevo',
					'en'=>'New Message',
					),
			
			'characters-remaining'=> array(
					'es'=>'Caracteres restantes:',
					'en'=>'Characters remaining:',
					),
			
			'name-lastname'=> array(
					'es'=> 'Nombre y Apellidos',
					'en'=> 'First and Last Name',
					),
			
			'invitation-sent'=> array(
					'es'=> 'Tu invitación se ha enviado correctamente.',
					'en'=> 'Your invitation has been sent successfully.',
					
					),
			
			'send-message'=> array(
					'es'=>'Tu mensaje se ha enviado a ',
					'en'=>'Your message was successfully sent to ',
							
					),
			
			'send-message-succesfully'=> array(
					'es'=>'correctamente.',
					'en'=>'.',
					
					),
					
			'send-message-yourself'=> array(
					'es'=>'No puedes mandarte un mensaje a ti mismo.',
					'en'=>'You cannot send a message to yourself.',
					
					),
					
			'send-message-error'=> array(
					'es'=>'Ha habido un error al enviar el mensaje.',
					'en'=>'An error occurred while sending the message.',
					
					),
			
			'location-updated'=> array(
					'es'=>'Se ha actualizado tu posicion correctamente.',
					'en'=>'Your location was succesfully updated.',
					
					),
			'location-error'=> array(
					'es'=>'Ha habido un error.',
					'en'=>'An error occurred.',
					
					),
			'location-not-available'=> array(
					'es'=>'Esa zona no está disponible, por favor selecciona otra.',
					'en'=>'That location is not available, please select a different one',
					
					),
			
			'new-band-name'=> array(
					'es'=>'Nombre de la banda',
					'en'=>'Name of the band',
					
					),
			
			'register-name'=> array(
					'es'=>'Nombre:',
					'en'=>'Name:',
					
					),
			
			'register-password'=> array(
					'es'=>'Contraseña:',
					'en'=>'Password:',
					
					),
			
			'register-password-repeat'=> array(
					'es'=>'Repite la contraseña:',
					'en'=>'Confirm password:',
						
					),
			
			'register-dateofbirth'=> array(
					'es'=>'Fecha de Nacimiento:',
					'en'=>'Date of Birth:',
					
					),
			
			'submit-video/sound/post/feedback'=> array(
					'es'=>'Enviar',
					'en'=>'Submit',
					
					),
			
			'title-video/sound/post'=> array(
					'es'=>'Título',
					'en'=>'Title',
					
					),
			
			'register-error/emailused' => array(
					'es'=>'Ese email ya ha sido utilizado, por favor haz login con tu cuenta.',
					'en'=>'This email has already been used, please log into your account.',
					
					),
			
			'register-error/emailnotvalid'=> array(
					'es'=>'El email introducido no es válido.',
					'en'=>'This email is not valid.',
					
					),
			
			'register-error/database'=> array(
					'es'=>'Error con la base de datos, inténtalo más tarde.',
					'en'=>'There was an error in the database, please try again later.',
					
					),
			
			'register-error/unexpected'=> array(
					'es'=>'Error inesperado, intentalo mas tarde.',
					'en'=>'Unexpected error, please try again later.',
					
					),
			
			'register-error/password'=> array(
					'es'=>'Las contraseñas no coinciden.',
					'en'=>'The passwords do not match.',
						
			),
			
			'band-invitation'=> array(
					'es'=>'Quieres formar parte de nuestra banda?',
					'en'=>'Would you like to be part of our band?',
					
					),
			
			
			'band-accept'=> array(
					'es'=>'Aceptar la Invitación',
					'en'=>'Accept invitation',
					
					),
			
			'send-activation-subject'=> array(
					'es'=>'Activa tu cuenta en Bandsheep',
					'en'=>'BandSheep account confirmation',
					
					),
			
			'send-activation-body1'=> array(
					'es'=>"Hola,\n\nTienes que activar tu cuenta en BandSheep para poder logearte. \n\n Haz click en el siguiente link o copia y pega en tu navegador \n\n",
					'en'=>"Hello,\n\nYou must confirm your BandSheep account in order to log in. \n\n Click on the following link or copy and paste it to your browser \n\n",
					
					),
			
			'send-activation-body2'=> array(
					'es'=>'Gracias!',
					'en'=>'Thank you!',
					
					),
			
			'image-upload'=> array(
					'es'=>'Sube la imagen',
					'en'=>'Image upload',
					
					),
					
			'newsound-error'=> array(
					'es'=>'Ha habido un error al añadir el nuevo sonido.',
					'en'=>'An error occurred while adding a new sound.',
				
					),
			
			'newsound-nonvalidurl'=> array(
					'es'=>'El URL introducido no es válido.',
					'en'=>'The URL you entered is not valid.',
					
					),
					
			'newvideo-nonvalid'=> array(
					'es'=>'El vídeo no es válido.',
					'en'=>'The video is not valid.',
					
					),
			
			'invalid-captcha'=> array(
				'es'=>'El código de verificación introducido es incorrecto.',
				'en'=>'The verification code entered is invalid.',
					
					),
			
			'forgot-email-subject'=> array(
				'es'=> "Email de reseteo de contraseña de BandSheep",
				'en'=>"	Reset your password - BandSheep",
					
					),
			
			
			'forgot-email-body'=> array(
				'es'=>"Hola,\n\n Hemos recibido un pedido de reseteo de contraseña. \n\n Haz click en el siguiente link o copia y pega en tu navegador \n\n",
				'en'=>"Hi,\n\n We have received your request to reset your password. \n\n Click on the following link or copy and paste it into your web browser's search bar \n\n",
			),
			
			'register-error/passwords'=> array(
				'es'=>"Las contraseñas no coinciden",
				'en'=>"Passwords dont match.",
			),
			'is-available'=> array(
				'es'=>"Esta buscando una banda",
				'en'=>"Is looking for a band",
			),
			'is-not-available'=> array(
				'es'=>"No esta buscando ninguna banda",
				'en'=>"Is not looking for a band",
			),
			'are-you-looking-for-a-band'=> array(
				'es'=>"¿Estás buscando una banda?",
				'en'=>"Are you looking for a band?",
			),
			'yes'=> array(
				'es'=>"Sí",
				'en'=>"Yes",
			),
			'no'=> array(
				'es'=>"No",
				'en'=>"No",
			),
			
			'profile-switch-expl'=> array(
					'es'=>"¿Estás buscando una banda?",
					'en'=>"Are you looking for a band?",
			),
			
			'send-message-profile'=> array(
					'es'=>"Enviar mensaje",
					'en'=>"Send message",
			),
	);
	
	//
	
	private $lang=0;
	private $langs;
	
	
	/**
	 * bsLanguage
	 * Should be one per session.
	 * 
	 * @param string $lang Should be a language code of 2 chars (Optional).
	 */
	public function __construct( $lang=null ){
		if($lang != null && strlen($lang) == 2)
			$this->langs[] = $lang;
		
		// es-es,en;q=0.8,es;q=0.5,en-us;q=0.3
		if($_SERVER['HTTP_ACCEPT_LANGUAGE']){
			$header = ','.$_SERVER['HTTP_ACCEPT_LANGUAGE'];
			while( $header = strstr($header, ',') ){
				if(!in_array(substr($header,1,2),$this->langs))
					$this->langs[] = substr($header,1,2);
				$header = substr($header,1);
			}
		}
		$this->langs[] = DEFAULT_SITE_LANGUAGE;
	}

	public function getLine( $code ){
		if (array_key_exists($this->getLanguage(), bsLanguage::$lines[ $code ]))
			return bsLanguage::$lines[ $code ][ $this->getLanguage() ];

		if($this->getLang() >= count($this->getLangs())){
			$this->setLang(0);
			return null;
		}
		
		$this->setLang( $this->getLang()+1 );
		return $this->getLine( $code );
	}
	
	public function getLanguage(){
		return $this->langs[$this->lang];
	}
	
	public function getLang(){
		return $this->lang;
	}
	
	public function getLangs(){
		return $this->langs;
	}
	
	public function setLang($lang){
		$this->lang = $lang;
	}

}

?>

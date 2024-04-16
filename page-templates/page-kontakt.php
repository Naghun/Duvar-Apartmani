<?php

/**
 * Template Name: Kontakt Page Template
 * /css/custom-css/contact.css
 * Template for displaying contact page.
 *
 * @package Understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?> m-auto">


		<div class="row contact-start">
			<div class="col-12 p-0 m-0">
				<img src="<?php echo get_theme_file_uri('/src/images/blagaj-kontakt.jpg'); ?>" alt="Naslovna slika" class="col-12 p-0 m-0">
			</div>
		</div><!-- .row -->

		<!-- .row -->
		<div class="row">
			<div class="col-12 contact-header d-flex flex-column justify-content-center align-items-center">
				<h2 class="col-9 text-center">Ako imate pitanja u vezi svog smještaja u blagaju budite slobodni da nas kontaktirate</h2>
			</div>
			<div class="col-12 contact-body d-flex justify-content-center align-items-center">
				<div class="col-6 contact-form-container d-flex justify-content-center align-items-center" id="contact-body">
					<form action="" class="contact-form col-12 p-5" id="contact-form">
						<input type="text" placeholder="Ime" class="form-input-simple" id="contact-name">
						<input type="text" placeholder="Prezime" class="form-input-simple" id="contact-surname">
						<input type="number" placeholder="Broj Telefona" class="form-input-simple" id="contact-phone">
						<input type="email" placeholder="Email" class="form-input-simple" id="contact-email">
						<input type="textarea" placeholder="Poruka" class="form-input-not" id="contact-message">
						<input type="hidden" name="action" value="contact_form_action" id="action-contact">
                		<?php wp_nonce_field( 'contact_form_nonce', 'contact_form_nonce', true, true); ?>
						<input type="submit" value="Pošalji" class="btn btn-dark form-submit-button col-6" id="contact-submit">
					</form>
				</div>
				<div class="col-6 d-none justify-content-center align-items-center message-info" id="message-info">
					<h1 class="col-12 text-center message" id="message"></h1>
				</div>
				<div class="col line-break"></div>
				<div class="col-6 contact-icons d-flex justify-content-center align-items-center">
						<i class="fas fa-phone telephone"></i>
						<i class="fab fa-viber viber"></i>
						<i class="fab fa-facebook-messenger signal"></i>
						<i class="fab fa-whatsapp whatsapp"></i>
				</div>
			</div>
		</div> <!-- .row -->

		<!-- .row -->
		<div class="row row-text">
			<p class="col-12 py-3 mx-0 contact-text">
				Turisti, ljubitelji adrenalina mogu uz pratnju profesionalnih vodiča ući u pećinu izvora Bune, 
				a zatim ploviti kanjonima uz živopisnu rijeku kroz sami grad Blagaj i dalje nizvodno. 
				To je uz ostalo jedna od ovdašnjih atraktivnih turističkih ponuda. 
				Voda Bune je izuzetno hladna svega 8 C, a zbog svoje čistoće predstavlja stanište endemske vrste potočne pastrmke, 
				ova ukusna riba može se degustirati u brojnim ugostiteljskim objektima odmah uz obalu ove rijeke. 
				Blagaj ima dugogodišnju tradiciju uzgoja vrsta riba potočne i mekousne pastrmke, one se uzgajaju u pitkim vodama rijeke Bune, 
				koja obiluje prirodnom hranom račićima tako da je meso ovih riba veoma ukusno i kvalitetno. 
				Što više potvrđeno je da Blagajska pastrmka iz uzgajališta ima potpuno isti ukus kao i divlja koja se uhvati u rijeci. 
				Riba se priprema na prirodan način na gradelama, na žaru sa prorodnim uljima i začinima. 
				Međutim ono što blagajskim pastrmkama daje poseban i ne ponovljiv ukus koji se pravi sa ovog područja, 
				koji se koriste za pripremu ribe i što je mala kulinarska tajna ovdašnjih restorana. 
				Degustirati pastrmku u ovom ambijentu uz svježinu mirisa čiste vode, predstavlja nezaboravan doživljaj. 
				Riblji restorani uz samu rijeku Bunu su duge tradicije oko 50 g. 
				Na rijeci Buni u Blagaju bile su brojne mlinice u kojima se na tradicionalan način mljela pšenica, kukuruz i ostale žitarice. 
				Snaga vode rijeke Bune također se koristila za pokretanje velikih vodeničkih kola za navodnjavanje mrežom kanala plodnih oranica. 
				Rijeka Buna nakon svega 9 km kroz stjenoviti plodni okoliš završava kao lijeva pritoka rijeke Neretve tvoreći živopisne bunske kanale.
				Na tom putu u svoje okrilje prima rijeku Bunicu koja također ima veliki impresivni izvor, a nakon samo 6 km završava svoj životni put. 
				Rijeka Bunica za razliku od Bune ugodna je za kupanje i tvrdi se da ima ljekovita svojstva. 
				To potvrđuje susjedno brdo Gubavica svojevremeno nazvana po gubavcima koji su spas tražili u rijeci Bunici.
			</p>
		</div>
		<!-- .row -->
		<div class="row footer-img-container">
			<div class="col-12 m-0 p-0">
				<img src="<?php echo get_theme_file_uri('/src/images/blagaj-kontakt-2.jpg'); ?>" alt="Kontakt slika" class="col-12 p-0 m-0">
			</div>
		</div><!-- .row -->

	</div><!-- .container(-fluid) -->
</div><!-- #wrapper-footer -->

<?php
get_footer();

?>
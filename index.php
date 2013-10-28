<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="pt" xmlns="http://www.w3.org/1999/xhtml" lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Book Info</title>
		
		
		<!-- Add jQuery library -->
		<script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>

		<!-- Add fancyBox main JS and CSS files -->
		<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
		<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
	
		<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
		
		<script type="text/javascript" src="Scripts/script.js"></script>
<<<<<<< HEAD
        <script type="text/javascript" src="Scripts/ajaxgetCat.js"></script>
        <link rel="stylesheet" type="text/css" href="CSS/widget.css" />
				
		<style type="text/css">
			.fancybox-custom .fancybox-skin {
				box-shadow: 0 0 50px #222;
			}

			body {
				max-width: 700px;
				margin: 0 auto;
			}
		</style>
		
=======
                <script type="text/javascript" src="Scripts/ajaxgetCat.js"></script>
                <script type="text/javascript" src="Scripts/ajaxgetLivro.js"></script>
                <script type="text/javascript" src="Scripts/ajaxgetNLivros.js"></script>
                
                <link rel="stylesheet" type="text/css" href="CSS/widget.css" />
>>>>>>> 00b7e47c8793568083620f8ea2c8baecf3fe1dfd
    </head>
    <body onload=init();>
		<div id="top" class="top">
			<div id="tituloWidget" class="tituloWidget">
				<h2 class="titulo"><img class="logotipo" src="img/logo.png" /> Book Info</h2>
			</div>
			
			<div id="methodChosses" class="formChosses">
				<form method="get" action="*">
					<table class="tabelaCategorias">
					<tr>
					<td class="categorias" id="metodoEscolha">Método de Seleção: 
						<select size="1" name="comboSelect" id="comboSelect" onChange=inicializar();>
							<option selected="selected" value="none">------</option>
							<option value="editora">Editora</option>
							<option value="categoria">Categoria</option>
						</select>
					</td>
					</tr>
					</table>					
				</form>
			</div>
			
			<div id="secondMenu" class="secondMenu">
			
			</div>
		</div>
		
		
		
		<div id="middle" class="middle">
			
		</div>
		
		
		
		<div id="bottom" class="bottom">
			<div id="paging" class="paging">
			
			</div>
			
			<div id="help" class="help">
				<a class="fancybox" href="#inline1" title="Informações">
					<img src="img/question.png" width="25" height="25" />&nbsp;&nbsp;&nbsp;
				</a>
			</div>	
				
			<div id="inline1" style="width:400px;display: none;">
				<h3 align="center" style="font-family: Verdana, Geneva, sans-serif; font-size: 20px; color: blue; text-align: center;">Ensaio sobre a Cegueira</h3>
				<table>
					<tr>
						<td>
							<img src="img/capa.jpg" width="200px" height="300px" />
						</td>
						<td>
							<p>
							<p>A cegueira começa num único homem, durante a sua rotina habitual. Quando está sentado no semáforo, este homem tem um ataque de cegueira, e é aí, com as pessoas que correm em seu socorro que uma cadeia sucessiva de cegueira se forma… Uma cegueira, branca, como um mar de leite e jamais conhecida, alastra-se rapidamente em forma de epidemia. O governo decide agir, e as pessoas infectadas são colocadas em uma quarentena com recursos limitados que irá desvendar aos poucos as características primitivas do ser humano.</p>
							<p>A força da epidemia não diminui com as atitudes tomadas pelo governo e depressa o mundo se torna cego, onde apenas uma mulher, misteriosa e secretamente manterá a sua visão, enfrentando todos os horrores que serão causados, presenciando visualmente todos os sentimentos que se desenrolam na obra: poder, obediência, ganância, carinho, desejo, vergonha; dominadores, dominados, subjugadores e subjugados.</p>
							<p>Nesta quarentena esses sentimentos se irão desenvolver sob diversas formas: lutas entre grupos pela pouca comida disponibilizada, compaixão pelos doentes e os mais necessitados, como idosos ou crianças, embaraço por atitudes que antes nunca seriam cometidas, atos de violência e abuso sexual, mortes,…</p>
							<p>Ao conseguir finalmente sair (devido a um fogo posto na camarata de uma grupo dominante, que instalara ainda mais o desespero controlando a comida a troco de todos os bens dos restantes e serviços sexuais) do antigo hospício onde o governo os pusera em quarentena, a mulher que vê depara-se com a ausência de guarda: “a cidade estava toda infectada”; cadáveres, lixo, detritos, todo o tipo de sujidade e imundice se instalara pela cidade. Os cegos passaram a seguir os seus instintos animais, e sobreviviam como nômades, instalando-se em lojas ou casas desconhecidas.</p>
							<p>Saramago mostra, através desta obra intensiva e sofrida, as reacções do ser humano às necessidades, à incapacidade, à impotência, ao desprezo e ao abandono. Leva-nos também a refletir sobre a moral, costumes, ética e preconceito através dos olhos da personagem principal, a mulher do médico, que se depara ao longo da narrativa com situações inadmissíveis; mata para se preservar e aos demais, depara-se com a morte de maneiras bizarras, como cadáveres espalhados pelas ruas e incêndios; após a saída do hospício, ao entrar numa igreja, presencia um cenário em que todos os santos se encontram vendados: “se os céus não vêem, que ninguém veja”…</p>
							<p>A obra acaba quando subitamente, exatamente pela ordem de contágio, o mundo cego dá lugar ao mundo imundo e bárbaro. No entanto, as memórias e rastros não se desvanecem.</p>
						</td>
					</tr>
				</table>
			</div>
				
		</div>
		
			
			
		
    </body>
</html>

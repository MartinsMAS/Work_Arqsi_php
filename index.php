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
        <script type="text/javascript" src="Scripts/ajaxgetCat.js"></script>
        <script type="text/javascript" src="Scripts/ajaxgetLivro.js"></script>
        <script type="text/javascript" src="Scripts/ajaxgetNLivros.js"></script>
        <script type="text/javascript" src="Scripts/ajaxgetNomesEditoras.js"></script>
        <script type="text/javascript" src="Scripts/ajaxgetLivrosPorCategoria.js"></script>
        <script type="text/javascript" src="Scripts/generateRDF.js"></script>
        
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
    </head>
    <body onload=inicializar();>
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
			<table>
			<tr>
			<td>
			<div class="pagingContainer">
			<div id="paging" class="paging">
			
			</div>
			</div>
			</td>
			<td>
			<div id="help" class="help">
				<a class="fancybox" href="#inline1" title="Informações">
					<img src="img/question.png" width="25" height="25"/>&nbsp;&nbsp;&nbsp;
				</a>
			</div>	
			</td>
			</tr>
			</table>
			<div id="inline1" name="inline1" style="width:500px; height:500px; display: none;">
				
			</div>
				
		</div>
        
        <div id="divRDF">
            
        </div>
		
			
			
		
    </body>
</html>

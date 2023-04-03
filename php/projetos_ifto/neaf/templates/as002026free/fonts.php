<?php 

/*******************************************************************************************/
/*
/*		Designed by 'AS Designing'
/*		Web: http://www.asdesigning.com
/*		Web: http://www.astemplates.com
/*		License: GNU/GPL
/*
/*******************************************************************************************/


function fontChooser($fontfamily)
{
	
	$font_arr = array('fontlink'=>false, 'fontfamily'=>false);
	
	switch($fontfamily)
	{
		case 'ABeeZee':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=ABeeZee&subset=cyrillic,greek,latin' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'ABeeZee', Arial, serif !important;";
			break;	
		case 'Acme':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Acme&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Acme', Arial, serif !important;";
			break;	
		case 'Advent Pro':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Advent+Pro&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Advent Pro', Arial, serif !important;";
			break;	
		case 'Arimo':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Arimo&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Arimo', Arial, serif !important;";		
			break;	
		case 'Arizonia':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Arizonia&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Arizonia', Arial, serif !important;";
			break;	
		case 'Arvo':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic&subset=latin,latin-ext,vietnamese,cyrillic-ext,greek-ext,greek,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Arvo', Arial, serif !important;";
			break;	
		case 'Average':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Average&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Average', Arial, serif !important;";
			break;	
		case 'BenchNine':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=BenchNine:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'BenchNine', Arial, serif !important;";
			break;	
		case 'Carme':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Carme&subset=cyrillic,greek,latin' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Carme', Arial, sans-serif; !important;";
			break;	
		case 'Comfortaa':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Comfortaa&subset=cyrillic,greek,latin' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Comfortaa', Arial, sans-serif; !important;";
			break;	
		case 'Convergence':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Convergence&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Convergence', Arial, serif !important;";
			break;	
		case 'Cuprum':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Cuprum&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Cuprum', Arial, serif !important;";
			break;	
		case 'Droid Sans':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Droid Sans', Arial, serif !important;";
			break;				
		case 'Droid Serif':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700italic,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Droid Serif', Arial, serif !important;";
			break;				
		case 'Exo':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Exo&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Exo', Arial, serif !important;";
			break;	
		case 'Felipa':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Felipa&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Felipa', Arial, serif !important;";
			break;	
		case 'Fredoka One':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Fredoka+One&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Fredoka One', Arial, serif !important;";
			break;	
		case 'Hammersmith One':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Hammersmith+One&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Hammersmith One', Arial, serif !important;";
			break;	
		case 'Homenaje':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Homenaje&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Homenaje', Arial, serif !important;";
			break;	
		case 'Jockey One':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Jockey+One&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Jockey One', Arial, serif !important;";
			break;	
		case 'Josefin Slab':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Josefin+Slab:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic&subset=latin,latin-ext,vietnamese,cyrillic-ext,greek-ext,greek,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Josefin Slab', Arial, serif !important;";
			break;	
		case 'Jura':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Jura&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Jura', Arial, serif !important;";
			break;	
		case 'Macondo':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Macondo&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Macondo', Arial, serif !important;";
			break;	
		case 'Marmelad':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Marmelad&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Marmelad', Arial, serif !important;";
			break;
		case 'Michroma':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Michroma&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Michroma', sans-serif !important; ";
			break;				
		case 'Mr Bedfort':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Mr+Bedfort&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Mr Bedfort', Arial, serif !important;";
			break;	
		case 'Montserrat':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Montserrat&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Montserrat', Arial, serif !important;";
			break;	
		case 'Monsieur La Doulaise':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Monsieur+La+Doulaise&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Monsieur La Doulaise', Arial, serif !important;";
			break;	
		case 'Muli':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Muli&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Muli', Arial, serif !important;";
			break;
		case 'Lato':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Lato', Arial, serif !important;";
			break;					
		case 'Libre Baskerville':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic,700&subset=latin,latin-ext,vietnamese,cyrillic-ext,greek-ext,greek,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Libre Baskerville', Arial, serif !important;";
			break;					
		case 'Lobster':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext,vietnamese,cyrillic-ext,greek-ext,greek,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Lobster', Arial, serif !important;";
			break;					
		case 'Lobster Two':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic&subset=latin,latin-ext,vietnamese,cyrillic-ext,greek-ext,greek,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Lobster Two', Arial, serif !important;";
			break;					
		case 'Lora':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic&subset=latin,latin-ext,vietnamese,cyrillic-ext,greek-ext,greek,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Lora', Arial, serif !important;";
			break;					
		case 'Numans':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Numans&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Numans', Arial, serif !important;";
			break;	
		case 'Open Sans':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Open Sans', Arial, serif !important;";
			break;	
		case 'Open Sans Condensed':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,greek-ext,greek,vietnamese,cyrillic-ext,latin-ext,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Open Sans Condensed', Arial, serif !important;";
			break;				
		case 'Oswald':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Oswald', Arial, serif !important;";
			break;	
		case 'Oxygen':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Oxygen&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Oxygen', Arial, serif !important;";
			break;	
		case 'Parisienne':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Parisienne&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Parisienne', Arial, serif !important;";
			break;	
		case 'Pontano Sans':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Pontano+Sans&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Pontano Sans', Arial, serif !important;";
			break;	
		case 'PT Sans':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=PT+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'PT Sans', Arial, serif !important;";
			break;	
		case 'PT Serif':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic&subset=latin,latin-ext,vietnamese,cyrillic-ext,greek-ext,greek,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'PT Serif', Arial, serif !important;";
			break;				
		case 'Prosto One':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Prosto+One&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Prosto One', Arial, serif !important;";
			break;	
		case 'Questrial':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Questrial&subset=cyrillic,greek,latin' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Questrial', Arial, serif !important;";
			break;	
		case 'Raleway':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900&subset=latin,latin-ext,vietnamese,cyrillic-ext,greek-ext,greek,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: Raleway', Arial, serif !important;";
			break;
		case 'Roboto':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,greek-ext,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Roboto', sans-serif !important;";
			break;	
		case 'Roboto Condensed':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic&subset=latin,greek,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Roboto Condensed', Arial, serif !important;";
			break;	
		case 'Roboto Slab':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700&subset=latin,latin-ext,vietnamese,cyrillic-ext,greek-ext,greek,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Roboto Slab', Arial, serif !important;";
			break;	
		case 'Rouge Script':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Rouge+Script&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Rouge Script', Arial, serif !important;";
			break;	
		case 'Russo One':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Russo+One&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Russo One', Arial, serif !important;";
			break;	
		case 'Sacramento':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Sacramento&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Sacramento', Arial, serif !important;";
			break;
		case 'Sail':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Sail&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Sail', Arial, serif !important;";
			break;			
		case 'Salsa':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Salsa&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Salsa', Arial, serif !important;";
			break;	
		case 'Sevillana':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Sevillana&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Sevillana', Arial, serif !important;";
			break;				
		case 'Signika':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Signika&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Signika', Arial, serif !important;";
			break;	
		case 'Six Caps':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Six+Caps&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Six Caps', Arial, serif !important;";
			break;
		case 'Source Sans Pro':
			$font_arr['fontlink'] = "<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic&subset=latin,latin-ext,vietnamese,cyrillic-ext,greek-ext,greek,cyrillic' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Source Sans Pro', Arial, serif !important;";
			break;					
		case 'Tangerine':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Tangerine&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Tangerine', Arial, serif !important;";
			break;	
		case 'Tulpen One':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Tulpen+One&subset=latin,cyrillic,greek' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Tulpen One', Arial, serif !important;";
			break;	
		case 'Ubuntu':
			$font_arr['fontlink'] = "<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic&subset=latin-ext,cyrillic-ext,greek-ext' rel='stylesheet' type='text/css'>";
			$font_arr['fontfamily'] = "font-family: 'Ubuntu', Arial, serif !important;";
			break;				
		default:
			$font_arr['fontlink'] = false;
			$font_arr['fontfamily'] = "font-family: " . $fontfamily . ';';
	} 

	return $font_arr;
}

?>


<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  Direitos de Autor (C) 2005 - 2017 Open Source Matters, Inc. Todos os direitos reservados.
 * @license    Licença Pública Geral GNU - versão 2 ou superior; ver LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * pt-PT localise class.
 *
 * @since  1.6
 */
abstract class pt_PTLocalise
{
	/**
	 * Devolve os sufixos potenciais para um número de itens especificados
	 *
	 * @param integer $count O número de itens.
	 *
	 * @return  array  Uma lista de sufixos potenciais.
	 *
	 * @since   1.6
	 */
	public static function getPluralSuffixes($count)
	{
		if ($count == 0)
		{
			return array('0');
		}
		elseif ($count == 1)
		{
			return array('1');
		}
		else
		{
			return array('MORE');
		}
	}

	/**
	 * Returns the ignored search words
	 *
	 * @return  array  An array of ignored search words.
	 *
	 * @since   1.6
	 */
	public static function getIgnoredSearchWords()
	{
		return array('e', 'de', 'se', 'por' , 'nem' , 'ou' , 'mas' , 'em' );
	}

	/**
	 * Returns the lower length limit of search words
	 *
	 * @return  integer  The lower length limit of search words.
	 *
	 * @since   1.6
	 */
	public static function getLowerLimitSearchWord()
	{
		return 3;
	}

	/**
	 * Returns the upper length limit of search words
	 *
	 * @return  integer  The upper length limit of search words.
	 *
	 * @since   1.6
	 */
	public static function getUpperLimitSearchWord()
	{
		return 20;
	}

	/**
	 * Devolve o número de caracteres a exibir durante uma pesquisa
	 *
	 * @return integer  O número de caracteres a exibir numa pesquisa.
	 *
	 * @since   1.6
	 */
	public static function getSearchDisplayedCharactersNumber()
	{
		return 200;
	}
}

<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Icode_clientes
 * @author     Rogerio Brito <rogerio.brito@intercode.com.br>
 * @copyright  2025 Rogerio Brito
 * @license    GNU General Public License versão 2 ou posterior; consulte o arquivo License. txt
 */

namespace Icodeclientes\Component\Icode_clientes\Administrator\Controller;

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Router\Route;

/**
 * Icode_clientes master display controller.
 *
 * @since  1.0.0
 */
class DisplayController extends BaseController
{
	/**
	 * The default view.
	 *
	 * @var    string
	 * @since  1.0.0
	 */
	protected $default_view = 'clientes';

	/**
	 * Method to display a view.
	 *
	 * @param   boolean  $cachable   If true, the view output will be cached
	 * @param   array    $urlparams  An array of safe URL parameters and their variable types, for valid values see {@link InputFilter::clean()}.
	 *
	 * @return  BaseController|boolean  This object to support chaining.
	 *
	 * @since   1.0.0
	 */
	public function display($cachable = false, $urlparams = array())
	{
		return parent::display();
	}
}

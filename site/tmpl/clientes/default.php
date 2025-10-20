<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Icode_clientes
 * @author     Rogerio Brito <rogerio.brito@intercode.com.br>
 * @copyright  2025 Rogerio Brito
 * @license    GNU General Public License versão 2 ou posterior; consulte o arquivo License. txt
 */
// No direct access
defined('_JEXEC') or die;

use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Router\Route;
use \Joomla\CMS\Language\Text;
use \Joomla\CMS\Layout\LayoutHelper;
use \Joomla\CMS\Session\Session;
use \Joomla\CMS\User\UserFactoryInterface;

HTMLHelper::_('bootstrap.tooltip');
HTMLHelper::_('behavior.multiselect');
HTMLHelper::_('formbehavior.chosen', 'select');

$user       = Factory::getApplication()->getIdentity();
$userId     = $user->get('id');
$listOrder  = $this->state->get('list.ordering');
$listDirn   = $this->state->get('list.direction');
$canCreate  = $user->authorise('core.create', 'com_icode_clientes') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'clienteform.xml');
$canEdit    = $user->authorise('core.edit', 'com_icode_clientes') && file_exists(JPATH_COMPONENT .  DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'clienteform.xml');
$canCheckin = $user->authorise('core.manage', 'com_icode_clientes');
$canChange  = $user->authorise('core.edit.state', 'com_icode_clientes');
$canDelete  = $user->authorise('core.delete', 'com_icode_clientes');

// Import CSS
$wa = $this->document->getWebAssetManager();
$wa->useStyle('com_icode_clientes.list');
?>

<?php if ($this->params->get('show_page_heading')) : ?>
    <div class="page-header">
        <h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
    </div>
<?php endif;?>
<form action="<?php echo htmlspecialchars(Uri::getInstance()->toString()); ?>" method="post"
	  name="adminForm" id="adminForm">
	<?php if(!empty($this->filterForm)) { echo LayoutHelper::render('joomla.searchtools.default', array('view' => $this)); } ?>
	<div class="table-responsive">
		<table class="table table-striped" id="clienteList">
			<thead>
			<tr>
				
					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_ICODE_CLIENTES_CLIENTES_ID', 'a.id', $listDirn, $listOrder); ?>
					</th>

					<th >
						<?php echo HTMLHelper::_('grid.sort', 'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_ICODE_CLIENTES_CLIENTES_CREATED_AT', 'a.created_at', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_ICODE_CLIENTES_CLIENTES_DESTAQUE', 'a.destaque', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_ICODE_CLIENTES_CLIENTES_NOME', 'a.nome', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_ICODE_CLIENTES_CLIENTES_IMAGEM', 'a.imagem', $listDirn, $listOrder); ?>
					</th>

						<?php if ($canEdit || $canDelete): ?>
					<th class="center">
						<?php echo Text::_('COM_ICODE_CLIENTES_CLIENTES_ACTIONS'); ?>
					</th>
					<?php endif; ?>

			</tr>
			</thead>
			<tfoot>
			<tr>
				<td colspan="<?php echo isset($this->items[0]) ? count(get_object_vars($this->items[0])) : 10; ?>">
					<div class="pagination">
						<?php echo $this->pagination->getPagesLinks(); ?>
					</div>
				</td>
			</tr>
			</tfoot>
			<tbody>
			<?php foreach ($this->items as $i => $item) : ?>
				<?php $canEdit = $user->authorise('core.edit', 'com_icode_clientes'); ?>
				
				<tr class="row<?php echo $i % 2; ?>">
					
					<td>
						<?php echo $item->id; ?>
					</td>
					<td>
						<?php $class = ($canChange) ? 'active' : 'disabled'; ?>
						<a class="btn btn-micro <?php echo $class; ?>" href="<?php echo ($canChange) ? Route::_('index.php?option=com_icode_clientes&task=cliente.publish&id=' . $item->id . '&state=' . (($item->state + 1) % 2), false, 2) : '#'; ?>">
						<?php if ($item->state == 1): ?>
							<i class="icon-publish"></i>
						<?php else: ?>
							<i class="icon-unpublish"></i>
						<?php endif; ?>
						</a>
					</td>
					<td>
						<?php
						$date = $item->created_at;
						echo $date > 0 ? HTMLHelper::_('date', $date, Text::_('DATE_FORMAT_LC2')) : '-';
						?>
					</td>
					<td>
						<?php if (!empty($item->destaque)): ?>
							<?php echo Text::_('COM_ICODE_CLIENTES_CLIENTES_DESTAQUE_OPTION_ON'); ?>
						<?php else: ?>
							<?php echo Text::_('COM_ICODE_CLIENTES_CLIENTES_DESTAQUE_OPTION_OFF'); ?>
						<?php endif; ?>
					</td>
					<td>
						<?php echo $item->nome; ?>
					</td>
					<td>
												<img src="<?php echo Uri::root() . $item->imagem; ?>" alt="Preview" style="max-height: 50px;" />
					</td>
					<?php if ($canEdit || $canDelete): ?>
						<td class="center">
						</td>
					<?php endif; ?>

				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php if ($canCreate) : ?>
		<a href="<?php echo Route::_('index.php?option=com_icode_clientes&task=clienteform.edit&id=0', false, 0); ?>"
		   class="btn btn-success btn-small"><i
				class="icon-plus"></i>
			<?php echo Text::_('COM_ICODE_CLIENTES_ADD_ITEM'); ?></a>
	<?php endif; ?>

	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<input type="hidden" name="filter_order" value=""/>
	<input type="hidden" name="filter_order_Dir" value=""/>
	<?php echo HTMLHelper::_('form.token'); ?>
</form>

<?php
	if($canDelete) {
		$wa->addInlineScript("
			jQuery(document).ready(function () {
				jQuery('.delete-button').click(deleteItem);
			});

			function deleteItem() {

				if (!confirm(\"" . Text::_('COM_ICODE_CLIENTES_DELETE_MESSAGE') . "\")) {
					return false;
				}
			}
		", [], [], ["jquery"]);
	}
?>
<?php
/**
 *
 * Show the product details page
 *
 * @package	VirtueMart
 * @subpackage
 * @author Max Milbers, Valerie Isaksen

 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default_relatedproducts.php 5406 2012-02-09 12:22:33Z alatak $
 */

// Check to ensure this file is included in Joomla!
defined ( '_JEXEC' ) or die ( 'Restricted access' );
?>
<div class="product-related-products related-products-view" id="related-products">
	<h3>
		<?php echo JText::_('COM_VIRTUEMART_RELATED_PRODUCTS'); ?>	
	</h3>
	<div class="related-products ot-custom-vmproduct">
		<div class="vmproduct ot-custom-vmproduct-i">
			<?php $product_model = VmModel::getModel('product');
			foreach ($this->product->customfieldsRelatedProducts as $field) { 
				$product = $product_model->getProduct($field->custom_value); ?>
				<?php /*<div class="product-field product-field-type-<?php echo $field->field_type ?>">
					<span class="product-field-display"><?php echo $field->display ?></span>
					<span class="product-field-desc"><?php echo jText::_($field->custom_field_desc) ?></span>
				</div> */?>
				<div class="product floatleft">
					<div class="spacer">
						<div class="ot-product-detail">
							<div class="product-image">
								<?php $image = explode('>', $field->display);
								$image = $image[1].'>';
								echo JHTML::_('link', JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.$product->virtuemart_category_id),$image,array('title' => $product->product_name) );?>
							</div>
							<div class="product-detail">
								<div class="product-name">
									<?php echo JHTML::link($product->link, $product->product_name); ?>
								</div>
								<div class="clear"></div>
								<div class="product-s-desc">
									<p class="product_s_desc">
										<?php echo shopFunctionsF::limitStringByWord($product->product_s_desc, 75, '...');?>
									</p>
								</div>
								<div class="clear"></div>
								<div class="product-price" id="productPrice<?php echo $product->virtuemart_product_id ?>">
									<div class="PricesalesPrice">
										<span class="PricesalesPrice">
											<?php if (!empty($product->prices['salesPrice'] ) ) {
												echo $this->currency->createPriceDiv('salesPrice','',$product->prices,true);
											}?>
										</span>
									</div>
								</div>
								<div class="clear"></div>
								<div class="product-addtocart">
									<?php echo JHTML::link($product->link, JText::_('COM_VIRTUEMART_PRODUCT_DETAILS'), array('title' => $product->product_name,'class' => 'product-details'));?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

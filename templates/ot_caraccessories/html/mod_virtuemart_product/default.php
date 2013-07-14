<?php // no direct access
defined ('_JEXEC') or die('Restricted access');
$col = 1;
$doc = &JFactory::getDocument();
$pwidth = ' width' . floor (100 / $products_per_row);
if (strpos( $params->get ('moduleclass_sfx'), 'vertical')!==false){
	$pwidth =' width100';
}
if ($products_per_row > 1) {
	$float = " floatleft";
} else {
	$float = " center";
}
$i = 0;
//$abc = strpos( $params->get ('moduleclass_sfx'), 'horizontal');
//$abc = strstr( $params->get ('moduleclass_sfx'), 'horizontal');
//var_dump($abc);
?>
<div class="vmgroup<?php echo $module->id; ?>">

	<?php if ($headerText) { ?>
	<div class="vmheader"><?php echo $headerText ?></div>
	<?php
	} ?>
	<div class="ot-vmgroup vmgroup-i<?php echo $module->id; ?>" style="position: relative;">
		<div class="vmgroup-i-i ot-items">
			<?php if ($display_style == "div") { ?>
				<div class="ot-vmproduct ot-custom-vmproduct ot-item">
					<?php foreach ($products as $product) { 
						if ($col == 1) {
							$first = ' first';
						} else {
							$first = '';
						}
						if($col == $products_per_row) {
							$last = ' last';
						} else {
							$last = '';
						}?>
						<div class="ot-item-i<?php echo $pwidth ?><?php echo $float ?><?php echo $first ?><?php echo $last ?>">
							<div class="spacer">
								<div class="ot-product-detail">
									<?php if (!empty($product->images[0])) {
										$image = $product->images[0]->displayMediaThumb ('class="featuredProductImage" border="0"', FALSE);
									} else {
										$image = '';
									}
									//echo JHTML::_ ('link', JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id), $image, array('title' => $product->product_name));?>
									<div class="product-image">
										<?php echo '<a class="modal" href="'.$product->images[0]->file_url.'" title="'.$product->product_name.'"><img src="'.$product->images[0]->file_url_thumb.'" alt="'.$product->product_name.'" /></a>';?>
									</div>
									<div class="product-detail">
										<?php $url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .
											$product->virtuemart_category_id); ?>
										<div class="product-name">
											<a href="<?php echo $url ?>"><?php echo $product->product_name ?></a>
										</div>
										<div class="clear"></div>
										<?php //Product short DESC ?>
										<div class="product-s-desc">
											<p class="product_s_desc">
												<?php echo shopFunctionsF::limitStringByWord($product->product_s_desc, 55, '...');?>
											</p>
										</div>
										<div class="clear"></div>
										<?php if ($show_price) { ?>
											<div class="product-price">
												<?php if (!empty($product->prices['salesPrice'])) { ?>
													<span class="PricesalesPrice"><?php echo $currency->createPriceDiv ('salesPrice', '', $product->prices);?></span>
												<?php }
												if (!empty($product->prices['discountAmount'])&&!empty($product->prices['basePriceWithTax'])) { ?>
													<span class="PricesalesPriceold"><?php echo $currency->createPriceDiv('basePriceWithTax','COM_VIRTUEMART_PRODUCT_BASEPRICE_WITHTAX',$product->prices); ?><span>
												<?php } ?>
											</div>
											<div class="clear"></div>
										<?php }
										if ($show_addtocart) {
											//echo mod_virtuemart_product::addtocart ($product);?>
											<div class="product-addtocart">
												<?php echo JHTML::link($product->link, JText::_('COM_VIRTUEMART_PRODUCT_DETAILS'), array('title' => $product->product_name,'class' => 'product-details'));?>
											</div>
										<?php }	?>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<?php $i++;
						if ($col == $products_per_row && $products_per_row && $i < $totalProd) {
							echo '	<div class="clear"></div></div><div class="ot-vmproduct ot-custom-vmproduct ot-item">';
							$col = 1;
						} else {
							$col++;
						}
					} ?>
				</div>
				<!--<br style='clear:both;'/>-->

			<?php } else { ?>
				<ul class="ot-vmproduct ot-custom-vmproduct ot-item floatleft">
					<?php foreach ($products as $product) { 
						if ($col == 1) {
							$first = ' first';
						} else {
							$first = '';
						}
						if($col == $products_per_row) {
							$last = ' last';
						} else {
							$last = '';
						}?>
						<li class="ot-item-i<?php echo $pwidth ?><?php echo $float ?><?php echo $first ?><?php echo $last ?>" style="padding: 0px;">
							<div class="spacer">
								<div class="ot-product-detail">
									<?php if (!empty($product->images[0])) {
										$image = $product->images[0]->displayMediaThumb ('class="featuredProductImage" border="0"', FALSE);
									} else {
										$image = '';
									}
									//echo JHTML::_ ('link', JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id), $image, array('title' => $product->product_name));?>
									<div class="product-image">
										<div class="product-image-i">
											<?php echo '<a class="modal" href="'.$product->images[0]->file_url.'" title="'.$product->product_name.'"><img src="'.$product->images[0]->file_url_thumb.'" alt="'.$product->product_name.'" /></a>';?>
										</div>
										<?php if (!empty($product->prices['discountAmount'])&&!empty($product->prices['basePriceWithTax'])) { 
											$percent = ($product->prices['discountAmount'] / $product->prices['basePriceWithTax']) * 100; ?>
											<div class="product-discount">
												<span>Sale<?php //echo JText::_('TPL_OT_SALE') ?></span>
												<span class="discount-per"><?php echo number_format($percent, 0); ?>%</span>
											</div>
										<?php } ?>
									</div>
									<div class="product-detail">
										<?php $url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .
											$product->virtuemart_category_id); ?>
										<div class="product-name">
											<a href="<?php echo $url ?>"><?php echo $product->product_name ?></a>
										</div>
										<div class="clear"></div>
										<?php //Product short DESC ?>
										<div class="product-s-desc">
											<p class="product_s_desc">
												<?php echo shopFunctionsF::limitStringByWord($product->product_s_desc, 75, '...');?>
											</p>
										</div>
										<div class="clear"></div>
										<?php if ($show_price) { ?>
											<div class="product-price">
												<?php if (!empty($product->prices['salesPrice'])) { ?>
													<span class="PricesalesPrice"><?php echo $currency->createPriceDiv ('salesPrice', '', $product->prices, TRUE);?></span>
												<?php } ?>
											</div>
										<?php }
										if ($show_addtocart) {
											//echo mod_virtuemart_product::addtocart ($product);?>
											<div class="product-addtocart">
												<?php echo JHTML::link($product->link, JText::_('COM_VIRTUEMART_PRODUCT_DETAILS'), array('title' => $product->product_name,'class' => 'product-details'));?>
											</div>
										<?php }	?>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</li>
						<?php $i++;
						if ($col == $products_per_row && $products_per_row && $i < $totalProd) {
							echo '</ul><ul class="ot-vmproduct ot-custom-vmproduct ot-item floatleft">';
							$col = 1;
						} else {
							$col++;
						}
					} ?>
				</ul>
				<!--<div class="clear"></div>-->

				<?php
			} ?>
		</div>
	</div>
	<?php if ($footerText) : ?>
		<div class="vmfooter">
			<?php echo $footerText ?>
		</div>
	<?php endif; ?>
	<?php if (strpos( $params->get ('moduleclass_sfx'), 'slide')!==false){?>
		<?php $doc->addScript('templates/ot_caraccessories/scripts/jquery.cycle.all.js');?>
		<?php //$doc->addScript('templates/ot_caraccessories/scripts/jquery.carousel.min.js');?>
		<script type="text/javascript" charset="utf-8">
		<!--
			var j = jQuery.noConflict();
			if (j('.slide .vmgroup<?php echo $module->id; ?>').length > 0){
				j(function(){
					j('.slide .vmgroup<?php echo $module->id; ?> .ot-item').css('width', j('.slide .vmgroup<?php echo $module->id; ?>').width());
					var slideshow = j('.slide .vmgroup<?php echo $module->id; ?> .ot-items')
					.after('<div id="ot-slidenav<?php echo $module->id; ?>" class="ot-slidenav">')
					.cycle({ 
						fx:     'scrollHorz',
						speed:  '300', 
						timeout: 4000
					});
					j('#ot-slidenav<?php echo $module->id; ?>').prepend('<span id="otnext<?php echo $module->id; ?>" class="otnext">&nbsp;</span>');
					// j('#ot-slidenav<?php echo $module->id; ?>').prepend('<span id="pauseButton<?php echo $module->id; ?>" class="otpause">&nbsp;</span>');
					j('#ot-slidenav<?php echo $module->id; ?>').prepend('<span id="otprev<?php echo $module->id; ?>" class="otprev">&nbsp;</span>');
					// j('#pauseButton<?php echo $module->id; ?>').click(function() {
						// var obj = j(this);
						// if (obj.hasClass('otpause')) {
							// obj.removeClass('otpause').addClass('otplay');
							// slideshow.cycle('pause');
						// } else if (obj.hasClass('otplay')) {
							// obj.removeClass('otplay').addClass('otpause');
							// slideshow.cycle('resume');
						// }
					// });
					j('#otnext<?php echo $module->id; ?>').click(function() {
						slideshow.cycle('next');
					});
					j('#otprev<?php echo $module->id; ?>').click(function() {
						slideshow.cycle('prev');
					});
					// add style
					j('#ot-slidenav<?php echo $module->id; ?>').css({
						'position': 'absolute',
						'top': '-40px',
						'right': '0px'
					});
					// j(".slide .vmgroup<?php echo $module->id; ?> .ot-vmgroup").carousel({ 
						// direction: "horizontal",
						// dispItems: 1,
						// loop: true,
						// animSpeed: "slow"});
				});
			}
		-->
		</script>
	<?php } ?>
</div>
<div class="clear"></div>
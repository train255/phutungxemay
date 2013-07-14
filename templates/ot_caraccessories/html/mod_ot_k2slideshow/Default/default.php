<?php
/*---------------------------------------------------------------------------
 # mod_ot_k2slideshow - OT K2 Slide Show Module
 #---------------------------------------------------------------------------
 # author OmegaTheme.com
 # copyright Copyright(C) 2008 - 2011 OmegaTheme.com. All Rights Reserved.
 # @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 # Website: http://omegatheme.com
 # Technical support: Forum - http://omegatheme.com/forum/
-----------------------------------------------------------------------------*/

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<?php if(count($items)): 
	if ($slide_direction=='scrollHorz'){
		$itemWidth = floor($sliderWidth/$item_per_slide);
		$itemHeight = $sliderHeight;
	} else {
		$itemWidth = $sliderWidth;
		$itemHeight = floor($sliderHeight/$item_per_slide);
	}
?>
<div id="otK2ModuleBox<?php echo $module->id; ?>" class="k2ItemsBlock otk2ItemsBlock<?php /*if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx');*/ ?>"<?php /* style="width:<?php echo $sliderWidth.'px';?>; height: <?php echo $sliderHeight.'px';?> "*/?>>
	<div class="ot-k2slideshow" style="position: relative; width:<?php echo $sliderWidth.'px';?>; height: <?php echo $sliderHeight.'px';?>">
		<div class="ot-items<?php echo $module->id; ?>" style="width:<?php echo $sliderWidth.'px';?>; height: <?php echo $sliderHeight.'px';?>" >
			<?php //if(count($items)): ?>
			<?php $i = 0;
			$row = 1; ?>
			<div class="ot-item">
				<?php foreach ($items as $key=>$item):	?>
					<div class="k2ItemBlock" style="float: left; width: <?php echo $itemWidth.'px';?>; height: <?php echo $itemHeight.'px';?>;">
						<div class="k2ItemBlock-i">
							<?php if($params->get('itemImage') && isset($item->image)): ?>
								<div class="moduleItemImage">
									<a href="<?php echo $item->link; ?>" title="<?php echo JText::_('K2_CONTINUE_READING'); ?> &quot;<?php echo K2HelperUtilities::cleanHtml($item->title); ?>&quot;">
										<img src="<?php echo $item->image; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>"/>
									</a>
								</div>
							<?php endif; ?>
							<?php if($params->get('itemTitle') || $params->get('itemIntroText')): ?>
								<div class="moduleItemIntro">
									<div class="moduleItemIntro-i">
										<div class="moduleItemIntro-i-i">
											<?php if($params->get('itemTitle')): ?>
												<h4><a class="moduleItemTitle" href="<?php echo $item->link; ?>"><span class="title-module"><?php echo $item->title; ?></span></a></h4>
											<?php endif; ?>
											<?php if($params->get('itemDateCreated')): ?>
												<span class="moduleItemDateCreated"><?php echo JHTML::_('date', $item->created, JText::_('K2_DATE_FORMAT_LC2')); ?></span>
											<?php endif; ?>
											<?php if($params->get('itemCategory')): ?>
												<?php echo JText::_('K2_PUBLISHED_IN') ; ?> <a class="moduleItemCategory" href="<?php echo $item->categoryLink; ?>"><?php echo $item->categoryname; ?></a>
											<?php endif; ?>
											<?php if($params->get('itemAuthor')): ?>
												<span class="moduleItemAuthor">
													<?php echo K2HelperUtilities::writtenBy($item->authorGender); ?>
													<?php if(isset($item->authorLink)): ?>
														<a rel="author" title="<?php echo K2HelperUtilities::cleanHtml($item->author); ?>" href="<?php echo $item->authorLink; ?>"><?php echo $item->author; ?></a>
													<?php else: ?>
														<?php echo $item->author; ?>
													<?php endif; ?>
												</span>
											<?php endif; ?>
											<?php if($params->get('itemIntroText')): ?>
												<div class="moduleItemIntrotext">
													<?php echo $item->introtext; ?>
												</div>
											<?php endif; ?>
											<?php if($params->get('itemTags') && count($item->tags)>0): ?>
												<div class="moduleItemTags">
													<b><?php echo JText::_('K2_TAGS'); ?>:</b>
													<?php foreach ($item->tags as $tag): ?>
														<a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a>
													<?php endforeach; ?>
												</div>
											<?php endif; ?>
											<?php if($params->get('itemAttachments') && count($item->attachments)): ?>
												<div class="moduleAttachments">
													<?php foreach ($item->attachments as $attachment): ?>
														<a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>"><?php echo $attachment->title; ?></a>
													<?php endforeach; ?>
												</div>
											<?php endif; ?>
											<?php if($params->get('itemCommentsCounter') && $componentParams->get('comments')): ?>		
												<?php if(!empty($item->event->K2CommentsCounter)): ?>
													<?php echo $item->event->K2CommentsCounter; ?>
												<?php else: ?>
													<?php if($item->numOfComments>0): ?>
														<a class="moduleItemComments" href="<?php echo $item->link.'#itemCommentsAnchor'; ?>">
															<?php echo $item->numOfComments; ?> <?php if($item->numOfComments>1) echo JText::_('K2_COMMENTS'); else echo JText::_('K2_COMMENT'); ?>
														</a>
													<?php else: ?>
														<a class="moduleItemComments" href="<?php echo $item->link.'#itemCommentsAnchor'; ?>">
															<?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
														</a>
													<?php endif; ?>
												<?php endif; ?>
											<?php endif; ?>
											<?php if($params->get('itemHits')): ?>
												<span class="moduleItemHits">
													<?php echo JText::_('K2_READ'); ?> <?php echo $item->hits; ?> <?php echo JText::_('K2_TIMES'); ?>
												</span>
											<?php endif; ?>
											<?php if($params->get('itemReadMore') && $item->fulltext): ?>
												<a class="moduleItemReadMore" href="<?php echo $item->link; ?>">
													<?php echo JText::_('K2_READ_MORE'); ?>
												</a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<?php $i++;
					if ($row == $item_per_slide && $item_per_slide && $i < count($items)) {
						echo '	</div><div class="ot-item">';
						$row = 1;
					} else {
						$row++;
					}?>
				<?php endforeach; ?>
			</div>
			<?php //endif; ?>
		</div>
	</div>
	<?php if($params->get('itemCustomLink')): ?>
		<a class="moduleCustomLink" href="<?php echo $params->get('itemCustomLinkURL'); ?>" title="<?php echo K2HelperUtilities::cleanHtml($itemCustomLinkTitle); ?>"><?php echo $itemCustomLinkTitle; ?></a>
	<?php endif; ?>
	<?php if($params->get('feed')): ?>
		<div class="k2FeedIcon">
			<a href="<?php echo JRoute::_('index.php?option=com_k2&view=itemlist&format=feed&moduleID='.$module->id); ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
				<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
			</a>
			<div class="clr"></div>
		</div>
	<?php endif; ?>
</div>
<script type="text/javascript" charset="utf-8">
<!--
	var j = jQuery.noConflict();
	j(function(){
		var slideshow = j('.ot-items<?php echo $module->id; ?>')
		.after('<div id="ot-slidenav<?php echo $module->id; ?>" class="ot-slidenav"></div>')
		.cycle({ 
			fx:     'scrollHorz',
			//fx:     '<?php echo $slide_direction; ?>',
			pause: '0',
			speed:  '300', 
			timeout: 4000/*,
			pager:  '#ot-slidenav-i'*/
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
	});
-->
</script>
<?php endif; ?>

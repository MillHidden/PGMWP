      <?php if (!is_front_page() ): ?>
     </div>
  </div>
</div>
<?php endif; ?>
<div class="col-md-4 pull-right">
       <?php if (is_front_page()): ?>
          <div class="row">
            <div class="col-md-12">
             <?php echo do_shortcode('[embedChat height="660"]'); ?>
            </div>
          </div>  
          <?php endif; ?>      
          <?php if (!is_front_page()): ?>
          <div class="col-md-12">
            <?php echo do_shortcode('[contentblock id=9]'); ?>
          </div>
          <?php endif; ?>
          <div class="col-md-12 separator pull-right give-title-right margin-title-right-2">
            <span class="title-right-bloc pull-right">VOD</span>
          </div>
          <div class="col-md-12">
            <div class="row bloc-daily">
              <div class="col-md-12">
                <iframe frameborder="0" height="360px" scrolling="no" src="http://www.dailymotion.com/badge/user/PureGameMedia?type=carousel" width="300px"></iframe>

                <div style="font-family: Arial, Helvetica, Clean, sans-serif; font-size: 11px; color: #555; width: 300px; text-align: right;">
                  <a href="http://www.dailymotion.com/PureGameMedia" style="text-decoration: none; line-height: 12px; font-size: 11px; color: #555;" target="_blank">PureGameMedia</a> sur <a href="http://www.dailymotion.com?utm_campaign=widget_promote&amp;utm_term=carousel" rel="nofollow" target="_blank"><img border="0" height="12" src="http://www.dailymotion.com/images/user_widget/logo.svg" style="vertical-align: top;" width="71"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
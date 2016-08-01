<div class="container">
<div class="row">
        <div class="col-md-2 separator give-right left-side">
        </div>
        <div class="col-md-6 col-sm-12 separator">
          <h1 id="title-stream" class="title-stream">
          <?php wp_title('|',true,'right') ?>
          </h1>
        </div>
        <?php if (is_front_page()): ?>
        <div class="col-md-4 separator pull-right give-title-right margin-title-right">
          <span class="title-right-bloc pull-right">Rejoins la communauté !</span>
        </div>
          <?php endif; ?>
      </div>
      <div class="row">
        <div class="col-md-2 give-right left-side">
          <div class="row">
            <div class="col-md-12">
              <?php echo do_shortcode('[contentblock id=2]'); ?>
            </div>
          </div>
          <div class="col-md-12 separator separator-margin">
          </div>
          <div class="row">
            <div class="col-md-12">
		    	<!-- TWITTER -->
            <?php echo do_shortcode('[contentblock id=6]'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 separator separator-margin">
            </div>
            <div class="col-md-12">
              <?php echo do_shortcode('[contentblock id=3]'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 separator separator-margin">
            </div>
            <div class="col-md-12">
			     <!-- FACEBOOK -->
            <?php echo do_shortcode('[contentblock id=7]'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 separator separator-margin">
            </div>
            <div class="col-md-12">
               <?php echo do_shortcode('[contentblock id=4]'); ?>
            </div>
          </div>
        </div>

      <?php if(!is_front_page()): ?>
            <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12 bloc-defaut"> 
      <?php endif;
        

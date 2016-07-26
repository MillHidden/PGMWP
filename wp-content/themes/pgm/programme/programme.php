<?php

    require_once ('admin.php');
    include_once ('./admin-header.php');
	include(get_template_directory().'/programme/programme_class.php');
	$programme = new Programme('wp_cat_programme');
	global $current_user;
    get_currentuserinfo();

    $year = date('Y');
    $month = date('n');
    $day = date('j');
    $events = $programme->getEvents();
    $dates = $programme->getAll($year);  
    $streamer = $programme->getStreamer(); 
?>
<script type="text/javascript">
jQuery(function($){
var month = <?php echo $month; ?>;
var current = month;
var current_jour_id = <?php echo date('j'); ?>;

$('.month').hide();
$('#month'+month).show();
$('.months a#linkMonth'+month).addClass('active'); 

$('.months a').click(function(){
var month2 = $(this).attr('id').replace('linkMonth','');
if(month2 != current){
$('#month'+current).slideUp();
$('#month'+month2).slideDown();
$('.months a').removeClass('active'); 
$('.months a#linkMonth'+month2).addClass('active'); 
current = month2;
}
return false; 
}   			   
);  

$('div#add'+current_jour_id).toggleClass('daytitle').toggleClass('daytitle_add').show();
$('table td').click(function(){	
$('div#add'+current_jour_id).toggleClass('daytitle').toggleClass('daytitle_add');
var id = $(this).attr('id');
$('div#add'+id).toggleClass('daytitle').toggleClass('daytitle_add');
current_jour_id = id;
}
);
});


jQuery(document).ready(function($) {
$.fn.editable.defaults.mode = 'popup';   
$('a.test').editable({
type: 'text',
title: 'Editer plage horraire',
url: ajaxurl,
params: function(params) {
params.action = 'my_action';
params.sql = 'start_end';
return params;
},
success: function(data){
console.log(data);
}
});
$('a.test2').editable({
  mode  : 'popup',
type: 'text',
title: 'Editer description',
placement: 'left',
url: ajaxurl,
params: function(params) {
params.action = 'my_action';
params.sql = 'description';
return params;
},
success: function(data){
console.log(data);
}
}); 


var source =   [<?php $i = 0; $len = count($streamer); foreach ($streamer as $key => $value) {  ?>
    {'value': <?php echo $value->user_id; ?>, 'text': '<?php echo $value->user_login; ?>'} <?php if ($i == $len - 1) { echo ''; } else { echo ','; } ?>
  <?php $i++; } ?>];
$('a#streamer').editable({
    mode  : 'popup',
    url: ajaxurl,
    'source': function() {
        return source;
    },
params: function(params) {
params.action = 'my_action';
params.sql = 'id_streamer';
return params;
},
success: function(data){
console.log(data);
}
});



});
</script>
<div class="wrap nosubsub">
    <h2>Page des programmes <?php echo $year; ?></h2>
</div>
<hr>
       <?php
       // $id+1 = ID du mois 
       // $m = MOIS en lettre
       ?>
            <div class="months">
                   <?php
			       // On récupere l'array mois ($programme->months) qui correspond au jour donc l'id de l'array (+1 jour)
			       ?>
                    <?php foreach ($programme->months as $id=>$m): ?>
                         <div style="font-size: 24px;margin-left:3.5%;float:left"><a href="#" id="linkMonth<?php echo $id+1; ?>"><?php echo utf8_encode(utf8_decode($m)); ?></a></div>
                    <?php endforeach; ?>
            </div>
<div class="periods">
            <div class="clear"></div>
            <?php
            //Recupere MOIS = JOUR DE LA SEMAINE EN CHIFFRE
            $dates = current($dates); 
            ?>
            <?php 
			// On veut le numéro du mois et on l'affiche id = month echo $m;
            foreach ($dates as $m=>$days): ?>

               <div class="month relative" id="month<?php echo $m; ?>">
               <table>
                   <thead>
                       <tr>
                           <?php foreach ($programme->days as $d): ?>
                                <th><?php echo substr($d,0,3); ?></th>
                           <?php endforeach; ?>
                       </tr>
                   </thead>
                   <tbody>
                       <tr >
                       <?php 
                       // end = derniere valeur du tableau = jour de la semaine du dernier jour (date du jour)
                       $end = end($days); foreach($days as $d=>$w): ?>
                           <?php $time = strtotime("$year-$m-$d"); ?>
                           <?php 
                           //w = jour du mois 
                           if($d == 1 && $w != 1): 
                           	?>
                                <td colspan="<?php echo $w-1; ?>" class="padding"></td>
                           <?php endif; ?>
                           <td<?php 
                           // Permet de comparer la date du jour de mon tableau à celle d'aujourdui
                           if($time == strtotime(date('Y-m-d'))): ?> class="today" <?php endif; ?> class="link" id="<?php echo $d; ?>">

                                <div class="relative">
                                    <div class="day"><?php echo $d; ?></div>
                                     
                                </div>
                               <div id="add<?php echo $d; ?>" class="daytitle">
                                   <?php echo $programme->days[$w-1]; ?> <?php echo $d; ?>  <?php echo $programme->months[$m-1]; ?>
                                   </br>
                                     <?php $nombre = 0; ?>
                                   <?php  if(isset($events[$time])):   foreach($events[$time] as  $id => $resultats): ?>
                                    <div class="clear"></div>
                                   <div class="tab-content">
                  										<div id="program">
                  											<hr>
                  											<div class="col-md-10 col-md-offset-1">
                  												<ul class="event-list">
                  													<li>
                  														<div class="prog-bloc-time">
                                                <a href="#" class="test" data-pk = "<?php echo $resultats->id; ?>" data-name="<?php echo $resultats->start_end; ?>"><?php echo $resultats->start_end; ?></a>
                  														</div>
                  														<span>
                  															<img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/streamer-round.png" style="float: left;margin-left: 5%;" alt="">
                  														</span>
                  														<div class="info">
                  															<h2 class="title">
                                                   <a href="#" id="streamer" data-pk="<?php echo $resultats->id; ?>" data-type="select"><?php echo $resultats->user_login; ?></a>
                                                </h2>
                                                <p class="desc">
                                                <a href="#" class="test2" data-pk = "<?php echo $resultats->id; ?>" data-name="<?php echo $resultats->description; ?>"><?php echo $resultats->description; ?></a>
                  																
                  															</p>
                  															<p class="profil-programme"><a class="btn btn-sample btn-border" href="login.html"><span class="glyphicon glyphicon-user"></span> Profil de <?php echo $resultats->user_login; ?></a>
                  															</p>
                  														</div>
                  													</li>
                  												</ul>
                  											</div>
                  										</div>
                  									</div>	
                                    <?php $nombre++; endforeach; endif;  ?>
                               </div>	
                               <?php if($nombre != 0): ?> 
                               <span class="events"><?php echo $nombre; ?></span>	
                                <?php endif; ?>		     
						              </td>
                           <?php if($w == 7): ?>
                            </tr><tr>
                           <?php endif; ?>
                       <?php  endforeach;  ?>
                       <?php if($end != 7): ?>
                            <td colspan="<?php echo 7-$end; ?>" class="padding"></td>
                       <?php endif; ?>
                       </tr>
                   </tbody>
               </table>
               </div>
            <?php endforeach; ?>
        </div>
        <div class="clear"></div>
        </br>
        </br>
      	<hr>
      	<h4>Ajouter un programme au planning</h4>
      

<?php
include('./admin-footer.php');
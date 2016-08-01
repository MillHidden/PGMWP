<?php
//require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

class Timeline
{
    /**
     * The current table name
     *
     * @var boolean
     */
    private $tableName = false;
	
		
    /**
     * Constructor for the database class to inject the table name
     *
     * @param String $tableName - The current table name
     */
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
    }

    function getTimeline($date_du_jour){
        global $wpdb;
        $req = $wpdb->get_results("SELECT * FROM $this->tableName INNER JOIN  wp_users ON  wp_users.ID = events.id_streamer WHERE date = '".$date_du_jour."' ORDER by start_end ASC");        
        return $req;
    }


    function getPourcent($start,$end) {
        $pourcent = (time() - $start) / ($end - $start) * 100;
        return $pourcent;
    }


	
}		
			
 
 ?>
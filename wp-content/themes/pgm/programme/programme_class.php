<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );


class Programme
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


    var $days       = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi','Dimanche');
    var $months     = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

    function getEvents(){
        global $wpdb;
        $req = $wpdb->get_results("SELECT events.id, events.description, events.date, events.start_end, wp_users.user_login FROM events INNER JOIN  wp_users ON  wp_users.ID = events.id_streamer  ORDER BY events.id DESC");

       
        foreach ( $req as $datas ) 
        {
            $req[strtotime($datas->date)][$datas->id] = $datas;
        }

        
        return $req;

    }

    function getAll($year){
        // On recupere 12 mois de l'année en cours.
        $r = array();
        $date = new DateTime($year.'-01-01');
        while($date->format('Y') <= $year){
            $y = $date->format('Y');
            $m = $date->format('n');
            $d = $date->format('j');
            $w = str_replace('0','7',$date->format('w'));
            $r[$y][$m][$d] = $w; // Ce que je veux => $r[ANEEE][MOIS][JOUR] = JOUR DE LA SEMAINE
            $date->add(new DateInterval('P1D')); // On rajoute 1 jour
        }
        return $r; 
    }


    function getStreamer(){
        global $wpdb;
        $req = $wpdb->get_results("SELECT wp_usermeta.meta_value, wp_usermeta.user_id, wp_users.user_login FROM wp_usermeta INNER JOIN  wp_users ON  wp_users.ID = wp_usermeta.user_id WHERE wp_usermeta.meta_value LIKE '%streamer%'");
         return $req;
     }


	
    /**
     * Insert data into the current data
     */
    public function create_planning($id_planning, $auteur, $start_date, $start_end)
    {
        global $wpdb;

        $wpdb->insert($this->tableName, array(
					'id_planning' => $id_planning,
					'auteur' => $auteur,
					'start_date' => $start_date,
                    'start_end' => $start_end)
			);

    }

    /**
     * Vérifie la présence d'un planning connu dans la bdd
     */
    public function get_planning($resultats)
    {
        global $wpdb;
		return $wpdb->get_var($wpdb->prepare('SELECT COUNT(id_planning) FROM '.$this->tableName.' WHERE id_planning = %d', $resultats));		
    }    

    public function update($resultats)
    {
        global $wpdb;
    $wpdb->update( 
        'table', 
        array( 
            'column1' => 'value1',  // string
            'column2' => 'value2'   // integer (number) 
        ), 
        array( 'ID' => 1 ), 
        array( 
            '%s',   // value1
            '%d'    // value2
        ), 
        array( '%d' ) 
    );      
    }  

    
		

		
}		
			
 
 ?>
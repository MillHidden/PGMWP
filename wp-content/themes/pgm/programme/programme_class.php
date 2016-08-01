<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/PGMWP/wp-load.php' );


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
        $req = $wpdb->get_results("SELECT $this->tableName.id, $this->tableName.description, $this->tableName.date, $this->tableName.start_end, wp_users.user_login FROM $this->tableName INNER JOIN  wp_users ON  wp_users.ID = $this->tableName.id_streamer  ORDER BY $this->tableName.id DESC");

       
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

    function getPlanning($date_du_jour){
        global $wpdb;
        $lundi = date('Y-m-d', strtotime('last monday', strtotime($date_du_jour)));
        $dimanche = date('Y-m-d', strtotime('next sunday', strtotime($date_du_jour)));

        $req = $wpdb->get_results("SELECT *, WEEKDAY(date) as dayofweek FROM ".$this->tableName." INNER JOIN wp_users ON wp_users.ID = $this->tableName.id_streamer WHERE $this->tableName.date BETWEEN '".$lundi."' AND '".$dimanche."' ORDER BY $this->tableName.date ASC");

        $r = array();
        foreach ( $req as $datas )
        {
           $r[$datas->dayofweek][] = $datas;
        }
        return $r;

    } 
        

        
}       
            
 
 ?>
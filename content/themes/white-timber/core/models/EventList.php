<?php 

class EventList extends CustomPostList {

    function __construct(){
        $this->post_type = 'events';
    }

    function get_events($n = -1, $page = 0){
        $this->get_custom_posts($n, $page);
    }

    /**
     * 
     * Prendi tutti gli eventi con @event_date uguale o maggiore ad oggi
     */
    function get_next_events(){
        $this->meta_query = [
            array(
                'key' => 'event_date',
                'value' => date( 'Y-m-d' ),
                'compare' => '>=',
                'type' => 'DATE'
            )
        ];
        $this->orderby = 'event_date';
        $this->order = 'ASC';
        $this->get_events();

        return $this->posts;
    }

    /**
     * 
     * Prendi tutti gli eventi con @event_date minore ad oggi
     */
    function get_past_events(){
        $this->meta_query = [
            array(
                'key' => 'event_date',
                'value' => date( 'Y-m-d' ),
                'compare' => '<',
                'type' => 'DATE'
            )
        ];
        $this->orderby = 'event_date';
        $this->order = 'DESC';
        $this->get_events();

        return $this->posts;
    }

}
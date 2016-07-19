<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_estimate_cost_topic extends CI_Model {

    	var $table='estimate_cost_topic';
    	var $id='topic_id';
    	//var $dt_order=array();
        var $order=array('desc');
    	var $column = array('topic_id', 'topic', 'status', 'order_by'); //set column field database for order and search

    	public function __construct()
    	{
    		parent::__construct();
    		//Load Dependencies

    	}

    	// List all your items
    	public function insert($data="")
    	{
    		return $this->db->insert($this->table,$data);
    		                 
    	}

    	// get all data
    	public function get_all()
    	{
    		$this->db->order_by($this->id, $this->order);
            return $this->db->get($this->table)->result();
    	}

    	// get data by id
        function get_by_id($id)
        {
            $this->db->where($this->id, $id);
            return $this->db->get($this->table)->row();
        }

    	// update data
        function update($id, $data)
        {
            $this->db->where($this->id, $id);
            $this->db->update($this->table, $data);
        }
        public function get_update_data($id)
        {
            $this->db->from($this->table);
            $this->db->where('topic_id',$id);
            return $this->db->get()->row();
        }

        public function dropdown_data()
        {
            $this->db->from($this->table);
            $this->db->select('topic_id','topic_id');
            return $this->db->get()->result();
        }
        private function _get_datatables_query()
        {
            $this->db->select('estimate_cost_topic.*');
            $this->db->from('estimate_cost_topic');
            
            $i = 0;
            
            foreach ($this->column as $item) // loop column ;
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {
                    
                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $column[$i] = $item; // set column array variable to order processing
                $i++;
            }
            
            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } 
            else if(isset($this->dt_order))
            {
                $order = $this->dt_order;
                $this->db->order_by(key($order), $order[key($order)]);
            }

        }

        function get_datatables()
        {
            $this->_get_datatables_query();
            if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result();
        }

        function count_filtered()
        {
            $this->_get_datatables_query();
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function count_all()
        {
            $this->db->from($this->table);
            return $this->db->count_all_results();
        }
    }

    /* End of file M_estimate_cost_topic.php */
    /* Location: ./models/M_estimate_cost_topic.php */
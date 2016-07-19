<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Estimate_cost_topic extends CI_Controller {
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_estimate_cost_topic','estimate_cost_topic');
            $this->load->library('form_validation');
    
        }
    
        // List all your items
        public function index( $offset = 0 )
        {
            $this->load->_render_page('pages/estimate_cost_topic/index');
        }
    
        // Add a new item
        public function add()
        {
            $master['status'] = True;
            $data = array();
            $master = array();
            $this->_rules();
            if ($this->form_validation->run() == TRUE) 
            {
               $this->estimate_cost_topic->insert($this->insert_data());
               $this->session->set_flashdata('success', 'Insert Successfully');
               $master['status'] = True;
               //redirect('estimate_cost_topic','refresh');
            } 
            else 
            {
                $master['status'] = false;
                foreach ($_POST as $key => $value) 
                {
                    if (form_error($key) != '') 
                    {
                        $data['error_string'] = $key;
                        $data['input_error'] = form_error($key);
                        array_push($master, $data);
                    }
                }
                //$this->index();
            }
            echo(json_encode($master));
        }
    
        //Update one item
        public function update( $id = NULL )
        {
            $master['status'] = True;
            $data = array();
            $master = array();
            $this->_rules();
            if ($this->form_validation->run() == TRUE) 
            {
               $this->estimate_cost_topic->update($id,$this->update_data());
               $this->session->set_flashdata('success', 'Update Successfully');
               $master['status'] = True;
               //redirect('estimate_cost_topic','refresh');
            } 
            else 
            {
                $master['status'] = false;
                foreach ($_POST as $key => $value) 
                {
                    if (form_error($key) != '') 
                    {
                        $data['error_string'] = $key;
                        $data['input_error'] = form_error($key);
                        array_push($master, $data);
                    }
                }
                //$this->index();
            }
            echo(json_encode($master));

        }
    
        //Delete one item
        public function delete( $id = NULL )
        {
    
        }

        public function _rules()
        {
			$this->form_validation->set_rules('topic', 'topic', 'trim|required|max_length[100]');
			
		}

        public function user_data()
        {
            $data=array(
			'topic'=>$this->input->post('topic')
			);

            return $data;
        }
        
		public function insert_data()
        {
            $data=$this->user_data();
            $data['order_by']=1+($this->db->select_max('topic_id')->get('estimate_cost_topic')->row()->topic_id);
			return $data;
		}
    
		public function update_data()
        {
            $data=$this->user_data();
			return $data;
        }
        
        public function get_update_data($id='')
        {
            if (!$id) 
            {
              show_404();
            }
            echo json_encode($this->estimate_cost_topic->get_update_data($id));

        }
        
        public function datatable()
        {
            
            $list = $this->estimate_cost_topic->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $dt) 
            {
                $no++;
                $row = array();
                $row[]=$no;
                $row[]=$dt->topic?$dt->topic:'';
				$row[]='<div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <a href="#" data-estimate_cost_topic="'.$dt->topic_id.'" class="btn_editestimate_cost_topic"><label class="text-success"><i class="glyphicon glyphicon-edit"></i>&nbsp&nbspEdit</label></a>
                                        </li>
                                        <li>
                                            <a href="#" class="delete" data-estimate_cost_topic="'.$dt->topic_id.'"><label class="text-warning"><i class="glyphicon glyphicon-trash"></i>&nbsp&nbspDelete</label></a>
                                        </li>
                                    </ul>
                                </div>';
				$data[] = $row;
            }

            $output = array(
                            "draw" => $_POST['draw'],
                            "recordsTotal" => $this->estimate_cost_topic->count_all(),
                            "recordsFiltered" => $this->estimate_cost_topic->count_filtered(),
                            "data" => $data,
                    );
            //output to json format
            echo json_encode($output);
        }

        public function datatable_script()
        {
            $dt="<script>
                    $('#table_estimate_cost_topic').DataTable({ 

                        'processing': true, //Feature control the processing indicator.
                        'serverSide': true, //Feature control DataTables' server-side processing mode.
                        'order': [], //Initial no order.
                        // Load data for the table's content from an Ajax source
                        'ajax': {
                            'url': 'http://127.0.0.1:81/so/index.php/estimate_cost_topic/datatable',
                            'type': 'POST'
                        },
                        //Set column definition initialisation properties.
                        'columnDefs': [
                        { 
                            'targets': [ 0,-1], //last column
                            'orderable': false, //set not orderable
                        },
                        ],
                    });
                </script>";
            return $dt;
        }
    }
        
        /* End of file Generate.php */
        /* Location: ./application/libraries/Generate.php */
        
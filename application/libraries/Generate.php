<?php 
/**
* 
*/
class Generate
{
	var $string='';
	var $table='';
	var $primary_key='';
	public function model($table_name)
	{
		$this->table=$table_name;
		$CI =& get_instance();
		$fields = $CI->db->field_data($table_name);
		$table_fields= $CI->db->list_fields($table_name);
		$crud_field=array();
        $non_primary_keys=array();
        foreach ($fields as $field)
        {
               
            if ($field->primary_key) 
            {
                $this->primary_key=$field->name;

            }
            else
            {
                array_push($non_primary_keys,$field);
                if ($field->name!="created_at" && $field->name!="updated_at" && $field->type!='bit') 
                {
                     array_push($crud_field,$field);
                }
            }
        }
$this->string.="<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_".$table_name." extends CI_Model {

    	var \$table='".$this->table."';
    	var \$id='".$this->primary_key."';
    	//var \$dt_order=array();
        var \$order=array('desc');
    	var \$column = array('".implode("', '",$table_fields)."'); //set column field database for order and search

    	public function __construct()
    	{
    		parent::__construct();
    		//Load Dependencies

    	}

    	// List all your items
    	public function insert(\$data=\"\")
    	{
    		return \$this->db->insert(\$this->table,\$data);
    		                 
    	}

    	// get all data
    	public function get_all()
    	{
    		\$this->db->order_by(\$this->id, \$this->order);
            ";
            foreach ($non_primary_keys as $cf) 
            {
                if ($cf->name=='is_deleted') 
                {
                    $this->string.="\$this->db->where('is_deleted',0);\n\t\t\t";
                }
            }
    		$this->string.="return \$this->db->get(\$this->table)->result();
    	}

    	// get data by id
        function get_by_id(\$id)
        {
            \$this->db->where(\$this->id, \$id);
            ";
            foreach ($non_primary_keys as $cf) 
            {
                if ($cf->name=='is_deleted') 
                {
                    $this->string.="\$this->db->where('is_deleted',0);\n\t\t\t";
                }
            }
            $this->string.="return \$this->db->get(\$this->table)->row();
        }

    	// update data
        function update(\$id, \$data)
        {
            \$this->db->where(\$this->id, \$id);
            \$this->db->update(\$this->table, \$data);
        }
        public function get_update_data(\$id)
        {
            \$this->db->from(\$this->table);
            \$this->db->where('".$this->primary_key."',\$id);
            return \$this->db->get()->row();
        }

        public function dropdown_data()
        {
            \$this->db->from(\$this->table);
            \$this->db->select('".$this->primary_key."','".$this->primary_key."');
            return \$this->db->get()->result();
        }
        private function _get_datatables_query()
        {
            \$this->db->select('".$table_name.".*');
            \$this->db->from('".$this->table."');
            
            \$i = 0;
            
            foreach (\$this->column as \$item) // loop column ;
            {
                if(\$_POST['search']['value']) // if datatable send POST for search
                {
                    
                    if(\$i===0) // first loop
                    {
                        \$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
                        \$this->db->like(\$item, \$_POST['search']['value']);
                    }
                    else
                    {
                        \$this->db->or_like(\$item, \$_POST['search']['value']);
                    }

                    if(count(\$this->column) - 1 == \$i) //last loop
                        \$this->db->group_end(); //close bracket
                }
                \$column[\$i] = \$item; // set column array variable to order processing
                \$i++;
            }
            
            if(isset(\$_POST['order'])) // here order processing
            {
                \$this->db->order_by(\$column[\$_POST['order']['0']['column']], \$_POST['order']['0']['dir']);
            } 
            else if(isset(\$this->dt_order))
            {
                \$order = \$this->dt_order;
                \$this->db->order_by(key(\$order), \$order[key(\$order)]);
            }

        }

        function get_datatables()
        {
            \$this->_get_datatables_query();
            if(\$_POST['length'] != -1)
            \$this->db->limit(\$_POST['length'], \$_POST['start']);
            \$query = \$this->db->get();
            return \$query->result();
        }

        function count_filtered()
        {
            \$this->_get_datatables_query();
            \$query = \$this->db->get();
            return \$query->num_rows();
        }

        public function count_all()
        {
            \$this->db->from(\$this->table);
            return \$this->db->count_all_results();
        }
    }

    /* End of file M_".$table_name.".php */
    /* Location: ./models/M_".$table_name.".php */";

		$CI->load->helper('file');
		if ( ! write_file(APPPATH.'models/M_'.$table_name.'.php', $this->string))
		{
		        return false;
		}
		else
		{
		        return true;
		}
		
		
	}

    public function controller($table_name)
    {
        $this->table=$table_name;
        $this->string='';
        $CI =& get_instance();
        $fields = $CI->db->field_data($table_name);
        $table_fields= $CI->db->list_fields($table_name);
        $non_primary_keys=array();
        $crud_field=array();
        foreach ($fields as $field)
        {
               
            if ($field->primary_key) 
            {
                $this->primary_key=$field->name;

            }
            else
            {
                array_push($non_primary_keys,$field);
                if ($field->name!="created_at" && $field->name!="updated_at" && $field->type!='bit') 
                {
                     array_push($crud_field,$field);
                }
            }
        }

        $this->string.="<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class ".ucfirst($table_name)." extends CI_Controller {
        
        public function __construct()
        {
            parent::__construct();
            \$this->load->model('M_".$table_name."','".$table_name."');
            \$this->load->library('form_validation');
    
        }
    
        // List all your items
        public function index( \$offset = 0 )
        {
            \$this->load->render_page('".$table_name."/index');
        }
    
        // Add a new item
        public function add()
        {
            \$master['status'] = True;
            \$data = array();
            \$master = array();
            \$this->_rules();
            if (\$this->form_validation->run() == TRUE) 
            {
               \$this->".$table_name."->insert(\$this->insert_data());
               \$this->session->set_flashdata('success', 'Insert Successfully');
               \$master['status'] = True;
               //redirect('".$table_name."','refresh');
            } 
            else 
            {
                \$master['status'] = false;
                foreach (\$_POST as \$key => \$value) 
                {
                    if (form_error(\$key) != '') 
                    {
                        \$data['error_string'] = \$key;
                        \$data['input_error'] = form_error(\$key);
                        array_push(\$master, \$data);
                    }
                }
                //\$this->index();
            }
            echo(json_encode(\$master));
        }
    
        //Update one item
        public function update( \$id = NULL )
        {
            \$master['status'] = True;
            \$data = array();
            \$master = array();
            \$this->_rules();
            if (\$this->form_validation->run() == TRUE) 
            {
               \$this->".$table_name."->update(\$id,\$this->update_data());
               \$this->session->set_flashdata('success', 'Update Successfully');
               \$master['status'] = True;
               //redirect('".$table_name."','refresh');
            } 
            else 
            {
                \$master['status'] = false;
                foreach (\$_POST as \$key => \$value) 
                {
                    if (form_error(\$key) != '') 
                    {
                        \$data['error_string'] = \$key;
                        \$data['input_error'] = form_error(\$key);
                        array_push(\$master, \$data);
                    }
                }
                //\$this->index();
            }
            echo(json_encode(\$master));

        }
    
        //Delete one item
        public function delete( \$id = NULL )
        {
    
        }

        public function _rules()
        {";
         foreach ($crud_field as $key) 
         {
            $max_length='';
            if ($key->type!='date' && $key->type!='time') 
            {
              $max_length="|max_length[".$key->max_length."]";
            }
             $this->string.="\n\t\t\t\$this->form_validation->set_rules('".$key->name."', '".$key->name."', 'trim|required".$max_length."');";
         }
    $this->string.="\n\t\t}

        public function user_data()
        {
            \$data=array(";
                
                foreach ($crud_field as $key) 
                {
                    $this->string.="\n\t\t\t'".$key->name."'=>\$this->input->post('".$key->name."'),";
                }
        $this->string.="\n\t\t\t);\n
            return \$data;
        }
        ";
    $this->string.="\n\t\tpublic function insert_data()
        {
            \$data=\$this->user_data();";
        foreach ($non_primary_keys as $key) 
        {
            if ($key->name=="created_at") 
            {
                $this->string.="\n\t\t\t\$data['created_at']=date('Y-m-d h:i:s', time());";
            }
            if ($key->name=="is_deleted") 
            {
                $this->string.="\n\t\t\t\$data['is_deleted']=0;\n";
            }
        }
    $this->string.="\n\t\t\treturn \$data;\n\t\t}
    ";
    $this->string.="\n\t\tpublic function update_data()
        {
            \$data=\$this->user_data();
        ";
        foreach ($non_primary_keys as $key) 
        {
            if ($key->name=="updated_at") 
            {
                $this->string.="\t\$data['updated_at']=date('Y-m-d h:i:s', time());";
            }
            if ($key->name=="is_deleted") 
            {
                $this->string.="\n\t\t\t\$data['is_deleted']=0;\n";
            }
        }
        $this->string.="\n\t\t\treturn \$data;
        }
        ";
    $this->string.="
        public function get_update_data(\$id='')
        {
            if (!\$id) 
            {
              show_404();
            }
            echo json_encode(\$this->".$table_name."->get_update_data(\$id));

        }
        ";
   $this->string.="
        public function datatable()
        {
            
            \$list = \$this->".$table_name."->get_datatables();
            \$data = array();
            \$no = \$_POST['start'];
            foreach (\$list as \$dt) 
            {
                \$no++;
                \$row = array();
                \$row[]=\$no;
                ";
                foreach ($non_primary_keys as $npk) {
                    if ($npk->type!='bit') 
                    {
                        $this->string.="\$row[]=\$dt->".$npk->name."?\$dt->".$npk->name.":'';\n\t\t\t\t";
                    }
                }
                $this->string.="\$row[]='<div class=\"btn-group\">
                                    <button type=\"button\" class=\"btn btn-default btn-xs dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\">
                                        Action
                                        <span class=\"caret\"></span>
                                    </button>
                                    <ul class=\"dropdown-menu pull-right\" role=\"menu\">
                                        <li>
                                            <a href=\"#\" data-".$table_name."=\"'.\$dt->".$this->primary_key.".'\" class=\"btn_edit".$table_name."\"><label class=\"text-success\"><i class=\"glyphicon glyphicon-edit\"></i>&nbsp&nbspEdit</label></a>
                                        </li>
                                        <li>
                                            <a href=\"#\" class=\"delete\" data-".$table_name."=\"'.\$dt->".$this->primary_key.".'\"><label class=\"text-warning\"><i class=\"glyphicon glyphicon-trash\"></i>&nbsp&nbspDelete</label></a>
                                        </li>
                                    </ul>
                                </div>';\n";
                $this->string.="\t\t\t\t\$data[] = \$row;
            }

            \$output = array(
                            \"draw\" => \$_POST['draw'],
                            \"recordsTotal\" => \$this->".$table_name."->count_all(),
                            \"recordsFiltered\" => \$this->".$table_name."->count_filtered(),
                            \"data\" => \$data,
                    );
            //output to json format
            echo json_encode(\$output);
        }

        public function datatable_script()
        {
            \$dt=\"<script>
                    $('#table_".$table_name."').DataTable({ 

                        'processing': true, //Feature control the processing indicator.
                        'serverSide': true, //Feature control DataTables' server-side processing mode.
                        'order': [], //Initial no order.
                        // Load data for the table's content from an Ajax source
                        'ajax': {
                            'url': '".site_url($table_name.'/datatable')."',
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
                </script>\";
            return \$dt;
        }
    }
        
        /* End of file Generate.php */
        /* Location: ./application/libraries/Generate.php */
        ";
        $CI->load->helper('file');
        if ( ! write_file(APPPATH.'Controllers/'.ucfirst($table_name).'.php', $this->string))
        {
                return false;
        }
        else
        {
                return true;
        }
        
    }

    public function view($table_name)
    {
        $this->table=$table_name;
        $this->string='';
        $CI =& get_instance();
        $fields = $CI->db->field_data($table_name);
        $table_fields= $CI->db->list_fields($table_name);
        $non_primary_keys=array();
        $crud_field=array();
        foreach ($fields as $field)
        {
               
            if ($field->primary_key) 
            {
                $this->primary_key=$field->name;
            }
            else
            {
                array_push($non_primary_keys,$field);
                if ($field->name!="created_at" && $field->name!="updated_at" && $field->type!='bit') 
                {
                     array_push($crud_field,$field);
                }
            }
        }
        $this->string.="
        <?php if (\$this->session->flashdata('success')): ?>
            <div class=\"row\">
                <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\">
                    <div class=\"alert alert-success\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                        <strong><?php echo(\$this->session->flashdata('success')) ?></strong>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"panel panel-primary\">
                    <div class=\"panel-heading\">
                        <button type=\"button\" id=\"btn_addnew_".$table_name."\" class=\"btn btn-info\">Add</button>
                    </div>
                    <div class=\"panel-body\">
                        <table class=\"table table-hover table-responsive\" id=\"table_".$table_name."\">
                            <thead>
                            <tr><th>SN.</th>";
                                    foreach ($non_primary_keys as $npk) 
                                    {
                                        if ($npk->type!='bit') 
                                        {
                                            $this->string.="<th>".$npk->name."</th>";
                                        }

                                    }
                                    $this->string.="<td>Action</td></tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        ";
        $this->string.="
        <script>
            \$('#btn_addnew_".$table_name."').click(function(){
                \$('#modal_".$table_name."').modal('show');

            });
        </script>
        ";
        $this->string.="
        <div class=\"modal fade\" id=\"modal_".$table_name."\">
            <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
                        <h4 class=\"modal-title\">Modal title</h4>
                    </div>
                    <div class=\"modal-body\">
                        <?php echo(form_open('".$table_name."/add',array('id'=>'form_".$table_name."'))) ?>";
                            foreach ($crud_field as $npk) {
                                $this->string.="<div class=\"form-group\">
                                    <label for=\"\">".$npk->name."</label>
                                    <input type=\"text\" name=\"".$npk->name."\" class=\"form-control\" id=\"".$npk->name."\" placeholder=\"Input field\">
                                    <span></span>
                                </div>";
                            }

                            $this->string.="
                        <?php echo(form_close()); ?>
                    </div>
                    <div class=\"modal-footer\" >
                        <button type=\"submit\" id=\"btn_save_".$table_name."\" class=\"btn btn-primary\">Save</button>
                        <button type=\"submit\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                    </div>
                </div>
            </div>
        </div>";

        //creates model for edit

        $this->string.="
        <div class=\"modal fade\" id=\"modal-edit".$table_name."\">
            <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
                        <h4 class=\"modal-title\">Modal title</h4>
                    </div>
                    <div class=\"modal-body\">
                        <div class=\"loader col-md-4 col-md-offset-4 clearfix\"></div>
                        <form id=\"form_update_".$table_name."\">";
                            foreach ($crud_field as $npk) {
                                $this->string.="<div class=\"form-group\">
                                    <label for=\"\">".$npk->name."</label>
                                    <input type=\"text\" name=\"".$npk->name."\" class=\"form-control\" id=\"".$npk->name."\" placeholder=\"Input field\">
                                    <span></span>
                                </div>";
                            }

                            $this->string.="
                        </form>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" id=\"btn_update_".$table_name."\" class=\"btn btn-primary\">Update</button>
                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                    </div>
                </div>
            </div>
        </div>
        ";
        $this->string.="<script>
            $(document).ready(function(){
                var update_id='';
                \$('body').on('click','.btn_edit".$table_name."',function(){
                    \$('#modal-edit".$table_name."').modal('show');
                    update_id=\$(this).data('".$table_name."');
                    get_".$table_name."_updatedata(\$(this).data('".$table_name."'));
                });
                \$('#btn_save_".$table_name."').click(function(event) {
                    event.preventDefault();
                    \$('#btn_save_".$table_name."').prop('disabled',true);
                    \$('#btn_save_".$table_name."').text('Saving.....');
                    \$.ajax({
                        url: '".site_url($table_name.'/add')."',
                        type: 'POST',
                        dataType: 'json',
                        data: \$('#form_".$table_name."').serialize(),
                    })
                    .done(function(data) {
                        if(data.status==true)
                        {
                            location.reload();
                        }
                        else
                        {
                            \$('#btn_save_".$table_name."').prop('disabled',false);
                            \$('#btn_save_".$table_name."').text('Save');
                            \$.each(data, function(index, val) {
                                 \$('#form_".$table_name." #'+val.error_string).next().html(val.input_error);
                                \$('#form_".$table_name." #'+val.error_string).parent().parent().addClass('has-error');
                            });
                        }
                        console.log(\"success\");
                    })
                    .fail(function() {
                        alert('something went wrong !');
                        \$('#btn_save_".$table_name."').prop('disabled',false);
                        \$('#btn_save_".$table_name."').text('Save');
                        console.log(\"error\");
                    })
                    .always(function() {
                        console.log(\"complete\");
                    });
                });
                

            \$('#btn_update_".$table_name."').click(function(event) {
                    event.preventDefault();
                    \$('#btn_update_".$table_name."').prop('disabled',false);
                    \$('#btn_update_".$table_name."').text('Updating....');
                    \$.ajax({
                        url: '".site_url($table_name.'/update')."/'+update_id,
                        type: 'POST',
                        dataType: 'json',
                        data: \$('#form_update_".$table_name."').serialize(),
                    })
                    .done(function(data) {
                        if(data.status==true)
                        {
                            location.reload();
                        }
                        else
                        {
                            \$('#btn_update_".$table_name."').prop('disabled',false);
                            \$('#btn_update_".$table_name."').text('Update');
                            \$.each(data, function(index, val) {
                                 \$('#form_update_".$table_name." #'+val.error_string).next().html(val.input_error);
                                \$('#form_update_".$table_name." #'+val.error_string).parent().parent().addClass('has-error');
                            });
                        }
                        console.log(\"success\");
                    })
                    .fail(function() {
                        alert('something went wrong !');
                        \$('#btn_update_".$table_name."').prop('disabled',false);
                        \$('#btn_update_".$table_name."').text('Update');
                        console.log(\"error\");
                    })
                    .always(function() {
                        console.log(\"complete\");
                    });
                });
                
            });

            function get_".$table_name."_updatedata(id)
            {
                \$('.loader').show();
                \$('#form_update_".$table_name."').hide();
                \$('.modal-footer').find('button').hide();
                \$.ajax({
                        url: '".site_url($table_name.'/get_update_data')."/'+id,
                        type: 'POST',
                        dataType: 'json'
                    })
                    .done(function(data) {
                        \$('.loader').hide();
                        \$('#form_update_".$table_name."').show();
                        \$('.modal-footer').find('button').show();
                        ";
                        foreach ($crud_field as $cf) 
                        {
                            $this->string.="$('#form_update_".$table_name." #".$cf->name."').val(data.".$cf->name.");\n";    
                        }
                        $this->string.="
                    })
                    .fail(function(data){
                        console.log(data);
                        alert('Something went wrong ! '+data);
                    });
            }
        </script>
        <?php
        \$CI =& get_instance();
        echo \$CI->datatable_script();
        ?>
        ";
        if (!is_dir(APPPATH.'views/'.$table_name)) 
        {
            mkdir(APPPATH.'views/'.$table_name);
        }
        $CI->load->helper('file');
        if ( ! write_file(APPPATH.'views/'.$table_name.'/index.php', $this->string))
        {
                return false;
        }
        else
        {
                return true;
        }

    }
}
 ?>
<?php

class generate extends CI_Controller
{
    function generateArray()
    {
        $tbl_name = $_GET['tbl_name'];
        $this->load->database();
        $qry = $this->db->query("select * from $tbl_name");
        $data = $qry->result()[0];
        foreach ($data as $key => $value) {
            ?>
            $<?php echo $key ?>=$this->input->post('<?php echo $key ?>'); <br/>
            <?php
        }
        ?>
        <br/>
        $new<?php echo $tbl_name ?>= array(
        <?php
        foreach ($data as $key => $value) {
            ?>
            '<?php echo $key ?>'=>  $<?php echo $key ?>,<br/>
            <?php
        }


        ?>

        );

        <?php
    }



}
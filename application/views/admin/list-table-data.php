<div class="section is-white" style="max-width: 1024px; margin:auto">
    <h3 class="title is-4"><?= $title; ?></h3>
    <?= $this->session->flashdata('message'); ?>
    <div class="box">
        <table id="table-data" class="display">
            <thead>
                <tr>
                    <?php 
                    echo '<th style="width:40px;">No</th>';
                    foreach($list->list_fields() as $field){
                        if($field!='ID'){
                            echo '<th>'.$field.'</th>';
                        }
                    }
                    echo '<th style="width:40px;">Action</th>';
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list->result_array() as $no=>$listItem){
                    echo '<tr>';
                    echo '<td>'.($no+1).'</td>';
                    foreach($list->list_fields() as $key=>$field){
                        if($field=='ID'){
                            echo '<td><a class="button is-info is-small" href="'. base_url() .'admin/edit_'.$active.'/'.$listItem[$field].'"><i class="far fa-edit"></i></a></td>';
                        }elseif($field=='Status'){
                            if($listItem[$field]==1){
                                echo '<td class="has-text-success">Active</td>';
                            }else{
                                echo '<td class="has-text-danger">Inactive</td>';
                            }
                        }
                        else{
                            echo '<td>'.$listItem[$field].'</td>';
                        }
                    }
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
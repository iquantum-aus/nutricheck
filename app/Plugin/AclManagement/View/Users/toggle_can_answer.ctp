<?php echo $this->Html->image('/acl_management/img/icons/allow-' . $can_answer . '.png',
                            array('onclick' => 'published.toggle("status-'.$user_id.'", "'.$this->Html->url('/acl_management/users/toggle_can_answer/').$user_id.'/'.$can_answer.'");',
                                  'id' => 'status-'.$user_id
        ));
?>
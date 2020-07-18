<h1>Edit Article</h1>

<?php
    echo $this->Form->create($article);
    echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows' => 3]);
    echo $this->Form->control('tags._ids', ['option' => $tags]);
    echo $this->Form->button(__('Save article'));
    echo $this->Form->control('tag_string', ['type' => 'text']);
    echo $this->Form->end();
?>

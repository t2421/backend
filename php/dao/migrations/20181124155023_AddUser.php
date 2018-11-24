<?php

use Phpmig\Migration\Migration;

class AddUser extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = 'CREATE TABLE user_list (
            id INTEGER PRIMARY KEY,
            name TEXT,
            created_at TEXT
        )';
        
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE user;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}

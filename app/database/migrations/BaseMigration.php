<?php

use Illuminate\Database\Migrations\Migration;

/**
 * The BaseMigration class.
 *
 * @author rmariuzzo
 */
class BaseMigration extends Migration
{
    /**
     * Add common columns to a table schema.
     *
     * @param tableName string The name of the table.
     *
     * @return void
     */
    protected function addCommonsTo($tableName, $nullable = false) {
        // Add common columns.
        Schema::table($tableName, function($table) use ($nullable)
        {
            $table->timestamps();
            if ($nullable)
            {
                $table->integer('created_by')->unsigned()->nullable();
                $table->integer('updated_by')->unsigned()->nullable();
            }
            else
            {
                $table->integer('created_by')->unsigned();
                $table->integer('updated_by')->unsigned();
            }
        });
        // Add common relationships.
        Schema::table($tableName, function($table)
        {
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }
}

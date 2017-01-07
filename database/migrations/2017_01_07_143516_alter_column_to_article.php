<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnToArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            //rename字段需要安装doctrine/dbal包
            $table->renameColumn('publish_at','pub_at');//重命名字段
            $table->string('intro');//添加字段
            //$table->dropColumn('intro');//删除字段

            $table->index('intro');//添加索引
            //$table->dropIndex('intro');/删除索引
        });
    }

    /**
     * Reverse the migrations.
     *  rollback用到
     * @return void
     */
    public function down()
    {
        //re
        Schema::table('articles', function (Blueprint $table) {
            $table->renameColumn('pub_at','publish_at');//重命名字段
            $table->dropIndex('articles_intro_index');//删除索引
            $table->dropColumn('intro');//删除字段
        });
    }
}

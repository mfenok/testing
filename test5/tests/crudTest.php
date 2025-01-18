<?php


use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    //Тест добавления записи в бд
    public function testAdd(){
        $add = array(
            'name' => 'pivo',
            'message' => 'cola',
            'userId' => '1'
        );
        require_once '.\src\add_message.php';
        require '.\src\data.php';
        self::assertEquals($add['name'],$mess['name']);
    }
    //Тест чекбокса записи
    public function testCheckbox(){
        $uniqname = 'pivo';
        $checkbox = '1';
        require_once '.\src\add_checkbox.php';
        require '.\src\data.php';
        self::assertEquals('1',$mess['checkbox']);
        
    }
    //Тест автора записи
    public function testAthor(){
        require '.\src\data.php';
        self::assertEquals('123',$userList[$mess['userId']]['username']);
        
    }
    //тест обновления записи
    public function testUpdate(){
        
        $update = array(
            'name' => 'shadow',
            'message' => 'fiend',
        );
        //Для настроящего веб-приложения использовался бы $_GET
        $uniqname = 'pivo';
        require_once '.\src\do_update.php';
        require '.\src\data.php';
        
        self::assertEquals($update['name'],$mess['name']);
        
    }
    //тест удаления записи
    public function testDelete(){
        //Для настроящего веб-приложения использовался бы $_GET
        $delete = 'shadow';
        require_once '.\src\do_delete.php';
        require '.\src\data.php';
        
        self::assertEquals(null,$mess['name']);
    }

}
?>
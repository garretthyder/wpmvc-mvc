<?php
/**
 * Tests MVC Model Controller.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package WPMVC\MVC
 * @version 1.0.0
 */
class ModelTest extends MVCTestCase
{
    /**
     * Tests model controller method.
     */
    public function testMetabox()
    {
        // Prepare
        $post = new stdClass;
        $post->ID = 5;
        // Assert
        $this->assertControllerCall('PostController@_metabox', 'Metaboxes for type: test', $post);
    }
    /**
     * Tests model controller method.
     */
    public function testSave()
    {
        $this->assertControllerAction('PostController@_save', '', 5);
    }
}
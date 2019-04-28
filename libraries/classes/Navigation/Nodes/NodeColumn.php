<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Functionality for the navigation tree
 *
 * @package PhpMyAdmin-Navigation
 */
namespace PhpMyAdmin\Navigation\Nodes;

use PhpMyAdmin\Util;
use PhpMyAdmin\Url;

/**
 * Represents a columns node in the navigation tree
 *
 * @package PhpMyAdmin-Navigation
 */
class NodeColumn extends Node
{
    /**
     * Initialises the class
     *
     * @param string $name     An identifier for the new node
     * @param int    $type     Type of node, may be one of CONTAINER or OBJECT
     * @param bool   $is_group Whether this object has been created
     *                         while grouping nodes
     */
    public function __construct($name, $type = Node::OBJECT, $is_group = false)
    {
        parent::__construct($name, $type, $is_group);
        $this->icon = Util::getImage('pause', __('Column'));
        $sep = Url::getArgSeparator('html');
        $this->links = array(
            'text'  => 'tbl_structure.php?server=' . $GLOBALS['server']
                . $sep . 'db=%3$s' . $sep . 'table=%2$s' . $sep . 'field=%1$s'
                . $sep . 'change_column=1',
            'icon'  => 'tbl_structure.php?server=' . $GLOBALS['server']
                . $sep . 'db=%3$s' . $sep . 'table=%2$s' . $sep . 'field=%1$s'
                . $sep . 'change_column=1',
            'title' => __('Structure'),
        );
    }
}

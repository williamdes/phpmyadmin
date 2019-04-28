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
 * Represents a function node in the navigation tree
 *
 * @package PhpMyAdmin-Navigation
 */
class NodeFunction extends NodeDatabaseChild
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
        $this->icon = Util::getImage('b_routines', __('Function'));
        $sep = Url::getArgSeparator('html');
        $this->links = array(
            'text' => 'db_routines.php?server=' . $GLOBALS['server']
                . $sep . 'db=%2$s' .$sep . 'item_name=%1$s' .$sep . 'item_type=FUNCTION'
                . $sep . 'edit_item=1',
            'icon' => 'db_routines.php?server=' . $GLOBALS['server']
                . $sep . 'db=%2$s' .$sep . 'item_name=%1$s' .$sep . 'item_type=FUNCTION'
                . $sep . 'execute_dialog=1',
        );
        $this->classes = 'function';
    }

    /**
     * Returns the type of the item represented by the node.
     *
     * @return string type of the item
     */
    protected function getItemType()
    {
        return 'function';
    }
}

<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Functionality for the navigation tree
 *
 * @package PhpMyAdmin-Navigation
 */
namespace PhpMyAdmin\Navigation\Nodes;

use PhpMyAdmin\Navigation\NodeFactory;
use PhpMyAdmin\Util;
use PhpMyAdmin\Url;

/**
 * Represents a container for index nodes in the navigation tree
 *
 * @package PhpMyAdmin-Navigation
 */
class NodeIndexContainer extends Node
{
    /**
     * Initialises the class
     */
    public function __construct()
    {
        parent::__construct(__('Indexes'), Node::CONTAINER);
        $this->icon = Util::getImage('b_index', __('Indexes'));
        $sep = Url::getArgSeparator('html');
        $this->links = array(
            'text' => 'tbl_structure.php?server=' . $GLOBALS['server']
                . $sep . 'db=%2$s' . $sep . 'table=%1$s',
            'icon' => 'tbl_structure.php?server=' . $GLOBALS['server']
                . $sep . 'db=%2$s' . $sep . 'table=%1$s',
        );
        $this->real_name = 'indexes';

        $new_label = _pgettext('Create new index', 'New');
        $new = NodeFactory::getInstance(
            'Node',
            $new_label
        );
        $new->isNew = true;
        $new->icon = Util::getImage('b_index_add', $new_label);
        $new->links = array(
            'text' => 'tbl_indexes.php?server=' . $GLOBALS['server']
                . $sep . 'create_index=1' . $sep . 'added_fields=2'
                . $sep . 'db=%3$s' . $sep . 'table=%2$s',
            'icon' => 'tbl_indexes.php?server=' . $GLOBALS['server']
                . $sep . 'create_index=1' . $sep . 'added_fields=2'
                . $sep . 'db=%3$s' . $sep . 'table=%2$s',
        );
        $new->classes = 'new_index italics';
        $this->addChild($new);
    }
}

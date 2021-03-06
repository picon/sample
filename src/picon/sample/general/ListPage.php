<?php

/**
 * Picon Framework
 * http://code.google.com/p/picon-framework/
 *
 * Copyright (C) 2011-2012 Martin Cassidy <martin.cassidy@webquub.com>

 * Picon Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * Picon Framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with Picon Framework.  If not, see <http://www.gnu.org/licenses/>.
 * */

namespace picon\sample\general;

use picon\sample\AbstractPage;
use picon\web\markup\html\basic\Label;
use picon\web\markup\html\repeater\ListView;
use picon\web\markup\html\repeater\RepeatingView;
use picon\web\MarkupContainer;
use picon\web\model\ArrayModel;
use picon\web\model\BasicModel;

/**
 * Description of ListPage
 * 
 * @author Martin Cassidy
 */
class ListPage extends AbstractPage
{
    public function __construct()
    {
        parent::__construct();
        
        $fruit = array('apples', 'pears', 'bananas', 'oranges');
        
        $this->add(new ListView('fruit', function($entry)
        {
            $entry->add(new Label('name', new BasicModel($entry->getModelObject())));
        }, new ArrayModel($fruit)));

        $repeatingView = new RepeatingView('repeater');
        $this->add($repeatingView);
        
        foreach($fruit as $item)
        {
            $element = new Label('text', new BasicModel($item));
            $container = new MarkupContainer($repeatingView->getNextChildId());
            $container->add($element);
            $repeatingView->add($container);
        }
    }
    
    public function getInvolvedFiles()
    {
        return array('assets/general/ListPage.php', 'assets/general/ListPage.html');
    }
}

?>

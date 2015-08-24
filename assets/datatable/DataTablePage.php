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

use picon\web\markup\html\table\PropertyColumn;
use picon\web\markup\html\table\DefaultDataTable;

/**
 * Description of DataTablePage
 * 
 * @author Martin Cassidy
 */
class DataTablePage extends AbstractPage
{
    public function __construct()
    {
        parent::__construct();
        $columns = array();
        $columns[] = new PropertyColumn('Sample Value', 'value');
        
        $provider = new SampleDataProvider();
        $table = new DefaultDataTable('table', $provider, $columns);
        $this->add($table);
    }
    
    public function getInvolvedFiles()
    {
        return array('assets/datatable/DataTablePage.php', 'assets/datatable/DataTablePage.html', 'assets/datatable/SampleDataProvider.php', 'assets/datatable/TableEntryDomain.php');
    }
}

?>

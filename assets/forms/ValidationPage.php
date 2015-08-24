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

use picon\web\markup\html\panel\FeedbackPanel;
use picon\web\markup\html\form\Button;
use picon\web\markup\html\form\Form;
use picon\web\markup\html\form\RequiredTextField;
use picon\web\markup\html\form\validation\MaximumValidator;
use picon\web\markup\html\form\validation\EmailAddressValidator;
use picon\web\markup\html\form\validation\MinimumValidator;
use picon\web\markup\html\form\validation\RangeValidator;
use picon\web\markup\html\form\validation\MaximumLengthValidator;
use picon\web\markup\html\form\validation\MinimumLengthValidator;
use picon\web\markup\html\form\validation\RangeLengthValidator;
use picon\web\markup\html\form\TextArea;


/**
 * Description of ValidationPage
 * 
 * @author Martin Cassidy
 */
class ValidationPage extends AbstractPage
{
    public function __construct()
    {
        parent::__construct();

        $feedback = new FeedbackPanel('feedback');
        $this->add($feedback);
        
        $form = new Form('form');
        $this->add($form);
        
        $self = $this;
        $form->add(new Button('button', function() use($self)
        {
            $self->info('The form validation passed');
        },
        function() use($self)
        {
            $self->info('The form was invalid');
        }));
        
        $email = new RequiredTextField('email');
        $email->add(new EmailAddressValidator());
        $form->add($email);
        
        $maxNumber = new RequiredTextField('maxNumber');
        $maxNumber->add(new MaximumValidator(14));
        $form->add($maxNumber);
        
        $minNumber = new RequiredTextField('minNumber');
        $minNumber->add(new MinimumValidator(34));
        $form->add($minNumber);
        
        $rangeNumber = new RequiredTextField('rangeNumber');
        $rangeNumber->add(new RangeValidator(4, 45));
        $form->add($rangeNumber);
        
        $maxString = new RequiredTextField('maxString');
        $maxString->add(new MaximumLengthValidator(10));
        $form->add($maxString);
        
        $minString = new RequiredTextField('minString');
        $minString->add(new MinimumLengthValidator(4));
        $form->add($minString);
        
        $rangeString = new RequiredTextField('rangeString');
        $rangeString->add(new RangeLengthValidator(4, 10));
        $form->add($rangeString);
        
        $textArea = new TextArea('textArea');
        $textArea->setRequired(true);
        $form->add($textArea);
        
    }
    
    public function getInvolvedFiles()
    {
        return array('assets/forms/ValidationPage.php', 'assets/forms/ValidationPage.html');
    }
}

?>

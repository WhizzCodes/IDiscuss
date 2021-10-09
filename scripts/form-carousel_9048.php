<?php

require_once('FormProcessor.php');

$form = array(
    'subject' => 'Reset Password',
    'email_message' => '',
    'success_redirect' => '',
    'sendIpAddress' => true,
    'email' => array(
    'from' => 'guin.preeti.19bsd010@gmail.com',
    'to' => ''
    ),
    'fields' => array(
    'email' => array(
    'order' => 1,
    'type' => 'email',
    'label' => 'Email',
    'required' => true,
    'errors' => array(
    'required' => 'Field \'Email\' is required.'
    )
    ),
    )
    );

    $processor = new FormProcessor('');
    $processor->process($form);

    ?>
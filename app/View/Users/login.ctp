<?php

echo $this->Html->css('responsive');?>
<br/>
<br/>
<br/>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">

            <div id="loginForm">
    <?php echo $this->Html->image('logo.png', array('class' => 'login-logo')); ?>

    <?php //echo $this->Html->image('logo.png', array('class' => 'logo')); ?>
                <div class="users form" style="margin-top: 15px;">
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Form->create('User'); ?>
                    <fieldset class="rounded">
                        <div id="flashMessage"></div>
                        <legend style="font-size: 20px; padding:0 10px;margin-top: 10px;"><?php echo __('Por favor identifiquese'); ?></legend>
                        <div class="content">
                <?php
                echo $this->Form->input('username', array('label' => 'Usuario','class'=>'rounded'));
                echo $this->Form->input('password', array('label' => 'Password','class'=>'rounded'));
                ?>
                <?php echo $this->Form->submit('Ingresar', array('class' => 'btn btn-default btn-success','style'=>'border: 1px #fff solid;margin-top: 11px;')); ?>
                        </div>
                    </fieldset>
        <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
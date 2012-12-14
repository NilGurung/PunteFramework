<?php
 class WelcomeController extends Controller{
     function index(){
         //$this->load->model('welcome');        
         $this->load->view('welcome');         
     }
 }
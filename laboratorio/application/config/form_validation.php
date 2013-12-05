<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array(
                 'valida_admin' => array(
                                    array(
                                            'field' => 'rut',
                                            'label' => 'Rut',
                                            'rules' => 'trim|required|min_length[7]|max_length[8]|xss_clean'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'required|trim|callback_verificaradmin'
                                         )
                                    ),
                 'valida_func' => array(
                                    array(
                                            'field' => 'rut',
                                            'label' => 'Rut',
                                            'rules' => 'trim|required|min_length[7]|max_length[8]|xss_clean'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'required|trim|callback_verificarfunc'
                                         )
                                    )                          
               );
?>